<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

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
		$this->load->model('Signup_model');
    }
    
	public function index()
	{
        $this->signup();
	}


    public function signup()
	{
		$data = $this->input->post();

		if($this->input->is_ajax_request())
		{
			$row = $this->Signup_model->signup($data);

			($row == NULL) || ($row === true) ? $checkResult = true : $checkResult = false;

			if($checkResult)
			{
				$json = json_encode(array('validation_result' => true));
			}
			else
			{
				$json = json_encode(array('validation_result' => false));    
			}

			echo $json;
		}
        else
        {
            $this->load->view('header_view');
            $this->load->view('nav_view');
            $this->load->view('signup_view');
            $this->load->view('footer_view');
        }
	}
}
