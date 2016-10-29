<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Project : CRM
 * Date    : 29-10-2016
 * Author  : Asim Bilal
 */
class Questionnaire extends CI_Controller {

    //constructor
    function __construct() {
        parent::__construct();
        $this->load->model('QuestionnaireModel');  
        $this->load->model('PublishModel');        
    }

    /*
     * Function Name: Index
     * Description: Show Questionnaire
     */
    public function index() {
        
        $company_id = $this->session->userdata('company_id');
        $this->load->view('common/header');
        $data['Questionnaire'] = $this->QuestionnaireModel->getByCompanyId($company_id);
        $this->load->view('Questionnaire/Questionnaire', array('data' => $data));
        $this->load->view('common/footer');

    }

    /*
     * Function Name: Publish
     * Description: Publish Questionnaire
     */
    public function publish() {
        
        $user_id = $this->session->userdata('id');
        $publish_date = date("Y-m-d");
        $expire_date = $this->input->post('expire_date');
        $questionnaire_id = $this->input->post('questionnaire_id');
        $type = $this->input->post('type'); 
        $data = array (
            'user_id' => $user_id,
            'publish_date' => $publish_date,
            'expire_date' => $expire_date,
            'questionnaire_id' => $questionnaire_id,
            'type' => $type
            );       
        $this->PublishModel->insert($data);
        $this->QuestionnaireModel->updateStatus($questionnaire_id, 'publish');
        redirect('Questionnaire');

    }
}
