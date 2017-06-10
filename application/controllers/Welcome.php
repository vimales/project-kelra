<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		  $this->load->view('welcome_message');
         $this->load->model("model");
          if($this->input->post('submit')){
              
        $username=$this->input->post('username');
        $password=$this->input->post('password');
       $status= $this->model->check($username,$password);
       if($status->num_rows()>0)
           echo "success";
            else
          echo "fail";
    }
	}
    public function signup(){
        $this->load->view('signup');
        $this->load->model("model");
        if($this->input->post('submit')){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        if($this->model->add($username,$password))
        echo "success";
        else
        echo "fail";
        
       }
    }
    public function login(){
      
}
}
