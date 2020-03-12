<?php
class OrderModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
	
	public function getOrders()
	{
		$sql = $this->db->query("SELECT * FROM order");		
		if ($sql->num_rows() > 0)
		{
			return $sql->result();	
		}
		return 0;
	}
	
	function getAllPendingOrders()
	{
		$sql = $this->db->query("SELECT count(*) as total FROM `order` WHERE `order_status` <> 'Completed'");		
		if ($sql->num_rows() > 0)
		{
			return $sql->row()->total;	
		}
		return 0;
	}
	
	function getAllOrders($limit, $start)
    {
        
		$sql = "SELECT * FROM `order` INNER JOIN customer ON order.customer_id=customer.customer_id INNER JOIN user ON order.user_id=user.user_id WHERE order_status <> 'Completed' limit " . $start . ", " . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	public function getOrderByID($OrderID)
	{
		$sql = $this->db->query("SELECT * FROM `order` INNER JOIN `customer` ON `order`.`customer_id` = `customer`.`customer_id` INNER JOIN `user` ON `order`.`user_id` = `user`.`user_id` WHERE order_id = '$OrderID'");		
		if ($sql->num_rows() > 0)
		{
			return $sql->row();	
		}
		return 0;
	}
	
	public function updateOrder($order)
	{
		
		$sql = $this->db->query("UPDATE `order` SET `order_date` = ?, `order_type` = ?, `order_dp_date` = ?, `order_status` = ? WHERE order_id = ?",array($order->order_date, $order->order_type, $order->order_dp_date, $order->order_status, $order->order_id));
		
		return $this->db->affected_rows();
	}
	
	

	public function addOrder($order)
	{
		$sql = $this->db->query("SELECT * FROM `order` WHERE order_id LIKE '$order->order_id'");		
		if ($sql->num_rows() > 0)
		{
			return -1; 
		}
		$sql = $this->db->query("INSERT INTO `order` (`order_id`,`order_date`,`order_type`,`order_dp_date`,`user_id`,`order_status`) VALUES ('$order->order_id','$order->order_date','$order->order_type','$order->order_dp_date', '$order->user_id', '$order->order_status')");
		return $this->db->insert_id();
	}
	public function getProducts()
	{
		$sql = $this->db->query("SELECT * FROM product");		
		if ($sql->num_rows() > 0)
		{
			return $sql->result();	
		}
		return 0;
	}
	
	public function getOrderedProducts($order_id){
		$sql = $this->db->query("SELECT * FROM `order_items` INNER JOIN `product` ON `product`.`product_id` = `order_items`.`product_id` WHERE `order_items`.`order_id` = " . $order_id);		
		if ($sql->num_rows() > 0)
		{
			return $sql->result();	
		}
		return 0;
	}
	
	public function getOrderedProductsview($order_id){
		$sql = $this->db->query("SELECT * FROM `order_items` INNER JOIN `product` ON `product`.`product_id` = `order_items`.`product_id` WHERE `order_id` = " . $order_id);		
		if ($sql->num_rows() > 0)
		{
			return $sql->result();	
		}
		return 0;
	}

	
	function getAllProducts($limit, $start)
    {
        $sql = 'SELECT * FROM `product` LIMIT ' . $start . ', ' . $limit; 
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	public function getItems()
	{
		$sql = $this->db->query("SELECT * FROM order_items");		
		if ($sql->num_rows() > 0)
		{
			return $sql->result();	
		}
		return 0;
	}
	
	public function processorder($order_id,$order_type,$order_dp_date)
	{
		$sql = $this->db->query("UPDATE `order` SET `order_status` = 'In Process', `order_type`='".$order_type."', `order_dp_date`='".$order_dp_date."' WHERE order_id = ".$order_id);
		return $this->db->affected_rows();
	}
	
		public function addOrderitems($orderitems){
		
		$sql = $this->db->query("INSERT INTO `order_items` (`product_id`,`order_id`,`quantity`) VALUES ('$orderitems->product_id','$orderitems->order_id','$orderitems->quantity')");
		return $this->db->insert_id();
	}
	
	
	public function createorder($customer_id){
		
		$sql = $this->db->query("INSERT INTO `order` (`customer_id`, `order_status`, `user_id`) VALUES ('$customer_id','Pending', '".$this->session->userdata('user_id')."')");
		return $this->db->insert_id();
	}
	
	public function checkorder($customer_id){
		
		$sql = $this->db->query("SELECT * FROM `order` WHERE customer_id = '".$customer_id."' AND order_status = 'Pending'");		
		if ($sql->num_rows() > 0)
		{
			return $sql->row()->order_id;	
		}
		return 0;
	}
	
	public function getorderitems()
	{
		$sql = $this->db->query("SELECT * FROM `order_items` WHERE order_id LIKE '$getorderitems->order_id'");		
		if ($sql->num_rows() > 0)
		{
			return $sql->result();	
		}
		return 0;
	}

	
	public function getfinalOrder($final_order)
	{
		$sql = $this->db->query("SELECT * FROM `order_item` WHERE order_id LIKE '$final_order->order_id'");		
		if ($sql->num_rows() > 0)
		{
			return -1; 
		}
		
		
		
		$sql = $this->db->query("SELECT * FROM `order_items` INNER JOIN `product` ON `product`.`product_id` = `order_items`.`product_id` WHERE `order_items`.`order_id` = " . $order_id);
		return $this->db->insert_id();
	}
	
	public function cancelOrderByID($OrderID)
	{
		$sql = $this->db->query("DELETE FROM `order` WHERE order_id = '$OrderID'");		
	}
	
	public function cancelOrderByItemID($order_item_id)
	{
		$sql = $this->db->query("DELETE FROM `order_items` WHERE order_item_id = '$order_item_id'");		
		
		
	}
	
	public function updateProfile($user)
	{
		$sql = $this->db->query("UPDATE `user` SET `firstname` = ?, `lastname` = ?, `email` = ?, `status` = ? WHERE user_id = ?",array($user->firstname,$user->lastname,$user->email,$user->status,$this->session->userdata('user_id')));
		return $this->db->affected_rows();
	}
	
	public function updateProfilePicture($profile_picture)
	{
		$sql = $this->db->query("UPDATE `user` SET `profile_picture` = ? WHERE user_id = ?",array($profile_picture,$this->session->userdata('user_id')));
		return $this->db->affected_rows();
	}
	
	
}
?>