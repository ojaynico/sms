<?php
class M_student_payments extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    
    function form_insert($data){
            //Inserting into table(invoice) of database (sms1)
            
            $this->db->insert('invoice',$data);
        }
        
        //deleting expense category id
         public function delete_data()
        {
            
            $expense_category_id = $_REQUEST['deleteid'];
            $this->db->where('expense_category_id', $expense_category_id);
            $this->db->delete('expense_category');
          
        }
        
        public function update()
        {
            $expense_category_id = $_REQUEST['editid'];
            $this->db->select('*');
            $this->db->from('expense_category');
            $this->db->where('expense_category_id',$expense_category_id);
            $query = $this->db->get();
            return $result = $query->result();
    }
    
    public function updated_data()
    {
        $expense_category_id=$this->input->post('upid');
        $data['name'] = $this->input->post('name');
      
        $this->db->where('expense_category_id',$expense_category_id);
        $this->db->update('expense_category', $data);
        return true;
    }
    //This is a function for the payment details
    public function detail()
        {
            $payment_id = $_REQUEST['editid1'];
            $this->db->select('*');
            $this->db->from('payment');
            $this->db->where('payment_id',$payment_id);
            $query = $this->db->get();
            return $result = $query->result();
    }
    
  //this is a function for the expense category details
    
   public function expense_update()
        {
            $payment_id = $_REQUEST['editid'];
            $this->db->select('*');
            $this->db->from('payment');
            $this->db->where('payment_id',$payment_id);
            $query = $this->db->get();
            return $result = $query->result();
    }
    
    public function expense_updated()
    {
        $payment_id=$this->input->post('upid');
        $data3['expense_category_id'] = $this->input->post('category');
        $data3['title']      = $this->input->post('title');
        $data3['payment_type']=  'expense';
        
        $data3['method']     = $this->input->post('method');
        $data3['description']= $this->input->post('description');
        $data3['amount']     = $this->input->post('amount');
        $data3['timestamp']  = strtotime($this->input->post('date'));
      
          $this->db->where('payment_id',$payment_id);
          $this->db->update('payment', $data3);
           return true ;
    } 
    
    //deleting expense category id
         public function expense_delete_data()
        {
            
            $payment_id = $_REQUEST['deleteid'];
            $this->db->where('payment_id', $payment_id);
            $this->db->delete('payment');
          
        }
        
       //WORKING ON FEES RECEIPTS
         public function unpaid_detail()
        {
            $invoice_id = $_REQUEST['invoiceid'];
            $this->db->select('*');
            $this->db->from('invoice');
            $this->db->where('invoice_id',$invoice_id);
            $this->db->where('status','unpaid');
            $query = $this->db->get();
            return $result = $query->result();
        }
    
         public function paid_detail()
        {
            $invoice_id = $_REQUEST['invoiceid'];
            $this->db->select('*');
            $this->db->from('invoice');
            $this->db->where('invoice_id',$invoice_id);
            $this->db->where('status','paid');
            $query = $this->db->get();
            return $result = $query->result();
        }
        public function updated_unpaid()
        {
             $invoice_id=$this->input->post('upid');
             $student = $this->input->post('student');
             $title = $this->input->post('title');
             $description = $this->input->post('description');
             $date = $this->input->post('date');
             $total = $this->input->post('total');
             $payment = $this->input->post('payment');
             $due = $this->input->post('due');
             $bal_pay = $this->input->post('bal_pay');
             $status = $this->input->post('status');
             $method = $this->input->post('method');
             $details = $this->input->post('payment_details');
             
             $data3 = array(
                 'student_id'=>$student,
                 'title'=>$title,
                 'description'=>$description,
                 'amount'=>$total,
                 'amount_paid'=>$payment + $bal_pay,
                 'due'=>$due - $bal_pay,
                 'status'=>$status
             );
            $this->db->where('invoice_id',$invoice_id);
            $this->db->update('invoice', $data3);
            return true ;
        }
    
}
?>