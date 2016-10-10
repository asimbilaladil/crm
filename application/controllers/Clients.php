<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

    //constructor
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


    //View client list
    public function index() {

        $company_id = $this->session->userdata('company_id');
        $data['clients'] = $this->ClientModel->getClientsByCompany($company_id);

        $this->load->view('common/header');
        $this->load->view('Client/Clients', array('data' => $data));
        $this->load->view('common/footer');
        
    }

    //view client detail
    public function view() {

        $token = $this->input->get('token', true);
        $data['clients'] = $this->ClientModel->getClient($token);

        if ( empty($data['clients'] ) ) {
            redirect("Clients/");
        }
        $this->load->view('common/header');
        $this->load->view( 'Client/ViewClient', array('data' => $data) );
        $this->load->view('common/footer');        
    }

    //edit client
    public function edit() {

        $token = $this->input->get('token', true);
        $data['client'] = $this->ClientModel->getClient($token);

        if ( empty($data['client'] ) ) {
            redirect("Clients/");
        }

        $this->load->view('common/header');
        $this->load->view( 'Client/EditClient', array('data' => $data) );
        $this->load->view('common/footer');

    }

    //delete client 
    public function delete() {
        $token = $this->input->get('token', true); 
        $this->ClientModel->delete($token);
        redirect('Client/Clients');
    }

    //update client
    public function update() {

        $token = $this->input->post('token', true);

        $data = array (
            'firstname'     => $this->input->post('firstName', true),
            'initial      ' => $this->input->post('initial', true),
            'lastname'      => $this->input->post('lastName', true),
            'gender'      => $this->input->post('gender', true),
            'email'         => $this->input->post('email', true),
            'phone'         => $this->input->post('phone', true),
            'address'         => $this->input->post('address', true),
            'service'       => $this->input->post('service', true),
            'status'       => $this->input->post('status', true)
        );

        $this->ClientModel->update('token', $token, $data);

        redirect('Clients/');        
    }

    
}
