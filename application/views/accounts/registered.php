<?php ?>
<html>
<head>
    <meta charset="utf-8">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<div id="main-content">
        <div class="container-fluid">
            <a href="<?php echo base_url();?>accounts_reg" class="waves-effect waves-light btn green">update student's status<a>
            <a href="<?php echo base_url();?>accounts_reg/registered_students"class="waves-effect waves-light btn green">View Registered students<a>
            <div class="row">
                <div class="card-panel hoverable">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>These students have  cleared registration fees.</h5>
                        </div>
                    
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover dataTables-example bordered highlight hoverable  centered" >
            <thead class="blue white-text">
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
            
                $this->db->group_by("date_of_payment");
                $record = $this->db->get('accounts_registration')->result();
                
                foreach($record as $r){
                ?>
                
                <tr class="gradeC">
               <td><?php echo $i;?></td> 
               <td><?php echo $r->name; ?></td>
               <td><?php echo $r->phone; ?></td> 
               <td><?php echo 'paid'; ?></td>
              
               <td>
               <a href = 'print_receipt?receiptid=<?php echo $r->id; ?>'><button title="click to edit this record" class="btn-floating btn-small waves-effect waves-light orange z-depth-5"><i class="small material-icons">mode_edit</i></button></a> 
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

</body>
</html>