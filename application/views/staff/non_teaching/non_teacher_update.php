<?php ?>
<html>
<head>
    <title>Non Teacher Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content" style="height: 1024px">
    <div class="inner-content">
        <div class="container-fluid">
            <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
                <a href="<?php echo base_url(); ?>non_teacher/show"><i class="small material-icons">fast_rewind</i></a>
            </button>
            <center><h4>Non-Teacher Update</h4></center>
            <form method="POST" action="<?php echo base_url(); ?>non_teacher/updated_data"
                  enctype="multipart/form-data" class="card">
                <!--a row of starts-->
                <div class="row">
                    <div class="input-field col  l4 m6 s12">
                        <?php echo form_label('Name'); ?></br><font color="red"><?php echo form_error('name'); ?></font>
                        <input type="text" id="name" name="name" class="validate" length="30"
                               value="<?php if ($records) {
                                   echo $records[0]->name;
                               } ?>">
                    </div>

                    <div class="input-field col  l4 m6 s12">
                        <?php echo form_label('Telephone Number'); ?></br><font
                            color="red"><?php echo form_error('phone'); ?></font>
                        <input type="text" id="phone" name="phone" class='form-control input-lg' length='10'
                               value="<?php if ($records) {
                                   echo $records[0]->phone;
                               } ?>">
                    </div>
                    <div class="input-field col l4 m6 s12">
                        <?php echo form_label('Enter address '); ?></br><font
                            color="red"><?php echo form_error('address'); ?></font>
                        <input type="text" id='address' name='address' class='form-control input-lg'
                               value="<?php if ($records) {
                                   echo $records[0]->address;
                               } ?>">
                    </div>
                </div>
                <!--row ends here-->

                <div class="row">
                    <div class="input-field col l4 m6 s12">
                        <?php echo form_label('Email') ?></br><font
                            color="red"><?php echo form_error('email'); ?></font>
                        <input type="email" id='email' name='email' class='form-control input-lg'
                               value="<?php if ($records) {
                                   echo $records[0]->email;
                               } ?>">
                    </div>

                    <div class="input-field col l4 m6 s12">
                        <?php echo form_label('Qualification') ?></br>
                        <input type="text" id='qualification' name='qualification' class='form-control input-lg'
                               value="<?php if ($records) {
                                   echo $records[0]->qualification;
                               } ?>">
                    </div>

                    <div class="col l4 m6 s12">
                        <?php echo form_label('Gender'); ?><br>
                        <select name="sex" class="browser-default">
                            <option value="male" <?php if ($records){ if ($records[0]->sex == "male"){ echo 'selected';}}?>><?php echo 'male'; ?></option>
                            <option value="female" <?php if ($records){ if ($records[0]->sex == "female"){ echo 'selected';}}?>><?php echo 'female'; ?></option>
                        </select>
                    </div>
                </div>
                <!--row ends here-->

                <!--start of a row-->
                <div class="row">
                    <div class="col l4 m6 s12">
                        <?php echo form_label('Blood Group'); ?><br><font
                            color="red"><?php echo form_error('blood_group'); ?></font>
                        <select name="blood_group" class="browser-default">
                            <option value="<?php if ($records) {
                                echo $records[0]->blood_group;
                            } ?>"><?php if ($records) {
                                    echo $records[0]->blood_group;
                                } ?></option>
                            <option value="O"><?php echo 'O'; ?></option>
                            <option value="A"><?php echo 'A'; ?></option>
                            <option value="B"><?php echo 'B'; ?></option>
                        </select>
                    </div>
                    <input type="hidden" name="authentication_key" value="2">
                    <input type="hidden" name="roleid" value="2">
                    <div class="col l4 m6 s12">
                        <?php echo form_label('Department'); ?><br><br>
                        <select name="department" class="browser-default">
                            <option value="<?php if ($records) {
                                echo $records[0]->department;
                            } ?>"><?php if ($records) {
                                    echo $records[0]->department;
                                } ?></option>
                            <option value="DSE"><?php echo 'DSE'; ?></option>
                            <option value="IMS"><?php echo 'IMS'; ?></option>
                            <option value="VFX"><?php echo 'VFX'; ?></option>

                        </select>
                    </div>

                    <div class="col l4 m6 s12">
                        <label>Nationality</label><br>
                        <select name="nationality" class="browser-default">
                            <option value="<?php if ($records) {
                                echo $records[0]->nationality;
                            } ?>"><?php if ($records) {
                                    echo $records[0]->nationality;
                                } ?></option>
                            <option value="Ugandan"><?php echo 'Ugandan'; ?></option>
                            <option value="kenyan"><?php echo 'Kenyan'; ?></option>
                            <option value="Tanzanian"><?php echo 'Tanzanian'; ?></option>
                            <option value="Rwandese"><?php echo 'Rwandese'; ?></option>
                            <option value="Sudanese"><?php echo 'Sudanese'; ?></option>
                            <option value="Congolese"><?php echo 'Congolese'; ?></option>
                            <option value="South African"><?php echo 'South African'; ?></option>
                            <option value="Malawian"><?php echo 'Malawian'; ?></option>
                            <option value="Ethiopian"><?php echo 'Ethiopian'; ?></option>
                            <option value="Eritriean"><?php echo 'Eritriean'; ?></option>
                            <option value="Nigerian"><?php echo 'Nigerian'; ?></option>
                            <option value="senegalese"><?php echo 'Senegalese'; ?></option>
                            <option value="American"><?php echo 'American'; ?></option>
                            <option value="British"><?php echo 'British'; ?></option>
                            <option value="Indian"><?php echo 'Indian'; ?></option>
                            <option value="chinese"><?php echo 'Chinese'; ?></option>
                            <option value="Korean"><?php echo 'Korean'; ?></option>
                            <option value="Others"><?php echo 'Others'; ?></option>
                        </select>

                    </div>
                </div>

                <!--start of row-->

                <div class="row">
                    <div class="input-field col l4 m6 s12">
                        <label for="date">Birth day</label><br>
                        <input type="date" class="form-control text-center datepicker" name="birthday"
                               value="<?php if ($records) {
                                   echo $records[0]->birthday;
                               } ?>">
                    </div>
                    <div class="input-field col l4 m6 s12 ">
                        <label for="date">Date of joining</label><br>
                        <input type="date" class="form-control text-center  datepicker" name="date_of_joining"
                               value="<?php if ($records) {
                                   echo $records[0]->date_of_joining;
                               } ?>">
                    </div>
                    <!--photo upload-->
                    <div class="file-field input-field col l4 m6 s12">
                        <div class="btn">
                            <span>photo</span>
                            <input type="file" class="form-control text-center " name="photo">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="photo" value="<?php if ($records) {
                                echo $records[0]->photo;
                            } ?>">
                        </div>
                    </div>


                </div>
                <!--end of row-->

                <!--start of row-->

                <div class="row">
                    <div class="input-field col l6 m6 s12">
                        <br>
                        <input type="hidden" name="password">
                    </div>


                    <div class="input-field col l6 m6 s12">
                        <?php echo form_input(array('type' => 'reset', 'value' => 'reset', 'id' => 'reset', 'name' => 'reset', 'class' => 'btn btn-default btn-warning btn-md')); ?>
                        <?php echo form_input(array('type' => 'submit', 'value' => 'Update', 'id' => 'update', 'name' => 'update', 'class' => 'btn btn-default btn-success btn-md')); ?>
                        <button class='btn btn-default btn-warning btn-md'><a
                                href="<?php echo base_url() ?>non_teacher/show">Cancel</a>
                        </button>
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
</section>
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