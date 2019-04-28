<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller{
	public function manage_invoice()
	{
		$data=array();
		$data['all_invoice']=$this->invoice_model->select_all_invoice();
		// echo "<pre>";
		// print_r($data);
		// exit();
		$data['dashbord_content']=$this->load->view('admin/pages/manage_invoice',$data,true);
		$this->load->view('admin/admin_master',$data);
	}
}
?>