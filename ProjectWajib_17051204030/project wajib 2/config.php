<?php
$dbh = new mysqli("localhost","root","","formlogin");
if($dbh->connect_error){
  die("tidak dapat connect".$dbh->connect_error);
}
 ?>