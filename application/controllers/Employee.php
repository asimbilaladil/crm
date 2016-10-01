<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    function __construct() {
        parent::__construct();
        if( !isset( $_SESSION['email']) ){
          redirect("Login/");
        }         
        $this->load->model('UserModel');
    }

    public function index() {
        
        $company_id = $this->session->userdata('company_id');
        $data['employees'] = $this->UserModel->getEmployeesByCompany($company_id);

        $this->load->view('common/header');
        $this->load->view('Employees', array('data' => $data));
        $this->load->view('common/footer');
        
    }



    
}
