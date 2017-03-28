<?php ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<div id="main-content">
    <div class="container-fluid">
        <?php if ($this->session->flashdata('item')) { ?>
            <div class="success"><font color="green"><?= $this->session->flashdata('item') ?></font></div>
        <?php } ?>
        <?php if ($this->session->tempdata('item2')) { ?>
            <div><?= $this->session->tempdata('item2') ?></div>
        <?php } ?>
        <div class="row">
            <div class="col l12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>REGISTERED STUDENTS</h5>
                    </div>

                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover dataTables-example">
                                <thead class="blue white-text">
                                <tr>
                                    <td>Sr#</td>
                                    <td>Student Photo</td>
                                    <td>student Name</td>
                                    <td>Student Mobile</td>
                                    <td>Program</td>
                                    <td>ACTION</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                $record = $this->db->where("status", 0)->get('examinee')->result();
                                foreach ($record as $r) {
                                    $query = $this->db->query("SELECT * FROM students WHERE id=" . $r->id)->result();
                                    foreach ($query as $s)
                                        ?>

                                        <tr class="gradeC">
                                        <td><?php echo $i; ?></td>
                                    <td><img src="<?php echo base_url(); ?>students/<?php echo $s->photo; ?>" width="20"
                                             height="20"></td>
                                    <td><?php echo $s->s_name; ?></td>
                                    <td><?php echo $s->phone; ?></td>
                                    <td><?php echo $s->program; ?></td>
                                    <td>
                                        <!--modal trigger-->
                                        <a href='#modal1<?php echo $i; ?>' onclick="openDetails('<?php echo $i; ?>')"
                                           title="click to create exam ticket"
                                           class=" modal-trigger btn-floating btn-small waves-effect waves-light orange"><i
                                                    class="small material-icons">mode_edit</i></a>

                                        <!--modal structure-->
                                        <div id="modal1<?php echo $i; ?>" class="modal">
                                            <div class="modal-content">
                                                <h3 class="center-align">Test Confirmation</h3>
                                                <center>
                                                    <img class="image img-responsive img-rounded" width="250" height="250" src="<?php echo base_url(); ?>students/<?php echo $s->photo; ?>">
                                                    <br/>
                                                    <h5 class="center-align"><?php echo $s->s_name; ?></h5>
                                                    <br/>
                                                </center>
                                                <form action="<?php echo base_url(); ?>examinee/updateTest"
                                                      method="post">
                                                    <input type="hidden" name="id" value="<?php echo $s->id; ?>">
                                                    <div class="row">
                                                        <div class="col s12 m12 l12 center-align">
                                                            <input type="submit" name="submit" class="btn green"
                                                                   value="Test Completed">
                                                            <a href="#!"
                                                               class="btn red white-text modal-action modal-close waves-effect waves-green">Close</a>
                                                        </div>
                                                    </div>
                                                </form>
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
<?php $this->load->view('dashboard/footer'); ?>
<script src="<?php echo base_url(); ?>plugins/js/datatables.min.js"></script>
<script>
    function openDetails(i) {
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

<?php if ($this->session->tempdata('item2')) { ?>

    <script>
        var $toastContent = $('<span><?= $this->session->tempdata('item2')?></span>');
        Materialize.toast($toastContent, 5000);
    </script>
<?php } ?>
</body>
</html>