<?php
class CustomerModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
	
	function getAllCustomers($limit, $start)
    {
        $sql = 'SELECT * FROM `customer` ORDER BY `customer_name` ASC LIMIT '   . $start . ', ' . $limit; 
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	public function cancelCustomerByItemID($CustomerID)
	{
		$sql = $this->db->query("DELETE FROM `customer` WHERE customer_id = '$CustomerID'");		
		
		
	}
	
	public function addCustomer($customer)
	{
		$sql = $this->db->query("INSERT INTO `customer` (`customer_id`,`customer_name`,`customer_address`,`contact_no`) VALUES ('$customer->customer_id','$customer->customer_name','$customer->customer_address','$customer->contact_no')");
		return $this->db->insert_id();
	}
	
	public function getCustomerByID($customerID)
	{
		$sql = $this->db->query("SELECT * FROM customer WHERE customer_id = '$customerID'");		
		if ($sql->num_rows() > 0)
		{
			return $sql->row();	
		}
		return 0;
	}
	
	public function updateCustomer($customer)
	{

		$sql = $this->db->query("UPDATE `customer` SET `customer_name` = ?, `customer_address` = ?, `contact_no` = ? WHERE customer_id = ?",array($customer->customer_name,$customer->customer_address,$customer->contact_no,$customer->customer_id,));
		return $this->db->affected_rows();
	}

	}
?>