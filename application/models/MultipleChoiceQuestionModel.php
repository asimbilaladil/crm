<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class MultipleChoiceQuestionModel extends CI_Model {

    private $tableName = 'multichoice_questions';

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
}