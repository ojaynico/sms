<?php ?>

<html>
<head>
    <title>expense categories</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <LINK REL="SHORTCUT ICON" HREF="http://localhost/staff/title_icon/saipalilogo.jpg" />
    <?php $this->load->view('dashboard/css'); ?>
</head>
    <?php $this->load->view('dashboard/header'); ?>
    <div class="container-fluid">
        <!-- Modal Trigger -->
        <a title="add an expense category" class="btn-floating btn-small waves-effect waves-light green modal-trigger z-depth-5" href="#modall"><i class="small material-icons">add</i></a>
          <!-- Modal Structure -->
        <div id="modall" class="modal">
            <div class="modal-content">
                <?php //$this->load->view("accounts/expenses"); ?>
                <h5>Add an expense category</h5>
                <hr>
                <form method="POST" action="<?php echo base_url();?>index.php/accounts/create_expense_category" >
                    Expense Category:  <input type='text' name="name" required="true">
                    <input type='submit' value="add expense category" class="btn  green">
                    <input type="reset" class="btn orange">
                </form>
                    
            </div>
            <div class="modal-footer">
                &copycopyright@sitm.com
            </div>
        </div>
        
        <div class="row">
            <div class="card-panel hoverable z-depth-5">  
             <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Expense Categories</h5>
                      
                    </div>
                    
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dataTables-example bordered highlight hoverable  centered" >
                                <thead class="btn-primary">
                                    <tr>
                                        <td>Sr#</td>
                                        <td>Expense Category</td>
                                        <td>Options</td>
                                    </tr>
                                </thead>			
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $records = $this->db->get('expense_category')->result();
                                    foreach($records as $r) { 
                                    ?>
                                    <tr class="gradeC">
                                        <td><?php echo $i;?></td> 
              
                                        <td><?php echo $r->name; ?></td>
                                        <td>
                                            <a href = 'update?editid=<?php echo $r->expense_category_id; ?>'><button title="click to edit this record" class="btn-floating btn-small waves-effect waves-light orange z-depth-5"><i class="small material-icons">mode_edit</i></button></a>
                                                  
                                            <a href="#modal<?php echo $i;?>" onclick="deleteEnquiry('<?php echo $i; ?>')"><button title="click to delete this record" class="btn-floating btn-small waves-effect waves-light red z-depth-5"><i class="small material-icons">delete</i></button></a>
                                            <div id="modal<?php echo $i;?>" class="modal">
                                                <div class="modal-content center-block" style="width: 50%">
                                                    <div class="row">
                                                        <div class="col-lg-4"></div>
                                                            <div class="col-lg-4">
                                                                <h6>Are you sure you want to delete <?php echo $r->name; ?></h6>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href = 'delete?deleteid=<?php echo $r->expense_category_id; ?>'><button title="click to delete this record" class="btn-floating btn-small waves-effect waves-light red z-depth-5"><i class="small material-icons">delete</i></button></a>
                                                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><button class="btn btn-success">Cancel</button></a>
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-4"></div>
                                                </div>
                                            </div>
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
    


    <script>
        function deleteEnquiry(i) {
        $('#modal'+i).openModal();
        }
    </script>

    <?php if($this->session->tempdata('msg')){?>
    <script>
    var $toastContent = $('<span><?= $this->session->tempdata('msg')?></span>');
    Materialize.toast($toastContent, 5000);
    </script>     
    <?php } ?>
 
    <?php if($this->session->tempdata('dlt')){?>
    <script>
    var $toastContent = $('<span><?= $this->session->tempdata('dlt')?></span>');
    Materialize.toast($toastContent, 5000);
    </script>     
    <?php } ?>
    
    <?php if($this->session->tempdata('upd')){?>
    <script>
    var $toastContent = $('<span><?= $this->session->tempdata('upd')?></span>');
    Materialize.toast($toastContent, 5000);
    </script>     
    <?php } ?>

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