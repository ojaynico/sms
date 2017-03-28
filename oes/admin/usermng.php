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
} else if (isset($_REQUEST['tcmng'])) {
    header('Location: tcmng.php');
} else if (isset($_REQUEST['printstudents'])){
    $sem = htmlspecialchars($_REQUEST['printsemester'], ENT_QUOTES);
    header('Location: printusers.php?sem='.$sem);
} else if (isset($_REQUEST['delete'])) {

    unset($_REQUEST['delete']);
    $hasvar = false;
    foreach ($_REQUEST as $variable) {
        if (is_numeric($variable)) {
            $hasvar = true;

            if (!@executeQuery("delete from student where stdid=$variable")) {
                if (mysql_errno() == 1451)
                    $_GLOBALS['message'] = "Too Prevent accidental deletions, system will not allow propagated deletions.<br/><b>Help:</b> If you still want to delete this user, then first manually delete all the records that are associated with this user.";
                else
                    $_GLOBALS['message'] = mysql_errno();
            }
        }
    }
    if (!isset($_GLOBALS['message']) && $hasvar == true)
        $_GLOBALS['message'] = "Selected User/s are successfully Deleted";
    else if (!$hasvar) {
        $_GLOBALS['message'] = "First Select the users to be Deleted.";
    }
} else if (isset($_REQUEST['savem'])) {

    if (empty($_REQUEST['cname']) || empty($_REQUEST['password']) || empty($_REQUEST['stduidno'])) {
        $_GLOBALS['message'] = "Some of the required Fields are Empty.Therefore Nothing is Updated";
    } else {
        $query = "update student set stdname='" . htmlspecialchars($_REQUEST['cname'], ENT_QUOTES) . "', stduname='" . htmlspecialchars($_REQUEST['stduidno'], ENT_QUOTES) . "', stdpassword=ENCODE('" . htmlspecialchars($_REQUEST['password']) . "','oespass'),stduidno='" . htmlspecialchars($_REQUEST['stduidno'], ENT_QUOTES) . "',course='" . htmlspecialchars($_REQUEST['course'], ENT_QUOTES) . "' where stdid=" . htmlspecialchars($_REQUEST['stdide'], ENT_QUOTES) . ";";
        if (!@executeQuery($query))
            $_GLOBALS['message'] = mysql_error();
        else
            $_GLOBALS['message'] = "User Information is Successfully Updated.";
    }
    closedb();
} else if (isset($_REQUEST['savea'])) {

    $result = executeQuery("select max(stdid) as std from student");
    $r = mysql_fetch_array($result);
    if (is_null($r['std']))
        $newstd = 1;
    else
        $newstd = $r['std'] + 1;

    $result = executeQuery("select stdname as std from student where stdname='" . htmlspecialchars($_REQUEST['cname'], ENT_QUOTES) . "';");


    if (empty($_REQUEST['cname']) || empty($_REQUEST['password']) || empty($_REQUEST['stduidno'])) {
        $_GLOBALS['message'] = "Some of the required Fields are Empty";
    } else if (mysql_num_rows($result) > 0) {
        $_GLOBALS['message'] = "Sorry User Already Exists.";
    } else {
        $query = "insert into student values($newstd,'" . htmlspecialchars($_REQUEST['cname'], ENT_QUOTES) . "','" . htmlspecialchars($_REQUEST['stduidno'], ENT_QUOTES) . "',ENCODE('" . htmlspecialchars($_REQUEST['password'], ENT_QUOTES) . "','oespass'),'" . htmlspecialchars($_REQUEST['stduidno'], ENT_QUOTES) . "','" . htmlspecialchars($_REQUEST['course'], ENT_QUOTES) . "','" . htmlspecialchars($_REQUEST['semester']) . "')";
        if (!@executeQuery($query)) {
            if (mysql_errno() == 1062)
                $_GLOBALS['message'] = "Given User Name voilates some constraints, please try with some other name.";
            else
                $_GLOBALS['message'] = mysql_error();
        } else
            $_GLOBALS['message'] = "Successfully New User is Created.";
    }
    closedb();
}
?>
<html>
<head>
    <title>OES-Manage Users</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link href="../css/main.css" rel="stylesheet" type="text/css"/>
    <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    <link href="../css/datatables.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="../validate.js"></script>
</head>
<body style="background-image: url('../images/slogo2.jpg'); background-size: contain">
<?php
if (isset($_GLOBALS['message'])) {
    echo "<div class=\"btn-danger\">" . $_GLOBALS['message'] . "</div>";
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
    <form name="usermng" action="usermng.php" method="post">
        <div class="row">
            <div class="span1"></div>
        <div class="span6">
                <?php
                if (isset($_SESSION['admname'])) {
                    ?>
                    <input type="submit" value="LogOut" name="logout" class="btn-danger" title="Log Out"/>
                    <input type="submit" value="Home" name="dashboard" class="btn-info" title="Dash Board"/>
                    <input type="submit" value="Print" name="print" class="btn-inverse"/>
                    <?php
                    if (isset($_REQUEST['add'])) {
                        ?>

                        <?php
                    } else if (isset($_REQUEST['edit'])) {
                        ?>

                        <?php
                    } else {
                        ?>
                        <input type="submit" value="Delete" name="delete" class="btn-info" title="Delete"/>
                        <input type="submit" value="Add" name="add" class="btn-info" title="Add"/>
                    <?php }
                }
                ?>
        </div>

            <div class="span8">

            </div>
        </div>
        <div class="clearfix"></div>
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
                            <li><h5>Student Name</h5></li>
                            <li><input class="btn-block" type="text" name="cname" style="height: 40px" value="" onkeyup="isalphanum(this)"/></li>
                        </li>
                        <li>
                            <li><h5>Student ID</h5></li>
                            <li><input class="btn-block" type="text" name="stduidno" style="height: 40px" value="" /></li>
                        </li>
                        <li>
                            <li><h5>Password</h5></li>
                            <li><input class="btn-block" type="text" name="password" style="height: 40px" onkeyup="isalphanum(this)" value="<?php echo substr(md5(date('his')), 0, 10); ?>" readonly="readonly"/>
                            </li>
                        </li>
                        <li>
                            <li><h5>Course Offered</h5></li>
                            <li><input class="btn-block" type="text" name="course" style="height: 40px" value="<?php echo  $_SESSION['role']; ?>" size="16" onkeyup="isnum(this)" readonly="readonly"/></li>
                        </li>
                        <li>
                            <li><h5>Semester</h5></li>
                            <li>
                                <select name="semester" class="btn-block">
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
                                   onclick="validateform('usermng')" title="Save the Changes"/></li><br/>
                            <li><input type="submit" value="Cancel" name="cancel" class="btn-danger btn-block" title="Cancel"/></li>
                        </li>

                    </ul>
                    </div>
                    <div class="span4"></div>
                    <?php
                } else if (isset($_REQUEST['edit'])) {

                    $result = executeQuery("select stdid,stdname, stduname, DECODE(stdpassword,'oespass') as stdpass, stduidno, course from student where stduname='" . htmlspecialchars($_REQUEST['edit'], ENT_QUOTES) . "';");
                    if (mysql_num_rows($result) == 0) {
                        header('Location: usermng.php');
                    } else if ($r = mysql_fetch_array($result)) {
                        ?>
            <div class="span4"></div>
            <div class="span4">
                        <ul class="unstyled">
                            <li>
                            <input type="hidden" name="stdide" value="<?php echo htmlspecialchars_decode($r['stdid'], ENT_QUOTES); ?>">
                                <li><h5>Student Name</h5></li>
                                <li><input type="text" name="cname" class="btn-block" style="height: 40px"
                                           value="<?php echo htmlspecialchars_decode($r['stdname'], ENT_QUOTES); ?>"
                                           size="16" onkeyup="isalphanum(this)"/></li>
                            </li>
                            <li>
                                <li><h5>Student ID</h5></li>
                                <li><input type="text" name="stduidno" class="btn-block" style="height: 40px"
                                           value="<?php echo htmlspecialchars_decode($r['stduidno'], ENT_QUOTES); ?>"
                                           size="16"/></li>
                            </li>

                            <li>
                                <li><h5>Password</h5></li>
                                <li><input type="text" name="password" class="btn-block" style="height: 40px"
                                           value="<?php echo htmlspecialchars_decode($r['stdpass'], ENT_QUOTES); ?>"
                                           size="16" onkeyup="isalphanum(this)" readonly="readonly"/></li>
                            </li>

                            <li>
                                <li><h5>Course Offered</h5></li>
                                <li>
                                    <input type="text" name="course" style="height: 40px" class="btn-block" value="<?php echo $_SESSION['role']; ?>" size="16"
                                           onkeyup="isnum(this)" readonly="readonly"/>
                                </li>
                            </li>

                            <li>
                                <li><h5>Semester</h5></li>
                                <li>
                                    <select name="semester" class="btn-block">
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
                            <li>
                                <input type="submit" value="Save" name="savem" class="btn-info btn-block"
                                       onclick="validateform('usermng')" title="Save the changes"/>
                                </li>
                            <br/>
                            <li>
                                <input type="submit" value="Cancel" name="cancel" class="btn-danger btn-block" title="Cancel"/>
                            </li>
                            </li>

                        </ul>
                </div>
            <div class="span4"></div>
                        <?php
                        closedb();
                    }
                } else if (isset($_REQUEST['print'])){
                    ?>
                    <div class="row">
                        <div class="span4"></div>
                        <div class="span4">
                            <h3 class="center">Print Student List</h3>
                            <h5 class="center">CHOOSE A SEMESTER</h5>
                            <select name="printsemester" class="btn-block">
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
                            <center>
                            <input type="submit" value="PRINT" name="printstudents" class="btn-info">
                            </center>
                        </div>
                        <div class="span4"></div>
                    </div>
                    <?php
                }

                else {
?>
                    <?php
                    $role = $_SESSION['role'];
                    $result = executeQuery("select stdid, stdname, stduname, DECODE(stdpassword, 'oespass') as passw, stduidno, course, semester from student WHERE course='$role' order by course;");
                    if (mysql_num_rows($result) == 0) {
                        echo "<h3 style=\"color:#0000cc;text-align:center;\">No Users Yet..!</h3>";
                    } else {
                        $i = 0;
                        ?>
            <div class="ibox-content">
                <div class="table-responsive">
                        <table class="table table-bordered table-hover dataTables-example">
                            <thead>
                            <tr class="btn-info">
                                <th>&nbsp;</th>
                                <th>Student Name</th>
                                <th>Student ID</th>
                                <th>Password</th>
                                <th>Course</th>
                                <th>Semester</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <?php
                            while ($r = mysql_fetch_array($result)) {
                                $i = $i + 1;
                                if ($i % 2 == 0)
                                    echo "<tr style=\"color: black\">";
                                else
                                    echo "<tr style=\"color: black\">";
                                echo "<td style=\"text-align:center;\"><input type=\"checkbox\" name=\"d$i\" value=\"" . $r['stdid'] . "\" /></td><td>" . htmlspecialchars_decode($r['stdname'], ENT_QUOTES) . "</td><td>" . htmlspecialchars_decode($r['stduidno'], ENT_QUOTES)
                                    . "</td><td>" . htmlspecialchars_decode($r['passw'], ENT_QUOTES) . "</td><td>" . htmlspecialchars_decode($r['course'], ENT_QUOTES) . "</td><td>" . htmlspecialchars_decode($r['semester'], ENT_QUOTES) . "</td>"
                                    . "<td class=\"tddata\"><a title=\"Edit " . htmlspecialchars_decode($r['stdname'], ENT_QUOTES) . "\"href=\"usermng.php?edit=" . htmlspecialchars_decode($r['stduname'], ENT_QUOTES) . "\">EDIT</a></td></tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
                        <?php
                    }
                    closedb();
                }
            }
            ?>

        </div>
        </div>
    </form>
    <div id="footer">

    </div>
</div>
<script src="../js/jquery-2.1.1.js"></script>
<script src="../js/datatables.min.js"></script>
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });


    });
</script>
</body>
</html>

