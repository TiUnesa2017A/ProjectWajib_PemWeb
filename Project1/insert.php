<?php
//add dbconnect

include('dbconnect.php');

$nama = $_POST['nm_mhs'];
$jenkel = $_POST['jk_mhs'];
$prodi = $_POST['prodi'];
$fakultas = $_POST['fakultas'];
$picture = $_POST['foto'];

//query

$query =  "INSERT INTO project(nm_mhs , jk_mhs , prodi , fakultas) VALUES('$nama' , '$jenkel' , '$prodi' , '$fakultas')";

if (mysqli_query($conn , $query)) {
	# code redicet setelah insert ke index
	header("location:index.php");
	$picture = Image;
}
else{
	echo "ERROR, tidak berhasil". mysqli_error($conn);
}

mysqli_close($conn);
?>