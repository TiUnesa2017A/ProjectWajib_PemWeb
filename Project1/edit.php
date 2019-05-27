<?php
//include('dbconnected.php');
include('dbconnect.php');

$id = $_GET['nim_mhs'];
$judul = $_GET['nm_mhs'];
$penerbit = $_GET['jk_mhs'];
$genre = $_GET['prodi'];
$harga = $_GET['fakultas'];

//query update
$query = "UPDATE project SET nm_mhs='$judul' , jk_mhs='$penerbit' , prodi='$genre' , fakultas='$harga' WHERE nim_mhs='$id' ";

if (mysqli_query($conn, $query)) {
	# credirect ke page index
	header("location:index.php");
	
}
else{
	echo "ERROR, data gagal diupdate". mysqli_error($conn);
}

mysqli_close($conn);
?>