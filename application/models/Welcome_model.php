<?php

class welcome_model extends CI_Model
{
	
	public function select_all_published_product()
	{
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('publication_status',1);
		$this->db->limit(12);
		$query_result=$this->db->get();
		$result=$query_result->result();
		return $result;

	}
	public function select_all_slider_product()
	{
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('is_featured',1);
		//$this->db->limit(12);
		$query_result=$this->db->get();
		$result=$query_result->result();
		return $result;
	}

	
	public function select_published_product_by_category($category_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('publication_status',1);
		$this->db->where('category_id',$category_id);
		$query_result=$this->db->get();
		$result=$query_result->result();
		return $result;
		
	}

	public function select_published_product_by_manufacturer($manufacturer_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_product');
		//$this->db->where('publication_status',1);
		$this->db->where('manufacturer_id',$manufacturer_id);
		$query_result=$this->db->get();
		$result=$query_result->result();
		return $result;
		
	}

	public function product_details_by_id($product_id)
	{
		$this->db->select('tbl_product.*,tbl_manufacturer.manufacturer_name');
		$this->db->from('tbl_product');
		$this->db->join('tbl_manufacturer', 'tbl_manufacturer.manufacturer_id = tbl_product.manufacturer_id');
		$this->db->where('product_id',$product_id);
		$query_result=$this->db->get();
		$result=$query_result->row();
		return $result;
	}
	public function select_all_recommonded_product()
	{
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->where('publication_status',1);
		$this->db->limit(3);
		$query_result=$this->db->get();
		$result=$query_result->result();
		return $result;
		
	}
}	
	
?>