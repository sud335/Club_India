<?php

	//echo "in run";
         define('DB_HOST', 'localhost');
         define('DB_NAME', 'sgchk');
         define('DB_USER','sgchk');
         define('DB_PASSWORD','sgchk');
	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
	//$con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)or die("Failed to connect to MySQL: " . //mysql_error());
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	//echo "<br> db success!!<br>";
	if(isset($_POST['multi'])&&isset($_POST['mood']))
	{
		
		
		$multi=$_POST['multi'];
		$mood=$_POST['mood'];
		
		if(!is_array($multi)||!is_array($mood))
		{
			echo "<div style='font-size:30px; font-weight:600;'><br>Please Enter a Search Query</div>";
			exit;
		}
		
		foreach($_POST['multi'] as $multi)
		{
			$multiarray[]=mysql_real_escape_string($multi);		
			echo "<div style='font-size:30px; font-weight:600;'>(for price-range: ".$multi." )</div>";
		}
		$multis = implode("','",$multiarray);
		
		foreach($_POST['mood'] as $mood)
		{
			$moodarray[]=mysql_real_escape_string($mood);		
			echo "<div style='font-size:30px; font-weight:600;'>(for the mood :".$mood." )</div>";
		}
		$moods = implode("','",$moodarray);
		
		$querycheck=  mysql_query("SELECT * FROM newpub WHERE costtwo IN ('$multis') AND mood IN ('$moods')");
		
		$n = mysql_num_rows($querycheck);
	
	    //echo $n;
	
		if($n==0)
		{	

                        echo "<div style='font-size:30px; font-weight:600;'><br>No results were obtained based on this query</div>";
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
	
	elseif(isset($_POST['multi']))
	{		
		//echo "2nd if";
		$multi=$_POST['multi'];
		
		if(!is_array($multi))
		{ 
			
			echo "<div style='font-size:30px; font-weight:600;'><br>Please Enter a Search Query</div>";
			exit;
		}		
		//$cost="<250";
		//$querycheck=  mysql_query("select * from newpub where costtwo= '$cost'");
		
		foreach($_POST['multi'] as $multi)
		{
			$multiarray[]=mysql_real_escape_string($multi);		
			echo "<div style='font-size:30px; font-weight:600;'>(for price-range: ".$multi." )</div>";
		}
		
		$multis = implode("','",$multiarray);
		
		$querycheck=  mysql_query("SELECT * FROM newpub WHERE costtwo IN ('$multis')");
		
		$n = mysql_num_rows($querycheck);
	
	    //echo $n;
	
		if($n==0)
		{	
			 echo "<div style='font-size:30px; font-weight:600;'><br>No results were obtained based on this query</div>";
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
	else if(isset($_POST['mood']))
	{
		//echo "3rd if";
		$mood=$_POST['mood'];
		
		if(!is_array($mood))
		{ 
			
			echo "<div style='font-size:30px; font-weight:600;'><br>Please Enter a Search Query</div>";
			exit;
		}		
			
		foreach($_POST['mood'] as $mood)
		{
			$moodarray[]=mysql_real_escape_string($mood);		
			echo "<div style='font-size:30px; font-weight:600;'>(for the mood: ".$mood." )</div>";
		}
		
		$moods = implode("','",$moodarray);
		
		$querycheck=  mysql_query("SELECT * FROM newpub WHERE mood IN ('$moods')");
		
		$n = mysql_num_rows($querycheck);
	
	   // echo $n;
	
		if($n==0)
		{	
			 echo "<div style='font-size:30px; font-weight:600;'><br>No results were obtained based on this query</div>";
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

elseif(isset($_POST['occ']))
	{		
		//echo "2nd if";
		$occ=$_POST['occ'];
		
		if(!is_array($occ))
		{ 
			
			echo "<div style='font-size:30px; font-weight:600;'><br>Please Enter a Search Query</div>";
			exit;
		}		
		//$cost="<250";
		//$querycheck=  mysql_query("select * from newpub where costtwo= '$cost'");
		
		foreach($_POST['occ'] as $occ)
		{
			$occarray[]=mysql_real_escape_string($occ);		
			echo "<div style='font-size:30px; font-weight:600;'>(for price-range: ".$occ." )</div>";
		}
		
		$occs = implode("','",$occarray);
		
		$querycheck=  mysql_query("SELECT * FROM newpub WHERE costtwo IN ('$occs')");
		
		$n = mysql_num_rows($querycheck);
	
	    //echo $n;
	
		if($n==0)
		{	
			 echo "<div style='font-size:30px; font-weight:600;'><br>No results were obtained based on this query</div>";
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
echo "<div style='font-size:30px; font-weight:600;'><br>Please Enter a Search Query</div>";
		
	}
	
?>
<html>
<head><base target="_parent" /></head>
<script type='text/javascript'>
console.log("hello");
</script>
</html>