<?php
/**
 * Created by IntelliJ IDEA.
 * User: nick
 * Date: 11/21/16
 * Time: 12:07 PM
 */
?>
<html>
<head>
    <title>Role Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->load->view('dashboard/css'); ?>
</head>
<?php $this->load->view('dashboard/header'); ?>
<section id="content">
    <div class="inner-content">
        <div class="container">
            <button title="Back" class="btn-floating btn-small waves-effect waves-light green">
                <a href="<?php echo base_url(); ?>non_teacher/show"><i class="small material-icons">fast_rewind</i></a>
            </button>
            <center><h3>Add Role</h3>
                <div class="col l4"></div>
                <div class="col l4">
                    <form action="<?php echo base_url(); ?>dashboard/addUser" method="post">
                        <div class="row">
                            <div class="input-field">
                                <label for="email">Login Email</label>
                                <input class="validate" id="email" name="email" type="email"
                                       value="<?php echo set_value('email') ?>">
                                <span style="color: red"><?php echo form_error('email'); ?></span>
                            </div>
                            <div class="">
                                <label for="role">Role</label>
                                <select name="role" class="browser-default">
                                    <option value="" disabled selected>Choose a role</option>
                                    <?php foreach ($roles as $r) { ?>
                                        <option value="<?php echo $r->role; ?>"><?php echo $r->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="input-field">
                                <label for="password">Password</label>
                                <input class="validate" id="password" name="password" type="password">
                                <span style="color: red"><?php echo form_error('password'); ?></span>
                            </div>
                            <div class="input-field">
                                <label for="password2">Retype Password</label>
                                <input class="validate" id="password2" name="password2" type="password">
                                <span style="color: red"><?php echo form_error('password2'); ?></span>
                            </div>

                            <input type="hidden" name="userid" value="<?php
                            if (isset($_GET['id'])) {
                                echo $_GET['id'];
                            } else {
                                echo set_value('userid');
                            }
                            ?>">

                            <div class="text-center">
                                <button class="btn btn-lg btn-danger" type="reset">Cancel</button>
                                <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                            </div>
                            <br/>
                        </div>
                    </form>
                </div>
                <div class="col l4"></div>
            </center>
        </div>
    </div>
</section>
<?php $this->load->view('dashboard/footer'); ?>
<script type="application/javascript">
    $(document).ready(function () {
        $('select').material_select();
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
