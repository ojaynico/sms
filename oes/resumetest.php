<?php

error_reporting(0);
session_start();
include_once 'oesdb.php';
if(!isset($_SESSION['stduname'])) {
    $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
}
else if(isset($_REQUEST['logout'])) {
   
        unset($_SESSION['stduname']);
        header('Location: index.php');

    }
    else if(isset($_REQUEST['dashboard'])) {
        
            header('Location: stdwelcome.php');

        }
        else if(isset($_REQUEST['resume'])) {

                if($r=mysql_fetch_array($result=executeQuery("select testname from test where testid=".$_REQUEST['resume'].";"))) {
                    $_SESSION['testname']=htmlspecialchars_decode($r['testname'],ENT_QUOTES);
                    $_SESSION['testid']=$_REQUEST['resume'];
                }
            }
            else if(isset($_REQUEST['resumetest'])) {

                    if(!empty($_REQUEST['tc'])) {
                        $result=executeQuery("select DECODE(testcode,'oespass') as tcode from test where testid=".$_SESSION['testid'].";");

                        if($r=mysql_fetch_array($result)) {
                            if(strcmp(htmlspecialchars_decode($r['tcode'],ENT_QUOTES),htmlspecialchars($_REQUEST['tc'],ENT_QUOTES))!=0) {
                                $display=true;
                                $_GLOBALS['message']="You have entered an Invalid Test Code.Try again.";
                            }
                            else {


                                $result=executeQuery("select totalquestions,duration from test where testid=".$_SESSION['testid'].";");
                                $r=mysql_fetch_array($result);
                                $_SESSION['tqn']=htmlspecialchars_decode($r['totalquestions'],ENT_QUOTES);
                                $_SESSION['duration']=htmlspecialchars_decode($r['duration'],ENT_QUOTES);
                                $result=executeQuery("select DATE_FORMAT(starttime,'%Y-%m-%d %H:%i:%s') as startt,DATE_FORMAT(endtime,'%Y-%m-%d %H:%i:%s') as endt from studenttest where testid=".$_SESSION['testid']." and stdid=".$_SESSION['stdid'].";");
                                $r=mysql_fetch_array($result);
                                $_SESSION['starttime']=$r['startt'];
                                $_SESSION['endtime']=$r['endt'];
                                $_SESSION['qn']=1;
                                header('Location: testconducter.php');
                            }

                        }
                        else {
                            $display=true;
                            $_GLOBALS['message']="You have entered an Invalid Test Code.Try again.";
                        }
                    }
                    else {
                        $display=true;
                        $_GLOBALS['message']="Enter the Test Code First!";
                    }
                }


?>

<html>
    <head>
        <title>OES-Resume Test</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="CACHE-CONTROL" content="NO-CACHE"/>
        <meta http-equiv="PRAGMA" content="NO-CACHE"/>
        <meta name="ROBOTS" content="NONE"/>

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
            <form id="summary" action="resumetest.php" method="post">
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
                <div class="page">

    <?php
    if(isset($_REQUEST['resume'])) {
        echo "<div style=\"text-align:center;\">What is the Code of ".$_SESSION['testname']." ? </div>";
    }
    else {
        echo "<div style=\"text-align:center;\">Tests to be Resumed</div>";
    }
    ?>
                        <?php

                        if(isset($_REQUEST['resume'])|| $display==true) {
                            ?>
                    <div class="row center text-warning">
                        <div class="span4"></div>
                        <div class="span4">
                    <ul class="unstyled">
                        <li>
                            <li><h5>Enter Test Code</h5></li>
                            <li><input type="text" name="tc" value="" /></li>
                            <li><div class="help"><b>Note:</b><br/>Quickly enter Test Code and<br/> press Resume button to utilize<br/> Remaining time.</div></li>
                        </li>
                        <li>
                                <input type="submit" tabindex="3" value="Resume Test" name="resumetest" class="btn-info" />
                        </li>
                    </ul>
                        </div>
                        <div class="span4"></div>
                        </div>


    <?php
    }
    else {

        $result=executeQuery("select t.testid,t.testname,DATE_FORMAT(st.starttime,'%d %M %Y %H:%i:%s') as startt,sub.subname as sname,TIMEDIFF(st.endtime,CURRENT_TIMESTAMP) as remainingtime from subject as sub,studenttest as st,test as t where sub.subid=t.subid and t.testid=st.testid and st.stdid=".$_SESSION['stdid']." and st.status='inprogress' order by st.starttime desc;");
        if(mysql_num_rows($result)==0) {
            echo"<h3 style=\"text-align:center;\">There are no incomplete exams, that needs to be resumed! Please Try Again..!</h3>";
        }
        else {

            ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="btn-info">
                            <th>Date and Time</th>
                            <th>Test</th>
                            <th>Subject</th>
                            <th>Remaining Time</th>
                            <th>Resume</th>
                        </tr>
                        </thead>
                                <?php
                                while($r=mysql_fetch_array($result)) {
                                    $i=$i+1;
                                    if($r['remainingtime']<0) {
                }

                if($i%2==0) {
                    echo "<tr style='color:black'>";
                                        }
                                        else { echo "<tr style='color: black'>";}
                                        echo "<td>".$r['startt']."</td><td>".htmlspecialchars_decode($r['testname'],ENT_QUOTES)."</td><td>".htmlspecialchars_decode($r['sname'],ENT_QUOTES)."</td><td>".$r['remainingtime']."</td>";
                                        echo"<td class=\"tddata\"><a title=\"Resume\" href=\"resumetest.php?resume=".$r['testid']."\">Resume</a></td></tr>";
                                    }

                                    ?>

                    </table>
                                <?php
                                }

                            }

                            closedb();
                        }
                        ?>
                        
                </div>
</div>
            </form>
      </div>
  </body>
</html>

