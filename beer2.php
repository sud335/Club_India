<?php
session_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
      <base target="_parent" />
      <meta charset="UTF-8" />	 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Home</title>
		<meta name="description" content="Find a pub to drinka at" />
		<meta name="keywords" content="pub, drink, bangalore,goa" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/compnewest.css" />
		<script src="js/modernizr.custom.js"></script>
    </head>
    <body id="home" style=" background-image: url(css/beer.jpg)">
 
        
        
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
                        $dir="pubprof.php?name=".$fname;
			//echo $uname;
			//echo $fname;
			echo "<div id='lefty'>";
            
			echo "Hi , <a href='$dir' id='log' style='color: #D35400'>$fname&nbsp;&nbsp;&nbsp;</a>";
			echo  "<a href='sessionlogout.php' id='pub' style='color: #D35400'>Logout&nbsp;</a>";
			echo "</div>";
		}
		else
		{
			echo "<div id='lefty'>";
            
			echo "<a href='sing.php' id='log' style='color: #D35400'> UserLogin! &nbsp;&nbsp;&nbsp;</a>";
			echo  "<a href='publog.php' id='pub' style='color: #D35400'> PubLogin! &nbsp;</a>";
			echo "</div>";

        }     
        ?>
        <h2 id="line">    </h2>
        <div class="search">
        <div class="container demo-2">
        <div class="main clearfix">
				
				<div class="column">
                                        <form method=post name="search" action="result.php">
					<div id="dl-menu" class="dl-menuwrapper">
                                       
                                                  <input type="text" id="but" name="search" placeholder="Search Pub by keyword.." class="dl-trigger"/>
				        </form>

						<!--<button class="dl-trigger">Open Menu</button>-->
						<ul class="dl-menu">
							<li>
								<a href="#">Search by price</a>
									<ul class="dl-submenu">
                                                                    <li> <a href="#" onclick="document.pform.price.value='<200'; document.pform.submit(); return false">&lt;200</a></li>
														            <li> <a href="#" onclick="document.pform.price.value='200-500'; document.pform.submit(); return false"> 200-500 </a> </li>
                                                                    <li> <a href="#" onclick="document.pform.price.value='500-1000'; document.pform.submit(); return false"> 500-1000 </a></li>
                                                                    <li> <a href="#" onclick="document.pform.price.value='1000-2500'; document.pform.submit(); return false" > 1000-2500 </a></li>
                                                                    <li> <a href="#" onclick="document.pform.price.value='>2500'; document.pform.submit(); return false"> 2500&gt; </a></li>
																	<form method=post name="pform" action="result.php"><input type="hidden" name="price" value=""></form>
									</ul>
                             </li>
                             <li>
                                 <a href="#"> By mood.. </a>
									<ul class="dl-submenu">
											<li><a href="#" onclick="document.mform.mood.value='happy'; document.mform.submit(); return false">Happy</a></li>
											<li><a href="#" onclick="document.mform.mood.value='sad'; document.mform.submit(); return false">Sad</a></li>
											<li><a href="#" onclick="document.mform.mood.value='angry'; document.mform.submit(); return false">Angry</a></li>
											<form method=post name="mform" action="result.php"><input type="hidden" name="mood" value=""></form>
                                    </ul>
                             </li>
                             <li>
                                 <a href="#"> By occasion.. </a>
                                    <ul class="dl-submenu">
																	<li><a href="#" onclick="document.oform.occasion.value='birthday'; document.oform.submit(); return false">Birthday</a></li>
																	<li><a href="#" onclick="document.oform.occasion.value='hangout'; document.oform.submit(); return false">Hangout</a></li>
																	<li><a href="#" onclick="document.oform.occasion.value='romance'; document.oform.submit(); return false">Romantic getaway</a></li>
																	<form method=post name="oform" action="result.php"><input type="hidden" name="occasion" value=""></form>
                                    </ul>
                             </li>
                             <li>
                                 <a href="#"> By rating.. </a>
                                     <ul class="dl-submenu">
																	<li><a href="#" onclick="document.rform.rating.value='ambience'; document.rform.submit(); return false">Ambience</a></li>
																	<li><a href="#" onclick="document.rform.rating.value = 'price'; document.rform.submit(); return false">Price</a></li>
																	<li><a href="#" onclick="document.rform.rating.value='service'; document.rform.submit(); return false">Service</a></li>
																	<li><a href="#" onclick="document.rform.rating.value='overall'; document.rform.submit(); return false">Overall</a></li>
																	<form method=post name="rform" action="result.php"><input type="hidden" name="rating" value=""></form>
                                     </ul>
                             </li>
                             <li>
								 <a href="#"> By location.. </a>
                                     <ul class="dl-submenu">
																	<li><a href="#">Nearest location</a></li>
																	<li><a href="#">All of Bangalore</a></li>
																	<li><a href="#">Chennai</a></li>
																	<li><a href="#">Goa</a></li>
                                     </ul>
                             </li>
									
						</ul>
					</div><!-- /dl-menuwrapper -->
				</div>
			</div>
		</div><!-- /container -->
        </div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/jquery.dlmenu.js"></script>
		<script>
			$(function() {
				$( '#dl-menu' ).dlmenu({
					animationClasses : { classin : 'dl-animate-in-2', classout : 'dl-animate-out-2' }
				});
			});
		</script>
    </body>
</html>