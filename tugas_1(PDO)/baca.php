<?php include_once('koneksi.php');
    if(isset($_REQUEST['readId']) and $_REQUEST['readId']!=""){
        $row    =   $db->getAllRecords('user','*',' AND id="'.$_REQUEST['readId'].'"');
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
        <a href="browse-users.php"><h1 style="text-align: center;">PHP CRUD Based PDO Steatment</h1></a>
        <div class="card">
            <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Profil</strong> <a href="user.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Lihat User</a></div>
            <div class="card-body">
                <div class="form-group" style="text-align: center;">
                            <img src="img/<?php echo $row[0]['foto']; ?>" width="320" height="240">
                        </div><br>
                <div class="col-sm-6">
                    <form method="post">
                        <div class="form-group">
                            <label>Username : <span class="text-danger"><?php echo $row[0]['username']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>Nim : <span class="text-danger"><?php echo $row[0]['nim']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>Email : <span class="text-danger"><?php echo $row[0]['email']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>Prodi : <span class="text-danger"><?php echo $row[0]['prodi']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>Fakultas : <span class="text-danger"><?php echo $row[0]['fakultas']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin : <span class="text-danger"><?php echo $row[0]['jenis_kelamin']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir : <span class="text-danger"><?php echo $row[0]['tgl_lahir']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>Alamat : <span class="text-danger"><?php echo $row[0]['alamat']; ?></span></label>
                        </div>
                        <div class="form-group">
                            <label>Kota Asal : <span class="text-danger"><?php echo $row[0]['kota']; ?></span></label>
                        </div>
                    </form>
                </div><br>
                <a href="user.php"><button type="button" class="btn btn-block btn-primary">Kembali</button></a>
            </div>
        </div>
    </div>
</body>