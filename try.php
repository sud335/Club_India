<!DOCTYPE HTML> 
<html>
<head>
    <title>TODO supply a title</title>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
         <link rel="stylesheet" type="text/css" href="css/regcss.css" />
 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        
<style>
.error {color: #FF0000;}
</style>
</head>
<body id="bottlesign"> 

         
        

<div>
                 <label style="font-size:40px; float:left;" id="club" >Club India</label>
              <h2 id="line">    </h2>
            </div>

            
        <div id="whole">
            1. Select your username
        <div id="user">
            <label for="myusername">Username</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <i class="fa fa-male"></i>
                  <input name="uname" type="text"  id="myusername" placeholder="username" required />
                  <span class="error" id="uerr">*</span><br><br>
                  <label for="mypassword">Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <i class="fa fa-lock"></i>
                  <input name="pass" type="password" id="mypassword" placeholder="password" required/>
                  <span class="error" id="p1err" >* </span><br><br>
                  <label for="mypassword2">Confirm</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <i class="fa fa-lock"></i>
                  <input name="cpass" type="password" id="mypassword2" placeholder="password" required/>
                  <span class="error" id="perr">*</span>
                  
        </div>
            <br><br>
            2. User Details
        <div id="details">
            <label for="first_name">First Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <i class="fa fa-user"></i>
            <input type="text"  id="fn" name="fname">
            <span class="error"></span><br><br>
        <label for="last_name">Last Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <i class="fa fa-user"></i>
        <input type="text" id="ln" name="lname">
        <span class="error"></span><br><br>
        <label for="email">Email Address</label>&nbsp;&nbsp;
        <i class="fa fa-envelope"></i>
        <input type="email"  id="email" name="email" required >
        <span class="error" id="emerr">* </span>
<br>
<span class="error" id="allerr"> </span>
        </div>
        </div>
            <div id="back">
            <i class="fa fa-hand-o-left"></i>
            <a href="beer2.html" >Go Back </a>
            </div>
             <div id="submit">
            <i class="fa fa-thumbs-o-up"></i>
           <input type="button" name="submit" value="Login" id="sub"/>

                  </div>
         
       <script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/usercheck.js"></script>
    </body>
</html>