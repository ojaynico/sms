<?php ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content">
    <div class="inner-content">
    <div class="container-fluid">

            <a href="<?php echo base_url(); ?>enquiry_c/" title="add a student" class="btn waves-effect orange">add new</a>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h4>Enquirees</h4>
                    </div>

                    <div class="ibox-content">
                        <table class="table table-striped table-hover dataTables-example">
                            <thead class="btn-primary white-text">
                            <tr>
                                <td>Sr#</td>
                                <td>Student Name.</td>
                                <td>Student Mobile</td>
                                <td>Student Email</td>
                                <td>Program</td>
                                <td>Date</td>
                                <td>Action</td>
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
                                    <td><?php echo $r->st_email; ?></td>
                                    <td><?php echo $r->course; ?></td>
                                    <td><?php echo $r->date; ?></td>
                                    <td class="center"><a href='detail?editid1=<?php echo $r->id; ?>'>
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
                                                <h6>Are you sure you want to delete <b><?php echo $r->st_name; ?></b>
                                                </h6><br/>
                                                <a href='delete?deleteid=<?php echo $r->id; ?>'>
                                                    <button title="click to delete this record" class="btn red">Ok
                                                    </button>
                                                </a>
                                                <a href="#!"
                                                   class="modal-action modal-close waves-effect waves-green btn-flat">
                                                    <button class="btn green">Cancel</button>
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
</body>
</html>