<?php ?>
<html>
<head>
    <title>Teacher Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="main-content" style="height: 1024px">
    <br/><br/>
    <div class="inner-content">
        <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
            <a href="<?php echo base_url(); ?>teacher/show"><i class="small material-icons">fast_rewind</i></a></button>

        <a href="<?php echo base_url(); ?>dashboard/roleForm?id=<?php if ($records) {
            echo $records[0]->id;
        } ?>" class="btn btn-small blue right white-text">
            Add Role
        </a>
        <span style="width: 2px">  </span>
        <button title="Create Login" class="btn right waves-light purple">
            <a href="#login" class="white-text" onclick="createLogin()">Create Login</a>
        </button>

        <div id="login" class="modal" style="width: 50%;">
            <div class="modal-content">
                <h3 class="center-align">Create Login Credentials</h3>
                <form id="createlogin" action="<?php echo base_url(); ?>teacher/createLogin" method="post">
                    <div class="row">
                        <div class="input-field">
                            <label>Enter Username</label>
                            <input type="text" name="email" class="validate">
                        </div>
                        <div class="input-field">
                            <label>Enter Password</label>
                            <input type="password" name="password" class="validate">
                        </div>
                        <div class="input-field">
                            <label>Re-Enter Password</label>
                            <input type="password" name="repassword" class="validate">
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?php if ($records) {
                        echo $records[0]->id;
                    } ?>">
                    <div class="row">
                        <div class="col s12 m12 l12 center-align">
                            <input type="submit" id="submitlogin" class="btn green" value="Create">
                            <a href="#!" class="btn red white-text modal-action modal-close waves-effect waves-green">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container-fluid">
            <center><label><h5><?php if ($records) {
                            echo $records[0]->name;
                        } ?>'s details</h5></label></center>
            <hr>
            <form method="POST" action="<?php echo base_url(); ?>teacher/detailed_data">
                <!--a row of starts-->
                <div class="row">
                    <div class="input-field col l6 m6 s12">
                        <img id="myImg" src="<?php echo base_url(); ?>staff/teaching_staff/<?php if ($records) {
                            echo $records[0]->photo;
                        } ?>" class="responsive-img" width="150"/>
                        <!-- The Modal -->
                        <div id="myModal" class="modal">
                            <span class="close">×</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                        </div>

                    </div>
                    <div class="input-field col l6 m6 s12">
                        <label> Teachers Name:</label>
                        <p><?php if ($records) {
                                echo $records[0]->name;
                            } ?></p>
                    </div>
                </div>
                <!--row ends here-->

                <!--start of a row-->
                <div class="row">
                    <div class="input-field col l6 m6 s12">
                        <label>Telephone Number: </label>
                        <p><?php if ($records) {
                                echo $records[0]->phone;
                            } ?></p>
                    </div>

                    <div class="input-field col l6 m6 s12">
                        <label>Teacher's Email: </label>
                        <p><?php if ($records) {
                                echo $records[0]->email;
                            } ?></p>
                    </div>
                </div>
                <!--row ends here-->

                <!--start of a row-->
                <div class="row">
                    <div class="input-field col l6 m6 s12">
                        <label>Qualification: </label>
                        <p><?php if ($records) {
                                echo $records[0]->qualification;
                            } ?></p>
                    </div>

                    <div class="input-field col l6 m6 s12">
                        <label>Gender: </label>
                        <p><?php if ($records) {
                                echo $records[0]->sex;
                            } ?></p>

                    </div>
                </div>
                <!--row ends here-->

                <!--start of a row-->
                <div class="row">
                    <div class="input-field col l6 m6 s12">
                        <label>Blood Group:</label>
                        <p><?php if ($records) {
                                echo $records[0]->blood_group;
                            } ?></p>
                    </div>

                    <div class="input-field col l6 m6 s12">
                        <label>Department: </label>
                        <p><?php if ($records) {
                                echo $records[0]->department;
                            } ?></p>

                    </div>
                </div>
                <!--row ends here-->

                <!--start of a row-->
                <div class="row">
                    <div class="input-field col l6 m6 s12">
                        <label>Employment Type: </label>
                        <p><?php if ($records) {
                                echo $records[0]->emp_type;
                            } ?></p>
                    </div>

                    <div class="input-field col l6 m6 s12">
                        <label>Designation: </label>
                        <p><?php if ($records) {
                                echo $records[0]->designation;
                            } ?></p>
                    </div>
                </div>
                <!--row ends here-->

                <!--start of a row-->
                <div class="row">
                    <div class="input-field col l6 m6 s12">
                        <label>Nationality: </label>
                        <p><?php if ($records) {
                                echo $records[0]->nationality;
                            } ?></p>
                    </div>

                    <div class="input-field col l6 m6 s12">
                        <label>Years of experience: </label>
                        <p><?php if ($records) {
                                echo $records[0]->years_of_experience;
                            } ?></p>
                    </div>
                </div>
                <!--end of row-->

                <!--start of row-->
                <div class="row">
                    <div class="input-field col l6 m6 s12">
                        <label>Birth day: </label>
                        <p><?php if ($records) {
                                echo $records[0]->birthday;
                            } ?></p>
                    </div>

                    <div class="input-field col l6 m6 s12">
                        <label>Date of joining: </label>
                        <p><?php if ($records) {
                                echo $records[0]->date_of_joining;
                            } ?></p>
                    </div>
                </div>
                <!--row ends here-->

                <!--start of a row-->
                <div class="row">
                    <div class="input-field col l6 m6 s12">
                        <label>Teacher's address: </label>
                        <p><?php if ($records) {
                                echo $records[0]->address;
                            } ?></p>
                    </div>

                    <div class="input-field col l6 m6 s12">
                    </div>
                </div>
                <!--end of row-->

                <input type="hidden" name="upid" value="<?php if ($records) {
                    echo $records[0]->id;
                } ?>"/>
            </form>

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

    function createLogin() {
        $('#login').openModal();
    }
</script>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
</script>

</body>
</html>