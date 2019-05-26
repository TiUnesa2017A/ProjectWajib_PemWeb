<?php 
session_start();
if (!isset($_SESSION['status'])||$_SESSION['status']!="Staff") {
	header("location:login.php");
}
 ?>
<html>
<head>
	<title>Halaman Staff</title>
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #1a63d8">
  <a class="navbar-brand" href="daftarmahasiswa.php"><b>Halaman Staff</b></a>
  <ul class="navbar-nav">
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <?php echo $_SESSION['nama']?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
</nav>
<div class="container mt-5">
	<h1>Halaman Staff</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
</body>
</html>