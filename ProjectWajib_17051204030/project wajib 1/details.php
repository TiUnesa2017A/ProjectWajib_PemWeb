<?php
include ('action.php');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Details</title>
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
  <a class="navbar-brand" href="#">CRUD Prepared Statement</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->

  <!--<form class="form-inline" action="/action_page.php">
  <input class="form-control mr-sm-2" type="text" placeholder="Search">
  <button class="btn btn-primary" type="submit">Search</button>
</form>-->
</nav>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-3 bg-info p-4 rounded">
      <h2 class="bg-light p-2 rounded text-center text-dark">ID: <?=$vid;?></h2>
      <div class="text-center">
        <img src="<?=$vphoto;?>" alt="" width="350" class="img-thumbnail">
      </div>
      <h4 class="text-light">Name : <?=$vname;?></h4>
      <h4 class="text-light">Gender : <?=$vjk;?></h4>
      <h4 class="text-light">Prodi  : <?=$vprodi;?></h4>
      <h4 class="text-light">Fakultas : <?=$vfakultas;?></h4>
    </div>
  </div>
  <a href="browse-users.php" class="badge badge-danger" style="width:100px; height:30px; margin-top:50px;font-size:18px;">Back</a>

</div>
</body>
</html>
