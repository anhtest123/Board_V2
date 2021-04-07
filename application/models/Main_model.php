<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    } 

    // offset부터 count 까지 board_name의 게시글 불러오기
    public function Load_posts($count, $offset, $boardName=0)
    {
        $this->db->order_by('postID', 'DESC'); // id 필드 내림차순
        
        if($boardName === 0 )
        {   
            // 모든 board_name 조회
            $query = $this->db->get('board_posts',$count, $offset);
        }
        else
        {
            // 원하는 board_name만 조회
            $where = array('boardName'=>$boardName);
            $query = $this->db->get_where('board_posts',$where, $count, $offset); // $offset 부터 count 까지
        }

        $result = $query->result_array(); // 결과를 array로 가져오기
    
        return $result;
    }

    // postID에 해당하는 게시글 불러오기
    public function post_view($postID) 
    {
        $where = array('postID' => $postID);

        $query = $this->db->get_where('board_posts', $where);

        $result = $query->row_array(); 

        return $result;
    }
}