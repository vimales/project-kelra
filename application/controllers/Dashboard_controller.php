<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Dashboard_controller extends CI_Controller{
	
	public function __construct() {
		parent::__construct();
		
	}
	
	public function index(){
		
		if($this->session->userdata("email")){
			$this->load->model("Question_add_model");
			$data['get_tag'] 		= $this->Question_add_model->getTag()->result();
			$data['get_all_ques'] 	= $this->Question_add_model->fetchQuestionAnswers();
			
		//	$data['username'] 		= $this->Question_add_model->getUsername()->result();
			$data['category']		= $this->Question_add_model->fetchCategory();
			$data['topics']			= $this->Question_add_model->fetchTopics();
			
			
			$this->load->view("dashboard", $data);
	
			if(isset($_POST["postQuestion"])){
				$question_title = $_POST["questionBox"];
				$question_media = NULL;
				$user_id        = $this->getUserid();
				
				$tags = $_POST["tagsAdd"];
				$details		= array("question_title	" => "$question_title", "question_media" => "$question_media", "user_id" => $user_id[0]->user_id);
				$this->Question_add_model->addQuestion($details,$tags);
				redirect("Dashboard_controller");
			}
			
			if(isset($_POST['answerPostBtn'])){
				$question_id = $_POST['hiddenBox'];
				$user_id        = $this->getUserid();
				$answer_text  = $_POST['answerarea'];
				$condition    = array("user_id" => $user_id[0]->user_id, "question_id" => "$question_id", "answer_text" => "$answer_text");
				$this->Question_add_model->addAnswer($condition);
				redirect("Dashboard_controller");
			}
			
			
		}else{
			$this->session->set_flashdata("val", "Please Login to continue");
			redirect("Login_controller/login");
		
		}
		
	}
	
	
	public function getUserid(){
		$this->load->model("Question_add_model");
		$userID = $this->Question_add_model->getUserId()->result();
		return $userID;
	}
	
	public function logout(){
		session_unset();
		redirect("Login_controller/login");
	}
	
	
}
?>