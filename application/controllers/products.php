<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('productmodel');		
	}
	
	public function index()
	{
        $config['base_url'] = site_url('products/index');
		$config['total_rows'] = $this->db->count_all('product');
        $config['per_page'] = "5";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['products'] = $this->productmodel->getAllProducts($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('allproducts',$data);
	}
	public function cancelProductByID($product_id)
	{
		$this->data['product'] = $this->productmodel->cancelProductByID($product_id);
		
		redirect('products');
	}
	
	public function add()
	{
		$this->load->view('add_product');
	}
	
	public function addProduct()
	{
		$product = New ProductModel();
		$product->product_id = $this->input->post("product_id");
		$product->product_name = $this->input->post("product_name");
		$product->price = $this->input->post("price");
		$product->description = $this->input->post("description");
		$product->status = $this->input->post("status");
			$result = $this->productmodel->addproduct($product);
			$this->session->set_userdata('product_id',$result);
			if($result == -1)
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Product not successfully added.</div>');
				redirect('products');
			}
			
			if($result)
			{				
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Product Successfully Added.</div>');
				redirect('products');
			}
	}
	
	public function edit($productID)
	{
		$this->data['product'] = $this->productmodel->getProductByID($productID);
		$this->load->view('edit_product',$this->data);
	}
	
	public function uploadpicture($productID)
	{
		$this->session->set_userdata('product_id',$productID);
		$this->load->view('uploadproductpicture');
		

	
	}
	public function updateProduct()
	{
		$product = New ProductModel();
		$product->product_id = $this->input->post("product_id");
		$product->product_name = $this->input->post("product_name");
		$product->price = $this->input->post("price");
		$product->description = $this->input->post("description");
		$product->status = $this->input->post("status");

		{	
		
			$result = $this->productmodel->updateProduct($product);
				
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Product Successfully Updated.</div>');
			redirect('products');
		}
		
	}
	
	function uploadProductPicture()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);
		
		$result = $this->productmodel->uploadProductPicture($product);
		

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());			
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
			redirect('products/');
		}
		else
		{
			$upload_data = $this->upload->data();
			$this->productmodel->uploadProductPicture($upload_data['file_name']);			
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Product Picture Successfully Updated.</div>');
			redirect('products/');
		}
	}
	
}
