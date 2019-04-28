<?php

class Checkout_model extends CI_Model
{
	public function save_customer_info($data)
	{
		$this->db->insert('tbl_customer',$data);
		$customer_id=$this->db->insert_id();
		return $customer_id;
	}
	public function save_shipping_info($data)
	{
		$this->db->insert('tbl_shipping',$data);
		$shipping_id=$this->db->insert_id();
		return $shipping_id;
		
	}
	public function save_payment_info($data)
	{
		$this->db->insert('tbl_payment',$data);
		$payment_id=$this->db->insert_id();
		return $payment_id;
	}
	public function save_order_info($ordata)
	{
		$this->db->insert('tbl_order',$ordata);
		$order_id=$this->db->insert_id();
		return $order_id;
	}

	public function save_order_details_info($od_data)
	{
		$this->db->insert('tbl_order_detail',$od_data);
		$order_id=$this->db->insert_id();
		return $order_id;
	}
		public function customer_login_check_info($email,$password)
	{
		$this->db->select('*');
		$this->db->from('tbl_customer');
		$this->db->where('email_address',$email);
		$this->db->where('password',$password);
		$query_result=$this->db->get();
		$sult=$query_result->row();
		
		return $sult;

	}
	
}
?>