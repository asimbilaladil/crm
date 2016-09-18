<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddService extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ServiceModel');
        $this->load->library('email');
        $this->email->set_mailtype("html");

    }

    public function index() {


        $this->load->view('common/header');
        $this->load->view('AddService');
        $this->load->view('common/footer');
        
    }

    public function save() {

        $serviceName = $this->input->post('serviceName', true);
        $rate = $this->input->post('rate', true);
        $occurrence = $this->input->post('occurrence', true);
        $type = $this->input->post('type', true);

        $data = array(
            'service_name' => $serviceName,
            'rate' => $rate,
            'occurrence' => $occurrence,
            'type' => $type,
        );

        if ($this->ServiceModel->insert($data) > 0) {
            $this->session->set_flashdata('ServiceSuccess', 'Service Successfully created.');
        } else {
            $this->session->set_flashdata('ServiceFail', 'Error in createing service.');
        }
        
        redirect('AddService');

    }  


}
