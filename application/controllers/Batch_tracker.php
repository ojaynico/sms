<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Batch_tracker
 *
 * @author Nabakooza Josephine
 */
class Batch_tracker extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        if (empty($_SESSION['id'])) {
            redirect("login/user");
        }

        $this->load->model("Dashboard_m");
        $this->load->model("Batcht_m");
    }

    function index() {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['trackers'] = $this->Batcht_m->allTrackers();
        $this->load->view("batcht/trackerlist", $data);
    }

    function addTopics() {

        $data = array(
            'batch_no_id' => $this->input->post('batch_no_id'),
            'days' => $this->input->post('days'),
            'timing' => $this->input->post('timing'),
            'startdate' => $this->input->post('startdate'),
            'enddate' => $this->input->post('enddate'),
            'trainer_name' => $this->input->post('trainer_name'),
            'subject' => $this->input->post('subject'),
            'topics' => $this->input->post('topics')
        );

        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view("batcht/addmilestone", $data);
    }
    
    function storeBatch() {
        $data = array(
            'batch_no_id' => $this->input->post('batch_no_id'),
            'days' => $this->input->post('days'),
            'timing' => $this->input->post('timing'),
            'startdate' => $this->input->post('startdate'),
            'enddate' => $this->input->post('enddate'),
            'trainer_name' => $this->input->post('trainer_name'),
            'subject' => $this->input->post('subject'),
        );
        
        $query = $this->db->select_max('id')->get('batch_tracker')->row();
        $btid = $query->id + 1;
        
        $this->db->insert('batch_tracker', $data);
        
        $topic = $this->input->post('topic');
        $description = $this->input->post('description');
        
         for($i = 0; $i < count($topic); $i++){
            $milestone = array(
                'b_t_id'=>$btid,
                'topic'=>$topic[$i], 
                'description'=>$description[$i]
                    );
            $this->db->insert('milestone', $milestone);
        }
        
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['trackers'] = $this->Batcht_m->allTrackers();
        $this->load->view("batcht/trackerlist", $data);
    }

}
