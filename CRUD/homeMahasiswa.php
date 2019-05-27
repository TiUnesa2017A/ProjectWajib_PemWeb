<?php

$db = 'mysql:host=localhost; dbname=crud_php';
$username = 'root';
$password = '';

try {
    $con = new PDO ($db, $username, $password);
    $con-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $ex) {
    echo 'Not connected'.$ex->getMessage();
}

$nim = '';
$foto = '';
$namaMhs = '';
$jk = '';
$prodi = '';
$fakultas = '';

function getPost() {
    $post = array();

    $post[0] = $_POST['nim'];
    $post[1] = $_POST['foto'];
    $post[2] = $_POST['namaMhs'];
    $post[3] = $_POST['jk'];
    $post[4] = $_POST['prodi'];
    $post[5] = $_POST['fakultas'];

    return $post;
}

if (isset($_POST['search'])) {
    $data = getPost();

    if (empty($data[0])) {
        echo "Input the ID to search";
    }
    else {
        $searchStmt = $con -> prepare ("select * from data where nim = :nim");
        $searchStmt -> execute (array(
            ':nim' => $data[0]
        ));

        if ($searchStmt) {
            $user = $searchStmt->fetch();

            if (empty($user)) {
                echo 'No entry for this ID';
            }
            else {
                $nim = $user[0];
                $foto = $user[1];
                $namaMhs = $user[2];
                $jk = $user[3];
                $prodi = $user[4];
                $fakultas = $user[5];
            }
        }
    }
}

if (isset($_POST['insert'])) {
    $data = getPost();

    if (empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[3]) || empty($data[4]) || empty($data[5])){
        echo "Enter the data";
    }
    else {
        $insertStmt = $con -> prepare ("insert into data (nim, foto, namaMhs, jk, prodi, fakultas) VALUES (:nim, :foto, :namaMhs, :jk, :prodi, :fakultas)");
        $insertStmt -> execute (array(
            ':nim' => $data[0],
            ':foto' => $data[1],
            ':namaMhs' => $data[2],
            ':jk' => $data[3],
            ':prodi' => $data[4],
            ':fakultas' => $data[5]
        ));

        if ($insertStmt) {
            echo 'Data inserted';
        }
    }
}

if (isset($_POST['update'])) {
    $data = getPost();

    if (empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[3]) || empty($data[4]) || empty($data[5])){
        echo "Enter the data";
    }
    else {
        $updateStmt = $con -> prepare ("update data set nim = :nim, foto = :foto, namaMhs = :namaMhs, jk = :jk, prodi = :prodi, fakultas = :fakultas where nim = :nim");
        $updateStmt -> execute (array(
            ':nim' => $data[0],
            ':foto' => $data[1],
            ':namaMhs' => $data[2],
            ':jk' => $data[3],
            ':prodi' => $data[4],
            ':fakultas' => $data[5]
        ));

        if ($updateStmt) {
            echo 'Data updated';
        }
    }
}

if (isset($_POST['delete'])) {
    $data = getPost();

    if (empty($data[0])){
        echo "Enter the id to delete";
    }
    else {
        $deleteStmt = $con -> prepare ("delete from data where nim = :nim");
        $deleteStmt -> execute (array(
            ':nim' => $data[0],
            ':foto' => $data[1],
            ':namaMhs' => $data[2],
            ':jk' => $data[3],
            ':prodi' => $data[4],
            ':fakultas' => $data[5]
        ));

        if ($deleteStmt) {
            echo 'Data deleted';
        }
    }
}

?>


<html>
<head>
    <title>CRUD SEARCHING</title>
</head>
<body>
<form action="homeMahasiswa.php" method="post">
    <table>
        <thead>
        <tr>
            <td>NIM</td>
            <td>Foto</td>
            <td>Nama Mahasiswa</td>
            <td>Jenis Kelamin</td>
            <td>Prodi</td>
            <td>Fakultas</td>
            <td colspan="4">Aksi</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="number" name="nim" value="<?php echo $nim;?>"></td> <br>
            <td><input type="text" name="foto" value="<?php echo $foto;?>"></td> <br>
            <td><input type="text" name="namaMhs" value="<?php echo $namaMhs;?>"></td> <br>
            <td><input type="text" name="jk" value="<?php echo $jk;?>"></td> <br>
            <td><input type="text" name="prodi" value="<?php echo $prodi;?>"></td> <br>
            <td><input type="text" name="fakultas" value="<?php echo $fakultas;?>"></td> <br>
            <td><input type="submit" name="insert" value="Insert"></td>
            <td><input type="submit" name="update" value="Update"></td>
            <td><input type="submit" name="delete" value="Delete"></td>
            <td><input type="submit" name="search" value="Search"></td>
        </tr>
        </tbody>
    </table>
</form>
</body>
</html>