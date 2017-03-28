<?php

class Non_teacher extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (empty($_SESSION['id'])){
            redirect("login/user");
        }

        $this->load->model("Dashboard_m");
        $this->load->model('Non_teacher_m');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index() {

        //including validation library
        $this->load->library('form_validation');

        //$this->form_validation->set_error_delimeters('<div class="error">', '</div>');
        //validating student name feild
        $this->form_validation->set_rules('name', 'name', 'required');

        //validating student mobile
        $this->form_validation->set_rules('phone', 'phone', 'required|regex_match[/^[0-9]{10}$/]');

        //validating student address
        $this->form_validation->set_rules('address', 'address', 'required');

        //validating student email
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');

        //validating reason
        $this->form_validation->set_rules('nationality', 'nationality', 'required');

        //validating former company or school
        // $this->form_validation->set_rules('qualification','qualification','required');

        if ($this->form_validation->run() == FALSE) {
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('staff/non_teaching/non_teaching_view', $data);
        } else {

            //an array of data to be insertedd into the table non_teaching_staff table
            $config['upload_path'] = './staff/non_teaching_staff';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 5000;
            $config['max_width'] = 2400;
            $config['max_height'] = 2400;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $this->upload->do_upload('photo');
            $imagename = $this->upload->data();

            $data = array(
                'name' => $this->input->post('name'),
                'birthday' => $this->input->post('birthday'),
                'sex' => $this->input->post('sex'),
                'blood_group' => $this->input->post('blood_group'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'authentication_key' => $this->input->post('authentication_key'),
                'department' => $this->input->post('department'),
                'nationality' => $this->input->post('nationality'),
                'roleid' => $this->input->post('roleid'),
                'date_of_joining' => $this->input->post('date_of_joining'),
                'qualification' => $this->input->post('qualification'),
                
                'photo' => $imagename['file_name']
                   
            );
            //Transfering data to model
            $this->Non_teacher_m->form_insert($data);
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $data['message'] = array('msg' => 'Data inserted Successfully');

            //loading view
            $this->load->view('staff/non_teaching/non_teaching_view', $data);
        }
    }

//the show function which helps to display the data in the table/
    public function show() {
        // a query of retrieving data from the database in a table enquiry
        $query = $this->db->get("non_teaching_staff");
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['records'] = $query->result();

        $this->load->helper('url');
        //loading a view to show data in a table
        $this->load->view('staff/non_teaching/non_teachers', $data);
    }

//The function that helps the useer to delete students data from the database table.
    public function delete() {

        if (isset($_REQUEST['deleteid']) && $_REQUEST['deleteid'] != '' && $_REQUEST['deleteid'] != 0) {
            //dleting data set from the model
            $this->Non_teacher_m->delete_data();
            $this->load->helper('url');
            //redirecting back the user to the page he's deleting from.
            redirect(base_url() . 'non_teacher/show');
        }
    }

    public function update() {
        if (isset($_REQUEST['editid']) && $_REQUEST['editid'] != '' && $_REQUEST['editid'] != 0) {
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $data['records'] = $this->Non_teacher_m->update();
            $this->load->view('staff/non_teaching/non_teacher_update', $data);
        }
    }

    function updated_data() {
        if (isset($_POST['update']) && $_POST['update'] == 'Update') {
            $this->Non_teacher_m->updated_data();

            redirect(base_url() . 'non_teacher/show');
        }
    }

    public function detail() {
        if (isset($_REQUEST['editid1']) && $_REQUEST['editid1'] != '' && $_REQUEST['editid1'] != 0) {
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $data['records'] = $this->Non_teacher_m->detail();
            $this->load->view('staff/non_teaching/non_teacher_detail', $data);
        }
    }

    function detailed_data() {
        if (isset($_POST['det']) && $_POST['det'] == 'det') {
            $this->Non_teacher_m->updated_data();
            redirect(base_url() . 'non_teacher/show');
        }
    }

    public function printTicket()
    {
        $id = $this->input->post('id');

        $datainsert = array(
            'id' => $this->input->post('id'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'code' => $this->input->post('code'),
            'computer' => $this->input->post('computer'),
            'room' => $this->input->post('room'),
            'supervisor' => $this->input->post('supervisor'),
            'counselor' => $this->input->post('counselor'),
            'status' => 0
        );

        $this->load->model('Certificate_m');
        $this->Certificate_m->createTest($datainsert);

        $data['ticket'] = $this->Certificate_m->getCertificateTicket($id);
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['student'] = $this->Certificate_m->getCertificateDetails($id);
        $this->load->view('certificate/ticket', $data);
    }

    function printLetter()
    {
        $id = $this->input->get('id');

        $this->load->model('Certificate_m');
        $data['student'] = $this->Certificate_m->getCertificateDetails($id);
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('certificate/letter', $data);
    }

    function createLogin()
    {
        $id = $this->input->post('id');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('repassword', 'Password', 'required|matches[password]');


        if ($this->form_validation->run() == FALSE) {
            echo "<script>
var r = confirm('Invalid Values Inserted');
if (r == true) {
    window.location.assign('detail?editid1='+$id);
} else {
    window.location.assign('detail?editid1='+$id);
}
</script>";
        } else {

            $this->db->select('*');
            $this->db->from('userlogin');
            $this->db->where('idno', $id);
            $this->db->where('role', 4);
            $query = $this->db->get();
            $result = $query->result();

            if ($query->num_rows() >= 1) {
                $data = array(
                    'idno' => $this->input->post("id"),
                    'email' => $this->input->post("email"),
                    'password' => $this->input->post("password"),
                    'role' => 4,
                    'status' => "active"
                );

                foreach ($result as $r) {
                    $this->db->where('id', $r->id);
                    $this->db->update('userlogin', $data);
                }

                echo "<script>
var r = confirm('Update Successful');
if (r == true) {
    window.location.assign('detail?editid1='+$id);
} else {
    window.location.assign('detail?editid1='+$id);
}
</script>";
            } else {
                $data = array(
                    'idno' => $this->input->post("id"),
                    'email' => $this->input->post("email"),
                    'password' => $this->input->post("password"),
                    'role' => 4,
                    'status' => "active"
                );

                $this->db->insert("userlogin", $data);
                echo "<script>
var r = confirm('Login Created Successfully');
if (r == true) {
    window.location.assign('detail?editid1='+$id);
} else {
    window.location.assign('detail?editid1='+$id);
}
</script>";
            }

        }
    }

}

?>