<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/17/16
 * Time: 10:43 AM
 */
?>
<html>
<head>
    <title>Certificate</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content">
    <div class="inner-content">
<div class="container-fluid">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h4>Certificate Registration</h4>
        </div>
    </div>
    <div class="ibox-content">
        <table class="table table-striped table-hover dataTables-example">
            <thead class="blue white-text">
            <tr>
                <th></th>
                <th>Student Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Email</th>
                <th>Date</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach ($students as $s) {?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $s->st_name; ?></td>
                    <td><?php echo $s->st_mobile; ?></td>
                    <td><?php echo $s->st_address; ?></td>
                    <td><?php echo $s->st_email; ?></td>
                    <td><?php echo $s->date; ?></td>
                    <td class="center">
                        <a href="newForm?id=<?php echo $s->id; ?>"><button class="btn red">REGISTER</button></a>
                    </td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </div>
</div>
    </div>
</section>
<?php $this->load->view('dashboard/footer'); ?>
<script src="<?php echo base_url();?>plugins/js/datatables.min.js"></script>
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
