<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->model('reportmodel');		
	}
	
	public function index()
	{
		
		$this->load->view('generate_report');
	}
	
	public function orderReport()
	{
		$datefrom = $this->input->post('date_from').' 00:00:00';
		$dateto = $this->input->post('date_to').' 23:59:59';
		$this->data['orders'] = $this->reportmodel->getreports($datefrom, $dateto);
		$this->load->view('reporting',$this->data);
	}
	
	public function products_view2($order_id)
	{		
		$this->data['order_items'] = $this->reportmodel->getOrderedProductsview2($order_id);		
		$this->load->view('products_view2',$this->data);
	}
}
	

?>