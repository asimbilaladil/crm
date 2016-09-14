<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddEmployee extends CI_Controller {

    public function index() {

        $this->load->view('common/header');
        $this->load->view('AddEmployee');
        $this->load->view('common/footer');
        
    }
}
