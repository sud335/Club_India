<?php
session_start();
unset($_SESSION["uname"]);
unset($_SESSION["fname"]);
unset($_SESSION["pubname"]);
header("Location:http://clubingindia.com/public_html/beer2.php");
?>

