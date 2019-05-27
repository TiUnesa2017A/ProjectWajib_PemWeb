<?php include_once('config.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
    $row    =   $db->getAllRecords('users','*',' AND id="'.$_REQUEST['id'].'"');
}

?>
<!doctype html>
<html>
<head>
	<title>Detail Info Mahasiswa</title>
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container mt-5 pb-5" style="background-color: #f7f7f7; border-radius: 5px;">
	<a href="index.php"><button class="btn btn-primary float-right mt-3" >Daftar Mahasiswa</button></a>
	<h1>Info Mahasiwa</h1>
	<center><img class="m-3" src="foto/<?php echo $row[0]['foto']; ?>" width="240" height="240"></center>
	<div class="row">
		<div class="col-sm-3">
			<h4>Nama</h4>
			<h4>NIM</h4>
			<h4>Email</h4>
			<h4>Prodi</h4>
			<h4>Fakultas</h4>
			<h4>Tanggal Lahir</h4>
			<h4>Alamat</h4>
			<h4>Kota Asal</h4>
		</div>
		<div class="col-sm-6">
			<h4>: <?php echo $row[0]['nama']; ?></h4>
			<h4>: <?php echo $row[0]['nim']; ?></h4>
			<h4>: <?php echo $row[0]['email']; ?></h4>
			<h4>: <?php echo $row[0]['prodi']; ?></h4>
			<h4>: <?php echo $row[0]['fakultas']; ?></h4>
			<h4>: <?php echo $row[0]['tgl_lahir']; ?></h4>
			<h4>: <?php echo $row[0]['alamat']; ?></h4>
			<h4>: <?php echo $row[0]['kota']; ?></h4>
		</div>
	</div>

</div>

</body>
</html>