<?php ?>
<html>
<head>
    <title>Milestone List</title>
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
            <table>
                <thead>
                <th>Topic</th>
                <th>Status</th>
                <th>Date</th>
                </thead>
                <tbody>
                <?php

                foreach ($milestone as $m) {
                    ?>
                    <tr>
                        <td><?php echo $m->topic; ?></td>
                        <td>
                            <?php if ($m->date == null) echo "Incomplete"; else echo "Completed";?>
                        </td>
                        <td>
                            <?php if ($m->date == null) echo ""; else echo $m->date; ?>
                        </td>
                    </tr>
                    <?php
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