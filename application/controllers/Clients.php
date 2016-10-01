<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

    function __construct() {
        parent::__construct();
        if( !isset( $_SESSION['email']) ){
          redirect("Login/");
        }         
        $this->load->model('ClientModel');
    }

    public function index() {


        $this->load->view('common/header');
        $this->load->view('Clients');
        $this->load->view('common/footer');
        
    }



    
}
