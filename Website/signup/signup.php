<!DOCTYPE html>
<html>
	
	<head>
		<title>Repeat Exam Registration</title>
	</head>
	<body style="background-color:#6696C8" align=center>
		<!-------------------------------Header Design--------------------->
		<div style="position: absolute;left: 400px; top: 100px;" align="center"class="header">
			
			<img style="width: 120px; height: 120px;" src="../images/logo.png">
			<p style="color: white">74/A Green Road, Farmgate Dhaka- 1215 </p>
			<h1 style="color: white">UAP REPEAT EXAM REGISTRATION</h1>
			
		</div>
		<!-------------------------------Form Design--------------------->
		<div style="position: absolute;left: 550px; top: 350px;" align="center"class="form">
			
			<form name="signupform" method="post" action="../index.html">
				<input type="text" style="width: 20em;  height: 2em;" size=25 name="regid" pattern=".{8,8}" placeholder="Registration" required><br><br>
				<input type="Password" style="width: 20em;  height: 2em;" size=25 name="pwd" minlength="6"  placeholder="Password" required><br>
				<br>
				<input type="Password" style="width: 20em;  height: 2em;" size=25 name="Conpwd" minlength="6" placeholder="Confirm Password" required><br>
				<br>
				<input type="submit" style="background-color: #0076FF;color:white;width: 20em;  height: 4em;" onclick="return check(this.form)" value="Sign Up!">
				<p>Already have an account?<a href="../index.php">Login!</a></p>
			</form>
		</div>
		
	</body>
</html>