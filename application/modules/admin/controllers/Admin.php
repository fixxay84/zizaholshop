<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
		if(!$this->session->userdata('email')){
			redirect(base_url());
		}
        $params = array('server_key' => 'Mid-server-Xy_5BusOZ-VGl537bfJcuOu6', 'production' => true);
        // $params = array('server_key' => 'SB-Mid-server-jybjHDlkG69y64LcdUICJJBc', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
	}
	function index(){
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['title'] = 'Dashboard';
		$data['countProducts'] = $this->db->from('product')->count_all_results();
		$data['countTransaksi'] = $this->db->from('tbl_order')->count_all_results();
		$data['countMember'] = $this->db->from('member')->count_all_results();
		$data['getRevenue'] = $this->Admin_model->getRevenue();
		$data['getPercentage'] = $this->Admin_model->getPercentage();
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_dashboard', $data);
		$this->load->view('templates/v_footer');
	}

	function list_report(){
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['title'] = 'List Report';
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_list_report', $data);
		$this->load->view('templates/v_footer');
	}

//chart of 
	function getchart_status_trx(){
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['title'] = 'Dashboard';
		$data['getCountOrderChartColumn'] = $this->Admin_model->getCountOrderChartColumn();
		$data['getPercentage_qtyorder'] = $this->Admin_model->getPercentage_qtyorder();
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_count_status', $data);
		$this->load->view('templates/v_footer');
	}


	// chart of member
	function getchart_member(){
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['title'] = 'Dashboard';
		$data['getCountMemberChartColumn'] = $this->Admin_model->getCountMemberChartColumn();
		$data['getPercentage_member'] = $this->Admin_model->getPercentage_member();
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_count_member', $data);
		$this->load->view('templates/v_footer');
	}
	// end chart of member

	// chart of member
	function getchart_product(){
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['title'] = 'Dashboard';
		$data['getCountProductChartColumn'] = $this->Admin_model->getCountProductChartColumn();
		$data['getPercentage_product'] = $this->Admin_model->getPercentage_product();
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_count_product', $data);
		$this->load->view('templates/v_footer');
	}
	// end chart of member

	function product(){
		$data['title'] = 'Product';
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$this->db->order_by('product.id', 'DESC');
		$data['product'] = $this->Admin_model->getKategori();
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_product');
		$this->load->view('templates/v_footer');
	}


	function addProduct(){
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['title'] = 'Add Product';
		$data['kategori'] = $this->db->get('tb_kategori')->result_array();
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_add_product', $data);
		$this->load->view('templates/v_footer');
	}

	function aksiTambahProduct(){
    	$data['kategori'] = $this->db->get('tb_kategori')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['product'] = $this->db->get('product')->result_array();
		$config['upload_path']          = './upload/product/'; 
        $config['allowed_types']        = 'jpg|png|jpeg|bmp|jfif'; 
        $config['overwrite']            = true;
     	$this->upload->initialize($config);
 
        if (!$this->upload->do_upload('gambar_product')){
		$this->session->set_flashdata('message', "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$this->upload->display_errors()."</div>");            
		redirect('admin/addProduct');
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
            	'id_kategori'=>ucfirst($kategori),
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
        redirect('admin/product');
        }

	}

	function formEditProduct($id){
		$data['title'] = 'Edit Product';
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		// $this->db->select('*');
		// $this->db->join('tb_kategori', 'product.id_kategori = tb_kategori.id');
    	$data['product'] = $this->db->get_where('product', ['id'=>$id])->row_array();
    	$data['kategori'] = $this->db->get('tb_kategori')->result_array();
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
				$kategori      = $this->input->post('kategori');
				$deskripsi        = $this->input->post('deskripsi');
				// $url              = $this->input->post('url');
				$harga            = $this->input->post('harga');
				$weight            = $this->input->post('weight');
				$stock            = $this->input->post('stock');
				$modified_by      = $this->input->post('modified_by');
				$last_modified    = $this->input->post('last_modified');

				$this->db->set('nama_product', strtoupper($nama_product));
				$this->db->set('id_kategori', $kategori);
				$this->db->set('harga', $harga);
				$this->db->set('weight', $weight);
				$this->db->set('stock', $stock);
				$this->db->set('deskripsi', $deskripsi);
				// $this->db->set('url', $url);
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
				redirect(base_url(). 'admin/product');
			}else{
		        $config['allowed_types']        = 'jpg|png|jpeg|jfif|bmp';
		        $config['max_size']             = 3072;	
				$config['upload_path']          = './upload/product/';
				$config['overwrite'] = true;
				$this->upload->initialize($config);
				$this->upload->do_upload('gambar_product');
				$gbr             = $this->upload->data();
				$gambar_product  = $gbr['file_name'];
				$nama_product    = $this->input->post('nama_product');
				$kategori	 = $this->input->post('kategori');
				$harga           = $this->input->post('harga');
				$weight          = $this->input->post('weight');
				$stock           = $this->input->post('stock');
				$deskripsi       = $this->input->post('deskripsi');
				// $url      		 = $this->input->post('url');
				$modified_by     = $this->input->post('modified_by');
				$last_modified   = $this->input->post('last_modified');
				
				$this->db->set('nama_product', strtoupper($nama_product));
				$this->db->set('id_kategori', $kategori);
				$this->db->set('harga', $harga);
				$this->db->set('weight', $weight);
				$this->db->set('stock', $stock);
				$this->db->set('deskripsi', $deskripsi);
				// $this->db->set('url', $url);
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
				redirect(base_url(). 'admin/product');
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
		redirect('admin/product');
	}

	public function transaksi(){
		$data['title'] = 'Check Order';
		$data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$this->db->order_by('time', 'DESC');
		$data['transaksi'] = $this->db->get('tbl_order')->result();
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_transaksi', $data);
		$this->load->view('templates/v_footer');
	}


	function inputResi(){
    	$data['title'] = 'Input Resi';
    	$data['member'] = $this->db->get('member')->row_array();
    	$this->load->view('templates/v_header', $data);
    	$this->load->view('v_check_order');	
    	$this->load->view('templates/v_footer');
	}

	public function process()
    {
    	$order_id = $this->input->post('order_id');
    	$action = $this->input->post('action');
    	switch ($action) {
		    case 'status':
		        $this->status($order_id);
		        break;
		    case 'approve':
		        $this->approve($order_id);
		        break;
		    case 'expire':
		        $this->expire($order_id);
		        break;
		   	case 'cancel':
		        $this->cancel($order_id);
		        break;
		}

    }

	public function status($order_id){
    	$data['title'] = 'Transaksi Detail';
		$data['stt'] = $this->veritrans->status($order_id);
    	$data['member'] = $this->db->get('member')->row_array();
    	$data['orders']= $this->db->get_where('tbl_order', ['order_id'=>$data['stt']->order_id])->row_array();
    	$this->load->view('templates/v_header', $data);
    	$this->load->view('v_status_transaksi', $data);	
    	$this->load->view('templates/v_footer');
	}

	public function approve($order_id)
	{
		$this->veritrans->approve($order_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Success!</strong> Transaksi berhasil disetujui.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/transaksi');
	}

	public function expire($order_id)
	{
		$this->veritrans->expire($order_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Success!</strong> Expired done!
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/transaksi');
	}

	public function cancel($order_id)
	{
		$this->veritrans->cancel($order_id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Success!</strong> Transaksi berhasil dibatalkan.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/check_order');
	}

	public function listMember(){
    	$data['title'] = 'List Member';
		$this->db->order_by('id', 'DESC');
    	$data['member'] = $this->db->get('member')->result_array();
    	$this->load->view('templates/v_header', $data);
    	$this->load->view('v_listmember');	
    	$this->load->view('templates/v_footer');
	}
	
	public function deleteMember($id){
// 		$data['member'] = $this->db->get_where('member', ['id'=>$id])->row_array();
		$this->db->where('id', $id);
		$this->db->delete('member');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Success!</strong> Hapus Akun Berhasil!.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/listMember');
	}

	public function kategori(){
    	$data['title'] = 'Kategori';
    	$data['member'] = $this->db->get('member')->result_array();
		$this->db->order_by('id', 'DESC');
    	$data['kategori'] = $this->db->get('tb_kategori')->result_array();
    	$this->load->view('templates/v_header', $data);
    	$this->load->view('v_kategori');	
    	$this->load->view('templates/v_footer');
	}

	public function addKategori(){
    	$data['title'] = 'Tambah Kategori';
    	$data['member'] = $this->db->get('member')->result_array();
    	$data['kategori'] = $this->db->get('tb_kategori')->result_array();
    	$this->load->view('templates/v_header', $data);
    	$this->load->view('v_add_kategori');	
    	$this->load->view('templates/v_footer');
	}

	public function aksiTambahKategori(){
		$data = array('kategori'=>ucfirst($this->input->post('kategori')));
		$this->db->insert('tb_kategori', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Success!</strong> Nama Kategori Berhasil ditambahkan.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/kategori');
	}

	public function editKategori($id){
    	$data['title'] = 'Edit Kategori';
    	$data['member'] = $this->db->get('member')->result_array();
    	$data['kategori'] = $this->db->get_where('tb_kategori', ['id'=>$id])->row_array();
    	$this->load->view('templates/v_header', $data);
    	$this->load->view('v_edit_kategori', $data);	
    	$this->load->view('templates/v_footer');
	}

	public function aksiEditKategori($id){
    	$data['kategori'] = $this->db->get_where('tb_kategori', ['id'=>$id])->row_array();
		$this->db->set('kategori', $this->input->post('kategori'));
		$this->db->where('id', $data['kategori']['id']);
		$this->db->update('tb_kategori');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Success!</strong> Nama Kategori Berhasil diubah.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/kategori');
	}

	public function deleteKategori(){
		$where = $this->uri->segment(3);
		$this->db->delete('tb_kategori', ['id'=>$where]);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Success!</strong> Nama Kategori Berhasil dihapus.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('admin/kategori');
	}

	public function updateResi(){
		$data['title'] = 'Input Resi';
		$this->form_validation->set_rules('order_id', 'Order ID', 'required|trim', [
			'required'=>'Field Order ID tidak boleh kosong'
		]);
		$this->form_validation->set_rules('resi', 'Resi', 'required|trim', [
			'required'=>'Field Resi tidak boleh kosong'
		]);
		if($this->form_validation->run()==false){
	    	$this->load->view('templates/v_header', $data);
	    	$this->load->view('v_check_order');	
	    	$this->load->view('templates/v_footer');
		}else{
			$data = array(
				'resi'=>$this->input->post('resi')
			);
			$this->db->set('resi', $this->input->post('resi'));
			$this->db->where('order_id', $this->input->post('order_id'));
			$this->db->update('tbl_order');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Success!</strong> Nomor Resi Berhasil disubmit.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('admin/transaksi');
		}
	}
}