<?php

include 'php/connection.php';

session_start();
$_SESSION['user_id'];
$_SESSION['admin_id'];

$_SESSION = array();
if ($_COOKIE[session_name()]) {
    setcookie(session_name(), '', time()-42000, '/');
}

session_destroy();
header('Location:index.php');


?>