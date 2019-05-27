<!DOCTYPE html>
<?php 
	include_once('config.php');
	$kondisi	=	'';
	if(isset($_REQUEST['cari']) and $_REQUEST['cari']!=""){
		$kondisi	=	' AND nama LIKE "%'.$_REQUEST['cari'].'%" OR jk LIKE "%'.$_REQUEST['cari'].'%" OR prodi LIKE "%'.$_REQUEST['cari'].'%" OR fakultas LIKE "%'.$_REQUEST['cari'].'%" ';
	}
	$userData	=	$db->getAllRecords('users','*',$kondisi,'ORDER BY id');


?>
<html>
<head>
	<title>Daftar Mahasiswa</title>
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="card">
	<?php 
	if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="del"){
		echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i>Delete Mahasiswa Berhasil !</div>';
	}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="edit"){
		echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i>Edit Mahasiswa Berhasil !</div>';
	}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="tambah"){
		echo '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i>Tambah Mahasiswa Berhasil !</div>';
	}
	?>
<div class="container mt-5">
	<h1><center>Daftar Mahasiswa</center></h1>
	<br>
	<a href="tambah.php"><button class="btn btn-primary float-left">Tambah Mahasiswa</button></a>
	<form method="get">
		<div class="row">
			<div class="col-sm-8">
				
			</div>
			<div class="col-sm-3">
				<input class="form-control float-right mr-2" type="text" placeholder="Cari" name="cari">
			</div>
			<div class="col-sm-1">
				<button class="btn btn-primary float-left" type="submit">Cari</button>
			</div>
		</div>
	</form>

	<!-- Daftar Mahasiswa -->
	<div class="table-responsive mt-4">
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="text-white" style="background-color: #1a63d8">
						<th class="text-center">No</th>
						<th class="text-center">Foto</th>
						<th class="text-center">Nama</th>
						<th class="text-center">Jenis Kelamin</th>
						<th class="text-center">Prodi</th>
						<th class="text-center">Fakultas</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$a	=	'';
					foreach($userData as $val){
						$a++;
					?>
					<tr>
						<td><?php echo $a;?></td>
						<td class="text-center"><img src="foto/<?php echo $val['foto']; ?>" width="100" height="100"></td>
						<td><?php echo $val['nama'];?></td>
						<td class="text-center"><?php echo $val['jk'];?></td>
						<td><?php echo $val['prodi'];?></td>
						<td><?php echo $val['fakultas'];?></td>
						<td class="text-center">
							<a href="detail.php?id=<?php echo $val['id']; ?>"><button class="btn btn-info">Detail</button></a>
							<a href="edit.php?id=<?php echo $val['id'];?>"><button class="btn btn-primary">Edit</button></a>
							<a href="hapus.php?id=<?php echo $val['id']; ?>"onClick="return confirm('Apakah anda yakin ingin menghapus data mahasiswa ini ?');"><button class="btn btn-danger">Hapus</button></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	
</div>
</body>
</html>
