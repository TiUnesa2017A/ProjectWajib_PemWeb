<?php 
include_once("user.php");
$user= new User();

$user->aktifasi($_GET['kode']);

header("location:login.php");

 ?>
