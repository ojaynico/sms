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

            if (!@executeQuery("delete from subject where subid=$variable")) {
                if (mysql_errno() == 1451)
                    $_GLOBALS['message'] = "Too Prevent accidental deletions, system will not allow propagated deletions.<br/><b>Help:</b> If you still want to delete this subject, then first delete the tests that are conducted/dependent on this subject.";
                else
                    $_GLOBALS['message'] = mysql_errno();
            }
        }
    }
    if (!isset($_GLOBALS['message']) && $hasvar == true)
        $_GLOBALS['message'] = "Selected Subject/s are successfully Deleted";
    else if (!$hasvar) {
        $_GLOBALS['message'] = "First Select the subject/s to be Deleted.";
    }
} else if (isset($_REQUEST['savem'])) {

    if (empty($_REQUEST['subname'])) {
        $_GLOBALS['message'] = "Some of the required Fields are Empty.Therefore Nothing is Updated";
    } else {
        $query = "update subject set subname='" . htmlspecialchars($_REQUEST['subname'], ENT_QUOTES) . "', course='" . htmlspecialchars($_REQUEST['couname'], ENT_QUOTES) . "', semester='" . htmlspecialchars($_REQUEST['semname'], ENT_QUOTES) . "' where subid=" . $_REQUEST['subide'] . ";";
        if (!@executeQuery($query))
            $_GLOBALS['message'] = mysql_error();
        else
            $_GLOBALS['message'] = "Subject Information is Successfully Updated.";
    }
    closedb();
} else if (isset($_REQUEST['savea'])) {

    $result = executeQuery("select max(subid) as sub from subject");
    $r = mysql_fetch_array($result);
    if (is_null($r['sub']))
        $newstd = 1;
    else
        $newstd = $r['sub'] + 1;

    $result = executeQuery("select subname as sub from subject where subname='" . htmlspecialchars($_REQUEST['subname'], ENT_QUOTES) . "';");

    if (empty($_REQUEST['subname'])) {
        $_GLOBALS['message'] = "Some of the required Fields are Empty";
    } else if (mysql_num_rows($result) > 0) {
        $_GLOBALS['message'] = "Sorry Subject Already Exists.";
    } else {
        $query = "insert into subject values($newstd,'" . htmlspecialchars($_REQUEST['subname'], ENT_QUOTES) . "','" . htmlspecialchars($_REQUEST['couname'], ENT_QUOTES) . "','" . htmlspecialchars($_REQUEST['semname'], ENT_QUOTES) . "',NULL)";
        if (!@executeQuery($query)) {
            if (mysql_errno() == 1062)
                $_GLOBALS['message'] = "Given Subject Name voilates some constraints, please try with some other name.";
            else
                $_GLOBALS['message'] = mysql_error();
        } else
            $_GLOBALS['message'] = "Successfully New Subject is Created.";
    }
    closedb();
}
?>
<html>
<head>
    <title>OES-Manage Subjects</title>
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
    <form name="submng" action="submng.php" method="post">
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

                if (isset($_REQUEST['add'])) {
                    ?>
                    <div class="span4"></div>
                    <div class="span4">
                    <ul class="unstyled">
                        <li>
                            <li><h5>Subject Name</h5></li>
                            <li><input class="btn-block" type="text" name="subname" value="" size="16" onkeyup="isalphanum(this)"
                                       onblur="if(this.value==''){alert('Subject Name is Empty');this.focus();this.value='';}"/>
                            </li>
                        </li>
                        <li>
                            <li><h5>Course Name</h5></li>
                            <li><input class="btn-block" type="text" name="couname" value="<?php echo $_SESSION['role']; ?>" size="16"
                                       readonly="readonly"/></li>
                        </li>
                        <li>
                            <li><h5>Semester</h5></li>
                            <li>
                                <select class="btn-block" name="semname">
                                    <?php if (($_SESSION['role'] == "SE") || ($_SESSION['role'] == "IMS") || ($_SESSION['role'] == "VFX") || ($_SESSION['role'] == "admin")) { ?>
                                        <option value="1">Semester 1</option>
                                        <option value="2">Semester 2</option>
                                        <option value="3">Semester 3</option>
                                        <option value="4">Semester 4</option>
                                    <?php }
                                    if ($_SESSION['role'] == "CERTIFICATE") { ?>
                                        <option value="5">Certificate in MS Office</option>
                                        <option value="6">Certificate in Programming</option>
                                        <option value="7">Certificate in Hardware</option>
                                        <option value="8">Certificate in Graphics</option>
                                    <?php }
                                    if ($_SESSION['role'] == "SCHOLAR") { ?>
                                        <option value="9">Scholarship</option>
                                    <?php } ?>
                                </select>
                            </li>
                        </li>
                        <li>
                        <li><input type="submit" value="Save" name="savea" class="btn-info btn-block"
                                   onclick="validatesubform('submng')" title="Save the Changes"/></li><br/>
                            <li><input type="submit" value="Cancel" name="cancel" class="btn-danger btn-block" title="Cancel"/></li>
                        </li>

                    </ul>
                    </div>
                    <div class="span4"></div>
                    <?php
                } else if (isset($_REQUEST['edit'])) {


                    $result = executeQuery("select subid,subname,course,semester from subject where subname='" . htmlspecialchars($_REQUEST['edit'], ENT_QUOTES) . "';");
                    if (mysql_num_rows($result) == 0) {
                        header('submng.php');
                    } else if ($r = mysql_fetch_array($result)) {
                        ?>
                        <div class="span4"></div>
                        <div class="span4">
                        <ul class="unstyled">
                            <li>
                            <input type="hidden" name="subide" value="<?php echo htmlspecialchars_decode($r['subid'], ENT_QUOTES); ?>">
                                <li><h5>Subject Name</h5></li>
                                <li><input type="text" name="subname" class="btn-block"
                                           value="<?php echo htmlspecialchars_decode($r['subname'], ENT_QUOTES); ?>"
                                           size="16" onkeyup="isalphanum(this)"/></li>
                            </li>
                            <li>
                                <li><h5>Course Name</h5></li>
                                <li><input type="text" name="couname" class="btn-block"
                                           value="<?php echo htmlspecialchars_decode($r['course'], ENT_QUOTES); ?>"
                                           size="16" readonly="readonly"/></li>
                            </li>
                            <li>
                                <li><h5>Semester</h5></li>
                                <li>
                                    <select name="semname" class="btn-block">
                                        <?php if (($_SESSION['role'] == "SE") || ($_SESSION['role'] == "IMS") || ($_SESSION['role'] == "VFX") || ($_SESSION['role'] == "admin")) { ?>
                                            <option value="1">Semester 1</option>
                                            <option value="2">Semester 2</option>
                                            <option value="3">Semester 3</option>
                                            <option value="4">Semester 4</option>
                                        <?php }
                                        if ($_SESSION['role'] == "CERTIFICATE") { ?>
                                            <option value="5">Certificate in MS Office</option>
                                            <option value="6">Certificate in Programming</option>
                                            <option value="7">Certificate in Hardware</option>
                                            <option value="8">Certificate in Graphics</option>
                                        <?php }
                                        if ($_SESSION['role'] == "SCHOLAR") { ?>
                                            <option value="9">Scholarship</option>
                                        <?php } ?>
                                    </select>
                                </li>
                            </li>
                            <li>
                                <li><input type="submit" value="Save" name="savem" class="btn-info btn-block"
                                       onclick="validatesubform('submng')" title="Save the changes"/></li><br/>
                            <li><input type="submit" value="Cancel" name="cancel" class="btn-danger btn-block" title="Cancel"/></li>
                            </li>
                        </ul>
                        </div>
                        <div class="span4"></div>
                        <?php
                        closedb();
                    }
                } else {
                    echo "<div class=\"text-info\" style=\"text-align:center;\"><h2 class='text-error'>Subject List</h2></div>";
                    $role = $_SESSION['role'];
                    $result = executeQuery("select * from subject WHERE course='$role' order by subid;");
                    if (mysql_num_rows($result) == 0) {
                        echo "<h3 style=\"color:#0000cc;text-align:center;\">No Subjets Yet..!</h3>";
                    } else {
                        $i = 0;
                        ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr class="btn-info">
                                <th>&nbsp;</th>
                                <th>Subject Name</th>
                                <th>Course</th>
                                <th>Semester</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <?php
                            while ($r = mysql_fetch_array($result)) {
                                $i = $i + 1;
                                if ($i % 2 == 0) {
                                    echo "<tr style=\"color: black;\">";
                                } else {
                                    echo "<tr style='color: black'>";
                                }
                                echo "<td style=\"text-align:center;\"><input type=\"checkbox\" name=\"d$i\" value=\"" . $r['subid'] . "\" /></td><td>" . htmlspecialchars_decode($r['subname'], ENT_QUOTES)
                                    . "</td><td>" . htmlspecialchars_decode($r['course'], ENT_QUOTES) . "</td><td>" . htmlspecialchars_decode($r['semester'], ENT_QUOTES) . "</td>"
                                    . "<td class=\"tddata\"><a title=\"Edit " . htmlspecialchars_decode($r['stdname'], ENT_QUOTES) . "\"href=\"submng.php?edit=" . htmlspecialchars_decode($r['subname'], ENT_QUOTES) . "\">EDIT</a></td></tr>";
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

