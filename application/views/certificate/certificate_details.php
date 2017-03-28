<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 10/17/16
 * Time: 4:00 PM
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
<div id="main-content">
<div class="container-fluid">
    <br/>
    <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
        <a href = "<?php echo base_url(); ?>certificate_c/certificateStudents"><i class="small material-icons">fast_rewind</i></a></button>
    <?php foreach ($student as $s)?>

    <?php
    $query = $this->db->query("SELECT id FROM examinee WHERE id=".$s->id);
    if ($query->num_rows() < 1){
    ?>
    <button title="Create Test" class="btn right waves-light purple">
        <a href="#test" class="white-text" onclick="createTest()">Create Test</a>
    </button>
    <?php } else {?>
        <button title="Create Login" class="btn right waves-light purple">
            <a href="#login" class="white-text" onclick="createLogin()">Create Login</a>
        </button>
    <?php }?>
    <div id="test" class="modal">
        <div class="modal-content">
            <h3 class="center-align">Create Test</h3>
            <form action="<?php echo base_url();?>certificate_c/printTicket" method="post">
                <div class="row">
                    <div class="col l6">
                        <center>
                            <img class="image img-responsive img-rounded" width="250" height="250" src="<?php echo base_url(); ?>students/<?php echo $s->photo; ?>">
                            <br/><br/><br/>
                            <h6 class="green-text">Date: <b class="black-text"><?php echo date("Y-m-d"); ?></b></h6>
                        </center>
                    </div>
                    <div class="col l6">
                        <table class="table responsive-table">
                            <tr><th><h6 class="green-text">Name:</h6></th><td><h6><?php echo $s->s_name; ?></h6></td></tr>
                            <tr><th><h6 class="green-text">Username:</h6></th><td><h6><input style="height: 13pt" type="text" name="username" required/></h6></td></tr>
                            <tr><th><h6 class="green-text">Password:</h6></th><td><h6><input style="height: 13pt" type="text" name="password" required/></h6></td></tr>
                            <tr><th><h6 class="green-text">Test Code:</h6></th><td><h6><input style="height: 13pt" type="text" name="code" required/></h6></td></tr>
                            <tr><th><h6 class="green-text">Room No:</h6></th><td><h6><input style="height: 13pt" type="text" name="room" required/></h6></td></tr>
                            <tr><th><h6 class="green-text">Computer No:</h6></th><td><h6><input style="height: 13pt" type="text" name="computer" required/></h6></td></tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col l6">
                        <table class="table responsive-table">
                            <tr><th><h6 class="green-text">Supervisor:</h6></th><td><h6><input style="height: 13pt" type="text" name="supervisor" required/></h6></td></tr>
                            <tr><th><h6 class="green-text">Signature:</h6></th><td><h6><input style="height: 13pt" type="text" name="signature" readonly/></h6></td></tr>
                        </table>
                    </div>
                    <div class="col l6">
                        <table class="table responsive-table">
                            <tr><th><h6 class="green-text">Counselor:</h6></th><td><h6><input style="height: 13pt" type="text" name="counselor" required/></h6></td></tr>
                            <tr><th><h6 class="green-text">Signature:</h6></th><td><h6><input style="height: 13pt" type="text" name="signature" readonly/></h6></td></tr>
                        </table>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $s->id; ?>">
                <div class="row">
                    <div class="col s12 m12 l12 center-align">
                        <input type="submit" name="submit" class="btn green" value="Create">
                        <a href="#!" class="btn red white-text modal-action modal-close waves-effect waves-green">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="login" class="modal" style="width: 50%;">
        <div class="modal-content">
            <h3 class="center-align">Create Login Credentials</h3>
            <form id="createlogin" action="<?php echo base_url(); ?>certificate_c/createLogin" method="post">
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

                <input type="hidden" name="id" value="<?php echo $s->id; ?>">
                <div class="row">
                    <div class="col s12 m12 l12 center-align">
                        <input type="submit" id="submitlogin" class="btn green" value="Create">
                        <a href="#!" class="btn red white-text modal-action modal-close waves-effect waves-green">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row" id="printdetails">
        <div class="col l12">
            <div class="row">
                <div class="col l6">
                    <center>
                    <img class="image img-responsive img-rounded" width="250" height="250" src="<?php echo base_url(); ?>students/<?php echo $s->photo; ?>">
                    </center>
                </div>
                <div class="col l6">
                    <table class="table responsive-table">
                        <tr><th><h6 class="green-text">Name:</h6></th><td><h6><?php echo $s->s_name; ?></h6></td></tr>
                        <tr><th><h6 class="green-text">Gender:</h6></th><td><h6><?php echo $s->sex; ?></h6></td></tr>
                        <tr><th><h6 class="green-text">Contact:</h6></th><td><h6><?php echo $s->phone; ?></h6></td></tr>
                        <tr><th><h6 class="green-text">Course:</h6></th><td><h6><?php echo $s->course; ?></h6></td></tr>
                        <tr><th><h6 class="green-text">Date of Birth:</h6></th><td><h6><?php echo $s->dob; ?></h6></td></tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col l6">
                    <table class="table responsive-table">
                    <tr><th><h6 class="green-text">Email:</h6></th><td><h6><?php echo $s->email; ?></h6></td></tr>
                    <tr><th><h6 class="green-text">Nationality:</h6></th><td><h6><?php echo $s->nationality; ?></h6></td></tr>
                    <tr><th><h6 class="green-text">Address:</h6></th><td><h6><?php echo $s->address; ?></h6></td></tr>
                    <tr><th><h6 class="green-text">Former School:</h6></th><td><h6><?php echo $s->company_college; ?></h6></td></tr>
                    <tr><th><h6 class="green-text">Dream Job:</h6></th><td><h6><?php echo $s->dream; ?></h6></td></tr>
                    </table>
                </div>
                <div class="col l6">
                    <table class="table responsive-table">
                        <tr><th><h6 class="green-text">Fathers Name:</h6></th><td><h6><?php echo $s->fathers_name; ?></h6></td></tr>
                        <tr><th><h6 class="green-text">Fathers Contact:</h6></th><td><h6><?php echo $s->f_contact; ?></h6></td></tr>
                        <tr><th><h6 class="green-text">Mothers Name:</h6></th><td><h6><?php echo $s->mothers_name; ?></h6></td></tr>
                        <tr><th><h6 class="green-text">Mothers Contact:</h6></th><td><h6><?php echo $s->m_contact; ?></h6></td></tr>
                        <tr><th><h6 class="green-text">Registered:</h6></th><td><h6><?php echo $s->date; ?></h6></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col l12 center">
    <button class="btn blue" onclick="printStudent()">Print</button>
    <a href="<?php echo base_url();?>certificate_c/printLetter?id=<?php echo $s->id; ?>&type=1"><button class="btn blue" type="button">Print P-Letter</button></a>
    <a href="<?php echo base_url();?>certificate_c/printLetter?id=<?php echo $s->id; ?>&type=2"><button class="btn blue" type="button">Print A-Letter</button></a>
</div>
</div>
<?php $this->load->view('dashboard/footer'); ?>
<script type="application/javascript">
    function printStudent() {
        var prtContent = document.getElementById("printdetails");
        var prtCss = new String('<link href="<?php echo base_url();?>plugins/css/materialize.min.css" rel="stylesheet">');
        window.document.body.innerHTML=prtCss + prtContent.innerHTML;
        window.focus();
        window.print();
        window.close();
    }


    function createTest() {
        $('#test').openModal();
    }

    function createLogin() {
        $('#login').openModal();
    }

</script>
</body>
</html>