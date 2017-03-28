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
                <div class="row">
                    <div class="col l4">
                        <?php 
                        foreach ($batch as $b) {
                            $cid = $b->course_id;
                            $course = $this->db->query("SELECT name FROM courses WHERE id = ".$cid)->result();
                        ?>
                        <h4>Batch No: <?php echo $b->batch_no; ?></h4>
                    </div>
                    <div class="col l6">
                        <h4>Course: <?php foreach ($course as $c) echo $c->name; {
                            
                        } ?></h4>
                    </div>
                        <?php }?>
                </div>
                
                 <table class="table table-striped table-hover dataTables-example">
                    <thead class="btn-primary">
                        <tr>
                            <th>#sr</th>
                            <th>Student Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $batchid = $b->id;
                        $queryid = $this->db->query("SELECT student_id FROM batch_students WHERE batch_id = ".$batchid)->result();
                        foreach ($queryid as $sid) {
                            $studentid = $sid->student_id;
                            $querystudent = $this->db->query("SELECT * FROM students WHERE id = ".$studentid)->result();
                             
                            foreach ($querystudent as $s) {
                                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $s->s_name; ?></td>
                        </tr>
                        <?php
                        $i++;
                            }
                        }
                        ?>
                        
                    </tbody>
                </table>
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