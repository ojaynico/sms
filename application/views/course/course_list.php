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
    <title>Courses</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content">
    <div class="inner-content">
<div class="container-fluid">
    <button title="add a student" class="btn-floating btn-small waves-effect waves-light green">
        <a href = "<?php echo base_url(); ?>course_c/"><i class="small material-icons">add</i></a></button><br>
    <div class="row">
        <div class="col l12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Courses Offered</h5>
        </div>
    </div>
    <div class="ibox-content">
        <table class="table table-striped table-responsive table-bordered dataTables-example">
            <thead class="btn-primary">
            <tr>
                <td></td>
                <td>Course Name</td>
                <td>Program</td>
                <td>Functional Fee</td>
                <td>Installment Fee</td>
                <td>Duration</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach ($course as $c) {?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $c->name; ?></td>
                    <td><?php echo $c->program; ?></td>
                    <td><?php echo $c->f_fee; ?></td>
                    <td><?php echo $c->installments; ?></td>
                    <td><?php echo $c->duration; ?></td>
                    <td class="text-center">
                        <a href="courseDetails?id=<?php echo $c->id; ?>"><button title="View Course" class="btn-floating btn-small waves-effect waves-light green"><i class="small material-icons">visibility</i></button></a>
                        <a href="editForm?id=<?php echo $c->id; ?>"><button title="Edit Course" class="btn-floating btn-small waves-effect waves-light orange"><i class="small material-icons">mode_edit</i></button></a>
                        <a  href="#modal<?php echo $i;?>" onclick="deleteCourse('<?php echo $i; ?>')"><button title="Delete Course" class="btn-floating btn-small waves-effect waves-light red"><i class="small material-icons">delete</i></button></a>
                        <div id="modal<?php echo $i;?>" class="modal modal-sm" style="height: 21%;">
                                    <div class="modal-content center-block">
                                        <h6>Are you sure you want to delete <b><?php echo $c->name; ?></b></h6><br/>
                                        <a href="deleteCourse?id=<?php echo $c->id;?>" class="waves-effect waves-green btn-flat"><button class="btn red">Ok</button></a>
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><button class="btn green">Cancel</button></a>
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
    function deleteCourse(i) {
        $('#modal'+i).openModal();
    }
</script>
</body>
</html>
