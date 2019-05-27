<?php
session_start();
include ('config.php');
if(isset($_POST['add'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];


  $query="INSERT INTO register(name,email,password)VALUES(?,?,?)";
  $stmt=$conn->prepare($query);
  $stmt->bind_param("sss",$name,$email,$password);
  $stmt->execute();


  header('location:login.php');
  $_SESSION['response']="Sukses";
  $_SESSION['res_type']="success";
}
if(isset($_GET['login'])){
  $email=$_GET['login'];
  $query="SELECT * FROM login WHERE email=?,password=?";
  $stmt=$conn->prepare($query);
  $stmt->bind_param("e",$email);
  $stmt->execute();
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();
  header('location:register.php');
  $_SESSION['response']="Sukses";
  $_SESSION['res_type']="success";
}
