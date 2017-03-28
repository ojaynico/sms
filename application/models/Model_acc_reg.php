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

        $data = array(
            'status'=>1
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
        $data3 = array(
            'title'=>'registration',
            'payment_type'=>'income',
            'amount'=>$amount,
            'timestamp'=>$date_of_payment
        );
        $data4 = array(
            'student_id'=>$name,
            'title'=>'registration',
            'description'=>'registration',
            'amount_paid'=>$amount,
            'creation_timestamp'=>$date_of_payment,
            'payment_method'=>$method,
            'payment_details'=>'registration'
        );
          $this->enquiryUpdate($id, $data);
          $this->db->insert('accounts_registration',$data2);
          $this->db->insert('payment',$data3);
          $this->db->insert('invoice',$data4);
           return true;
    }

    function enquiryUpdate($id, $data){
        $this->db->where('id',$id);
        $this->db->update('enquiry', $data);
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
