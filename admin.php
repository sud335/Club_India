<?php

	session_start();
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'sgchk');
   define('DB_USER','sgchk');
   define('DB_PASSWORD','sgchk');
	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());

	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	
	$querycheck=  mysql_query("SELECT * FROM newpub");
		
	$n = mysql_num_rows($querycheck);
	
	    //echo $n;
	
		if($n==0)
		{	
			echo " No results were obtained based on your query";
		}
		else
		{
			echo "<table border='1' width='400'>";
			while($row = mysql_fetch_array($querycheck))
			{

				echo "<tr>";
				echo "<td>Pub Name:".$row['pubname']."</td>";
				echo "<td>City: <h4>".$row['city']."</h4></td>";
				//echo $row['city'];
				echo "</tr><tr>";
				echo "<td>Address:".$row['address']."</td>";			
				echo "<td>Rating:".$row['rating']."</td>";
				echo "</tr><tr>";
				echo "<td><button><a target ='_parent' href ='admindel.php?pubname=".$row['pubname']."'>DELETE</a></button></td>" ;
				echo "<td><button><a target ='_parent' href ='pubprofileedit.php?name=".$row['pubname']."'>UPDATE</a></button></td>" ;

				echo "</tr>";				
			}
			echo"</table>";
		}	
	

?>
<html>
<head><base target="_parent" /></head>
<script type='text/javascript'>
console.log("hello");
</script>
</html>
