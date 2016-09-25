<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddClient extends CI_Controller {

    function __construct() {
        parent::__construct();
        if( !isset( $_SESSION['email']) ){
          redirect("Login/");
        }         
        $this->load->model('ClientModel');
    }

    public function index() {


        $this->load->view('common/header');
        $this->load->view('AddClient');
        $this->load->view('common/footer');
        
    }

    public function save() {

        $firstName = $this->input->post('firstName', true);
        $lastName = $this->input->post('lastName', true);
        $email = $this->input->post('email', true);
        $phone = $this->input->post('phone', true);
        $country = $this->input->post('country', true);
        $city = $this->input->post('city', true);
        $state = $this->input->post('state', true);
        $address = $this->input->post('address', true);

        $data = array (
            'firstname' => $firstName,
            'lastname' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'country' => $country,
            'city' => $city,
            'state' => $state,
            'address' => $address
        );

        if ($this->ClientModel->insert($data) > 0) {
            $this->session->set_flashdata('ClientSuccess', 'Client Successfully created.');
        } else {
            $this->session->set_flashdata('ClientFail', 'Error in createing client.');
        }
        
        redirect('AddClient');

    }  

    //send  employee details  to employee
    public function sendEmail( $email, $message ) {
        
        $this->email->from('no-reply@crm.com', 'CRM');
        $this->email->to( $email  );

        $this->email->subject('You account details');
        $this->email->message($message);

        $this->email->send();

    }      
}
