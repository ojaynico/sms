<?php

class Enquiry_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION['id'])){
            redirect("login/user");
        }

        $this->load->model("Dashboard_m");
        $this->load->model('Enquiry_model');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->helper('form');

        //including validation library
        $this->load->library('form_validation');

        //$this->form_validation->set_error_delimeters('<div class="error">', '</div>');

        //validating student name feild
        $this->form_validation->set_rules('sname', 'name', 'required');

        //validating student mobile
        $this->form_validation->set_rules('smobile', 'mobile', 'required|regex_match[/^[0-9]{10}$/]');

        //validating student address
        $this->form_validation->set_rules('saddress', 'address', 'required');

        //validating student email
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');

        //validating reason
        $this->form_validation->set_rules('reason', 'reason', 'required');

        //validating former company or school
        $this->form_validation->set_rules('school', 'school', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('enquiry/enquiry_view', $data);
        } else {

            //an array of data to be insertedd into the table enquiry.
            $data = array(
                'st_name' => $this->input->post('sname'),
                'st_mobile' => $this->input->post('smobile'),
                'st_address' => $this->input->post('saddress'),
                'st_email' => $this->input->post('email'),
                'g_name' => $this->input->post('pname'),
                'g_mobile' => $this->input->post('pmobile'),
                'reason' => $this->input->post('reason'),
                'qualification' => $this->input->post('qual'),
                'f_company' => $this->input->post('school'),
                'p_knowlegde' => $this->input->post('knowledge'),
                'course' => $this->input->post('course'),
                'status' => $this->input->post('status'),
                'registered' => $this->input->post('register'),
                'date' => $this->input->post('date')
            );
            //Transfering data to model
            $this->Enquiry_model->form_insert($data);
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $data['message'] = array('msg' => 'Data inserted Successfully');

            //loading view
            $this->load->view('enquiry/enquiry_view', $data);
        }
    }

//the show function which helps to display the data in the table/
    public function show()
    {
        // a query of retrieving data from the database in a table enquiry
        $this->db->where("status", 0);
        $query = $this->db->get("enquiry");
        $data['records'] = $query->result();
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);

        $this->load->helper('url');
        //loading a view to show data in a table
        $this->load->view('enquiry/enquirees', $data);
    }

//The function that helps the useer to delete students data from the database table.
    public function delete()
    {

        if (isset($_REQUEST['deleteid']) && $_REQUEST['deleteid'] != '' && $_REQUEST['deleteid'] != 0) {
            //dleting data set from the model
            $this->Enquiry_model->delete_data();
            $this->load->helper('url');
            //redirecting back the user to the page he's deleting from.
            redirect(base_url() . 'enquiry_c/show');
        }


    }

    public function update()
    {
        if (isset($_REQUEST['editid']) && $_REQUEST['editid'] != '' && $_REQUEST['editid'] != 0) {
            $data['records'] = $this->Enquiry_model->update();
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('enquiry/enquiry_update', $data);
        }
    }

    function updated_data()
    {
        if (isset($_POST['update']) && $_POST['update'] == 'Update') {
            $this->Enquiry_model->updated_data();
            redirect(base_url() . 'enquiry_c/show');
        }
    }

    public function detail()
    {
        if (isset($_REQUEST['editid1']) && $_REQUEST['editid1'] != '' && $_REQUEST['editid1'] != 0) {
            $data['records'] = $this->Enquiry_model->detail();
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('enquiry/enquiry_detail', $data);
        }
    }

    function detailed_data()
    {
        if (isset($_POST['det']) && $_POST['det'] == 'det') {
            $this->Enquiry_model->updated_data();
            redirect(base_url() . 'enquiry_c/show');
        }
    }

}

?>