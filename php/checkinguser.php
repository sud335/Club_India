<?php
session_start();
$con=mysql_connect("localhost","sgchk","sgchk") or die("Failed to connect".mysql_error());

mysql_select_db("sgchk",$con) or die("Failed to connect db".mysql_error());


$uname=$_POST['name'];
$pass=$_POST['pass'];
$lname=$_POST['ln'];
$fname=$_POST['fn'];
$email=$_POST['email'];
$date = date('Y-m-d');


$queryreg = mysql_query("INSERT INTO `sgchk`.`user`(`id`, `uname`, `pass`, `email`, `fname`, `lname`, `date`) VALUES (NULL,'$uname','$pass','$email','$fname','$lname','$date')") or die(mysql_error());

if($queryreg){
$_SESSION["uname"] =$uname;
$_SESSION["fname"] =$fname;

echo 'Data Submitted';

}
else{
echo 'Unsuccessful login';

}
?>
