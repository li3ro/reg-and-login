<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

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
            echo "<h1>Warning! You are already logged in and about to Register another user!</h1></br>";

        }
        $this->load->view('registerPage');

    }

}
