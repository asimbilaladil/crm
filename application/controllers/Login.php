<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }
    
    public function index() {

        $this->load->view('Login');

    }

    public function authenticate() {

        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $result = $this->UserModel->login($email, $password);

        if ($result) {
            redirect('home');
        }

        $this->session->set_userdata($result);

        $this->session->set_flashdata('loginFail', 'Username password invalid');
        redirect('login');

    }
}
