<?php

error_reporting(0);

session_start();
        if(!isset($_SESSION['admname'])){
            $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
        }
        else if(isset($_REQUEST['logout'])){
           unset($_SESSION['admname']);
            $_GLOBALS['message']="You are Loggged Out Successfully.";
            header('Location: index.php');
        }
?>

<html>
    <head>
        <title>Admin-DashBoard</title>
        <link rel="icon"
              type="image/ico"
              href="../images/admin.ico" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link href="../css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background-image: url('../images/slogo2.jpg'); background-size: contain">
        <?php

        if(isset($_GLOBALS['message'])) {
            echo "<div class=\"btn-danger\">".$_GLOBALS['message']."</div>";
        }
        ?>
        <center>
            <div class="container">
                <div class="row">
                    <h1 class="text-center">SITM Online Examination System</h1>
                </div>
            </div>
        </center>
<div class="center">
    <h3><img src="../images/admin2.ico"/></h3>
       <h2>Admin-Dashboard</h2>
    <h3><?php echo $_SESSION['role'];?> </h3>
</div>
            <div class="container">
                <div class="row">
                    <div class="span3"></div>
                    <div class="span6">
                <?php if(isset($_SESSION['admname'])){ ?>
                        <a href="usermng.php" ><button class="span5 btn-info btn-large">Manage Users</button></a><br/><br/><br/><br/>
                        <a href="submng.php" ><button class="span5 btn-success btn-large">Manage Subjects</button></a><br/><br/><br/><br/>
                        <a href="rsltmng.php" ><button class="span5 btn-large" style="background-color: #7c1212; color: white; border-color: brown">Manage Test Results</button></a><br/><br/><br/><br/>
                        <a href="testmng.php?forpq=true" ><button class="span5 btn-warning btn-large">Prepare Multiple Choice Exam</button></a><br/><br/><br/><br/>
                        <a href="../theoryexam/index.php" ><button class="span5 btn-large" style="background-color: purple; color: white; border-color: rebeccapurple">Prepare Theory Exam</button></a><br/><br/><br/><br/>
                        <a href="testmng.php"><button class="span5 btn-primary btn-large">Manage Tests</button></a><br/><br/><br/><br/>
                    <?php if ($_SESSION['role'] == "admin"){ ?>
                        <a href="admins.php"><button class="span5 btn-info btn-large">Modify Admins</button></a><br/><br/><br/><br/>
                <?php }}?>
                        <center>
                        <form name="admwelcome" action="admwelcome.php" method="post" class="">
                                <?php if(isset($_SESSION['admname'])){ ?>
                                    <button type="submit" name="logout" class="btn-danger btn-large center" title="Log Out">LogOut</button>
                                <?php } ?>
                        </form>
                        </center>
                    </div>
                    <div class="span3"></div>
                </div>
            </div>
  </body>
</html>
