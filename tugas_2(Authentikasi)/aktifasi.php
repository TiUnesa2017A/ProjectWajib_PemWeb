<?php 
	include_once("fungsi.php");
	$user= new User();

	$user->aktifasi($_GET['kode']);

	header("location:login.php");

 ?>