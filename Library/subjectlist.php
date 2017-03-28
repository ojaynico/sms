<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/subjectlist.css"/>
    </head>
    <body>
        <?php
        include 'php/connection.php';

        $sem = $_GET['semester'];

        if ($sem == "Semester 1") {
            $s1 = "Semester 1";
            $q1 = "SELECT * FROM subject WHERE course = '$_GET[course]' AND semester = '$s1'";
            $q1q = mysql_query($q1);
            echo "<center><h3>Course Units</h3></center>";
            echo "<hr/>";
            echo "<ol type=\"1\">";
            while ($row1 = mysql_fetch_array($q1q)) {
                echo "<li><a href=\"book.php?subject=" . $row1['subname'] . "&semester=" . $s1 . "&course=" . $_GET['course'] . "\" target=\"books\">" . $row1['subname'] . "</a></li>";
            }
            echo "</ol>";
        } else if ($sem == "Semester 2") {
            $s2 = "Semester 2";
            $q2 = "SELECT * FROM subject WHERE course = '$_GET[course]' AND semester = '$s2'";
            $q2q = mysql_query($q2);
            echo "<center><h3>Course Units</h3></center>";
            echo "<hr/>";
            echo "<ol type=\"1\">";
            while ($row2 = mysql_fetch_array($q2q)) {
                echo "<li><a href=\"book.php?subject=" . $row2['subname'] . "&semester=" . $s2 . "&course=" . $_GET['course'] . "\" target=\"books\">" . $row2['subname'] . "</a></li>";
            }
            echo "</ol>";
        } else if ($sem == "Semester 3") {
            $s3 = "Semester 3";
            $q3 = "SELECT * FROM subject WHERE course = '$_GET[course]' AND semester = '$s3'";
            $q3q = mysql_query($q3);
            echo "<center><h3>Course Units</h3></center>";
            echo "<hr/>";
            echo "<ol type=\"1\">";
            while ($row3 = mysql_fetch_array($q3q)) {
                echo "<li><a href=\"book.php?subject=" . $row3['subname'] . "&semester=" . $s3 . "&course=" . $_GET['course'] . "\" target=\"books\">" . $row3['subname'] . "</a></li>";
            }
            echo "</ol>";
        } else if ($sem == "Semester 4") {
            $s4 = "Semester 4";
            $q4 = "SELECT * FROM subject WHERE course = '$_GET[course]' AND semester = '$s4'";
            $q4q = mysql_query($q4);
            echo "<center><h3>Course Units</h3></center>";
            echo "<hr/>";
            echo "<ol type=\"1\">";
            while ($row4 = mysql_fetch_array($q4q)) {
                echo "<li><a href=\"book.php?subject=" . $row4['subname'] . "&semester=" . $s4 . "&course=" . $_GET['course'] . "\" target=\"books\">" . $row4['subname'] . "</a></li>";
            }
            echo "</ol>";
        } else if ($sem == "null") {
            ?>
    <marquee behavior="alternate" scrollamount="30"><img src="images/arrow.png"></marquee>
    <center><h1>Choose a Semester</h1></center>
            <?php
        }
        ?>

    </body>
</html>
