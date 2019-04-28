<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data=array();
		$data['recommended']=true;

		$data['slider']=true;
		$data['brand_category']=true;
		$data['slider_product']=$this->Welcome_model->select_all_slider_product();
		$data['slider_page']=$this->load->view('pages/slider',$data,true);
		$data['recommended_product']=$this->Welcome_model->select_all_recommonded_product();
		$data['recommended_page']=$this->load->view('pages/recommended',$data,true);
		$data['published_product']=$this->Welcome_model->select_all_published_product();
		$data['maincontent']=$this->load->view('pages/home_content',$data,true);
		$this->load->view('master',$data);
	}
	public function product_category($category_id)
	{
		$data=array();
		//$data['slider']=true;
		$data['recommended']=true;
		$data['brand_category']=true;
		$data['recommended_product']=$this->Welcome_model->select_all_recommonded_product();
		$data['recommended_page']=$this->load->view('pages/recommended',$data,true);
		$data['published_product']=$this->Welcome_model->select_all_published_product();
		$data['published_product_category']=$this->Welcome_model->select_published_product_by_category($category_id);
		$data['maincontent']=$this->load->view('pages/category_product',$data,true);
		$this->load->view('master',$data);
	}
	public function get_manufacturer_product($manufacturer_id)
	{
		$data=array();
		//$data['slider']=true;
		$data['recommended']=true;
		$data['brand_category']=true;
		$data['recommended_product']=$this->Welcome_model->select_all_recommonded_product();
		$data['recommended_page']=$this->load->view('pages/recommended',$data,true);
		$data['published_product']=$this->Welcome_model->select_all_published_product();
		$data['published_product_manufacturer']=$this->Welcome_model->select_published_product_by_manufacturer($manufacturer_id);
		$data['maincontent']=$this->load->view('pages/product_by_brand',$data,true);
		$this->load->view('master',$data);
	}
	public function product_details($product_id)
	{
		$data=array();
		$data['recommended']=true;
		$data['brand_category']=true;
		$data['recommended_product']=$this->Welcome_model->select_all_recommonded_product();
		$data['recommended_page']=$this->load->view('pages/recommended',$data,true);
		$data['product_info']=$this->Welcome_model->product_details_by_id($product_id);
		//echo "<pre>";
		//print_r($data['product_info']);
		//exit();
		$data['maincontent']=$this->load->view('pages/product_details',$data,true);
		$this->load->view('master',$data);

	}
	public function account()
	{
		$data=array();
		$data['brand_category']=true;
		$data['maincontent']=$this->load->view('pages/account','',true);
		$this->load->view('master',$data);
	}

	

}
