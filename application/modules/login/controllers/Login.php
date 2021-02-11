<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
		    'required'=>'Email tidak boleh kosong',
		    'valid_email'=>'Email tidak valid'
	    ]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
		    'required'=>'Password tidak boleh kosong'
	    ]);

		if($this->form_validation->run()==false){
			$this->load->view('v_login');
		}else{
			$this->_login();
		}
	}

	private function _login(){

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$member = $this->db->get_where('member', ['email'=>$email])->row_array();

		//jika Email terdaftar
		if($member){
			//jika member aktif
			if($member['is_active']==1){
				//cek password
				if(password_verify($password, $member['password'])){
					$data = [
						'email'=> $member['email'],
						'role_id'=>$member['role_id'],
						'nama_depan'=>$member['nama_depan'],
						'nama_belakang'=>$member['nama_belakang']
					];

					$this->session->set_userdata($data);
					redirect('member');
				}else{//jika Password Salah
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			 	Password Salah!</div>');
				redirect('login');
				}
			}else{//jika Email belum di Aktivasi
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			 	Email ini belum diaktivasi!</div>');
				redirect('login');
			}
		}else{//jika Email Belum terdaftar
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			  Email Belum Terdaftar!</div>');
			redirect('login');
		}

	}

	public function registrasi(){//registrasi member
		$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required|trim', [
		    'required'=>'Nama Depan tidak boleh kosong'    
	    ]);
		$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[member.email]', [
			'is_unique'=>'Email ini sudah terdaftar',
			'valid_email'=>'Email tidak valid',
			'required'=>'Email tidak boleh kosong'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches'=>'Password tidak sama',
			'min_length'=>'Password terlalu pendek',
			'required'=>'Password tidak boleh kosong'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if($this->form_validation->run() == false){
			$data ['title'] = 'Form Registrasi | Zie- Zhop';
			$this->load->view('v_registrasi', $data);
		}else{
			$data = [
				'nama_depan' =>htmlspecialchars($this->input->post('nama_depan', true)),
				'nama_belakang' =>htmlspecialchars($this->input->post('nama_belakang', true)),
				'email' =>htmlspecialchars($this->input->post('email', true)),
				'image' =>'default.jpg',
				'password' =>password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' =>1,
				'is_active'=>0,
				'date_created'=>time()
			];

			//token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email'=>$this->input->post('email'),
				'token'=>$token,
				'date_created'=>time()
			];

			$this->db->insert('member', $data);
			$this->db->insert('user_token', $user_token);
			$this->_sendEmail($token, 'verify');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			  Selamat! Akun anda berhasil terdaftar, Silahkan Cek Email untuk Aktivasi Akun Anda.
			</div>');
			redirect('login');
		}
	}

	private function _sendEmail($token, $type){
			$config = [
				'protocol'=>'smtp',
				'smtp_host'=>'ssl://smtp.googlemail.com',
				'smtp_user'=>'Alamat Email',
				'smtp_pass'=>'Password Email',
				'smtp_port'=>465,
				'mailtype'=>'html',
				'charset'=>'utf-8',
				'newline'=>"\r\n"
			];
			$this->load->library('email', $config);

			$this->email->from('Alamat Email', 'Nama Toko');
			$this->email->to($this->input->post('email'));

			if($type == 'verify'){
				$this->email->subject('Verifikasi Akun');
				$this->email->message('Klik link berikut untuk verifikasi Akun Anda : <a href="'. base_url() . 'login/verify?email=' .$this->input->post('email'). '&token=' . urlencode($token).'">Aktivasi</a>');	
			}else if($type == 'forgot'){
				$this->email->subject('Reset Password');
				$this->email->message('Klik link berikut untuk Reset Password Anda: <a href="'. base_url() . 'login/resetpassword?email=' .$this->input->post('email'). '&token=' . urlencode($token).'">Reset Password</a>');
			}
			$this->email->send();
	} 

	public function verify(){
		$token = $this->input->get('token');
		$email = $this->input->get('email');

		$user = $this->db->get_where('member', ['email'=>$email])->row_array();

		if($user){
			$user_token = $this->db->get_where('user_token', ['token'=>$token])->row_array();
			if($user_token){
				if(time() - $user_token['date_created'] < (60*60*72)){
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('member');

					$this->db->delete('user_token', ['email'=>$email]);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email : '.$email.' sudah aktif! Silahkan Login.
					</div>');
					redirect(base_url('login'));
				}else{
					$this->db->delete('member', ['email'=>$email]);
					$this->db->delete('user_token', ['email'=>$email]);
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					  Aktivasi Akun Failed! Token sudah Expired.
					</div>');
					redirect(base_url('login'));
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				  Aktivasi Akun Failed! Token Salah.
				</div>');
				redirect(base_url('login'));
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				  Aktivasi Akun Failed! Email Salah.
				</div>');
			redirect(base_url('login'));
		}
	}


	public function logout(){//logout from member

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('nama_depan');
		$this->session->unset_userdata('nama_belakang');
		$this->cart->destroy();

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			  Logout Berhasil.
			</div>');
		redirect(base_url());
	}

    function forgotPassword(){
    	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
    		'valid_email'=>'Email tidak terdaftar'
    	]);
    	if($this->form_validation->run()==false){
			$this->load->view('v_lupa_password');
    	}else{
    		$email = $this->input->post('email');
    		$user = $this->db->get_where('member', ['email'=>$email, 'is_active'=>1])->row_array();

    		if($user){
    			$token = base64_encode(random_bytes(32));
    			$user_token = [
    				'email'=>$email,
    				'token'=>$token,
    				'date_created'=>time()
    			];

    			$this->db->insert('user_token', $user_token);
    			$this->_sendEmail($token, 'forgot');
    			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				  Silahkan Cek Email untuk Reset Password Anda!
				</div>');
				redirect(base_url('login/forgotPassword'));	
    		}else{
				$this->db->delete('user_token', ['email'=>$email]);
	    		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				  Email tidak terdaftar / belum diaktivasi!
				</div>');
				redirect(base_url('login/forgotPassword'));	
    		}
    	}
    }

    function resetPassword(){
    	$email = $this->input->get('email');
    	$token = $this->input->get('token');

    	$user = $this->db->get_where('member', ['email'=>$email])->row_array();
    	if($user){
    		$user_token = $this->db->get_where('user_token', ['token'=>$token])->row_array();
    		if($user_token){
    			$this->session->set_userdata('reset_email', $email);
    			$this->changePassword();
    		}else{
				$this->db->delete('user_token', ['email'=>$email]);
    			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				  Reset Password Gagal! Token Salah
				</div>');
				redirect(base_url('login/forgotPassword'));
    		}
    	}else{
			$this->db->delete('user_token', ['email'=>$email]);
    		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				  Reset Password Gagal! Email Salah
				</div>');
			redirect(base_url('login/forgotPassword'));
    	}
    }

    function changePassword(){
    	if(!$this->session->userdata('reset_email')){
    		redirect(base_url('login'));
    	}
    	$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]', [
    		'matches'=>'Password tidak sama',
    		'min_length'=>'Password terlalu pendek',
    	]);
    	$this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[3]|matches[password1]');
    	if($this->form_validation->run()==false){
    		$this->load->view('v_change_password');
    	}else{
			$this->db->delete('user_token', ['email'=>$this->session->userdata('reset_email')]);
    		$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
    		$email = $this->session->userdata('reset_email');

    		$this->db->set('password', $password);
			$this->db->where('email', $email);
    		$this->db->update('member');

    		$this->session->unset_userdata('reset_email');
    		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				  Ganti Password Berhasil! Silahkan Login
				</div>');
			redirect(base_url('login'));
    	}
    }
}