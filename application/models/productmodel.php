<?php
class ProductModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
	
	function getAllProducts($limit, $start)
    {
        $sql = 'SELECT * FROM `product` LIMIT ' . $start . ', ' . $limit; 
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	public function cancelProductByID($ProductID)
	{
		$sql = $this->db->query("DELETE FROM `product` WHERE product_id = '$ProductID'");		
		
		
	}
	
	public function addproduct($allproducts)
	{
		$sql = $this->db->query("INSERT INTO `product` (`product_id`,`product_name`,`price`,`description`,`status`) VALUES ('$allproducts->product_id','$allproducts->product_name','$allproducts->price','$allproducts->description','$allproducts->status')");
		return $this->db->insert_id();
	}

	public function getProductByID($productID)
	{
		$sql = $this->db->query("SELECT * FROM product WHERE product_id = '$productID'");		
		if ($sql->num_rows() > 0)
		{
			return $sql->row();	
		}
		return 0;
	}
	
	public function updateProduct($product)
	{
		
		$sql = $this->db->query("UPDATE `product` SET `product_name` = ?, `price` = ?, `description`= ?, `status` = ? WHERE product_id = ?",array($product->product_name,$product->price,$product->description,$product->status,$product->product_id));
		return $this->db->affected_rows();
	}
	
	public function uploadProductPicture($product_picture)
	{
		$sql = $this->db->query("UPDATE `product` SET `product_picture` = ? WHERE product_id = ?",array($product_picture,$this->session->userdata('product_id')));
		return $this->db->affected_rows();
	}

}
?>