<?php ?>
<html>
<head>
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
            
            <a href="<?php echo base_url();?>accounts_reg" class="waves-effect waves-light btn">update student's status<a>
            <a href="<?php echo base_url();?>accounts_reg/registered_students"class="waves-effect waves-light btn">View Registered students<a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>These students have  cleared registration fees.</h5>
                        </div>
                    
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover dataTables-example" >
            <thead class="btn-primary">
            <tr>
            
            <td>Sr#</td>
            <td>student Name.</td>
            <td>Student Mobile</td>
            <td>Status</td>
           
            <td>ACTION</td>
            </tr>
           </thead>			
            <tbody>
                <?php
                $i = 1;
                $record = $this->db->get('accounts_registration')->result();
                
                foreach($record as $r){
                ?>
                <tr class="gradeC">
               <td><?php echo $i;?></td> 
               <td><?php echo $r->name; ?></td>
               <td><?php echo $r->phone; ?></td> 
               <td><?php echo 'paid'; ?></td>
               <td>
               <a href = 'print_receipt?receiptid=<?php echo $r->id; ?>'><button title="click to edit this record" class="btn-floating btn-small waves-effect waves-light orange"><i class="small material-icons">mode_edit</i></button></a> 
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
</body>
</html>