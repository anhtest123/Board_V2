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
	public function index()
	{
        $this-> test();
	}

    public function test()
    {
		$this->load->view('header_view');
		$this->load->view('nav_view');
		$this->load->view('Main_view');
		$this->load->view('Mainsidebar_view');
		$this->load->view('footer_view');
    }

	public function test2()
	{
		$this->load->view('test_view');
	}
}
