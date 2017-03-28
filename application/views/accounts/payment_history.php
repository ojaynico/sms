<!DOCTYPE html>
<html>
<head>
    <LINK REL="SHORTCUT ICON" HREF="http://localhost/staff/title_icon/saipalilogo.jpg" />
    <title>payment history</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="http://localhost/staff/title_icon/saipalilogo.jpg" />
        <?php $this->load->view('dashboard/css'); ?>
    </head>
    
    <?php $this->load->view('dashboard/header'); ?>
        <div class="container">
           
    <div class="col s12">
      
       
    <a class="btn btn-default btn-success btn-md waves-effect waves-light btn " href="payment_history">Unpaid invoices</a>
  
        <a class="btn btn-default btn-success btn-md waves-effect waves-light btn " href="history">Payment History</a>
    </div>
                 
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Payment History</h5><br>
                            <hr>
                        </div>
                    
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover dataTables-example" >
            <thead class="btn-primary">
            <tr>
            
            <td>Sr#</td>
            <td>Title</td>
            <td>Description</td>
            <td>Method</td>
            <td>Amount</td>
            <td>Date</td>
            <td>Action</td>
            </tr>
           </thead>			
            <tbody>
                <?php
                $i = 1;
            foreach($records as $r) { 
                ?>
                <tr class="gradeC">
               <td><?php echo $i;?></td> 
               <td><?php echo $r->title; ?></td>
               <td><?php echo $r->description; ?></td>
               <td><?php echo $r->method; ?></td>
               <td><?php echo $r->amount; ?></td>
               <td><?php echo $r->timestamp; ?></td>
               
               <td>
               <a href = 'detail?editid1=<?php echo $r->payment_id; ?>'><button title="click to view this record" class="btn-floating btn-small waves-effect waves-light orange"><i class="small material-icons">view_module</i></button></a>
              
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
<?php $this->load->view('dashboard/footer'); ?>  
    
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
    
<script src="http://localhost/simpleCRUD/assets/js/datatables.min.js"></script>


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

 <script type="text/javascript" src="http://localhost/simpleCRUD/js/materialize.min.js"></script>
 
 <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
      <li><a <a title="pay here" class="btn-floating red"  href = 'http://localhost/staff/accounts'><i class="material-icons">insert_chart</i></a></li>
      <li><a title="view payment history"class="btn-floating yellow darken-1" href = 'http://localhost/staff/accounts/payment_history' ><i class="material-icons">view_list</i></a></li>
      <li><a title="see and add expenses" class="btn-floating green" href = 'http://localhost/staff/accounts/expenses' ><i class="material-icons">receipt</i></a></li>
      <li><a title="see expense categories"class="btn-floating blue" href = 'http://localhost/staff/accounts/show_expense_category' ><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>
 
</body>
</html>