<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{
    public function __construct(){
        parent::__construct();
           
    }

     public function add($condition){
        
        if($this->db->insert('users',$condition))
        return TRUE;
        else
        return FALSE;
    }
	
    public function check($email){
		$condition=array("user_email" => "$email");
         $this->db->select('*');
          $this->db->from('users');
          $this->db->where($condition);
          $checking= $this->db->get();
          return $checking;
    }
	
	 public function login_check($email,$password){
			$condition=array("user_email" => "$email", "user_password" => "$password");
          $this->db->select('*');
          $this->db->from('users');
          $this->db->where($condition);
          $checking= $this->db->get();
          return $checking;
    }
	
	
	
}
?>
