<?php

$email=$_POST['email'];
if(filter_var($email, FILTER_VALIDATE_EMAIL)==true)
{
echo 'Valid';
}
else
{echo 'Invalid email-id';
}
?>
