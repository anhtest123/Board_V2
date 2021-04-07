<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->model('Login_model');
    }
    
	public function index()
	{
        $this->login();
	}

    public function login()
    {
        $loginID = $this->input->post('loginID'); 
		$loginPW = $this->input->post('loginPW'); 

        if($this->input->is_ajax_request()){

			$row = $this->Login_model->login($loginID); // 회원정보가져오기
			
			$row == NULL ? $passwordResult = false : $passwordResult = password_verify($loginPW, $row['loginPW']); // 회원정보 일치 확인

			if($passwordResult)
			{
				$json = json_encode(array('validation_result' => 'Login OK', 'guide_text' => $row['nickname']."님 환영합니다."));

				$sessiondata = array(
					'nickname'  => $row['nickname'],
					'logged_in' => TRUE
				);
			
				$this->session->set_userdata($sessiondata);
			}
			else
			{
				$json = json_encode(array('validation_result' => 'Login Fail', 'guide_text' => '아이디 또는 비밀번호가 올바르지 않습니다.'));    
			}
		
			echo $json;
		}
        else
        {
            $this->load->view('header_view');
            $this->load->view('nav_view');
            $this->load->view('login_view');
            $this->load->view('footer_view');
        }
    }

    public function logout()
	{
		$sessiondata = array(
			'nickname'  => '',
			'logged_in' => FALSE
		);
		$this->session->set_userdata($sessiondata);
		redirect('/');
	}
}
