<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$admin_id=$this->session->userdata('admin_id');
		if ($admin_id==NULL) {
			redirect('admin');
		}
	}
	
	public function index()
	{
		$data=array();
		$data['dashbord_content']=$this->load->view('admin/pages/dashbord_content','',true);
		$this->load->view('admin/admin_master',$data);
	}
	public function add_category()
	{
		$data=array();
		$data['dashbord_content']=$this->load->view('admin/pages/add_category','',true);
		$this->load->view('admin/admin_master',$data);
		
	}
	public function save_category()
	{
		$data=array();
		$data['category_name']=$this->input->post('category_name');
		$data['category_description']=$this->input->post('category_description');
		$data['category_status']=$this->input->post('category_status');
		$this->Super_admin_model->save_category_info($data);
		$sdata=array();
		$sdata['message']="Data Insert successful";
		$this->session->set_userdata($sdata);
		redirect('Super_admin/add_category');

	}
	public function manage_category()
	{
		$data=array();
		$data['all_category']=$this->Super_admin_model->select_all_category();
		$data['dashbord_content']=$this->load->view('admin/pages/manage_category',$data,true);
		$this->load->view('admin/admin_master',$data);
	}
	public function logout()
	{
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_name');
		$sdata=array();
		$sdata['massege']="Your are successfuly logout";
		$this->session->set_userdata($sdata);
		redirect('admin');
	}
	// public function customer_logout()
	// {
	// 	$this->session->unset_userdata('customer_id');
	// 	$this->session->unset_userdata('first_name');
	// 	// $sdata=array();
	// 	// $sdata['massege']="Your are successfuly logout";
	// 	// $this->session->set_userdata($sdata);
	// 	redirect('welcome/index');
	// }

	public function unpublished_category($category_id)
	{
		$this->Super_admin_model->unpublished_category_by_id($category_id);
		redirect('Super_admin/manage_category');

	}

	public function published_category($category_id)
	{
		$this->Super_admin_model->published_category_by_id($category_id);
		redirect('Super_admin/manage_category');

	}
	public function delete_category($category_id)
	{
		$this->Super_admin_model->delete_category_by_id($category_id);
		redirect('Super_admin/manage_category');
	}

	public function edit_category($category_id)
	{
		$data=array();
		$data['category_info']=$this->Super_admin_model->select_category_by_id($category_id);
		$data['dashbord_content']=$this->load->view('admin/pages/edit_category',$data,true);
		$this->load->view('admin/admin_master',$data);
	}
	public function update_category()
	{
		$data=array();
		$category_id=$this->input->post('category_id',true);
		$data['category_name']=$this->input->post('category_name',true);
		$data['category_description']=$this->input->post('category_description',true);
	    $this->Super_admin_model->update_category_info($data,$category_id);
	    redirect('Super_admin/manage_category');
	}
	public function add_manufacture()
	{
		$data=array();
		$data['dashbord_content']=$this->load->view('admin/pages/add_manufacture','',true);
		$this->load->view('admin/admin_master',$data);
	}

	public function save_manufacture()
	{
		$data=array();
		$data['manufacturer_name']=$this->input->post('manufacturer_name');
		$data['manufacturer_description']=$this->input->post('manufacturer_description');
		$data['publication_status']=$this->input->post('publication_status');
		$this->Super_admin_model->save_manufacturer_info($data);
		$sdata=array();
		$sdata['message']="Data Insert successful";
		$this->session->set_userdata($sdata);
		redirect('Super_admin/add_manufacture');

	}

	public function manage_manufacturer()
	{
		$data=array();
		$data['all_manufacturer']=$this->Super_admin_model->select_all_manufacturer();
		$data['dashbord_content']=$this->load->view('admin/pages/manage_manufacturer',$data,true);
		$this->load->view('admin/admin_master',$data);
	}

	public function unpublished_manufacturer($manufacturer_id)
	{
		$this->Super_admin_model->unpublished_manufacturer_by_id($manufacturer_id);
		redirect('Super_admin/manage_manufacturer');
	}
	public function published_manufacturer($mamufacturer_id)
	{
		$this->Super_admin_model->published_manufacturer_by_id($manufacturer_id);
		redirect('Super_admin/manage_manufacturer');
	}
	public function add_product()
	{
		$data=array();
		$data['published_category']=$this->Super_admin_model->select_all_published_category();
		$data['published_manufacturer']=$this->Super_admin_model->select_all_published_manufacturer();
		$data['dashbord_content']=$this->load->view('admin/pages/add_product',$data,true);
		$this->load->view('admin/admin_master',$data);
	}
	public function save_product()
	{
		// echo "<pre>";
		// print_r($this->input->post($_POST));
		// exit();
		$data=array();
		$data['product_name']=$this->input->post('product_name',true);
		$data['category_id']=$this->input->post('category_id',true);
		$data['manufacturer_id']=$this->input->post('manufacturer_id',true);
		$data['product_short_description']=$this->input->post('product_short_description',true);
		$data['product_long_description']=$this->input->post('product_long_description',true);
		$data['product_price']=$this->input->post('product_price',true);
		$data['product_new_price']=$this->input->post('product_new_price',true);
		$data['product_quantity']=$this->input->post('product_quantity',true);

		$is_featured=$this->input->post('is_featured',true);
		if ($is_featured=='on') {
			$data['is_featured']=1;
		}else{
			$data['is_featured']=0;
		}
  



        //Start image Upload

		$fdata=array();
		$error='';
        $config['upload_path']          = './product_images/';
        $config['allowed_types']        = 'gif|jpg|png|jepg';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        
        
        $this->load->library('upload',$config);
        //echo '<pre>';
       // print_r($_FILES);
        //exit();
        //$this->load->library('upload', $config);
       // $this->upload->initialize($config);
        if (!$this->upload->do_upload('product_image'))
        {
               $error = $this->upload->display_errors();
               echo $error;
              exit();
                //$this->load->view('upload_form', $error);
        }
        else
        {
                $fdata =$this->upload->data();
                

                //$this->load->view('upload_success', $data);
                $data['product_image']=$config['upload_path'].$fdata['file_name'];
                //echo '<pre>';
                //print_r($fdata);
                //exit();

        }
        
		
        // $data['product_image']=$this->input->post('product_image',true);
		//end image upload 
		$data['publication_status']=$this->input->post('publication_status',true);
		$this->Super_admin_model->save_product_info($data);
		$sdata['message']="Data Saved Successful";
		$this->session->set_userdata($sdata);
		redirect('Super_admin/add_product');
		

	}

	public function manage_product()
	{
		$data=array();
		$data['all_product']=$this->Super_admin_model->select_all_product();
		$data['dashbord_content']=$this->load->view('admin/pages/manage_product',$data,true);
		$this->load->view('admin/admin_master',$data);
	}

	public function unpublished_product($product_id)
	{
		$this->Super_admin_model->unpublished_product_by_id($product_id);
		redirect('Super_admin/manage_product');
	}
	public function published_product($product_id)
	{
		$this->Super_admin_model->published_product_by_id($product_id);
		redirect('Super_admin/manage_product');
	}


}
?>