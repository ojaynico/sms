<?php ?>
<html>
    <head>
       
        <title>unpaid invoices</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="http://localhost/staff/title_icon/saipalilogo.jpg" />
        <?php $this->load->view('dashboard/css'); ?>
       
      
     <?php $this->load->view('dashboard/header'); ?>
        <div class="card-panel hoverable ">
		<span class="blue-text text-darken-2 "><center><strong>Pay fees balance here</strong></center></span>
            </div>
        <div class="container">
       
            
    <div class="card-panel hoverable z-depth-5  teal darken-4">
        <form action="<?php echo base_url();?>accounts/unpaid_updated" method="post">
      
           
        <div class="row">
                <div class=" card-panel hoverable z-depth-5 light-green accent-1 col l6 m6 s12">
                     Last payment Date:  
                     <input type="text" name="date" value="<?php if($records){echo $records[0]->creation_timestamp;}?>" readonly="true" class="hoverable">
                     
                  Student name
                  <input type="text" name="student" value="<?php if($records){echo $records[0]->student_id;}?>" readonly="true" class="hoverable">
                    
                    Title of payment
                    <input type="text" name="title" value="<?php if($records){echo $records[0]->title;}?>" class="hoverable">
                    
                    Description of payment
                    <input type="text" name="description" value="<?php if($records){echo $records[0]->description;}?>" class="hoverable">
                    
                    Date of current payment update
                    <input type="date"  value="<?php echo date('Y-m-d'); ?>" readonly="true" class="hoverable">
                          put your invoice information here
                </div>
               
		<div class=" card-panel hoverable z-depth-5 orange lighten-5 col l6 m6 s12">
                    Total amount to be paid.
                    <input type="number" min="0" name="total" value="<?php if($records){echo $records[0]->amount;}?>" readonly="true" class="hoverable">
                    
                    Amount paid in on the total amount.
                    <input type="number" min="0" name="payment" value="<?php if($records){echo $records[0]->amount_paid;}?>"readonly="true" class="hoverable">
                    
                    Balance fee:
                    <input type="number" min="0" name="due" value="<?php if($records){echo $records[0]->due;}?>" readonly="true" class="hoverable">
                    amount to pay on balance:
                    <input type="number" name="bal_pay" min="0" max="<?php if($records){echo $records[0]->due;}?>" class="hoverable" placeholder="0000.00" class="hoverable">
                    
                    Status of payment(choose 'paid' only when fully paid).
                    <font color="red"><?php echo form_error('status'); ?></font> 
                    <select name="status" class="hoverable">
                        <option><?php if($records){echo $records[0]->status;}?></option>
                        <option>paid</option>
                        <option>unpaid</option>
                    </select>
                    <input type="hidden" name="upid" value="<?php if($records){echo $records[0]->invoice_id;}?>" class="hoverable"/>
                    <input type="hidden" value="<?php if($records){echo $records[0]->payment_method;}?>" name="method" class="hoverable">
                    <input type="hidden" value="payment details" name="payment_details">
                    Payment information is made here
                </div>
	    </div>
            
            <!--row ends here-->
            <input type="submit" name="update" value="Update" class="btn green hoverable">
            <input type="reset" class="btn amber darken-4">
       
       </form> 
    </div>  
</div>     
         
        
    <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red">
              <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
              <li><a title="pay here" class="btn-floating red" href="<?php echo base_url(); ?>accounts"><i class="material-icons">insert_chart</i></a></li>
              <li><a title="view payment history"class="btn-floating yellow darken-1" href="<?php echo base_url(); ?>accounts/paid"><i class="material-icons">view_list</i></a></li>
              <li><a title="see and add expenses" class="btn-floating green" href = '<?php echo base_url(); ?>accounts/expenses' ><i class="material-icons">receipt</i></a></li>
              <li><a title="see expense categories"class="btn-floating blue" href = '<?php echo base_url();?>accounts/show_expense_category' ><i class="material-icons">attach_file</i></a></li>
            </ul>
        </div>
               <?php //if($records){echo $records[0]->amount;}?>
 
 <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red">
              <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
              <li><a title="pay here" class="btn-floating red" href="<?php echo base_url(); ?>accounts"><i class="material-icons">insert_chart</i></a></li>
              <li><a title="view payment history"class="btn-floating yellow darken-1" href="<?php echo base_url(); ?>accounts/paid"><i class="material-icons">view_list</i></a></li>
              <li><a title="see and add expenses" class="btn-floating green" href = '<?php echo base_url(); ?>accounts/expenses' ><i class="material-icons">receipt</i></a></li>
              <li><a title="see expense categories"class="btn-floating blue" href = '<?php echo base_url();?>accounts/show_expense_category' ><i class="material-icons">attach_file</i></a></li>
            </ul>
        </div>
 
      <?php $this->load->view('dashboard/footer'); ?>  
     
         
    </body>
</html>