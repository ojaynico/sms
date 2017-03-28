<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/general.css"/>
        <link rel="stylesheet" type="text/css" href="css/subject.css"/>
    </head>
    <body>
    <center>
        <header>
            <img src="images/logo.png" class="logo"/>
            <div class="heading">
                SITM E-Library
            </div>
            <div style="font-size: 16pt; padding-top: 12px; color: blue; line-height: .5;">
                Welcome<br/>
                <?php
                include 'php/connection.php';
                session_start();
                $s_id = $_SESSION['user_id'];

                if (empty($s_id)) {
                    header('Location: index.php');
                }

                $query = "SELECT * FROM users WHERE ID = $s_id";
                $result = mysql_query($query);
                $user = mysql_fetch_array($result);
                ?>
                <p><?php echo $user['FIRST_NAME'] . " " . $user['SECOND_NAME']; ?></p>
                <a href="logout.php" style="background-color: green; color: white; border-radius: 10%; font-size: 20pt;">Logout</a>
                <a href="home.php" style="background-color: green; color: white; border-radius: 10%; font-size: 20pt;">Home</a>
            </div>
        </header>
        <div style="height: 20px;">
            <?php
            if ($_GET['course'] == "swe") {
                echo "<h3>Diploma In Software Engineering\Bachelor In Computer Application</h3>";
            } else if ($_GET['course'] == "ims") {
                echo "<h3>Diploma In Infrastructure & Management Services\Bachelor of Sciences In Hardware & Networking</h3>";
            } else if ($_GET['course'] == "vfx") {
                echo "<h3>Diploma In Visual Effects & Animation\Bachelor of Arts In Visual Effects & Animation</h3>";
            } else if ($_GET['course'] == "swec") {
                echo "<h3>Certificate In Software Engineering</h3>";
            } else if ($_GET['course'] == "imsc") {
                echo "<h3>Certificate In Networking</h3>";
            } else if ($_GET['course'] == "vfxc") {
                echo "<h3>Certificate In Motion Graphics</h3>";
            } else if ($_GET['course'] == "webc") {
                echo "<h3>Certificate In Web Designing</h3>";
            } else if ($_GET['course'] == "offc") {
                echo "<h3>Certificate In Microsoft Office</h3>";
            } else if ($_GET['course'] == "ppc") {
                echo "<h3>Certificate In Print & Publishing</h3>";
            }
            ?>
        </div>
        <hr/>
        <section>
            <?php if ($_GET['course'] == "swe" || $_GET['course'] == "ims" || $_GET['course'] == "vfx") {
                ?>
                <div  class="semcont">
                    <?php
                    echo "<a href=\"subjectlist.php?semester=Semester 1" . "&course=" . $_GET['course'] . "\" target=\"subjects\" class=\"sem1\">Semester 1</a><br/>";
                    echo "<a href=\"subjectlist.php?semester=Semester 2" . "&course=" . $_GET['course'] . "\" target=\"subjects\" class=\"sem2\">Semester 2</a><br/>";
                    echo "<a href=\"subjectlist.php?semester=Semester 3" . "&course=" . $_GET['course'] . "\" target=\"subjects\" class=\"sem3\">Semester 3</a><br/>";
                    echo "<a href=\"subjectlist.php?semester=Semester 4" . "&course=" . $_GET['course'] . "\" target=\"subjects\" class=\"sem4\">Semester 4</a><br/>";
                    ?>
                </div>

                <div class="subj1">
                    <iframe name="subjects" id="myFrame1" src="subjectlist.php?semester=null"></iframe>
                </div>

                <div class="book1">
                    <iframe name="books" id="myFrame2"></iframe>
                </div>
    
                <?php
            } else {
                ?>
                <div class="subj2">
                    <?php
                    $cname = "Certificate";
                    $qsubjects = "SELECT * FROM subject WHERE course = '$_GET[course]' AND semester = '$cname'";
                    $rqsubjects = mysql_query($qsubjects);
                    echo "<center><h3 style=\"color:black;\">Course Units</h3></center>";
                    echo "<hr/>";
                    echo "<ol type=\"1\">";
                    while ($row = mysql_fetch_array($rqsubjects)) {
                        echo "<li><a href=\"book.php?semester=Certificate" . "&course=" . $_GET['course'] . "&subject=" . $row['subname'] . "\" target=\"books\" class=\"cert\">" . $row['subname'] . "</a></li><br/>";
                    }
                    echo "</ol>";
                    ?>
                </div>
                <div class="book2">
                    <iframe name="books" id="myFrame3"></iframe>
                </div>
            <?php } ?>
        </section>
        
        <footer>
            <div style="float: left;">
                E-mail: info@saipali.education
            </div>
            <div style="float: right">
                Phone: +256785294797
            </div>
            <p>&copy; 2016 SITM</p>
        </footer>
</center>
</body>
</html>
