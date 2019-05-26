<?php include_once('config.php');
if(isset($_REQUEST['readId']) and $_REQUEST['readId']!=""){
    $row    =   $db->getAllRecords('users','*',' AND id="'.$_REQUEST['readId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){

    $namaFile = $_FILES['userimage']['name'];
    $namaSementara = $_FILES['userimage']['tmp_name'];
    $dirUpload = "img/";
    $userimage = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

    extract($_REQUEST);
    if($username==""){
        header('location:'.$_SERVER['PHP_SELF'].'?msg=un&readId='.$_REQUEST['readId']);
        exit;
    }elseif($userimage==""){
        header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&readId='.$_REQUEST['readId']);
        exit;
    }elseif($userJk==""){
        header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&readId='.$_REQUEST['readId']);
        exit;
    }
    elseif($userprodi==""){
        header('location:'.$_SERVER['PHP_SELF'].'?msg=up&readId='.$_REQUEST['readId']);
        exit;
    }
    $data   =   array(
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    
    <br>
    <div class="container">
        <a href="browse-users.php"><h1 style="text-align: center;">PHP CRUD Based PDO Steatment</h1></a>
        <?php
        if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
            echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> </div>';
        }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
            echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> </div>';
        }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
            echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> </div>';
        }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
            echo    '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
        }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
            echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
        }
        ?>
        <div class="card">
            <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Show User</strong> <a href="browse-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>
            <div class="card-body">
                <div class="form-group" style="text-align: center;">
                            <img src="img/<?php echo $row[0]['userimage']; ?>" width="320" height="240">
                        </div><br>
                <div class="col-sm-6">
                    <form method="post">
                        <div class="form-group">
                            <label>User Name: <span class="text-danger"><?php echo $row[0]['username']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>User Nim: <span class="text-danger"><?php echo $row[0]['nim']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>User Email: <span class="text-danger"><?php echo $row[0]['email']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>User Jurusan: <span class="text-danger"><?php echo $row[0]['userJk']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>User Prodi: <span class="text-danger"><?php echo $row[0]['userprodi']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>User Fakultas: <span class="text-danger"><?php echo $row[0]['fakultas']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>User Tanggal Lahir: <span class="text-danger"><?php echo $row[0]['tgl_lahir']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>User Alamat: <span class="text-danger"><?php echo $row[0]['alamat']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>User Kota Asal: <span class="text-danger"><?php echo $row[0]['kota']; ?></span></label>
                        </div>
                    </form>
                </div><br>
                <a href="browse-users.php"><button type="button" class="btn btn-block btn-primary">Back</button></a>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <br><br>
</body>
</html>