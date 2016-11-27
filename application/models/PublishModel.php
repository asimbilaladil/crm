<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class PublishModel extends CI_Model {

    private $tableName = 'publish_questionnaire';

    function __construct() {
        parent::__construct();
    }

    /*
     * Function Name: Insert
     * Description: Insert publish questionnaire data
     * @param $data 
     */

    public function insert( $data ){
        
        if ($this->db->insert($this->tableName, $data) ) {
            return $this->db->insert_id();
        } 
        return -1 ;
    }

    public function getall() {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $quary_result=$this->db->get();
        $result=$quary_result->result();
        return $result;
    }


    public function getPublishQuestionnaire() {

        $query = $this->db->query(
            'SELECT questionnaire.id as questionnaireId, questionnaire.name as name, publish_questionnaire.id as publishId FROM publish_questionnaire, questionnaire
            WHERE publish_questionnaire.questionnaire_id = questionnaire.id' );
        $query->result();
        return $query->result();

    }

    public function getById($id) {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('id', $id);
        $quary_result=$this->db->get();
        $result=$quary_result->row();
        return $result;
    }

    public function getByToken($token) {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('token', $token);
        $quary_result=$this->db->get();
        $result=$quary_result->row();
        return $result;
    }
    /*
     * Function Name: getByTokenAndType
     * Description: Get public publish survey 
     * @param $token 
     * @param $type 
     * @param $currentDate 
     */
    public function getByTokenAndType($token, $type, $currentDate) {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('token', $token);
        $this->db->where('type', $type);
        $this->db->where( 'expire_date >=', $currentDate);
        $quary_result=$this->db->get();
        $result=$quary_result->row();

        return $result;
    }


    /*
     * Function Name: updatePublishSurveyExpireDate
     * Description: Update expire date of publish survey using survey id
     * @param $company_id 
     */
    
    public function updatePublishSurveyExpireDate($id) {


        $query = $this->db->query(' UPDATE publish_questionnaire 
                                    SET expire_date = "' .date("y-m-d").
                                    '" WHERE questionnaire_id = ' . $id . 
                                    ' ORDER BY expire_date ASC
                                    LIMIT 1');
        return $query;
    }   


}