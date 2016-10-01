
    
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
        $initial = $this->input->post('initial', true);
        $lastName = $this->input->post('lastName', true);
        $gender = $this->input->post('gender', true);
        $email = $this->input->post('email', true);
        $phone = $this->input->post('phone', true);
        $address = $this->input->post('address', true);
        $service = $this->input->post('service', true);
        $status = $this->input->post('status', true);

        $data = array (
            'firstname' => $firstName,
            'initial' => $initial,
            'lastname' => $lastName,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'service' => $address,
            'status' => $status,
            'company_id' => $_SESSION['company_id'],
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
