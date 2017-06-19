<?php
include("db.php");		
$userid = $_POST['userid'];
$uname = $_POST['uname'];
$descr = $_POST['descr'];
mysql_query("UPDATE task SET uname='$uname',descr='$descr',date_u=now() WHERE userid = '$userid'");

header("Location: view.php");
?>