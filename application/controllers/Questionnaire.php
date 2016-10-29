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

}
