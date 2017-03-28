<?php ?>
<html>
<head>
    <title>Enquiry form</title>
    <meta charset="utf-8">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content">
    <div class="container-fluid">
            <a href="<?php echo base_url(); ?>enquiry_c/show" class="btn waves-effect orange">back</a>

        <center><h4>Enquiry form</h4></center>
        <br/>
        <form method="POST" action="<?php echo base_url(); ?>enquiry_c" class="card">
            <!-- <form action="enquiry_c" method="post">-->

            <!--a row of starts-->
            <div class="row">
                <div class="input-field col l4 s12">
                    <?php echo form_label('Your name here'); ?>
                    <span color="red"><?php echo form_error('sname'); ?></span>
                    <input type="text" id="sname" name="sname" class="validate" length="30">
                </div>

                <div class="input-field col l4 s12">
                    <?php echo form_label('Your telephone'); ?>
                    <span color="red"><?php echo form_error('smobile'); ?></span>
                    <input type="text" id="smobile" name="smobile" class='form-control input-lg' length='10'>
                </div>
                <div class="input-field col l4 s12">
                    <?php echo form_label('Enter your address '); ?>
                    <span color="red"><?php echo form_error('saddress'); ?></span>
                    <input type="text" id='saddress' name='saddress' class='form-control input-lg'>
                </div>
            </div>
            <!--row ends here-->

            <div class="row">
                <div class="input-field col l4 s12">
                    <?php echo form_label('Email') ?>
                    <span color="red"><?php echo form_error('email'); ?></span>
                    <input type="email" id='email' name='email' class='form-control input-lg'>
                </div>

                <div class="input-field col l4 s12">
                    <?php echo form_label('Guardian name') ?>
                    <input type="text" id='pname' name='pname' class='form-control input-lg'>
                </div>

                <div class="input-field col l4 s12">
                    <?php echo form_label('Guardian mobile'); ?>
                    <input type="text" id='pmobile' name='pmobile' class='form-control input-lg' length='10'>
                </div>
            </div>
            <!--row ends here-->

            <!--start of a row-->
            <div class="row">
                <div class="input-field col l4 s12">
                    <?php echo form_label('What is your reason being with us?'); ?>
                    <span color="red"><?php echo form_error('reason'); ?></span>
                    <input type="text" id='reason' name='reason' class='form-control input-lg'>
                </div>
                <input type="hidden" name="register" value="0">
                <input type="hidden" name="status" value="0">
                <div class="input-field col l4 s12">
                    <select name="qual">
                        <option value="Certificate">Certificate</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Degree">Degree</option>
                    </select>
                    <?php echo form_label('Qualification'); ?>
                </div>

                <div class="input-field col l4 s12">
                    <?php echo form_label('Former school/company'); ?>
                    <span color="red"><?php echo form_error('school'); ?></span>
                    <input type="text" id='school' name='school' class='form-control input-lg'>
                </div>
            </div>

            <!--start of row-->
            <div class="row">
                <div class="input-field col l4 s12">
                    <select name="knowledge">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    <?php echo form_label('Pre computer knowledge'); ?>
                </div>
                <div class="input-field col l4 s12">
                    <!-- working on the selection field-->
                    <select name="course">
                        <option value="">Select a program</option>
                        <option value="certificate">Certificate</option>
                        <option value="diploma">Diploma</option>
                        <option value="degree">Degree</option>
                    </select>

                    <!--<input type="text" id='course' name='course' class='form-control input-lg'>-->
                </div>
                <div class="input-field col l4 s12">

                    <label for="date">Date</label>
                    <input type="text" class="form-control text-center" readonly value="<?php echo date('Y-m-d'); ?>"
                           id="date" name="date">
                </div>
            </div>
            <!--end of row-->

            <!--start of row-->

            <div class="row">
                <div class="input-field col l8">
                </div>
                <div class="input-field col l5 s12 right">
                    <?php //echo form_input(array('type'=>'submit','value'=>'submit', 'id'=>'submit', 'name'=>'insert', 'class'=>'btn btn-default btn-success btn-md waves-effect waves-light btn '));?>
                    <button type="reset" id="submit" name="reset"
                            class="btn red btn-md waves-effect waves-light">Reset<i
                                class="material-icons right">restore</i></button>
                    <button type="submit" value="submit" id="submit" name="insert"
                            class="btn green btn-md waves-effect waves-light">Submit<i
                                class="material-icons right">send</i></button>
                </div>
            </div>
            <!--end of row-->
            <br/>
        </form>
        <?php //echo form_close()?>
    </div>
</section>
<?php $this->load->view('dashboard/footer'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('select').material_select();
    });
</script>
<?php
if (isset($message)) {
    foreach ($message as $m) {
        ?>
        <script>
            Materialize.toast('<?php echo $m; ?>', 4000)
        </script>
        <?php
    }
}
?>

</body>
</html>