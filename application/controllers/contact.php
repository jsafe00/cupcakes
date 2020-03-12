<?php 

class Contact extends CI_Controller
{

	public function index(){
		$this->load->view('header_view');
		$this->load->view('contact_view');
		$this->load->view('copyright_view');
		
		
	}
	}
?>