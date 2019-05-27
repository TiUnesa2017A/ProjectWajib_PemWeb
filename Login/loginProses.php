<?php

include "koneksiLogin.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "select * from user where username = '$username' and password = '$password'";
$result = mysqli_query($connect, $query);
$cek = mysqli_num_rows($result);

if ($cek){
    echo "Anda berhasil masuk. Silahkan menuju "; ?>
    <a href="homeAdmin.php"> HOME </a>

<?php
}

else {
    echo "Anda gagal login. Silahkan "; ?>
    <a href="loginForm.php">Login Kembali</a>

    <?php

    echo mysqli_error($connect);
}

?>