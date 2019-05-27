<?php 

include_once("user.php");
$user=new User();

if(isset($_SESSION['status'])){
	if ($_SESSION['status']=="Guru"){
		header("location:Guru.php");
	}else if ($_SESSION['status']=="Staff"){
		header("location:Guru.php");
	}else if ($_SESSION['status']=="Siswa"){
		header("location:Siswa.php");
	}
}
if(isset($_POST['submit']))
$user->login($_POST['uname'],$_POST['pass']);

 ?>
<html>
<head>
	<title>Login</title>
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #1a63d8">
  <a class="navbar-brand" href="login.php"><b>Login Form</b></a>
</nav>
<div class="container mt-5">
<div class="row">
	<div class="col-sm-6">
		<h1><center>Login Form</center></h1>
	</div>
	<div class="col-sm-6 p-4" style="background-color: #ededed; border-radius: 8px;">
		<h2>Log In</h2>
		<form method="post">
			<label>Username</label>
			<input class="form-control" type="text" name="uname" required>
			<label>Password</label>
			<input class="form-control" type="password" name="pass" required>
			<button type="submit" name="submit" class="btn btn-primary mt-3 float-right">Log In</button>
		</form>
		<a href="lupapass.php">Forgot Password</a>
		<a class="ml-3" href="daftar.php">don't have an account?</a>
	</div>
</div>
</div>



</body>
</html>	