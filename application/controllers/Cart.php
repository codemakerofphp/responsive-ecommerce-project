<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	}
	public function add_to_cart()
	{
		$data=array();
		$qnt=$this->input->post('qut');
		// echo "<pre>";
		// print_r($qnt);
		// exit();
		$product_id=$this->input->post('product_id');

		$product_info=$this->Welcome_model->product_details_by_id($product_id);
		//echo "<pre>";
		//print_r($product_info);
		//exit();
		$data = array(
        'id'      => $product_info->product_id,
        'qty'     => $qnt,
        'price'   => $product_info->product_price,
        'name'    => $product_info->product_name,
        'options' => array('image' =>$product_info->product_image));

         $this->cart->insert($data);
         
		redirect('Cart/show_cart');
		
         //$this->show_cart();
	}
	public function show_cart()
	{
		$data=array();
		$data['maincontent']=$this->load->view('pages/view_cart',$data,true);
		$this->load->view('master',$data);
	}
	public function update_quantity()
	{
		$qty=$this->input->post('qty');
		$rowid=$this->input->post('rowid');
		$data = array(
        'rowid' => $rowid,
        'qty'   => $qty
         );

         $this->cart->update($data);
         redirect('Cart/show_cart');
	}
    public function delete_cart($rowid)
    {
    	
		$data = array(
        'rowid' => $rowid,
        'qty'   => 0
         );

         $this->cart->update($data);
         redirect('Cart/show_cart');
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