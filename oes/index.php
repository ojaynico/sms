<?php

error_reporting(0);
session_start();
include_once 'oesdb.php';

if ($_REQUEST['stdsubmit']) {

    $result = executeQuery("select *,DECODE(stdpassword,'oespass') as std from student where stduname='" . htmlspecialchars($_REQUEST['name'], ENT_QUOTES) . "' and stdpassword=ENCODE('" . htmlspecialchars($_REQUEST['password'], ENT_QUOTES) . "','oespass')");
    if (mysql_num_rows($result) > 0) {

        $r = mysql_fetch_array($result);
        if (strcmp(htmlspecialchars_decode($r['std'], ENT_QUOTES), (htmlspecialchars($_REQUEST['password'], ENT_QUOTES))) == 0) {
            $_SESSION['stduname'] = htmlspecialchars_decode($r['stduname'], ENT_QUOTES);
            $_SESSION['stdid'] = $r['stdid'];
            $_SESSION['course'] = $r['course'];
            $_SESSION['semester'] = $r['semester'];
            $_SESSION['studentname'] = $r['stdname'];
            unset($_GLOBALS['message']);
            header('Location: stdwelcome.php');
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
    <title>Online Examination System</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php

if ($_GLOBALS['message']) {
    echo "<div class=\"text-danger\">" . $_GLOBALS['message'] . "</div>";
}
?>
<?php if (isset($_SESSION['stduname'])) {
    header('Location: stdwelcome.php');
} else {

    ?>

<?php } ?>

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
            <img src="images/logo.png" height="110" width="100" alt="The SITM Logo"/>
            <h2 class="text-center">Student Login</h2>
            <hr/>

            <form class="text-center" action="" method="post">
                <div class="form-group">
                    <label class="control-label" for="Username">Student ID Number</label>
                    <input type="text" tabindex="1" class="form-control" name="name" id="Username" value=""/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="Password">Password</label>
                    <input type="password" tabindex="2" class="form-control" name="password" id="Password" value=""/>
                </div>
                <input type="submit" tabindex="3" value="Login" name="stdsubmit" class="btn btn-danger btn-block" />
            </form>

        </div>
        <div class="col-md-4"></div>
    </div>
</center>
    </div>
</div>
</body>
</html>
