<?php
session_start();
unset($_SESSION["uname"]);
unset($_SESSION["fname"]);
header("Location:http://clubingindia.com/public_html/loggedin/testsession.php");
?>

