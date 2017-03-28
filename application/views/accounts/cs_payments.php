<?php ?>
<html>
    <head>
        <title>create new payment</title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="http://localhost/staff/title_icon/saipalilogo.jpg" />
       
        <?php $this->load->view('dashboard/css'); ?>
    </head>
     <?php $this->load->view('dashboard/header'); ?>
    <div id="main-content">
       <div class="container-fluid">
       
      
        <!--<a  href = "<?php echo base_url(); ?>"><i class="small material-icons">replay_10</i></a></button><br>-->
         <a class="btn waves-effect teal darken-4" href="accounts">Create Student payments</a>
  <!--
        <a class="btn waves-effect light-green accent-4" href="accounts/mass_invoice">Create Mass Invoice</a>
  -->    
  
        
  
        <div class="card-panel hoverable teal z-depth-5">
            <div class="card-panel hoverable ">
		<span class="blue-text text-darken-2 "><center><strong>Enter fees payment details here</strong></center></span>
            </div>
        <form method="POST" action="<?php echo base_url();?>index.php/accounts" >
           
            <!--the row starts here-->
           
            <br>
            <div class="row">
                <div class=" card-panel hoverable z-depth-5 light-green accent-1 col l5 m5 s11">
                    Student batch
                    <select name='batch' class="hoverable">
                        <option disabled selected>select the student batch</option>
                        <?php
                        $que =  $this->db->query('SELECT DISTINCT batch_no FROM batch')->result();
                        foreach($que as $q):
                        ?>
                        <option><?php  echo $q->batch_no; ?></option>
                        <?php endforeach; 
                        ?>
                    </select>
                   
                  Student name
                  <select name="student" class="hoverable">
                         <option disabled selected>select the student batch first</option>
                        <?php
                        $que =  $this->db->query('SELECT s_name FROM students')->result();
                        foreach($que as $q):
                        ?>
                         <option value="<?php echo $q->s_name; ?>"><?php  echo $q->s_name; ?></option>
                        <?php endforeach; 
                        ?>
                    </select>
                    
                    Title of payment
                    <font color="red"><?php echo form_error('title'); ?></font>
                    <input type="text" name="title" class="hoverable">
                    
                    Description of payment
                    <font color="red"><?php echo form_error('description'); ?></font>
                    <input type="text" name="description" class="hoverable">
                   
                    <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
                          put your invoice information here
                </div>
                <div class="col l2 m2 s2">.</div>
		<div class=" card-panel hoverable z-depth-5 orange lighten-5 col l5 m5 s11">
                    Total amount to be paid.
                    <font color="red"><?php echo form_error('total'); ?></font>
                    <input type="number" name="total" min="0" max="5000000" class="hoverable">
                    
                    Amount being paid in.
                    <font color="red"><?php echo form_error('payment'); ?></font> 
                    <input type="number" name="payment"min="0" max="5000000" class="hoverable">
                    
                    Status of payment(choose 'paid' only when fully paid).
                    <font color="red"><?php echo form_error('status'); ?></font> 
                    <select name="status" class="hoverable">
                        <option disabled selected>select either paid or unpaid</option>
                        <option>paid</option>
                        <option>unpaid</option>
                    </select>
                    
                    Method of payment.
                    <font color="red"><?php echo form_error('method'); ?></font> 
                    <select name='method' class="hoverable">
                        <option disabled selected>select payment method</option>
                        <?php
                        $method = $this->db->query("SELECT * FROM method")->result();
                        foreach($method as $m){
                            
                            ?>
                        <option><?php echo $m->name; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <input type="hidden"  name="due">
                    <input type="hidden" value="payment details" name="payment_details">
                    Payment information is made here
                </div>
	    </div>
            
            <!--row ends here-->
            <input type="submit" value="pay here" class="btn light-green accent-4">
            <input type="reset" class="btn amber darken-4">
        </form>
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
      <?php $this->load->view('dashboard/footer'); ?>  
         
         <script type="text/javascript">
          $(document).ready(function() {
    $('select').material_select();
  });
  
  /*
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  */
  </script>
        </div>
        </div>
    <font color="green">
        <?php if($this->session->tempdata('status')){?>
        <script>
        var $toastContent = $('<span><?= $this->session->tempdata('status')?></span>');
        Materialize.toast($toastContent, 5000);
        </script>     
        <?php } ?>
   </font> 
    </body>
</html>