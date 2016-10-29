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


}