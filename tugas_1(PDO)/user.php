<?php include_once('koneksi.php');?>
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
	<?php
	$condition	=	'';
	if(isset($_REQUEST['username']) and $_REQUEST['username']!=""){
		$condition	.=	' AND username LIKE "%'.$_REQUEST['username'].'%" ';
	}
	if(isset($_REQUEST['fakultas']) and $_REQUEST['fakultas']!=""){
		$condition	.=	' AND fakultas LIKE "%'.$_REQUEST['fakultas'].'%" ';
	}
	if(isset($_REQUEST['userprodi']) and $_REQUEST['userprodi']!=""){
		$condition	.=	' AND userprodi LIKE "%'.$_REQUEST['userprodi'].'%" ';
	}
	$userData =	$db->getAllRecords('user','*',$condition,'ORDER BY id DESC');
	?>
   	<div class="container">
		<a href="user.php"><h1 style="text-align: center; color: blue;">PHP CRUD Based PDO Steatment</h1></a>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Tampilan Semua User</strong> 
				<a href="tambah_edit_user.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i>Tambah User</a></div>
				<div class="card-body">
					<?php
						if(isset($_REQUEST['set']) and $_REQUEST['set']=="del"){
							echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Data berhasil dihapus!</div>';
						}elseif(isset($_REQUEST['set']) and $_REQUEST['set']=="upd"){
							echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Data berhasil diedit!</div>';
						}elseif(isset($_REQUEST['set']) and $_REQUEST['set']=="rnu"){
							echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Tidak ada data dirubah!</div>';
						}elseif(isset($_REQUEST['set']) and $_REQUEST['set']=="rna"){
							echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
						}
					?>
					<div class="col-sm-12">
						<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>
						<form method="get">
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
										<label>User Name</label>
										<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($_REQUEST['username'])?$_REQUEST['username']:'';?>" placeholder="Cari username">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<label>&nbsp;</label>
										<div><button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Cari</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
			</div>
		</div>
		<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th class="text-center">ID</th>
						<th class="text-center">User Name</th>
						<th class="text-center">Foto</th>
						<th class="text-center">Jenis Kelamin</th>
						<th class="text-center">Prodi</th>
						<th class="text-center">Fakultas</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$s	=	'';
					foreach($userData as $val){
						$s++;
					?>
					<tr>
						<td><?php echo $s;?></td>
						<td><?php echo $val['username'];?></td>
						<td><img src="img/<?php echo $val['foto']; ?>" width="100" height="100"></td>
						<td><?php echo $val['jenis_kelamin'];?></td>
						<td><?php echo $val['prodi'];?></td>
						<td><?php echo $val['fakultas'];?></td>
						<td align="center">
							<a href="tambah_edit_user.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Apakah kamu yakin akan menghapus ?');"><i class="fa fa-fw fa-trash"></i> Hapus</a> |
							<a href="baca.php?readId=<?php echo $val['id'];?>" class="text-info"> Lihat</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		
	</div>
	
</body>
</html>