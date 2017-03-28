<?php

class Diploma_m extends CI_Model
{

    function _construct()
    {
        parent::_construct();

    }

    function form_insert($data)
    {
        $this->db->insert('students', $data);
    }

    function insertDiscount($data)
    {
        $this->db->insert('discount', $data);
    }

    function getDiscount($id)
    {
        $this->db->select('total_discount');
        $this->db->from('discount');
        $this->db->where('student_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getDiplomaList()
    {
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('program', "diploma");
        $query = $this->db->get();
        return $query->result();
    }

    function editStudent($id, $data)
    {
        $this->db->update('students', $data);
        $this->db->where('id', $id);

    }

    function updateRegistered($id)
    {
        $data = array('registered' => 1);
        $this->db->where('id', $id);
        $this->db->update('enquiry', $data);
    }

    function getDiplomaDetails($id)
    {
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('id', $id);
        $this->db->where('program', "diploma");
        $query = $this->db->get();
        return $query->result();
    }

    function getDiploma()
    {
        $this->db->select('*');
        $this->db->from('enquiry');
        $this->db->where('course', "diploma");
        $this->db->where('registered', 0);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getDiplomaForm($id)
    {
        $this->db->select('*');
        $this->db->from('enquiry');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getCourses()
    {
        $this->db->select('*');
        $this->db->from('courses');
        $this->db->where('program', 'diploma');
        $query = $this->db->get();
        return $query->result();
    }

    function getCourses2($id)
    {
        $this->db->select('*');
        $this->db->from('courses');
        $this->db->where('program', 'diploma');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function deleteStudent($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('students');
    }

    function updatePhoto($id, $photo){
        $this->db->where('id', $id);
        $this->db->update('students', $photo);
    }

    function createTest($data){
        $this->db->insert('examinee', $data);
    }

    public function admissionDetails($id)
    {
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getDiplomaTicket($id){
        $this->db->select('*');
        $this->db->from('examinee');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
}

