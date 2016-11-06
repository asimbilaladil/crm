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

}