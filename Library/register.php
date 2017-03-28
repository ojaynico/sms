<html>
    <head>
        <title>Create an Account</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/general.css"/>
        <link rel="stylesheet" type="text/css" href="css/register.css"/>
    </head>
    <body>
    <center>
        <header>
            <img src="images/logo.png" class="logo"/>
            <div class="heading">
                SITM E-Library
            </div>
            <div style="font-size: 20pt; padding-top: 30px; color: blue; ">
                <a href="index.php" style="background-color: green; color: white; border-radius: 10%; font-size: 30pt">Login</a>
            </div>
        </header>
    </center>
    <div>
        <?php

include 'php/connection.php';

$register = ['register'];

if ($register) {

if (isset($_POST['f_name']) && isset($_POST['l_name']) && isset($_POST['u_name']) && isset($_POST['pass']) && isset($_POST['pass_two']) && isset($_POST['question']) && isset($_POST['answer'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $u_name = $_POST['u_name'];
    $pass = $_POST['pass'];
    $pass_two = $_POST['pass_two'];
    $passhash = md5($pass);
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    
    if (!empty($f_name) && !empty($l_name) && !empty($u_name) && !empty($pass) && !empty($pass_two) && !empty($question) && !empty($answer)) {
        if ($pass != $pass_two) {
            echo 'Passwords do not match!';
        } else {
            $query = "SELECT `USER_NAME` FROM `users` WHERE `USER_NAME`='$u_name'";
            $query_run = mysql_query($query);
            
            if (mysql_num_rows($query_run) == 1) {
                echo 'The username '. $u_name . ' already exists.';
            } else {
                $queryadd = "INSERT INTO `users` VALUES ('', '$u_name', '$f_name', '$l_name', '$passhash', '$question', '$answer')";
                $query_runadd = mysql_query($queryadd);
                if ($query_runadd) {
                    echo "<script>alert('Your are Succesfully Registered.')</script>";
                    
                } else {
                    echo "<script>alert('Registration not succesful! Try again later.')</script>";
                } 
            }
            
        }
        
    } else {
        echo "<script>alert('All Fields are required!')</script>";
    }
}
}

?>
    </div>
        <section>
            <div class="form">
                <h1>Register User</h1>
            <form action="" method="POST">
                First Name<br/><input type="text" name="f_name" class="input"/><br/><br/>
                Last Name<br/><input type="text" name="l_name"  class="input"/><br/><br/>
                User Name<br/><input type="text" name="u_name"  class="input"/><br/><br/>
                Password<br/><input type="password" name="pass"  class="input"/><br/><br/>
                Retype Password<br/><input type="password" name="pass_two"  class="input"/><br/><br/>
                <p>Provide Security Question and Answer<br/> below incase you forget your password.</p>
                Question<br/><input type="text" name="question"  class="input"/><br/><br/>
                Answer<br/><input type="text" name="answer"  class="input"/><br/><br/>
                <input type="submit" value="Submit" name="register" class="submit"/>
            </form>
        </div>
        </section>
    <center>
        <footer>
            <div style="float: left;">
                E-mail: info@saipali.education
            </div>
            <div style="float: right">
                Phone: +256785294797
            </div>
            <p>&copy; 2016 SITM</p>
        </footer>
    </center>
        
    </body>
</html>

