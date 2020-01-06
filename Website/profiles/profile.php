<html>
<head>
	<title>Repeat Exam Registration</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  	<style type="text/css">
  		body{
			margin: 0px;
			background-color: #6696C8;
		}
		.leftside{
			/* background-color: gray; */
			min-height: 100%; 
			font-family: 'Montserrat', sans-serif;
			color: white;
		}
		.rightside{
			/* background-color: red; */
			border-left: 1.5px solid white;
			min-height: 100%;
		}
		.profile-photo{
			border-style: 30px solid white;
			border-radius: 250px;
			height: 200px;
			width: 200px;
		}
		.list-group-item{
			
			background-color: #6696C8;
			border-radius: 0px;
			border: none;
			color: white;
			font-family: 'Montserrat', sans-serif;
			font-size: 15px;
		}
  	</style>
</head>
<body>
	<div class = "container-fluid">
		<div class = "row" > 
			<div class = "col-sm-4 leftside">
				<h2 class="text-center" style="letter-spacing: 2px;">Student Profile</h2>
				<br>
				<div class = "row">
					<div class="col-sm-4 col-sm-offset-4 profile-photo">
					<img src="rk.jpg" style="display: block; margin-left: auto;margin-right: auto; width: 100%; border-radius: 200px; border: 3px solid white;">
					</div>
				</div>
				<div class = "text-center" style="letter-spacing: 1px; margin-top: -20px;">
					<h3>Md. All Mamun</h3>
					<h3>Reg No: 16201071</h3>
				</div>
				<br>
				<h4>Course List</h4>
				<br>
				<div class = "row">
					<div class = "col-sm-12" style = "color: #333;">
						<ul class="list-group">
						    <li class="list-group-item">CODE 1 : Course Name 1</li>
						    <li class="list-group-item">CODE 2 : Course Name 2</li>
						    <li class="list-group-item">CODE 3 : Course Name 3</li>
						</ul>
					</div>

				</div>
				<br>
				<div class = "row">
					<div class = "col-sm-4 col-sm-offset-4">
						<button type="button" class="btn btn-warning btn-block btn-lg" style = "letter-spacing: 2px;"><span class="glyphicon glyphicon-log-out"></span>Logout</button>
					</div>
				</div>
			</div>
			<div class = "col-sm-7 col-sm-offset-1 rightside">
				<div class = "row">
					<div class = "col-sm-12" style="min-height: 250px;">	
					</div>
				</div>
				<div class = "row">
					<div class = "col-sm-5 col-sm-offset-3">
						<button type="button" class="btn btn-success btn-block btn-lg" style = "letter-spacing: 2px;"><span class="glyphicon glyphicon-file"></span>View Application</button>
					</div>
				</div>
				<br><br>
				<div class = "row">
					<div class = "col-sm-5 col-sm-offset-3">
						<button type="button" class="btn btn-success btn-block btn-lg" style = "letter-spacing: 2px;"><span class="glyphicon glyphicon-file"></span> View Money Reciept</button>
					</div>
				</div>
			</div>
		</div>
	</div>	

</body>
</html>