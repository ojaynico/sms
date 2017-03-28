<?php

class Examinee extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model("Dashboard_m");
        $this->load->model('Model_exam');
    }

    public function index()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('examinee/student', $data);
    }

    function updateTest(){
        $id = $this->input->post("id");
        $status = array("status" => 1);
        $this->Model_exam->updateStatus($id, $status);
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('examinee/student', $data);
    }


    function notification()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('examinee/exam_notification', $data);
    }

    public function update()
    {
        if (isset($_REQUEST['editid']) && $_REQUEST['editid'] != '' && $_REQUEST['editid'] != 0) {
            $data['records'] = $this->Model_exam->update();
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('examinee/student', $data);
        }
    }

    function status_update()
    {
        if (isset($_POST['update']) && $_POST['update'] == 'complete') {
            $id = $this->input->post('upid');
            $status = $this->input->post('status');

            $data = array(
                'status' => $status
            );

            $i = $this->Model_exam->status_update($id, $data);
            if ($i == 1) {
                $this->session->set_tempdata('status', 'Student has completed the exam successfully', '5');
                $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
                $this->load->view('examinee/exam_notification', $data);
            } else {
                $this->session->set_tempdata('item4', 'record inserted sucessfully', '5');
                $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
                $this->load->view('examinee/exam_notification', $data);
            }

        }

    }

}
