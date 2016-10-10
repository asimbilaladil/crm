<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

    function __construct() {
        parent::__construct();
        if( !isset( $_SESSION['email']) ){
          redirect("Login/");
        }

        $pageAccess = json_decode($this->session->userdata('page_access'));

        if (!in_array('Clients', $pageAccess)) {
            redirect("Home");
        }


        $this->load->model('ClientModel');
    }

    public function index() {

        $company_id = $this->session->userdata('company_id');
        $data['clients'] = $this->ClientModel->getClientsByCompany($company_id);

        $this->load->view('common/header');
        $this->load->view( 'Clients', array('data' => $data) );
        $this->load->view('common/footer');
        
    }



    
}
