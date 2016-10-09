<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddEmployee extends CI_Controller {

    function __construct() {
        parent::__construct();
        if( !isset( $_SESSION['email']) ){
          redirect("Login/");
        }         
        $this->load->model('UserModel');
        $this->load->model('PermissionModel');
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->load->helper('string');
    }

    public function index() {

        $data['permissions'] = $this->PermissionModel->get();

        $this->load->view('common/header');
        $this->load->view('AddEmployee', array('data' => $data) );
        $this->load->view('common/footer');
        
    }

    public function save() {

        $password_request = ( empty( $this->input->post('delete', true) ) ? 0 : 1 );
        $token = "u"  . random_string('unique', 30);

        $email = $this->input->post('email', true);

        if ($this->UserModel->userExist($email)) {

            $this->session->set_flashdata('UserFail', 'User already exist.');
            redirect('AddEmployee');
            
        }

        $data = array (
            'firstname'     => $this->input->post('firstName', true),
            'initial      ' => $this->input->post('initial', true),
            'lastname'      => $this->input->post('lastName', true),
            'company_id'    => $_SESSION['company_id'],
            'email'         => $email,
            'password'      => md5($this->input->post('password', true)),
            'type'          => 'EMPLOYEE',
            'permission'    => $this->input->post('permission', true),
            'token'         => $token   

        );

        $this->UserModel->insert($data);
        $message = '<p> Your account has been created.</p> <br> <p> Email: '. $data["email"] .' </p> <br> <p> Password: '. $data["password"] .' </p>';
		//sendEmail( $data['email'] , $message );


        if ($this->UserModel->insert($data) > 0) {
            $this->session->set_flashdata('UserSuccess', 'Client Successfully created.');
        } else {
            $this->session->set_flashdata('UserFail', 'Error in createing client.');
        }

        redirect('AddEmployee');

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
