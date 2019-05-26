<?php
session_start();
include_once("user.php");
$user= new User();
$file = fopen("log.txt","a");  
fwrite($file, 'Tanggal dan Jam :'.date('d-m-Y H:i:s').' IP : '.$user->getIP().' Browser : '.$_SERVER['HTTP_USER_AGENT'].' Username : '.$_SESSION['uname'].' Status : Logout'.PHP_EOL);  
fclose($file);  
session_destroy();
header('Location: login.php');
?>