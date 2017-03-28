<?php
class Non_teacher_m extends CI_Model{
    function _construct()
    {
        parent::__construct();
        }
        
        function form_insert($data){
            //Inserting into table(non_teaching_staff) of database (sms1)
            
            $this->db->insert('non_teaching_staff',$data);
        }
        
        
        public function delete_data()
        {
            
            $id = $_REQUEST['deleteid'];
            $this->db->where('id', $id);
            $this->db->delete('non_teaching_staff');
          
        }
        
        public function update()
        {
            $id = $_REQUEST['editid'];
            $this->db->select('*');
            $this->db->from('non_teaching_staff');
            $this->db->where('id',$id);
            $query = $this->db->get();
            return $result = $query->result();
    }
    
    public function updated_data()
    {
         //an array of data to be insertedd into the table enquiry.
            $config['upload_path'] = './staff/non_teaching_staff';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 5000;
            $config['max_width'] = 2400;
            $config['max_height'] = 2400;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $this->upload->do_upload('photo');
            $imagename = $this->upload->data();
       $id=$this->input->post('upid');
        $data = array(
          
          'name'=>  $this->input->post('name'),
          'birthday'=>$this->input->post('birthday'),
          'sex'=>$this->input->post('sex'),
          'blood_group'=>$this->input->post('blood_group'),
          'address'=>$this->input->post('address'),
          'phone'=>$this->input->post('phone'),
          'email'=>$this->input->post('email'),
          'department'=>$this->input->post('department'),
          'nationality'=>$this->input->post('nationality'),       
          'date_of_joining'=>$this->input->post('date_of_joining'),
          'qualification'=>$this->input->post('qualification'),          
         'photo' => $imagename['file_name']
                  );
          $this->db->where('id',$id);
          $this->db->update('non_teaching_staff',$data);
           return true ;
    }
    
     public function detail()
        {
            $id = $_REQUEST['editid1'];
            $this->db->select('*');
            $this->db->from('non_teaching_staff');
            $this->db->where('id',$id);
            $query = $this->db->get();
            return $result = $query->result();
    }
    
    public function detailed_data()
    {
         $id=$this->input->post('upid');
        $data = array(
          
          'name'=>  $this->input->post('name'),
          'birthday'=>$this->input->post('birthday'),
          'sex'=>$this->input->post('sex'),
          'blood_group'=>$this->input->post('blood_group'),
          'address'=>$this->input->post('address'),
          'phone'=>$this->input->post('phone'),
          'email'=>$this->input->post('email'),
          'department'=>$this->input->post('department'),
          'nationality'=>$this->input->post('nationality'),
          'date_of_joining'=>$this->input->post('date_of_joining'),
          'qualification'=>$this->input->post('qualification'),
          'photo'=>  $this->input->post('photo')
                  );
          $this->db->where('id',$id);
          $this->db->update('non_teaching_staff',$data);
           return true ;
    }
    
    function get_image_url($type='',$id='')
    {
        if(file_exists('uploads/'.$type.'_image/'.$id.'.jpg'))
                $image_url = base_url ().'uploads/'.$type.'_image/'.$id.'.jpg';
        else
            $image_url = base_url ().'uploads/user.jpg';
        return $image_url;
    }
}
?>