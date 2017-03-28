<?php ?>
<html>
<head>
    <title>Batches List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>

    <style type="text/css">
        span {
            text-transform: lowercase;
        }
    </style>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content">
    <div class="inner-content">
        <div class="container-fluid">
            <div class="row">
                <?php
                foreach ($batch as $b) {
                    echo '<h5>Batch : ' . $b->batch_no . '</h5>';
                }
                ?>
                <?php
                foreach ($batch_tracker as $bt) {
                    $r = $this->db->select('*')->from('course_units')->where('id', $bt->subject)->get()->result();
                    foreach ($r as $s) {
                        echo '<h5>Course Unit : ' . $s->name . '</h5>';
                    }
                }
                ?>
            </div>
            <div class="row">
                <h4 class="center"><?php if ($_GET['status'] == 0) echo "ABSENT STUDENTS"; else echo "PRESENT STUDENTS"; ?></h4>
            </div>
            <table>
                <thead>
                <th>Student Name</th>
                <th>Contact</th>
                <th>Mothers Contact</th>
                <th>Fathers Contact</th>
                <th>Next of Kin</th>
                </thead>
                <tbody>
                <?php
                foreach ($attendance as $at){
                    $querys = $this->db->select('*')->from('students')->where('id', $at->student_id)->get()->result();
                    foreach ($querys as $st){
                        ?>
                        <tr><td><?php echo $st->s_name;?></td><td><?php echo $st->phone;?></td><td><?php echo $st->m_contact;?></td><td><?php echo $st->f_contact;?></td><td><?php echo $st->next_kin_contact;?></td></tr>
                <?php
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
<script>
    $(".check").change(function () {
        if (this.checked) {
        }
    });
</script>
</body>
</html>