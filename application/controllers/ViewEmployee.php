<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewEmployee extends CI_Controller {
    
    private  $token = "";

    function __construct() {
        parent::__construct();
        if( !isset( $_SESSION['email']) ){
          redirect("Login/");
        }         
        $this->load->model('UserModel');
        $this->token  = $this->input->get('token', TRUE);

        if ( strlen($this->token) < 30 ) {
            redirect("Employee/");
        }

    }

    public function index() {

        
        $data['employee'] = $this->UserModel->getEmployee($this->token);
        if ( empty($data['employee'] ) ) {
            redirect("Employee/");
        }
        $this->load->view('common/header');
        $this->load->view( 'ViewEmployee', array('data' => $data) );
        $this->load->view('common/footer');
        
    }



    
}
