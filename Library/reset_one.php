<html>
    <head>
        <title>Password Reset</title>
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
        <br/><br/>
        <div>
            <form action="" method="POST">
                Username<br/><input type="text" name="user_name" class="input"/><br/><br/>
                <input type="submit" value="OK" name="ubt" class="submit"/>
            </form>

            <?php
            include 'php/connection.php';

            $ubt = ['ubt'];

            if ($ubt) {
                if (isset($_POST['user_name'])) {
                    $user_name = $_POST['user_name'];
                    if (!empty($user_name)) {
                        $query = "SELECT `ID` FROM `users` WHERE `USER_NAME` = '$user_name'";

                        if ($query_run = mysql_query($query)) {
                            $query_num_rows = mysql_num_rows($query_run);

                            if ($query_num_rows == 0) {
                                echo 'Invalid Username';
                            } else if ($query_num_rows == 1) {
                                $user_id = mysql_result($query_run, 0, 'ID');
                                $_SESSION['us_id'] = $user_id;
                                echo "<p>Username: " . $user_name . "</p>";
                                header('Location: reset_two.php?id=' . $user_id . '');
                            }
                        } else {
                            
                        }
                    }
                } else {
                    echo 'Please Enter Username!';
                }
            } else {
                
            }
            ?>

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
