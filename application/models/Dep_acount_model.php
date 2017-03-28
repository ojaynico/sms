<?php

class Dep_acount_model extends CI_Model {

    function __construct() {
        
    }
// this is the controller of the view(student_acount_fee)
    function retrivestudent(){
        $this->db->select('*');
        $this->db->from('d_students');
        $q=$this->db->get();
        return $q->result();
    }
    
    function getStudentDetails($id){
        $this->db->select('*');
        $this->db->from('d_students');
        $this->db->where('id', $id);
        $q=$this->db->get();
        return $q->result();
    }
    
//
    function getcourseAmount($course){
        $this->db->select('*');
        $this->db->from('courses');
        $this->db->where('name',$course);
        $q=$this->db->get();
        return $q->result();
    }
    
    function forminsert($data){
        $this->db->insert('dep_accounts',$data);
    }
    function payview(){
        $this->db->select('*');
        $this->db->from('dep_accounts');
        $u=$this->db->get();
        return $u->result();
        
    }

}


