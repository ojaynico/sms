<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/14/16
 * Time: 9:54 AM
 */
?>
<html>
<head>
    <title>Course Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content">
    <div class="inner-content">
    <div class="container-fluid">
        <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
            <a href = "<?php echo base_url(); ?>course_c/allCourses"><i class="small material-icons">fast_rewind</i></a></button>
        <center><h3>Add Course</h3></center>
        <form action="<?php echo base_url(); ?>course_c/addCourse" method="post">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4  card">
                    <div class="input-field">
                        <label for="name">Course Name</label>
                        <input class="validate" id="name" name="name" type="text">
                        <span style="color: red"><?php echo form_error('name');?></span>
                    </div>
                    <div class="">
                        <label for="program">Course Program</label>
                        <select name="program" class="browser-default">
                            <option value="" disabled selected>Choose a program</option>
                            <option value="diploma">Diploma</option>
                            <option value="certificate">Certificate</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="f_fee">Functional Fee</label>
                        <input class="validate" id="f_fee" name="f_fee" type="number">
                        <span style="color: red"><?php echo form_error('f_fee');?></span>
                    </div>
                    <div class="input-field">
                        <label for="installments">Course Fee</label>
                        <input class="validate" id="installments" name="installments" type="number">
                        <span style="color: red"><?php echo form_error('installments');?></span>
                    </div>
                    <div class="input-field">
                        <label for="duration">Course Duration(months or weeks)</label>
                        <input class="validate" id="duration" name="duration" type="text">
                        <span style="color: red"><?php echo form_error('duration');?></span>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-lg btn-danger" type="reset">Reset</button>
                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                    </div>
                    <br/>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </form>
    </div>
    </div>
</section>
<?php $this->load->view('dashboard/footer'); ?>
<script type="application/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
<?php
if (isset($success)){
    foreach ($success as $m){
        ?>
        <script type="application/javascript">
            Materialize.toast('<?php echo $m; ?>', 4000)
        </script>
        <?php
    } }?>
</body>
</html>
