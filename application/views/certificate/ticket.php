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
    <title>Print Ticket</title>
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

                <h3 class="center-align">Print Preview</h3>
                    <div id="printTicket">
                        <div class="row">
                            <h2 class="center">Online Test Ticket</h2>
                            <div class="col l6">
                                <center>
                                    <img class="image img-responsive img-rounded" width="250" height="250" src="<?php foreach ($student as $s) { echo base_url(); ?>students/<?php echo $s->photo; } ?>">
                                    <br/><br/><br/>
                                    <h6 class="green-text">Date: <b class="black-text"><?php echo date("Y-m-d"); ?></b></h6>
                                </center>
                            </div>
                            <div class="col l6">
                                <table class="table responsive-table">
                                    <tr><th><h6 class="green-text">Name:</h6></th><td><h6><?php foreach ($student as $s) { echo $s->s_name; } ?></h6></td></tr>
                                    <?php
                                    foreach ($ticket as $t){
                                    ?>
                                    <tr><th><h6 class="green-text">Username:</h6></th><td><h6><?php echo $t->username; ?></h6></td></tr>
                                    <tr><th><h6 class="green-text">Password:</h6></th><td><h6><?php echo $t->password; ?></h6></td></tr>
                                    <tr><th><h6 class="green-text">Test Code:</h6></th><td><h6><?php echo $t->code; ?></h6></td></tr>
                                    <tr><th><h6 class="green-text">Room No:</h6></th><td><h6><?php echo $t->room; ?></h6></td></tr>
                                    <tr><th><h6 class="green-text">Computer No:</h6></th><td><h6><?php echo $t->computer; ?></h6></td></tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col l6">
                                <table class="table responsive-table">
                                    <tr><th><h6 class="green-text">Supervisor:</h6></th><td><h6><?php echo $t->supervisor; ?></h6></td></tr>
                                    <tr><th><h6 class="green-text">Signature:</h6></th><td><h6>.........................</h6></td></tr>
                                </table>
                            </div>
                            <div class="col l6">
                                <table class="table responsive-table">
                                    <tr><th><h6 class="green-text">Counselor:</h6></th><td><h6><?php echo $t->counselor; ?></h6></td></tr>
                                    <tr><th><h6 class="green-text">Signature:</h6></th><td><h6>.........................</h6></td></tr>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12 center-align">
                            <input type="button" name="submit" class="btn green" value="PRINT" onclick="printTicket()">
                        </div>
                    </div>
            </div>
</div>
<?php $this->load->view('dashboard/footer'); ?>
<script type="application/javascript">

    function printTicket() {
        var prtContent = document.getElementById("printTicket");
        var prtCss = new String('<link href="<?php echo base_url();?>plugins/css/materialize.min.css" rel="stylesheet">');
        window.document.body.innerHTML=prtCss + prtContent.innerHTML;
        window.focus();
        window.print();
        window.close();
    }
</script>
</body>
</html>