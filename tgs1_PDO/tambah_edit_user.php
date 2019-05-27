<?php include_once('koneksi.php');

$prodi	 =	$db->getAllRecords('prodi','*','ORDER BY id DESC');
$fakultas=	$db->getAllRecords('fakultas','*','ORDER BY id DESC');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('user','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	$foto = $_FILES['foto']['name'];
	$namaSementara = $_FILES['foto']['tmp_name'];
	$dirUpload = "img/";
	$userimage = move_uploaded_file($namaSementara, $dirUpload.$foto);

	extract($_REQUEST);
	if($username==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=name');
		exit;
	}elseif($jenis_kelamin==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=jk');
		exit;
	}elseif($foto==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=image');
		exit;
	}elseif($prodi==""){
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
						'jenis_kelamin'=>$jenis_kelamin,
						'foto'=>$foto,
						'prodi'=>$prodi,
						'fakultas'=>$fakultas,
						'nim'=>$nim,
						'tgl_lahir'=>$tgl_lahir,
						'alamat'=>$alamat,
						'kota'=>$kota,
						'email'=>$email,
						);
		if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=''){
			$insert = $db->update('user',$data,array('id'=>$editId));
			if($insert){
				header('location: user.php?msg=upd');
				exit;
			}else{
				header('location: user.php?msg=rnu');
				exit;
			}
		}
		else{
			$insert	= $db->insert('user',$data);
			if($insert){
				header('location:'.$_SERVER['PHP_SELF'].'?msg=in');
				exit;
			}else{
				header('location:'.$_SERVER['PHP_SELF'].'?msg=not');
				exit;
		}
		}
	}
}

?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>PHP CRUD Based PDO Steatment</title>
	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
	
	<br>
   	<div class="container">
		<a href="user.php"><h1 style="text-align: center;">PHP CRUD Based PDO Steatment</h1></a>
		<?php
			if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="name"){
				echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Username tidak boleh kosong</div>';
			}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="jk"){
				echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Jenis kelamin tidak boleh kosong</div>';
			}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="image"){
				echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Foto tidak boleh kosong</div>';
			}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="prodi"){
				echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Prodi tidak boleh kosong</div>';
			}
			elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="fakultas"){
				echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Fakultas tidak boleh kosong</div>';
			}
			elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="nim"){
				echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Nim tidak boleh kosong</div>';
			}
			elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="tgl_lahir"){
				echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Tanggal lahir tidak boleh kosong</div>';
			}
			elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="alamat"){
				echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Alamat tidak boleh kosong</div>';
			}
			elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="kota"){
				echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Kota tidak boleh kosong</div>';
			}
			elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="email"){
				echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Alamat email tidak boleh kosong</div>';
			}
			elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="in"){
				echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Data berhasil ditambahkan!</div>';
			}
			elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="in" and $_REQUEST['editId']){
				echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Data berhasil diedit!</div>';
			}
			elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="not"){
				echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Tidak berhasil<strong>Coba lagi!</strong></div>';
			}
		?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>
			<?php 
				if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=''){
					echo " Edit User";
				}
				else{
					echo " Tambah User";
				}
			?>
			</strong>  <a href="user.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Lihat User</a></div>
			<div class="card-body" style="justify-content: center;">
				<div class="col-sm-6" style="justify-content: center;">
					<form method="post" style="justify-content: center;" enctype="multipart/form-data">
						<div class="form-group">
							<label>Username <span class="text-danger">*</span></label>
							<input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=''){ echo $row[0]['username']; } ?>" required>
						</div>
						<div class="form-group">
							<label>Nim <span class="text-danger">*</span></label>
							<input type="text" name="nim" id="nim" class="form-control"
							value="<?php if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=''){ echo $row[0]['nim']; } ?>"
							 placeholder="Nim" required>
						</div>
						<div class="form-group">
							<label>Email <span class="text-danger">*</span></label>
							<input type="email" name="email" id="email" class="form-control" 
							value="<?php if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=''){ echo $row[0]['email']; } ?>"
							placeholder="Email" required>
						</div>
						<div class="form-group">
							<label>Jenis Kelamin <span class="text-danger">*</span></label>
							<select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
							<?php 
								if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=''){
										$jk=$row[0]['jenis_kelamin'];
										$b=true;
								}
								else{
									$b=false;
								}
							?>
								<option class="disable selected">Pilih jenis kelamin</option>
								<option <?php if($b==true){echo ($jk=='Laki-laki') ? "selected=''": ""; } ?> value="Laki-laki">Laki - Laki</option>
								<option <?php if($b==true){echo ($jk=='Perempuan') ? "selected=''": "";}  ?>value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>Foto <span class="text-danger">*</span></label><br>
							<input type="file" name="foto" id="foto" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Fakultas <span class="text-danger">*</span></label>
							<select name="fakultas" id="fakultas" class="form-control" required>
								<option class="disable selected">Pilih fakultas</option>
								<?php 
									foreach($fakultas as $fak){
								?>
									<option <?php 
										if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=''){
												echo $fak['fakultas'] ? "selected": "" ;
											}
											?> value="<?php echo $fak['fakultas']; ?>"><?php echo $fak['fakultas']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Prodi <span class="text-danger">*</span></label>
							<select name="prodi" id="prodi" class="form-control" required>
								<option class="disable selected">Pilih prodi</option>
								<?php 
									foreach($prodi as $pr){
								?> 
									<option <?php 
										if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=''){
												echo $pr['prodi'] ? "selected": "" ;
											}
											?> value="<?php echo $pr['prodi']; ?>"><?php echo $pr['prodi']; ?></option>
								<?php } ?>
								</select>
						</div>
						<div class="form-group">
							<label>Tangal Lahir <span class="text-danger">*</span></label>
							<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" 
							<?php 
								if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=''){
										echo "value = '".$row[0]['tgl_lahir']."'";
								}
							 ?>
							required>
						</div>
						<div class="form-group">
							<label>Alamat <span class="text-danger">*</span></label>
							<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" 
							<?php 
								if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=''){
										echo "value = '".$row[0]['alamat']."'";
								}
							 ?>
							required>
						</div>
						<div class="form-group">
							<label>Kota Asal <span class="text-danger">*</span></label>
							<select name="kota" id="kota" class="form-control" required>
								<?php 
									if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=''){
											$kt=$row[0]['kota'];
									}
								?>
								<option class="disable selected">Pilih kota</option>
								<option <?php if($b==true){echo $kt ? "selected=''": "";}  ?>value="Surabaya">Surabaya</option>
								<option <?php if($b==true){echo $kt ? "selected=''": "";}?>value="Bandung">Bandung</option>
								<option <?php if($b==true){echo $kt ? "selected=''": "";}?>value="Jakarta">Jakarta</option>
								<option <?php if($b==true){echo $kt ? "selected=''": "";} ?>value="Jogja">Jogja</option>
								<option <?php if($b==true){echo $kt ? "selected=''": "";} ?>value="Solo">Solo</option>
								<option <?php if($b==true){echo $kt ? "selected=''": "";}?>value="Ponorogo">Ponorogo</option>
								<option <?php if($b==true){echo $kt ? "selected=''": "";} ?>value="Semarang">Semarang</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> 
								<?php 
									if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=''){
										echo " Simpan";
									}
									else{
										echo " Tambah User";
									}
								 ?>
							</button>
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