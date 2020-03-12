<?php
class LoginModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	public function validateLogin($username,$password)
	{
		$sql = $this->db->query("SELECT * FROM `user` WHERE username=? AND password=?",array($username,$password));
		
		if ($sql->num_rows() > 0)
		{
			return $sql->row();	
		}
		return 0;
	}
}
?>