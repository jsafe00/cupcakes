<?php
class AddproductModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
	
	public function addproduct($allproducts)
	{
		$sql = $this->db->query("SELECT * FROM `product` WHERE product_id LIKE '$allproduct->product_id'");		
		if ($sql->num_rows() > 0)
		{
			return -1; 
		}
		$sql = $this->db->query("INSERT INTO `product` (`product_id`,`product_name`,`price`,`description`,`status`) VALUES ('$allproducts->product_id','$allproducts->product_name','$allproducts->price','$allproducts->description','$allproducts->status')");
		return $this->db->insert_id();
	}
	
	}
	
?>