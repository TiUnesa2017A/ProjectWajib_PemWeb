<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>

	<title>APK Login</title>

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="lp.css">

</head>
<body>

	<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="wrapper" style="text-align:center">
		        <h1 class="text">SELAMAT DATANG</h1>
				<a href="#popup" class="btn btn-primary" style="width: 200px; background-color: #42a5f5">LOGIN</a>
				<a href="#popups" class="btn btn-primary" style="width: 200px; background-color: #42a5f5">REGISTRASI</a>
				<?php 
				if(isset($_GET['pesan'])){
					if($_GET['pesan']=="gagal"){
						echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
					}
					else if($_GET['pesan'] == "logout"){
						echo "Anda telah berhasil logout";
					}else if($_GET['pesan'] == "belum_login"){
						echo "Anda harus login untuk mengakses halaman utama";
					}
				}
				?>
			</div>
			</div>
		</div>
	</div>
	</div>

	<div id="popup">
	    <div class="window">
	        <a href="#" class="close-button" title="Close">X</a>
	        <b>
			<p class="tulisan_login">Silahkan login</p>
			<form action="cek_login.php" method="post" align ="left">
				<label>Username</label>
				<input type="text" name="username" class="form_login" placeholder="Username atau email .." required="required">
				<label>Password</label>
				<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
		 
				<input type="submit" class="tombol_login" value="LOGIN"><br><br>
				<p class="tulisan_login">
					<a href="lostpassword.php">Lupa Password?</a> ||
					<a href="kirimpssword.php">Ganti Password</a>
				</p><br><br>
			</b>
			</form>
	    </div>
	</div>

	<div id="popups">
	    <div class="windows">
	        <a href="#" class="close-button" title="Close">X</a>
	        <b>
			<p class="tulisan_login">Regitrasi</p>
			<form align ="left">
			<form action="send_register.php" method="post">
				<label>Nama Lengkap</label>
				<input type="text" name="nickname" class="form_login">

				<label>Username</label>
				<input type="text" name="username" class="form_login">
		 
				<label>Password</label>
				<input type="text" name="password" class="form_login"">

				<label>Confirm Password</label>
				<input type="text" name="repassword" class="form_login"">
		 
				<input type="submit" class="tombol_login" value="REGISTRASI">
			</b>
			</form>
	    </div>
	</div>

</body>
</html>