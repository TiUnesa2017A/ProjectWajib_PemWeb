<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRUD</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

</head>
<body>

	<?php
	//tambahkan dbconnect
	include('dbconnect.php');

	//query
	$query = "SELECT * FROM project";

	$result = mysqli_query($conn , $query);

	?>

	<div class="container bg-info" style="padding-top: 20px; padding-bottom: 20px;">
		<h3><center>CRUD APP Mahasiswa</center></h3>
		<hr>
		<div class="row">
			<div class="col-sm-4">
				<h3>Form Tambah Mahasiswa</h3>
				<form role="form" action="insert.php" method="post">
					<div class="form-group">
						<label>Nama Mahasiswa</label>
						<input type="text" name="nm_mhs" class="form-control">
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<input type="text" name="jk_mhs" class="form-control">
					</div>
					<div class="form-group">
						<label>Prodi</label>
						<input type="text" name="prodi" class="form-control">
					</div>
					<div class="form-group">
						<label>Fakultas</label>
						<input type="text" name="fakultas" class="form-control">
					</div>
					<div class="form-group">
						<label>Upload foto</label>
					Image : <input name="picture" type="file" />
					</div>
					<button type="submit" class="btn btn-info btn-block">Tambah Mahasiswa</button>					
				</form>
				
			</div>
			<div class="col-sm-8">
				<h3>Tabel Daftar Mahasiswa</h3>
				<table class="table table-striped table-hover dtabel">
					<thead>
						<tr>
							<th>No</th>
							<th>Foto</th>
							<th>Nama Mahasiswa</th>
							<th>Jenis Kelamin</th>
							<th>Prodi</th>
							<th>Fakultas</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody> 
						
						<?php
							$no = 1;  
							while ($row = mysqli_fetch_assoc($result)) {
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><img src='img/profil.png' width='70' height='70'></td>
							<td><?php echo $row['nm_mhs']; ?></td>
							<td><?php echo $row['jk_mhs']; ?></td>
							<td><?php echo $row['prodi']; ?></td>
							<td><?php echo $row['fakultas']; ?></td>
							<td>
								<a href="editform.php?id=<?php echo $row['nim_mhs'];?>" class="btn btn-success" role="button">Edit</a>
								<a href="delete.php?id=<?php echo $row['nim_mhs']?>" class="btn btn-danger" role="button">Delete</a>
							</td>
						</tr>

						<?php
							}
							mysqli_close($conn); 
						?>
					</tbody>
				</table>
			</div>
			
		</div>
		
	</div>
</body>

	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
		$('.dtabel').DataTable();
	} );
	</script>

</html> 