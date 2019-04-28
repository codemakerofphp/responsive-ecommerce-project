<?php

class admin_model extends CI_Model
{
	public function admin_login_check_info($admin_email_address,$admin_password)
	{
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where('admin_email_address',$admin_email_address);
		$this->db->where('admin_password',$admin_password);
		$query_result=$this->db->get();
		$result=$query_result->row();
		return $result;

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