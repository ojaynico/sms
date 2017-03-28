<?php

error_reporting(0);
session_start();
include_once '../oesdb.php';

if (!isset($_SESSION['admname']) || !isset($_SESSION['testqn'])) {
    $_GLOBALS['message'] = "Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
} else if (isset($_REQUEST['logout'])) {

    unset($_SESSION['admname']);
    header('Location: index.php');
} else if (isset($_REQUEST['managetests'])) {


    header('Location: testmng.php');
} else if (isset($_REQUEST['delete'])) {

    unset($_REQUEST['delete']);
    $hasvar = false;
    $count = 1;
    foreach ($_REQUEST as $variable) {
        if (is_numeric($variable)) {
            $hasvar = true;

            if (!@executeQuery("delete from question where testid=" . $_SESSION['testqn'] . " and qnid=" . htmlspecialchars($variable)))
                $_GLOBALS['message'] = mysql_error();
        }
    }

    $result = executeQuery("select qnid from question where testid=" . $_SESSION['testqn'] . " order by qnid;");
    while ($r = mysql_fetch_array($result))
        if (!@executeQuery("update question set qnid=" . ($count++) . " where testid=" . $_SESSION['testqn'] . " and qnid=" . $r['qnid'] . ";"))
            $_GLOBALS['message'] = mysql_error();

    if (!isset($_GLOBALS['message']) && $hasvar == true)
        $_GLOBALS['message'] = "Selected Questions are successfully Deleted";
    else if (!$hasvar) {
        $_GLOBALS['message'] = "First Select the Questions to be Deleted.";
    }
} else if (isset($_REQUEST['savem'])) {

    if (strcmp($_REQUEST['correctans'], "<Choose the Correct Answer>") == 0 || empty($_REQUEST['question']) || empty($_REQUEST['optiona']) || empty($_REQUEST['optionb']) || empty($_REQUEST['optionc']) || empty($_REQUEST['optiond']) || empty($_REQUEST['marks'])) {
        $_GLOBALS['message'] = "Some of the required Fields are Empty";
    } else if (strcasecmp($_REQUEST['optiona'], $_REQUEST['optionb']) == 0 || strcasecmp($_REQUEST['optiona'], $_REQUEST['optionc']) == 0 || strcasecmp($_REQUEST['optiona'], $_REQUEST['optiond']) == 0 || strcasecmp($_REQUEST['optionb'], $_REQUEST['optionc']) == 0 || strcasecmp($_REQUEST['optionb'], $_REQUEST['optiond']) == 0 || strcasecmp($_REQUEST['optionc'], $_REQUEST['optiond']) == 0) {
        $_GLOBALS['message'] = "Two or more options are representing same answers.Verify Once again";
    } else {
        $query = "update question set question='" . htmlspecialchars($_REQUEST['question'], ENT_QUOTES) . "',optiona='" . htmlspecialchars($_REQUEST['optiona'], ENT_QUOTES) . "',optionb='" . htmlspecialchars($_REQUEST['optionb'], ENT_QUOTES) . "',optionc='" . htmlspecialchars($_REQUEST['optionc'], ENT_QUOTES) . "',optiond='" . htmlspecialchars($_REQUEST['optiond'], ENT_QUOTES) . "',correctanswer='" . htmlspecialchars($_REQUEST['correctans'], ENT_QUOTES) . "',marks=" . htmlspecialchars($_REQUEST['marks'], ENT_QUOTES) . " where testid=" . $_SESSION['testqn'] . " and qnid=" . $_REQUEST['qnid'] . " ;";
        if (!@executeQuery($query))
            $_GLOBALS['message'] = mysql_error();
        else
            $_GLOBALS['message'] = "Question is updated Successfully.";
    }
    closedb();
} else if (isset($_REQUEST['savea'])) {

    $cancel = false;
    $result = executeQuery("select max(qnid) as qn from question where testid=" . $_SESSION['testqn'] . ";");
    $r = mysql_fetch_array($result);
    if (is_null($r['qn']))
        $newstd = 1;
    else
        $newstd = $r['qn'] + 1;

    $result = executeQuery("select count(*) as q from question where testid=" . $_SESSION['testqn'] . ";");
    $r2 = mysql_fetch_array($result);

    $result = executeQuery("select totalquestions from test where testid=" . $_SESSION['testqn'] . ";");
    $r1 = mysql_fetch_array($result);

    if (!is_null($r2['q']) && (int)htmlspecialchars_decode($r1['totalquestions'], ENT_QUOTES) == (int)$r2['q']) {
        $cancel = true;
        $_GLOBALS['message'] = "Already you have created all the Questions for this Test.<br /><b>Help:</b> If you still want to add some more questions then edit the test settings(option:Total Questions).";
    } else
        $cancel = false;

    $result = executeQuery("select * from question where testid=" . $_SESSION['testqn'] . " and question='" . htmlspecialchars($_REQUEST['question'], ENT_QUOTES) . "';");
    if (!$cancel && $r1 = mysql_fetch_array($result)) {
        $cancel = true;
        $_GLOBALS['message'] = "Sorry, You trying to enter same question for Same test";
    } else if (!$cancel)
        $cancel = false;

    if (strcmp($_REQUEST['correctans'], "<Choose the Correct Answer>") == 0 || empty($_REQUEST['question']) || empty($_REQUEST['optiona']) || empty($_REQUEST['optionb']) || empty($_REQUEST['optionc']) || empty($_REQUEST['optiond']) || empty($_REQUEST['marks'])) {
        $_GLOBALS['message'] = "Some of the required Fields are Empty";
    } else if (strcasecmp($_REQUEST['optiona'], $_REQUEST['optionb']) == 0 || strcasecmp($_REQUEST['optiona'], $_REQUEST['optionc']) == 0 || strcasecmp($_REQUEST['optiona'], $_REQUEST['optiond']) == 0 || strcasecmp($_REQUEST['optionb'], $_REQUEST['optionc']) == 0 || strcasecmp($_REQUEST['optionb'], $_REQUEST['optiond']) == 0 || strcasecmp($_REQUEST['optionc'], $_REQUEST['optiond']) == 0) {
        $_GLOBALS['message'] = "Two or more options are representing same answers.Verify Once again";
    } else if (!$cancel) {
        $query = "insert into question values(" . $_SESSION['testqn'] . ",$newstd,'" . htmlspecialchars($_REQUEST['question'], ENT_QUOTES) . "','" . htmlspecialchars($_REQUEST['optiona'], ENT_QUOTES) . "','" . htmlspecialchars($_REQUEST['optionb'], ENT_QUOTES) . "','" . htmlspecialchars($_REQUEST['optionc'], ENT_QUOTES) . "','" . htmlspecialchars($_REQUEST['optiond'], ENT_QUOTES) . "','" . htmlspecialchars($_REQUEST['correctans'], ENT_QUOTES) . "'," . htmlspecialchars($_REQUEST['marks'], ENT_QUOTES) . ")";
        if (!@executeQuery($query))
            $_GLOBALS['message'] = mysql_error();
        else
            $_GLOBALS['message'] = "Successfully New Question is Created.";
    }
    closedb();
}
?>
<html>
<head>
    <title>OES-Manage Questions</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="../css/main.css" rel="stylesheet" type="text/css"/>
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
    <form name="prepqn" action="prepqn.php" method="post">
        <div class="row">
            <div class="span1"></div>
            <div class="span6">
                <?php
                if (isset($_SESSION['admname']) && isset($_SESSION['testqn'])) {

                    ?>
                    <input type="submit" value="LogOut" name="logout" class="btn-danger" title="Log Out"/>
                    <input type="submit" value="Manage Tests" name="managetests" class="btn-info"
                           title="Manage Tests"/>

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
                $result = executeQuery("select count(*) as q from question where testid=" . $_SESSION['testqn'] . ";");
                $r1 = mysql_fetch_array($result);

                $result = executeQuery("select totalquestions from test where testid=" . $_SESSION['testqn'] . ";");
                $r2 = mysql_fetch_array($result);
                if ((int)$r1['q'] == (int)htmlspecialchars_decode($r2['totalquestions'], ENT_QUOTES))
                    echo "<div class=\"pmsg\"> Test Name: " . $_SESSION['testname'] . "<br/>Status: All the Questions are Created for this test.</div>";
                else
                    echo "<div class=\"pmsg\"> Test Name: " . $_SESSION['testname'] . "<br/>Status: Still you need to create " . (htmlspecialchars_decode($r2['totalquestions'], ENT_QUOTES) - $r1['q']) . " Question/s. After that only, test will be available for candidates.</div>";
                ?>
                <?php
                if (isset($_SESSION['admname']) && isset($_SESSION['testqn'])) {

                    if (isset($_REQUEST['add'])) {

                        ?>
                        <div class="span4"></div>
                        <div class="span4">
                        <ul class="unstyled">
                            <li>
                                <li><h5>Question</h5></li>
                                <li><textarea name="question" class="btn-block"  cols="40" rows="3"></textarea></li>
                            </li>
                            <li>
                                <li><h5>Option A</h5></li>
                                <li><input type="text" name="optiona" class="btn-block btn-large" style="height: 40px" value="" size="30"/></li>
                            </li>
                            <li>
                                <li><h5>Option B</h5></li>
                                <li><input type="text" name="optionb" class="btn-block btn-large" style="height: 40px" value="" size="30"/></li>
                            </li>

                            <li>
                                <li><h5>Option C</h5></li>
                                <li><input type="text" name="optionc" class="btn-block btn-large" style="height: 40px" value="" size="30"/></li>
                            </li>
                            <li>
                                <li><h5>Option D</h5></li>
                                <li><input type="text" name="optiond" class="btn-block btn-large" style="height: 40px" value="" size="30"/></li>
                            </li>
                            <li>
                                <li><h5>Correct Answer</h5></li>
                                <li>
                                    <select name="correctans" class="btn-block" >
                                        <option value="<Choose the Correct Answer>" selected>&lt;Choose the Correct
                                            Answer&gt;</option>
                                        <option value="optiona">Option A</option>
                                        <option value="optionb">Option B</option>
                                        <option value="optionc">Option C</option>
                                        <option value="optiond">Option D</option>
                                    </select>
                                </li>
                            </li>
                            <li>
                                <li><h5>Marks</h5></li>
                                <li><input type="text" name="marks" class="btn-block"  value="1" size="30" onkeyup="isnum(this)"/></li>
                            </li>
                            <li>
                            <li><input type="submit" value="Save" name="savea" class="btn-info btn-block"
                                       onclick="validateqnform('prepqn')" title="Save the Changes"/></li><br/>
                                <li><input type="submit" value="Cancel" name="cancel" class="btn-danger btn-block" title="Cancel"/></li>
                            </li>
                        </ul>
                            </div>
                        <div class="span4"></div>

                        <?php
                    } else if (isset($_REQUEST['edit'])) {

                        $result = executeQuery("select * from question where testid=" . $_SESSION['testqn'] . " and qnid=" . $_REQUEST['edit'] . ";");
                        if (mysql_num_rows($result) == 0) {
                            header('Location: prepqn.php');
                        } else if ($r = mysql_fetch_array($result)) {

                            ?>
                            <div class="span4"></div>
                            <div class="span4">
                            <ul class="unstyled">
                                <li>
                                    <li><h5>Question<input type="hidden" name="qnid" value="<?php echo $r['qnid']; ?>"/>
                                    </h5></li>
                                    <li><textarea name="question" cols="40" class="btn-block"
                                                  rows="3"><?php echo htmlspecialchars_decode($r['question'], ENT_QUOTES); ?></textarea>
                                    </li>
                                </li>
                                <li>
                                    <li><h5>Option A</h5></li>
                                    <li><input type="text" name="optiona" class="btn-block" style="height: 40px"
                                               value="<?php echo htmlspecialchars_decode($r['optiona'], ENT_QUOTES); ?>"
                                               size="30"/></li>
                                </li>
                                <li>
                                    <li><h5>Option B</h5></li>
                                    <li><input type="text" name="optionb" class="btn-block btn-large" style="height: 40px"
                                               value="<?php echo htmlspecialchars_decode($r['optionb'], ENT_QUOTES); ?>"
                                               size="30"/></li>
                                </li>
                                <li>
                                    <li><h5>Option C</h5></li>
                                    <li><input type="text" name="optionc" class="btn-block btn-large" style="height: 40px"
                                               value="<?php echo htmlspecialchars_decode($r['optionc'], ENT_QUOTES); ?>"
                                               size="30"/></li>
                                </li>
                                <li>
                                    <li><h5>Option D</h5></li>
                                    <li><input type="text" name="optiond" class="btn-block btn-large" style="height: 40px"
                                               value="<?php echo htmlspecialchars_decode($r['optiond'], ENT_QUOTES); ?>"
                                               size="30"/></li>
                                </li>
                                <li>
                                    <li><h5>Correct Answer</h5></li>
                                    <li>
                                        <select name="correctans" class="btn-block" >
                                            <option
                                                value="optiona" <?php if (strcmp(htmlspecialchars_decode($r['correctanswer'], ENT_QUOTES), "optiona") == 0)
                                                echo "selected"; ?>>Option A
                                            </option>
                                            <option
                                                value="optionb" <?php if (strcmp(htmlspecialchars_decode($r['correctanswer'], ENT_QUOTES), "optionb") == 0)
                                                echo "selected"; ?>>Option B
                                            </option>
                                            <option
                                                value="optionc" <?php if (strcmp(htmlspecialchars_decode($r['correctanswer'], ENT_QUOTES), "optionc") == 0)
                                                echo "selected"; ?>>Option C
                                            </option>
                                            <option
                                                value="optiond" <?php if (strcmp(htmlspecialchars_decode($r['correctanswer'], ENT_QUOTES), "optiond") == 0)
                                                echo "selected"; ?>>Option D
                                            </option>
                                        </select>
                                    </li>
                                </li>
                                <li>
                                    <li><h5>Marks</h5></li>
                                    <li><input type="text" name="marks" class="btn-block"
                                               value="<?php echo htmlspecialchars_decode($r['marks'], ENT_QUOTES); ?>"
                                               size="30" onkeyup="isnum(this)"/></li>
                                </li>
                                <li>
                                <li><input type="submit" value="Save" name="savem" class="btn-info btn-block"
                                           onclick="validateqnform('prepqn')" title="Save the changes"/></li><br/>
                                    <li><input type="submit" value="Cancel" name="cancel" class="btn-danger btn-block" title="Cancel"/></li>
                                </li>
                            </ul>
                            </div>
                            <div class="span4"></div>

                            <?php
                            closedb();
                        }
                    } else {


                        $result = executeQuery("select * from question where testid=" . $_SESSION['testqn'] . " order by qnid;");
                        if (mysql_num_rows($result) == 0) {
                            echo "<h3 style=\"color:#0000cc;text-align:center;\">No Questions Yet..!</h3>";
                        } else {
                            $i = 0;
                            ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="btn-info">
                                    <th>&nbsp;</th>
                                    <th>Qn.No</th>
                                    <th>Question</th>
                                    <th>Correct Answer</th>
                                    <th>Option</th>
                                    <th>Marks</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <?php
                                while ($r = mysql_fetch_array($result)) {
                                    $i = $i + 1;
                                    if ($i % 2 == 0)
                                        echo "<tr style='color: black'>";
                                    else
                                        echo "<tr style='color: black'>";
                                    echo "<td style=\"text-align:center;\"><input type=\"checkbox\" name=\"d$i\" value=\"" . $r['qnid'] . "\" /></td><td> " . $i
                                        . "</td><td>" . htmlspecialchars_decode($r['question'], ENT_QUOTES) . "</td><td>" . htmlspecialchars_decode($r[htmlspecialchars_decode($r['correctanswer'], ENT_QUOTES)], ENT_QUOTES) . "</td><td>" . htmlspecialchars_decode($r['correctanswer'], ENT_QUOTES) . "</td><td>" . htmlspecialchars_decode($r['marks'], ENT_QUOTES) . "</td>"
                                        . "<td class=\"tddata\"><a title=\"Edit " . $r['qnid'] . "\"href=\"prepqn.php?edit=" . $r['qnid'] . "\">EDIT</a>"
                                        . "</td></tr>";
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
