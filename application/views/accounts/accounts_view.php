<?php ?>
<html>
    <head>
        <title>accounts view</title>
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="http://localhost/staff/title_icon/saipalilogo.jpg" />
        <?php $this->load->view('dashboard/css'); ?>
        <style>
            h5{
                color:red;
                text-align: center;
                font-weight: bold;
                font-size: 20px;
            }
        </style>
    </head>
    
    <?php $this->load->view('dashboard/header'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col s12">
                    <a href="<?php echo base_url();?>accounts_reg" class="btn green">update student's status</a>
                    <a href="<?php echo base_url();?>accounts_reg/registered_students" class="btn green">View Registered students</a>
                </div>    
            </div>
            <div class="card-panel hoverable"
            <div class="row">
                <!--<div class="card-panel hoverable">-->
                <div class="col l12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><strong>Students here have not cleared registration fees. update to pay</strong></h5>
                        </div>
                        <div class="ibox-content">
                            <table class="responsive-table striped bordered dataTables-example bordered highlight hoverable centered">
                                <thead class="btn-primary">
                                    <tr>
                                        <th>Sr#</th>
                                        <th>student Name.</th>
                                        <th>Student Mobile</th>
                                        <th>Status</th>
                                        <th>ACTION</th>
                                   </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($records as $r) {
                                    ?>
                                    <tr class="gradeC">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $r->st_name; ?></td>
                                        <td><?php echo $r->st_mobile; ?></td>
                                        <td><?php echo 'unpaid'; ?></td>
                                        <td>
                                          
                                             <a href = 'update_detail?editid=<?php echo $r->id; ?>'><button title="click to add payment" class="btn-floating btn-small waves-effect waves-light orange"><i class="small material-icons">mode_edit</i></button></a>
                                        </td>
                                    </tr>
                                        <?php $i++;
                                        } ?>
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
        <script src="<?php echo base_url(); ?>plugins/js/datatables.min.js"></script>
        <script>
            function deleteEnquiry(i) {
            $('#modal' + i).openModal();
            }
        </script>
        <script>
            $(document).ready(function () {
                $('.dataTables-example').DataTable({
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},
                    {
                    extend: 'print',
                    customize: function (win) {
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
        <?php if ($this->session->tempdata('pay')) { ?>
        <script>
        var $toastContent = $('<span><?= $this->session->tempdata('pay')?></span>');
        Materialize.toast($toastContent, 5000);
        </script>
        <?php } ?>
    </body>
</html>