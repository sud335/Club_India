<?php

$con=mysql_connect("localhost","sgchk","sgchk") or die("Failed to connect".mysql_error());

mysql_select_db("sgchk",$con) or die("Failed to connect db".mysql_error());
if(isset($_POST['name'])){
$name=$_POST['name'];

 $querycheck=  mysql_query("select uname from user where uname = '$name'");
             $n = mysql_num_rows($querycheck); 
if($n==0){
echo 'Valid';

}
else{
echo 'Username exists';

}
}
?>