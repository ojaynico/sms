<?php

error_reporting(0);
session_start();
include_once '../oesdb.php';

if(!isset($_SESSION['admname'])) {
    $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
}

else if(isset($_REQUEST['dashboard'])) {

    header('Location: admwelcome.php');

}
else if(isset($_REQUEST['back'])) {
    header('Location: rsltmng.php');
}

?>
<html>
<head>
    <title>OES-Manage Results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="../css/main.css" rel="stylesheet" type="text/css"/>
</head>
<body style="background-image: url('../images/slogo2.jpg'); background-size: contain">
<div class="container">
    <div class="page">
<?php
$result=executeQuery("select t.testname,DATE_FORMAT(t.testfrom,'%d %M %Y') as fromdate,DATE_FORMAT(t.testto,'%d %M %Y %H:%i:%S') as todate,sub.subname,IFNULL((select sum(marks) from question where testid=".$_REQUEST['testid']."),0) as maxmarks from test as t, subject as sub where sub.subid=t.subid and t.testid=".$_REQUEST['testid'].";") ;
if(mysql_num_rows($result)!=0) {
$r=mysql_fetch_array($result);

$result1=executeQuery("select s.stdname,s.stduidno,IFNULL((select sum(q.marks) from studentquestion as sq,question as q where q.qnid=sq.qnid and sq.testid=".$_REQUEST['testid']." and sq.stdid=st.stdid and sq.stdanswer=q.correctanswer),0) as om from studenttest as st, student as s where s.stdid=st.stdid and st.testid=".$_REQUEST['testid'].";" );

if(mysql_num_rows($result1)==0) {
echo"<h3 style=\"color:#0000cc;text-align:center;\">No Students Yet Attempted this Test!</h3>";
}
else {
?>
<br/>
<table class="table table-bordered table-hover">
    <thead>
    <tr class="btn-info">
        <th>Student Name</th>
        <th>Student ID</th>
        <th>Obtained Marks</th>
        <th>Result(%)</th>
    </tr>
    </thead>
    <?php
    while($r1=mysql_fetch_array($result1)) {
        $marks = (($r1['om']/$r['maxmarks'])*100);
        if ($marks <= 50) {
            ?>
            <tr style="color: black">
                <td><?php echo htmlspecialchars_decode($r1['stdname'], ENT_QUOTES); ?></td>
                <td><?php echo htmlspecialchars_decode($r1['stduidno'], ENT_QUOTES); ?></td>
                <td><?php echo $r1['om']; ?></td>
                <td><?php echo (($r1['om'] / $r['maxmarks']) * 100) . " %"; ?></td>
            </tr>
            <?php
        }
    }
    }
    }
    else {
        echo"<h3 style=\"color:#0000cc;text-align:center;\">Sorry. No Student has a retake.</h3>";
    }
    ?>
</table>
</div></div>
</body>
</html>