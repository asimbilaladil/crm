
    
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends CI_Controller {

    function __construct() {
        parent::__construct();
        if( !isset( $_SESSION['email']) ){
          redirect("Login/");
        }         
        $this->load->model('PermissionModel');
    }

    public function index() {

        $data['permissions'] = $this->PermissionModel->get();

        $this->load->view('common/header');
        $this->load->view('Permissions', array('data' => $data));
        $this->load->view('common/footer');
        
    }

    public function save() {

        $permissions = $this->PermissionModel->get();

        $permissionTypes = array();

        foreach ($permissions as $permission) {

            $item = array();

            print_r( $this->input->post() ); 

            if ($this->input->post($permission->id, true)) {
                
                $item['view_permission'] = in_array('view', $this->input->post($permission->id, true));
                $item['update_permission'] = in_array('update', $this->input->post($permission->id, true));
                $item['delete_permission'] = in_array('delete', $this->input->post($permission->id, true));

            } else {

                $item['view_permission'] = 0;
                $item['update_permission'] = 0;
                $item['delete_permission'] = 0;

            }

            $this->PermissionModel->update('id', $permission->id, $item);
                
        }

        redirect('Permissions');

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
