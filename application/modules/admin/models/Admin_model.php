<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function getKategori(){
		$this->db->select('*');
		$this->db->from('tb_kategori');
		$this->db->join('product', 'product.id_kategori = tb_kategori.id', 'right');
		return $this->db->get()->result_array();
	}

	public function getKategoriById(){
		$this->db->select('*');
		$this->db->from('tb_kategori');
		$this->db->join('product', 'product.id_kategori = tb_kategori.id', 'right');
		return $this->db->get()->row_array();
	}

 	function getRevenue(){
        $this->db->select("YEAR(time) as year, sum(total) as total");
        $this->db->from("tbl_order");
        $this->db->where('transaction_status', 'settlement');
        $this->db->group_by('year(time)');
        return $this->db->get()->result_array();
    }

    function getPercentage(){//report qty svo diagram pie
	    $this->db->select("year(time) as time, count(time) as id");
        $this->db->from('tbl_order');
        $this->db->where('transaction_status', 'settlement');
        $this->db->group_by("year(time)");
	    return $this->db->get()->result_array();
    }

// Chart of Trx Status
 	function getCountOrderChartColumn(){
        $this->db->select("count(transaction_status) as count, transaction_status as stt");
        $this->db->from("tbl_order");
        $this->db->group_by('transaction_status');
        return $this->db->get()->result_array();
    }

    function getPercentage_qtyorder(){
	    $this->db->select("transaction_status as status, count(order_id) as order_id");
        $this->db->from('tbl_order');
        $this->db->group_by('transaction_status');
	    return $this->db->get()->result_array();
    }
// end Chart of Trx Status

// Chart of Member
 	function getCountMemberChartColumn(){
        $this->db->select("count(email) as email, date_created as date");
        $this->db->from("member");
        $this->db->group_by('date_created');
        return $this->db->get()->result_array();
    }

    function getPercentage_member(){
	    $this->db->select("date_created as year, count(id) as id");
        $this->db->from('member');
        $this->db->group_by('date_created');
	    return $this->db->get()->result_array();
    }
// end Chart of Member


// Chart of Product
 	function getCountProductChartColumn(){
        $this->db->select("count(kategori) as kategori, kategori as ktgr");
        $this->db->from("product");
		$this->db->join('tb_kategori', 'product.id_kategori = tb_kategori.id', 'right');
        $this->db->group_by('kategori');
        $this->db->order_by("count(kategori)", "DESC");
        return $this->db->get()->result_array();
    }

    function getPercentage_product(){
	    $this->db->select("kategori as ktgr, count(kategori) as kategori");
        $this->db->from('product');
		$this->db->join('tb_kategori', 'product.id_kategori = tb_kategori.id', 'right');
        $this->db->group_by('kategori');
	    return $this->db->get()->result_array();
    }
// end Chart of Product

}