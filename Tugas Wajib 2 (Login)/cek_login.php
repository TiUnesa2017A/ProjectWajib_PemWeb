<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai guru
	if($data['level']=="guru"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "guru";
		// alihkan ke halaman dashboard guru
		header("location:halaman_guru.php");

	// cek jika user login sebagai murid
	}else if($data['level']=="siswa"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "siswa";
		// alihkan ke halaman dashboard murid
		header("location:halaman_siswa.php");

	// cek jika user login sebagai staff
	}else if($data['level']=="staff"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "staff";
		// alihkan ke halaman dashboard staff
		header("location:halaman_staff.php");

	}else{

		// alihkan ke halaman login kembali
		header("landing_page.php?pesan=gagal");
	}

	
}else{
	header("landing_page.php?pesan=gagal");
}



?>