<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model extends CI_Model{
    public function __construct(){
        parent::__construct();
    
    }
    public function add($username, $password){
        $da=array('user_name'=>"$username", 'password'=>"$password");
        if($this->db->insert('users_table',$da))
        return TRUE;
        else
        return FALSE;
    }
    public function check($username, $password){
          $da=array('user_name'=>"$username", 'password'=>"$password");
          $this->db->select('*');
          $this->db->from('users_table');
          $this->db->where($da);
          $resu= $this->db->get();
          return $resu;
    }
}

?>