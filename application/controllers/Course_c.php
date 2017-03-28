<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/24/16
 * Time: 3:01 PM
 */
class Course_c extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION['id'])) {
            redirect("login/user");
        }

        $this->load->model("Dashboard_m");
        $this->load->model('Course_m');
        $this->load->helper(array('form', 'url'));
    }

    public function index(){
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('course/course_form', $data);
    }

    public function addCourse(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Course Name', 'required|max_length[128]');
        $this->form_validation->set_rules('program', 'Course Program', 'required|max_length[30]');
        $this->form_validation->set_rules('f_fee', 'Functional Fee', 'max_length[128]');
        $this->form_validation->set_rules('installments', 'Course Fee', 'required|max_length[128]');
        $this->form_validation->set_rules('duration', 'Course Duration', 'required|max_length[50]');

        if ($this->form_validation->run() == FALSE){
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('course/course_form', $data);
        } else{
            $name = $this->input->post('name');
            $program = $this->input->post('program');
            $f_fee = $this->input->post('f_fee');
            $installments = $this->input->post('installments');
            $duration = $this->input->post('duration');

                $data = array('name' => $name,
                    'program' => $program,
                    'f_fee' => $f_fee,
                    'installments' => $installments,
                    'duration' => $duration);

                $this->load->model('Course_m');
                $this->Course_m->addCourse($data);
            $msg['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
                $msg['success'] = array('msg' => "Course Successfully Added");
                $this->load->view('course/course_form', $msg);
        }
    }

    public function allCourses(){
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['course'] = $this->Course_m->getCourseList();
        $this->load->view('course/course_list', $data);
    }

    public function editForm(){
        $id = $this->input->get('id');
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['course'] = $this->Course_m->getCourseDetails($id);
        $this->load->view('course/course_edit', $data);
    }

    public function editCourse(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Course Name', 'required|max_length[128]');
        $this->form_validation->set_rules('program', 'Course Program', 'required|max_length[30]');
        $this->form_validation->set_rules('f_fee', 'Functional Fee', 'max_length[128]');
        $this->form_validation->set_rules('installments', 'Course Fee', 'required|max_length[128]');
        $this->form_validation->set_rules('duration', 'Course Duration', 'required|max_length[50]');

        if ($this->form_validation->run() == FALSE){
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('course/course_edit', $data);
        } else{
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $program = $this->input->post('program');
            $f_fee = $this->input->post('f_fee');
            $installments = $this->input->post('installments');
            $duration = $this->input->post('duration');

            $data = array('name' => $name,
                'program' => $program,
                'f_fee' => $f_fee,
                'installments' => $installments,
                'duration' => $duration);

            $this->load->model('Course_m');
            $this->Course_m->editCourse($id, $data);
            $msg['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $msg['success'] = array('msg' => "Course Successfully Updated");
            $msg['course'] = $this->Course_m->getCourseDetails($id);
            $this->load->view('course/course_edit', $msg);
        }
    }

    public function deleteCourse(){
        $id = $this->input->get('id');
        $data['msg'] = $this->Course_m->deleteCourse($id);
        $this->allCourses();
    }

    public function courseDetails()
    {
        $id = $this->input->get('id');
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['course'] = $this->Course_m->getCourseDetails($id);
        $this->load->view('course/course_details', $data);
    }
    
    public function addSubject() {
        $course_id = $this->input->post('course_id');
        $subject = $this->input->post('subject');
        $semester = $this->input->post('semester');
        
        $data = array(
            'name'=>$subject,
            'semester'=>$semester,
            'course_id'=>$course_id
        );
        
        $this->Course_m->addSubject($data);
        
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $data['course'] = $this->Course_m->getCourseDetails($course_id);
        $this->load->view('course/course_details', $data);
    }
}