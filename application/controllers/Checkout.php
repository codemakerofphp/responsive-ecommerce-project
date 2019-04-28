<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	public function add_registration()
	{
		$data=array();
		$data['maincontent']=$this->load->view('pages/checkout','',true);
		$this->load->view('master',$data);
	}
	public function save_customer()
	{
		$data=array();
		$data['first_name']=$this->input->post('first_name');
		$data['last_name']=$this->input->post('last_name');
		$data['email_address']=$this->input->post('email_address');
		$data['password']=$this->input->post('password');

		
		$customer_id=$this->Checkout_model->save_customer_info($data);
		$sdata=array();
		$sdata['customer_id']=$customer_id;
		$this->session->set_userdata($sdata);
		redirect('Checkout/shipping');
	}
	public function shipping()
	{
		$data=array();
		$data['maincontent']=$this->load->view('pages/shipping','',true);
		$this->load->view('master',$data);
	}

	public function save_shipping()
	{
		$data=array();
		$data['name']=$this->input->post('name');
		$data['email_address']=$this->input->post('email_address');
		$data['address']=$this->input->post('address');
		$data['mobile_number']=$this->input->post('mobile_number');
		$data['city']=$this->input->post('city');
		$data['country']=$this->input->post('country');
		$data['zipcode']=$this->input->post('zipcode');
		$shipping_id=$this->Checkout_model->save_shipping_info($data);
		$sdata=array();
		$sdata['shipping_id']=$shipping_id;
		$this->session->set_userdata($sdata);
		redirect('Checkout/payment');
	}
	public function payment()
	{
		$data=array();
		$data['maincontent']=$this->load->view('pages/payment','',true);
		$this->load->view('master',$data);
	}
	public function confirm_order()
	{
		$payment_method=$this->input->post('payment_method',true);
		$data=array();
		$data['payment_method']=$payment_method;
		$payment_id=$this->Checkout_model->save_payment_info($data);
		$ordata=array();
		$ordata['customer_id']=$this->session->userdata('customer_id');
		$ordata['shipping_id']=$this->session->userdata('shipping_id');
		$ordata['payment_id']=$payment_id;
		$ordata['order_total']=$this->session->userdata('g_total');
		$order_id=$this->Checkout_model->save_order_info($ordata);

		$contents=$this->cart->contents();
		
        $od_data=array();
        foreach ($contents as $v_data) {
        	$od_data['order_id']=$order_id;
        	$od_data['product_id']=$v_data['id'];
        	$od_data['product_name']=$v_data['name'];
        	$od_data['product_price']=$v_data['price'];
        	$od_data['product_sales_quantity']=$v_data['qty'];
        	$order_details_id=$this->Checkout_model->save_order_details_info($od_data);

        }
       

		redirect('Checkout/payment');
		// if ($payment_method=='cash_on_delivery') {
			
		// }
		// if ($payment_method=='paypal') {
			
		// }
	}

	public function place_order()
	{
		$payment_type=$this->input->post('payment_type',true);
		if ($payment_type=='cash_on_delivery') {
			
		}
		if ($payment_type=='ssl_comerze') {
		//	redirect('Checkout/requestssl')
		}
		if ($payment_type=='paypal') {
			
		}
	}

	  public function customer_login_check()
	{
		$email = $this->input->post('email');
		$password =$this->input->post('password');

		$sult=$this->Checkout_model->customer_login_check_info($email,$password);
		$sbdata=array();
		if ($sult) {
			$sbdata['customer_id']=$sult->customer_id;
			$sbdata['first_name']=$sult->first_name;
			$this->session->set_userdata($sbdata);
			redirect('Checkout/shipping');
		}else{
			$sbdata['exception1']="user ID and Password Invalied";
			$this->session->set_userdata($sbdata);
			redirect('Checkout/add_registration');
		}
	}

	public function customer_logout()
	{
		$this->session->unset_userdata('customer_id');
		$this->session->unset_userdata('first_name');
		// $sdata=array();
		// $sdata['massege']="Your are successfuly logout";
		// $this->session->set_userdata($sdata);
		redirect('welcome/index');
	}





//    //API code
// 	public function requestssl() { 
// 		if($this->input->get_post('submit')) {
// 		 $full_name = $this->input->post('fname');
// 	     $email = $this->input->post('email');
// 	     $phone = $this->input->post('phone');
// 		 $amount = $this->input->post('amount');
// 		 $country = $this->input->post('country');
// 		 $address = $this->input->post('address');
// 		 $street = $this->input->post('street');
// 		 $state = $this->input->post('state'); 
// 		 $city = $this->input->post('city');
// 		  $postcode =	$this->input->post('postcode');

//   	$post_data = array();
//   	$post_data['store_id'] = SSLCZ_STORE_ID;
//   	$post_data['store_passwd'] = SSLCZ_STORE_PASSWD;
//   	$post_data['total_amount'] = $amount;
//   	$post_data['currency'] = "BDT"; 
//   	$post_data['tran_id'] = uniqid()."_sslc";
//   	$post_data['success_url'] = "http://localhost/SSLW/index.php/validate";
//   	$post_data['fail_url'] = "http://localhost/SSLW/index.php/fail";
//   	$post_data['cancel_url'] = "http://localhost/SSLW/index.php/cancel";
//   	# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

//   	# EMI INFO
//   	# $post_data['emi_option'] = "0"; 	if "1" then remove comment emi_max_inst_option and emi_selected_inst
//   	# $post_data['emi_max_inst_option'] = "9";
//   	# $post_data['emi_selected_inst'] = "9";

//   	# CUSTOMER INFORMATION
//   	$post_data['cus_name'] = $full_name;
//   	$post_data['cus_email'] = $email;
//   	$post_data['cus_add1'] = $address;
//   	$post_data['cus_add2'] = "";
//   	$post_data['cus_city'] = $city;
//   	$post_data['cus_state'] = $state;
//   	$post_data['cus_postcode'] = "1000";
//   	$post_data['cus_country'] = $country;
//   	$post_data['cus_phone'] = $phone;
//   	$post_data['cus_fax'] = "";

//   	# SHIPMENT INFORMATION
//   	$post_data['ship_name'] = "Store Test";
//   	$post_data['ship_add1 '] = "Dhaka";
//   	$post_data['ship_add2'] = "Dhaka";
//   	$post_data['ship_city'] = "Dhaka";
//   	$post_data['ship_state'] = "Dhaka";
//   	$post_data['ship_postcode'] = "1000";
//   	$post_data['ship_country'] = "Bangladesh";

//   	# OPTIONAL PARAMETERS
//   	$post_data['value_a'] = "ref001";
//   	$post_data['value_b '] = "ref002";
//   	$post_data['value_c'] = "ref003";
//   	$post_data['value_d'] = "ref004";

//   	# CART PARAMETERS
//   	$post_data['cart'] = json_encode(array(
//   	    array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
//   	    array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
//   	    array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
//   	    array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")    
//   	));
//   	$post_data['product_amount'] = "100";
//   	$post_data['vat'] = "5";
//   	$post_data['discount_amount'] = "5";
//   	$post_data['convenience_fee'] = "3";

//   	$this->load->library('session');

//   	$session = array(
//   		'tran_id' => $post_data['tran_id'],
//   		'amount' => $post_data['total_amount'],
//   		'currency' => $post_data['currency']
//   	);
//   	$this->session->set_userdata('tarndata', $session);


//   	#$this->load->library('sslcommerz');
//   	echo "<pre>";
//   	print_r($post_data);
//   	if($this->sslcommerz->RequestToSSLC($post_data, false))
//   	{
//   		echo "Pending";
//   		#***************************************
//   		# Change your database status to Pending.
//   		#***************************************
//   	}
//   }
// }

// public function validateresponse() { # $this->load->library('sslcommerz'); $database_order_status = 'Pending'; # Check this from your database here Pending is dummy data. $sesdata = $this->session->userdata('tarndata');

//   if(($sesdata['tran_id'] == $_POST['tran_id']) && ($sesdata['amount'] == $_POST['amount']) && ($sesdata['currency'] == $_POST['currency']))
//   {
//   	if($this->sslcommerz->ValidateResponse($_POST['amount'], $_POST['currency'], $_POST))
//   	{
//   		if($database_order_status == 'Pending')
//   		{
//   			#****************************************************************************
//   			# Change your database status to Processing & You can redirect to success page from here
//   			#*****************************************************************************
//   			echo "Transaction Successful<br>";
//   			echo "Processing";
//   			echo "<pre>";
//   			print_r($_POST);exit;
//   		}
//   		else
//   		{
//   			#*****************************************************************
//   			# Just redirect to your success page status already changed by IPN.
//   			#*****************************************************************
//   			echo "Just redirect to your success page";
//   		}
//   	}
//   }
// } public function fail() { $database_order_status = 'FAILED'; #Check this from your database here Pending is dummy data, if($database_order_status == 'FAILED') { #***************************************************************************** # Change your database status to FAILED & You can redirect to failed page from here #***************************************************************************** echo "";
// print_r($_POST);
// echo "Transaction Faild";
// }
// else
// {
// #******************************************************************
// # Just redirect to your success page status already changed by IPN.
// #******************************************************************
// echo "Just redirect to your failed page";
// }
// }
// public function cancel()
// {
// $database_order_status = 'CANCELLED'; # Check this from your database here Pending is dummy data,
// if($database_order_status == 'CANCELLED')
// {
// #*****************************************************************************
// # Change your database status to CANCELLED & You can redirect to cancelled page from here
// #******************************************************************************
// echo "";
// print_r($_POST);
// echo "Transaction Canceled";
// }
// else
// {
// #******************************************************************
// # Just redirect to your cancelled page status already changed by IPN.
// #******************************************************************
// echo "Just redirect to your failed page";
// }
// }
// public function ipn()
// {
// #$this->load->library('sslcommerz');
// $database_order_status = 'Pending'; # Check this from your database here Pending is dummy data,
// $store_passwd = SSLCZ_STORE_PASSWD;
// if($ipn = $this->sslcommerz->ipn_request($store_passwd, $_POST))
// {
// if(($ipn['gateway_return']['status'] == 'VALIDATED' || $ipn['gateway_return']['status'] == 'VALID') && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS')
// {
// if($database_order_status == 'Pending')
// {
// echo $ipn['gateway_return']['status']."";
// echo $ipn['ipn_result']['hash_validation_status']."";
// #*****************************************************************************
// # Check your database order status, if status = 'Pending' then chang status to 'Processing'.
// #******************************************************************************
// }
// }
// elseif($ipn['gateway_return']['status'] == 'FAILED' && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS')
// {
// if($database_order_status == 'Pending')
// {
// echo $ipn['gateway_return']['status']."";
// echo $ipn['ipn_result']['hash_validation_status']."";
// #*****************************************************************************
// # Check your database order status, if status = 'Pending' then chang status to 'FAILED'.
// #******************************************************************************
// }
// }
// elseif ($ipn['gateway_return']['status'] == 'CANCELLED' && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS')
// {
// if($database_order_status == 'Pending')
// {
// echo $ipn['gateway_return']['status']."";
// echo $ipn['ipn_result']['hash_validation_status']."";
// #*****************************************************************************
// # Check your database order status, if status = 'Pending' then chang status to 'CANCELLED'.
// #******************************************************************************
// }
// }
// else
// {
// if($database_order_status == 'Pending')
// {
// echo "Order status not ".$ipn['gateway_return']['status'];
// #*****************************************************************************
// # Check your database order status, if status = 'Pending' then chang status to 'FAILED'.
// #******************************************************************************
// }
// }
// echo "";
// print_r($ipn);
// }
// }







}
?>