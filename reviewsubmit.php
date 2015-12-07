<?php
	$pubname=$_GET['pubname'];
	$dir="reviewsubmitlink.php?pubname=$pubname";
	
	//echo $dir;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Review Pub</title>
<link rel="stylesheet" type="text/css" href="css/cs-select.css" />
                <link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-skin-elastic.css" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<h4>Review  <bold> <?php  echo $pubname;?> </bold>:</h4>
	 <form id="reg_data" method="POST" action="<?php echo $dir?>">
                <select id="mod" class="cs-select cs-skin-elastic" name="mood">
					<option value="" disabled selected>What mood were you in?     &#8681;</option>
					<option value="happy" data-class="flag-france">Happy</option>
					<option value="sad" data-class="flag-brazil">Sad</option>
					<option value="angry" data-class="flag-argentina">Angry</option>
					
				</select>
                    <select id="occ" class="cs-select cs-skin-elastic" name="occasion">
					<option value="" disabled selected>What occasion?       &#8681;</option>
					<option value="birthday" data-class="flag-france">birthday</option>
					<option value="hangout" data-class="flag-brazil">hangout</option>
					<option value="romance" data-class="flag-argentina">romance</option>
					
				</select>
                    <div id='amb'>Ambience:<br>
                    <input type="radio" name="ambi[]" id="checkboxG1"  class="css-checkbox" value='1' required />
                    <label for="checkboxG1" class="css-label"> </label>
                    <input type="radio" name="ambi[]" id="checkboxG2"  class="css-checkbox" value='2' required />
                    <label for="checkboxG2" class="css-label"> </label>
                    <input type="radio" name="ambi[]" id="checkboxG3"  class="css-checkbox" value='3' required />
                    <label for="checkboxG3" class="css-label"> </label>
                    <input type="radio" name="ambi[]" id="checkboxG4"  class="css-checkbox" value='4' required />
                    <label for="checkboxG4" class="css-label"> </label>
                    <input type="radio" name="ambi[]" id="checkboxG5"  class="css-checkbox" value='5' required />
                    <label for="checkboxG5" class="css-label"> </label>
                    </div>
                     <div id='serv'>Service:<br>
                    <input type="radio" name="service[]" id="radioG1"  class="css-checkbox" value='1' required />
                    <label for="radioG1" class="css-label"> </label>
                    <input type="radio" name="service[]" id="radioG2"  class="css-checkbox" value='2' required />
                    <label for="radioG2" class="css-label"> </label>
                    <input type="radio" name="service[]" id="radioG3"  class="css-checkbox" value='3' required />
                    <label for="radioG3" class="css-label"> </label>
                    <input type="radio" name="service[]" id="radioG4"  class="css-checkbox" value='4' required />
                    <label for="radioG4" class="css-label"> </label>
                    <input type="radio" name="service[]" id="radioG5"  class="css-checkbox" value='5' required />
                    <label for="radioG5" class="css-label"> </label>
                    </div>
                    
                     <div id='over'>Overall:<br>
                    <input type="radio" name="overall[]" id="overG1"  class="css-checkbox" value='1' required/>
                    <label for="overG1" class="css-label"> </label>
                    <input type="radio" name="overall[]" id="overG2"  class="css-checkbox" value='2' required/>
                    <label for="overG2" class="css-label"> </label>
                    <input type="radio" name="overall[]" id="overG3"  class="css-checkbox" value='3' required/>
                    <label for="overG3" class="css-label"> </label>
                    <input type="radio" name="overall[]" id="overG4"  class="css-checkbox" value='4' required />
                    <label for="overG4" class="css-label"> </label>
                    <input type="radio" name="overall[]" id="overG5"  class="css-checkbox" value='5' required />
                    <label for="overG5" class="css-label"> </label>
                    </div>
                    
                    <div id="com">Leave a comment!<br>
                        <textarea rows="4" cols="100" id="inp"  name="comment" required/></textarea>
                    </div>
                    <input type="submit" value="Submit" id="done"/>
                    </form>
                		<script src="js/classie.js"></script>
		<script src="js/selectFx.js"></script>
		<script>
			(function() {
				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx(el);
				} );
			})();
		</script>
</body>
</html>