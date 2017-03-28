<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Batches_m
 *
 * @author Nabakooza Josephine
 */
class Batches_m extends CI_Model {
    //put your code here
    
    function students($course, $intake) {
        $this->db->where('batch_status',0);
        $this->db->where('course', $course);
        $this->db->where('intake', $intake);
        $this->db->where('admission', 1);
        return $this->db->get('students')->result();
    }
    
    function batchDetails($id) {
         $query = $this->db->query("SELECT * FROM batch WHERE id = ".$id);
         return $query->result();
    }
    
    function update_batch()
    {
       
            $id = $_REQUEST['editid'];
            $this->db->select('*');
            $this->db->from('batch');
            $this->db->where('id',$id);
            $query = $this->db->get();
            return $result = $query->result();
    
    }
    
    function update_course()
    {
            $id = $_REQUEST['editid'];
            $this->db->select('*');
            $this->db->from('courses');
            $this->db->where('id',$id);
            $query = $this->db->get();
            return $result = $query->result();
    }
    
    function studentsEdit($course, $intake)
    { 
        //$this->db->where('batch_status',0);
        $this->db->where('course', $course);
        $this->db->where('intake', $intake);
        $this->db->where('admission', 1);
        return $this->db->get('students')->result();
    
    }
}
