<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {


    function __construct() {
        parent::__construct();
        if( !isset( $_SESSION['email']) ){
          redirect("Login/");

        }

        $this->load->model('PublishModel');
        $this->load->model('ReportModel');
        

    }


    public function index() {

        $publish = $this->PublishModel->getPublishQuestionnaire();

        $data['publish'] = $publish;

        $this->load->view('common/header');
        $this->load->view('Report', array('data' => $data));
        $this->load->view('common/footer');

    }

    public function view() {

        $publishId = $this->input->get('id');

        $report = $this->ReportModel->getPublishQuestionnaire( $publishId );

        $reportData = array();

        foreach ($report as $item) {

            array_push($reportData, array(
                $item->question => $item->answerCount
            ));
        }

        echo json_encode($reportData);
        //print_r($report);
        die;

        $this->load->view('common/header');
        $this->load->view('ViewReport');
        $this->load->view('common/footer');

    }

}


