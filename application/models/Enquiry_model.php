<?php
class enquiry_model extends CI_Model{
    function _construct()
    {
        parent::__construct();
        }
        
        function form_insert($data){
            //Inserting into table(enquiry) of database (sms1)
            
            $this->db->insert('enquiry',$data);
        }
        
        
        public function delete_data()
        {
            
            $id = $_REQUEST['deleteid'];
            $this->db->where('id', $id);
            $this->db->delete('enquiry');
          
        }
        
        public function update()
        {
            $id = $_REQUEST['editid'];
            $this->db->select('*');
            $this->db->from('enquiry');
            $this->db->where('id',$id);
            $query = $this->db->get();
            return $result = $query->result();
    }
    
    public function updated_data()
    {
        $id=$this->input->post('upid');
        $st_name = $this->input->post('st_name');
        $smobile = $this->input->post('smobile');
        $st_address = $this->input->post('saddress');
        $st_email = $this->input->post('email');
        $g_name = $this->input->post('pname');
        $g_mobile = $this->input->post('pmobile');
        $reason = $this->input->post('reason');
        $qualification = $this->input->post('qual');
        $f_company = $this->input->post('school');
        $p_knowlegde = $this->input->post('knowledge');
        $course = $this->input->post('course');
        $status = $this->input->post('status');
        $date = $this->input->post('date');
        
        $data = array(
          'st_name'=>$st_name,
          'st_mobile'=>$smobile,
          'st_address'=>$st_address,
            'st_email'=>$st_email,
            'g_name'=>$g_name,
            'g_mobile'=>$g_mobile,
            'reason'=>$reason,
            'qualification'=>$qualification,
            'f_company'=>$f_company,
            'p_knowlegde'=>$p_knowlegde,
            'course'=>$course,
            'status'=>$status,
            'date'=>$date
                  );
          $this->db->where('id',$id);
          $this->db->update('enquiry', $data);
           return true ;
    }
    
     public function detail()
        {
            $id = $_REQUEST['editid1'];
            $this->db->select('*');
            $this->db->from('enquiry');
            $this->db->where('id',$id);
            $query = $this->db->get();
            return $result = $query->result();
    }
    
    public function detailed_data()
    {
        $id=$this->input->post('upid');
        $st_name = $this->input->post('st_name');
        $smobile = $this->input->post('smobile');
        $st_address = $this->input->post('saddress');
        $st_email = $this->input->post('email');
        $g_name = $this->input->post('pname');
        $g_mobile = $this->input->post('pmobile');
        $reason = $this->input->post('reason');
        $qualification = $this->input->post('qual');
        $f_company = $this->input->post('school');
        $p_knowlegde = $this->input->post('knowledge');
        $course = $this->input->post('course');
        $status = $this->input->post('status');
        $date = $this->input->post('date');
        
        $data = array(
          'st_name'=>$st_name,
          'smobile'=>$smobile,
          'st_address'=>$st_address,
            'st_email'=>$st_email,
            'g_name'=>$g_name,
            'g_mobile'=>$g_mobile,
            'reason'=>$reason,
            'qualification'=>$qualification,
            'f_company'=>$f_company,
            'p_knowlegde'=>$p_knowlegde,
            'course'=>$course,
            'status'=>$status,
            'date'=>$date
                  );
          $this->db->where('id',$id);
          $this->db->update('enquiry', $data);
           return true ;
    }
}
?>