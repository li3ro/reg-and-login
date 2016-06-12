<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_In extends CI_Controller
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
            foreach ($query->result() as $row) {
                if ($row->username === $username && $row->password === $password) {
                    $usrdata = array(
                        'username' => $row->username,
                        'password' => $row->password,
                        'email' => $row->email,
                        'nick' => $row->nick,
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




}