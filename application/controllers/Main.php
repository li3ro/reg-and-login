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

	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[12]',
			array(
				'required'      => 'You have not provided %s.'
			));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[12]',
			array(
				'required'      => 'You have not provided %s.',
				'is_unique'     => 'This %s already exists.'
			));

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('LoginPage');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$query = $this->db->get('users');
			foreach ($query->result() as $row)
			{
				if( $row->username === $username && $row->password === $password) {
					$usrdata = array(
						'username' => '111',
						'password' => '222',
						'logged_in' => TRUE
					);
					$this->session->set_userdata($usrdata);
					$this->load->view('welcome_message');
					return;
				}
			}

			$data = array(
				'error_message' => 'Invalid Username or Password'
			);
			$this->load->view('LoginPage', $data);
		}
	}

//	public function logout()
//	{
//		$this->session->sess_destroy();
//		$this->load->view('LoginPage');
//	}


}







//		$logged_in = FALSE;
//		foreach ($this->session->all_userdata() as $key => $value) {
//			//echo "Key: $key; Value: $value";
//			if($key === 'logged_in') {
//				$logged_in = $value;
//				break;
//			}
//		}
//
//		if($logged_in) {
//			$this->load->view('welcome_message');
//
//		} else {
//			$this->load->view('LoginPage');
//
//		}



