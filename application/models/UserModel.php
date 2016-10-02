<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model {

    private $tableName = 'users';

    function __construct() {
        parent::__construct();
    }


    public function login($email, $password){
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $quary_result=$this->db->get();
        $result=$quary_result->row();
        
        return $result;
    }

    public function insert( $data ){
        if ($this->db->insert($this->tableName, $data) ) {
            return $this->db->insert_id();
        } 
        return -1 ;
    }

    public function userExist($email) {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('email', $email);
        $quary_result=$this->db->get();
        $result=$quary_result->row();
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

    public function getEmployeesByCompany($company_id) {

        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('company_id', $company_id);
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;  
              
    }

    public function getEmployee($token) {

        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where('token', $token);
        $quary_result=$this->db->get();
        $result = $quary_result->result();
        return $result;  
              
    }
}