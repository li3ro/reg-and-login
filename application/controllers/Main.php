<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form', 'url');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$logged_in = FALSE;
		foreach ($this->session->all_userdata() as $key => $value) {
			//echo "Key: $key; Value: $value";
			if($key === 'logged_in') {
				$logged_in = $value;
				break;
			}
		}

		if($logged_in) {
			$this->load->view('welcome_message');

		} else {
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('LoginPage');
			} else {
				$this->load->view('welcome_message');
			}
		}
	}

}

