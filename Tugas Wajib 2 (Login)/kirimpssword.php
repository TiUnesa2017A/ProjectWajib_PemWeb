<?php
if(isset($_POST['new'])){
    $pw1 = $_POST['pw1'];
    $pw2 = $_POST['pw2'];
    $email = $_POST['email'];
    if($pw1==$pw2){
        $pw = password($_POST['pw1'], PASSWORD_DEFAULT);
        $stmt = $dbh->prepare('UPDATE user SET password=? WHERE email=? ');
        $stmt->bindParam(1,$pw);
        $stmt->bindParam(2,$email);
        if($stmt->execute()){
            echo '<div class="alert alert-success" role="alert">New password has been updated</div>';
            ?>
            <script>location.href='landing_page.php'</script>
            <?php
        } else{
            echo '<div class="alert alert-danger" role="alert">Error, password is not updated</div>';
        }
    } else{
        echo '<div class="alert alert-danger" role="alert">Please input same password</div>';
    }
}
?>

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
<div class="panel panel-default" style="margin-top:80px;">
    <div class="panel-body">
        <h3 class="text-center" style="font-weight:bolder;margin:10px 0;">Set New Password</h3>
        <form method="post">
            <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>"/>
            <div class="form-group">
                <label for="pw1">New Password</label>
                <input type="password" id="pw1" name="pw1" class="form-control" placeholder="Kata sandi baru" required/>
            </div>
            <div class="form-group">
                <label for="pw2">Re-Enter Password</label>
                <input type="password" id="pw2" name="pw2" class="form-control" placeholder="Kata sandi ulang" required/>
            </div>
            <button type="submit" name="new" class="btn btn-primary btn-block">Update Password</button>
            <p style="clear:both;">
                <div style="float:left;"><a href="landing_page.php">Back to login user</a></div>
                <div style="float:right;"></div>
            </p>
        </form>
    </div>
</div>
</body>
</html>