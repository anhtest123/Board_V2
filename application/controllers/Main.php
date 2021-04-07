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

	public function __construct() {
        parent::__construct();
		$this->load->model('Main_model');
    } 

	public function index()
	{
        $this->homePage();
	}

	// 메인화면 출력 
    public function homePage()
    {
		
		$mainData = $this->__load_main_posts(); //게시글별 게시글 4개씩 가져오기
		$sidebarData['list'] = $this->Main_model->load_posts(10,0); //최근게시물 10개 가져오기
		
		$this->load->view('header_view');
		$this->load->view('nav_view');
		$this->load->view('Main_view',$mainData);
		$this->load->view('mainSidebar_view',$sidebarData);
		$this->load->view('footer_view');
    }

	// 각 게시판 화면 출력
	public function postsList($board_no='0')
	{
		if($board_no < count(BOARD_LIST) && ($board_no > 0 || $board_no === '0') )  // 있는 게시판 화면 출력
		{
			$boardData['board_name'] = BOARD_LIST[$board_no];
			$boardData['posts'] = $this->Main_model->load_posts(20,0,$boardData['board_name']); //해당게시판의 게시글 20개 가져오기
			
			$sidebarData['list'] = $this->Main_model->load_posts(10,0); //최근게시물 10개 가져오기

			$this->load->view('header_view');
			$this->load->view('nav_view');
			$this->load->view('board_view',$boardData);
			$this->load->view('mainSidebar_view',$sidebarData);
			$this->load->view('footer_view');
		}
	}

	// 게시글 작성 화면 
	public function postWrite()
	{		
		$sidebarData['list'] = $this->Main_model->load_posts(10,0); //최근게시물 10개 가져오기

		$this->load->view('header_view');
		$this->load->view('nav_view');
		$this->load->view('postWrite_view');
		$this->load->view('mainSidebar_view',$sidebarData);
		$this->load->view('footer_view');
	}

	// 게시글 보기 화면
	public function postView($board_no='0', $post_no)
	{
		if($board_no < count(BOARD_LIST) && ($board_no > 0 || $board_no === '0') )  // 있는 게시판 화면 출력
		{
			$boardData['board_name'] = BOARD_LIST[$board_no];
			$boardData['posts'] = $this->Main_model->load_posts(20,0,$boardData['board_name']); //해당게시판의 게시글 20개 가져오기

			$sidebarData['list'] = $this->Main_model->load_posts(10,0); //최근게시물 10개 가져오기

			$postData['post'] = $this->Main_model->post_view($post_no);

			$this->load->view('header_view');
			$this->load->view('nav_view');
			$this->load->view('postView_view',$postData);
			$this->load->view('board_view',$boardData);
			$this->load->view('rowBotton_view');
			$this->load->view('mainSidebar_view',$sidebarData);
			$this->load->view('footer_view');
		}
	}
	// ========================================================================


	// 메인 화면에 보여줄 8개의 게시판의 게시글 가져오기
	private function __load_main_posts()
	{		
		for($i=0;$i<8;$i++)
		{
			$data[BOARD_LIST[$i]] = $this->Main_model->load_posts(4,0,BOARD_LIST[$i]);
		}
		
		return $data;
	}

	// 페이지 번호에 따라 게시글 불러오기
	public function pagination()
	{
		$page = $this->input->post('page'); //페이지 번호 
		$board_no = $this->input->post('board_no'); // 게시판 번호

		//  ajax 요청시 동작
		if($this->input->is_ajax_request())
		{
			$page_data = ($page-1)*20; // 페이지 data 만들기
			$data = $this->Main_model->load_posts(20,$page_data,BOARD_LIST[$board_no]); // db 조회

			$json = json_encode($data);
			echo $json;
		}
	}

	// 페이지 ui 
	public function pagination_ui()
	{
		# code...
	}

	public function F(Type $var = null)
	{
		# code...
	}
}
