<?php ?>
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

                <form action="<?php echo base_url(); ?>batches_c/updateStudents" method="post">
                    <div class="input-field">
                        <label>Batch No</label>
                        <input type="text" name="batch_no" value="<?php foreach ($batch_no as $b)
        echo $b;
                        ?>" readonly="true"/> <input type="hidden" name="id" value="<??>">
                        
                    </div>
                    <div class="input-field">
                        <label>Course</label>
                        <input type="text" name="course" value="
                        <?php
                        foreach ($course as $c) {
                            $r = $this->db->select('name')->from('courses')->where('id', $c)->get()->result();
                            foreach ($r as $cn)
                                echo $cn->name;
                        }
                        ?>" readonly="true"/>
                    </div>
                    <div class="input-field">
                        <label>Intake</label>
                        <input type="text" name="intake" value="<?php foreach ($intake as $i)
                            echo $i;
                        ?>" readonly="true"/>
                    </div>

                    <?php
                    foreach ($students as $s) {
                        ?>

                        <div class="input-field">
                            <p>
                                <input type="checkbox" id="<?php echo 's' . $s->id; ?>" name="student[]" value="<?php echo $s->id; ?>"/>
                                <label for="<?php echo 's' . $s->id; ?>"><?php echo $s->s_name; ?></label>
                            </p>
                        </div>
<?php }
?>
                    <input type="hidden" name="upid" value="">
                    <br/>
                    <input type="submit" value="update"/>
                </form>
            </div>
        </div>
    </section>
    <br/><br/>
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