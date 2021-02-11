<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('email')){
			redirect('auth');
		}
	}
	function index(){
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$this->db->order_by('nama_product', 'ASC');
		$data['product'] = $this->db->get('product')->result_array();
		$data['title'] = 'Products';
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_product', $data);
		$this->load->view('templates/v_footer');
	}

	function addProduct(){
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['title'] = 'Add Product';
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_add_product', $data);
		$this->load->view('templates/v_footer');
	}

	function aksiTambahProduct(){
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['product'] = $this->db->get('product')->result_array();
		$config['upload_path']          = './upload/product/'; 
        $config['allowed_types']        = 'jpg|png|jpeg|bmp'; 
        $config['overwrite']            = true;
     	$this->upload->initialize($config);
 
        if (!$this->upload->do_upload('gambar_product')){
		$this->session->set_flashdata('message', "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$this->upload->display_errors()."</div>");            
		redirect('product/addProduct');
        }else{
        	$upload = $this->upload->data();
        	$gambar_product = $upload['file_name'];
        	$nama_product = $this->input->post('nama_product');
        	$kategori = $this->input->post('kategori');
        	$harga = $this->input->post('harga');
        	$weight = $this->input->post('weight');
        	$stock = $this->input->post('stock');
        	$deskripsi = $this->input->post('deskripsi');
        	$url = $this->input->post('url');
        	$modified_by = $this->input->post('modified_by');
        	$last_modified = $this->input->post('last_modified');
            $data = [
            	'nama_product'=>strtoupper($nama_product),
            	'gambar_product'=>$gambar_product,
            	'kategori'=>strtoupper($kategori),
            	'harga'=>$harga,
            	'weight'=>$weight,
            	'stock'=>$stock,
            	'deskripsi'=>$deskripsi,
            	'url'=>$url,
            	'modified_by'=>strtoupper($modified_by),
            	'last_modified'=>$last_modified
            ];
        $this->db->insert('product', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Success!</strong> Tambah Product Berhasil!.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
        redirect('product');
        }

	}

	function formEditProduct($id){
		$data['title'] = 'Edit Product';
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['product'] = $this->db->get_where('product', ['id'=>$id])->row_array();
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_edit_product', $data);
		$this->load->view('templates/v_footer');		
	}
	function updateProduct($id){
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['product'] = $this->db->get_where('product', ['id'=>$id])->row_array();

		if(isset($_POST['submit'])){
			if(empty($_FILES['gambar_product']['name'])){
				$old_image 		  = $this->input->post('old_image');
				$nama_product     = $this->input->post('nama_product');
				$kategori     	  = $this->input->post('kategori');
				$deskripsi        = $this->input->post('deskripsi');
				$url              = $this->input->post('url');
				$harga            = $this->input->post('harga');
				$weight            = $this->input->post('weight');
				$stock            = $this->input->post('stock');
				$modified_by      = $this->input->post('modified_by');
				$last_modified    = $this->input->post('last_modified');

				$this->db->set('nama_product', strtoupper($nama_product));
				$this->db->set('kategori', strtoupper($kategori));
				$this->db->set('harga', $harga);
				$this->db->set('weight', $weight);
				$this->db->set('stock', $stock);
				$this->db->set('deskripsi', $deskripsi);
				$this->db->set('url', $url);
				$this->db->set('gambar_product', $old_image);
				$this->db->set('modified_by', strtoupper($modified_by));
				$this->db->set('last_modified', $last_modified);
				$this->db->where('id', $data['product']['id']);
				$this->db->update('product');
				$this->session->set_flashdata('success',
					'<div class="alert alert-success alert-dismissible">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    <strong>Sukses!</strong> Product has been changed!
				  	</div>');
				redirect(base_url(). 'product');
			}else{
		        $config['allowed_types']        = 'gif|jpg|png|jpeg';
		        $config['max_size']             = 3072;	
				$config['upload_path']          = './upload/product/';
				$config['overwrite'] = true;
				$this->upload->initialize($config);
				$this->upload->do_upload('gambar_product');
				$gbr             = $this->upload->data();
				$gambar_product  = $gbr['file_name'];
				$nama_product    = $this->input->post('nama_product');
				$kategori	     = $this->input->post('kategori');
				$harga           = $this->input->post('harga');
				$weight           = $this->input->post('weight');
				$stock           = $this->input->post('stock');
				$deskripsi       = $this->input->post('deskripsi');
				$url      		 = $this->input->post('url');
				$modified_by     = $this->input->post('modified_by');
				$last_modified   = $this->input->post('last_modified');
				
				$this->db->set('nama_product', strtoupper($nama_product));
				$this->db->set('kategori', strtoupper($kategori));
				$this->db->set('harga', $harga);
				$this->db->set('weight', $weight);
				$this->db->set('stock', $stock);
				$this->db->set('deskripsi', $deskripsi);
				$this->db->set('url', $url);
				$this->db->set('gambar_product', $gambar_product);
				$this->db->set('modified_by', $modified_by);
				$this->db->set('last_modified', $last_modified);
				

				
				$this->db->where('id', $data['product']['id']);
				$this->db->update('product');
				$this->session->set_flashdata('success',
					'<div class="alert alert-success alert-dismissible">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    <strong>Sukses!</strong> Product has been changed!
				  	</div>');
				redirect(base_url(). 'product');
			}
		}
	}

	function deleteProduct($id){
		$data['product'] = $this->db->get_where('product', ['id'=>$id])->row_array();
		$this->db->where('id', $data['product']['id']);
		$this->db->delete('product');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Success!</strong> Hapus Product Berhasil!.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('product');
	}




}