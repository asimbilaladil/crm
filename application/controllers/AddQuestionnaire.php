<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Project : CRM
 * Date    : 22-10-2016
 * Author  : Muhammad Moiz
 */
class AddQuestionnaire extends CI_Controller {

    //constructor
    function __construct() {
        parent::__construct();
        $this->load->model('QuestionnaireModel');
        $this->load->model('QuestionModel');
        $this->load->model('MultipleChoiceQuestionModel');
        
    }

    //show create Questionnaire form
    public function index() {

        $this->load->view('common/header');
        $this->load->view('Questionnaire/AddQuestionnaire');
        $this->load->view('common/footer');

    }

    //save Questionnaire form
    public function save() {

        $totalQuestions = $this->input->post('numberOfQuestions', true);
        $questionnaireName = $this->input->post('questionnaireName', true);

        //insert questionnaire
        $insertedId = $this->QuestionnaireModel->insert( array(
            'user_id' =>  $this->session->userdata('id'),
            'name' => $questionnaireName,
            'company_id' =>  $this->session->userdata('company_id')
        ));

        //iterating on number of questions
        for ( $i = 1; $i <= $totalQuestions; $i++ ) {

            //insert question in db
            $question = $this->input->post('question_' . $i);
            $type = $this->input->post('questionOption_' . $i);

            $questionInsertedId = $this->QuestionModel->insert( array(
                'question'          => $question,
                'questionnaire_id'  => $insertedId,
                'type'              => $type
            ));            

            if ($type == 'multi') {

                $numberofMultiQuestions = $this->input->post('numberOfMultiQuestions_' . $i);
                
                //iterating for muliti questions in a questions 
                for ( $j = 1; $j <= $numberofMultiQuestions; $j++ ) {
                    $multiqestion = $this->input->post('multiQuestion_' . $i . $j);

                    $this->MultipleChoiceQuestionModel->insert( array(
                        'question_id'  => $questionInsertedId,
                        'question'     => $multiqestion
                    ));                       
                    
                }
            }
        }
        redirect('AddQuestionnaire');
    }

}
