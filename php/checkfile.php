<?php

$con=mysql_connect("localhost","sgchk","sgchk") or die("Failed to connect".mysql_error());

mysql_select_db("sgchk",$con) or die("Failed to connect db".mysql_error());
if(isset($_POST['mediafile'])){
$mediafile=$_POST['mediafile'];




 if ((($_FILES["mediafile"]["type"] == "image/gif")			
            || ($_FILES["mediafile"]["type"] == "image/jpeg")
            || ($_FILES["mediafile"]["type"] == "image/pjpeg")
            || ($_FILES["mediafile"]["type"] == "image/png"))
            && ($_FILES["mediafile"]["size"] < 1000000))
		{
                       if($_FILES["mediafile"]["error"]>0)
			{
			    echo "Error in upload";
                         }
			else
			{
                if(file_exists("uploads/mediafiles/".$test."/".$_FILES["mediafile"]["name"]))
                {
					echo "This file already exists";
                    
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
            echo "File type error";
		}
}
?>