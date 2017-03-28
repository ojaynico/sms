<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Attendance
 *
 * @author Nabakooza Josephine
 */
class Attendance extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if (empty($_SESSION['id'])) {
            redirect("login/user");
        }

        $this->load->model("Dashboard_m");
    }
    
    public function index() {
        $batch_tracker_id = $this->input->get("btid");
        $batch_id = $this->input->get("bid");
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['batch'] = $this->db->select('*')->from('batch')->where('id', $batch_id)->get()->result();
        $data['batch_tracker'] = $this->db->select('*')->from('batch_tracker')->where('id', $batch_tracker_id)->get()->result();
        $data['batch_students'] = $this->db->select('*')->from('batch_students')->where('batch_id', $batch_id)->get()->result();
        $this->load->view("attendance/attendance", $data);
    }
    
    public function submit() {
        $noostudents = $this->input->post("nostudents");
        $batchid = $this->input->post("batchid");
        $subjectid = $this->input->post("subject");
        $date = $this->input->post("date");
       
        for ($i = 1; $i < $noostudents+1; $i++){
             $status = $this->input->post("status".$i);
             $studentid = $this->input->post("studentid".$i);
            
             $data = array(
               'batch_id' => $batchid,
                 'subject_id' => $subjectid,
                 'student_id' => $studentid,
                 'date' => $date,
                 'status' => $status
             );
             
             $this->db->insert("attendance", $data);
        }
    }
    
    public function showAttendance(){
        $batch_tracker_id = $this->input->get("btid");
        $batch_id = $this->input->get("bid");
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['batch'] = $this->db->select('*')->from('batch')->where('id', $batch_id)->get()->result();
        $data['batch_tracker'] = $this->db->select('*')->from('batch_tracker')->where('id', $batch_tracker_id)->get()->result();
        $this->load->view("attendance/viewattendance", $data);
    }

    public function studentList()
    {
        $batch_tracker_id = $this->input->get("btid");
        $batch_id = $this->input->get("bid");
        $date = $this->input->get("date");
        $status = $this->input->get("status");
        $subid = $this->input->get("subid");
        $data['attendance'] = $this->db->select('student_id')->from('attendance')->where('batch_id', $batch_id)->where('subject_id', $subid)->where('date', $date)->where('status', $status)->get()->result();
        //$data['attendance'] = $this->db->query("SELECT student_id FROM attendance WHERE batch_id=".$batch_id." AND subject_id=".$subid." AND date='".$date."' AND status=".$status)->result();
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['batch'] = $this->db->select('*')->from('batch')->where('id', $batch_id)->get()->result();
        $data['batch_tracker'] = $this->db->select('*')->from('batch_tracker')->where('id', $batch_tracker_id)->get()->result();
        $this->load->view("attendance/aandp", $data);
    }
}
