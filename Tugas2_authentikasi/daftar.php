<?php 
include_once("user.php");
$user = new User();
if(isset($_POST['submit'])){
	$user->daftar($_POST['nama'],$_POST['email'],$_POST['tipe'],$_POST['uname'],$_POST['pass']);
}

 ?>
<html>
<head>
	<title>Daftar</title>
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #1a63d8">
  <a class="navbar-brand" href="daftarmahasiswa.php"><b>Daftar</b></a>
</nav>
<div class="container mt-5 p-5" style="background-color: #ededed; border-radius: 8px;">
	<h1>DAFTAR</h1>
	<form method="post">
	<div class="row">
		<div class="col-sm-6">
			<label>Nama Lengkap</label>
			<input class="form-control" type="text" name="nama" required>
			<label>Email</label>
			<input class="form-control" type="email" name="email" required>
			<label>Tipe User</label>
			<select name="tipe" class="form-control" required>
				<option disabled selected>Pilih Tipe User</option>
				<option value="Guru">Guru</option>
				<option value="Staff">Staff</option>
				<option value="Siswa">Siswa</option>
			</select>
		</div>
		<div class="col-sm-6">
			<label>Username</label>
			<input class="form-control" type="text" name="uname" required>
			<label>Password</label>
			<input class="form-control" type="Password" name="pass" required>
			<button type="submit" name="submit" class="btn btn-primary mt-3 float-right">Daftar</button>
			</form>
			<a href="login.php" class="mt-4 mr-3 float-right">Halaman Login</a>
		</div>
	</div>

</div>

</body>

</html> 