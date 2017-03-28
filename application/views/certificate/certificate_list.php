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
    <title>Certificate Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content">
        <div class="container-fluid">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h4>Certificate Students</h4>
                </div>
            </div>
            <div class="ibox-content">
                <table class="responsive-table striped bordered dataTables-example">
                    <thead class="white-text blue">
                    <tr>
                        <th></th>
                        <th>Student Name</th>
                        <th>Contact</th>
                        <th>Sex</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($students as $s) { ?>
                        <tr>
                            <td><img class="img-circle" width="50" height="50"
                                     src="<?php echo base_url(); ?>students/<?php echo $s->photo; ?>"></td>
                            <td><?php echo $s->s_name; ?></td>
                            <td><?php echo $s->phone; ?></td>
                            <td><?php echo $s->sex; ?></td>
                            <td><?php echo $s->email; ?></td>
                            <td><?php
                                $query = $this->db->query("SELECT name FROM courses WHERE id = $s->course");
                                $result = $query->result();
                                foreach ($result as $r)
                                    echo $r->name; ?>
                            </td>
                            <td><?php echo $s->date; ?></td>
                            <td class="center">
                                <a href="studentDetails?id=<?php echo $s->id; ?>">
                                    <button title="View Student"
                                            class="btn-floating btn-small waves-effect waves-light blue"><i
                                            class="small material-icons">visibility</i></button>
                                </a>
                                <a href="editForm?id=<?php echo $s->id; ?>">
                                    <button title="Edit Student"
                                            class="btn-floating btn-small waves-effect waves-light orange"><i
                                            class="small material-icons">mode_edit</i></button>
                                </a>
                                <a href="#modal<?php echo $i; ?>" onclick="deleteStudent('<?php echo $i; ?>')">
                                    <button title="Delete Student"
                                            class="btn-floating btn-small waves-effect waves-light red"><i
                                            class="small material-icons">delete</i></button>
                                </a>
                                <div id="modal<?php echo $i; ?>" class="modal modal-sm" style="height: 21%">
                                    <div class="modal-content center-block">
                                        <h6>Are you sure you want to delete <b><?php echo $s->s_name; ?></b></h6><br/>
                                        <a href="deleteCertificate?id=<?php echo $s->id; ?>"
                                           class="modal-action waves-effect waves-green btn-flat">
                                            <button class="btn red">Ok</button>
                                        </a>
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">
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
</section>
<?php $this->load->view('dashboard/footer'); ?>
<script src="<?php echo base_url(); ?>plugins/js/datatables.min.js"></script>
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
    function deleteStudent(i) {
        $('#modal' + i).openModal();
    }
</script>
</body>
</html>
