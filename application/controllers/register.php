<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $logged_in = 'FALSE';
        foreach ($this->session->all_userdata() as $key => $value) {
            //echo "Key: $key; Value: $value";
            if($key === 'logged_in') {
                if($value === TRUE) {
                    $logged_in = 'TRUE';
                } else {
                    $logged_in = 'FALSE';
                }
            }
        }

        if($logged_in === 'TRUE') {
            echo "<h1>Warning! You are already logged in and about to Register another user!</h1></br>";
        }
        $this->load->view('registerPage');

    }

}
