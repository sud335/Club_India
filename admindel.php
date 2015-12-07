<?php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'sgchk');
   define('DB_USER','sgchk');
   define('DB_PASSWORD','sgchk');


   $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
   $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

	if(isset($_GET['pubname']))
	{
		$myvar=$_GET['pubname'];
		//echo $myvar;
		$querycheck=  mysql_query("DELETE FROM newpub WHERE pubname='$myvar'");
		if($querycheck)
		{
			header("location:admin.php");
			
		}
		
		else 
		{
			echo "not deleted";
		}
	}
?>
