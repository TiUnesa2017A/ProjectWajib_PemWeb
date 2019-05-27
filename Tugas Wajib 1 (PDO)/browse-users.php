<?php include_once('config.php');?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Tugas Wajib 1</title>
	<style>
		body {
			background-image: url("img/paris.jpg");
			background-size: cover;
			height: 100%;
		}
	</style>
	
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
	$userData	=	$db->getAllRecords('users','*',$condition,'ORDER BY id DESC');
	?>
   	<div class="container">
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse User</strong> <a href="add-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Users</a></div>
			<div class="card-body">
				<?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
				}
				?>
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($_REQUEST['username'])?$_REQUEST['username']:''?>" placeholder="Enter user name">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<input type="text" name="userJk" id="userJk" class="form-control" value="<?php echo isset($_REQUEST['userJk'])?$_REQUEST['userJk']:''?>" placeholder="Enter user gender">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Prodi</label>
									<input type="tel" name="userprodi" id="userprodi" class="form-control" value="<?php echo isset($_REQUEST['userprodi'])?$_REQUEST['userprodi']:''?>" placeholder="Enter user Prodi">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div><button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button></div>
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
						<th>No</th>
						<th>Foto</th>
						<th>NamaMHS</th>
						<th>JK</th>
						<th>Prodi</th>
						<th>Fakultas</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody style="background-color: #ffffff">
					<?php 
					$s	=	'';
					foreach($userData as $val){
						$s++;
					?>
					<tr>
						<td><?php echo $s;?></td>
						<td><img src="img/<?php echo $val['userimage']; ?>" width="100" height="100"></td>
						<td><?php echo $val['username'];?></td>
						<td><?php echo $val['userJk'];?></td>
						<td><?php echo $val['userprodi'];?></td>
						<td><?php echo $val['fakultas'];?></td>
						<td align="center">
							<a href="edit-users.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a> |
							<a href="read.php?readId=<?php echo $val['id'];?>" class="text-info"> Read</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <br><br>
</body>
</html>