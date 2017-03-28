<?php

error_reporting(0);
session_start();
include_once '../oesdb.php';

if (isset($_REQUEST['admsubmit'])) {
    $result = executeQuery("select * from adminlogin where admname='" . htmlspecialchars($_REQUEST['name'], ENT_QUOTES) . "' and admpassword='" . md5(htmlspecialchars($_REQUEST['password'], ENT_QUOTES)) . "'");

    if (mysql_num_rows($result) > 0) {
        $r = mysql_fetch_array($result);
        if (strcmp($r['admpassword'], md5(htmlspecialchars($_REQUEST['password'], ENT_QUOTES))) == 0) {
            $_SESSION['admname'] = htmlspecialchars_decode($r['admname'], ENT_QUOTES);
            $_SESSION['role'] = htmlspecialchars_decode($r['role'], ENT_QUOTES);
            unset($_GLOBALS['message']);
            $q = executeQuery("SELECT * FROM adminlogin WHERE admname='" . htmlspecialchars($_REQUEST['name'], ENT_QUOTES) . "'");
            $r = mysql_fetch_array($q);
            $role = $r['role'];


            if ($role == "admin") {
                header('Location: admwelcome.php?role=' . $role);
            } else if ($role == "SE") {
                header('Location: admwelcome.php?role=' . $role);
            } else if ($role == "IMS") {
                header('Location: admwelcome.php?role=' . $role);
            } else if ($role == "VFX") {
                header('Location: admwelcome.php?role=' . $role);
            } else if ($role == "CERTIFICATE") {
                header('Location: admwelcome.php?role=' . $role);
            } else if ($role == "SCHOLARSHIP") {
                header('Location: admwelcome.php?role=' . $role);
            }

        } else {
            $_GLOBALS['message'] = "Check Your user name and Password.";
        }

    } else {
        $_GLOBALS['message'] = "Check Your user name and Password.";

    }
    closedb();
}
?>

<html>
<head>
    <title>Administrator Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php

if (isset($_GLOBALS['message'])) {
    echo "<div class=\"btn-danger\">" . $_GLOBALS['message'] . "</div>";
}
?>
<div class="section">
    <div class="container">
        <div class="row">
            <h1 class="text-center text-success">SITM Online Examination System</h1>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <center>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                        <hr/>
                            <img src="../images/logo.png" height="110" width="100" alt="The SITM Logo"/>
                        <h2 class="text-center">Admin Login</h2>
                <hr/>
                        <form role="form" class="text-center">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputUsername">Admin Username</label>
                                <input name="name" class="form-control" id="exampleInputUsername"
                                       placeholder="Enter username" type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputPassword1">Admin Password</label>
                                <input name="password" class="form-control" id="exampleInputPassword1"
                                       placeholder="Password" type="password">
                            </div>
                            <button name="admsubmit" type="submit" class="btn btn-danger btn-block">Login</button>
                        </form>
            </div>
            <div class="col-md-4"></div>
        </div>
        </center>
    </div>
</div>

</body>
</html>
