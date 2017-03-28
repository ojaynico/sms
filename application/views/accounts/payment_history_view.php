<html>
    <head>
         <LINK REL="SHORTCUT ICON" HREF="http://localhost/staff/title_icon/saipalilogo.jpg" />
    <title>payment history</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/simpleCRUD/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/simpleCRUD/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="http://localhost/simpleCRUD/assets/css/datatables.min.css" rel="stylesheet">
    <link href="http://localhost/simpleCRUD/assets/css/style.css" rel="stylesheet">  
    <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
           <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
</head>
    <body>
        <div class="container">
        <div class="row">
    <div class="col s12">
      
       
    
          <a class="btn btn-default btn-success btn-md waves-effect waves-light btn " href="payment_history">Unpaid invoices</a>
  
        <a class="btn btn-default btn-success btn-md waves-effect waves-light btn " href="history">Payment History</a>
    </div></div>
        
      <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Unpaid invoices</h5><br>
                            <hr>
                        </div>
                    
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover dataTables-example" >
            <thead class="btn-primary">
            <tr>
            
            <td>Sr#</td>
            <td>Student</td>
            <td>Title</td>
            <td>Total</td>
            <td>Paid</td>
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
               <td><?php //echo $r->student; ?></td>
               <td><?php echo $r->title; ?></td>
               <td><?php echo $r->amount; ?></td>
               <td><?php echo $r->amount_paid; ?></td>
               <td><?php echo $r->creation_timestamp; ?></td>
               
               <td>
               <a href = 'unpaid_detail?invoiceid=<?php echo $r->invoice_id; ?>'><button title="click to view this record" class="btn-floating btn-small waves-effect waves-light orange"><i class="small material-icons">view_module</i></button></a>
              
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
<script src="http://localhost/simpleCRUD/assets/js/jquery-2.1.1.js"></script>
<script src="http://localhost/simpleCRUD/assets/js/bootstrap.min.js"></script>
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