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
            <form action="<?php echo base_url(); ?>batches_c/editStudents" method="post">
                <div class="input-field">
                    <label>Batch No.</label><input type="text" name="batch_no" value="<?php if($records){echo $records[0]->batch_no;}?>">
                </div>
                <div class="input-field">

                    <select name="course" class="active">
                        <option value="<?php if($records){echo $records[0]->course_id;}?>" ><?php if($records){echo $records[0]->course_id;}?></option>
                        <?php
                        $query = $this->db->query("SELECT * FROM courses");
                        $result = $query->result();
                        foreach ($result as $r) {
                            ?>
                        
                            <option value="<?php echo $r->id; ?>"><?php echo $r->name; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label>Course</label>
                </div>

                <div class="input-field">

                    <select name="intake" class="active">
                        <option value="<?php if($records){echo $records[0]->intake;}?>"><?php if($records){echo $records[0]->intake;}?></option>
                        <?php
                        $query = $this->db->query("SELECT DISTINCT intake FROM students");
                        $result = $query->result();
                        foreach ($result as $r) {
                            ?>
                            <option value="<?php echo $r->intake; ?>"><?php echo $r->intake; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label>intake</label>
                </div>
              
                <hr>
                <input type="submit" value="Proceed" class="btn waves-effect" name="update">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">cancel</a>
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
                            {extend: 'print',<?php ?>
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
            <form action="<?php echo base_url(); ?>batches_c/addStudents" method="post">
                <div class="input-field">
                    <label>Batch No.</label><input type="text" name="batch_no">
                </div>
                <div class="input-field">

                    <select name="course" class="active">
                        <option value="" disabled >Choose a course</option>
                        <?php
                        $query = $this->db->query("SELECT * FROM courses");
                        $result = $query->result();
                        foreach ($result as $r) {
                            ?>
                            <option value="<?php echo $r->id; ?>"><?php echo $r->name; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label>Course</label>
                </div>

                <div class="input-field">

                    <select name="intake" class="active">
                        <option value="" disabled >Choose a course</option>
                        <?php
                        $query = $this->db->query("SELECT DISTINCT intake FROM students");
                        $result = $query->result();
                        foreach ($result as $r) {
                            ?>
                            <option value="<?php echo $r->intake; ?>"><?php echo $r->intake; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label>intake</label>
                </div>
              
                <hr>
                <input type="submit" value="Proceed" class="btn waves-effect">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">cancel</a>
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
                function deleteBook(i) {
                    $('#modal' + i).openModal();
                }
</script>
</body>
</html>
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