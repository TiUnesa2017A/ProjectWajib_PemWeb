<html>
<head>
	<title>Tugas 1</title>
</head>
<body>
	<h1>Data Mahasiswa</h1>
	<a href="form_simpan.php">Tambah Data</a><br><br>
	<form action="cari.php" method="get">
<label>Cari :</label>
<input type="text" name="cari">
<input type="submit" value="Cari">
</form><br>

<?php
include('koneksi.php');
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
echo "<b>Hasil Pencarian :".$cari."<b>";
}
?>

	<table border="1" width="100%">
	<tr>
		<th>Foto</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Prodi</th>
		<th>Fakultas</th>
		<th colspan="2">Aksi</th>
	</tr>
	<?php
	// Load file koneksi.php
	include "koneksi.php";
	if(isset($_GET['cari'])){
$cari = $_GET['cari'];
$data = mysqli_query("SELECT * FROM siswa WHERE mhs_nama like '%".$cari."%'");
}else{
	
	$query = "SELECT * FROM siswa"; // Query untuk menampilkan semua data siswa
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
	
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
		echo "<td>".$data['nim']."</td>";
		echo "<td>".$data['nama']."</td>";
		echo "<td>".$data['jenis_kelamin']."</td>";
		echo "<td>".$data['prodi']."</td>";
		echo "<td>".$data['fakultas']."</td>";
		echo "<td><a href='form_ubah.php?nim=".$data['nim']."'>Ubah</a></td>";
		echo "<td><a href='proses_hapus.php?nim=".$data['nim']."'>Hapus</a></td>";
		echo "</tr>";
	}
	}
	?>
	</table>
</body>
</html>
