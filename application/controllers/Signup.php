<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }

    

    public function index() {

        $this->load->view('Signup');
        
    }

    public function save() {

        $firstName = $this->input->post('firstname', true);
        $lastName = $this->input->post('lastname', true);
        $companyName = $this->input->post('companyname', true);
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $data = array (
            'firstname' => $firstName,
            'lastname' => $lastName,
            'company_name' => $companyName,
            'email' => $email,
            'password' => md5($password),
        );

        $this->UserModel->insert($data);

        redirect('login');

    }
}
