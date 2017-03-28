<html>
    <head>
        <title>unpaid invoices</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="<?php echo base_url();?>images/logo.JPG" />
        <?php $this->load->view('dashboard/css'); ?>
        
        <style>
            #p{
                color:red;
                text-align: center;
                font-weight: bold;
                font-size: 20px;
            }
        </style>
        
    </head>
    
    <?php $this->load->view('dashboard/header'); ?>
        <div class="container-fluid">
        <div class="row">
            
            <!--WORKING WITH TABS-->
            <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a  href="#test1">paid</a></li>
        <li class="tab col s3"><a  href="#test2">unpaid</a></li>
        <li class="tab col s3 "><a href="#test3">expenses</a></li>
        <li class="tab col s3"><a href="#test4">income</a></li>
        <li class="tab col s3"><a href="#test5">transactions</a></li>
      </ul>
    </div>
    <a id="test1" class="col s12" href="paid">students fully paid</a>
      <a id="test2" class="col s12" href="unpaid">students with unpaid fees</a>
      <a id="test3" class="col s12" href="expense_history">expenses history</a>
      <a id="test4" class="col s12" href="income_history">income history</a>
      <a id="test5" class="col s12" href="transaction_history">transaction history</a>
  </div>
            
    <div class="col s12">
      <a class="btn waves-effect waves-light teal darken-4 " href="paid">students fully paid</a>
      <a class="btn waves-effect waves-light teal darken-4 " href="unpaid">students with unpaid fees</a>
      <a class="btn waves-effect waves-light teal darken-4 " href="expense_history">expenses history</a>
      <a class="btn waves-effect waves-light teal darken-4 " href="income_history">income history</a>
      <a class="btn waves-effect waves-light teal darken-4" href="transaction_history">transaction history</a>
    </div>
            <p id="p">These students have tution balance fee unpaid.</p>
        </div>
        
      <div class="row">
          <div class="card-panel hoverable">  
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                           
                        </div>
                    
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover dataTables-example bordered highlight hoverable centered" >
            <thead class="btn-primary">
            <tr>
            <th>Sr#</th>
            <th>Student</th>
            <th>Title</th>
            <!--<td>Total</td>-->
            <!--<td>Paid</td>-->
            <th>Balance</th>
            <th>Date</th>
            <th>level</th>
            <th>Action</th>
            </tr>
           </thead>
          
            <tbody>
                <?php
                $i = 1;
           foreach($records as $r) { 
                ?>
                <tr class="gradeC">
               <td><?php echo $i;?></td> 
               <td><?php echo $r->student_id; ?></td>
               <td><?php echo $r->title; ?></td>
               <!--<td><?php // echo $r->amount; ?></td>-->
               <!--<td><?php //echo $r->amount_paid; ?></td>-->
               <td><?php echo $r->due; ?>
               <td><?php echo $r->creation_timestamp; ?></td>
               <td><span class="pie"><?php echo $r->amount_paid; ?>,<?php echo $r->amount; ?></span></td>
               <td>
               <a href = 'unpaid_receipt?invoiceid=<?php echo $r->invoice_id; ?>'><button title="click to view this record" class="btn-floating btn-small waves-effect waves-light orange"><i class="small material-icons">view_module</i></button></a>
               <a href="unpaid_update?invoiceid=<?php echo $r->invoice_id; ?>" class="btn-floating btn-small light-green accent-3" title="update student payment status"><i class="small material-icons">edit_mode</i></a>
               </td> 
              
               </tr>
            <?php $i++; } ?>
            </tbody>
        
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
<?php $this->load->view('dashboard/footer'); ?>  
    
<script src="http://localhost/simpleCRUD/assets/js/datatables.min.js"></script>

<script>
    $(document).ready(function(){
        $("span.pie").peity("pie")
    });
</script> 
<script>
function deleteEnquiry(i) {
        $('#modal'+i).openModal();
    }
</script>

<?php
      if (isset($message)) {
          foreach ($message as $m) {
              ?>
<script>
            <a href="../../../../../Users/Public/Desktop/MobiiBroadband 3G.lnk"></a>
Materialize.toast('<?php echo $m; ?>', 4000);
</script>
<?php
          }
}
?>

<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                    }
                }
            ]

        });


    });
    
    
    
</script>
<script src="http://localhost/sms/plugins/js/chart.js"></script>
 <script type="text/javascript" src="http://localhost/simpleCRUD/js/materialize.min.js"></script>
 
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
 
</body>
</html>