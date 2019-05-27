<?php
session_start();
include "koneksiLogin.php";

if (isset($_POST['regis_btn'])) {

    $nama = ($_POST['nama']);
    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $tingkat = ($_POST['tingkat']);
    $password = ($_POST['password']);
    $password2 = ($_POST['password2']);

    if (!empty($nama) || !empty($username) || !empty($email) || !empty($tingkat) || !empty($password) || !empty($password2)) {
        if ($password == $password2) {
            $password = md5($password);
            $sql = "insert into login (nama, username, email, password, tingkat) VALUES ('$nama', '$username', '$email', '$password', '$tingkat')";
            $result = mysqli_query($connect, $sql);

            if ($tingkat = "ad") {
                echo "Anda berhasil login. Silahkan masuk ke : "; ?>
                <a href="homeAdmin.php">HOME</a>
                <?php
            }
            elseif ($tingkat = "do") {
                echo "Anda berhasil login. Silahkan masuk ke : "; ?>
                <a href="homeDosen.php">HOME</a>
                <?php
            }
            elseif ($tingkat = "ma") {
                echo "Anda berhasil login. Silahkan masuk ke : "; ?>
                <a href="homeMhs.php">HOME</a>
                <?php
            }
            else {
                echo "Anda gagal login. Silahkan : ";?>
                <a href="loginForm.php">login kembali</a>
                <?php
                echo mysqli_error($connect);
            }
        }
        else {
            $_session['message'] = "The two password didn't match!";
        }
    }
    else {
        echo "All fields are required";
        die();
    }
}
?>


<html>
<head>
    <title>REGISTER</title>
    <link rel="stylesheet" type="text/css" href="setail.css">
</head>
<body>
    <div class="header">
        <h1>REGISTER</h1>
    </div>
    <form method="post" action="registerForm.php">
        <table>
            <tr>
                <td>Nama : </td>
                <td><input type="text" name="nama" class="textInput" required></td>
            </tr>

            <tr>
                <td>Username : </td>
                <td><input type="text" name="username" class="textInput" required></td>
            </tr>

            <tr>
                <td>Email : </td>
                <td><input type="email" name="email" class="textInput" required></td>
            </tr>

            <tr>
                <td>Tingkatan : </td>
                <td>
                    <input type="radio" name="tingkat" value="do" required> Dosen
                    <input type="radio" name="tingkat" value="ma" required> Mahasiswa
                    <input type="radio" name="tingkat" value="ad" required> Admin
                </td>
            </tr>

            <tr>
                <td>Password : </td>
                <td><input type="password" name="password" class="textInput" required></td>
            </tr>

            <tr>
                <td>Password 2 : </td>
                <td><input type="password" name="password2" class="textInput" required></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="regis_btn" value="Register"></td>
            </tr>
        </table>
    </form>
    <br> Already have an account? <a href="loginForm.php">Login Here</a>
</body>
</html>