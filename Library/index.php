<html>
    <head>
        <title>E Library</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/general.css"/>
        <link rel="stylesheet" type="text/css" href="css/login.css"/>
    </head>
    <body>
    <center>
        <header>
            <img src="images/logo.png" class="logo"/>
            <div class="heading">
                SITM E-Library
            </div>
            <div style="font-size: 20pt; padding-top: 30px; color: blue;">
                Have no Account!!!    &nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.sitm.com:80/oes/">OnLine Examination</a><br/>
                <a href="register.php" style="background-color: green; color: white; border-radius: 10%; font-size: 20pt;">Sign Up</a><br/><br/>
<a href="ftp://www.sitm.com" style="background-color: green; color: white; border-radius: 10%; font-size: 20pt;">Softwares Download</a>

            </div>
        </header>

        <div style="background-color: red; width: 80%;">
            <?php
            
            include 'php/connection.php';

            $login_user = ['login_user'];
            $login_admin = ['login_admin'];

//Login User
            if ($login_user) {
                session_start();
                if (isset($_POST['user_uname']) && isset($_POST['user_pass'])) {
                    $username = $_POST['user_uname'];
                    $userpass1 = $_POST['user_pass'];
                    $userpass = md5($userpass1);

                    if (!empty($username) && !empty($userpass)) {
                        $query = "SELECT `ID` FROM `users` WHERE `USER_NAME`='$username' AND `PASSWORD`='$userpass'";

                        if ($query_run = mysql_query($query)) {
                            $query_num_rows = mysql_num_rows($query_run);

                            if ($query_num_rows == 0) {
                                echo "<h1>Invalid username or password</h1>";
                            } else if ($query_num_rows == 1) {
                                $user_id = mysql_result($query_run, 0, 'ID');
                                $_SESSION['user_id'] = $user_id;
                                header('Location: home.php');
                            }
                        } else {
                            
                        }
                    } else {
                        echo "<h1>Please enter Username and Password</h1>";
                    }
                }
            }

//Login admin
            if ($login_admin) {
                if (isset($_POST['admin_uname']) && isset($_POST['admin_pass'])) {
                    $adminname = $_POST['admin_uname'];
                    $adminpass1 = $_POST['admin_pass'];
                    $adminpass = md5($adminpass1);

                    if (!empty($adminname) && !empty($adminpass)) {
                        $query = "SELECT `ID` FROM `administrators` WHERE `USER_NAME`='$adminname' AND `PASSWORD`='$adminpass'";

                        if ($query_run = mysql_query($query)) {
                            $query_num_rows = mysql_num_rows($query_run);

                            if ($query_num_rows == 0) {
                                echo "<h1>Invalid username or password</h1>";
                            } else if ($query_num_rows == 1) {
                                $admin_id = mysql_result($query_run, 0, 'ID');
                                $_SESSION['admin_id'] = $admin_id;
                                header('Location: admin.php');
                            }
                        } else {
                            
                        }
                    } else {
                        echo "<h1>Please enter Username and Password</h1>";
                    }
                }
            }
            ?>
        </div>

        <section>
            <div class="stlogin" style="float: left; padding-left: 10px; width: 250px; height: 100%; background-image: url(images/backform.png)">
                <h1>Student Login</h1>
                <form action="" method="POST">
                    Username<br/><input type="text" name="user_uname" class="input"/><br/><br/>
                    Password<br/><input type="password" name="user_pass" class="input"/><br/><br/>
                    <input type="submit" value="Login" name="login_user" class="login"/>
                </form>
                <a href="reset_one.php" style="color: white;">Forgotten password!</a>
            </div>



            <div class="adlogin" style="float: right; padding-right: 10px; width: 250px; height: 100%; background-image: url(images/backform.png)">
                <h1>Administrator Login</h1>
                <form action="" method="POST">
                    Username<br/><input type="text" name="admin_uname" class="input"/><br/><br/>
                    Password<br/><input type="password" name="admin_pass" class="input"/><br/><br/>
                    <input type="submit" value="Login" name="login_admin" class="login"/>
                </form>
            </div>
        </section>
    </center>
    <div style="background-color: white; width: 100%;">
        <br/>
        <div style="width: 80%; padding-left: 10%; font-size: 15pt; color: #5c5c5c;">
            Welcome to SITM E-Library which is an online reading platform with a Variety of
            books in the fields of Software Engineering, Networking and Graphics. All available for 
            free reading to a user with an account on this E-Library site. We are grateful to offer 
            such a fast and easier way of reading and accessing books and we hope you utilize everything 
            we have offered to you through this platform.<br/>
            <center><b> Have a nice experience.... </b></center>
            <br/>
        </div>
    </div>
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
