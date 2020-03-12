<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addproducts extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('addproductmodel');		
	}
	
	public function addproduct()
	{
		$this->load->view('add_products');
	}
	
	public function addproducts()
	{
		$addproduct = New AddproductModel();
		$addproduct->product_id = $this->input->post("product_id");
		$addproduct->product_name = $this->input->post("product_name");
		$addproduct->price = $this->input->post("price");
		$addproduct->status = $this->input->post("status");
		
		
		
		
			$result = $this->addproductmodel->addproduct($allproducts);
			$this->session->set_userdata('product_id',$result);
			if($result == -1)
			{
				
				redirect('allproducts');
			}
			
			if($result)
			{
				
				
				redirect('allproducts'.$result);
			}
		
		
		function uploadProductPicture()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());			
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
			redirect('products/addproducts/');
		}
		else
		{
			$upload_data = $this->upload->data();
			$this->productmodel->uploadProductPicture($upload_data['file_name']);			
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Profile Picture Successfully Updated.</div>');
			redirect('products/addproducts/');
		}
	}
	}
	}