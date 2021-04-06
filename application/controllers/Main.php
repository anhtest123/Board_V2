<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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

	//게시판 list를 저장하는 배열
	public $board_list=array('HTML',"CSS",'Javascript','PHP','JAVA','MYSQL','기타1','기타2');

	public function __construct() {
        parent::__construct();
		// board_name을 담는 배열
    } 

	public function index()
	{
        $this->test();
	}

	// 메인화면 출력 
    public function homepage()
    {
		
		$main_posts = $this->__load_main_posts();

		$this->load->view('header_view');
		$this->load->view('nav_view');
		$this->load->view('Main_view',$main_posts);
		$this->load->view('Mainsidebar_view');
		$this->load->view('footer_view');
    }

	// 각 게시판 화면 출력
	public function test($board_no=0)
	{
		if(count($this->board_list) > $board_no) // 있는 게시판 화면 출력
		{
			$data['board_name'] = $this->board_list[$board_no];

			$data['posts'] = $this->Main_model->load_posts(20,0,$data['board_name']);

			$this->load->view('header_view');
			$this->load->view('nav_view');
			$this->load->view('board_view',$data);
			$this->load->view('Mainsidebar_view');
			$this->load->view('footer_view');
		}
	}

	// 게시글 작성 화면 
	public function postWrite()
	{		
		$this->load->view('header_view');
		$this->load->view('nav_view');
		$this->load->view('postWrite_view');
		$this->load->view('Mainsidebar_view');
		$this->load->view('footer_view');
	}

	public function test2()
	{
		$this->load->view('test_view');
	}

	// 메인 화면에 보여줄 8개의 게시판의 게시글 가져오기
	private function __load_main_posts()
	{
		$board_name = $this->board_list; //전역변수(배열) board_list 값 가져오기

		
		for($i=0;$i<8;$i++)
		{
			$data[$board_name[$i]] = $this->Main_model->load_posts(4,0,$board_name[$i]);
		}

		$data['board_name'] = $board_name;

		return $data;
	}

	// 페이지 번호에 따라 게시글 불러오기
	public function pagination()
	{
		$page = $this->input->post('page'); //페이지 번호 
		$board_no = $this->input->post('board_no'); // 게시판 번호

		$board_name = $this->board_list; //전역변수(배열) board_list 값 가져오기

		//  ajax 요청시 동작
		if($this->input->is_ajax_request())
		{
			$page_data = ($page-1)*20; // 페이지 data 만들기
			$data = $this->Main_model->load_posts(20,$page_data,$board_name[$board_no]); // db 조회

			$json = json_encode($data);
			echo $json;
		}
	}

	// 페이지 ui 
	public function pagination_ui()
	{
		# code...
	}
}
