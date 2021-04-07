<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() 
    {
        parent::__construct();
    } 

    public function login($loginID) 
    {
        $where = array('loginID' => $loginID);
        $query = $this->db->get_where('member', $where);
        $result = $query->row_array(); 
        return $result;
    }
}