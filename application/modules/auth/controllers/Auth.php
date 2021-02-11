<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run()==false){
			$this->load->view('v_login');
		}else{
			$this->_login();
		}
	}

	private function _login(){

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email'=>$email])->row_array();

		//jika Email terdaftar
		if($user){
			//jika user aktif
			if($user['is_active']==1){
				//cek password
				if(password_verify($password, $user['password'])){
					$data = [
						'email'=> $user['email']
					];
					$this->session->set_userdata($data);
					redirect(base_url('admin'));

				}else{//jika Password Salah
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			 	Password Salah!</div>');
				redirect('auth');
				}
			}else{//jika Email belum di Aktivasi
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			 	Email ini belum diaktivasi!</div>');
				redirect('auth');
			}
		}else{//jika Email Belum terdaftar
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			  Email Belum Terdaftar!</div>');
			redirect('auth');
		}

	}



	public function registrasi(){
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique'=>'Email ini sudah terdaftar'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches'=>'Password tidak sama',
			'min_length'=>'Password terlalu pendek'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if($this->form_validation->run() == false){
			$data ['title'] = 'Form Registrasi | Zie- Zhop';
			$this->load->view('v_registrasi', $data);
		}else{
			$data = [
				'nama' =>htmlspecialchars($this->input->post('nama', true)),
				'email' =>htmlspecialchars($this->input->post('email', true)),
				'image' =>'default.jpg',
				'password' =>password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' =>2,
				'is_active'=>1,
				'date_created'=>time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			  Selamat! Akun anda berhasil terdaftar.
			</div>');
			redirect('auth');
		}

	}


	public function logout(){

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			  Logout Berhasil.
			</div>');
		redirect('auth');

	}
}