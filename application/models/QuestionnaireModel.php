<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class QuestionnaireModel extends CI_Model {

    private $tableName = 'questionnaire';

    function __construct() {
        parent::__construct();
    }

    public function insert( $data ){
        if ($this->db->insert($this->tableName, $data) ) {
            return $this->db->insert_id();
        } 
        return -1 ;
    }

    public function update( $whereParam1, $whereParam2 ,$data ){
        $this->db->where( $whereParam1, $whereParam2 );
        $result = $this->db->update( $this->tableName ,$data);
        if ( $result ) {
            return true;
        } 
        return false;
    }


    public function getById($id) {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('id', $id);
        $quary_result=$this->db->get();
        $result=$quary_result->row();
        return $result;
    }

    //get questions for Questionnaire
    public function getQuestionnaireQuestions($id) {

        $query = $this->db->query(
            'SELECT ques.id as question_id, ques.question as question, ques.type, multiquest.id as multi_id, multiquest.question as muliquestion
                FROM questions ques
                LEFT JOIN multichoice_questions multiquest
                ON ques.id = multiquest.question_id 
                WHERE ques.questionnaire_id =' . $id);
        $query->result();
        return $query->result();

    }


    /*
     * Function Name: getByCompanyId
     * Description: Get Questionnaire by company Id
     * @param $company_id 
     */
    
    public function getByCompanyId($company_id) {

        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('company_id', $company_id);
        $this->db->where('status !=', 'publish');
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        
        return $result;
    }

    /*
     * Function Name: updateStatus
     * Description: Get Questionnaire by company Id
     * @param $questionnaire_id 
     * @param $status      
     */

    public function updateStatus( $questionnaire_id ,$status ){
        
        $data = array (
                'status' => $status 
            );
        $this->db->where( 'id', $questionnaire_id );
        $result = $this->db->update( $this->tableName ,$data);
        if ( $result ) {
            return true;
        } 
        return false;
    }  

    /*
     * Function Name: getPublishQuestionnaire
     * Description: Get company publish Questionnaire 
     * @param $company_id    
     * @param $user_id
     */

    public function getPublishQuestionnaire( $company_id, $user_id ){

        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('company_id', $company_id);
        $this->db->where('status', 'publish');
        $this->db->where('publish_questionnaire.expire_date >=', date("Y-m-d") );
        $this->db->join('publish_questionnaire', 'publish_questionnaire.questionnaire_id = questionnaire.id');
        //$this->db->join('questionnaire_attempt', 'questionnaire_attempt.questionnaire_id = questionnaire.id');
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        
        return $result;
    }

    /*
     * Function Name: getPublishSurveyByCompanyId
     * Description: Get Publish Survey by company Id
     * @param $company_id 
     */
    
    public function getPublishSurveyByCompanyId($company_id) {

        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('company_id', $company_id);
        $this->db->where('status', 'publish');
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        
        return $result;
    }    

}