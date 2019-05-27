<?php
session_start();
include "koneksiLogin.php";

$username = $_POST['username'];
$password = md5 ($_POST['password']);

$query = "select * from user where username = '$username' and password = '$password'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

if ($row ['tingkat'] = "ad") {
    header("location: homeAdmin.php"); ?>
<?php
}
elseif ($row ['tingkat'] = "do") {
    header("location: homeDosen.php"); ?>
<?php
}
elseif ($row ['tingkat'] = "ma") {
    header("location: homeMhs.php"); ?>
    <?php
}
else {
    echo "Anda gagal login. Silahkan : ";?>
    <a href="loginForm.php">login kembali</a>
<?php
    echo mysqli_error($connect);
}

?>