<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Home_model');
	}
	public function index()
	{
		$data['title'] = 'Busana Masa Kini | Zie Zhop - Home';

		// pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/home/index/';

		$this->db->join('tb_kategori', 'product.id_kategori = tb_kategori.id');
		$this->db->from('product');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page']         = 8;

		$data['start'] = $this->uri->segment(3);

		$data['product'] = $this->Home_model->dataProduct($config['per_page'], $data['start']);
		$this->pagination->initialize($config);
		$data['cart'] = $this->cart->contents();
		$data['kategori'] = $this->db->get('tb_kategori')->result_array();

		$this->load->view('templates/v_home_header', $data);
		$this->load->view('templates/v_topbar', $data);
		$this->load->view('v_home', $data);
		$this->load->view('templates/v_home_footer');
	}

	public function productDetail($nama_product){
		$data['title'] = 'Busana Masa Kini | Zie Zhop - Product';
		$this->db->where('nama_product', $nama_product);
		$data['productdetail'] = $this->db->get('product')->row_array();
		$this->db->limit(3);
		$this->db->order_by('rand()');
		$data['product_random'] = $this->db->get('product')->result_array();
		$this->load->view('templates/v_home_header', $data);
		$this->load->view('v_product_detail', $data);
		$this->load->view('templates/v_home_footer');
	}

	function downloadapk(){
		force_download('assets/ZizahOlShop.apk', NULL);
	}

	public function searchproduct($offset = 0){
		$data['title'] = 'Busana Masa Kini | Zie Zhop - Member';
		if($this->input->post('submit')){
			$data['keyword'] = $this->input->post('keyword');
		}else{
			$data['keyword'] = null;
		}
		$this->db->like('kategori', $data['keyword']);
		$this->db->or_like('harga', $data['keyword']);
		$this->db->or_like('nama_product', $data['keyword']);	
		$this->db->from('product');
		$config['base_url'] = site_url().'member/index';
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page']         = 8;
		// $config['use_page_numbers'] = true;
		$config['num_links']        = 5;

		$config['full_tag_open']    = '<nav class="d-flex justify-content-center wow fadeIn">
        <ul class="pagination pg-blue">';
		$config['full_tag_close']   = '</ul></nav>';

		$config['first_link']       = 'First';
		$config['first_tag_open']   = '<li class="page-item">';
		$config['first_tag_close']  = '</li>';

		$config['last_link']        = 'Last';
		$config['last_tag_open']    = '<li class="page-item">';
		$config['last_tag_close']   = '</li>';
		
		$config['next_link']        = '&raquo';
		$config['next_tag_open']    = '<li class="page-item">';
		$config['next_tag_close']   = '</li>';

		$config['prev_link']        = '&laquo';
		$config['prev_tag_open']    = '<li class="page-item">';
		$config['prev_tag_close']   = '</li>';

		$config['cur_tag_open']     = '<li class=" page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']    = '</a></li>';

		$config['num_tag_open']     = '<li class="page-item">';
		$config['num_tag_close']    = '</li>';

		$config['attributes'] = array('class' => 'page-link');



		$this->pagination->initialize($config);
		$data['halaman'] = $this->pagination->create_links();
		$data['offset'] = $offset; 
		$data['cart'] = $this->cart->contents();
    	$data['member'] = $this->db->get_where('member', ['email'=>$this->session->userdata('email')])->row_array();
		$data['searchproduct'] = $this->Home_model->searchproduct($config["per_page"], $offset, $data["keyword"]);         
		$this->load->view('templates/v_home_header', $data);
		$this->load->view('templates/v_topbar', $data);
		$this->load->view('v_search_kategori', $data);
		$this->load->view('templates/v_home_footer');
	}

	public function kategori($kategori)
	{
		$data['title'] = 'Busana Masa Kini | Zie Zhop - Home';
		$this->load->library('pagination');
		$config['base_url'] = base_url()."/home/kategori/".$this->uri->segment(3)."/index/";

		if($kategori){
			$data['kategori'] = $this->uri->segment(3);
			$this->session->set_userdata('kategori', $data['kategori']);
		}else{
		    $data['kategori'] = $this->session->userdata('kategori');
		}

		$this->db->where('kategori',$kategori);
		$this->db->from('product');
		$this->db->join('tb_kategori', 'product.id_kategori = tb_kategori.id');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page']         = 8;

		$data['start'] = $this->uri->segment(5);

		$data['product'] = $this->Home_model->getKategori($config['per_page'], $data['start'], $data['kategori']);
		$this->pagination->initialize($config);

		$data['cart'] = $this->cart->contents();
		$data['kategori'] = $this->db->get('tb_kategori')->result_array();

		$this->load->view('templates/v_home_header', $data);
		$this->load->view('templates/v_topbar', $data);
		$this->load->view('v_kategori', $data);
		$this->load->view('templates/v_home_footer');
	}

	public function carapembelian(){
		$data['title'] = 'Busana Masa Kini | Zie Zhop - Home';
		$this->load->view('templates/v_home_header', $data);
		$this->load->view('v_petunjuk');
		$this->load->view('templates/v_home_footer');
	}
}