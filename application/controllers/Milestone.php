<?php

class Milestone extends CI_Controller{

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
        $data['milestone'] = $this->db->select('*')->from('milestone')->where('b_t_id', $batch_tracker_id)->where('date', null)->get()->result();
        $this->load->view("milestone/milestone", $data);
    }

    public function submit() {
        $nomilestone = $this->input->post("nomilestone");
        $batchid = $this->input->post("batchid");
        $subjectid = $this->input->post("subject");
        $date = $this->input->post("date");

        for ($i = 1; $i < $nomilestone+1; $i++){
            $status = $this->input->post("status".$i);
            $milestoneid = $this->input->post("milestoneid".$i);

            if ($status == 1){
            $this->db->query("UPDATE milestone SET date = '".$date."' WHERE id=".$milestoneid);
            }
        }

        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        redirect(base_url()."batch_tracker");
    }

    public function showMilestone(){
        $batch_tracker_id = $this->input->get("btid");
        $batch_id = $this->input->get("bid");
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['batch'] = $this->db->select('*')->from('batch')->where('id', $batch_id)->get()->result();
        $data['batch_tracker'] = $this->db->select('*')->from('batch_tracker')->where('id', $batch_tracker_id)->get()->result();
        $data['milestone'] = $this->db->select('*')->from('milestone')->where('b_t_id', $batch_tracker_id)->get()->result();
        $this->load->view("milestone/complete", $data);
    }
}