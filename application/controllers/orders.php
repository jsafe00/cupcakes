<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('ordermodel');		
	}
	
	private $id=0;
	
	public function index()
	{
        $config['base_url'] = site_url('orders/index');
		$config['total_rows'] = $this->ordermodel->getAllPendingOrders();  
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

        $data['orders'] = $this->ordermodel->getAllOrders($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('orders',$data);
	}
	
	public function edit($orderID)
	{
		$this->data['order'] = $this->ordermodel->getOrderByID($orderID);
		$this->load->view('edit_order',$this->data);
	}
	
	public function updateOrder()
	{
		$order = New OrderModel();
		$order->order_id = $this->input->post("order_id");
		$order->cupcake_name = $this->input->post("cupcake_name");
		$order->quantity = $this->input->post("quantity");
		$order->customer_name = $this->input->post("customer_name");
		$order->customer_address = $this->input->post("customer_address");
		$order->contact_no = $this->input->post("contact_no");
		$order->order_date = $this->input->post("order_date");
		$order->order_type = $this->input->post("order_type");
		$order->order_dp_date = $this->input->post("order_dp_date");
		$order->staff_name = $this->input->post("staff_name");
		$order->order_status = $this->input->post("order_status");
			$result = $this->ordermodel->updateorder($order);
			$this->session->set_userdata('order_id',$result);
			if($result == -1)
			{
			
				redirect('orders');
			}
			
			if($result)
			{
				redirect('orders');
				}
	}
	
	public function add()
	{
		$this->load->view('add_order');
	}
	
	public function addorder()
	{
		$order = New OrderModel();
		$order->order_id = $this->input->post("order_id");
		$order->cupcake_name = $this->input->post("cupcake_name");
		$order->quantity = $this->input->post("quantity");
		$order->customer_name = $this->input->post("customer_name");
		$order->customer_address = $this->input->post("customer_address");
		$order->contact_no = $this->input->post("contact_no");
		$order->order_date = $this->input->post("order_date");
		$order->order_type = $this->input->post("order_type");
		$order->order_dp_date = $this->input->post("order_dp_date");
		$order->staff_name = $this->input->post("staff_name");
		$order->order_status = $this->input->post("status");
			$result = $this->ordermodel->addorder($order);
			$this->session->set_userdata('order_id',$result);
			if($result == -1)
			{
				redirect('orders');
			}
			
			if($result)
			{
				redirect('orders/products/'.$result);
			}
	}
	
	public function processorder($order_id)
	{
		$this->ordermodel->processorder($order_id,$this->input->post("order_type"),$this->input->post("order_dp_date"));
		
		redirect('orders');
	}
	
	public function profile()
	{
		$this->data['order'] = $this->ordermodel->getorderByID($this->session->orderdata('order_id'));
		$this->load->view('profile',$this->data);
	}
	
	public function products($customer_id)
	{
		$order_id=$this->ordermodel->checkorder($customer_id);
		
	
		if($order_id==0)
			$order_id=$this->ordermodel->createorder($customer_id);
		
		
		$this->data['order_id'] = $order_id;
		$this->data['products'] = $this->ordermodel->getProducts();
		$this->data['ordered_products'] = $this->ordermodel->getOrderedProducts($order_id);
		$this->data['customer']=$customer_id;
		
		$this->load->view('products',$this->data);
	}
	
	public function products_view($order_id)
	{
		
		$this->data['order_items'] = $this->ordermodel->getOrderedProductsview($order_id);
		
		$this->load->view('products_view',$this->data);
	}
	
	
public function getAllProducts()
	{
        $config['base_url'] = site_url('orders/getAllProducts');
        $config['total_rows'] = $this->db->count_all('product');
        
        $data['orders'] = $this->ordermodel->getAllProducts($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('products',$data);
	}
	
	public function additems()
	{
		$this->load->view('add_orderitems');
	}
	
	public function addorderitems($contact_id)
	{
		$orderitems = New OrderModel();
		$orderitems->product_id = $this->input->post("product_id");
		$orderitems->order_id = $this->input->post("order_id");		
		$orderitems->quantity = $this->input->post("quantity");
		
			$result = $this->ordermodel->addOrderitems($orderitems);
			
			if($result == -1)
			{
				redirect('orders/products/'.$contact_id);
			}
			
			if($result)
			{
				
				redirect('orders/products/'.$contact_id);
			}
	}
	
	public function getorderitems(){
	
	 $config['base_url'] = site_url('orders/getorderitems');
        $config['total_rows'] = $this->db->count_all('order_item');
		
		$data['orders'] = $this->ordermodel->getorderitems($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('order_items',$data);
	
		}
		
		public function getfinalorder(){
	
	 $config['base_url'] = site_url('orders/getfinalorder');
        $config['total_rows'] = $this->db->count_all('order_id');
		
		$data['orders'] = $this->ordermodel->getfinalorder($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('order_id',$data);
	
		}
	function uploadProfilePicture()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '300';
		$config['max_width']  = '0';
		$config['max_height']  = '0';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());			
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
			redirect('orders/profile/');
		}
		else
		{
			$upload_data = $this->upload->data();
			$this->ordermodel->updateProfilePicture($upload_data['file_name']);			
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Profile Picture Successfully Updated.</div>');
			redirect('orders/profile/');
		}
	}
	
	public function changepass()
	{
		$this->load->view('edit_password');
	}
	
	public function cancel($orderID)
	{
		$this->data['order'] = $this->ordermodel->cancelOrderByID($orderID);
		
		redirect('orders');
	}
	
	public function cancelorderproductByID($order_item_id,$customer_id)
	{
		$this->data['order_item'] = $this->ordermodel->cancelOrderByItemID($order_item_id);
			
		redirect('orders/products/'.$customer_id);
	}
	
	
	
}

