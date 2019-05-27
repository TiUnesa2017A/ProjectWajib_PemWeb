<?php
$conn = new mysqli("127.0.0.1:3307","root","","login_uas");
if($conn->connect_error){
  die("tidak dapat connect".$conn->connect_error);
}
?>