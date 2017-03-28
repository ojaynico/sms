<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/14/16
 * Time: 12:13 PM
 */

class Certificate_m extends CI_Model{

    function registerStudent($data){
        $this->db->insert('students', $data);
    }

    function editStudent($id, $data){
        $this->db->where('id', $id);
        $this->db->update('students', $data);
    }

    function deleteStudent($id){
        $this->db->where('id', $id);
        $this->db->delete('students');
    }

    function getCertificate(){
        $this->db->select('*');
        $this->db->from('enquiry');
        $this->db->where('course', "certificate");
        $this->db->where('registered', 0);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getCertificateForm($id){
        $this->db->select('*');
        $this->db->from('enquiry');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function updateRegistered($id){
        $data = array('registered' => 1);
        $this->db->where('id', $id);
        $this->db->update('enquiry', $data);
    }

    function getCertificateList(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('program', "certificate");
        $query = $this->db->get();
        return $query->result();
    }

    function getCertificateDetails($id){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function getCertificateTicket($id){
        $this->db->select('*');
        $this->db->from('examinee');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
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
}