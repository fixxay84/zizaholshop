<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Member extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata('email')){
			redirect(base_url());
		}
		$this->load->model('Member_model');
        // $params = array('server_key' => 'Mid-server-Xy_5BusOZ-VGl537bfJcuOu6', 'production' => true);
        $params = array('server_key' => 'SB-Mid-server-oDZvCjhpi64Gmxuyhakczsbj', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');	
	}
	public function index()
	{
		$data['title'] = 'Busana Masa Kini | Zie Zhop - Member';
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/member/index/';

		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('tb_kategori', 'product.id_kategori = tb_kategori.id');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page']         = 8;

		$data['start'] = $this->uri->segment(3);
		$data['product'] = $this->Member_model->dataProduct($config['per_page'], $data['start']);

		$this->pagination->initialize($config);

		$data['cart'] = $this->cart->contents();
		$data['kategori'] = $this->db->get('tb_kategori')->result_array();

    	$data['member'] = $this->db->get_where('member', ['email'=>$this->session->userdata('email')])->row_array();

		$this->load->view('v_member_header', $data);
		$this->load->view('v_topbar', $data);
		$this->load->view('v_member', $data);
		$this->load->view('v_member_footer');
	}

	function add_cart(){
		$data = array(
			'id'=>rand(),
			'name'=>$this->input->post('nama_product'),
			'gambar_product'=>$this->input->post('gambar_product'),
			'qty'=>$this->input->post('qty'),
			'price'=>$this->input->post('harga'),
			'weight'=>$this->input->post('weight'),
			'subberat'=> $this->input->post('qty') * $this->input->post('weight')
		);
		$this->cart->insert($data);
		redirect('member/show_cart');
	}

	function del_cart($rowid){
		$data = array(
			'rowid'=>$rowid,
			'qty'=>0
		);
		$this->cart->update($data);
		redirect('member/show_cart');
	}

	public function productDetail($nama_product){
		$data['title'] = 'Busana Masa Kini | Zie Zhop - Product';
		$data['member'] = $this->db->get('member')->row_array();
		$this->db->where('nama_product', $nama_product);
		$data['productdetail'] = $this->db->get('product')->row_array();
		$this->db->limit(3);
		$this->db->order_by('rand()');
		$data['product_random'] = $this->db->get('product')->result_array();
		$this->load->view('v_member_header', $data);
		$this->load->view('v_product_detail', $data);
		$this->load->view('v_member_footer');

	}

    public function token()
    {
		$cart = $this->cart->contents();
    	$biaya_ekspedisi = $this->session->userdata('ongkir');
    	$ttl = $this->cart->total();
    	$total = $biaya_ekspedisi + $ttl;
    	foreach($cart as $item){
			$transaction_details = array(
			  'order_id' => $item['id'],
			  'gross_amount' => $total// no decimal allowed for creditcard
			);
    	}
		// $token = getSnapToken($transaction_data);

		// $cart = $this->cart->contents();
		// foreach($cart as $item){
		// 	$item1_details = array(
		// 		'id'=>$item['id'],
		// 		'price'=>$item['price'],
		// 		'quantity'=>$item['qty'],
		// 		'name'=>$item['name']
		// 	);
		// }
		// $ongkir = array('id' => 'trp','price'=> $biaya_ekspedisi,'quantity' => 1,'name'=>'Ekspedisi');
		// $item_details = array($item1_details, $ongkir);





		$member = $this->db->get_where('member', ['email'=>$this->session->userdata('email')])->row_array();
		$billing_address = array(
		  'first_name'    => $member['nama_depan'],
		  'last_name'     => $member['nama_belakang'],
		  'address'       => $member['alamat'],
		  'phone'         => $member['telp']
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => $member['nama_depan'],
		  'last_name'     => $member['nama_belakang'],
		  'address'       => $member['alamat'],
		  'phone'         => $member['telp'],
		);

		// Optional
		$customer_details = array(
		  'first_name'    => $member['nama_depan'],
		  'last_name'     => $member['nama_belakang'],
		  'email'         => $member['email'],
		  'phone'         => $member['telp'],
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 1440
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            // 'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry,
        );

		// error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		// error_log($snapToken);
		echo $snapToken;

    }

    public function finish()
    {
    	$data['title'] = 'Status Transaksi';
    	$data['member'] = $this->db->get('member')->row_array();
    	$result = json_decode($this->input->post('result_data'));
    	// echo '<pre>';
    	// print_r($result);
    	// die();
    	$data['res'] = (array) $result;
	 	$this->db->select('*');
		$this->db->from('member');
		$order = $this->db->get()->row_array();
		$order_id = $data['res']['order_id'];
		$email 	  = $this->session->userdata('email');
		$total = $data['res']['gross_amount'];
		$time = $data['res']['transaction_time'];
		$transaction_status = $data['res']['transaction_status'];
	    for($i=1; $i <= count($this->session->userdata('shipping_cost')->rajaongkir->results); $i++){
			$ekspedisi = $this->session->userdata('shipping_cost')->rajaongkir->results[0]->code;
	    }
	    for($i=1; $i <= count($this->session->userdata('shipping_cost')->rajaongkir->results); $i++){
			$service_ekspedisi = $this->session->userdata('shipping_cost')->rajaongkir->results[0]->costs[$i]->service;
	    }
		$data_order = [
			'order_id'=>$order_id,
			'email'=>$email,
			'total'=>$total,
			'time'=>$time,
			'transaction_status'=>$transaction_status,
			'resi'=>'-',
			'ekspedisi'=>$ekspedisi,
			'service_ekspedisi'=>$service_ekspedisi
		];
		$this->db->insert('tbl_order', $data_order);

		$data_update['telp'] = $this->input->post('telp');
		$data_update['alamat'] = $this->input->post('alamat');
    	$this->db->set('telp', $data_update['telp']);
    	$this->db->set('alamat', $data_update['alamat']);
    	$this->db->where('email', $this->session->userdata('email'));
    	$this->db->update('member');

		$this->cart->destroy();
		$this->session->unset_userdata('shipping_cost');

    	$this->load->view('member/v_member_header', $data);
    	$this->load->view('member/v_finish', $data);
    	$this->load->view('member/v_member_footer');
    }

// Check Order
    public function checkorder(){
    	$data['title'] = 'Check Order';
    	$data['member'] = $this->db->get('member')->row_array();
    	$this->db->order_by('id', 'desc');
    	$data['order'] = $this->db->get_where('tbl_order', array(
    		'email'=>$this->session->userdata('email'),
    		'transaction_status'=>'pending'
    	))->result_array();
    	$result = json_decode($this->input->post('result_data'));
    	$data['res'] = (array) $result;
    	$this->load->view('member/v_member_header', $data);
    	$this->load->view('member/v_check_order', $data);
    	$this->load->view('member/v_member_footer');
    }

	// Transaksi

    public function status($order_id){
		$data['stt'] = $this->veritrans->status($order_id);
    	$data['title'] = 'Check Order';
    	$data['member'] = $this->db->get('member')->row_array();
    	$data['orders']= $this->db->get_where('tbl_order', ['order_id'=>$data['stt']->order_id])->row_array();
    	$this->load->view('member/v_member_header', $data);
    	$this->load->view('member/v_transaksi', $data);	
    	$this->load->view('member/v_member_footer');
    }

	public function cancel($order_id)
	{
		$this->veritrans->cancel($order_id);
		$this->db->set('transaction_status', 'cancel');
		$this->db->where('order_id', $order_id);
		$this->db->update('tbl_order');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>Success!</strong> Transaksi berhasil dibatalkan.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>');
		redirect('member/checkorder');
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
		redirect('member/checkorder');
	}

	// Notification
	public function notification()
	{
		echo 'test notification handler';
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result, TRUE);
		// var_dump($result);
		// die();
		if($result){
		$notif = $this->veritrans->status($result->order_id);
		}
		error_log(print_r($result,TRUE));
		//notification handler sample
		
		$transaction = $notif->transaction_status;
		$type = $notif->payment_type;
		$order_id = $notif->order_id;
		$fraud = $notif->fraud_status;
		if ($transaction == 'capture') {
		  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
		  if ($type == 'credit_card'){
		    if($fraud == 'challenge'){
		      // TODO set payment status in merchant's database to 'Challenge by FDS'
		      // TODO merchant should decide whether this transaction is authorized or not in MAP
		      echo "Transaction order_id: " . $order_id ." is challenged by FDS";
		      } 
		      else {
		      // TODO set payment status in merchant's database to 'Success'
		      echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
		      }
		    }
		  }
		else if ($transaction == 'settlement'){
		  // TODO set payment status in merchant's database to 'Settlement'
		  echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
		  } 
		  else if($transaction == 'pending'){
		  // TODO set payment status in merchant's database to 'Pending'
		  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
		  } 
		  else if ($transaction == 'deny') {
		  // TODO set payment status in merchant's database to 'Denied'
		  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
		}
	}

	public function kategori($kategori)
	{
		$data['title'] = 'Busana Masa Kini | Zie Zhop - Member';
		$this->load->library('pagination');
		$config['base_url'] = base_url()."/member/kategori/".$this->uri->segment(3)."/index/";
		
		if($kategori){
		    $data['kategori'] = $this->uri->segment(3);
		    $this->session->set_userdata('kategori', $data['kategori']);
		}else{
		    $data['kategori'] = $this->session->userdata('kategori');
		}

		$this->db->like('kategori', $kategori);
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('tb_kategori', 'product.id_kategori = tb_kategori.id');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page']         = 8;

		$data['start'] = $this->uri->segment(5);
		
    	$data['member'] = $this->db->get('member')->row_array();
		$data['product'] = $this->Member_model->getKategori($config['per_page'], $data['start'], $kategori);
		$this->pagination->initialize($config);

		$data['cart'] = $this->cart->contents();
		$data['kategori'] = $this->db->get('tb_kategori')->result_array();

		$this->load->view('v_member_header', $data);
		$this->load->view('v_topbar', $data);
		$this->load->view('v_kategori', $data);
		$this->load->view('v_member_footer');
	}

	public function carapembelian(){
    	$data['member'] = $this->db->get('member')->row_array();
		$data['title'] = 'Busana Masa Kini | Zie Zhop - Member';
		$this->load->view('member/v_member_header', $data);
		$this->load->view('v_petunjuk');
		$this->load->view('member/v_member_footer');
	}

	public function get_city($province_id){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$province_id",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 99d0d1ce6b66a6b683247f303b069c61" // sesuai dengan api raja ongkir
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		   return json_decode($response);
		}
	}


	public function get_city_by_province($province_id){
		$city = $this->get_city($province_id);
		$output = '<option value="">- Kota -</option>';

		foreach ($city->rajaongkir->results as $cty) {
			$output .='<option value="'.$cty->city_id.'">'.$cty->city_name.'</option>';
		}

		echo $output;
	}

	function get_costs($origin, $destination, $weight, $courier){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: 99d0d1ce6b66a6b683247f303b069c61"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  return json_decode($response);
		}
	}


	function show_cart(){

		$data['title'] = 'Keranjang Belanja';
		$data['cart'] = $this->cart->contents();
		// echo '<pre>';
		// var_dump($data['cart']);
		// die();
		$data['member'] = $this->db->get_where('member', ['email' =>$this->session->userdata('email')])->row_array();
		$this->load->view('v_member_header', $data);
		$this->load->view('v_cart', $data);
		$this->load->view('v_member_footer');
	}


	public function address(){
		$data['title'] = 'Alamat Pengiriman';
    	$data['member'] = $this->db->get_where('member', ['email'=>$this->session->userdata('email')])->row_array();
		$this->load->view('member/v_member_header', $data);
		$this->load->view('member/v_address', $data);
		$this->load->view('member/v_member_footer');
	}

	public function alamatpengiriman($id=''){
    	$data['title'] = 'Edit Profil';
    	$data['member'] = $this->db->get_where('member', ['id'=>$id])->row_array();

    	$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required', [
    	    'required'=>'Nama Depan tidak boleh kosong'    
	    ]);
    	$this->form_validation->set_rules('telp', 'Telephone', 'trim|required', [
    	    'required'=>'Telephone tidak boleh kosong'    
	    ]);
    	$this->form_validation->set_rules('alamat', 'Alamat Pengiriman', 'trim|required', [
    	    'required'=>'Alamat tidak boleh kosong'    
	    ]);
    	if($this->form_validation->run()==false){
	 		$this->load->view('member/v_member_header', $data);
			$this->load->view('v_address', $data);
			$this->load->view('member/v_member_footer');
    	}else{
    	    $this->db->set('nama_depan', $this->input->post('nama_depan'));
    	    $this->db->set('nama_belakang', $this->input->post('nama_belakang'));
    		$this->db->set('telp', $this->input->post('telp'));
    		$this->db->set('alamat', $this->input->post('alamat'));
    		$this->db->where('id', $id);
    		$this->db->update('member');
			redirect(base_url('member/pilih_ekspedisi'));
    	}
    }

	function pilih_ekspedisi(){
		$data['total_berat'] = $this->session->userdata('total_berat');
		$data['shipping_cost'] = $this->session->userdata('shipping_cost');
		$data['province'] = $this->Member_model->getprovince();
    	$data['member'] = $this->db->get('member')->row_array();
		$data['title'] = "Pilih Ekspedisi | Zie Zhop - Member";

		$this->load->view('member/v_member_header', $data);
		$this->load->view('v_ekspedisi');
		$this->load->view('member/v_member_footer');
	}

	public function check_shipping_cost(){
		if(isset($_POST['cek_ongkir_submit'])){
			if(!empty($_POST['origin_city']) && $_POST['destination_city']){
				$origin_city = $this->input->post('origin_city');
				$destination_city = $this->input->post('destination_city');
				$weight = $this->input->post('total_berat');
				$courier = $this->input->post('courier');

				$shipping_cost = $this->get_costs($origin_city, $destination_city, $weight, $courier);
				// echo '<pre>';
				// var_dump($shipping_cost);
				// die();
				$this->session->set_userdata(array(
					'shipping_origin' => $origin_city,
					'shipping_destination' => $destination_city,
					'shipping_weight' => $weight,
					'shipping_courier' => $courier,
					'shipping_cost' => $shipping_cost,
					'shipping_checked_cost' => TRUE
				));
				redirect(base_url('member/shipping'));
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			 	Silahkan Pilih Ekspedisi</div>');
				$data['total_berat'] = $this->input->post('total_berat');
				$data['shipping_cost'] = $this->session->userdata('shipping_cost');
				$data['province'] = $this->Member_model->getprovince();
		    	$data['member'] = $this->db->get('member')->row_array();
				$data['title'] = "Check Ongkir | Zie Zhop - Member";

				$this->load->view('member/v_member_header', $data);
				$this->load->view('v_ekspedisi');
				$this->load->view('member/v_member_footer');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
		 	Silahkan Pilih Ekspedisi</div>');
			$data['total_berat'] = $this->input->post('total_berat');
			$data['shipping_cost'] = $this->session->userdata('shipping_cost');
			$data['province'] = $this->Member_model->getprovince();
	    	$data['member'] = $this->db->get('member')->row_array();
			$data['title'] = "Check Ongkir | Zie Zhop - Member";

			$this->load->view('member/v_member_header', $data);
			$this->load->view('v_ekspedisi');
			$this->load->view('member/v_member_footer');
		}		
	}

	function shipping(){
		$data['member'] = $this->db->get('member')->row_array();
		$data['title'] = "Shipping | Zie Zhop - Member";
		$data['shipping_cost'] = $this->session->userdata('shipping_cost');
		$data['biaya_total_berat'] = $this->input->post('biaya_total_berat');
		$data['province'] = $this->Member_model->getprovince();
		$this->load->view('member/v_member_header', $data);
		$this->load->view('member/v_shipping', $data);
		$this->load->view('member/v_member_footer');
	}

	public function payment(){
		$data['title'] = 'Metode Pembayaran';
    	$data['member'] = $this->db->get('member')->row_array();
		$data['cart'] = $this->cart->contents();
		$data['biaya_total_berat'] = $this->input->post('biaya_total_berat');
    	$this->load->view('member/v_member_header', $data);
    	$this->load->view('member/v_payment', $data);	
    	$this->load->view('member/v_member_footer');
	}	

 	public function editprofil($id=''){
    	$data['title'] = 'Edit Profil';
    	$data['member'] = $this->db->get_where('member', ['id'=>$id])->row_array();
    	$this->load->view('v_edit_profil', $data);
    }

}
	