<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_page_controller extends CI_Controller{
	public function index(){

		if($this->session->userdata("email")){
			$this->load->view("user_profile_page");
		}else{
			$this->session->set_flashdata("val", "Please Login to continue");
			redirect("Login_controller/login");
		}
	}
	
}
?>