<?php
	session_start();
	$pubname=$_GET['pubname'];
	//echo $pubname;
	$uname=$_SESSION["uname"];
	$fname=$_SESSION["fname"];

	
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'sgchk');
   define('DB_USER','sgchk');
   define('DB_PASSWORD','sgchk');

   $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
   $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
  
    //$uname=$_POST['uname'];
	$mood=$_POST['mood'];
	$ambi=$_POST['ambi'];
	$service=$_POST['service'];
	$overall=$_POST['overall'];
	$occasion=$_POST['occasion'];
	$comment=$_POST['comment'];
	$date = date('Y-m-d');
	
        //echo $mood;
	foreach($_POST['ambi'] as $ambi)
	{
		$ambiarray[]=mysql_real_escape_string($ambi);		
	}
	//echo $ambi;
	
	foreach($_POST['service'] as $service)
	{
		$servicearray[]=mysql_real_escape_string($service);	
	}
	//echo $service;
	
    foreach($_POST['overall'] as $overall)
	{
		$overallarray[]=mysql_real_escape_string($overall);	
	}
	//echo $overall;
	//echo $occasion;
	//echo $comment;
	
	//insert into review DB
	$query = "INSERT INTO `sgchk`.`reviewdb`(`pubname`,`uname`,`mood`,`ambi`,`service`,`occasion`,`overall`,`comment`,`date`)VALUES('$pubname','$uname','$mood','$ambi','$service','$occasion','$overall','$comment','$date')";
	
	$data = mysql_query($query)or die(mysql_error());


	
	//--------------------------------------------
	//calculating and inserting into newpub db
	$querycheck=  mysql_query("SELECT * FROM reviewdb WHERE pubname = '$pubname'");
	
	$n = mysql_num_rows($querycheck);
	
	//echo $n;
	
	$totalover=0.0;
	$totalambi=0.0;
	$totalserv=0.0;
	while($row = mysql_fetch_array($querycheck))
	{
		$totalover+=$row['overall'];
		$totalambi+=$row['ambi'];
		$totalserv+=$row['service'];
	}
	
	
	$over=$totalover/$n;
	$ambi=$totalambi/$n;
	$serv=$totalserv/$n;
	//echo $over;
	
	$query = "UPDATE `sgchk`.`newpub` SET rating = '$over' , ambi = '$ambi', service ='$serv' WHERE pubname ='$pubname';";
	
	$data = mysql_query($query)or die(mysql_error());
	if(($data))
	{
		header("location:http://clubingindia.com/public_html/pubprof.php?name=$pubname");
		//echo"<br><br>inserted succesfully<br>";
	}
	
?>