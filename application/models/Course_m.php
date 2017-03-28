<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/24/16
 * Time: 3:00 PM
 */
class Course_m extends CI_Model{

    function addCourse($data){
        $this->db->insert('courses', $data);
    }
    
    function addSubject($data) {
        $this->db->insert('course_units', $data);
    }

    function getCourseList(){
        $this->db->select('*');
        $this->db->from('courses');
        $query = $this->db->get();
        return $query->result();
    }

    function editCourse($id, $data){
        $this->db->where('id', $id);
        $this->db->update('courses', $data);
    }

    function getCourseDetails($id){
        $this->db->select('*');
        $this->db->from('courses');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function deleteCourse($id){
        $this->db->where('id', $id);
        $this->db->delete('courses');
    }
}