<br/><br/>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">User Login</h3>
                </div>

                <center>
                <span style="color: red" class="text-center">
                <?php if(isset($error)){ foreach($error as $e){ echo $e; }} ?>
                </span>
                </center>

                <div class="panel-body">
                    <form role="form" method="POST" action="<?php echo base_url(); ?>login/loginMe">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="email" type="email" autofocus>
                                <span style="color: red"><?php echo form_error('email'); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                <span style="color: red"><?php if(form_error('password')) echo form_error('password'); ?></span>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <button class="btn btn-lg btn-success btn-block" type="submit">sign in</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>