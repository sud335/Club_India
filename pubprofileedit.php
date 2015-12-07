<?php
   session_start();
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'sgchk');
   define('DB_USER','sgchk');
   define('DB_PASSWORD','sgchk');


   $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
   $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

	if(isset($_GET['pubname']))
	{
	    $myvar = $_GET['pubname'];
		$dir ="profileeditlink.php?pubname=".$myvar;
		$querycheck=  mysql_query("SELECT * FROM newpub WHERE pubname = '$myvar'");
		
		$n = mysql_num_rows($querycheck);
		if($n==0)
		{	
			echo "No reviews have been made"; 
		}
		else
		{
			echo "<table border='1' width='400'>";
			$row = mysql_fetch_array($querycheck);
		    $flag1=0;
	        $flag2=0;
            $uname=$row['uname'];
			$email=$row['email'];
			$ofname=$row['ofname'];
			$olname=$row['olname'];
			$pubname=$row['pubname'];
			$add= $row['address'];
			$pay= $row['pay'];
			$mob= $row['mob'];
			$costtwo=$row['costtwo'];
			$city=$row['city'];
			$time=$row['schedule']; 
			$mood=$row['mood'];
			$num_uploads = 4;
			$max_file_size  = 1000000;
		}
	}
	else
	{
	echo " not found";
	}
?>       

<html>
<head>
    <title>Pub Profile Edit</title>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
         <link rel="stylesheet" type="text/css" href="css/pubeditcss.css" />
         
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
       
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

        <div>
                 <label style="font-size:40px; float:left;" id="club" >Club India</label>
              <h2 id="line">    </h2>
            </div>


        <div id="whole">
            1. Owner details
        <div id="user">
            <label for="myusername">
                Hi,</label>&nbsp;&nbsp;

                  <?php echo $uname;?>
                  <br><br>
    <form id="reg_data" enctype="multipart/form-data" method="POST" action="<?php echo $dir; ?>">            
        <label for="first_name">First Name</label>
        <i class="fa fa-user"></i>
            <input type="text" value="<?php echo $ofname;?>" id="first_name" name="ofname" required>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
            <label for="last_name">Last Name</label>
        <i class="fa fa-user"></i>
        <input type="text" value="<?php echo $olname;?>" id="last_name" name="olname" required>
        </span><br><br>
        
        <label for="email">Email Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <i class="fa fa-envelope"></i>
        <input type="email" value="<?php echo $email;?>" id="email" name="email" required>
        
                        
        </div>
            <br><br>
            
            2. User Details
        <div id="details">
            
            <label for="pub_name">Pub Name</label>
        
            <input type="text" value="<?php echo $pubname;?>" id="pub_name" name="pubname" required>
        <br><br>
            
        <label for="addr">Address</label>
    
		 <input type="text" value="<?php echo $add;?>" id="pub_name" name="add" required>
        
        
        <label for="cities">City</label>&nbsp;&nbsp;
       
        <input type="text" value="<?php echo $city;?>" id="cities" name="city" required>
        <br><br>
        
        <label for="mobile">Phone No.</label>&nbsp;&nbsp;
     
        <input type="text" value="<?php echo $mob;?>" id="mobile" name="mob" maxlength="10" required>
        
        <br><br>
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
        <br> <br>
        
         <label for="med">Media files : </label>&nbsp;&nbsp;
         <!--<input type="file" name="mediafile" id="med" />-->
		  <?php
				$num = 0;
				while($num < $num_uploads)
				{
					echo '<div><input name="mediafile[]" type="file" /></div>';
					$num++;
				}
			?>
        
        <label for="men">Menu files</label>&nbsp;&nbsp;
		<br>
		<br>
        <?php
				$num = 0;
				while($num < $num_uploads)
				{
					echo '<div><input name="menufile[]" type="file" /></div>';
					$num++;
				}
		?>

        <!--<input type="file" name="menufile" id="men" />-->
		
        <br><br>
        
        <label for="detail">Payment Details</label>&nbsp;&nbsp;
        <input type="text" name="pay" value="<?php echo $pay;?>" id="detail" size="20" required/>
        
         
        <label for="mood">Mood</label>&nbsp;&nbsp;
       
        <select name="mood" size="1" id="mood">
						<option>happy</option>
						<option>sad</option>
						<option>angry</option>
        </select>


        
        </div>
        </div>
            <div id="back">
            <i class="fa fa-hand-o-left"></i>
            <a href="beer2.php" >Go Back </a>
            </div>
             <div id="submit">
            <i class="fa fa-thumbs-o-up"></i>
           <input type="submit" name="submit" value="SAVE" id="sub" />
            </div>
            
 
       
</form>
</body>
</html>