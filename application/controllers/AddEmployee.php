<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddEmployee extends CI_Controller {

    function __construct() {
        parent::__construct();
        if( !isset( $_SESSION['email']) ){
          redirect("Login/");
        }         
        $this->load->model('UserModel');
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->load->helper('string');
    }

    public function index() {


        $this->load->view('common/header');
        $this->load->view('AddEmployee');
        $this->load->view('common/footer');
        
    }

    public function save() {

        $firstName = $this->input->post('firstName', true);
        $lastName = $this->input->post('lastName', true);
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $add =  ( empty( $this->input->post('add', true) ) ? 0 : 1 );
        $update = ( empty( $this->input->post('update', true) ) ? 0 : 1 );
        $delete = ( empty( $this->input->post('delete', true) ) ? 0 : 1 );
        $password_request = ( empty( $this->input->post('delete', true) ) ? 0 : 1 );
        $token = "u"  . random_string('unique', 30);

        if ($this->UserModel->userExist($email)) {

			$cookie_value = 1;
			setcookie('error', $cookie_value, time() + 5, "/");
            redirect('AddEmployee');
        }

        $data = array (
            'firstname' => $firstName,
            'lastname' => $lastName,
            'company_id' => $_SESSION['company_id'],
            'email' => $email,
            'password' => md5($password),
            'type' => 'EMPLOYEE',
            'add_permission' => $add,
            'update_permission' => $update,
            'delete_permission' => $delete,
            'password_request' => $password_request,
            'token'              => $token   

        );

        $this->UserModel->insert($data);
        $message = '<p> Your account has been created.</p> <br> <p> Email: '. $data["email"] .' </p> <br> <p> Password: '. $data["password"] .' </p>';
		//sendEmail( $data['email'] , $message );

        redirect('Home');

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
