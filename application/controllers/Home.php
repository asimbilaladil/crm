<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


    function __construct() {
        parent::__construct();
        if( !isset( $_SESSION['email']) ){
          redirect("Login/");
        } 

    }
    public function index() {

        $this->load->view('common/header');
        $this->load->view('common/footer');
        
    }
}
