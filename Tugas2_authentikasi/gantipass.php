<?php 	
include_once("user.php");
$user= new User();
if (isset($_GET['kode'])) {
	if (isset($_POST['submit'])) {
		if ($_POST['pass']==$_POST['pass1']) {
			$user->gantipass($_POST['pass'],$_GET['kode']);
			echo '<script type="text/javascript">alert("Password berhasil direset !!");</script>';
		}else{
			echo '<script type="text/javascript">alert("Password tidak cocok !!");</script>';
		}
	}
}else{
	header("location:login.php");
}


 ?>

<html>
<head>
	<title>Reset Password</title>
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #1a63d8">
  <a class="navbar-brand" href="gantipass.php"><b>Reset Password</b></a>
</nav>
<div class="container mt-5 p-5" style="background-color: #ededed; border-radius: 8px;">
	<h1>Reset Password</h1>
	<form class="inline-form" method="post">
	<div class="row">
		<div class="col-sm-6">
			<label>New Password</label>
			<input class="form-control" type="Password" name="pass">
		</div>
		<div class="col-sm-6">
			<label>Retype Password</label>
			<input class="form-control" type="Password" name="pass1">
			<button type="submit" name="submit" class="btn btn-primary mt-3 ml-3 float-right">Reset Password</button><br>
			<a href="login.php" class="float-right">Log In</a>
		</div>

	</div>
	</form>

</div>

</body>

</html> 