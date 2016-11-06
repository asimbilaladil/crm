<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReportModel extends CI_Model {


    function __construct() {
        parent::__construct();
    }

    public function getPublishQuestionnaire($publishId) {

        $query = $this->db->query(
            'SELECT publish.id as publishId, questionnaire.name, attempt.id as attemptId, COUNT(answer.answer) answerCount, answer.answer, answer.question_id as questionId, questions.question
                FROM publish_questionnaire as publish, questionnaire, questionnaire_attempt as attempt, questionnaire_answer as answer, questions
                WHERE publish.questionnaire_id = questionnaire.id
                AND publish.id = attempt.publish_id
                AND attempt.id = answer.attempt_id
                AND answer.question_id = questions.id
                AND publish.id = ' . $publishId . ' 
                GROUP BY answer.answer' );

        $query->result();
        return $query->result();

    }

}