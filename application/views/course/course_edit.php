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
    <title>Certificate Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<?php foreach ($course as $c)?>
<section id="main-content">
    <div class="inner-content">
    <div class="container-fluid">
        <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
            <a href = "<?php echo base_url(); ?>course_c/allCourses"><i class="small material-icons">fast_rewind</i></a></button>
        <center><h3>Edit Course</h3></center>
        <form action="<?php echo base_url(); ?>course_c/editCourse" method="post">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 card">
                    <div class="input-field">
                        <label for="name">Course Name</label>
                        <input class="validate" id="name" name="name" type="text" value="<?php echo $c->name; ?>">
                        <span style="color: red"><?php echo form_error('name');?></span>
                    </div>
                    <div class="">
                        <select name="program" class="browser-default">
                            <option value="" disabled <?php if ($c->program == "") echo "selected"; ?>>Choose a program</option>
                            <option value="Diploma" <?php if ($c->program == "diploma") echo "selected"; ?>>Diploma</option>
                            <option value="Certificate" <?php if ($c->program == "certificate") echo "selected"; ?>>Certificate</option>
                        </select>
                        <label for="program">Course Program</label>
                    </div>
                    <div class="input-field">
                        <label for="f_fee">Functional Fee</label>
                        <input class="validate" id="f_fee" name="f_fee" type="number" value="<?php echo $c->f_fee; ?>">
                        <span style="color: red"><?php echo form_error('f_fee');?></span>
                    </div>
                    <div class="input-field">
                        <label for="amount">Course Fee</label>
                        <input class="validate" id="amount" name="amount" type="number" value="<?php echo $c->installments; ?>">
                        <span style="color: red"><?php echo form_error('amount');?></span>
                    </div>
                    <div class="input-field">
                        <label for="duration">Course Duration(months or weeks)</label>
                        <input class="validate" id="duration" name="duration" type="text" value="<?php echo $c->duration; ?>">
                        <span style="color: red"><?php echo form_error('duration');?></span>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo base_url();?>course_c/allCourses"><button class="btn btn-lg btn-danger" type="button">Cancel</button></a>
                        <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
            <input type="hidden" name="id" value="<?php echo $c->id; ?>">
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
