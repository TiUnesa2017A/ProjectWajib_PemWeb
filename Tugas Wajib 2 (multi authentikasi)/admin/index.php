<?php
require "../config.php";
session_start();
if(!isset($_SESSION['username'])) {
    ?>
<script>
location.href = 'index.php'
</script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Multi Auth</title>

        <!-- Bootstrap -->
        <link href="../assets/css/bootstrap-flatly.css" rel="stylesheet">
        <link href="../assets/css/font-awesome.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>

        <div class="container" style="padding-top:2em;">
            <div class="jumbotron">
                <h2><?php echo $_SESSION['username'] ?></h2>
                <p>Selamat Datang <?php echo $_SESSION['type'] ?></p>
                <a href="../logout.php"><button type="button" class="btn btn-primary">Logout</button></a>
            </div>
        </div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="../assets/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>

</html>
