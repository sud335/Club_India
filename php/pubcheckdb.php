<?php

session_start();
$con=mysql_connect("localhost","sgchk","sgchk") or die("Failed to connect".mysql_error());

mysql_select_db("sgchk",$con) or die("Failed to connect db".mysql_error());
if(isset($_POST['name'])){
$name=$_POST['name'];
$pass=$_POST['pass'];

 $querycheck=  mysql_query("select * from newpub where uname = '$name' and pass='$pass'");
             $n = mysql_num_rows($querycheck); 
if(!$n==0){
$row  = mysql_fetch_array($querycheck);
$_SESSION["uname"] =$row[uname];
$_SESSION["pubname"] =$row[pubname];
echo 'valid';
}
else{
echo 'Invalid Username/Password';

}
}
?>