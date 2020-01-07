<!DOCTYPE html>
<html>
	
	<head>
		<title>Repeat Exam Registration</title>
	</head>
	<body style="background-color:#6696C8" align=center>

	<?php
	require('../functions/connect.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['regid'])){
		$regid = stripslashes($_REQUEST['regid']); // removes backslashes
		$regid = mysqli_real_escape_string($con,$regid); //escapes special characters in a string
		$pwd = stripslashes($_REQUEST['pwd']);
		$pwd = mysqli_real_escape_string($con,$pwd);
		$Conpwd = stripslashes($_REQUEST['Conpwd']);
		$Conpwd = mysqli_real_escape_string($con,$Conpwd);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (regid, pwd, Conpwd, trn_date) VALUES ('$regid', '".md5($pwd)."', '".md5($Conpwd)."', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>


	
		<!-------------------------------Header Design--------------------->
		<div style="position: absolute;left: 400px; top: 100px;" align="center"class="header">
			
			<img style="width: 120px; height: 120px;" src="../images/logo.png">
			<p style="color: white">74/A Green Road, Farmgate Dhaka- 1215 </p>
			<h1 style="color: white">UAP REPEAT EXAM REGISTRATION</h1>
			
		</div>
		<!-------------------------------Form Design--------------------->
		<div style="position: absolute;left: 550px; top: 350px;" align="center"class="form">
			
			<form name="signupform" method="post" action="">
				<input type="text" style="width: 20em;  height: 2em;" size=25 name="regid" pattern=".{8,8}" placeholder="Registration" required><br><br>

				<input type="Password" style="width: 20em;  height: 2em;" size=25 name="pwd" minlength="6"  placeholder="Password" required><br>
				<br>

				<input type="Password" style="width: 20em;  height: 2em;" size=25 name="Conpwd" minlength="6" placeholder="Confirm Password" required><br>
				<br>
				<input type="submit" style="background-color: #0076FF;color:white;width: 20em;  height: 4em;"value="Sign Up!">
				<p>Already have an account?<a href="../index.php">Login!</a></p>
			</form>
		</div>
		<?php } ?>
	</body>
</html>