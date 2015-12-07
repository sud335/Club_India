<?php

   define('DB_HOST', 'localhost');
   define('DB_NAME', 'sgchk');
   define('DB_USER','sgchk');
   define('DB_PASSWORD','sgchk');

	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
	//$con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)or die("Failed to connect to MySQL: " . //mysql_error());
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	
	if(isset($_GET['price']))	
	{
		$myvar = $_GET['price'];
		echo "<div style='font-size:30px; font-weight:600;'>(for price-range ".$myvar." )</div>";
		$querycheck=  mysql_query("SELECT * FROM newpub WHERE costtwo = '$myvar'");
		
		$n = mysql_num_rows($querycheck);

		if($n==0)
		{	
			echo "<div style='font-size:30px; font-weight:600;'><br>No results were obtained based on your query</div>";
		}
		else
		{

			
			echo "<div id='pricerow' style=' padding: 10px; border-radius: 5px; background-color: palegoldenrod;'>";
			while($row = mysql_fetch_array($querycheck))
			{

echo"<br>";

            echo"<a target ='_parent' style=' cursor: pointer; cursor: hand; color: inherit; text-decoration: none;' href ='pubprof.php?name=".$row['pubname']."'> <label id='name' style='font-family:Copperplate Gothic Light; font-size: 30px;'>".$row['pubname'].",</label></a>";
            echo"<label id='city' style='font-size: 10px;'>".$row['city']."</label>";
            echo"<br><br>";
            echo"<label id='address' style='font-size: 20px;'>".$row['address']."</label>";
            echo"<br>";
           echo" <label id='rating' style='font-size:30px; color: red; top:-60px; left: 600px; position: relative;'>".$row['rating']."</label>";
echo"<h2 style='background-color: #ff9900; height: 5px; width:100%;'>    </h2>";
echo"<br><br>";
								
			}
			echo "</div>";
		}
	}
	else if(isset($_GET['mood']))
	{
		$myvar = $_GET['mood'];
		echo "<div style='font-size:30px; font-weight:600;'>(for the mood ".$myvar." )</div>";
		
		$querycheck=  mysql_query("SELECT * FROM newpub WHERE mood = '$myvar'");
		
		$n = mysql_num_rows($querycheck);

		if($n==0)
		{	
			echo "<div style='font-size:30px; font-weight:600;'><br>No results were obtained based on your query</div>";
		}
		else
		{		
			echo "<div id='pricerow' style=' padding: 10px; border-radius: 5px; background-color: palegoldenrod;'>";
			while($row = mysql_fetch_array($querycheck))
			{

echo"<br>";

            echo"<a target ='_parent' style=' cursor: pointer; cursor: hand; color: inherit; text-decoration: none;' href ='pubprof.php?name=".$row['pubname']."'> <label id='name' style='font-family:Copperplate Gothic Light; font-size: 30px;'>".$row['pubname'].",</label></a>";
            echo"<label id='city' style='font-size: 10px;'>".$row['city']."</label>";
            echo"<br><br>";
            echo"<label id='address' style='font-size: 20px;'>".$row['address']."</label>";
            echo"<br>";
           echo" <label id='rating' style='font-size:30px; color: red; top:-60px; left: 600px; position: relative;'>".$row['rating']."</label>";
echo"<h2 style='background-color: #ff9900; height: 5px; width:100%;'>    </h2>";
echo"<br><br>";
								
			}
			echo "</div>";
		}
		
	}
	else if(isset($_GET['occasion']))
	{
		$myvar = $_GET['occasion'];
		echo "<div style='font-size:30px; font-weight:600;'>(for the occasion ".$myvar." )</div>";
		$querycheck=  mysql_query("SELECT * FROM newpub WHERE occasion = '$myvar'");
		
		$n = mysql_num_rows($querycheck);

		if($n==0)
		{	
			echo "<div style='font-size:30px; font-weight:600;'><br>No results were obtained based on your query</div>";
		}
		else
		{		
			echo "<div id='pricerow' style=' padding: 10px; border-radius: 5px; background-color: palegoldenrod;'>";
			while($row = mysql_fetch_array($querycheck))
			{

echo"<br>";

            echo"<a target ='_parent' style=' cursor: pointer; cursor: hand; color: inherit; text-decoration: none;' href ='pubprof.php?name=".$row['pubname']."'> <label id='name' style='font-family:Copperplate Gothic Light; font-size: 30px;'>".$row['pubname'].",</label></a>";
            echo"<label id='city' style='font-size: 10px;'>".$row['city']."</label>";
            echo"<br><br>";
            echo"<label id='address' style='font-size: 20px;'>".$row['address']."</label>";
            echo"<br>";
           echo" <label id='rating' style='font-size:30px; color: red; top:-60px; left: 600px; position: relative;'>".$row['rating']."</label>";
echo"<h2 style='background-color: #ff9900; height: 5px; width:100%;'>    </h2>";
echo"<br><br>";
								
			}
			echo "</div>";
			
		}
	}
	else if(isset($_GET['rating']))
	{
		$myvar = $_GET['rating'];
		echo "<div style='font-size:30px; font-weight:600;'>(for rating ".$myvar." )</div>";
		
               $querycheck=  mysql_query("SELECT * FROM newpub ORDER BY '$myvar' DESC");  
		
		$n = mysql_num_rows($querycheck);

                
		if($n==0)
		{	
			echo "<div style='font-size:30px; font-weight:600;'><br>No results were obtained based on your query</div>";
		}
		else
		{		
			echo "<div id='pricerow' style=' padding: 10px; border-radius: 5px; background-color: palegoldenrod;'>";
			while($row = mysql_fetch_array($querycheck))
			{

echo"<br>";

            echo"<a target ='_parent' style=' cursor: pointer; cursor: hand; color: inherit; text-decoration: none;' href ='pubprof.php?name=".$row['pubname']."'> <label id='name' style='font-family:Copperplate Gothic Light; font-size: 30px;'>".$row['pubname'].",</label></a>";
            echo"<label id='city' style='font-size: 10px;'>".$row['city']."</label>";
            echo"<br><br>";
            echo"<label id='address' style='font-size: 20px;'>".$row['address']."</label>";
            echo"<br>";
           echo" <label id='rating' style='font-size:30px; color: red; top:-60px; left: 600px; position: relative;'>".$row['rating']."</label>";
echo"<h2 style='background-color: #ff9900; height: 5px; width:100%;'>    </h2>";
echo"<br><br>";
								
			}
			echo "</div>";
								
			
			
		}
	}
	else if(isset($_GET['search']))
	{
		$myvar = $_GET['search'];
		echo "<div style='font-size:30px; font-weight:600;'>(for ".$myvar." )</div>";
		
		$querycheck=  mysql_query("SELECT * FROM newpub WHERE pubname = '$myvar'");
		
		$n = mysql_num_rows($querycheck);

		if($n==0)
		{	
			echo "<div style='font-size:30px; font-weight:600;'><br>No results were obtained based on your query</div>";
		}
		else
		{
				
			echo "<div id='pricerow' style=' padding: 10px; border-radius: 5px; background-color: palegoldenrod;'>";
			while($row = mysql_fetch_array($querycheck))
			{

echo"<br>";

            echo"<a target ='_parent' style=' cursor: pointer; cursor: hand; color: inherit; text-decoration: none;' href ='pubprof.php?name=".$row['pubname']."'> <label id='name' style='font-family:Copperplate Gothic Light; font-size: 30px;'>".$row['pubname'].",</label></a>";
            echo"<label id='city' style='font-size: 10px;'>".$row['city']."</label>";
            echo"<br><br>";
            echo"<label id='address' style='font-size: 20px;'>".$row['address']."</label>";
            echo"<br>";
           echo" <label id='rating' style='font-size:30px; color: red; top:-60px; left: 600px; position: relative;'>".$row['rating']."</label>";
echo"<h2 style='background-color: #ff9900; height: 5px; width:100%;'>    </h2>";
echo"<br><br>";
								
			}
			echo "</div>";
			
		}
	}
        else
        {
              echo "<div style='font-size:30px; font-weight:600;'><br>No results were obtained based on your query</div>";
        }

?>
<html>

</html>