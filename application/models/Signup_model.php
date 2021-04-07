<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_model extends CI_Model {

    public function __construct() 
    {
        parent::__construct();
    } 

   
    public function signup($data) {   
        
        $hashedPassword = password_hash($data['signupPW'], PASSWORD_DEFAULT);

        $row = array(
            "loginID" => $data['signupID'],
            "nickname   " => $data['nickname'],
            "loginPW" => $hashedPassword,
            "gender" => $data['gender']
        );

        $result = $this->db->insert('member', $row);
    
        return $result;
    }
}