<?php 

class Homepage extends CI_Controller
{

	public function index(){
		$this->load->view('header_view');
		$this->load->view('banner_view'); 
		$this->load->view('inside_view');
		$this->load->view('copyright_view');
	}
	}
?>