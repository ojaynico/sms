<?php ?>
<html>
<head>
    <title>The teaching staff</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content">
    <div class="inner-content">
<div class="container-fluid">
    <button title="add a teacher" class="btn-floating btn-small waves-effect waves-light green">
        <a href="<?php echo base_url(); ?>teacher"><i class="small material-icons">add</i></a></button>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h4>Teachers</h4>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTables-example">
                            <thead class="btn-primary">
                            <tr>

                                <td>Sr#</td>
                                <td>Photo</td>
                                <td>Teacher name</td>
                                <td>Telephone</td>
                                <td>Department</td>
                                <td>ACTION</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            foreach ($records as $r) {
                                ?>
                                <tr class="gradeC">
                                    <td><?php echo $i; ?></td>
                                    <td><img
                                            src="<?php echo base_url(); ?>staff/teaching_staff/<?php echo $r->photo ?>"
                                            class="img-circle" width="50" height="50"/></td>
                                    <td><?php echo $r->name; ?></td>
                                    <td><?php echo $r->phone; ?></td>
                                    <td><?php echo $r->department; ?></td>
                                    <td class="text-center"><a href='detail?editid1=<?php echo $r->id; ?>'>
                                            <button title="click to view this record"
                                                    class="btn-floating btn-small waves-effect waves-light green"><i
                                                    class="small material-icons">visibility</i></button>
                                        </a>
                                        <a href='update?editid=<?php echo $r->id; ?>'>
                                            <button title="click to edit this record"
                                                    class="btn-floating btn-small waves-effect waves-light orange"><i
                                                    class="small material-icons">mode_edit</i></button>
                                        </a>
                                        <a href="#modal<?php echo $i; ?>" onclick="deleteEnquiry('<?php echo $i; ?>')">
                                            <button title="click to delete this record"
                                                    class="btn-floating btn-small waves-effect waves-light red"><i
                                                    class="small material-icons">delete</i></button>
                                        </a>
                                        <div id="modal<?php echo $i; ?>" class="modal modal-sm" style="height: 21%">
                                            <div class="modal-content center-block">
                                                        <h6>Are you sure you want to delete <b><?php echo $r->name; ?></b></h6><br/>
                                                        <a href='delete?deleteid=<?php echo $r->id; ?>'>
                                                            <button title="click to delete this record"
                                                                    class="modal-action waves-effect waves-green btn-flat">
                                                                <button class="btn red">Ok</button>
                                                        </a>
                                                        <a href="#!"
                                                           class="modal-action modal-close waves-effect waves-green btn-flat">
                                                            <button class="btn btn-success">Cancel</button>
                                                        </a>
                                            </div>
                                        </div>
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
    </section>
<?php $this->load->view('dashboard/footer'); ?>
<script src="<?php echo base_url(); ?>plugins/js/datatables.min.js"></script>
<script>
    function deleteEnquiry(i) {
        $('#modal' + i).openModal();
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

<script type="text/javascript" src="http://localhost/simpleCRUD/js/materialize.min.js"></script>
</body>
</html>