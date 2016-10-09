<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class PermissionModel extends CI_Model {

    private $tableName = 'permissions';

    function __construct() {
        parent::__construct();
    }

    public function insert( $data ){
        if ($this->db->insert($this->tableName, $data) ) {
            return $this->db->insert_id();
        } 
        return -1 ;
    }

    public function get() {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;          
    }

    public function update( $whereParam1, $whereParam2 ,$data ){
        $this->db->where( $whereParam1, $whereParam2 );
        $result = $this->db->update( $this->tableName ,$data);
        if ( $result ) {
            return true;
        } 
        return false;
    }

    public function getClientsByCompany($company_id) {

        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('company_id', $company_id);
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;  
              
    }    
    public function getClient($token) {

        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('token', $token);
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;  
              
    }
}