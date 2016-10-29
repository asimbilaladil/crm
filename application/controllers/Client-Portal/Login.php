<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ClientModel');
    }

    

    /*
     * Function Name: index
     * Description: Load Login page for client portal
     */

    public function index() {

        $this->load->view('Client-Portal/Login');

    }

    /*
     * Function Name: authenticate
     * Description: authenticate user with its details if exists
     */

    public function authenticate() {


        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $company_Username = $this->input->post('id');

        $result = $this->ClientModel->login($email, $password, $company_Username);
        
        if ($result) {

            $data = array(
                'company_username' => $result->company_username,
                'firstname' => $result->firstname,
                'initial' => $result->initial,
                'lastname' => $result->lastname,
                'gender' => $result->gender,
                'phone' => $result->phone,
                'email' => $result->email,
                'country' => $result->country,
                'state' => $result->state,
                'city' => $result->city,
                'address' => $result->address,
                'status' => $result->status,
                'company_id' => $result->company_id                                              
            );

            $this->session->set_userdata($data);

            redirect('Client-Portal/Home');
        }

        $this->session->set_flashdata('loginFail', 'Username password invalid');
        redirect('client/login/'.$company_Username);

    }

    /*
     * Function Name: logout
     * Description: Logout user and destory its session
     */

    function logout() {

        $company_Username = $this->session->userdata('company_username');
        
        $this->session->sess_destroy();
        
        redirect('client/login/'.$company_Username);

    }  
}
