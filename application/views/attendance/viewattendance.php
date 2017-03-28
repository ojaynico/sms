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
                <table>
                    <thead>
                    <th>Date</th>
                    <th>Present</th>
                    <th>Absent</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($batch_tracker as $bt)
                            $query = $this->db->query("SELECT DISTINCT date FROM attendance WHERE batch_id = " . $bt->batch_no_id . " AND subject_id = " . $bt->subject)->result();

                        foreach ($query as $at) {
                            ?>
                        <tr>
                            <td><?php echo $at->date; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>attendance/studentList?btid=<?php echo $_GET['btid'] ?>&bid=<?php echo $_GET['bid'] ?>&date=<?php echo $at->date; ?>&subid=<?php echo $bt->subject; ?>&status=1">
                                <span class="btn  light-green accent-3" >
                                    <?php
                                    $present = $this->db->query("SELECT * FROM attendance WHERE date = '".$at->date."' AND status = 1")->result();
                                    echo count($present).' present';
                                    ?>
                                </span>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>attendance/studentList?btid=<?php echo $_GET['btid'] ?>&bid=<?php echo $_GET['bid'] ?>&date=<?php echo $at->date; ?>&subid=<?php echo $bt->subject; ?>&status=0">
                                <span class="btn red" >
                                    <?php
                                    $absent = $this->db->query("SELECT * FROM attendance WHERE date = '".$at->date."' AND status = 0")->result();
                                    echo count($absent).' absent';
                                    ?>
                                 </span>
                                </a>
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