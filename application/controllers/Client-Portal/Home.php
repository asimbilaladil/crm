<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ClientModel');
        $this->load->model('QuestionnaireModel');
        
    }

    

    /*
     * Function Name: index
     * Description: Load Home page for client portal
     */

    public function index() {
        
        $company_id = $this->session->userdata('company_id');
        $user_id = $this->session->userdata('id');
        $data['Questionnaire'] = $this->QuestionnaireModel->getPublishQuestionnaire($company_id, $user_id);

        $this->load->view('common/header');
        $this->load->view('Client-Portal/Home', array('data' => $data));
        $this->load->view('common/footer');

    } 
}
