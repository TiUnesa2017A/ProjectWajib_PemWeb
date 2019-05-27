<html>
<head>
	<title>Aplikasi CRUD dengan PHP</title>
</head>
<body>
	<h1>Tambah Data Mahasiswa</h1>
	<form method="post" action="proses_simpan.php" enctype="multipart/form-data">
	<table cellpadding="8">
	<tr>
		<td>NIM</td>
		<td><input type="text" name="nim"></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>
		<input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
		<input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
		</td>
	</tr>
	<tr>
		<td>Prodi</td>
		<<td>
<select name="prodi" required>
<option value="">Pilih Prodi</option>
<option value="ti">Teknik Informatika</option>
<option value="mi">Manajemen Informatika</option>
<option value="pti">Pend. Teknologi Informasi</option>
<option value="si">Sistem Informasi</option>
</select>
</td>
	</tr>
	<tr>
		<td>Fakultas</td>
		<td>
<select name="fakultas" required>
<option value="">Pilih Fakultas</option>
<option value="teknik">Fakultas Teknik</option>
</select>
</td>

	</tr>
	<tr>
		<td>Foto</td>
		<td><input type="file" name="foto"></td>
	</tr>
	</table>
	
	<hr>
	<input type="submit" value="Simpan">
	<a href="index.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>
