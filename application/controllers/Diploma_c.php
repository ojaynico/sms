<?php

class Diploma_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION['id'])) {
            redirect("login/user");
        }

        $this->load->model("Dashboard_m");
        $this->load->model('Diploma_m');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('diploma/diploma_form', $data);
    }

    public function addStudent()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('s_name', 'Student Name', 'required|max_length[128]');
        $this->form_validation->set_rules('sex', 'Sex', 'required');
        $this->form_validation->set_rules('nationality', 'Nationality', 'required|max_length[128]');
        $this->form_validation->set_rules('course', 'Course', 'required|max_length[128]');
        $this->form_validation->set_rules('m_status', 'Marital Status', 'required|max_length[128]');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required|max_length[128]');
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email|max_length[128]');
        $this->form_validation->set_rules('phone', 'Mobile Number', 'required|min_length[10]');


        if ($this->form_validation->run() == FALSE) {
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('diploma/diploma_form', $data);
        } else {

            $config['upload_path'] = './students';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 10000;
            $config['max_width'] = 4000;
            $config['max_height'] = 4000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('photo')) {
                $image = $this->upload->data();

                chmod(FCPATH . "students/" . $image['file_name'], 777);

                $id_reg = $this->input->post('reg_id');

                $data = array(
                    's_name' => $this->input->post('s_name'),
                    'phone' => $this->input->post('phone'),
                    'whatsapp' => $this->input->post('whatsapp'),
                    'nationality' => $this->input->post('nationality'),
                    'course' => $this->input->post('course'),
                    'm_status' => $this->input->post('m_status'),
                    'district_of_birth' => $this->input->post('district_of_birth'),
                    'email' => $this->input->post('email'),
                    'program' => "diploma",
                    'religion' => $this->input->post('religion'),
                    'sex' => $this->input->post('sex'),
                    'address' => $this->input->post('address'),
                    'country' => $this->input->post('nationality'),
                    'PLE_indx_no' => $this->input->post('PLE_indx_no'),
                    'PLE_yr_exam' => $this->input->post('PLE_yr_exam'),
                    'PLE_result' => $this->input->post('PLE_result'),
                    'PLE_school' => $this->input->post('UACE_school'),
                    'UCE_indx_no' => $this->input->post('UCE_indx_no'),
                    'UCE_yr_exam' => $this->input->post('UCE_yr_exam'),
                    'UCE_result' => $this->input->post('UCE_result'),
                    'UCE_school' => $this->input->post('UCE_school'),
                    'UACE_result' => $this->input->post('UACE_result'),
                    'UACE_indx_no' => $this->input->post('UACE_indx_no'),
                    'UACE_school' => $this->input->post('UACE_school'),
                    'UACE_yr_exam' => $this->input->post('UACE_yr_exam'),
                    'UACE_combination' => $this->input->post('UACE_combination'),
                    'intake' => $this->input->post('intake'),
                    'o_institute_name' => $this->input->post('o_institute_name'),
                    'o_qualification' => $this->input->post('o_qualification'),
                    'o_yr_obtained' => $this->input->post('o_yr_obtained'),
                    'sitm_reg_no' => $this->input->post('sitm_reg_no'),
                    'sitm_course' => $this->input->post('sitm_course'),
                    'sitm_qualification' => $this->input->post('sitm_qualification'),
                    'sitm_doa' => $this->input->post('sitm_doa'),
                    'fathers_name' => $this->input->post('fathers_name'),
                    'mothers_name' => $this->input->post('mothers_name'),
                    'next_kin' => $this->input->post('next_kin'),
                    'f_contact' => $this->input->post('f_contact'),
                    'm_contact' => $this->input->post('m_contact'),
                    'next_kin_contact' => $this->input->post('next_kin_contact'),
                    'photo' => $image['file_name'],
                    'dob' => $this->input->post('dob'),
                    'date' => $this->input->post('date')
                );

                $this->Diploma_m->form_insert($data);

                $query = $this->db->query("SELECT id FROM students WHERE phone = " . $this->input->post('phone'));

                foreach ($query->result() as $row) {
                    $discount = array(
                        'student_id' => $row->id,
                        'course_id' => $this->input->post('course'),
                        'program' => "diploma",
                        'total_discount' => 0
                    );
                    $this->Diploma_m->insertDiscount($discount);
                }

                $this->Diploma_m->updateRegistered($id_reg);
                $msg['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
                $msg['success'] = array('msg' => "Student Successfully Registered");
                $this->load->view('diploma/diploma_form', $msg);

            } else {
                $msg['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
                $msg['success'] = array('msg' => "Student Not Registered");
                $this->load->view('diploma/diploma_form', $msg);
            }


        }
    }

    public function diplomaStudents()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['students'] = $this->Diploma_m->getDiplomaList();
        $this->load->view('diploma/diploma_list', $data);
    }

    public function newDiploma()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['students'] = $this->Diploma_m->getDiploma();
        $this->load->view('diploma/diploma_new', $data);
    }

    public function newForm()
    {
        $id = $this->input->get("id");
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['student'] = $this->Diploma_m->getDiplomaForm($id);
        $data['courses'] = $this->Diploma_m->getCourses();
        $this->load->view('diploma/diploma_form', $data);
    }

    public function editForm()
    {
        $id = $this->input->get('id');
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['student'] = $this->Diploma_m->getDiplomaDetails($id);
        $this->load->view('diploma/diploma_edit', $data);
    }

    public function editDiploma()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('s_name', 'Student Name', 'required|max_length[128]');
        $this->form_validation->set_rules('sex', 'Sex', 'required');
        $this->form_validation->set_rules('nationality', 'Nationality', 'required|max_length[128]');
        $this->form_validation->set_rules('course', 'Course', 'required|max_length[128]');
        $this->form_validation->set_rules('m_status', 'Marital Status', 'required|max_length[128]');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required|max_length[128]');
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email|max_length[128]');
        $this->form_validation->set_rules('phone', 'Mobile Number', 'required|min_length[10]');

        if (isset($_POST['infoUpdate'])) {
            if ($this->form_validation->run() == FALSE) {
                $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
                $this->load->view('diploma/diploma_edit', $data);
            } else {

                $id = $this->input->post('id');

                $data = array(
                    's_name' => $this->input->post('s_name'),
                    'phone' => $this->input->post('phone'),
                    'whatsapp' => $this->input->post('whatsapp'),
                    'nationality' => $this->input->post('nationality'),
                    'course' => $this->input->post('course'),
                    'm_status' => $this->input->post('m_status'),
                    'district_of_birth' => $this->input->post('district_of_birth'),
                    'email' => $this->input->post('email'),
                    'religion' => $this->input->post('religion'),
                    'sex' => $this->input->post('sex'),
                    'address' => $this->input->post('address'),
                    'country' => $this->input->post('nationality'),
                    'PLE_indx_no' => $this->input->post('PLE_indx_no'),
                    'PLE_yr_exam' => $this->input->post('PLE_yr_exam'),
                    'PLE_result' => $this->input->post('PLE_result'),
                    'PLE_school' => $this->input->post('UACE_school'),
                    'UCE_indx_no' => $this->input->post('UCE_indx_no'),
                    'UCE_yr_exam' => $this->input->post('UCE_yr_exam'),
                    'UCE_result' => $this->input->post('UCE_result'),
                    'UCE_school' => $this->input->post('UCE_school'),
                    'UACE_result' => $this->input->post('UACE_result'),
                    'UACE_indx_no' => $this->input->post('UACE_indx_no'),
                    'UACE_school' => $this->input->post('UACE_school'),
                    'UACE_yr_exam' => $this->input->post('UACE_yr_exam'),
                    'UACE_combination' => $this->input->post('UACE_combination'),
                    'intake' => $this->input->post('intake'),
                    'o_institute_name' => $this->input->post('o_institute_name'),
                    'o_qualification' => $this->input->post('o_qualification'),
                    'o_yr_obtained' => $this->input->post('o_yr_obtained'),
                    'sitm_reg_no' => $this->input->post('sitm_reg_no'),
                    'sitm_course' => $this->input->post('sitm_course'),
                    'sitm_qualification' => $this->input->post('sitm_qualification'),
                    'sitm_doa' => $this->input->post('sitm_doa'),
                    'fathers_name' => $this->input->post('fathers_name'),
                    'mothers_name' => $this->input->post('mothers_name'),
                    'next_kin' => $this->input->post('next_kin'),
                    'f_contact' => $this->input->post('f_contact'),
                    'm_contact' => $this->input->post('m_contact'),
                    'next_kin_contact' => $this->input->post('next_kin_contact'),
                    'dob' => $this->input->post('dob'),
                );

                $this->Diploma_m->editStudent($id, $data);
                $msg['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
                $msg['success'] = array('msg' => "Student Information Successfully Updated");
                $msg['student'] = $this->Diploma_m->getDiplomaDetails($id);
                $this->load->view('diploma/diploma_edit', $msg);
            }
        } else if (isset($_POST['imageUpdate'])) {
            $id = $this->input->post("studentid");
            $oldphoto = $this->input->post("photoold");

            $config['upload_path'] = './students';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 10000;
            $config['max_width'] = 4000;
            $config['max_height'] = 4000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('photo')) {
                $image = $this->upload->data();

                chmod(FCPATH . "students/" . $image['file_name'], 777);

                $data = array("photo" => $image['file_name']);

                $this->load->model('Diploma_m');
                $this->Diploma_m->updatePhoto($id, $data);

                if (file_exists(FCPATH . "students/" . $oldphoto)) {
                    unlink(FCPATH . "students/" . $oldphoto);
                }

                $msg['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
                $msg['success'] = array('msg' => "Student Photo Successfully Updated");
                $msg['student'] = $this->Diploma_m->getDiplomaDetails($id);
                $this->load->view('diploma/diploma_edit', $msg);
            }
        }
    }

    public function deleteDiploma()
    {
        $id = $this->input->get('id');
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['msg'] = $this->Diploma_m->deleteStudent($id);
        $this->diplomaStudents();
    }

    public function studentDetails()
    {
        $id = $this->input->get('id', TRUE);
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['student'] = $this->Diploma_m->getDiplomaDetails($id);
        $this->load->view('diploma/diploma_details', $data);
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

        $this->load->model('Diploma_m');
        $this->Diploma_m->createTest($datainsert);

        $data['ticket'] = $this->Diploma_m->getDiplomaTicket($id);
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['student'] = $this->Diploma_m->getDiplomaDetails($id);
        $this->load->view('diploma/ticket', $data);
    }

    function printLetter()
    {
        $id = $this->input->get('id');

        $this->load->model('Diploma_m');
        $data['student'] = $this->Diploma_m->getDiplomaDetails($id);
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('diploma/letter', $data);
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
    window.location.assign('studentDetails?id='+$id);
} else {
    window.location.assign('studentDetails?id='+$id);
}
</script>";
        } else {

            $this->db->select('*');
            $this->db->from('userlogin');
            $this->db->where('idno', $id);
            $this->db->where('role', 6);
            $query = $this->db->get();
            $result = $query->result();

            if ($query->num_rows() >= 1) {
                $data = array(
                    'idno' => $this->input->post("id"),
                    'email' => $this->input->post("email"),
                    'password' => $this->input->post("password"),
                    'role' => 6,
                    'status' => "active"
                );

                foreach ($result as $r) {
                    $this->db->where('id', $r->id);
                    $this->db->update('userlogin', $data);
                }

                echo "<script>
var r = confirm('Update Successful');
if (r == true) {
    window.location.assign('studentDetails?id='+$id);
} else {
    window.location.assign('studentDetails?id='+$id);
}
</script>";
            } else {
                $data = array(
                    'idno' => $this->input->post("id"),
                    'email' => $this->input->post("email"),
                    'password' => $this->input->post("password"),
                    'role' => 6,
                    'status' => "active"
                );

                $this->db->insert("userlogin", $data);
                echo "<script>
var r = confirm('Login Created Successfully');
if (r == true) {
    window.location.assign('studentDetails?id='+$id);
} else {
    window.location.assign('studentDetails?id='+$id);
}
</script>";
            }

        }
    }
}
