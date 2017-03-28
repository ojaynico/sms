<?php ?>
<html>
    <head>
        <title>student receipt</title>
        <meta charset="utf-8">
        <?php $this->load->view('dashboard/css'); ?>
    </head>
    <?php $this->load->view('dashboard/header'); ?>
    <div id="main-content">
        <div class="card-panel hoverable ">
		<span class="blue-text text-darken-2 "><center><strong>Click print receipt button to print registration payment receipt.</strong>
                        <input type="button" onclick="printDiv('printableArea')" value="print student receipt!" class="btn orange"/></center>
                </span>
            </div>
        <div class="container">
            
            <div class="card-panel hoverable z-depth-5" id="printableArea">
                <center>
                    <img src="<?php echo base_url();?>images/logogo.JPG">
                    <p>Kibuga, Block 4, Plot 887, Namirembe, Kampala, Uganda(E. Africa)Ph.No. +256 - 414257526/31</p>
                </center>
                <div class="row">
                    <div class="input-field col 14 m4 s4"></div>
                    <div class="input-field col 14 m4 s4"></div>
                    <div class="input-field col 14 m4 s4">
                        <p>Registration Date: &nbsp&nbsp&nbsp&nbsp;     <strong><?php if($records){echo $records[0]->date_of_payment;}?> </strong></p>
                        <p>Module:&nbsp&nbsp; <strong>Registration</strong></p>
                        <p>Duration:&nbsp; </p>
                    </div>
                </div>
                <center>RECEIPT NO:  <strong><?php if($records){echo $records[0]->id;} ?> </strong></center>
                <p>Received with thanks from: <strong><?php if($records){echo $records[0]->name;}?> </strong></p>
                <p>A sum of amount: <strong><?php if($records){echo $records[0]->amount;}?> <?php if($records){echo $records[0]->currency;}?> </strong></p> 
        
        <p>On account of:   <strong>REGISTRATION </strong></p>
        <p>By Cash/Cheque/D.D. No.  <strong><?php if($records){echo $records[0]->method;}?> </strong></p>
        <p>amount  <strong><?php if($records){echo $records[0]->amount;}?> </strong></p>
           For SITM
        </div>
       
        
           <input type="hidden" name="upid" value=" <?php if($records){echo $records[0]->id;}?>"/>
       
           
           
        </form>
       
        </div>
        </div>
    </div>
    </div>
    <br/><br/>
    
    <input type="button" onclick="printDiv('printableArea')" value="print a div!" />

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
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
    
    <?php $this->load->view('dashboard/footer'); ?>
      <script type="text/javascript">
          $(document).ready(function() {
    $('select').material_select();
  });
  
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  </script>
          

    </body>
</html>
