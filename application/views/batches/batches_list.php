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
        <title>Batches List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->load->view('dashboard/css'); ?>
    </head>
    <?php $this->load->view('dashboard/header'); ?>
    <section id="main-content">
        <div class="inner-content">
            <div class="container-fluid">

                <!-- Modal Trigger -->
                <a title="add batch" class=" modal-trigger btn-floating btn-small waves-effect waves-light red z-depth-5" href="<?php echo base_url(); ?>batches_c/addBatch"><i class="small material-icons">add</i></a>

                <div class="ibox-title">
                    <h4>Batches List</h4>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-hover dataTables-example">
                    <thead class="btn-primary">
                        <tr>
                            <th>#sr</th>
                            <th>Batch No.</th>
                            <th>Intake</th>
                            <th>Course</th>
                            <th>No. of Students </th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = $this->db->query('SELECT * FROM batch')->result();

                        foreach ($query as $q) {
                            ?>
                            <tr>

                                <td><?php echo $i; ?></td>
                                <td><?php echo $q->batch_no; ?></td>
                                <td><?php echo $q->intake; ?></td>
                                <td><?php
                                    $r = $this->db->select('name')->from('courses')->where('id', $q->course_id)->get()->result();
                                    foreach ($r as $cn)
                                        echo $cn->name;
                                    ?>
                                </td>

                                <td><?php
                                    $count = $this->db->query('SELECT * FROM batch_students WHERE batch_id = ' . $q->id);
                                    echo $count->num_rows();
                                    ?></td>

                                <td class="text-center">
                                    <a href="batches_c/get_batchstudents?id=<?php echo $q->id; ?>"><button title="view students in this batch" class="btn-floating btn-small waves-effect waves-light green"><i class="small material-icons">visibility</i></button></a>
                                    <a href="batches_c/update_batch?editid=<?php echo $q->id;    ?>"><button title="edit this batch" class="btn-floating btn-small waves-effect waves-light orange"><i class="small material-icons">mode_edit</i></button></a>
                                    <a  href="#modaldeleteBatch?id"><button title="delete batch" class="btn-floating btn-small waves-effect waves-light red"><i class="small material-icons">delete</i></button></a>
                                    <div id="modal<?php //echo $i;   ?>" class="modal modal-sm"  style="height: 21%">
                                        <div class="modal-content center-block">
                                            <h6>Are you sure you want to delete <b><?php //echo $b->book_title;    ?></b></h6><br/>
                                            <a href="book_c/deleteBook?id=<?php //echo $b->ID;   ?>" class="modal-action waves-effect waves-green btn-flat"><button class="btn red">Ok</button></a>
                                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><button class="btn green">Cancel</button></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
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
                                                {extend: 'print',
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
                                    function deleteBook(i) {
                                        $('#modal' + i).openModal();
                                    }
</script>
</body>
</html>
