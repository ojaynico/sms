<?php


error_reporting(0);
session_start();
        if(!isset($_SESSION['stduname'])){
            $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
        }
        else if(isset($_REQUEST['logout'])){
                unset($_SESSION['stduname']);
            $_GLOBALS['message']="You are Loggged Out Successfully.";
            header('Location: index.php');
        }
?>
<html>
    <head>
        <title>OES-DashBoard</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    </head>
    <body style="background-image: url('images/slogo2.jpg'); background-size: contain">
        <?php
       
        if($_GLOBALS['message']) {
            echo "<div class=\"text-danger\">".$_GLOBALS['message']."</div>";
        }
        ?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <h1 class="text-center text-success">SITM Online Examination System</h1>
                </div>
            </div>
        </div>
        <hr/>

        <div id="container">
            <div class="menubar">
                <form name="stdwelcome" action="stdwelcome.php" method="post">
                    <div class="row">
                        <div class="span1"></div>
                        <div class="span6">
                        <?php if(isset($_SESSION['stduname'])){ ?>
                        <input type="submit" value="LogOut" name="logout" class="btn-danger" title="Log Out"/>
                        <?php } ?>
                        </div>
                        <div class="span1"></div>
                    </div>
                </form>
            </div>

            <div class="section">
                <div class="container">
                    <div class="row">
                        <h1 class="text-center text-success">Welcome</h1>
                        <h4 class="text-center text-error text-uppercase"><?php echo $_SESSION['studentname']; ?></h4>
                    </div>
                </div>
            </div>

            <br/><br/>

            <div>
                <?php if(isset($_SESSION['stduname'])){ ?>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="stdtest.php"><button class="btn-large btn-block btn-info">Multiple Choice</button></a><br/><br/>
                        <a href="theoryexam/student.php"><button class="btn-large btn-block btn-primary">Theory Exam</button></a><br/><br/>
                        <a href="resumetest.php"><button class="btn-large btn-block btn-warning">Resume Test</button></a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <?php } ?>
            </div>

      </div>
  </body>
</html>
