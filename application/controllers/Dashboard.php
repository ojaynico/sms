<?php

/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 11/21/16
 * Time: 12:03 PM
 */
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (empty($_SESSION['id'])){
            redirect("login/user");
        }

        $this->load->model("Dashboard_m");
        $this->load->helper(array('form', 'url'));
    }

    public function index(){
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['certificate'] = $this->Dashboard_m->certificateCount();
        $data['diploma'] = $this->Dashboard_m->diplomaCount();
        $data['trainer'] = $this->Dashboard_m->trainerCount();
        $data['books'] = $this->Dashboard_m->bookCount();
        $this->load->view("dashboard/home", $data);
    }

    public function userManager(){
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['users'] = $this->Dashboard_m->getAdminUsers();
        $this->load->view("users/user_list", $data);
    }

    public function userDelete()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('userlogin');
        $this->userManager();
    }

    public function roleForm(){
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['roles'] = $this->Dashboard_m->getRoles();
        $this->load->view("users/user_form", $data);
    }

    public function addUser(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'User Email', 'required|max_length[128]');
        $this->form_validation->set_rules('password', 'User Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('userid', 'ID', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $data['roles'] = $this->Dashboard_m->getRoles();
            $this->load->view("users/user_form", $data);
        } else {

            $data = array(
                'idno'=>$this->input->post("userid"),
                'email'=>$this->input->post("email"),
                'password'=>$this->input->post("password"),
                'role'=>$this->input->post("role"),
                'status'=>"active"
            );

            $this->Dashboard_m->insertAdmin($data);
            $this->userManager();
        }

    }

    public function updateStatus(){
        $id = $this->input->get('id');
        $status = $this->input->get('status');

        if ($status == "active"){
            $data = array('status' => "inactive");
            $this->db->where('id', $id);
            $this->db->update('userlogin', $data);

            $this->userManager();
        } else {
            $data = array('status' => "active");
            $this->db->where('id', $id);
            $this->db->update('userlogin', $data);

            $this->userManager();
        }
    }

    public function logOut()
    {
        session_destroy();
        redirect("login");
    }
}