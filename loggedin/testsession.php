<?php
session_start();
if(isset($_SESSION["uname"])&&isset($_SESSION["fname"]))
{
$uname=$_SESSION["uname"];
$fname=$_SESSION["fname"];
echo $uname;
echo $fname;

echo "<a href='testsessionlogout.php'>logout</a>"; 

}
else
{
	echo "no proper session";
}

?>

