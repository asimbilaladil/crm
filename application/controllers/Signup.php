<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('string');
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
        $confirmpassword = $this->input->post('confirmpassword', true);
        $token = "u"  . random_string('unique', 30);


        if($password != $confirmpassword) {
            $this->session->set_flashdata('signupFail', 'Password and confirm password not match');
            redirect('signup');            
        }

        if ($this->UserModel->userExist($email)) {
            $this->session->set_flashdata('signupFail', 'Email already exist');
            redirect('signup');
        }

        $data = array (
            'firstname'          => $firstName,
            'lastname'           => $lastName,
            'company_name'       => $companyName,
            'email'              => $email,
            'password'           => md5($password),
            'type'               => 'COMPANY',
            'view_permission'    => 1,
            'update_permission'  => 1,
            'delete_permission'  => 1,
            'token'              => $token   
        );

        //update inserted id in companyId
        $insertedId = $this->UserModel->insert($data);

        $updateData = array(
            'company_id' => $insertedId
        );

        $this->UserModel->update('id', $insertedId, $updateData);

        $this->session->set_flashdata('signupSuccess', 'Successfully signup');
        redirect('login');

    }
}
