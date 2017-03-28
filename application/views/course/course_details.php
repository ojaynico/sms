<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/17/16
 * Time: 10:43 AM
 */
?>
<html>
    <head>
        <title>Courses</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->load->view('dashboard/css'); ?>
    </head>
    <?php $this->load->view('dashboard/header'); ?>
    <section id="main-content">
        <div class="inner-content">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($course as $c)
                        
                        ?>
                    <div class="col l8">
                        <h4><?php echo $c->name; ?></h4>
                        <h5><?php echo $c->program; ?></h5>
                        <h6><?php echo $c->duration; ?></h6>
                    </div>
                    <div class="col l4 right-align">
                        <a href="#modal1" onclick="addSubject()"><button class="btn btn-large green" title="ADD COURSE UNIT">ADD COURSE UNIT</button></a>
                    </div>
                </div>
            </div>

            <!--    This is for diploma courses-->
            <?php if ($c->program == "diploma") {
                $course_id = $c->id;
                ?>

                <div id="modal1" class="modal" style="width: 30%">
                    <div class="modal-content">
                        <h1 class="center">New Subject</h1>
                        <form method="post" action="<?php echo base_url(); ?>course_c/addSubject">
                            <div class="input-field">
                                <label>Subject Name</label>
                                <input type="text" name="subject" class="validate">
                            </div>
                            <div class="input-field">
                                <select name="semester">
                                    <option value="" selected="">Choose a semester</option>
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                </select>
                                <label>Semester</label>
                            </div>
                            <input type="hidden" name="course_id" value="<?php echo $c->id; ?>">
                            <div class="center">
                                <button type="submit" class="btn green white-text">Submit</button>
                                <a href="#!" class="btn red white-text modal-action modal-close">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="row">
                        <div class="col l5 card">
                            <h5>Semester 1</h5>
                            <table class="responsive-table bordered striped">
                                <thead class="blue white-text">
                                <th>Course Unit Name</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $query1 = $this->db->query("SELECT name FROM course_units WHERE semester = 1 AND course_id = " . $course_id)->result();
                                    foreach ($query1 as $sub) {
                                        echo '<tr><td>' . $sub->name . '</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col l2"></div>
                        <div class="col l5 card">
                            <h5>Semester 2</h5>
                            <table class="responsive-table bordered striped">
                                <thead class="blue white-text">
                                <th>Course Unit Name</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $query1 = $this->db->query("SELECT name FROM course_units WHERE semester = 2 AND course_id = " . $course_id)->result();
                                    foreach ($query1 as $sub) {
                                        echo '<tr><td>' . $sub->name . '</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l5 card">
                            <h5>Semester 3</h5>
                            <table class="responsive-table bordered striped">
                                <thead class="blue white-text">
                                <th>Course Unit Name</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $query1 = $this->db->query("SELECT name FROM course_units WHERE semester = 3 AND course_id = " . $course_id)->result();
                                    foreach ($query1 as $sub) {
                                        echo '<tr><td>' . $sub->name . '</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col l2"></div>
                        <div class="col l5 card">
                            <h5>Semester 4</h5>
                            <table class="responsive-table bordered striped">
                                <thead class="blue white-text">
                                <th>Course Unit Name</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $query1 = $this->db->query("SELECT name FROM course_units WHERE semester = 4 AND course_id = " . $course_id)->result();
                                    foreach ($query1 as $sub) {
                                        echo '<tr><td>' . $sub->name . '</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<?php } ?>

            <!--This is for Certificate-->
<?php if ($c->program == "certificate") {
    $course_id = $c->id; ?>

                <div id="modal1" class="modal" style="width: 30%">
                    <div class="modal-content">
                        <h1 class="center">New Subject</h1>
                        <form method="post" action="<?php echo base_url(); ?>course_c/addSubject">
                            <div class="input-field">
                                <label>Subject Name</label>
                                <input type="text" name="subject" class="validate">
                            </div>
                            
                            <input type="hidden" name="semester" value="0">
                            <input type="hidden" name="course_id" value="<?php echo $c->id; ?>">
                            <div class="center">
                                <button type="submit" class="btn green white-text">Submit</button>
                                <a href="#!" class="btn red white-text modal-action modal-close">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col l3"></div>
                    <div class="col l6 card">
                        <h5>Units Taught</h5>
                        <table class="responsive-table bordered striped">
                            <thead class="blue white-text">
                            <th>Course Unit Name</th>
                            </thead>
                            <tbody>
<?php
                                    $query1 = $this->db->query("SELECT name FROM course_units WHERE semester = 0 AND course_id = " . $course_id)->result();
                                    foreach ($query1 as $sub) {
                                        echo '<tr><td>' . $sub->name . '</td></tr>';
                                    }
                                    ?>                            </tbody>
                        </table>
                    </div>
                    <div class="col l3"></div>
                </div>
<?php } ?>

        </div>
    </div>
</section>
<?php $this->load->view('dashboard/footer'); ?>
<script>
    function addSubject() {
        $('#modal1').openModal();
    }
</script>
</body>
</html>
