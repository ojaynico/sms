<?php

?>

<?php
/**
 * Created by IntelliJ IDEA.
 * User: andrew
 * Date: 10/17/2016
 * Time: 5:55 PM
 */
?>

<html>
<head>
    <title>Diploma Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<?php foreach ($student as $s) ?>
<section id="main-content">
    <div class="inner-content">
        <div class="container-fluid">
            <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
                <a href = "<?php echo base_url(); ?>diploma_c/diplomaStudents"><i class="small material-icons">fast_rewind</i></a></button>

            <div id="modal1" class="modal modal-sm center" style="width: 500px">
                <div class="modal-content center-block">
                    <h6>Current Photo</h6>
                    <img height="100" width="100" src="<?php echo base_url(); ?>students/<?php echo $s->photo; ?>">
                    <form action="<?php echo base_url(); ?>diploma_c/editDiploma" method="post" enctype="multipart/form-data">
                        <h6>Choose a new Photo</h6>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Photo</span>
                                <input name="photo" type="file"/>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text"/>
                            </div>
                        </div>
                        <input type="hidden" name="studentid" value="<?php echo $s->id; ?>">
                        <input type="hidden" name="photoold" value="<?php echo $s->photo; ?>">
                        <button class="modal-action waves-effect waves-green btn-flat btn green" name="imageUpdate" value="submit" type="submit">Submit</button>
                    </form>
                </div>
            </div>

            <center> <h4>Diploma Student Update</h4></center>
            <form action="<?php echo base_url(); ?>diploma_c/editDiploma" method="post" enctype="multipart/form-data"
                  class="card">
                <input type="hidden" name="id" value="<?php echo $s->id; ?>">
                <div class="row">
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="s_name">Student Name</label>
                            <input class="validate "
                                   name="s_name" value="<?php echo $s->s_name; ?>" type="text">
                            <span style="color: red"><?php echo form_error('s_name'); ?></span>
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="form-group">
                            <input type="radio" class="with-gap" name="sex" <?php if ($s->sex == "Male") echo "checked"; ?> id="male"
                                   value="Male">
                            <label for="male">Male</label><br/>
                            <input type="radio" class="with-gap" name="sex" <?php if ($s->sex == "Female") echo "checked"; ?> id="female"
                                   value="Female">
                            <label for="female">Female</label>

                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="Maritalstatus">Marital Status</label>
                            <input class="validate " name="m_status" value="<?php echo $s->m_status; ?>"
                                   id="Maritalstatus"
                                   type="text">
                            <span style="color: red"><?php echo form_error('m_status'); ?></span>
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="Nationality">Nationality</label>
                            <input class="validate" name="nationality" value="<?php echo $s->nationality; ?>"
                                   id="Nationality"
                                   type="text">
                            <span style="color: red"><?php echo form_error('nationality'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="dob">Date of Birth</label>
                            <input class="datepicker" name="dob" value="<?php echo $s->dob; ?>" type="date">
                        </div>
                        <span style="color: red"><?php echo form_error('dob'); ?></span>
                    </div>

                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="religion">Religion</label>
                            <input class="validate " type="text" value="<?php echo $s->religion; ?>" name="religion">

                            <span style="color: red"><?php echo form_error('religion'); ?></span>
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="Country">Country</label>
                            <input class="validate " id="country"
                                   name="country" value="<?php echo $s->country; ?>" type="text">
                            <span style="color: red"><?php echo form_error('country'); ?></span>
                        </div>
                    </div>

                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="DistrictOfBirth">District of Birth</label>
                            <input class="validate " value="<?php echo $s->district_of_birth; ?>"
                                   name="district_of_birth"
                                   type="text">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="stdmobile">Mobile Number</label>
                            <input class="validate " value="<?php echo $s->phone; ?>" name="phone"
                                   type="text">
                            <span style="color: red"><?php echo form_error('phone'); ?></span>
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="stdmobile"><i class="material-icons right">phone</i>Whatsapp Number</label>
                            <input class="validate " value="<?php echo $s->whatsapp; ?>" name="whatsapp" type="text">
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="email">Email Address</label>
                            <input class="validate " value="<?php echo $s->email; ?>" name="email"
                                   type="text">
                            <span style="color: red"><?php echo form_error('email'); ?></span>
                        </div>
                    </div>
                    <div class="col s3">
                        <div class="input-field">
                            <label for="address">Address</label>
                            <input class="validate " value="<?php echo $s->address; ?>" name="address" type="text">
                            <span style="color: red"><?php echo form_error('address'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="pleIndex">PLE Index Number</label>
                            <input class="validate" value="<?php echo $s->PLE_indx_no; ?>" name="PLE_indx_no" type="text">
                            <span style="color: red"><?php echo form_error('PLE_indx_no'); ?></span>
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="pleYear">PLE Year of Exam</label>
                            <input class="validate" value="<?php echo $s->PLE_yr_exam; ?>" name="PLE_yr_exam" type="text">
                            <span style="color: red"><?php echo form_error('PLE_year_no'); ?></span>
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="pleSchool">PLE School</label>
                            <input class="validate" value="<?php echo $s->PLE_school; ?>" name="PLE_school" type="text">
                            <span style="color: red"><?php echo form_error('PLE_school'); ?></span>
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="pleResult">PLE Aggregates</label>
                            <input class="validate" value="<?php echo $s->PLE_result; ?>" name="PLE_result" type="text">
                            <span style="color: red"><?php echo form_error('PLE_result'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="uceIndex">UCE Index Number</label>
                            <input class="validate " value="<?php echo $s->UCE_indx_no; ?>" name="UCE_indx_no"
                                   type="text">
                            <span style="color: red"><?php echo form_error('UCE_indx_no'); ?></span>
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="sex">UCE Year of Exam</label>
                            <input class="validate " value="<?php echo $s->UCE_yr_exam; ?>" name="UCE_yr_exam"
                                   type="text">
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="UCE_school">UCE school</label>
                            <input class="validate " value="<?php echo $s->UCE_school; ?>" name="UCE_school"
                                   type="text">
                            <span style="color: red"><?php echo form_error('UCE_school'); ?></span>
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class=" input-field">
                            <label for="uceschool">UCE Aggregates</label>
                            <input class="validate " value="<?php echo $s->UCE_result; ?>" name="UCE_result"
                                   type="text">
                            <span style="color: red"><?php echo form_error('UCE_result'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="uaceno">UACE Index number</label>
                            <input class="validate " value="<?php echo $s->UACE_indx_no; ?>" name="UACE_indx_no"
                                   type="text">
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="dream">UACE year of Exam</label>
                            <input class="validate " value="<?php echo $s->UACE_yr_exam; ?>" name="UACE_yr_exam"
                                   type="text">
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="course">UACE School</label>
                            <input class="validate " value="<?php echo $s->UACE_school; ?>" name="UACE_school" id="course"
                                   type="text">
                            <span style="color: red"><?php echo form_error('UACE_indx_no'); ?></span>

                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class=" input-field">
                            <label for="UACE_result">UACE RESULT(points)</label>
                            <input class="validate " value="<?php echo $s->UACE_result; ?>" name="UACE_result"
                                   type="text">
                            <span style="color: red"><?php echo form_error('UACE_result'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col l3 s12 m6">
                        <div class=" input-field">
                            <label for="UACE_combination">UACE Combination</label>
                            <input class="validate " value="<?php echo $s->UACE_combination; ?>" name="UACE_combination"
                                   type="text">
                            <span style="color: red"><?php echo form_error('UACE_combination'); ?></span>
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class=" input-field">
                            <label for="o_qualification">Other Qualification(if any)</label>
                            <input class="validate " value="<?php echo $s->o_qualification; ?>" name="o_qualification"
                                   type="text">
                            <span style="color: red"><?php echo form_error('o_qualification'); ?></span>
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="institute_name">Institute name</label>
                            <input class="validate" value="<?php echo $s->o_institute_name; ?>" name="o_institute_name" id="institute_name"
                                   type="text">
                            <span style="color: red"><?php echo form_error('institute_name'); ?></span>
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="dream">Year Obtained</label>
                            <input class="validate" value="<?php echo $s->o_yr_obtained; ?>" name="o_yr_obtained"
                                   type="text">
                            <span style="color: red"><?php echo form_error('yr_obtained'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="dream">SITM reg no if Registered</label>
                            <input class="validate " value="<?php echo $s->sitm_reg_no; ?>" name="sitm_reg_no"
                                   type="text">
                            <span style="color: red"><?php echo form_error('sitm_reg_no'); ?></span>
                        </div>
                    </div>

                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="Admission">SITM course if any.</label>
                            <input class="validate " value="<?php echo $s->sitm_course; ?>" name="sitm_course"
                                   type="text">
                        </div>
                    </div>

                    <div class="col l3 s12 m6">
                        <div class=" input-field">
                            <label for="Admission">Qualification</label>
                            <input class="validate " value="<?php echo $s->sitm_qualification; ?>" name="sitm_qualification"
                                   type="text">
                            <span style="color: red"><?php echo form_error('yr_obtained'); ?></span>
                        </div>
                    </div>

                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="regDate">Year of admission</label>
                            <input class="validate " value="<?php echo $s->sitm_doa; ?>" name="sitm_doa"
                                   type="text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="appl">Fathers Name</label>
                            <input class="validate " value="<?php echo $s->fathers_name; ?>" name="fathers_name"
                                   type="text">
                            <span style="color: red"><?php echo form_error('fathers_name'); ?></span>

                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="f_contact"><i class="material-icons right">phone</i>Fathers Contact</label>
                            <input class="validate" value="<?php echo $s->f_contact; ?>" name="f_contact"
                                   type="number" length="10">
                            <span style="color: red"><?php echo form_error('yr_obtained'); ?></span>
                        </div>
                    </div>

                    <div class="col l3 s12 m6">
                        <div class="input-field">
                            <label for="Religion">Mothers Name</label>
                            <input class="validate" value="<?php echo $s->mothers_name; ?>" name="mothers_name" id="Religion"
                                   type="text">
                            <span style="color: red"><?php echo form_error('class_cert'); ?></span>
                        </div>
                    </div>
                    <div class="col l3 s12 m6">
                        <div class=" input-field">
                            <label><i class="material-icons right">phone</i>Mothers Contact</label>
                            <input class="validate " value="<?php echo $s->m_contact; ?>" name="m_contact"
                                   type="number" length="10">
                            <span style="color: red"><?php echo form_error('m_contact'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s3">
                        <div class="input-field">
                            <label for="nok">Next of kin</label>
                            <input class="validate " value="<?php echo $s->next_kin; ?>" name="next_kin" id="nok"
                                   type="text">
                        </div>
                    </div>

                    <div class="col s3">
                        <div class="input-field">
                            <label for="next_kin_contact"><i class="material-icons right">phone</i>Next of kin Contact</label>
                            <input class="validate " value="<?php echo $s->next_kin_contact; ?>" name="next_kin_contact" id="next_kin_contact"
                                   type="text">
                        </div>
                    </div>

                    <div class="col s3">
                        <div class="input-field">
                            <label for="Religion">Intake</label>
                            <input class="validate " value="<?php echo $s->intake; ?>" name="intake"
                                   type="text">
                            <span style="color: red"><?php echo form_error('intake'); ?></span>

                        </div>
                    </div>

                    <div class="col s3">
                        <div class="input-field">
                            <input class="validate" name="date" type="text" value="<?php echo $s->date; ?>" readonly>
                            <label for="regDate">Date of Registration</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col l3 s12 m6">
                        <label>Course</label>
                        <select name="course" class="browser-default">
                            <option value="" disabled <?php if ($s->course == 0) echo 'selected="true"'; ?>>Choose a course</option>
                            <?php

                            $query = $this->db->query("SELECT * FROM courses WHERE program = 'diploma'");
                            $result = $query->result();
                            foreach ($result as $r){
                                ?>
                                <option value="<?php echo $r->id; ?>" <?php if ($s->course == $r->id) echo 'selected="true"'; ?>><?php echo $r->name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <span style="color: red"><?php echo form_error('course'); ?></span>
                    </div>
                    <div class="col l3 s12 m6">
                        <a href="#modal1" onclick="photoUpdate()">
                            <button type="button" title="Update Photo" class="btn btn-small waves-effect waves-light green"><i class="material-icons right">perm_identity</i>Student Photo</button>
                        </a>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col s4">
                    </div>
                    <div class="col s4 right">
                        <button class=" btn waves-light red"><i class="material-icons right">restore</i>Reset
                        </button>
                        <button class=" btn waves-effect waves-light green" name="infoUpdate" type="submit"><i
                                class="material-icons right">send</i>Submit
                        </button>
                    </div>
                    <div class="col s4">

                    </div>
                </div>
                <br/>
        </div>
        </form>
    </div>
    </div>
    </div>
</section>
<?php $this->load->view('dashboard/footer'); ?>
<script>
    function photoUpdate() {
        $('#modal1').openModal();
    }
</script>

<script type="application/javascript">
    $(document).ready(function () {
        $('select').material_select();
    });
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 60 // Creates a dropdown of 15 years to control year
    });
</script>
<?php
if (isset($success)) {
    foreach ($success as $m) {
        ?>
        <script type="application/javascript">
            Materialize.toast('<?php echo $m; ?>', 4000)
        </script>
        <?php
    }
} ?>
</body>
</html>
