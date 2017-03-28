<html>
    <head>
        <title>Upload Books</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/general.css"/>
        <link rel="stylesheet" type="text/css" href="css/upload_book.css"/>
    </head>
    <body>
    <center>
        <header>
            <img src="images/logo.png" class="logo"/>
            <div class="heading">
                SITM E-Library
            </div>
            <div style="font-size: 16pt; padding-top: 12px; color: blue; line-height: .5">
                Welcome<br/>

                <?php
                include 'php/connection.php';
                session_start();
                $s_id = $_SESSION['admin_id'];
                
                $coursename = $_GET['course'];

                if (empty($s_id)) {
                    header('Location: index.php');
                }

                $query = "SELECT * FROM administrators WHERE ID = $s_id";
                $result = mysql_query($query);
                $admin = mysql_fetch_array($result);
                ?>

                <p><?php echo $admin['NAME']; ?></p>
                <a href="logout.php" style="background-color: green; color: white; border-radius: 10%; font-size: 20pt;">Logout</a>
                <a href="admin.php" style="background-color: green; color: white; border-radius: 10%; font-size: 20pt;">Home</a>
            </div>
        </header>
        <hr/>
    </center>
    <section>
        <div class="the_form">
            <center><h1>Add Subject</h1></center>
            <form action="addsubject.php" method="post">
                Enter Subject Name<br/>
                <input type="text" name="subj" class="input"/><br/>
                <input type="hidden" name="course" value="<?php echo $_GET['course']; ?>"/>
                Semester of Study
                <select name="sem_s">  
                    <option>Semester 1</option>
                    <option>Semester 2</option>
                    <option>Semester 3</option>
                    <option>Semester 4</option>
                    <option>Certificate</option>
                </select><br/>
                <input type="submit" name="subdone" value="Add" class="submit"/>
            </form>

            <center> <h1>Upload a Book</h1> </center>
            <form action="" method="POST" enctype="multipart/form-data">
                Author of Book<br/><input type="text" name="author" class="input"/><br/><br/>
                Title of Book<br/><input type="text" name="title" class="input"/><br/><br/>
                Semester of Study
                <select name="sem_year">  
                    <option>Semester 1</option>
                    <option>Semester 2</option>
                    <option>Semester 3</option>
                    <option>Semester 4</option>
                    <option>Certificate</option>
                </select><br/><br/>
                
                <?php
                $queryall = "SELECT * FROM `subject` WHERE `course`='$coursename'";
                $resultall = mysql_query($queryall);
                
                echo "Subject     ";
                echo "<select name=\"subs\">";
                while ($row = mysql_fetch_array($resultall)) {
                ?>
                <option><?php echo $row['subname'] ?></option>
                <?php
                }
                echo "<select>";
                ?>
                <br/><br/>
                Book File(Only PDF)<br/><input type="file" name="file[]" class="input"/><br/><br/>
                <center>   <input type="submit" value="Upload" name="upload" class="submit"/> </center>
            </form>
            <?php
            include 'php/connection.php';

            if (isset($_POST['upload'])) {
                $author = $_POST['author'];
                $title = $_POST['title'];
                $course = $_GET['course'];
                $sem_year = $_POST['sem_year'];
                $subs = $_POST['subs'];

                foreach ($_FILES['file']['tmp_name'] as $key => $name_temp) {
                    $name = $_FILES['file']['name'][$key];
                    $tmpnm = $_FILES['file']['tmp_name'][$key];
                    $dir = "books/" . $course . "/" . $name;
                    $move = move_uploaded_file($tmpnm, $dir);

                    if (!empty($author) && !empty($title) && !empty($course) && !empty($sem_year) && !empty($subs)) {
                        if ($move) {
                            $queryb = "INSERT INTO `books` VALUES ('', '$author', '$title', '$course', '$subs', '$sem_year', '$name')";
                            $upl = mysql_query($queryb);
                            if ($upl) {
                                echo "<script>alert('Data Uploaded Succesfully.')</script>";
                            } else {
                                echo "<script>alert('Failed.... Error')</script>";
                            }
                        }
                    } else {
                        echo "<script>alert('All Fields are required')</script>";
                    }
                }
            }

            ?>
        </div>
        <center>
            <div class="the_books">
                <center><h1>Uploaded Books</h1></center>
                <?php
                include 'php/connection.php';
                $subjectd = $_GET['course'];
                $query = "SELECT * FROM `books` WHERE `COURSE`='$subjectd'";
                $result = mysql_query($query);


                while ($book = mysql_fetch_array($result)) {
                    echo "<table border=\"1\">"
                    . "<tc><td  width=\"100\">" . $book['AUTHOR'] . "</td></tc>"
                    . "<tc><td  width=\"100\">" . $book['TITLE'] . "</td></tc>"
                    . "<tc><td  width=\"50\">" . $book['COURSE'] . "</td></tc>"
                    . "<tc><td  width=\"80\">Year " . $book['SEM'] . "</td></tc>"
                    . "<tc><td  width=\"450\">" . $book['FILE_NAME'] . "</td></tc>"
                    . "<tc><td  width=\"100\">" . "<a href=\"delete_book.php?id=" . $book['ID'] . "&course=".$_GET['course']."\">Delete</a></td></tc>"
                    . "</table>";
                }
                ?>
            </div>
        </center>

    </section>

</body>
</html>
