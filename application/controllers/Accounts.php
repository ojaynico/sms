<?php
class Accounts extends CI_Controller
{
    function __construct() {
        parent::__construct();
        
        if (empty($_SESSION['id'])) {
            redirect("login/user");
        }

        $this->load->model("Dashboard_m");
        $this->load->model("Batches_m");
        $this->load->model('M_student_payments');
        $this->load->library('session');
        $this->load->helper('date');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
   
    public function index()
    {
         //including validation library
        $this->load->library('form_validation');
        
        //validating student address
        $this->form_validation->set_rules('title','title','required');
        
        //validating student email
        $this->form_validation->set_rules('status','status','required');
        
        //validating reason
        $this->form_validation->set_rules('date','date','required');
        
        //validating former company or school
        $this->form_validation->set_rules('payment','school','required');
        
        if ($this->form_validation->run() == FALSE) {
           $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('accounts/cs_payments',$data);
        } else {
        
            
        $data = array(
            //'st_name'=>$this->input->post('class'),
            'student_id'=>$this->input->post('student'),
            'title'=>$this->input->post('title'),
            'description'=>$this->input->post('description'),
            'amount'=>$this->input->post('total'),
            'amount_paid'=>$this->input->post('payment'),
            'due'=>$this->input->post('total') - $this->input->post('payment'),
            'creation_timestamp'=>$this->input->post('date'),
            'payment_method'=>$this->input->post('method'),
            'payment_details'=>$this->input->post('payment_details'),
            'status'=>$this->input->post('status')
    );
        
        //Transfering data to model
        $this->M_student_payments->form_insert($data);
    
        $invoice_id = $this->db->insert_id();
        
        $data['invoice_id'] = $invoice_id;
        $data2['student_id'] = $this->input->post('student');
        $data2['title']      = $this->input->post('title');
        $data2['description']= $this->input->post('description');
        $data2['payment_type']=  'income';
        $data2['method']     = $this->input->post('method');
        $data2['amount']     = $this->input->post('payment');
        $data2['timestamp']  = $this->input->post('date');
        
        $this->db->insert('payment',$data2);
        
        //loading view
        $this->session->set_tempdata('status','Student has successfully paid','5');
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('accounts/cs_payments',$data);
    }
  }
  
  //inserting into multiple rows of invoices into the payment and invoice tables
  public function mass_invoice()
  {
      $this->load->view('accounts/c_mass_invoice');
  }
  
  
  
    //ACCOUNTS HISTORY MANAGEMENT
    function paid()
    {
       // a query of retrieving data from the database in a table payment
        $this->db->where('status','paid');
        $query = $this->db->get("invoice");
        $data['records'] = $query->result();
        
        $this->load->helper('url');
        //loading a view to show data in a table
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('accounts/paid_view',$data); 
    }
    function unpaid()
    {
        // a query of retrieving data from the database in a table payment
        $this->db->where('status','unpaid');
        $query = $this->db->get("invoice");
        $data['records'] = $query->result();
        
        $this->load->helper('url');
        //loading a view to show data in a table
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('accounts/unpaid_view',$data); 
    }
    function expense_history()
    {
        
        // a query of retrieving data from the database in a table payment
        $this->db->where('payment_type', 'expense');
        $query = $this->db->get("payment");
        $data3['records'] = $query->result();
        
        $this->load->helper('url');
        //loading a view to show data in a table
        $data3['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('accounts/expenses_history',$data3);
    }
    function income_history()
    {
        // a query of retrieving data from the database in a table payment
        $this->db->where('payment_type', 'income');
        $query = $this->db->get("payment");
        $data3['records'] = $query->result();
        
        $this->load->helper('url');
        //loading a view to show data in a table
        $data3['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('accounts/incomehist_view',$data3); 
    }
    function transaction_history()
    {
         // a query of retrieving data from the database in a table payment
        //$this->db->where('payment_type', 'income');
        $query = $this->db->get("payment");
        $data3['records'] = $query->result();
        
        $this->load->helper('url');
        //loading a view to show data in a table
        $data3['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('accounts/transactions_view',$data3); 
    }

    
    public function detail()
    {
        if(isset($_REQUEST['editid1']) && $_REQUEST['editid1']!='' && $_REQUEST['editid1']!=0)
        {
            $data['records'] = $this->M_student_payments->detail();
            $this->load->view('accounts/invoice_view',$data);
        }
    }
    
     public function history()
   {
        // a query of retrieving data from the database in a table payment
        $query = $this->db->get("payment");
        $data2['records'] = $query->result();
        
        $this->load->helper('url');
        //loading a view to show data in a table  
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('accounts/payment_history',$data2);
   }
   
   //ACCOUNTS EXPENSE MANAGEMENT
   public function expense()
   {
       //including validation library
        $this->load->library('form_validation');
         //validating title
        $this->form_validation->set_rules('title','title','required');
        
        //validating category
        $this->form_validation->set_rules('category','category','required');
        
        //validating method
        $this->form_validation->set_rules('method','method','required');
        
        //validating amount
        $this->form_validation->set_rules('amount','amount','required');
        
        //validating date
        $this->form_validation->set_rules('date','date','required');
        
        if ($this->form_validation->run() == FALSE) {
            $da['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('accounts/expense',$da);
        } else {
            //an array of data to be insertedd into the table enquiry.
        $data3['expense_category_id'] = $this->input->post('category');
        $data3['title']      = $this->input->post('title');
        $data3['payment_type']=  'expense';
        
        $data3['method']     = $this->input->post('method');
        $data3['description']= $this->input->post('description');
        $data3['amount']     = $this->input->post('amount');
        $data3['timestamp']  = $this->input->post('date');
    
        
        $this->db->insert('payment',$data3);
        $this->db->insert('expenses',$data3);
    
    //loading view
        $data3['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
         $this->session->set_tempdata('exp','data added succesfully','5');
        $this->load->view('accounts/expenses',$data3);
        //
   }
}

//function for showing expenses in a table
public function expenses()
{
    // a query of retrieving data from the database in a table payment
    $this->db->where('payment_type', 'expense');
    $query =  $this->db->get("payment");
    $data3['records'] = $query->result();
        
    $this->load->helper('url');
    //loading a view to show data in a table
    
    $data3['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
    $this->load->view('accounts/expenses',$data3);
}

//function for updating the expenses
 public function expense_update()
    {
        if(isset($_REQUEST['editid']) && $_REQUEST['editid']!='' && $_REQUEST['editid']!=0)
        {
            $data3['recordup'] = $this->M_student_payments->expense_update();
            $data3['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('accounts/expense_update',$data3);
        }
    }
    
    public function expense_updated()
    {
        if(isset($_POST['update']) && $_POST['update'] == 'Update')
       {
           $this->M_student_payments->expense_updated();
          
          redirect(base_url().'accounts/expenses');
       }
    }
    
    public function expense_receipt()
    {
        if(isset($_REQUEST['editid']) && $_REQUEST['editid']!='' && $_REQUEST['editid']!=0)
        {
            $data3['recordup'] = $this->M_student_payments->expense_update();
            $data3['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('accounts/expense_receipt',$data3);
        }
    }

    //function for deleting expenses
     public function expense_delete()
{
    
     if(isset($_REQUEST['deleteid'])&& $_REQUEST['deleteid']!='' && $_REQUEST['deleteid']!=0)
    {
         //deleting data set from the model
        $this->M_student_payments->expense_delete_data();
        $this->load->helper('url');
        $this->session->set_tempdata('dlt','you have deleted successfully deleted an expense','5');
        //redirecting back the user to the page he's deleting from.
        redirect(base_url().'index.php/accounts/expenses');
    }
    
    
}

  
    function show_expense_category()
    {
        // a query of retrieving data from the database in a table enquiry
        $query = $this->db->get("expense_category");
        $data['records'] = $query->result();
        
        $this->load->helper('url');
        //loading a view to show data in a table
        $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
        $this->load->view('accounts/expense_category_view', $data);
    }



    function create_expense_category()
    {
        //validating expense category
        $this->form_validation->set_rules('name','name','required');
        
        if ($this->form_validation->run() == FALSE) {
           $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('accounts/expense_category_view',$data);
        } else {
            $data['name'] = $this->input->post('name');
            $this->db->insert('expense_category',$data);
            $this->session->set_tempdata('msg','you have created an expense category','5');
            //loading view
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('accounts/expense_category_view',$data);
        }
    }
    
 //function for deleting the expense categories
    public function delete()
{
    
     if(isset($_REQUEST['deleteid'])&& $_REQUEST['deleteid']!='' && $_REQUEST['deleteid']!=0)
    {
         //dleting data set from the model
        $this->M_student_payments->delete_data();
        $this->load->helper('url');
        //redirecting back the user to the page he's deleting from.
        $this->session->set_tempdata('dlt','you have deleted a record','5');
        redirect(base_url().'index.php/accounts/show_expense_category');
    }
    
    
}

//function for updating the expense categories
 public function update()
    {
        if(isset($_REQUEST['editid']) && $_REQUEST['editid']!='' && $_REQUEST['editid']!=0)
        {
            $data['records'] = $this->M_student_payments->update();
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('accounts/expense_category_update',$data);
        }
    }
    
     function updated_data()
    {
       if(isset($_POST['update']) && $_POST['update'] == 'Update')
       {
           $this->M_student_payments->updated_data();
           
           $this->session->set_tempdata('upd','data updated succesfully','5');
           redirect(base_url().'index.php/accounts/show_expense_category');
       }
    }
     

//WORKING ON FEES RECEIPTS
public function paid_receipt()
{
    if(isset($_REQUEST['invoiceid']) && $_REQUEST['invoiceid']!='' && $_REQUEST['invoiceid']!=0)
        {
        
            $data['records'] = $this->M_student_payments->paid_detail();
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('accounts/paid_invoice',$data);
        } 
}    
//this function retrieves unpaid invoices
public function unpaid_receipt()
{
    if(isset($_REQUEST['invoiceid']) && $_REQUEST['invoiceid']!='' && $_REQUEST['invoiceid']!=0)
        {
            $data['records'] = $this->M_student_payments->unpaid_detail();
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('accounts/unpaid_invoice',$data);
        } 
}
//UPDATING UNPAID TO PAID
public function unpaid_update()
{
    if(isset($_REQUEST['invoiceid']) && $_REQUEST['invoiceid']!='' && $_REQUEST['invoiceid']!=0)
        {
            $data['records'] = $this->M_student_payments->unpaid_detail();
            $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
            $this->load->view('accounts/unpaid_update',$data);
        } 
}
function unpaid_updated()
    {
       if(isset($_POST['update']) && $_POST['update'] == 'Update')
       {
           $this->M_student_payments->updated_unpaid();
           redirect(base_url().'accounts/unpaid');
       }
    }

//This function retrieves total amount and expenses in the school
public function accounts_samary()
{
    $data['userinfo'] = $this->Dashboard_m->userDetails($_SESSION['user_id'], $_SESSION['role']);
    $this->load->view('accounts/acc_samary',$data);
}
}
?>