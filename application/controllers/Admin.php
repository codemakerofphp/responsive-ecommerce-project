<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$admin_id=$this->session->userdata('admin_id');
		if ($admin_id!==NULL) {
			redirect('Super_admin');
		}
	}
	public function index()
	{
		$this->load->view('admin/adminlogin');
	}
	public function admin_login_check()
	{
		$admin_email_address = $this->input->post('admin_email_address');
		$admin_password =md5($this->input->post('admin_password'));
		$result=$this->admin_model->admin_login_check_info($admin_email_address,$admin_password);
		$sdata=array();
		if ($result) {
			$sdata['admin_id']=$result->admin_id;
			$sdata['admin_name']=$result->admin_name;
			$this->session->set_userdata($sdata);
			redirect('super_admin');
		}else{
			$sdata['exception']="user ID and Password Invalied";
			$this->session->set_userdata($sdata);
			redirect('admin');
		}
		
	}
	
	public function customer_login_check()
	{
		$email = $this->input->post('email');
		$password =$this->input->post('password');
		$sult=$this->admin_model->customer_login_check_info($email,$password);
		$sbdata=array();
		if ($result) {
			$sbdata['customer_id']=$result->customer_id;
			$sbdata['first_name']=$result->first_name;
			$this->session->set_userdata($sbdata);
			redirect('Checkout/shipping');
		}else{
			$sbdata['exception1']="user ID and Password Invalied";
			$this->session->set_userdata($sbdata);
			redirect('Checkout/add_registration');
		}
	}
}
?>