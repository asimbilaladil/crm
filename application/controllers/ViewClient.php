<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewClient extends CI_Controller {
    
    private  $token = "";

    function __construct() {
        parent::__construct();
        if( !isset( $_SESSION['email']) ){
          redirect("Login/");
        }         
        $this->load->model('ClientModel');
        $this->token  = $this->input->get('token', TRUE);

        if ( strlen($this->token) < 30 ) {
            redirect("Clients/");
        }

    }

    public function index() {

        
        $data['clients'] = $this->ClientModel->getClient($this->token);
        if ( empty($data['clients'] ) ) {
            redirect("Clients/");
        }
        $this->load->view('common/header');
        $this->load->view( 'ViewClient', array('data' => $data) );
        $this->load->view('common/footer');
        
    }



    
}
