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
        <a class="btn-floating btn-small waves-effect waves-light green modal-trigger" href="#modala"><i class="small material-icons">add</i></a>
        <!-- Modal Structure -->
        <div id="modala" class="modal">
            <div class="modal-content">
                <?php //$this->load->view("accounts/expenses"); ?>
                <h5>Add an expense</h5>
                <hr>
                <form method="POST" action="<?php echo base_url();?>index.php/accounts/expense">
                    Title
                    <input type='text' name="title" required="true">
                    Category
                    <select name="category">
                        <option value="">select</option>
                            <?php $categories = $this->db->get('expense_category')->result_array();
                                foreach($categories as $row):
			    ?>
                        <option value="<?php echo $row['name'];?>" name="category"> <?php echo $row['name'];?> </option>
                            <?php endforeach; ?>
                    </select>
                    Method
                    <input type="text" name="method" required="true">
                    Amount
                    <input type="text" name="amount" required="true">
                    Description
                    <input type="text" name="description">
                    
                    <input type="text" name="date" value="<?php echo date("Y-m-d"); ?>">
                    <input type="submit" value="add expense" class="btn  green">
                    <input type="reset" class="btn orange">
                   <!-- <a href="create_expense_category" class="btn waves-effect waves-light">New Expense Category</a> -->
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
                        <h5>Expenses</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dataTables-example bordered highlight hoverable  centered" >
                                <thead class="btn-primary">
                                <tr>
                                    <td>Sr#</td>
                                    <td>Title</td>
                                    <!--<td>Category</td>-->
                                    <!--<td>Method</td>-->
                                    <td>Amount</td>
                                    <td>Date</td>
                                    <td>Options</td>
                                </tr>
                                </thead>			
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $recordup = $this->db->query("SELECT * FROM payment WHERE payment_type = 'expense'")->result();
                                        foreach($recordup as $r) { 
                                    ?>
                                    <tr class="gradeC">
                                    <td><?php echo $i;?></td> 
                                    <td><?php echo $r->title; ?></td>
                                    <td><?php echo $r->amount; ?></td>
                                    <td><?php echo $r->timestamp; ?></td>
                                    <td>
                                    <a href = 'expense_update?editid=<?php echo $r->payment_id; ?>'><button title="click to edit this record" class="btn-floating btn-small waves-effect waves-light orange"><i class="small material-icons">mode_edit</i></button></a>
                                    <a href = 'expense_receipt?editid=<?php echo $r->payment_id; ?>'><button title="print expense receipt" class="btn-floating btn-small waves-effect waves-light green"><i class="small material-icons">receipt</i></button></a>
                                    <a href="#modal<?php echo $i;?>" onclick="deleteEnquiry('<?php echo $i; ?>')"><button title="click to delete this record" class="btn-floating btn-small waves-effect waves-light red"><i class="small material-icons">delete</i></button></a>
                                    <div id="modal<?php echo $i;?>" class="modal">
                                        <div class="modal-content center-block" style="width: 50%">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                    <div class="col-lg-4">
                                                        <h6>Are you sure you want to delete <?php echo $r->title; ?></h6>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href = 'expense_delete?deleteid=<?php echo $r->payment_id; ?>'><button title="click to delete this record" class="btn-floating btn-small waves-effect waves-light red"><i class="small material-icons">delete</i></button></a>
                                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat z-depth-5">Cancel</a>
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

    <?php if($this->session->tempdata('exp')){?>
 <script>
     var $toastContent = $('<span><?= $this->session->tempdata('exp')?></span>');
     Materialize.toast($toastContent, 5000);
 </script>     
 <?php } ?>
 
 <?php if($this->session->tempdata('dlt')){?>
 <script>
     var $toastContent = $('<span><?= $this->session->tempdata('dlt')?></span>');
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
    </body>
</html>