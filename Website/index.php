<!DOCTYPE html>
<html>
	
	<head>
		<title>Repeat Exam Registration</title>
	</head>
	<body style="background-color:#6696C8">

	<?php

	if (isset($_POST['regid']))
	{
		include "functions/connect.php" ;
		$regid = stripslashes($_REQUEST['regid']); // removes backslashes
		
		$pwd = stripslashes($_REQUEST['pwd']);
		
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `studinfo` WHERE regid='$regid' and pwd='".md5($pwd)."'";
        if($query==1){
			$_SESSION['regid'] = $regid;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
?>	<?php } ?>
		<!-------------------------------Header Design--------------------->
		<div style="position: absolute;left: 400px; top: 100px;" align="center"class="header">
			
			<img style="width: 120px; height: 120px;" src="images/logo.png">
			<p style="color: white">74/A Green Road, Farmgate Dhaka- 1215 </p>
			<h1 style="color: white">UAP REPEAT EXAM REGISTRATION</h1>
			
		</div>
		<!-------------------------------Form Design--------------------->
		<div style="position: absolute;left: 550px; top: 350px;" align="center"class="form">
			
			<form name="loginForm" method="post" action="">
				<input type="text" style="width: 20em;  height: 2em;" size=25 name="regid" pattern=".{8,8}" placeholder="Registration" required><br><br>
				<input type="Password" style="width: 20em;  height: 2em;" size=25 name="pwd" minlength="6"  placeholder="Password" required><br>
				<br>
				<input type="submit" style="background-color: #0076FF;color:white;width: 20em;  height: 4em;" onclick="return check(this.form)" value="Login">
				<p>Don't have any account? <a href="signup/signup.php">Sign Up</a></p>
			</form>
			
		</div>
		
	</body>
</html>