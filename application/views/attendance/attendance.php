<?php ?>
<html>
    <head>
        <title>Student List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->load->view('dashboard/css'); ?>
    </head>
    <?php $this->load->view('dashboard/header'); ?>
    <section id="main-content">
        <div class="inner-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col l4"></div>
                    <div class="col l4">
                        <form action="<?php echo base_url(); ?>attendance/submit" method="post">
                            <?php
                            foreach ($batch as $b) {
                                echo '<h5>Batch : ' . $b->batch_no . '</h5>';
                                ?>
                            <input type="hidden" name="batchid" value="<?php echo $b->id; ?>">
                            <?php
                            }

                            foreach ($batch_tracker as $bt) {
                                $r = $this->db->select('*')->from('course_units')->where('id', $bt->subject)->get()->result();
                                foreach ($r as $s) {
                                    echo '<h5>Course Unit : ' . $s->name . '</h5>';
                                    ?>
                                    <input type="hidden" name="subject" value="<?php echo $s->id; ?>">
                                    <?php
                                }
                            }

                            echo '<br/>' . date('Y-m-d');
                            ?>

                            <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
                            <input type="hidden" name="nostudents" value="<?php echo count($batch_students); ?>">
                            <table>
                                <thead>
                                <th>Student Name</th>
                                <th>Status</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;

                                    foreach ($batch_students as $sid) {

                                        $student = $this->db->select('*')->from('students')->where('id', $sid->student_id)->get()->result();
                                        foreach ($student as $s) {
                                            ?>
                                            <tr>
                                                <td><?php echo $s->s_name; ?></td>
                                                <td>
                                                    <input type="hidden" name="studentid<?php echo $i; ?>" value="<?php echo $s->id; ?>">
                                                    <div class="switch">
                                                        <label>
                                                            Absent
                                                            <input type="hidden" name="status<?php echo $i; ?>" value="0">
                                                            <input type="checkbox" id="status" name="status<?php echo $i; ?>" value="1">
                                                            <span class="lever"></span>
                                                            Present
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="col l4"></div>
                </div>
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