<?php
class Question_add_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getTag(){
		$this->db->select("tag_name");
		$this->db->from("question_tags");
		return $this->db->get();
	}
	
	public function addQuestion($questionData,$tags){
		$this->db->insert("question_table",$questionData);
		$question_id = $this->db->insert_id();
		if(is_array($tags)){
			foreach($tags as $tag){
			
				$tags_array = array("question_id" => $question_id, "tag_name" => "$tag");
			
				$this->db->insert("question_related_tags", $tags_array);
			}
		}
	}
	
	public function getUserId(){
		$userEmail = $this->session->userdata("email");
		$condition = array("user_email" => "$userEmail");
		$this->db->select("user_id");
		$this->db->from("users");
		$this->db->where($condition);
		return $this->db->get();
	}
	
	//fetch questions
	public function fetchQuestionAnswers($question_ids = NULL){
		
		
		if($question_ids == NULL){
			$this->db->select("*");
			$this->db->from("question_table");
			$this->db->order_by("question_created_on", "desc");
			$questions  = $this->db->get()->result();
		}else{
			$condition = array("question_id" => $question_ids);
			$this->db->select("*");
			$this->db->from("question_table");
			$this->db->where($condition);
			$this->db->order_by("question_created_on", "desc");
			$questions  = $this->db->get()->result();

		}
		foreach($questions as $key => $value):
				
			$answers = $this->getAnswers($value->question_id);
			
			foreach($answers as $keys => $answer){
				$answer_user_name = $this->getAnswerUsername($answer->user_id);
				$answers[$keys]->answer_user_name = $answer_user_name;
			}
				
			
			
			$questions[$key]->answers = (object)[];;
			$questions[$key]->answers =	$answers;
			$user_name = $this->getQuestionUsername($value->question_id);
			$questions[$key]->question_user_name = $user_name;
				
		endforeach;
				/* print "<pre>";
				print_r ($questions);
				print "</pre>";  
				die;    */
		return $questions;
	}
	
	public function getAnswers($question_id){
		
		$condition = array("question_id" => $question_id);
		
		$this->db->select("*");
		$this->db->from("answer_table");
		$this->db->where($condition);
		$this->db->order_by("answer_created_on", "desc");
		return $answers  = $this->db->get()->result();
		
		
		
	}
	
	 public function getQuestionUsername($question_id){
		
		$condition = array("question_id" => "$question_id");
		$this->db->select("user_id");
		$this->db->from("question_table");
		$this->db->where($condition);
		$check = $this->db->get()->result();
		$condition2 = array("user_id" => $check[0]->user_id);
		$this->db->select("user_profile_name");
		$this->db->from("users");
		$this->db->where($condition2);
		return $this->db->get()->result();
		} 
		
		public function getAnswerUsername($user_id){
			$condition2 = array("user_id" => $user_id);
			$this->db->select("user_profile_name");
			$this->db->from("users");
			$this->db->where($condition2);
			return $this->db->get()->result();
		}
		
	public function addAnswer($condition){
		$this->db->insert("answer_table",$condition);
		
	}
	
	public function fetchCategory(){
		$this->db->select("*");
		$this->db->from("category_table");
		 return $this->db->get();
	}
	
	public function fetchTopics(){
		$this->db->select("*");
		$this->db->from("category_relationship");
		 return $this->db->get();
	}
}
?>