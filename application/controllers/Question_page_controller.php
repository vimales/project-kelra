<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Question_page_controller extends CI_Controller{
	public function index($question_id){

		if($this->session->userdata("email")){
			$this->load->model("Question_add_model");
			
			$data['questions'] = $this->Question_add_model->fetchQuestionAnswers($question_id);
		
			$this->load->view("question_page",$data);
			
		}else{
			$this->session->set_flashdata("val", "Please Login to continue");
			redirect("Login_controller/login");
		}
	}
	
	/* public function ajax_page($question_id){

		if($this->session->userdata("email")){
			$this->load->model("Question_add_model");
			
			$data['questions'] = $this->Question_add_model->fetchQuestionAnswers($question_id);
		
			$this->load->view("question_page",$data);
			
		}else{
			$this->session->set_flashdata("val", "Please Login to continue");
			redirect("Login_controller/login");
		}
	} */
	
}
?>