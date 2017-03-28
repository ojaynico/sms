<?php

/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/14/16
 * Time: 12:12 PM
 */
class Certificate_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION['id'])) {
            redirect("login/user");
        }

        $this->load->model("Dashboard_m");
        $this->load->model('Certificate_m');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['students'] = $this->Certificate_m->getCertificateList();
        $this->load->view('certificate/certificate_list', $data);
    }

    public function editForm()
    {
        $id = $this->input->get('id');
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['student'] = $this->Certificate_m->getCertificateDetails($id);
        $this->load->view('certificate/certificate_edit', $data);
    }

    public function newCertificate()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['students'] = $this->Certificate_m->getCertificate();
        $this->load->view('certificate/certificate_new', $data);
    }

    public function newForm()
    {
        $id = $this->input->get("id");
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['student'] = $this->Certificate_m->getCertificateForm($id);
        $this->load->view('certificate/certificate_form', $data);
    }

    public function addCertificate()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('studentName', 'Student Name', 'required|max_length[128]');
        $this->form_validation->set_rules('studentContact', 'Student Contact', 'required|min_length[10]');
        $this->form_validation->set_rules('fathersName', 'Fathers Name', 'required|max_length[128]');
        $this->form_validation->set_rules('fathersContact', 'Fathers Contact', 'required|min_length[10]');
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email|max_length[128]');
        $this->form_validation->set_rules('address', 'Home Address', 'required|max_length[128]');
        $this->form_validation->set_rules('company_college', 'Company/College', 'required|max_length[128]');
        $this->form_validation->set_rules('dream', 'Future Dream', 'required|max_length[128]');
        $this->form_validation->set_rules('mothersName', 'Mothers Name', 'required|max_length[128]');
        $this->form_validation->set_rules('mothersContact', 'Mothers Contact', 'required|min_length[10]');
        $this->form_validation->set_rules('nationality', 'Nationality', 'required|max_length[128]');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required|max_length[128]');
        $this->form_validation->set_rules('sex', 'Sex', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('certificate/certificate_form', $data);
        } else {
            $id_reg = $this->input->post("reg_id");
            $s_name = $this->input->post('studentName');
            $s_contact = $this->input->post('studentContact');
            $whatsapp = $this->input->post('whatsapp');
            $f_name = $this->input->post('fathersName');
            $f_contact = $this->input->post('fathersContact');
            $m_name = $this->input->post('mothersName');
            $m_contact = $this->input->post('mothersContact');
            $nationality = $this->input->post('nationality');
            $dob = $this->input->post('dob');
            $sex = $this->input->post('sex');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $company_college = $this->input->post('company_college');

            $date = $this->input->post('date');
            $dream = $this->input->post('dream');

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

                $data = array(
                    's_name' => $s_name,
                    'phone' => $s_contact,
                    'whatsapp' => $whatsapp,
                    'fathers_name' => $f_name,
                    'f_contact' => $f_contact,
                    'mothers_name' => $m_name,
                    'm_contact' => $m_contact,
                    'nationality' => $nationality,
                    'dob' => $dob,
                    'sex' => $sex,
                    'email' => $email,
                    'program' => "certificate",
                    'address' => $address,
                    'photo' => $image['file_name'],
                    'date' => $date,
                    'dream' => $dream,
                    'company_college' => $company_college);
                $this->load->model('Certificate_m');
                $this->Certificate_m->registerStudent($data);
                $msg['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
                $msg['success'] = array('msg' => "Student Successfully Registered");
                $this->Certificate_m->updateRegistered($id_reg);
                $this->load->view('certificate/certificate_form', $msg);
            } else {
                $msg['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
                $msg['success'] = array('msg' => "Student Not Registered");
                $this->load->view('certificate/certificate_form', $msg);
            }
        }
    }

    public function editCertificate()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('studentName', 'Student Name', 'required|max_length[128]');
        $this->form_validation->set_rules('studentContact', 'Student Contact', 'required|min_length[10]');
        $this->form_validation->set_rules('fathersName', 'Fathers Name', 'required|max_length[128]');
        $this->form_validation->set_rules('fathersContact', 'Fathers Contact', 'required|min_length[10]');
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email|max_length[128]');
        $this->form_validation->set_rules('address', 'Home Address', 'required|max_length[128]');
        $this->form_validation->set_rules('company_college', 'Company/College', 'required|max_length[128]');
        $this->form_validation->set_rules('dream', 'Future Dream', 'required|max_length[128]');
        $this->form_validation->set_rules('mothersName', 'Mothers Name', 'required|max_length[128]');
        $this->form_validation->set_rules('mothersContact', 'Mothers Contact', 'required|min_length[10]');
        $this->form_validation->set_rules('nationality', 'Nationality', 'required|max_length[128]');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required|max_length[128]');
        $this->form_validation->set_rules('sex', 'Sex', 'required');

        if (isset($_POST['infoUpdate'])) {
            if ($this->form_validation->run() == FALSE) {
                $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
                $this->load->view('certificate/certificate_edit', $data);
            } else {
                $id = $this->input->post('id');

                $s_name = $this->input->post('studentName');
                $s_contact = $this->input->post('studentContact');
                $whatsapp = $this->input->post('whatsapp');
                $f_name = $this->input->post('fathersName');
                $f_contact = $this->input->post('fathersContact');
                $m_name = $this->input->post('mothersName');
                $m_contact = $this->input->post('mothersContact');
                $nationality = $this->input->post('nationality');
                $dob = $this->input->post('dob');
                $sex = $this->input->post('sex');
                $email = $this->input->post('email');
                $address = $this->input->post('address');
                $company_college = $this->input->post('company_college');

                $dream = $this->input->post('dream');
                $course = $this->input->post('course');

                $data = array(
                    's_name' => $s_name,
                    'phone' => $s_contact,
                    'whatsapp' => $whatsapp,
                    'fathers_name' => $f_name,
                    'f_contact' => $f_contact,
                    'mothers_name' => $m_name,
                    'm_contact' => $m_contact,
                    'nationality' => $nationality,
                    'dob' => $dob,
                    'sex' => $sex,
                    'email' => $email,
                    'course' => $course,
                    'program' => "certificate",
                    'address' => $address,
                    'dream' => $dream,
                    'company_college' => $company_college);
                $this->load->model('Certificate_m');
                $this->Certificate_m->editStudent($id, $data);
                $msg['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
                $msg['success'] = array('msg' => "Student Information Successfully Updated");
                $msg['student'] = $this->Certificate_m->getCertificateDetails($id);
                $this->load->view('certificate/certificate_edit', $msg);
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

                $this->load->model('Certificate_m');
                $this->Certificate_m->updatePhoto($id, $data);

                if (file_exists(FCPATH . "students/" . $oldphoto)) {
                    unlink(FCPATH . "students/" . $oldphoto);
                }

                $msg['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
                $msg['success'] = array('msg' => "Student Photo Successfully Updated");
                $msg['student'] = $this->Certificate_m->getCertificateDetails($id);
                $this->load->view('certificate/certificate_edit', $msg);
            }
        }
    }

    public function deleteCertificate()
    {
        $id = $this->input->get('id');
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['msg'] = $this->Certificate_m->deleteStudent($id);
        $this->certificateStudents();
    }

    public function certificateStudents()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['students'] = $this->Certificate_m->getCertificateList();
        $this->load->view('certificate/certificate_list', $data);
    }

    public function studentDetails()
    {
        $id = $this->input->get('id', TRUE);
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['student'] = $this->Certificate_m->getCertificateDetails($id);
        $this->load->view('certificate/certificate_details', $data);
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