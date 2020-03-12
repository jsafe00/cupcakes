<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');		
		$this->load->library('session');		
		$this->load->model('loginModel');
	}
	
	public function index()
	{
		$this->load->view('login');
	}
	
	public function authenticate()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$result = $this->loginModel->validateLogin($username, $password);
		
		if ($result)
		{
			$this->session->set_userdata('user_id',$result->user_id);
			$this->session->set_userdata('staff_name',$result->firstname);
			$this->session->set_userdata('username',$result->username);
			redirect('orders');
		}
		else
		{
			redirect('login');		
		}
	}
}
