<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'E_Library';

$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Server Error: ' . mysql_error());
mysql_select_db($dbname) or die ('DB Error: Unable to select db');

?>