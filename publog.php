<html>
    <head>
        <title>signin user</title>
       <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/logingin.css" />
                <style>
.error {color: #FF0000;}
</style>
    </head>

    <body id="bottlesig" style=" background-image: url(css/bottle.jpg);
    background-repeat: repeat-x;" >
       
            <div>
                 <label style="font-size:40px; float:left;" id="clubsig" >Club India</label>
              <h2 id="linesig">    </h2>
              <label style="font-size:20px;" id="pusig" ><br>Pub<br>Login</label>
              <div id="logsig">

                  <i class="fa fa-male"></i>
                  <input name="username" type="text" id="myusernamesig" placeholder="username" required/><br><br>
                  <i class="fa fa-lock"></i>
                  <input name="password" type="password" id="mypasswordsig" placeholder="password" required/><br><br><br><br>
                  <input type="button" name="Submit" value="Login" id="subsig"/><br>
                  <span class="error" id="errorsig"></span><br><br><br>
              </div>
              
            </div>
            <div id="backsig">
            <i class="fa fa-hand-o-left"></i>
            <a href="beer2.php" >Go Back </a>
            </div>
             <div id="registersig">
            <i class="fa fa-users"></i>
            <a href="pubreg.php" >Sign Up! </a>
            </div>

        
       <script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/pubcheck.js"></script>
    </body>
</html>
