<?php
if(isset($_POST['lostpassword'])){
    $email = $_POST['email'];
    $stmt = $dbh->prepare('SELECT * FROM user WHERE email=?');
    $stmt->bindParam(1,$email);
    $stmt->execute();
    $row = $stmt->fetch();
    $email2 = $row['email'];
    $un = $row['username'];
    if($email==$email2){
        $to      = $email;
        $subject = 'Forgot password multi login';
        $message = '

        Forgot your password

        ------------------------
        Username: '.$un.'
        ------------------------

        Please click this link to set new password:
        http://localhost/landing_page.php'.$email.'

        ';

        $headers = 'From:noreply@kautube.com' . "\r\n";
        mail($to, $subject, $message, $headers);
        echo '<div class="alert alert-success" role="alert">Email has been sent to your email</div>';
    } else{
        echo '<div class="alert alert-danger" role="alert">Your email is not registered</div>';
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
        <h3 class="text-center" style="font-weight:bolder;margin:10px 0;">Forgot Password</h3>
        <form method="post">
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda" required/>
            </div>
            <button type="submit" name="forgot" class="btn btn-primary btn-block">Kirim</button>
            <p style="clear:both;">
                <div style="float:left;"><a href="landing_page.php">Login Area</a></div>
            </p>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>