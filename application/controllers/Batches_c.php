<?php
class Batches_c extends CI_Controller{
    function __construct() {
        parent::__construct();
         if (empty($_SESSION['id'])) {
            redirect("login/user");
        }

        $this->load->model("Dashboard_m");
        $this->load->model("Batches_m");
        }
        
    function index()
    {
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('batches/batches_list',$data);
    }
    
    function addBatch(){
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('batches/batches_add',$data);
    }
    
    function addStudents(){
        $batch_no = $this->input->post('batch_no');
        $course = $this->input->post('course');
        $intake = $this->input->post('intake');
        
        $data['batch_no'] = array( 'batch_no' => $batch_no);
        $data['course'] = array( 'course' => $course);
        $data['intake'] = array( 'intake' => $intake);
        
        $data['students'] = $this->Batches_m->students($course, $intake);
        
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('batches/student_add',$data);
    }
    
    function submitStudents(){
        $batch_no = $this->input->post('batch_no');
        $course = $this->input->post('course');
        $intake = $this->input->post('intake');
        $student = $this->input->post('student');
        
        $query = $this->db->select_max('id')->get('batch')->row();
        $batchid = $query->id + 1;
        
        $batchinsert = array(
            'id' => $batchid,
            'batch_no' => $batch_no,
            'course_id' => $course,
            'intake' => $intake
        );
        
        $this->db->insert('batch', $batchinsert);
        
        for($i = 0; $i < count($student); $i++){
            $batchstudent = array('student_id'=>$student[$i], 'batch_id'=>$batchid);
            
            $batch_status = 1;
            $this->db->insert('batch_students', $batchstudent);
            
            $this->db->set('batch_status',1);
            $this->db->where('id',$student[$i]);
            $this->db->update('students');
        }
       
    }
    
    function get_batchstudents(){
        $id = $this->input->get('id');
        
        $data['batch'] = $this->Batches_m->batchDetails($id);
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('batches/batch_students',$data);
    }
    
    function update_batch(){
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        
         if(isset($_REQUEST['editid']) && $_REQUEST['editid']!='' && $_REQUEST['editid']!=0)
        {
            $data['records'] = $this->Batches_m->update_batch();
            
            $this->load->view('batches/batch_update',$data);
        }
    }
    
    function editStudents()
    {
        $id=$this->input->post('id');
        $batch_no = $this->input->post('batch_no');
        $course = $this->input->post('course');
        $intake = $this->input->post('intake');
        
        $data['id'] = array('id'=>$id);
        $data['batch_no'] = array( 'batch_no' => $batch_no);
        $data['course'] = array( 'course' => $course);
        $data['intake'] = array( 'intake' => $intake);
        
        $data['students'] = $this->Batches_m->studentsEdit($course, $intake);
        
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('batches/student_edit',$data);
    }
    
    
    function updateStudents(){
        $id=$this->input->post('id');
        $batch_no = $this->input->post('batch_no');
        $course = $this->input->post('course');
        $intake = $this->input->post('intake');
        $student = $this->input->post('student');
        
        $query = $this->db->select_max('id')->get('batch')->row();
        $batchid = $query->id + 1;
        
        $batchup = array(
            //'id' => $batchid,
            'batch_no' => $batch_no,
            'course_id' => $course,
            'intake' => $intake
        );
        
        
        $this->db->where('id',$id);
          
          $this->db->update('batch', $batchup);
          
        for($i = 0; $i < count($student); $i++){
            $batchstudent = array('student_id'=>$student[$i], 'batch_id'=>$batchid);
            
            $batch_status = 1;
            //$this->db->insert('batch_students', $batchstudent);
            
            $this->db->set('batch_status',1);
            $this->db->where('id',$student[$i]);
            $this->db->update('students');
        }
       
    }
    
    
    
    
    
    
    
    
    //this function updates the status to '1' in enquiry table of sms1 database, and inserts data to accounts_registration table.
    function deleteBatch()
    {
        $id = $this->input->get('id');
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->db->where('id', $id);
        $this->db->delete('batch');
        $this->load->view('batches/batches_list',$data);
    }
}
