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

}