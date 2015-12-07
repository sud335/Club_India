<?php

    session_start();

   $pubname=$_GET['name'];
   $dir="reviewsubmit.php?pubname=$pubname";//check logged in or not.
   $dirfetch="reviewfetch.php?pubname=$pubname";
    $diredit="pubprofileedit.php?pubname=$pubname";
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'sgchk');
   define('DB_USER','sgchk');
   define('DB_PASSWORD','sgchk');

	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
	//$con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)or die("Failed to connect to MySQL: " . mysql_error());
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	
	if($pubname)
	{
		$querycheck=  mysql_query("select * from newpub where pubname = '$pubname' ");
		$n = mysql_num_rows($querycheck); 
		
		if($n==1)
        {
			$row=mysql_fetch_array($querycheck);
			
			$add=$row['address'];
			$mob=$row['mob'];
			$costtwo=$row['costtwo'];
			$timing=$row['schedule'];
			$city=$row['city'];
			$rating=$row['rating'];
			
			$menu=$row['menu'];
			$media=$row['media'];		
			
		}	
		else
		{
			echo "error";
		}
		
	
	}
	

       
?>
<html>
     <head>
      
      <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Pub profile</title>
		<meta name="description" content="pubs in bangalore and goa" />
		<meta name="keywords" content="pub,bangalore,goa,club" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		
		<link rel="stylesheet" type="text/css" href="css/pubprofcss.css" />
		<script src="js/modernizr.custom.js"></script>
     </head>
     <body>
             <table border="0" > 
             <div id="bod">
             <label style="font-size:40px; float:left;" id="club" >Club India</label>
	<?php
                 if(($_SESSION["uname"]=="admin")&&($_SESSION["fname"]=="administrator"))
		{
			$uname=$_SESSION["uname"];
			$fname=$_SESSION["fname"];
			//echo $uname;
			//echo $fname;
			echo "<div id='lefty'>";
            
			echo "Hi , <a href='admin.php' id='log' style='color: #D35400'>$fname&nbsp;&nbsp;&nbsp;</a>";
			echo  "<a href='sessionlogout.php' id='pub' style='color: #D35400'>Logout&nbsp;</a>";
			echo "</div>";
		}


		else if(isset($_SESSION["uname"])&&isset($_SESSION["fname"]))
		{
			$uname=$_SESSION["uname"];
			$fname=$_SESSION["fname"];
			//echo $uname;
			//echo $fname;
			echo "<div id='lefty'>";
            
			echo "Hi , <a href='userprofile.php' id='log' style='color: #D35400'>$fname&nbsp;&nbsp;&nbsp;</a>";
			echo  "<a href='sessionlogout.php' id='pub' style='color: #D35400'>Logout&nbsp;</a>";
			echo "</div>";
		}
                else if(isset($_SESSION["uname"])&&isset($_SESSION["pubname"]))
		{
			$uname=$_SESSION["uname"];
			$fname=$_SESSION["pubname"];
                        $dirlink="pubprof.php?name=".$fname;
			//echo $uname;
			//echo $fname;
			echo "<div id='lefty'>";
            
			echo "Hi , <a href='$dirlink' id='log' style='color: #D35400'>$fname&nbsp;&nbsp;&nbsp;</a>";
			echo  "<a href='sessionlogout.php' id='pub' style='color: #D35400'>Logout&nbsp;</a>";
			echo "</div>";
		}
		else
		{
			echo "<div id='lefty'>";
            
			echo "<a href='sing.php' id='log' style='color: #D35400'> Login! &nbsp;&nbsp;&nbsp;</a>";
			echo  "<a href='pubreg.php' id='pub' style='color: #D35400'> Register a pub! &nbsp;</a>";
			echo "</div>";

        }     
        ?>
       
                  
        
              <h2 id="line"> </h2>
              <div id="wholeprof">
                  <br><br>
                  <label id="pubname"><?php echo $pubname?> </label><br><br><br>
                  <label for="address" id="labadd"> Address:</label> &nbsp;&nbsp;
                  <label id="address"><?php echo $add?> </label><br><br>
				  <label for="city" id="labcit"> City: </label> &nbsp;&nbsp;
                  <label id="city"><?php echo $city?> </label><br><br>
                  <label for="mobile" id="labmob"> Phone:</label>&nbsp;&nbsp;
                  <label id="mobile"><?php echo $mob?> </label><br><br>
                  <label for="cost" id="labcost"> Cost for two:</label>&nbsp;&nbsp;
                  <label id="cost"><?php echo $costtwo?> </label><br><br>
                  <label for="timing" id="labtime"> Timings:</label> &nbsp;&nbsp;
                  <label id="timing"><?php echo $timing?> </label><br><br>
                    <label for="media" id="media"> Media:</label> 
				  <?php
				  $images = glob($media."*");
				  foreach($images as $image){
				  echo '<img src="'.$image.'" alt="show menu" id="menu" height="100" width="100">'."&nbsp;&nbsp;";
				  }
				  ?>	  
				  
				  <label for="menu" id="menu"> Menu:</label> &nbsp;&nbsp;				  
				  <?php
				  $images = glob($menu."*");
				  foreach($images as $image){
				  echo '<img src="'.$image.'" alt="show photos" id="photo" height="100" width="100">'."&nbsp;&nbsp;";
				  }
				  ?>
				  <br> <br> <br>
                  <div id="back">
            <i class="fa fa-hand-o-left"></i>
            <a href="result.php" >Go Back </a>
            </div>
                  </div>


                <?php 
                        if(isset($_SESSION["uname"])&&isset($_SESSION["fname"]))
		       {          
                          echo "<a id='review' class='button' href='$dir'> REVIEW<br>". $pubname."</a>";
                        }
                       else if(isset($_SESSION["uname"])&&isset($_SESSION["pubname"])&&($_SESSION["pubname"]==$pubname))
		       {          
                          echo "<a id='review' class='button' href='$diredit'> EDIT DETAILS</a>";
                        }
                                       
                        else
                        {
                         echo "<a  id='review'  class='button' href='sing.php'>REVIEW<br>". $pubname."</a>";
                         
                         }

                   ?>



                  <div id="rate">
                      <a href="review.html">
                          <label for="rating" id="labrate"> Rating:</label> <br>
                  <label id="rating"><?php echo $rating?> </label>
                      </a>
                  </div>
              <label id="labrev"> Reviews:</label>
              <div id="reviews">
                  <iframe src =<?php echo $dirfetch;?> name="reviewresult" frameborder="0" width="610" height="600" seamless></iframe>
                  
              </div>
                  
         </div>
</table>

     </body>
</html>