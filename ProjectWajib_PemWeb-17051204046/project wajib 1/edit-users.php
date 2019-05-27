<?php include_once('config.php');
$userProdi	=	$db->getAllRecords('prodi','*','ORDER BY id DESC');

if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('users','*',' AND id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){

	$namaFile = $_FILES['userimage']['name'];
	$namaSementara = $_FILES['userimage']['tmp_name'];
	$dirUpload = "img/";
	$userimage = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

	extract($_REQUEST);
	if($username==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=name&editId='.$_REQUEST['editId']);
		exit;
	}elseif($userJk==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=jk&editId='.$_REQUEST['editId']);
		exit;
	}elseif($userimage==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=image&editId='.$_REQUEST['editId']);
		exit;
	}
	elseif($userprodi==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=prodi&editId='.$_REQUEST['editId']);
		exit;
	}
	$data	=	array(
					'username'=>$username,
					'userJk'=>$userJk,
					'userimage'=>$namaFile,
					'userprodi'=>$userprodi,
					);
	$update	=	$db->update('users',$data,array('id'=>$editId));
	if($update){
		header('location: browse-users.php?msg=rus');
		exit;
	}else{
		header('location: browse-users.php?msg=rnu');
		exit;
	}
}
?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Project wajib 1</title>
	
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
		<a href="browse-users.php"><h1 style="text-align: center; color:orange;">Aplikasi CRUD & Searching menggunakan PDO</h1></a>
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="name"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="jk"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User jurusan is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="image"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User image is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="prodi"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User prodi is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}
		?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Edit User</strong> <a href="browse-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>
			<div class="card-body">
				
				<div class="col-sm-6">
					<form method="post">
						<div class="form-group">
							<label>User Name <span class="text-danger">*</span></label>
							<input type="text" name="username" id="username" class="form-control" value="<?php echo $row[0]['username']; ?>" placeholder="Enter username" required>
						</div>
						<div class="form-group">
							<label>User jenis kelamin <span class="text-danger">*</span></label>
							<select name="userJk" id="userJk" class="form-control" required>
								<option class="disable selected">pilih jenis kelamin</option>
								<option value="Laki-laki">Laki - laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>User image <span class="text-danger">*</span></label>
							<input type="file" name="userimage" id="userimage" maxlength="12" class="form-control" value="<?php echo $row[0]['userimage']; ?>" placeholder="Enter phone" required>
						</div>
						<div class="form-group">
							<label>User prodi <span class="text-danger">*</span></label>
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
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-warning"><i class="fa fa-fw fa-edit"></i> Update User</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</body>
</html>