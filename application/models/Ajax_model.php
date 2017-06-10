<?php
class Ajax_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		
		
	}
	public function insert($text){
		$insert_array=array("text" => "$text");
		$this->db->insert("ajax",$insert_array);
		
			
	}
	
}
?>