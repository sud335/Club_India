<!DOCTYPE HTML> 
<html>
<head>
    <title>Pub Registration</title>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
         <link rel="stylesheet" type="text/css" href="css/pubregcss.css" />
         
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
       
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<?php

	
   
   define('DB_HOST', '127.0.0.1');
   define('DB_NAME', 'sgchk');
   define('DB_USER','');
   define('DB_PASSWORD','');

   $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
   $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());


   $nameErr = $emailErr = $passErr = $cpassErr = $fnameErr = $lnameErr ="";
    
	$flag1=0;
	$flag2=0;
        $uname=$_POST['uname'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	$email=$_POST['email'];
	$ofname=$_POST['ofname'];
   	$olname=$_POST['olname'];
   	$pubname=$_POST['pubname'];
	$add= $_POST['add'];
	$pay= $_POST['pay'];
	$mob= $_POST['mob'];
	$costtwo=$_POST['COSTTWO'];
	$city=$_POST['city'];
	$time=$_POST['time']; 
        $mood=$_POST['mood'];


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
        $querycheck=  mysql_query("select uname from newpub where uname = '$uname'");
        $n = mysql_num_rows($querycheck);
        // this is to chk if the user aldready present.. dont remove this....

        if(!$n==0)
        {
                $unameErr = "Username already exists";

        }
       else if($cpass==$pass)
	 {
		
          if ((($_FILES["mediafile"]["type"] == "image/gif")			
            || ($_FILES["mediafile"]["type"] == "image/jpeg")
            || ($_FILES["mediafile"]["type"] == "image/pjpeg")
            || ($_FILES["mediafile"]["type"] == "image/png"))
            && ($_FILES["mediafile"]["size"] < 1000000))
		{
                       if($_FILES["mediafile"]["error"]>0)
			{
			    $mediaErr="Error in upload";
                         }
			else
			{
                if(file_exists("uploads/mediafiles/".$test."/".$_FILES["mediafile"]["name"]))
                {
					$mediaErr="This file already exists";
                    
                }
                else
                {
					$test=$uname;
					if(! is_dir("uploads/mediafiles/".$test))
					{
						mkdir("uploads/mediafiles/".$test);
					}
			
					move_uploaded_file($_FILES["mediafile"]["tmp_name"],"uploads/mediafiles/".$test."/".$_FILES["mediafile"]["name"]);
                       
					$flag1=1;
	                                $dirmedia="uploads/mediafiles/".$test."/";                                        
                }
		    }
				
	    }				
		else
		{
            $mediaErr="File type error";
		}
				
		if ((($_FILES["menufile"]["type"] == "image/gif")
         || ($_FILES["menufile"]["type"] == "image/jpeg")
         || ($_FILES["menufile"]["type"] == "image/pjpeg")
         || ($_FILES["menufile"]["type"] == "image/png"))
         && ($_FILES["menufile"]["size"] < 1000000))
	   {
			if($_FILES["menufile"]["error"]>0)
			{
				$menuErr="Error in upload";
                
			}
			else
			{
				if(file_exists("uploads/menufiles/".$test."/".$_FILES["menufile"]["name"]))
				{
					$menuErr="This file already exists";
				}
				else
				{
					$test=$uname;
					if(! is_dir("uploads/menufiles/".$test))
					{
						mkdir("uploads/menufiles/".$test);
					}
			
					move_uploaded_file($_FILES["menufile"]["tmp_name"],"uploads/menufiles/".$test."/".$_FILES["menufile"]["name"]);
				}
				$flag2=1;
                                $dirmenu="uploads/menufiles/".$test."/";
			}		
				
		}				
		else
		{
            $mediaErr="File type error";
            
		}
         }      
	else
      {
         $cpassErr="passwords don't match!";
        //$flag="no";
     }
       
  if(($flag1==1)&&($flag2==1))
  {
         $query = "INSERT INTO `sgchk`.`newpub`(`uname`,`pass`,`email`,`ofname`,`olname`,`pubname`,`address`,`city`,`pay`,`mob`,`costtwo`,`media`,`menu`,`schedule`,`mood`)VALUES('$uname','$pass','$email','$ofname','$olname','$pubname','$add','$city','$pay','$mob','$costtwo','$dirmedia','$dirmenu','$time','$mood')";
         $data = mysql_query($query)or die(mysql_error());
		if(($data))
		{
			include 'publog.php';  
			header("location:publog.php");           
                        exit();
         }
  }
   
}

ob_end_flush();
?>       
        
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data"> 
<div>
                 <label style="font-size:40px; float:left;" id="club" >Club India</label>
              <h2 id="line">    </h2>
            </div>

            
        <div id="whole">
            1. Owner details
        <div id="user">
            <label for="myusername">
                Username</label>&nbsp;&nbsp;&nbsp;
             <i class="fa fa-male"></i>
                  <input name="uname" type="text" value="<?php echo $uname;?>" id="myusername" placeholder="username" required/>
                  <span class="error">* <?php echo $unameErr;?></span><br><br>
                  
                  <label for="mypassword">Password</label>&nbsp;&nbsp;
                  <i class="fa fa-lock"></i>
                  <input name="pass" type="password" value="<?php echo $pass;?>" id="mypassword" placeholder="password" required/>
                  <span class="error">* <?php echo $passErr;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                  <label for="mypassword2">Confirm</label>
                  <i class="fa fa-lock"></i>
                  <input name="cpass" type="password" value="<?php echo $cpass;?>" id="mypassword2" placeholder="password" required/>
                  <span class="error">* <?php echo $cpassErr;?></span><br><br>
                   
                  <label for="first_name">First Name</label>
        <i class="fa fa-user"></i>
            <input type="text" value="<?php echo $ofname;?>" id="first_name" name="ofname" required>
            <span class="error"><?php echo $ofnameErr;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
            <label for="last_name">Last Name</label>
        <i class="fa fa-user"></i>
        <input type="text" value="<?php echo $olname;?>" id="last_name" name="olname" required>
        <span class="error"><?php echo $olnameErr;?></span><br><br>
        
        <label for="email">Email Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <i class="fa fa-envelope"></i>
        <input type="email" value="<?php echo $email;?>" id="email" name="email" required>
        <span class="error">* <?php echo $emailErr;?></span>
                        
        </div>
            <br><br>
            
            2. User Details
        <div id="details">
            
            <label for="pub_name">Pub Name</label>
       
            <input type="text" value="<?php echo $pubname;?>" id="pub_name" name="pubname" required>
            <span class="error"><?php echo $pubnameErr;?></span><br><br>
            
        <label for="addr">Address</label>
       
        <textarea rows="4" cols="30" value="<?php echo $add;?>" id="addr" name="add" required></textarea>
        <span class="error"><?php echo $addErr;?></span>
        
        <label for="cities">City</label>&nbsp;&nbsp;
    
        <input type="text" value="<?php echo $city;?>" id="cities" name="city" required>
        <span class="error">* <?php echo $cityErr;?></span><br><br>
        
        <label for="mobile">Phone No.</label>&nbsp;&nbsp;
    
        <input type="number" value="<?php echo $mob;?>" id="mobile" name="mob" maxlength="10" required>
        <span class="error">* <?php echo $mobErr;?></span><br><br>
        
        <label for="cost">Cost for two</label>&nbsp;&nbsp;
        
        <select name="COSTTWO" size="1" id="cost">
						<option>&lt;200</option>
						<option>200-500</option>
						<option>500-1000</option>
						<option>1000-2500</option>
						<option>&gt;2500</option>
						</select>
        
        <label for="times">Timings</label>&nbsp;&nbsp;
       
        <input type="text" value="<?php echo $time;?>" id="times" name="time" required>
        <span class="error">* <?php echo $timeErr;?></span><br><br>
        
         <label for="med">Media files</label>&nbsp;&nbsp;
        
       <input type="file" name="mediafile" id="med" required />
        <span class="error">* <?php echo $mediaErr;?></span>
        <label for="men">Menu files</label>&nbsp;&nbsp;
     
        <input type="file" name="menufile" id="men" required />
        <span class="error">* <?php echo $menuErr;?></span><br> <br>
        
        <label for="detail">Payment Details</label>&nbsp;&nbsp;

        <input type="text" name="pay" value="<?php echo $pay;?>" id="detail" size="20" required/>
        <span class="error">* <?php echo $payErr;?></span>
         
        <label for="mood">Mood</label>&nbsp;&nbsp;
        
        <select name="mood" size="1" id="mood">
						<option>happy</option>
						<option>sad</option>
						<option>angry</option>
        </select><br><br>

        <label for="occasion">Occasion</label>&nbsp;&nbsp;
        
						<select name="occasion" size="1">
						<option>birthday</option>
						<option>hangout</option>
						<option>romance</option>
        </select><br><br>

        
        </div>
        </div>
            <div id="back">
            <i class="fa fa-hand-o-left"></i>
            <a href="beer2.php" >Go Back </a>
            </div>
             <div id="submit">
            <i class="fa fa-thumbs-o-up"></i>
           <input type="submit" name="submit" value="Login" id="sub"/>
            </div>
            
 
        </form>
        </body>
        </html>