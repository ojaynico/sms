<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 11/21/16
 * Time: 12:06 PM
 */
?>
<html>
<head>
    <title>Users List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="content">
        <div class="container">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h4>Users List</h4>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-hover dataTables-example">
                    <thead class="blue">
                    <tr>
                        <th>Email ID</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($users as $s) { ?>
                        <tr>
                            <td><?php echo $s->email; ?></td>
                            <td><?php echo $s->password; ?></td>
                            <?php
                            $data = $this->Dashboard_m->getRoleName($s->role);
                            foreach ($data as $r)
                            ?>
                            <td><?php echo $r->name; ?></td>
                            <td><a href="<?php echo base_url(); ?>dashboard/updateStatus?id=<?php echo $s->id;  ?>&status=<?php echo $s->status; ?>">
                                    <?php if ($s->status == "active"){ ?>
                                    <button class="btn green"><?php echo $s->status; ?></button>
                                    <?php } else { ?>
                                    <button class="btn red"><?php echo $s->status; ?></button>
                                    <?php }?>
                                </a></td>
                            <td class="text-center">
                                <a href="editForm?id=<?php echo $s->id; ?>">
                                    <button title="Edit User"
                                            class="btn-floating btn-small waves-effect waves-light orange"><i
                                            class="small material-icons">mode_edit</i></button>
                                </a>
                                <a href="#modal<?php echo $i; ?>" onclick="deleteStudent('<?php echo $i; ?>')">
                                    <button title="Delete User"
                                            class="btn-floating btn-small waves-effect waves-light red"><i
                                            class="small material-icons">delete</i></button>
                                </a>
                                <div id="modal<?php echo $i; ?>" class="modal modal-sm" style="height: 21%">
                                    <div class="modal-content center-block">
                                        <center>
                                        <h6>Are you sure you want to delete <b><?php echo $r->name; ?></b></h6><br/>
                                        <a href="<?php echo base_url(); ?>dashboard/userDelete?id=<?php echo $s->id; ?>"
                                           class="modal-action waves-effect waves-green btn-flat">
                                            <button class="btn red">Ok</button>
                                        </a>
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">
                                            <button class="btn green">Cancel</button>
                                        </a>
                                        </center>
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