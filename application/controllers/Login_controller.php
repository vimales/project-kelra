<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	public function __construct(){
	   parent::__construct();
	   $this->load->helper('url');
	   $this->load->library("session");
	}

	public function signup(){
			
		
		$this->load->helper("form");
		$this->load->library('form_validation');
		$this->load->view('loginsignup');
		$this->load->model('Login_model');
		
    
		if($this->input->post("getStartedButton")){
		
			$first_name			=	$this->input->post("first_name");
			$last_name			=	$this->input->post("last_name");
			$email				=	$this->input->post("email");
			$password			=	md5($this->input->post("password"));
			$confirm_password	=	md5($this->input->post("confirm_password"));
			$profile_name		=	$this->input->post("profile_name");
			
			$this->form_validation->set_rules('first_name', 'Firstname', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('profile_name', 'ProfileName', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.user_email]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirm', 'required|matches[password]');
			
			if($this->form_validation->run() == TRUE){

				$condition= array("user_first_name" => "$first_name", "user_last_name" => "$last_name", "user_email" => "$email", "user_password" => "$password", "user_profile_name" => "$profile_name");
						
	
						if($this->Login_model->add($condition)){
							$this->session->set_flashdata("val", "Signup Successful");
							redirect("Login_controller/login");
						}else{
							$this->session->set_flashdata("val", "Some Error has occured");
							redirect("Login_controller/signup");
						}
		
			}else{
				
				$err=form_error('first_name');
				if($err === ""){
					$err=form_error('profile_name');
					if($err === ""){
						$err=form_error('email');
						if($err === ""){
							$err=form_error('password');
							if($err === ""){
								$err=form_error("confirm_password");
								if($err !== ""){
									$this->session->set_flashdata("val", $err);
									redirect("Login_controller/signup");
								}
							}else{
								$this->session->set_flashdata("val", $err);
								redirect("Login_controller/signup");
							}
						}else{
							$this->session->set_flashdata("val", $err);
							redirect("Login_controller/signup");
						}

					}else{
					$this->session->set_flashdata("val", $err);
					redirect("Login_controller/signup");
					}
				}else{
					$this->session->set_flashdata("val", $err);
					redirect("Login_controller/signup");
				}
			}
		
		}
			
		
	}
	public function login(){
		$this->load->helper("form");
		$this->load->library('form_validation');
		$this->load->view('loginsignup');
		$this->load->model('Login_model');
		$this->load->view("alert");
		
		if($this->input->post("loginButton")){
			
				$login_email=$this->input->post("login_email");
				 $login_password=md5($this->input->post("login_password"));
				/* die; */
				
				$this->form_validation->set_rules('login_email', 'Login_Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('login_password', 'Login_Password', 'required|min_length[6]');
				
				if($this->form_validation->run() == FALSE){
					$err=form_error('login_email');
					if($err === ""){
						$err=form_error('login_password');
						if($err !== ""){
							$this->session->set_flashdata("val", $err);
							redirect("Login_controller/login");
						}
					}else{
						$this->session->set_flashdata("val", $err);
						redirect("Login_controller/login");
					}
				}else{
				$checking=$this->Login_model->login_check($login_email, $login_password);
						
					if($checking->num_rows()>0){
						 $this->session->set_flashdata("val", "Login Succesful");
						 $log_details=array("email" => "$login_email", "logged_in" => TRUE);
						 $this->session->set_userdata($log_details);
						
						redirect("/Dashboard_controller");
					}else{
						 $this->session->set_flashdata("val", "Invalid Credentials");
						 redirect("Login_controller/login");
					}
				}
		}
		
	}
	
	
}	
?>