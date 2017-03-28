<?php

class Teacher_m extends CI_Model
{
    function _construct()
    {
        parent::__construct();
    }

    function form_insert($data)
    {
        //Inserting into table(enquiry) of database (sms1)

        $this->db->insert('teaching_staff', $data);
    }


    public function delete_data()
    {

        $id = $_REQUEST['deleteid'];
        $this->db->where('id', $id);
        $this->db->delete('teaching_staff');

    }

    public function update()
    {
        $id = $_REQUEST['editid'];
        $this->db->select('*');
        $this->db->from('teaching_staff');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function updated_data()
    {
        $config['upload_path'] = './staff/teaching_staff';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
        $config['max_width'] = 4000;
        $config['max_height'] = 4000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->upload->do_upload('photo');
        $imagename = $this->upload->data();
        $id = $this->input->post('upid');
        $data = array(
            'name' => $this->input->post('name'),
            'birthday' => $this->input->post('birthday'),
            'sex' => $this->input->post('sex'),
            'blood_group' => $this->input->post('blood_group'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            //'password'=>$this->input->post('password'),
            // 'authenticaion_key'=>$this->input->post('authentication_key'),
            'department' => $this->input->post('department'),
            'nationality' => $this->input->post('nationality'),
            // 'roleid'=>$this->input->post('roleid'),
            'date_of_joining' => $this->input->post('date_of_joining'),
            'qualification' => $this->input->post('qualification'),
            'years_of_experience' => $this->input->post('years_of_experience'),
            'emp_type' => $this->input->post('emp_type'),
            'designation' => $this->input->post('designation'),
            'photo' => $imagename['file_name']
        );
        $this->db->where('id', $id);
        $this->db->update('teaching_staff', $data);
        return true;
    }

    public function detail()
    {
        $id = $_REQUEST['editid1'];
        $this->db->select('*');
        $this->db->from('teaching_staff');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function detailed_data()
    {
        $id = $this->input->post('upid');
        $data = array(

            'name' => $this->input->post('name'),
            'birthday' => $this->input->post('birthday'),
            'sex' => $this->input->post('sex'),
            'blood_group' => $this->input->post('blood_group'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),

            'department' => $this->input->post('department'),
            'nationality' => $this->input->post('nationality'),

            'date_of_joining' => $this->input->post('date_of_joining'),
            'qualification' => $this->input->post('qualification'),
            'years_of_experience' => $this->input->post('years_of_experience'),
            'emp_type' => $this->input->post('emp_type'),
            'designation' => $this->input->post('designation'),
            'photo' => $this->input->post('photo')
        );
        $this->db->where('id', $id);
        $this->db->update('teaching_staff', $data);
        return true;
    }
}

?>