<?php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'sgchk');
   define('DB_USER','sgchk');
   define('DB_PASSWORD','sgchk');

	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
	
	if(isset($_GET['pubname']))	
	{
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
		
		$myvar = $_GET['pubname'];
		//echo "Checked: ".$myvar;

		    
		$querycheck=  mysql_query("SELECT * FROM newpub WHERE pubname = '$myvar'");
		$row = mysql_fetch_array($querycheck);
		
		$dirmenu=$row['menu'];
		$dirmedia=$row['media'];
		//echo $dirmedia;
		//echo count($_FILES['mediafile']['tmp_name']);
		if(isset($_FILES['mediafile']['tmp_name']))
		{
			//echo "inside";
        /** loop through the array of files ***/
			for($i=0; $i < count($_FILES['mediafile']['tmp_name']);$i++)
			{
		    if ((($_FILES["mediafile"]["type"][$i] == "image/gif")			
            || ($_FILES["mediafile"]["type"][$i] == "image/jpeg")
            || ($_FILES["mediafile"]["type"][$i] == "image/pjpeg")
            || ($_FILES["mediafile"]["type"][$i] == "image/png"))
            && ($_FILES["mediafile"]["size"][$i] < 1000000))
			{
				if($_FILES["mediafile"]["error"][$i]>0)
				{
					$mediaErr="Error in upload";
                         }
				else
				{
					if(file_exists($dirmedia.$_FILES["mediafile"]["name"][$i]))
					{
						$mediaErr="This file already exists";
						//$_FILES['mediafile']['tmp_name'][$i];
					}

					else
					{
						// copy the file to the specified dir 
						if(move_uploaded_file($_FILES['mediafile']['tmp_name'][$i],$dirmedia.$_FILES['mediafile']['name'][$i]))
						{
							/*** give praise and thanks to the php gods ***/
							echo $_FILES['mediafile']['name'][$i].' uploaded';
						}
						else
						{
								/*** an error message ***/
								echo 'Uploading '.$_FILES['mediafile']['name'][$i].' Failed';
                                                                 echo  "<a href='pubprof.php?name=$myvar'>Try Again&nbsp;</a>";
						}
					}
				}	
			}
		}	   
    }
	
	
	if(isset($_FILES['menufile']['tmp_name']))
		{
			//echo "inside";
        /** loop through the array of files ***/
			for($i=0; $i < count($_FILES['menufile']['tmp_name']);$i++)
			{
		    if ((($_FILES["menufile"]["type"][$i] == "image/gif")			
            || ($_FILES["menufile"]["type"][$i] == "image/jpeg")
            || ($_FILES["menufile"]["type"][$i] == "image/pjpeg")
            || ($_FILES["menufile"]["type"][$i] == "image/png"))
            && ($_FILES["menufile"]["size"][$i] < 1000000))
			{
				if($_FILES["menufile"]["error"][$i]>0)
				{
					$menuErr="Error in upload";
                         }
				else
				{
					if(file_exists($dirmedia.$_FILES["menufile"]["name"][$i]))
					{
						$menuErr="This file already exists";
						
					}

					else
					{
						// copy the file to the specified dir 
						if(move_uploaded_file($_FILES['menufile']['tmp_name'][$i],$dirmenu.$_FILES['menufile']['name'][$i]))
						{
							/*** give praise and thanks to the php gods ***/
							echo $_FILES['menufile']['name'][$i].' uploaded';
						}
						else
						{
								/*** an error message ***/
								echo 'Uploading '.$_FILES['menufile']['name'][$i].' Failed';
                                                                echo  "<a href='pubprof.php?name=$myvar'>Try Again&nbsp;</a>";
						}
					}
				}	
			}
		}	   
    }
		
		$query = "UPDATE `sgchk`.`newpub` SET email = '$email', ofname = '$ofname', olname='$olname', 
		          pubname='$pubname',address='$add',pay='$pay',mob='$mob',costtwo='$costtwo',city='$city',
				  schedule='$time', mood='$mood' WHERE pubname ='$myvar'";
	
		$data = mysql_query($query)or die(mysql_error());
		if(($data))
		{
                 	//echo"<br><br>inserted succesfully<br>";
                       // echo  "<a href='pubprof.php?name=$myvar'>Go Back &nbsp;</a>";

			header("location:pubprof.php?name=$myvar");
                        
		}
		else
		{
			//echo " not inserted..!!";
                        echo  "<a href='pubprof.php?name=$myvar'>Try Again&nbsp;</a>";
		}

}
				//header("location:pubprof.php?name=$myvar");

?>