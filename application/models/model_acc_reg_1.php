<?php
class Model_acc_reg extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    
    public function update_detail()
        {
            $id = $_REQUEST['editid'];
            $this->db->select('*');
            $this->db->from('enquiry');
            $this->db->where('id',$id);
            $query = $this->db->get();
            return $result = $query->result();
    }
    
    public function status_update()
    {
        $id=$this->input->post('upid');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $sex = $this->input->post('sex');
        $program = $this->input->post('program');
        $amount = $this->input->post('amount');
        $method = $this->input->post('method');
        $currency = $this->input->post('currency');
        $date_of_payment = $this->input->post('date');
        $status= $this->input->post('status');
        
        
        $data = array(
          
            'status'=>$status
            
                  );
        $data2 = array(
            
            'name'=>$name,
            'phone'=>$phone,
            'sex'=>$sex,
            'program'=>$program,
            'amount'=>$amount,
            'method'=>$method,
            'currency'=>$currency,
            'date_of_payment'=>$date_of_payment
        );
          $this->db->where('id',$id);
          
          $this->db->update('enquiry', $data);
          $this->db->insert('accounts_registration',$data2);
           return true ;
    }
    
    public function print_receipt()
    {
        $id = $_REQUEST['receiptid'];
            $this->db->select('*');
            $this->db->from('accounts_registration');
            $this->db->where('id',$id);
            $query = $this->db->get();
            return $result = $query->result(); 
    }
   
}
