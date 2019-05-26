<?php 
    include_once("fungsi.php");
    $user = new User();
    if(isset($_POST['sub'])){
        $user->daftar($_POST['fullname'],$_POST['email'],$_POST['type'],$_POST['username'],$_POST['password']);
    }

 ?>

<html>
<head>
    <title>Register</title>
    <link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <br/>
            <div class="panel panel-default" style="margin-top:80px;">
                <div class="panel-body">
                    <h3 class="text-center" style="font-weight:bolder;margin:10px 0;">User Register</h3>
                    <form method="post">
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Nama Lengkap" required/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required/>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Nama Pengguna" required/>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Kata Sandi" required/>
                        </div>
                        <div class="form-group">
                            <label for="type">Type User</label>
                            <select id="type" name="type" class="form-control">
                                <option value="Staff">Staff</option>
                                <option value="Guru">Guru</option>
                                <option value="Siswa">Siswa</option>
                            </select>
                        </div>
                        <button type="submit" name="sub" class="btn btn-primary btn-block">Register</button>
                        <p style="clear:both;">
                            <div style="float:left;"></div>
                            <div style="float:right;"><a href="login.php">Login</a></div>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>