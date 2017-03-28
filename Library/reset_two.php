<html>
    <head>
        <title>Reset step two</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/general.css"/>
        <link rel="stylesheet" type="text/css" href="css/reset_p.css"/>
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
    <div style="height: 20px;"></div>
    <section>
        <div>
            <?php
            include 'php/connection.php';

            $query = "SELECT * FROM users WHERE ID = $_GET[id]";
            $result = mysql_query($query);
            $user = mysql_fetch_array($result);

            echo "<p style=\"color:red\"><b>Hello " . $user['USER_NAME'] . "</b></p>";
            echo 'Answer the security question below and reset your password.<br/><br/>';
            echo 'Question: ' . $user['QUESTION'] . '<br/>';

            if (isset($_POST['answer']) && isset($_POST['new_pass']) && isset($_POST['new_pass2'])) {
                $answer = $_POST['answer'];
                $new_pass = $_POST['new_pass'];
                $new_pass2 = $_POST['new_pass2'];
                $new_passhash = md5($new_pass);

                if (!empty($answer) && !empty($new_pass) && !empty($new_pass2)) {
                    if ($answer != $user['ANSWER']) {
                        echo "<p style=\"color:red\">The answer you provided is wrong.</p>";
                    } else {
                        if ($new_pass != $new_pass2) {
                            echo "<p style=\"color:red\">The passwords you entered dont match. Try again.</p>";
                        } else {
                            $id = $user['ID'];
                            $update = "UPDATE `users` SET `PASSWORD` = '$new_passhash' WHERE `ID`='$id'";
                            if ($run_s = mysql_query($update)) {
                                echo "<p style=\"color:red\">Password Changed Succesfully</p>";
                            } else {
                                echo "<p style=\"color:red\">Password reset failed. Please try again later.</p>";
                            }
                        }
                    }
                } else {
                    echo "<p style=\"color:red\">All Fields are required.</p>";
                }
            }
            ?>
            <form action="" method="POST">
                Answer<br/><input type="text" name="answer" class="input"/><br/><br/>
                New Password<br/><input type="password" name="new_pass" class="input"/><br/><br/>
                Retype New Password<br/><input type="password" name="new_pass2" class="input"/><br/><br/>
                <input type="submit" value="SUBMIT" name="submit" class="submit"/>
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

