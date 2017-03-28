
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/book.css"/>
    </head>
    <body style="border-left-width: 2%; border-left-color: green; border-left-style: solid;">
    <base target="_parent"/>
    <?php
    include 'php/connection.php';
    $sub = $_GET['subject'];
    $sem = $_GET['semester'];
    $course = $_GET['course'];

    $sqbook = "SELECT * FROM books WHERE SUBJECT = '$sub' AND SEM = '$sem'";
    $qbook = mysql_query($sqbook);
    echo "<center><h3>Available Books</h3></center>";
    echo "<hr/>";
    echo "<ol type=\"1\">";
    while ($row = mysql_fetch_array($qbook)) {
        echo "<li><a href=\"read.php?course=" . $course . "&filen=" . $row['FILE_NAME'] . "\">" . $row['TITLE'] . "</a></li>";
    }
    echo "</li>";
    ?>
</body>
</html>