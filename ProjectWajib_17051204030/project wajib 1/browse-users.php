<?php include_once('config.php');?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Browse-Users</title>
	
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
	if(isset($_REQUEST['name']) and $_REQUEST['name']!=""){
		$condition	.=	' AND name LIKE "%'.$_REQUEST['name'].'%" ';
	}
	if(isset($_REQUEST['fakultas']) and $_REQUEST['fakultas']!=""){
		$condition	.=	' AND fakultas LIKE "%'.$_REQUEST['fakultas'].'%" ';
	}
	if(isset($_REQUEST['prodi']) and $_REQUEST['prodi']!=""){
		$condition	.=	' AND prodi LIKE "%'.$_REQUEST['prodi'].'%" ';
	}
	?>
   	<div class="container">
		<a href="browse-users.php"><h1 style="text-align: center; text-info;">View Data Mahasiswa</h1></a>
		<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse User</strong> <a href="index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Users</a></div>
		<div class="card">
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
									<label>name</label>
									<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($_REQUEST['name'])?$_REQUEST['name']:''?>" placeholder="Enter name">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<input type="text" name="jk" id="jk" class="form-control" value="<?php echo isset($_REQUEST['jk'])?$_REQUEST['jk']:''?>" placeholder="Enter jenis kelamin">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Prodi</label>
									<input type="tel" name="prodi" id="prodi" class="form-control" value="<?php echo isset($_REQUEST['prodi'])?$_REQUEST['prodi']:''?>" placeholder="Enter Prodi">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div><button type="submit" name="submit" value="search" id="submit" class="btn btn-yellow"><i class="fa fa-fw fa-search"></i> Search</button></div>
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
						<th>ID</th>
						<th>Nama Mahasiswa</th>
						<th>Image</th>
						<th>Jenis Kelamin</th>
						<th>Prodi</th>
						<th>Fakultas</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
      $query="SELECT * FROM mahasiswa";
      $stmt=$conn->prepare($query);
      $stmt->execute();
      $result=$stmt->get_result();
       ?>
      <h3 class="text-center text-info">Tabel Mahasiswa</h3>
      <table class="table table-hover" id="myTable">
    <thead>
      <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Name</th>
        <th>JK</th>
        <th>Prodi</th>
        <th>Fakultas</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row=$result->fetch_assoc()){?>
      <tr>
        <td><?=$row['id'];?></td>
        <td><img src="<?=$row['image'];?>" width="30"></td>
        <td><?=$row['name'];?></td>
        <td><?=$row['jk'];?></td>
        <td><?=$row['prodi'];?></td>
        <td><?=$row['fakultas'];?></td>
        <td>
          <a href="details.php?details=<?=$row['id'];?>" class="badge badge-primary ">Details</a> |
          <a href="action.php?delete=<?=$row['id'];?>" class="badge badge-danger">Delete</a> |
          <a href="index.php?edit=<?=$row['id'];?>" class="badge badge-success ">Edit</a>
        </td>
      </tr>
    <?php }?>
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