<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionnaireAttempt extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('QuestionnaireModel');
        $this->load->model('QuestionModel');
        $this->load->model('MultipleChoiceQuestionModel');
        $this->load->model('QuestionnaireAttemptModel');
        $this->load->model('QuestionnaireAnswerModel');
        $this->load->model('PublishModel');
    }

     /**
      * Function Name: index
      * Description: Load Questionnaire attempt page
      */
    public function index() {

        $publishId = $this->input->get('id');

        $publish = $this->PublishModel->getById($publishId);

        $id = $publish->questionnaire_id;

        $questionnaire = $this->QuestionnaireModel->getQuestionnaireQuestions($id);

        $idArray = array();
        $questions = array();

        foreach ($questionnaire as $item) {

            if (in_array($item->question_id, $idArray)) {

                $col = array_search($item->question_id, array_column($questions, 'question_id'));

                array_push($questions[$col]['multiQuestions'], $item->muliquestion);

            } else {
                array_push($idArray, $item->question_id);

                $questionItem = array(
                    'question_id'       => $item->question_id,
                    'question'          => $item->question,
                    'type'              => $item->type,
                    'multiQuestions'    => array()
                );

                if ($item->type == 'multi') {
                    array_push($questionItem['multiQuestions'], $item->muliquestion);
                }

                array_push($questions, $questionItem);
            }

        }

        $data['questions'] = $questions;
        $data['questionnaireId'] = $id;
        $data['publishId'] = $publishId;

        $this->load->view('common/header');
        $this->load->view('Questionnaire/QuestionnaireAttempt', array('data' => $data));
        $this->load->view('common/footer');        
    }

    public function save() {

        $userId = $this->session->get_userdata()['id'];
        $questionnaireId = $this->input->post('questionnaireId');
        $totalQuestion = $this->input->post('totalQuestions');
        $questionType = $this->input->post('questionType');
        $publishId = $this->input->post('publishId');
        

        $insertedId = $this->QuestionnaireAttemptModel->insert( array(
            'questionnaire_id' => $questionnaireId,
            'user_id'          => $userId,
            'publish_id'       => $publishId
        ));

        for ( $i=1 ; $i <= $totalQuestion; $i++ ) {

            $questionType = $this->input->post('questionType_' . $i);

            $answer = $this->input->post('answer_' . $i);

            $this->QuestionnaireAnswerModel->insert( array(
                'question_id' => $this->input->post( 'questionId_' . $i ),
                'attempt_id'  => $insertedId,
                'answer'      => $answer
            ));

        }

    }

}
