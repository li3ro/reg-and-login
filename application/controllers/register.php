<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form', 'url');
        $this->load->library('form_validation');
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
            echo "<h4>Warning! You are already logged in and about to Register another user!</h4></br>";
        }

        $this->load->view('registerPage');

    }


    public function go() {
        $query = $this->db->get('users');
        $index = 0;
        foreach ($query->result() as $row) {
            $users[$index]['username'] = $row->username;
            $users[$index]['email'] = $row->email;
            $index++;
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[12]',
            array(
                'required'      => 'You have not provided %s.'
            ));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|max_length[12]',
            array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
            ));
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nick', 'Nickname', 'required|min_length[3]|max_length[12]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registerPage');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $nick = $this->input->post('nick');

            for ($row = 0; $row < $index; $row++) {
                if ($users[$row]['username'] === $username) {
                    $data = array(
                        'error_message' => 'Username already exists'
                    );
                    $this->load->view('registerPage', $data);
                    return;
                }
                if ($users[$row]['email'] === $email) {
                    $data = array(
                        'error_message' => 'E-Mail already exists'
                    );
                    $this->load->view('registerPage', $data);
                    return;
                }
            }

            $sql = "INSERT INTO users (username, password, email, nick) VALUES (".$this->db->escape($username).", ".$this->db->escape($password).", ".$this->db->escape($email).", ".$this->db->escape($nick).")";
            $this->db->query($sql);
            if($this->db->affected_rows() === 0) {
                $data = array(
                    'error_message' => 'Fail to insert! [check the database connection and logs]'
                );
                $this->load->view('registerPage', $data);
                return;
            }

            $usrdata = array(
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'nick' => $nick,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($usrdata);
            redirect($this->input->get('last_url'));
            //$this->load->view('welcome_message');
            return;

        }
    }

}
