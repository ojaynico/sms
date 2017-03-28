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
    <title> Add Book Details  Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content">
    <div class="inner-content">
    <div class="container-fluid">
        <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
            <a href = "<?php echo base_url(); ?>book_c"><i class="small material-icons">fast_rewind</i></a></button>
        <center> <h4>Add Book Details' Form</h4></center>
        <form action="<?php echo base_url(); ?>book_c/addBook" method="post" class="card">
            <div class="row">
                <div class="col-md-12">
                    <div class="input-field">
                        <label for="studentName">Book Name</label>
                        <input class="validate"  name="book_title" type="text">
                        <span style="color: red"><?php echo form_error('book_title');?></span>
                    </div>
                </div>
                
            <div class="row">
                <div class="col-md-12">
                    <div class="input-field">
                        <label for="mothersName">Book Author</label>
                        <input class="validate"  name="author" type="text">
                        <span style="color: red"><?php echo form_error('author');?></span>
                    </div>
                </div>
                <div class="row">
                    <div class ="col-md-12">
                        <label>Course</label>
                        <select name="course" class="browser-default">
                            <option value="Visual Effects & Animation ">Visual Effects & Animation</option>
                            <option value="Infrastructure & Management Services">Infrastructure & Management
                                Services
                            </option>
                            <option value="Software Engineering">Software Engineering</option>
                        </select>
                        <span style="color: red"><?php echo form_error('course'); ?></span>

                    </div>
                    </div>
            <div class="row">
                <div class="input-field col-md-12">
          <textarea id="textarea1" name="description" class="materialize-textarea"></textarea>
          <label for="textarea1">Description</label>
               </div>
               </div>
            
                
            <div class="row text-right">
                <div class="col-md-12">
                    <button class="btn btn-lg btn-danger" type="reset">Reset</button>
                    <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                </div>
            </div>
            <br/>
        </form>
    </div>
    </div>
</section>
<?php $this->load->view('dashboard/footer'); ?>
<script type="application/javascript">
    $(document).ready(function() {
        $('select').material_select();
    });
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 60 // Creates a dropdown of 15 years to control year
    });
</script>
<script type="text/javascript">
     $('#textarea1').val('New Text');
  $('#textarea1').trigger('autoresize');
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
