<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
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
		$logged_in = FALSE;
		foreach ($this->session->all_userdata() as $key => $value) {
			//echo "Key: $key; Value: $value";
			if($key === 'logged_in') {
				$logged_in = $value;
			}
		}

		if($logged_in) {
			$this->load->view('welcome_message');

		} else {
			$this->load->view('LoginPage');

		}

//		$newdata = array(
//			'username'  => 'test',
//			'email'     => 't@some-site.com',
//			'logged_in' => TRUE
//		);
//		$this->session->set_userdata($newdata);


	}
}
