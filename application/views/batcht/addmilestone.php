<?php ?>
<html>
    <head>
        <title>Add Milestone</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->load->view('dashboard/css'); ?>
    </head>
    <?php $this->load->view('dashboard/header'); ?>
    <section id="main-content">
        <div class="inner-content">
            <div class="container-fluid">
                <form action="<?php echo base_url(); ?>batch_tracker/storeBatch" method="post">
                    <input type="hidden" name="batch_no_id" value="<?php echo $batch_no_id; ?>">
                    <input type="hidden" name="days" value="<?php echo $days; ?>">
                    <input type="hidden" name="timing" value="<?php echo $timing; ?>">
                    <input type="hidden" name="startdate" value="<?php echo $startdate; ?>">
                    <input type="hidden" name="enddate" value="<?php echo $enddate; ?>">
                    <input type="hidden" name="trainer_name" value="<?php echo $trainer_name; ?>">
                    <input type="hidden" name="subject" value="<?php echo $subject; ?>">
                    <div class="row">
                        <?php
                        for ($index = 0; $index < $topics; $index++) {
                            ?>
                            <div class="col l4 card">
                                <p><?php $no = $index + 1; echo $no; ?></p>
                                <div class="input-field">
                                    <label>Topic Name</label>
                                    <input type="text" id="topic<?php echo $no; ?>" name="topic[]" class="validate">
                                </div>
                                <div class="input-field">
                                    <label>Topic Description</label>
                                    <input type="text" id="description<?php echo $no; ?>" name="description[]" class="validate">
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <button type="submit" class="btn green">Submit</button>
                </form>
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

