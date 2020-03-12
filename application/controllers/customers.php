<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('customermodel');		
	}
	
	public function index()
	{
        $config['base_url'] = site_url('customers/index');
		$config['total_rows'] = $this->db->count_all('customer');
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

        $data['customers'] = $this->customermodel->getAllCustomers($config["per_page"], $data['page']);           
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('customers',$data);
	}
	public function cancelCustomerByID($customer_id)
	{
		$this->data['customer'] = $this->customermodel->cancelCustomerByItemID($customer_id);
		
		redirect('customers');
	}
	
	public function add()
	{
		$this->load->view('add_customer');
	}
	
	public function addCustomer()
	{
		$customer = New CustomerModel();
		$customer->customer_name = $this->input->post("customer_name");
		$customer->customer_address = $this->input->post("customer_address");
		$customer->contact_no = $this->input->post("contact_no");
				
		
		$this->form_validation->set_rules('customer_name', 'Customer_name', 'required');
		$this->form_validation->set_rules('customer_address', 'Customer_address', 'required');
		$this->form_validation->set_rules('contact_no', 'Contact_no', 'required');
			
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->data['customer'] = $customer;
			$this->load->view('add_customer',$this->data);
		}
		else
		{
			$result = $this->customermodel->addcustomer($customer);
			
			if($result == -1)
			{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Customer already exist.</div>');
				redirect('customers');
			}
			
			if($result)
			{
				
				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Customer Successfully Added.</div>');
				redirect('customers');
			}
		}
	}
	
	public function edit($customerID)
	{
		$this->data['customer'] = $this->customermodel->getCustomerByID($customerID);
		$this->load->view('edit_customer',$this->data);
	}
	
	public function updateCustomer()
	{
		$customer = New CustomerModel();
		$customer->customer_id = $this->input->post("customer_id");
		$customer->customer_name = $this->input->post("customer_name");
		$customer->customer_address = $this->input->post("customer_address");
		$customer->contact_no = $this->input->post("contact_no");
	
		
		$this->form_validation->set_rules('customer_name', 'Customer_name', 'required');
		$this->form_validation->set_rules('customer_address', 'Customer_address', 'required');
		$this->form_validation->set_rules('contact_no', 'contact_no', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->data['customer'] = $customer;
			$this->load->view('edit_customer',$this->data);
		}
		else
		{	
			$result = $this->customermodel->updateCustomer($customer);
				
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Customer Successfully Updated.</div>');
			redirect('customers');
		}
	}
	
}
