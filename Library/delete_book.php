<?php

include 'php/connection.php';

$delb = "SELECT * FROM books WHERE ID = $_GET[id]";
$rund = mysql_query($delb);
while ($row = mysql_fetch_array($rund)) {
    $filename = $row['FILE_NAME'];

    unlink("books/" . $_GET['course'] . "/" . $filename);
    mysql_query("DELETE FROM books WHERE ID = $_GET[id]") or die(mysql_error());
    header('Location: upload_book.php?course=' . $_GET['course']);
}
?>