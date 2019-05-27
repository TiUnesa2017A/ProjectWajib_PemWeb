<?php
$conn = new mysqli("localhost","root","","login");
if($conn->connect_error){
  die("tidak dapat connect".$conn->connect_error);
}
 ?>
