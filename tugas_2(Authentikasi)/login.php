<?php 
  include_once("fungsi.php");
  $user=new User();

  if(isset($_SESSION['status'])){
    if ($_SESSION['status']=="Guru"){
      header("location:guru.php");
    }else if ($_SESSION['status']=="Staff"){
      header("location:staff.php");
    }else if ($_SESSION['status']=="Siswa"){
      header("location:siswa.php");
    }
  }
  if(isset($_POST['submit']))
  $user->login($_POST['username'],$_POST['password']);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
  <body>   
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <br/>
            <div class="panel panel-default" style="margin-top:80px;">
              <div class="panel-body">
                  <h3 class="text-center" style="font-weight:bolder;margin:10px 0;">Login</h3>
                  <form method="post">
                      <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" id="username" name="username" class="form-control" placeholder="Nama Pengguna" required/>
                      </div>
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" id="password" name="password" class="form-control" placeholder="Kata Sandi" required/>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                      <p style="clear:both;">
                          <div style="float:left;"><a href="forgotpass.php">Forgot Password</a></div>
                          <div style="float:right;"><a href="register.php">Register New User</a></div>
                      </p>
                  </form>
              </div>
          </div>
          </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>