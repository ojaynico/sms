<?php

error_reporting(0);
session_start();
include_once 'oesdb.php';
if(!isset($_SESSION['stduname'])) {
    $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
}
else if(isset($_REQUEST['logout']))
{

    unset($_SESSION['stduname']);
    header('Location: index.php');

}
else if(isset($_REQUEST['dashboard'])){

     header('Location: stdwelcome.php');

}
if(isset($_SESSION['starttime']))
{
    unset($_SESSION['starttime']);
    unset($_SESSION['endtime']);
    unset($_SESSION['tqn']);
    unset($_SESSION['qn']);
    unset($_SESSION['duration']);
    executeQuery("update studenttest set status='over' where testid=".$_SESSION['testid']." and stdid=".$_SESSION['stdid'].";");
}
?>

<html>
  <head>
    <title>OES-Test Acknowledgement</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="validate.js" ></script>
    </head>
  <body style="background-image: url('images/slogo2.jpg'); background-size: contain">
       <?php

        if($_GLOBALS['message']) {
            echo "<div class=\"text-danger\">".$_GLOBALS['message']."</div>";
        }
        ?>
       <center>
           <div class="container">
               <div class="row">
                   <h1 class="text-center text-success">SITM Online Examination System</h1>
               </div>
           </div>
       </center>
       <hr/>

      <div id="container">
           <form id="editprofile" action="editprofile.php" method="post">
          <div class="row">
              <div class="span1"></div>
              <div class="span6">
                        <?php if(isset($_SESSION['stduname'])) {
                         ?>
                        <input type="submit" value="LogOut" name="logout" class="btn-danger" title="Log Out"/>
                        <input type="submit" value="Home" name="dashboard" class="btn-info" title="Dash Board"/>
              </div>
              <div class="span1"></div>
          </div>
               <div class="container">
      <div class="page center">
          <h4>Your answers are Successfully Submitted. Thanks for doing the exam. </h4>
          <?php
                        }
          ?>
      </div>
               </div>
           </form>
      </div>
  </body>
</html>

