<?php

error_reporting(0);
session_start();
include_once '../oesdb.php';

if (!isset($_SESSION['admname'])) {
    $_GLOBALS['message'] = "Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
} else if (isset($_REQUEST['logout'])) {

    unset($_SESSION['admname']);
    header('Location: index.php');
} else if (isset($_REQUEST['dashboard'])) {

    header('Location: admwelcome.php');
} else if (isset($_REQUEST['delete'])) {
    unset($_REQUEST['delete']);
    $hasvar = false;
    foreach ($_REQUEST as $variable) {
        if (is_numeric($variable)) {
            $hasvar = true;

            if (!@executeQuery("delete from test where testid=$variable")) {
                if (mysql_errno() == 1451)
                    $_GLOBALS['message'] = "Too Prevent accidental deletions, system will not allow propagated deletions.<br/><b>Help:</b> If you still want to delete this test, then first delete the questions that are associated with it.";
                else
                    $_GLOBALS['message'] = mysql_errno();
            }
        }
    }
    if (!isset($_GLOBALS['message']) && $hasvar == true)
        $_GLOBALS['message'] = "Selected Tests are successfully Deleted";
    else if (!$hasvar) {
        $_GLOBALS['message'] = "First Select the Tests to be Deleted.";
    }
} else if (isset($_REQUEST['savem'])) {

    $fromtime = $_REQUEST['testfrom'] . " " . date("H:i:s");
    $totime = $_REQUEST['testto'] . " 23:59:59";
    $_GLOBALS['message'] = strtotime($totime) . "  " . strtotime($fromtime) . "  " . time();
    if (strtotime($fromtime) > strtotime($totime) || strtotime($totime) < time())
        $_GLOBALS['message'] = "Start date of test is less than end date or last date of test is less than today's date.<br/>Therefore Nothing is Updated";
    else if (empty($_REQUEST['testname']) || empty($_REQUEST['testdesc']) || empty($_REQUEST['totalqn']) || empty($_REQUEST['duration']) || empty($_REQUEST['testfrom']) || empty($_REQUEST['testto']) || empty($_REQUEST['testcode'])) {
        $_GLOBALS['message'] = "Some of the required Fields are Empty.Therefore Nothing is Updated";
    } else {
        $query = "update test set testname='" . htmlspecialchars($_REQUEST['testname'], ENT_QUOTES) . "',testdesc='" . htmlspecialchars($_REQUEST['testdesc'], ENT_QUOTES) . "',subid=" . htmlspecialchars($_REQUEST['subject'], ENT_QUOTES) . ",testfrom='" . $fromtime . "',testto='" . $totime . "',duration=" . htmlspecialchars($_REQUEST['duration'], ENT_QUOTES) . ",totalquestions=" . htmlspecialchars($_REQUEST['totalqn'], ENT_QUOTES) . ",testcode=ENCODE('" . htmlspecialchars($_REQUEST['testcode'], ENT_QUOTES) . "','oespass') where testid=" . $_REQUEST['testid'] . ";";
        if (!@executeQuery($query)) {
            echo $fromtime;
            $_GLOBALS['message'] = mysql_error();
        }else {
            $_GLOBALS['message'] = "Test Information is Successfully Updated.";
        }
    }
    closedb();
} else if (isset($_REQUEST['savea'])) {

    $noerror = true;
    $fromtime = $_REQUEST['testfrom'] . " " . date("H:i:s");
    $totime = $_REQUEST['testto'] . " 23:59:59";
    if (strtotime($fromtime) > strtotime($totime) || strtotime($fromtime) < (time() - 3600)) {
        $noerror = false;
        $_GLOBALS['message'] = "Start date of test is either less than today's date or greater than last date of test.";
    } else if ((strtotime($totime) - strtotime($fromtime)) <= 3600 * 24) {
        $noerror = true;
        $_GLOBALS['message'] = "Note:<br/>The test is valid upto " . date(DATE_RFC850, strtotime($totime));
    }

    $result = executeQuery("select max(testid) as tst from test");
    $r = mysql_fetch_array($result);
    if (is_null($r['tst']))
        $newstd = 1;
    else
        $newstd = $r['tst'] + 1;

    if (strcmp($_REQUEST['subject'], "<Choose the Subject>") == 0 || empty($_REQUEST['testname']) || empty($_REQUEST['testdesc']) || empty($_REQUEST['totalqn']) || empty($_REQUEST['duration']) || empty($_REQUEST['testfrom']) || empty($_REQUEST['testto']) || empty($_REQUEST['testcode'])) {
        $_GLOBALS['message'] = "Some of the required Fields are Empty";
    } else if ($noerror) {
        $query = "insert into test values($newstd,'" . htmlspecialchars($_REQUEST['testname'], ENT_QUOTES) . "','" . htmlspecialchars($_REQUEST['testdesc'], ENT_QUOTES) . "',(select curDate()),(select curTime())," . htmlspecialchars($_REQUEST['subject'], ENT_QUOTES) . ",'" . $fromtime . "','" . $totime . "'," . htmlspecialchars($_REQUEST['duration'], ENT_QUOTES) . "," . htmlspecialchars($_REQUEST['totalqn'], ENT_QUOTES) . ",0,ENCODE('" . htmlspecialchars($_REQUEST['testcode'], ENT_QUOTES) . "','oespass'),NULL)";
        if (!@executeQuery($query)) {
            if (mysql_errno() == 1062)
                $_GLOBALS['message'] = "Given Test Name voilates some constraints, please try with some other name.";
            else
                $_GLOBALS['message'] = mysql_error();
        } else
            $_GLOBALS['message'] = $_GLOBALS['message'] . "<br/>Successfully New Test is Created.";
    }
    closedb();
} else if (isset($_REQUEST['manageqn'])) {

    $testname = $_REQUEST['manageqn'];
    $result = executeQuery("select testid from test where testname='" . htmlspecialchars($testname, ENT_QUOTES) . "';");

    if ($r = mysql_fetch_array($result)) {
        $_SESSION['testname'] = $testname;
        $_SESSION['testqn'] = $r['testid'];

        header('Location: prepqn.php');
    }
}
?>
<html>
<head>
    <title>OES-Manage Tests</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="../css/main.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" media="all" href="../calendar/jsDatePick.css"/>
    <script type="text/javascript" src="../calendar/jsDatePick.full.1.1.js"></script>
    <script type="text/javascript">
        window.onload = function () {
            new JsDatePick({
                useMode: 2,
                target: "testfrom"

            });

            new JsDatePick({
                useMode: 2,
                target: "testto"

            });
        };
    </script>

    <script type="text/javascript" src="../validate.js"></script>
</head>
<body style="background-image: url('../images/slogo2.jpg'); background-size: contain">
<?php
if ($_GLOBALS['message']) {
    echo "<div class=\"message\">" . $_GLOBALS['message'] . "</div>";
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
    <form name="testmng" action="testmng.php" method="post">
        <div class="row">
            <div class="span1"></div>
            <div class="span6">
                <?php
                if (isset($_SESSION['admname'])) {

                    ?>
                    <input type="submit" value="LogOut" name="logout" class="btn-danger" title="Log Out"/>
                    <input type="submit" value="Home" name="dashboard" class="btn-info" title="Dash Board"/>

                    <?php

                    if (isset($_REQUEST['add'])) {
                        ?>
                        <?php
                    } else if (isset($_REQUEST['edit'])) {
                        ?>
                        <?php
                    } else {
                        ?>
                        <input type="submit" value="Delete" name="delete" class="btn-danger" title="Delete"/>
                        <input type="submit" value="Add" name="add" class="btn-info" title="Add"/>
                    <?php }
                } ?>
            </div>
            <div class="span1"></div>
        </div>
        <div class="container">
        <div class="page">
            <?php
            if (isset($_SESSION['admname'])) {

                if (isset($_REQUEST['forpq']))
                    echo "<div class=\"pmsg\" style=\"text-align:center\"> Which test questions Do you want to Manage? <br/><b>Help:</b>Click on Questions button to manage the questions of respective tests</div>";
                if (isset($_REQUEST['add'])) {

                    ?>
                    <div class="span4"></div>
                    <div class="span4">
                    <ul class="unstyled">
                        <li>
                            <li><h5>Subject Name</h5></li>
                            <li>
                                <select name="subject" class="btn-block">
                                    <option selected value="<Choose the Subject>">&lt;Choose the Subject&gt;</option>
                                    <?php
                                    $role = $_SESSION['role'];
                                    $result = executeQuery("select subid,subname from subject WHERE course='$role';");
                                    while ($r = mysql_fetch_array($result)) {

                                        echo "<option value=\"" . $r['subid'] . "\">" . htmlspecialchars_decode($r['subname'], ENT_QUOTES) . "</option>";
                                    }
                                    closedb();
                                    ?>
                                </select>
                            </li>
                        </li>
                        <li>
                            <li><h5>Test Name</h5></li>
                            <li><input type="text" name="testname" style="height: 40px" class="btn-block" value="" size="16" onkeyup="isalphanum(this)"/></li>
                        </li>
                        <li>
                            <li><h5>Test Description</h5></li>
                            <li><textarea name="testdesc" class="btn-block" cols="20" rows="2"></textarea></li>
                        </li>
                        <li>
                            <li><h5>Total Questions</h5></li>
                            <li><input type="text" name="totalqn" style="height: 40px" class="btn-block" value="" size="16" onkeyup="isnum(this)"/></li>
                        </li>
                        <li>
                            <li><h5>Duration(Mins)</h5></li>
                            <li><input type="text" name="duration" style="height: 40px" class="btn-block" value="" size="16" onkeyup="isnum(this)"/></li>
                        </li>
                        <li>
                            <li><h5>Test From</h5></li>
                            <li><input id="testfrom" type="text" name="testfrom" style="height: 40px" class="btn-block" value="" size="16" readonly/></li>
                        </li>
                        <li>
                            <li><h5>Test To</h5></li>
                            <li><input id="testto" type="text" name="testto" style="height: 40px" class="btn-block" value="" size="16" readonly/></li>
                        </li>
                        <li>
                            <li><h5>Test Secret Code</h5></li>
                            <li><input type="text" name="testcode" style="height: 40px" class="btn-block" value="" size="16" onkeyup="isalphanum(this)"/><li/>
                        </li>
                        <li>
                            <li><input type="submit" value="Save" name="savea" class="btn-info btn-block"
                                   onclick="validatetestform('testmng')" title="Save the Changes"/></li><br/>
                            <li><input type="submit" value="Cancel" name="cancel" class="btn-danger btn-block" title="Cancel"/></li>
                        </li>
                    </ul>
                    </div>
                    <div class="span4"></div>

                    <?php
                } else if (isset($_REQUEST['edit'])) {

                    $result = executeQuery("select t.totalquestions,t.duration,t.testid,t.testname,t.testdesc,t.subid,s.subname,DECODE(t.testcode,'oespass') as tcode,DATE_FORMAT(t.testfrom,'%Y-%m-%d') as testfrom,DATE_FORMAT(t.testto,'%Y-%m-%d') as testto from test as t,subject as s where t.subid=s.subid and t.testname='" . htmlspecialchars($_REQUEST['edit'], ENT_QUOTES) . "';");
                    if (mysql_num_rows($result) == 0) {
                        header('Location: testmng.php');
                    } else if ($r = mysql_fetch_array($result)) {


                        ?>
                        <div class="span4"></div>
                        <div class="span4">
                        <ul class="unstyled">
                            <li>
                                <li><h5>Subject Name</h5></li>
                                <li>
                                    <select name="subject" class="btn-block">
                                        <?php
                                        $result = executeQuery("select * from subject WHERE course='$role';");
                                        while ($r1 = mysql_fetch_array($result)) {
                                            if (strcmp($r['subname'], $r1['subname']) == 0)
                                                echo "<option value=\"" . $r1['subid'] . "\" selected>" . htmlspecialchars_decode($r1['subname'], ENT_QUOTES) . "</option>";
                                            else
                                                echo "<option value=\"" . $r1['subid'] . "\">" . htmlspecialchars_decode($r1['subname'], ENT_QUOTES) . "</option>";
                                        }
                                        closedb();
                                        ?>
                                    </select>
                                </li>

                            </li>
                            <li>
                                <li><h5>Test Name</h5></li>
                                <li><input type="hidden" name="testid" style="height: 40px" class="btn-block" value="<?php echo $r['testid']; ?>"/><input
                                        type="text" name="testname"
                                        value="<?php echo htmlspecialchars_decode($r['testname'], ENT_QUOTES); ?>"
                                        size="16" onkeyup="isalphanum(this)"/></li>
                            </li>
                            <li>
                                <li><h5>Test Description</h5></li>
                                <li><textarea name="testdesc"  cols="20" class="btn-block"
                                              rows="2"><?php echo htmlspecialchars_decode($r['testdesc'], ENT_QUOTES); ?></textarea>
                                </li>
                            </li>
                            <li>
                                <li><h5>Total Questions</h5></li>
                                <li><input type="text" name="totalqn" class="btn-block" style="height: 40px"
                                           value="<?php echo htmlspecialchars_decode($r['totalquestions'], ENT_QUOTES); ?>"
                                           size="16" onkeyup="isnum(this)"/></li>
                            </li>
                            <li>
                                <li><h5>Duration(Mins)</h5></li>
                                <li><input type="text" name="duration" class="btn-block" style="height: 40px"
                                           value="<?php echo htmlspecialchars_decode($r['duration'], ENT_QUOTES); ?>"
                                           size="16" onkeyup="isnum(this)"/></li>

                            </li>
                            <li>
                                <li><h5>Test From</h5></li>
                                <li><input id="testfrom" type="text" name="testfrom" class="btn-block" style="height: 40px"
                                           value="<?php echo $r['testfrom']; ?>" size="16" readonly/></li>
                            </li>
                            <li>
                                <li><h5>Test To</h5></li>
                                <li><input id="testto" type="text" name="testto" style="height: 40px" class="btn-block" value="<?php echo $r['testto']; ?>"
                                           size="16" readonly/></li>
                            </li>
                            <li>
                                <li><h5>Test Secret Code</h5></li>
                                <li><input type="text" name="testcode" class="btn-block" style="height: 40px"
                                           value="<?php echo htmlspecialchars_decode($r['tcode'], ENT_QUOTES); ?>"
                                           size="16" onkeyup="isalphanum(this)"/></li>
                            </li>
                            <li>
                            <li><input type="submit" value="Save" name="savem" class="btn-info btn-block"
                                       onclick="validatetestform('testmng')" title="Save the changes"/></li><br/>
                                <li><input type="submit" value="Cancel" name="cancel" class="btn-danger btn-block" title="Cancel"/></li>
                            </li>
                        </ul>
                        </div>
                        <div class="span4"></div>
                        <?php
                        closedb();
                    }
                } else {
                    $role = $_SESSION['role'];
                    $result = executeQuery("select t.testid,t.testname,t.testdesc,s.subname,DECODE(t.testcode,'oespass') as tcode,DATE_FORMAT(t.testfrom,'%d-%M-%Y') as testfrom,DATE_FORMAT(t.testto,'%d-%M-%Y %H:%i:%s %p') as testto from test as t,subject as s where t.subid=s.subid AND s.course='$role' order by t.testdate desc,t.testtime desc;");
                    if (mysql_num_rows($result) == 0) {
                        echo "<h3 style=\"color:#0000cc;text-align:center;\">No Tests Yet..!</h3>";
                    } else {
                        $i = 0;
                        ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr class="btn-info">
                                <th>&nbsp;</th>
                                <th>Test Description</th>
                                <th>Subject Name</th>
                                <th>Test Secret Code</th>
                                <th>Validity</th>
                                <th>Edit</th>
                                <th style="text-align:center;">Manage<br/>Questions</th>
                            </tr>
                            </thead>
                            <?php
                            while ($r = mysql_fetch_array($result)) {
                                $i = $i + 1;
                                if ($i % 2 == 0)
                                    echo "<tr style='color: black'>";
                                else
                                    echo "<tr style='color: black;'>";
                                echo "<td style=\"text-align:center;\"><input type=\"checkbox\" name=\"d$i\" value=\"" . $r['testid'] . "\" /></td><td> " . htmlspecialchars_decode($r['testname'], ENT_QUOTES) . " : " . htmlspecialchars_decode($r['testdesc'], ENT_QUOTES)
                                    . "</td><td>" . htmlspecialchars_decode($r['subname'], ENT_QUOTES) . "</td><td>" . htmlspecialchars_decode($r['tcode'], ENT_QUOTES) . "</td><td>" . $r['testfrom'] . " To " . $r['testto'] . "</td>"
                                    . "<td class=\"tddata\"><a title=\"Edit " . htmlspecialchars_decode($r['testname'], ENT_QUOTES) . "\"href=\"testmng.php?edit=" . htmlspecialchars_decode($r['testname'], ENT_QUOTES) . "\">EDIT</a></td>"
                                    . "<td class=\"tddata\"><a title=\"Manage Questions of " . htmlspecialchars_decode($r['testname'], ENT_QUOTES) . "\"href=\"testmng.php?manageqn=" . htmlspecialchars_decode($r['testname'], ENT_QUOTES) . "\">MANAGE</a></td></tr>";
                            }
                            ?>
                        </table>
                        <?php
                    }
                    closedb();
                }
            }
            ?>

        </div>
        </div>
    </form>
</div>
</body>
</html>
