<?php

   define('DB_HOST', 'localhost');
   define('DB_NAME', 'sgchk');
   define('DB_USER','sgchk');
   define('DB_PASSWORD','sgchk');


	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	
	if(isset($_GET['pubname']))
	{
	    $myvar = $_GET['pubname'];
		
		$querycheck=  mysql_query("SELECT * FROM reviewdb WHERE pubname = '$myvar' ORDER BY date DESC");
		
		$n = mysql_num_rows($querycheck);


		if($n==0)
		{	
			echo "No reviews have been made"; 
		}
		else
		{
			
			while($row = mysql_fetch_array($querycheck))
			{

				
				echo "<div style='font-size:30px'><b>".$row['uname']."</b> rated:";	
				
				$full=floor($row['overall']);
				for($i=0 ; $i<$full ;$i++)
				{
					echo "★";
				}
				$empty=5-$full;
				for($i=0 ; $i<$empty;$i++)
				{
					echo "☆";
				}
				echo "</div><br>";
				//-------------------
				echo "<div style='font-size:20px;'>Ambience:";
				$full=floor($row['ambi']);
				for($i=0 ; $i<$full ;$i++)
				{
					echo "★";
				}
				$empty=5-$full;
				for($i=0 ; $i<$empty;$i++)
				{
					echo "☆";
				}	
echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";			
				echo "Service:";
				//-------------
				$full=floor($row['service']);
				for($i=0 ; $i<$full ;$i++)
				{
					echo "★";
				}
				$empty=5-$full;
				for($i=0 ; $i<$empty;$i++)
				{
					echo "☆";
				}
				echo "<br>";
	           
				//-----------------
				echo "Occasion:";
				echo $row['occasion'];
echo"<br>";
				echo "Mood : ".$row['mood']."<br>";
				//-----------------
				
	            
				echo "Comment: <b>".$row['comment']."</b>";			
				echo "</div><div style='font-size:10px;'>".$row['date']."</div>";	
				echo "<br>";
				echo"<h2 style='background-color: #ff9900; height: 5px; width:100%;'>    </h2>";
echo"";

			}
			
		
		}
		
	}
	else
	{
	  echo "None has reviewed for this pub..";
	}
	

?>