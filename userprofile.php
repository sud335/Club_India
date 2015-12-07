<?php
session_start();
if(isset($_SESSION["uname"])&&isset($_SESSION["fname"]))
{
$uname=$_SESSION["uname"];
$fname=$_SESSION["fname"];
echo "Hello,". $uname;


}
else
{
	echo "no proper session";
}
define('DB_HOST', 'localhost');
         define('DB_NAME', 'sgchk');
         define('DB_USER','sgchk');
         define('DB_PASSWORD','sgchk');
	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
	//$con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)or die("Failed to connect to MySQL: " . //mysql_error());
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());



$querycheck=  mysql_query("SELECT * FROM reviewdb WHERE uname IN ('$uname') ");
		
		$n = mysql_num_rows($querycheck);
	
	    //echo $n;
	
		if($n==0)
		{	

                        echo "<div style='font-size:30px; font-weight:600;'><br>No reviews were obtained based on this query</div>";
		}
		else
		{
			echo "<div id='pricerow' style=' padding: 10px; border-radius: 5px; background-color: palegoldenrod; width:500px;'>";
			while($row = mysql_fetch_array($querycheck))
			{
				  echo"<a target ='_parent' style=' cursor: pointer; cursor: hand; color: inherit; text-decoration: none;' href ='pubprof.php?name=".$row['pubname']."'><label id='pname' style='font-size: 30px;'>".$row['pubname']."</label>";
				  echo"<label id='over' style='font-size:30px; color: red; left: 400px; position: relative;'>".$row['overall']."/5</label><br>";
				  echo"<label id='amb' style='font-size: 20px;'>Ambience :".$row['ambi']."/5</label><br>";
				  echo"<label id='serv' style='font-size: 20px;'>Service :".$row['service']."/5</label><br>";
echo"<label id='comm' style='font-size: 20px;'>Mood:".$row['mood']."</label><br>";
echo"<label id='comm' style='font-size: 20px;'>Occasion:".$row['occasion']."</label><br>";
				  echo"<label id='comm' style='font-size: 20px;'>Comment:<div style='font-size:30px'>".$row['comment']."</div></label><br>";
				  echo"<label id='date' style='font-size: 10px;'>".$row['date']."</label>";
                                  echo"<h2 style='background-color: #ff9900; height: 5px; width:100%;'>    </h2>";
				}
			}




?>

<html>
<body>

This the user profile of <?php echo $fname;?>
</body>
</html>

