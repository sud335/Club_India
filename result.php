<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

session_start();
if(isset($_POST['price']))
{
	$myvar = $_POST['price'];
	$dir="resultlink.php?price=".$myvar;
}
else if(isset($_POST['mood']))
{
	$myvar = $_POST['mood'];
	$dir="resultlink.php?mood=".$myvar;
}
else if(isset($_POST['occasion']))
{
	$myvar = $_POST['occasion'];
	$dir="resultlink.php?occasion=".$myvar;
}
else if(isset($_POST['rating']))
{
	$myvar = $_POST['rating'];
	$dir="resultlink.php?rating=".$myvar;
}
else if(isset($_POST['location']))
{
	$myvar = $_POST['location'];
	$dir="resultlink.php?location=".$myvar;
}
else if(isset($_POST['search']))
{
	$myvar =$_POST['search'];
	$dir="resultlink.php?search=".$myvar;
}


?>
<html>
    <head>
        <title>Result page</title>
        <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		

		<link rel="shortcut icon" href="../favicon.ico"> 
		
                <link rel="stylesheet" type="text/css" href="css/resultcss.css" />
		
    </head>
    <body style=" background-color:white;">
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

			echo "<div id='lefty'> Hi , <a href='userprofile.php' id='log' style='color: #D35400'>$fname&nbsp;&nbsp;&nbsp;</a>";
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

         <h2 id="line">    </h2>
 <form method=post name="search" action="result.php">
					<div id="dl-menu" class="dl-menuwrapper">
                                       
                                                  <input type="text" id="but" name="search" placeholder="Search Pub by keyword.." class="dl-trigger"/>
				        </form>
       
            
				<form id="search" method="POST" action="run.php" target="result">
                                    
                                    
                                     <div style=" z-index: 2; border:solid; width:200px;  top:100px; position:absolute; border-color: orangered">
            <div style="border-bottom: groove; border-bottom-color: orangered; padding:10px  ;background-color: palegoldenrod" >
					<label style="color:black; font-family: Impact; font-size: 20px; font-style: bold"> MOOD </label>
					<br>
					<input type="radio" name="mood[]" id="radio1" value ="happy" class="css-checkbox" />
					<label for="radio1" style="color:black" class="css-label radGroup1">Happy</label>
					<br>
					<input type="radio" name="mood[]" id="radio2" value ="sad" class="css-checkbox" />
					<label for="radio2" style="color:black" class="css-label radGroup1">Sad</label>
					<br>
					<input type="radio" name="mood[]" id="radio3" value ="angry" class="css-checkbox" />
					<label for="radio3" style="color:black" class="css-label radGroup1">Angry</label>
                                        <br>
					<input type="radio" name="mood[]" id="radio4" value ="" class="css-checkbox" />
					<label for="radio4" style="color:black" class="css-label radGroup1">No real mood :|</label>
                                        <input type="submit" name="search"  id="sort1" value="Sort"/>
                                        
					</div>
                                         <div style=" z-index: 2; border-bottom: groove; border-bottom-color: orangered; padding:10px; background-color: palegoldenrod" >
					<label style="color:black; font-family: Impact; font-size: 20px; font-style: bold"> COST FOR 2 </label>
					<br>
					<input type="checkbox" name="multi[]" id="check1" value="<200" class="css-checkbox2" />
					<label for="check1" style="color:black; font-size: 20px" class="css-label2 ">&lt; 200</label>
					<br>
					<input type="checkbox" name="multi[]" id="check2" value="200-500" class="css-checkbox2" />
					<label for="check2" style="color:black; font-size: 20px" class="css-label2 ">200-500</label>
					<br>
					<input type="checkbox" name="multi[]" id="check3" value="500-1000" class="css-checkbox2" />
					<label for="check3" style="color:black; font-size: 20px" class="css-label2 ">500-1000</label>
                
					<input type="checkbox" name="multi[]" id="check4" value="1000-2000" class="css-checkbox2" />
					<label for="check4" class="css-label2" style="color:black; font-size: 20px">1000-2000</label>
				
					<input type="checkbox" name="multi[]" id="check5" value=">2000" class="css-checkbox2" />
					<label for="check5" class="css-label2" style="color:black; font-size: 20px">&gt;2500</label>
					<br>
					<input type="submit" name="search"  id="sort2" value="Sort"/>
                                        </div>
                                        
                                          <div style=" z-index: 2; border-bottom: groove; border-bottom-color: orangered; padding:10px; background-color: palegoldenrod" >
					<label style="color:black; font-family: Impact; font-size: 20px; font-style: bold"> Occasion </label>
					<br>
					<input type="checkbox" name="occ[]" id="occ1" value="<200" class="css-checkbox2" />
					<label for="occ1" style="color:black; font-size: 20px" class="css-label2 ">Birthday</label>
					<br>
					<input type="checkbox" name="occ[]" id="occ2" value="200-500" class="css-checkbox2" />
					<label for="occ2" style="color:black; font-size: 20px" class="css-label2 ">Hangout</label>
					<br>
					<input type="checkbox" name="occ[]" id="occ3" value="500-1000" class="css-checkbox2" />
					<label for="occ3" style="color:black; font-size: 20px" class="css-label2 ">Romantic getaway</label>
                
					<br>
					<input type="submit" name="search"  id="sort2" value="Sort"/>
                                        </div>
              </div>
                </form>
                                        
            
         
                
                <div style="z-index:1; border:solid; width:800px; height:auto; top:100px; left:300px; position:absolute; border-color: orangered">
                    <h2> Your search results:</h2>
					<iframe src= "<?php echo $dir;?>" name="result" frameborder="0" width="800" height="800" seamless></iframe>
                </div>
<div id="back">
            <i class="fa fa-hand-o-left"></i>
            <a href="beer2.html" >Go Back </a>
            </div>
    </body>
</html>