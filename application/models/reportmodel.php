<?php
class ReportModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
		
	public function countOrdersByStatus($status)
	{
		$sql = "SELECT count(*) as total FROM `order` WHERE order_status = 'Completed'";
        $query = $this->db->query($sql);
        return $query->row()->total;
	}
	
	public function getAllOrders($limit, $start)
    {
        $sql = "SELECT * FROM `order` WHERE order_status = 'Completed' limit " . $start . ", " . $limit;
		$query = $this->db->query($sql);
        return $query->result();
    }
	
	
	
	public function getOrderedProductsview2($order_id){
		$sql = $this->db->query("SELECT * FROM `order_items` INNER JOIN `product` ON `product`.`product_id` = `order_items`.`product_id` WHERE `order_id` = " . $order_id);		
		if ($sql->num_rows() > 0)
		{
			return $sql->result();	
		}
		return 0;
	}
	
	public function getreports($datefrom, $dateto){
		$sql = $this->db->query("SELECT * FROM `order` INNER JOIN `customer` ON `customer`.`customer_id` = `order`.`customer_id` INNER JOIN `user` ON `order`.`user_id` = `user`.`user_id` WHERE `order`.`order_date` BETWEEN  '".$datefrom."' AND '".$dateto."'");		
		if ($sql->num_rows() > 0)
		{
			return $sql->result();	
		}
		return 0;
	}
	
}
?>