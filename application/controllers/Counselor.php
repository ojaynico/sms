<?php

class Counselor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Dashboard_m");
        $this->load->model('Counselor_m');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('counselor/counsels_list', $data);
    }

    public function addDetails()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('oes_result', 'Online test result', 'required|max_length[128]');

        if ($this->form_validation->run() == FALSE) {
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('counselor/counsel_details', $data);
        } else {
            $data = array(
                'ids' => $this->input->post('id'),
                'oes_result' => $this->input->post('oes_result'),
                'ass1' => $this->input->post('ass1'),
                'ass2' => $this->input->post('ass2'),
                'ass3' => $this->input->post('ass3'),
                'ass4' => $this->input->post('ass4'),
                'ass5' => $this->input->post('ass5'),
                'comment' => $this->input->post('comment')

            );
            
            $this->db->insert('counselor', $data);
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('counselor/counsels_list', $data);
        }
    }

    public function counsels()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('counselor/counsels_list', $data);
    }

    public function asses()
    {
    }

    public function counselDetails()
    {
        $id = $this->input->get('id', TRUE);
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['counsel_details'] = $this->Counselor_m->getCounselDetails($id);
        $this->load->view('counselor/counsel_details', $data);
    }


}

            