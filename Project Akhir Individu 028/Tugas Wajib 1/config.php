<?php
$host = "localhost";
$user = "root";
$dbName = "mahasiswa";

$openConnection = new mysqli($host,$user,"",$dbName);
if($openConnection->connect_error){
  die("Connection Attempt Was Failed".$openConnection->connect_error);
}
 ?>
