<?php ?>
<html>
    <head>
        <title>Batch Tracker</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->load->view('dashboard/css'); ?>
    </head>
    <?php $this->load->view('dashboard/header'); ?>
    <section id="main-content">
        <div class="inner-content">
            <div class="container-fluid">

                <!-- Modal Trigger -->
                <a title="add batch" class=" modal-trigger btn-floating btn-small waves-effect waves-light red z-depth-5" href="#modal1"><i class="small material-icons">add</i></a>
                <div id="modal1" class="modal modal-sm">
                    <div class="modal-content center-block">
                        <h5 class="center">Add New Tracker</h5>
                        <form action="<?php echo base_url(); ?>batch_tracker/addTopics" method="post">
                            <div class="input-field">
                                <select name="batch_no_id">
                                    <option value="" disabled selected="true">Choose a batch</option>
                                    <?php
                                    $query = $this->db->query("SELECT * FROM batch");
                                    $result = $query->result();
                                    foreach ($result as $r) {
                                        ?>
                                        <option value="<?php echo $r->id; ?>"><?php echo $r->batch_no; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <label>Batch No</label>
                            </div>
                            <div class="input-field">
                                <label>Teaching Days</label>
                                <input type="text" name="days" class="validate">
                            </div>
                            <div class="input-field">
                                <label>Lecture Timing</label>
                                <input type="text" name="timing" class="validate">
                            </div>
                            <div class="input-field">
                                <label>Start Date</label>
                                <input type="date" name="startdate" class="datepicker">
                            </div>
                            <div class="input-field">
                                <label>End Date</label>
                                <input type="date" name="enddate" class="datepicker">
                            </div>
                            <div class="input-field">
                                <label>Trainer Name</label>
                                <input type="text" name="trainer_name" class="validate">
                            </div>
                            <div class="input-field">
                                <select name="subject">
                                    <option value="" disabled selected="true">Subject</option>
                                    <?php
                                    $query = $this->db->query("SELECT * FROM course_units");
                                    $result = $query->result();
                                    foreach ($result as $r) {
                                        ?>
                                        <option value="<?php echo $r->id; ?>"><?php echo $r->name; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <label>Subject</label>
                            </div>
                             <div class="input-field">
                                <label>Number of Topics</label>
                                <input type="number" name="topics" class="validate">
                            </div>
                            <input type="submit" value="Proceed" class="btn waves-effect">
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
                        </form>
                    </div>
                </div>

                <div class="ibox-title">
                    <h4>Batch Tracker List</h4>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-striped table-hover dataTables-example">
                    <thead class="btn-primary">
                        <tr>
                            <th>#sr</th>
                            <th>Batch No.</th>
                            <th>Days</th>
                            <th>Duration</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Trainer</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;

                        foreach ($trackers as $t) {
                            ?>
                            <tr>

                                <td><?php echo $i; ?></td>
                                <td>
                                    <?php
                                    $b = $this->db->select('batch_no')->from('batch')->where('id', $t->batch_no_id)->get()->result();
                                    foreach ($b as $bn)
                                        echo $bn->batch_no;
                                    ?>
                                </td>
                                <td><?php echo $t->days; ?></td>
                                <td><?php echo $t->timing; ?></td>
                                <td><?php echo $t->startdate; ?></td>
                                <td><?php echo $t->enddate; ?></td>
                                <td><?php echo $t->trainer_name; ?></td>

                                <td class="text-center">
                                    <a href="<?php echo base_url(); ?>attendance/index?btid=<?php echo $t->id; ?>&bid=<?php echo $t->batch_no_id; ?>"><button  class="btn tooltipped btn-floating btn-small waves-effect waves-light red" data-position="left" data-delay="50" data-tooltip="Track Batch Attendance"><i class="small material-icons">view_week</i></button></a>
                                    <a href="<?php echo base_url(); ?>attendance/showAttendance?btid=<?php echo $t->id; ?>&bid=<?php echo $t->batch_no_id; ?>"><button  class="btn btn-floating btn-small tooltipped waves-effect waves-light green" data-position="top" data-delay="50" data-tooltip="Attendance History"><i class="small material-icons">insert_chart</i></button></a>
                                    <a href="<?php echo base_url(); ?>milestone/index?btid=<?php echo $t->id; ?>&bid=<?php echo $t->batch_no_id; ?>"><button  class=" btn btn-floating btn-small waves-effect waves-light orange tooltipped" data-position="bottom" data-delay="50" data-tooltip="Milestone"><i class="small material-icons">view_carousel</i></button></a>
                                    <a href="<?php echo base_url(); ?>milestone/showMilestone?btid=<?php echo $t->id; ?>&bid=<?php echo $t->batch_no_id; ?>"><button  class="btn tooltipped btn-floating btn-small waves-effect waves-light orange" data-position="top" data-delay="50" data-tooltip="Milestone History"><i class="small material-icons">equalizer</i></button></a>
                                </td>
                            </tr>
                            <?php
                            $i++;
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

    function addTracker() {
        $('#modal1').openModal();
    }
</script>
</body>
</html>

