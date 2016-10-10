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

            $data = array(
                'email' => $result->email,
                'view_permission' => $result->view_permission,
                'update_permission' => $result->update_permission,
                'delete_permission' => $result->delete_permission,
                'company_id' => $result->company_id,
                'page_access' => $result->page_access
            );

            $this->session->set_userdata($data);

            redirect('home');
        }

        $this->session->set_flashdata('loginFail', 'Username password invalid');
        redirect('login');

    }
    /**
     * logout
     */
    function logout() {

        $this->session->sess_destroy();

        redirect('Login/');

    }  
}
