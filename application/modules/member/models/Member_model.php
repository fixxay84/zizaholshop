<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

	function dataProduct($limit, $start, $keyword = null){
		if($keyword){
			$this->db->like('kategori', $keyword);
			$this->db->or_like('harga', $keyword);
			$this->db->or_like('nama_product', $keyword);	
		}
		$this->db->select('*');
		$this->db->join('tb_kategori', 'product.id_kategori = tb_kategori.id');
		$this->db->order_by('product.id', 'DESC');
		return $this->db->get('product', $limit, $start)->result_array();
	}

	public function getKategori($limit, $start, $kategori=null){
		$this->db->join('tb_kategori', 'product.id_kategori = tb_kategori.id');
		$this->db->order_by('product.id', 'DESC');
		$this->db->where('kategori', $kategori);
		return $this->db->get('product', $limit, $start)->result_array();
	}

	function getprovince(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
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
	
}