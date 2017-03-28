<?php ?>
<html>
<head>
    <title>Enquiry form</title>

    <meta charset="utf-8">
    <!--Import Google Icon Font-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<div id="main-content">
        <div class="container-fluid">
            <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
                <a href = "<?php echo base_url(); ?>enquiry_c/show"><i class="small material-icons">fast_rewind</i></a></button>            <h4 class="center-align">Update enquiry form</h4>
            <!--<a href="http://localhost/simpleCRUD/enquiry_c/show">enquirees</a>-->
            <form method="POST" action="<?php echo base_url(); ?>enquiry_c/updated_data" class="card">
                <!-- <form action="enquiry_c" method="post">-->
                <?php if (isset($message)) { ?>
                    <center><h4 style="color:green;">Data updated successfully</h4></center><br><?php } ?>
                <!--a row of starts-->
                <div class="row">
                    <div class="input-field col s4">
                        <?php echo form_label('Your name here'); ?>
                        <span color="red"><?php echo form_error('st_name'); ?></span>
                        <input type="text" id="st_name" class="validate" length="30" value="<?php if ($records) {
                            echo $records[0]->st_name;
                        } ?>" name="st_name"/>
                    </div>

                    <div class="input-field col s4">
                        <?php echo form_label('Your telephone'); ?>
                        <span color="red"><?php echo form_error('s_mobile'); ?></span>
                        <input type="text" id="smobile" name="smobile" class='form-control input-lg' length='10'
                               value="<?php if ($records) {
                                   echo $records[0]->st_mobile;
                               } ?>"/>
                    </div>
                    <div class="input-field col s4">
                        <?php echo form_label('Enter your address '); ?>
                        <span color="red"><?php echo form_error('saddress'); ?></span>
                        <input type="text" id='saddress' name='saddress' class='form-control input-lg'
                               value="<?php if ($records) {
                                   echo $records[0]->st_address;
                               } ?>"/>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s4">
                        <?php echo form_label('Guardian name') ?>
                        <input type="text" id='pname' name='pname' class='form-control input-lg'
                               value="<?php if ($records) {
                                   echo $records[0]->g_name;
                               } ?>"/>
                    </div>

                    <div class="input-field col s4">
                        <?php echo form_label('email') ?>
                        <span color="red"><?php echo form_error('email'); ?></span>
                        <input type="email" id='email' name='email' class='form-control input-lg'
                               value="<?php if ($records) {
                                   echo $records[0]->st_email;
                               } ?>"/>
                    </div>
                    <div class="input-field col s4">
                        <?php echo form_label('Guardian mobile'); ?>
                        <input type="text" id='pmobile' name='pmobile' class='form-control input-lg' length='10'
                               value="<?php if ($records) {
                                   echo $records[0]->g_mobile;
                               } ?>"/>
                    </div>
                </div>

                <!--start of a row-->
                <div class="row">
                    <div class="input-field col s4">
                        <?php echo form_label('What is your reason being with us?'); ?>
                        <span color="red"><?php echo form_error('reason'); ?></span>
                        <input type="text" id='reason' name='reason' class='form-control input-lg'
                               value="<?php if ($records) {
                                   echo $records[0]->reason;
                               } ?>">
                    </div>

                    <div class="input-field col s4">
                        <?php echo form_label('Qualification'); ?>
                        <input type="text" id='qual' name='qual' class='form-control input-lg'
                               value="<?php if ($records) {
                                   echo $records[0]->qualification;
                               } ?>">
                    </div>
                    <div class="input-field col s4">
                        <?php echo form_label('Former school/company'); ?>
                        <span color="red"><?php echo form_error('school'); ?></span>
                        <input type="text" id='school' name='school' class='form-control input-lg'
                               value="<?php if ($records) {
                                   echo $records[0]->f_company;
                               } ?>">
                    </div>
                </div>
                <!--end of a row-->


                <!--start of row-->
                <div class="row">
                    <div class="input-field col s4">
                        <?php echo form_label('Pre computer knowledge'); ?>
                        <input type="text" id='knowledge' name='knowledge' class='form-control input-lg'
                               value="<?php if ($records) {
                                   echo $records[0]->p_knowlegde;
                               } ?>">
                    </div>

                    <div class="input-field col s4">
                        <!-- working on the selection field-->

                        <select name="course">
                            <option value="" <?php if ($records[0]->course == "") { echo "selected";} ?>>Select a program</option>
                            <option value="certificate" <?php if ($records[0]->course == "certificate") { echo "selected";} ?>>Certificate</option>
                            <option value="dipoma" <?php if ($records[0]->course == "diploma") { echo "selected";} ?>>Diploma</option>
                            <option value="degree" <?php if ($records[0]->course == "degree") { echo "selected";} ?>>Degree</option>
                        </select>
                        <label>which program are you interested in?</label>
                        <!--<input type="text" id='course' name='course' class='form-control input-lg'>-->
                    </div>
                    <div class="input-field col s4">

                        <label for="date">Date of enquiry:</label>
                        <input type="date" readonly class="form-control text-center datepicker"
                               value="<?php if ($records) {
                                   echo $records[0]->date;
                               } ?>" id="date" name="date">
                    </div>
                </div>
                <!--end of row-->

                <!--start of row-->
                <div class="row">
                    <div class="input-field col s4">

                    </div>

                    <div class="input-field col s6">
                        <?php echo form_input(array('type' => 'reset', 'value' => 'reset', 'id' => 'reset', 'name' => 'reset', 'class' => 'btn btn-default btn-warning btn-md')); ?>
                        <?php echo form_input(array('type' => 'submit', 'value' => 'Update', 'id' => 'update', 'name' => 'update', 'class' => 'btn btn-default btn-success btn-md')); ?>
                    </div>
                </div>
                <!--end of row-->
                <input type="hidden" name="upid" value="<?php if ($records) {
                    echo $records[0]->id;
                } ?>"/>
                <br/>
            </form>
            <?php //echo form_close()?>
        </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('select').material_select();
    });

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
</script>

</body>
</html>