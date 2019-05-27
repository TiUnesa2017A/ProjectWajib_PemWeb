<?php
session_start();
include ('config.php');

$update=false;
$id="";
$name="";
$jk="";
$prodi="";
$fakultas="";
$photo="";


if(isset($_POST['add'])){
  $name=$_POST['name'];
  $jk=$_POST['jk'];
  $prodi=$_POST['prodi'];
  $fakultas=$_POST['fakultas'];

  $photo=$_FILES['image']['name'];
  $upload="uploads/".$photo;

  $query="INSERT INTO mahasiswa(name,jk,prodi,fakultas,photo)VALUES(?,?,?,?,?)";
  $stmt=$conn->prepare($query);
  $stmt->bind_param("sssss",$name,$jk,$prodi,$fakultas,$upload);
  $stmt->execute();
  move_uploaded_file($_FILES['image']['tmp_name'],$upload);

  header('location:index.php');
  $_SESSION['response']="Sukses";
  $_SESSION['res_type']="success";
}
if(isset($_GET['delete'])){
  $id=$_GET['delete'];

  $sql="SELECT photo FROM mahasiswa WHERE id=?";
  $stmt2=$conn->prepare($sql);
  $stmt2->bind_param("i",$id);
  $stmt2->execute();
  $result2=$stmt2->get_result();
  $row=$result2->fetch_assoc();


  $imagepath=$row['photo'];
  unlink($imagepath);

  $query="DELETE FROM mahasiswa WHERE id=?";
  $stmt=$conn->prepare($query);
  $stmt->bind_param("i",$id);
  $stmt->execute();

  header('location:index.php');
  $_SESSION['response']="Sukses Delete";
  $_SESSION['res_type']="success";
}
if(isset($_GET['edit'])){
  $id=$_GET['edit'];
  $query="SELECT * FROM mahasiswa WHERE id=?";
  $stmt=$conn->prepare($query);
  $stmt->bind_param("i",$id);
  $stmt->execute();
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();

  $id=$row['id'];
  $name=$row['name'];
  $jk=$row['jk'];
  $prodi=$row['prodi'];
  $fakultas=$row['fakultas'];
  $photo=$row['photo'];
  $update=true;
}
if(isset($_POST['update'])){
  $id=$_POST['id'];
  $name=$_POST['name'];
  $jk=$_POST['jk'];
  $prodi=$row['prodi'];
  $fakultas=$row['fakultas'];
  $oldimge=$_POST['oldimage'];
  if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
    $newimage="uploads/".$_FILES['image']['name'];
    unlink($oldimge);
    move_uploaded_file($_FILES['image']['tmp_name'],$newimage);
  }else{
    $newimage=$oldimge;
  }
  $query="UPDATE mahasiswa SET name=?,jk=?,prodi=?,fakultas=?,photo=? WHERE id=?";
  $stmt=$conn->prepare($query);
  $stmt->bind_param("sssssi",$name,$jk,$prodi,$fakultas,$newimage,$id);
  $stmt->execute();
  $_SESSION['response']="Updated Succsessfully";
  $_SESSION['res_type']="Primary";
  header('location:index.php');
}
if(isset($_GET['details'])){
  $id=$_GET['details'];
  $query="SELECT * FROM mahasiswa WHERE id=?";
  $stmt=$conn->prepare($query);
  $stmt->bind_param("i",$id);
  $stmt->execute();
  $result=$stmt->get_result();
  $row=$result->fetch_assoc();

  $vid=$row['id'];
  $vname=$row['name'];
  $vjk=$row['jk'];
  $vprodi=$row['prodi'];
  $vfakultas=$row['fakultas'];
  $vphoto=$row['photo'];
}
 ?>
