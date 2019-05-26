<?php 	
	include_once("fungsi.php");
	$user= new User();
	if (isset($_POST['submit'])) {
		$user->lupapass($_POST['email']);
	}
 ?>

<html>
<head>
	<title>Lupa Password</title>
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #1a63d8">
	  <a class="navbar-brand" href="login.php"><b>Login</b></a>
	</nav>
	<div class="container mt-5 p-5" style="background-color: #ededed; border-radius: 8px;">
		<h1>LUPA PASSWORD</h1>
		<form method="post">
				
		<div class="row">
			<div class="col-sm-6">
				<label>Email</label>
				<input class="form-control" type="email" name="email" required>
			</div>
			<div class="col-sm-2">
				<br>
				<button type="submit" name="submit" class="btn btn-primary mt-2">Ganti Password</button>
			</div>
			</form>
			<div class="col-sm-3 pt-3">
				<br>
				<a href="login.php">Login</a>
			</div>
		</div>


	</div>

</body>

</html> 