<?php

error_reporting(0);
session_start();
include_once '../oesdb.php';

if(!isset($_SESSION['admname'])) {
    $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
}
else if(isset($_REQUEST['logout'])) {
        unset($_SESSION['admname']);
        header('Location: index.php');
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
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../css/datatables.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background-image: url('../images/slogo2.jpg'); background-size: contain">
        <?php

        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
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
            <form name="rsltmng" action="rsltmng.php" method="post">
                <div class="row">
                    <div class="span1"></div>
                    <div class="span6">
                        <?php if(isset($_SESSION['admname'])) {
                      
                            ?>
                        <input type="submit" id="noprint" value="LogOut" name="logout" class="btn-danger" title="Log Out"/>
                            <?php  if(isset($_REQUEST['testid'])) { ?>
                        <input type="submit" id="noprint" value="Back" name="back" class="btn-info" title="Manage Results"/>
                                <a href="retake.php?testid=<?php echo $_REQUEST['testid'];?>"><input type="button" value="Retakes" class="btn-info" title="Retakes"></a>
                            <?php }else { ?>
                        <input type="submit" value="Home" name="dashboard" class="btn-info" title="Dash Board"/>
                            <?php } ?>
                    </div>
                    <div class="span8 right">

                    </div>
                </div>
                <div class="container">
                <div class="page">
                        <?php
                        if(isset($_REQUEST['testid'])) {
                        $student = executeQuery("select distinct(stdid) from studentquestion where testid=".$_REQUEST['testid']);
                        ?>
                    <input type="hidden" id="testid" value="<?php echo $_REQUEST['testid']; ?>">
                    <div class="ibox-content">
                        <div class="table-responsive">
                    <table class="table table-bordered table-hover dataTables-example">
                        <thead>
                        <tr class="btn-info">
                            <th></th>
                            <th>Student Name</th>
                            <th>Student ID</th>
                            <th>Obtained Marks</th>
                            <th>Result(%)</th>
                        </tr>
                        </thead>
                        <?php
                        while ($s = mysql_fetch_array($student)){
                            $m = 0;
                            $query = executeQuery("select * from studentquestion where testid=".$_REQUEST['testid']." and stdid=".$s['stdid']);
                            while ($q = mysql_fetch_array($query)){
                                $query2 = executeQuery("select * from question where testid=".$_REQUEST['testid']." and qnid=".$q['qnid']);
                                while ($q2 = mysql_fetch_array($query2)){
                                    if ($q['stdanswer'] == $q2['correctanswer']){
                                        $m += $q2['marks'];
                                    }
                                }
                            }

                            $tdata = executeQuery("select * from student where stdid=".$s['stdid']);
                            $tmarks = executeQuery("select sum(marks) as s from question where testid=".$_REQUEST['testid']);
                            while ($tm = mysql_fetch_assoc($tmarks)){
                                while ($td = mysql_fetch_array($tdata)){
                                    $sem = $td['semester'];
                                    $sname = $td['stdname'];
                                    $sidno = $td['stduidno'];
                                    $tmarks = (($m/$tm['s'])*100);
                                    ?>
                                    <tr style="color: black">
                                        <td></td>
                                        <td><?php echo $sname; ?></td>
                                        <td><?php echo $sidno; ?></td>
                                        <td><?php echo $m; ?></td>
                                        <td><?php echo round($tmarks)."%"; ?></td>
                                    </tr>
                                <?php }}?>
                            <?php
                        }
                        echo "</table>";
                        echo "</div>";
                        echo "</div>";
                        }
                        else {

                            $result=executeQuery("select t.testid,t.testname,DATE_FORMAT(t.testfrom,'%d %M %Y') as fromdate,DATE_FORMAT(t.testto,'%d %M %Y %H:%i:%S') as todate,sub.subname,(select count(stdid) from studenttest where testid=t.testid) as attemptedstudents from test as t, subject as sub where sub.subid=t.subid;");
                            if(mysql_num_rows($result)==0) {
                                echo "<h3 style=\"color:#0000cc;text-align:center;\">No Tests Yet...!</h3>";
                            }
                            else {
                                $i=0;

                                ?>
                    <table class="table table-bordered table-hover dataTables-example">
                        <thead>
                        <tr style="background-color: dodgerblue">
                            <th>Test Name</th>
                            <th>Validity</th>
                            <th>Subject Name</th>
                            <th>Attempted Students</th>
                            <th>Details</th>
                        </tr>
                        </thead>
            <?php
                                    while($r=mysql_fetch_array($result)) {
                                        $i=$i+1;
                                        if($i%2==0) {
                                            echo "<tr style=\"color: black\">";
                                        }
                                        else { echo "<tr style='color: black'>";}
                                        $sid = $r['subname'];

                                        $check = executeQuery("SELECT * FROM subject WHERE subname='$sid'");
                                        $q = mysql_fetch_array($check);

                                        if ($q['course'] == $_SESSION['role']) {
                                            echo "<td>" . htmlspecialchars_decode($r['testname'], ENT_QUOTES) . "</td><td>" . $r['fromdate'] . " To " . $r['todate'] . " PM </td>"
                                                . "<td>" . htmlspecialchars_decode($r['subname'], ENT_QUOTES) . "</td><td>" . $r['attemptedstudents'] . "</td>"
                                                . "<td class=\"tddata\"><a title=\"Details\" href=\"rsltmng.php?testid=".$r['testid']."&subname=".htmlspecialchars_decode($r['subname'], ENT_QUOTES)."&semester=".$q['semester']."\">Details</a></td></tr>";
                                        } else{

                                        }
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
        <script src="../js/jquery-2.1.1.js"></script>
        <script src="../js/datatables.min.js"></script>
        <script>
            var header = "<center>SAIPALI INSTITUTE OF TECHNOLOGY AND MANAGEMENT" +
                "<br/><h3>Course Unit : <?php echo $_REQUEST['subname']; ?>" +
                "<br/>Semester <?php echo $_REQUEST['semester']; ?></h3></center>";

            $(document).ready(function(){
                $('.dataTables-example').DataTable({
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                        { extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'Results'},
                        {extend: 'pdf', title: 'Results'},

                        {extend: 'print',
                            customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');
                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            },
                            title: header
                        }
                    ]
                });

            });
        </script>
  </body>
</html>

