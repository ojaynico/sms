<?php

include './php/connection.php';

if (isset($_POST['subdone'])) {
    $subj = $_POST['subj'];
    $subject = $_POST['course'];
    $sem = $_POST['sem_s'];

    if (!empty($subj) && !empty($subject) && !empty($sem)) {
        $querys = "INSERT INTO `subject` VALUES ('', '$subj', '$subject', '$sem')";
        $inserts = mysql_query($querys);
        if ($inserts) {
            header("Location: upload_book.php?course=" . $subject);
        } else {
            echo "<script>alert('Failed.... Error')</script>";
        }
    } else {
        echo "<script>alert('All Fields are required')</script>";
    }
}
?>
