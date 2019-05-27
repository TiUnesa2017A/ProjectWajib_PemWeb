<?php
include 'koneksi.php';
?>
<h2>Data Mahasiswa</h2>

<p><a href="index.php">Beranda</a> / <a href="form_simpan.php">Tambah Data</a></p>
<form action="cari.php" method="get">
<label>Cari :</label>
<input type="text" name="cari">
<input type="submit" value="Cari">
</form>

<?php
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
echo "<b>Hasil Pencarian :".$cari."<b>";
}
?>

<table border="1" width="100%">
	<tr>
		<th>No</th>
		<th>Foto</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Prodi</th>
		<th>Fakultas</th>
		<th colspan="2">Aksi</th>
	</tr>
<?php
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
$data = mysqli_query($connect, "SELECT * FROM siswa WHERE nama like '%".$cari."%'");
}else{
$data = mysqli_query($koneksi, "SELECT * FROM siswa");
}
$no = 1;
while($d = mysqli_fetch_array($data)){
?>
<tr>
<td><?php echo $no++; ?></td>
<td><img src="images/<?php echo $d['foto']; ?>" width="100" height="100"></td>
<td><?php echo $d['nim']; ?></td>
<td><?php echo $d['nama']; ?></td>
<td><?php echo $d['jenis_kelamin']; ?></td>
<td><?php echo $d['prodi']; ?></td>
<td><?php echo $d['fakultas']; ?></td>
</tr>
<?php } ?>
</table