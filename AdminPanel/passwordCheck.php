<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Password Check</title>
<script>
function check(myForm) {
	var p1 = document.getElementById("pwd").value;
	var p2 = document.getElementById("pwd1").value;
	if(p1===p2) {
		document.getElementById("validateMS").innerHTML="Password Correct !";
		
		return true;
		}
	else {
		document.getElementById("validateMW").innerHTML="Password is  incorrect !";
		return false;
		}
	
	}
</script>
</head>
<body>
<div id="main">
<form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
	<input type="text" name="name" id="name" />
    <input type="password" name="pwd" id="pwd" />
    <input type="password" name="pwd1" id="pwd1" />
    <input type="submit" onClick="return check(this);" value="submit" />
</form>

<div id="validateMW" style="background:red;">
</div>
<div id="validateMS" style="background:#22FF00;">
</div>
</div>
</body>
</html>
