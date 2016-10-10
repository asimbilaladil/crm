
    
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

        $data['pages'] = $this->PermissionModel->getPages();

        $this->load->view('common/header');
        $this->load->view('Permissions', array('data' => $data));
        $this->load->view('common/footer');
        
    }

    public function save() {

        $permissions = $this->PermissionModel->get();

        $this->updatePermission($permissions);

        $this->updatePageAcess($permissions);

        redirect('Permissions');

    }


    public function updatePageAcess($permissions) {

        foreach ($permissions as $permission) {

            if ($this->input->post('access' . $permission->id, true)) {
                $access = json_encode($this->input->post('access' . $permission->id, true));
            } else {
                $access = '[]';
            }

            $this->PermissionModel->update('id', $permission->id, array('page_access' => $access));

        }

    }
    public function updatePermission($permissions) {

        foreach ($permissions as $permission) {

            $item = array();

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
