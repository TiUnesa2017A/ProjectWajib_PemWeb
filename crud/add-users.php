<?php include_once('config.php');

$userProdi	=	$db->getAllRecords('prodi','*','ORDER BY id DESC');
$userFakultas	=	$db->getAllRecords('fakultas','*','ORDER BY id DESC');

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){

	$namaFile = $_FILES['userimage']['name'];
	$namaSementara = $_FILES['userimage']['tmp_name'];
	$dirUpload = "img/";
	$userimage = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

	extract($_REQUEST);
	if($username==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=name');
		exit;
	}elseif($userJk==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=jk');
		exit;
	}elseif($userimage==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=image');
		exit;
	}elseif($userprodi==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=prodi');
		exit;
		}
	elseif($fakultas==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=fakultas');
		exit;
		}
	elseif($tgl_lahir==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=tgl_lahir');
		exit;
		}
	elseif($alamat==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=alamat');
		exit;
		}
	elseif($kota==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=kota');
		exit;
		}
	elseif($email==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=email');
		exit;
		}
	elseif($nim==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=nim');
		exit;
		}
	else{
		$data	=	array(
						'username'=>$username,
						'userJk'=>$userJk,
						'userimage'=>$namaFile,
						'userprodi'=>$userprodi,
						'fakultas'=>$fakultas,
						'nim'=>$nim,
						'tgl_lahir'=>$tgl_lahir,
						'alamat'=>$alamat,
						'kota'=>$kota,
						'email'=>$email,
						);
		$insert	=	$db->insert('users',$data);
		if($insert){
			header('location:'.$_SERVER['PHP_SELF'].'?msg=ras');
			exit;
		}else{
			header('location:'.$_SERVER['PHP_SELF'].'?msg=rna');
			exit;
		}
	}
}

?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>CRUD</title>
	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	
	<br>
   	<div class="container">
		<a href="browse-users.php"><h1 style="text-align: center; color:blue;"></h1></a>
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="name"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name tidak boleh kosong</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="jk"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User jenis kelamin tidak boleh kosong</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="image"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User image tidak boleh kosong</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="prodi"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User prodi tidak boleh kosong</div>';
		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="fakultas"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User fakultas tidak boleh kosong</div>';
		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="nim"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User Nim tidak boleh kosong</div>';
		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="tgl_lahir"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User tanggal lahir tidak boleh kosong</div>';
		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="alamat"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User alamat tidak boleh kosong</div>';
		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="kota"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User kota tidak boleh kosong</div>';
		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="email"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email tidak boleh kosong</div>';
		}
		elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a user and then try again!</div>';
		}
		?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="browse-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>
			<div class="card-body" style="justify-content: center;">
				
				<div class="col-sm-6" style="justify-content: center;">
					<form method="post" style="justify-content: center;" enctype="multipart/form-data">
						<div class="form-group">
							<label>User Name <span class="text-danger">*</span></label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Enter user name" required>
						</div>
						<div class="form-group">
							<label>User Nim <span class="text-danger">*</span></label>
							<input type="text" name="nim" id="nim" class="form-control" placeholder="Enter user Nim" required>
						</div>
						<div class="form-group">
							<label>User Email <span class="text-danger">*</span></label>
							<input type="email" name="email" id="email" class="form-control" placeholder="Enter user Email" required>
						</div>
						<div class="form-group">
							<label>User Jenis Kelamin <span class="text-danger">*</span></label>
							<select name="userJk" id="userJk" class="form-control" required>
							<option class="disable selected">pilih jenis kemalmin</option>
							<option value="Laki-laki">Laki - Laki</option>
							<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>User image <span class="text-danger">*</span></label>
							<input type="file" name="userimage" id="userimage" class="form-control" required>
						</div>
						<div class="form-group">
							<label>User Prodi <span class="text-danger">*</span></label>
							<select name="userprodi" id="userprodi" class="form-control" required>
							<option class="disable selected">pilih prodi</option>
							<?php 
							foreach($userProdi as $prodi){
							?>
								<option value="<?php echo $prodi['prodi']; ?>"><?php echo $prodi['prodi']; ?></option>
							<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>User Fakultas <span class="text-danger">*</span></label>
							<select name="fakultas" id="fakultas" class="form-control" required>
							<option class="disable selected">pilih fakultas</option>
							<?php 
							foreach($userFakultas as $fakultas){
							?>
								<option value="<?php echo $fakultas['fakultas']; ?>"><?php echo $fakultas['fakultas']; ?></option>
							<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>User Tangal Lahir <span class="text-danger">*</span></label>
							<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
						</div>
						<div class="form-group">
							<label>User Alamat <span class="text-danger">*</span></label>
							<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan user Alamat" required>
						</div>
						<div class="form-group">
							<label>User Kota Asal <span class="text-danger">*</span></label>
							<select name="kota" id="kota" class="form-control" required>
								<option class="disable selected">pilih kota</option>
								<option value="Surabaya">Surabaya</option>
								<option value="Mojokerto">Mojokerto</option>
								<option value="Jakarta">Tuban</option>
								<option value="Jogja">Jogja</option>
								<option value="Semarang">Semarang</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-danger"><i class="fa fa-fw fa-plus-circle"></i> Add User</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><br><br>
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</body>
</html>