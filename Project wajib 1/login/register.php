<?php
include ('action.php');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Register</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

</nav>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <h3 class="text-center text-dark">Form Register</h3>
      <hr>
      <?php if(isset($_SESSION['response'])){ ?>
      <div class="alert alert-<?=$_SESSION['res_type'];?> alert-dismissible text-center">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <b><?=$_SESSION['response'];?></b>
    </div>
  <?php }unset($_SESSION['response']); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <h3 class="text-center text-info">Register</h3>
      <form class="" action="action.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" name="name" value="" class="form-control" placeholder="Enter Name......" required>
        </div>
        <div class="form-group">
          <input type="text" name="email" value="" class="form-control" placeholder="Enter Email......" required>
        </div>
        <div class="form-group">
          <input type="password" name="password" value="" class="form-control" placeholder="Enter Password......" required>
        </div>
        <div class="form-group">
          <input type="submit" name="add" value="Register" class="btn btn-primary btn-block">
        </div>
      </form>
    </div>
  </div>
</div>


</body>
</html>
