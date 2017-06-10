<?php
class Ajax_controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		
	}
	public function index(){
		$this->load->model("Ajax_model");
		$this->load->view("ajax");
	}
		
	
	
	public function display(){
		echo $_REQUEST["text"];
	}
	
}
?>