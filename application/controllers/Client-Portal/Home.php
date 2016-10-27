<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ClientModel');
    }

    

    /*
     * Function Name: index
     * Description: Load Home page for client portal
     */

    public function index() {

        $this->load->view('common/header');
        $this->load->view('common/footer');

    } 
}
