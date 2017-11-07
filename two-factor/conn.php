<?php
session_start();
$conn = mysql_connect("localhost", "root", "") or die(mysql_error());
$DB = mysql_select_db("student", $conn) or die(mysql_error());
date_default_timezone_set('Asia/Kolkata');
?>