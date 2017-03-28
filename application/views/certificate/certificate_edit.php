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
<?php foreach ($student as $s)?>
<section id="main-content">
    <div class="container-fluid">
        <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
            <a href = "<?php echo base_url(); ?>certificate_c/certificateStudents"><i class="small material-icons">fast_rewind</i></a></button>

        <div id="modal1" class="modal modal-sm center" style="width: 500px">
            <div class="modal-content center-block">
                <h6>Current Photo</h6>
                <img height="100" width="100" src="<?php echo base_url(); ?>students/<?php echo $s->photo; ?>">
                <form action="<?php echo base_url(); ?>certificate_c/editCertificate" method="post" enctype="multipart/form-data">
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

        <center> <h4>Certificate Student Update</h4></center>
        <form action="<?php echo base_url(); ?>certificate_c/editCertificate" method="post" enctype="multipart/form-data" class="card">
            <div class="row">
                <div class="col m3">
                    <div class="input-field">
                        <label for="studentName">Student Name</label>
                        <input class="validate" id="studentName" name="studentName" type="text" value="<?php echo $s->s_name; ?>">
                        <span style="color: red"><?php echo form_error('studentName');?></span>
                    </div>
                </div>
                <div class="col m3">
                    <div class="input-field">
                        <label for="studentContact">Student Contact</label>
                        <input class="validate" id="studentContact" name="studentContact" type="number" length="10" value="<?php echo $s->phone; ?>">
                        <span style="color: red"><?php echo form_error('studentContact');?></span>
                    </div>
                </div>
                <div class="col m3">
                    <div class="input-field">
                        <label for="whatsapp">Whatsapp Contact</label>
                        <input class="validate" id="whatsapp" name="whatsapp" type="number" length="10" value="<?php echo $s->whatsapp; ?>">
                        <span style="color: red"><?php echo form_error('whatsapp');?></span>
                    </div>
                </div>
                <div class="col m3">
                    <div class="input-field">
                        <label for="fathersName">Fathers Name</label>
                        <input class="validate" id="fathersName" name="fathersName" type="text" value="<?php echo $s->fathers_name; ?>">
                        <span style="color: red"><?php echo form_error('fathersName');?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col m3">
                    <div class="input-field">
                        <label for="fathersContact">Fathers Contact</label>
                        <input class="validate" id="fathersContact" name="fathersContact" type="number" length="10" value="<?php echo $s->f_contact; ?>">
                        <span style="color: red"><?php echo form_error('fathersContact');?></span>
                    </div>
                </div>
                <div class="col m3">
                    <div class="input-field">
                        <label for="mothersName">Mothers Name</label>
                        <input class="validate" id="mothersName" name="mothersName" type="text" value="<?php echo $s->mothers_name; ?>">
                        <span style="color: red"><?php echo form_error('mothersName');?></span>
                    </div>
                </div>
                <div class="col m3">
                    <div class="input-field">
                        <label for="mothersContact">Mothers Contact</label>
                        <input class="validate" id="mothersContact" name="mothersContact" type="number" length="10" value="<?php echo $s->m_contact; ?>">
                        <span style="color: red"><?php echo form_error('mothersContact');?></span>
                    </div>
                </div>
                <div class="col m3">
                    <div class="input-field">
                        <label for="nationality">Nationality</label>
                        <input class="validate" id="nationality" name="nationality" type="text" value="<?php echo $s->nationality; ?>">
                        <span style="color: red"><?php echo form_error('nationality');?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col m3">
                    <div class="input-field">
                        <label for="dob">Date of Birth</label>
                        <input class="datepicker" id="dob" name="dob" type="date" value="<?php echo $s->dob; ?>">
                        <span style="color: red"><?php echo form_error('dob');?></span>
                    </div>
                </div>
                <div class="col m3">
                    <div class="form-group">
                        <input type="radio" class="with-gap" name="sex" id="male" value="Male" <?php if ($s->sex == "Male") echo "checked"; ?>>
                        <label for="male">Male</label><br/>
                        <input type="radio" class="with-gap" name="sex" id="female" value="Female" <?php if ($s->sex == "Female") echo "checked"; ?>>
                        <label for="female">Female</label>
                        <span style="color: red"><?php echo form_error('sex');?></span>
                    </div>
                </div>
                <div class="col m3">
                    <div class="input-field">
                        <label for="email" data-error="wrong" data-success="right">Email address</label>
                        <input class="validate" id="email" name="email" type="email" value="<?php echo $s->email; ?>">
                        <span style="color: red"><?php echo form_error('email');?></span>
                    </div>
                </div>
                <div class="col m3">
                    <div class="input-field">
                        <label for="address">Home Address</label>
                        <input class="validate" id="address" name="address" type="text" value="<?php echo $s->address; ?>">
                        <span style="color: red"><?php echo form_error('address');?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col m3">
                    <div class="input-field">
                        <label for="c_c">Company/College</label>
                        <input class="validate" id="company_college" name="company_college" type="text" value="<?php echo $s->company_college; ?>">
                        <span style="color: red"><?php echo form_error('company_college');?></span>
                    </div>
                </div>
                <div class="col m3">
                    <div class="input-field">
                        <label class="control-label" for="dream">Future Dream</label>
                        <input class="validate" id="dream" name="dream" type="text" value="<?php echo $s->dream; ?>">
                        <span style="color: red"><?php echo form_error('dream');?></span>
                    </div>
                </div>
                <div class="col m3">
                        <label>Course</label>
                        <select name="course" class="browser-default">
                            <option value="" disabled <?php if ($s->course == 0) echo 'selected="true"'; ?>>Choose a course</option>
                            <?php

                            $query = $this->db->query("SELECT * FROM courses WHERE program = 'certificate'");
                            $result = $query->result();
                            foreach ($result as $r){
                                ?>
                                <option value="<?php echo $r->id; ?>" <?php if ($s->course == $r->id) echo 'selected="true"'; ?>><?php echo $r->name; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                </div>
                <div class="col m3">
                    <a href="#modal1" onclick="photoUpdate()">
                        <button type="button" title="Update Photo" class="btn btn-small waves-effect waves-light green">Student Photo</button>
                    </a>

                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $s->id; ?>">
            <div class="row right">
                <div class="col l12">
                    <a href="<?php echo base_url();?>certificate_c/certificateStudents"><button class="btn red" type="button"><i class="material-icons right">restore</i>Cancel</button></a>
                    <button class="btn green" name="infoUpdate" type="submit"><i class="material-icons right">send</i>Submit</button>
                </div>
            </div>
            <br/>
        </form>
    </div>
</section>

<?php $this->load->view('dashboard/footer'); ?>
<script>
    function photoUpdate() {
        $('#modal1').openModal();
    }
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
