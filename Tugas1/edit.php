<?php 
include_once('config.php');

$userProdi	=	$db->getAllRecords('prodi','*','ORDER BY id');
$userFakultas	=	$db->getAllRecords('fakultas','*','ORDER BY id');

if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
    $row    =   $db->getAllRecords('users','*',' AND id="'.$_REQUEST['id'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	$namaFile = $_FILES['fotouser']['name'];
	$namaSementara = $_FILES['fotouser']['tmp_name'];
	$dirUpload = "foto/";
	$userimage = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
	extract($_REQUEST);
	if ($namaSementara!="") {
			$data	=	array(
						'nama'=>$nama,
						'jk'=>$jk,
						'foto'=>$namaFile,
						'prodi'=>$prodi,
						'fakultas'=>$fakultas,
						'nim'=>$nim,
						'tgl_lahir'=>$tl,
						'alamat'=>$alamat,
						'kota'=>$kota,
						'email'=>$email,
						);
	}else{
		 	$data	=	array(
						'nama'=>$nama,
						'jk'=>$jk,
						'prodi'=>$prodi,
						'fakultas'=>$fakultas,
						'nim'=>$nim,
						'tgl_lahir'=>$tl,
						'alamat'=>$alamat,
						'kota'=>$kota,
						'email'=>$email,
						);
	}

	$db->update('users',$data,array('id'=>$id));
	header('location:index.php?msg=edit');
	exit;
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Mahasiswa</title>
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5 mb-5" style="background-color: #e8e8e8; border-radius: 5px;">
	<a href="index.php"><button class="btn btn-primary float-right mt-3" >Daftar Mahasiswa</button></a>
	<h1 class="mb-4">Edit Mahasiswa</h1>
	<form  action="" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-sm-6">
			<label>Nama</label>
			<input class="form-control" type="text" <?php echo 'value="'.$row[0]['nama'].'"' ?> name="nama" required> 
			<label>NIM</label>
			<input class="form-control" type="number" <?php echo 'value="'.$row[0]['nim'].'"' ?> name="nim" required> 
			<label>Email</label>
			<input class="form-control" type="email"  <?php echo 'value="'.$row[0]['email'].'"' ?> name="email" required> 
			<label>Jenis Kelamin</label>
			<select name="jk" class="form-control" required>
				<option disabled>Pilih jenis kemalmin</option>
				<option <?php if($row[0]['jk']=="Laki - Laki")echo 'selected' ?> value="Laki - Laki">Laki - Laki</option>
				<option <?php if($row[0]['jk']=="Perempuan")echo 'selected' ?> value="Perempuan">Perempuan</option>
			</select>
			<label>Foto</label>
			<input class="form-control" type="file"  name="fotouser" accept="image/*"> 
		</div>
		<div class="col-sm-6">
			<label>Prodi</label>
			<select name="prodi" class="form-control" required>
				<option disabled selected>Pilih prodi</option>
				<?php foreach($userProdi as $prodi){ ?>
					<option <?php if($row[0]['prodi']==$prodi['prodi'])echo 'selected' ?> value="<?php echo $prodi['prodi']; ?>"><?php echo $prodi['prodi']; ?></option>
				<?php } ?>
			</select>
			<label>Fakultas</label>
			<select name="fakultas" class="form-control" required>
				<option disabled selected>Pilih fakultas</option>
				<?php foreach($userFakultas as $fakultas){ ?>
					<option <?php if($row[0]['fakultas']==$fakultas['fakultas'])echo 'selected' ?> value="<?php echo $fakultas['fakultas']; ?>"><?php echo $fakultas['fakultas']; ?></option>
				<?php } ?>
			</select>
			<label>Tanggal Lahir</label>
			<input <?php echo 'value="'.$row[0]['tgl_lahir'].'"' ?> class="form-control" type="date" name="tl" required> 
			<label>Alamat</label>
			<input <?php echo 'value="'.$row[0]['alamat'].'"' ?> class="form-control" type="text" name="alamat" required> 
			<label>Kota/Kabupaten</label>
			<input <?php echo 'value="'.$row[0]['kota'].'"' ?> class="form-control" type="text" name="kota" required> 
			<button type="submit" name="submit" value="submit" class="btn btn-primary float-right mt-3 mb-3">Edit</button>
		</div>
		</form>
	</div>
	

</div>
</body>
</html>
