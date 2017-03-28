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
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<div id="main-content">
    <div class="container-fluid">
        <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
            <a href="<?php echo base_url(); ?>counselor"><i class="small material-icons">fast_rewind</i></a></button>

        <?php foreach ($counsel_details as $s) { ?>
        <div class="row" id="printdetails">
            <div class="col l12 s12">
                <div class="row">
                    <div class="col l4 s12">
                        <center>
                            <img class="image img-responsive img-rounded" width="250" height="250"
                                 src="<?php echo base_url(); ?>students/<?php echo $s->photo; ?>">
                        </center>
                    </div>
                    <div class="col l4 s12">
                        <table class="responsive-table striped bordered">
                            <tr>
                                <th><h6 class="text-success">ID:</h6></th>
                                <td><h6><?php echo $s->id; ?></h6></td>
                            </tr>
                            <tr>
                                <th><h6 class="text-success">Name:</h6></th>
                                <td><h6><?php echo $s->s_name; ?></h6></td>
                            </tr>
                            <tr>
                                <th><h6 class="text-success">Phone:</h6></th>
                                <td><h6><?php echo $s->phone; ?></h6></td>
                            </tr>
                            <tr>
                                <th><h6 class="text-success">Former School:</h6></th>
                                <td><h6><?php echo $s->UACE_school; ?></h6></td>
                            </tr>
                            <tr>
                                <th><h6 class="text-success">Combination:</h6></th>
                                <td><h6><?php echo $s->UACE_combination; ?></h6></td>
                            </tr>
                        </table>
                    </div>

                    <div class="col l4 s12">
                        <table class="responsive-table striped bordered">
                            <tr>
                                <th><h6 class="text-success">Fathers Name:</h6></th>
                                <td><h6><?php echo $s->fathers_name; ?></h6></td>
                            </tr>
                            <tr>
                                <th><h6 class="text-success">Fathers Contact:</h6></th>
                                <td><h6><?php echo $s->f_contact; ?></h6></td>
                            </tr>
                            <tr>
                                <th><h6 class="text-success">Mothers Name:</h6></th>
                                <td><h6><?php echo $s->mothers_name; ?></h6></td>
                            </tr>
                            <tr>
                                <th><h6 class="text-success">Mothers Contact:</h6></th>
                                <td><h6><?php echo $s->m_contact; ?></h6></td>
                            </tr>
                            <tr>
                                <th><h6 class="text-success">Points:</h6></th>
                                <td><h6><?php echo $s->UACE_result; ?></h6></td>
                            </tr>
                        </table>
                    </div>

                </div>

            </div>
        </div>
        <div class="section">
            <div class="container">
                <form action="<?php echo base_url(); ?>counselor/addDetails" method="post">
                    <input type="hidden" name="id" value="<?php echo $s->id; ?>">
                    <h5>Online Test Result(%):</h5><input class="validate " name="oes_result" id="Maritalstatus"
                                                          type="text">

                    <h5> Student Assessment questions</h5>
                    <div class="row">
                        <div class="col s6">
                            <p><h6>1.Have you ever done computer before or?</p></h6>
                            <div class="form-group">
                                <input type="radio" class="with-gap asses" name="ass1" id="a1" value="a1">
                                <label for="a1">Yes</label><br/>
                                <input type="radio" class="with-gap asses" name="ass1" id="b1" value="b1">
                                <label for="b1">No</label><br/>
                                <input type="radio" class="with-gap asses" name="ass1" id="c1" value="c1">
                                <label for="c1">Don't Know</label>

                            </div>
                        </div>

                        <div class="col s6">
                            <p><h6>2.Do you want to be a job creator?</p></h6>
                            <div class="form-group">
                                <input type="radio" class="with-gap asses" name="ass2" id="a2" value="a2">
                                <label for="a2">Yes</label><br/>
                                <input type="radio" class="with-gap asses" name="ass2" id="b2" value="b2">
                                <label for="b2">No</label><br/>
                                <input type="radio" class="with-gap asses" name="ass2" id="c2" value="c2">
                                <label for="c2">Don't Know</label>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <p><h6>3.Any way!are you interested in doing it </p></h6>
                            <div class="form-group">
                                <input type="radio" class="with-gap asses" name="ass3" id="a3" value="a3">
                                <label for="a3">Yes</label><br/>
                                <input type="radio" class="with-gap asses" name="ass3" id="b3" value="b3">
                                <label for="b3">No</label><br/>
                                <input type="radio" class="with-gap asses" name="ass3" id="c3" value="c3">
                                <label for="c3">Don't Know</label>

                            </div>
                        </div>
                        <div class="col s6">
                            <p><h6>4.Is it important to know computer no mater which kind of a job you will do in future. </p></h6>
                            <div class="form-group ">
                                <input type="radio" class="with-gap asses" name="ass4" id="a4" value="a4">
                                <label for="a4">Yes</label><br/>
                                <input type="radio" class="with-gap asses" name="ass4" id="b4" value="b4">
                                <label for="b4">No</label><br/>
                                <input type="radio" class="with-gap asses" name="ass4" id="c4" value="c4">
                                <label for="c4">Don't Know</label>

                            </div>
                        </div>
                    </div>
                    <p><h6>5.Do you really want to study computer </p></h6>
                    <div class="form-group">
                        <input type="radio" class="with-gap asses" name="ass5" id="a5" value="a5">
                        <label for="a5">Yes</label><br/>
                        <input type="radio" class="with-gap asses" name="ass5" id="b5" value="b5">
                        <label for="b5">No</label><br/>
                        <input type="radio" class="with-gap asses" name="ass5" id="c5" value="c5">
                        <label for="c5">Don't Know</label>
                    </div>
              <!--      <div class="input-field center">
                        <button class="btn orange white-text" type="button" onclick="cal()">Generate Result</button>
                    </div>
                    <div class="center">
                        <h2><span id="result"></span></h2>
                    </div>-->

                    <div class="row">
                        <div class="col l3"></div>
                        <div class="col l6">
                            <div class="input-field">
                                <select name="course">
                                    <option value="">Choose a Course</option>

                                    <?php
                                    $course = $this->db->query("SELECT * FROM courses WHERE program='".$s->program."'");
                                    $courseresult = $course->result();

                                    foreach ($courseresult as $c){
                                        ?>
                                        <option value="<?php echo $c->id; ?>"><?php echo $c->name ." - ". $c->installments; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input-field">

                            </div>
                        </div>
                        <div class="col l3"></div>
                    </div>

                    <?php } ?>
                    <h6>
                        <center><b>Counselor's comments</b></center>
                    </h6>
                    <div class="row">
                        <div class="input-field col-md-10">
                            <label for="textarea1">Comments</label>
                            <textarea id="textarea1" name="comment" class="materialize-textarea"></textarea>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12 right">
                            <button type="submit" class="btn waves-effect waves-light green">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <a id="back-to-top" href="#" class="btn green back-to-top" role="button"
           title="Click/Tap to return on the top page" data-toggle="tooltip" data-placement="left"><span
                    class="medium material-icons " style="color: white">navigation</span></a>
    </div>
</div>

<?php $this->load->view('dashboard/footer'); ?>
<script type="application/javascript">
    var total = 0;

    function cal() {
        if (document.getElementById("a1").checked == true) {
            total = total + 96;
        } else if (document.getElementById("b1").checked == true) {
            total = total + 66;
        } else if (document.getElementById("c1").checked == true) {
            total = total + 33;
        }

        if (document.getElementById("a2").checked == true) {
            total = total + 96;
        } else if (document.getElementById("b2").checked == true) {
            total = total + 66;
        } else if (document.getElementById("c2").checked == true) {
            total = total + 33;
        }

        if (document.getElementById("a3").checked == true) {
            total = total + 96;
        } else if (document.getElementById("b3").checked == true) {
            total = total + 66;
        } else if (document.getElementById("c3").checked == true) {
            total = total + 33;
        }

        if (document.getElementById("a4").checked == true) {
            total = total + 96;
        } else if (document.getElementById("b4").checked == true) {
            total = total + 66;
        } else if (document.getElementById("c4").checked == true) {
            total = total + 33;
        }

        if (document.getElementById("a5").checked == true) {
            total = total + 96;
        } else if (document.getElementById("b5").checked == true) {
            total = total + 66;
        } else if (document.getElementById("c5").checked == true) {
            total = total + 33;
        }

        document.getElementById("result").innerHTML = total;
        total = 0;
    }


    function printStudent() {
        var prtContent = document.getElementById("printdetails");
        var prtCss = new String('<link href="<?php echo base_url(); ?>plugins/css/bootstrap.css" rel="stylesheet">');
        var ptrCss2 = new String('<link href="<?php echo base_url(); ?>plugins/css/style.css" rel="stylesheet">');
        window.document.body.innerHTML = prtCss + ptrCss2 + prtContent.innerHTML;
        window.focus();
        window.print();
        window.close();
    }
</script>
</body>
</html>