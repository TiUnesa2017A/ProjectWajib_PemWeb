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

$idfakultas = '';
$fakultas = '';

function getPost() {
    $post = array();

    $post[0] = $_POST['idfakultas'];
    $post[1] = $_POST['fakultas'];

    return $post;
}

if (isset($_POST['search'])) {
    $data = getPost();

    if (empty($data[0])) {
        echo "Input the ID to search";
    }
    else {
        $searchStmt = $con -> prepare ("select * from fakultas where idfakultas = :idfakultas");
        $searchStmt -> execute (array(
                ':idfakultas' => $data[0]
        ));

        if ($searchStmt) {
            $user = $searchStmt->fetch();

            if (empty($user)) {
                echo 'No entry for this ID';
            }
            else {
                $idfakultas = $user[0];
                $fakultas = $user[1];
            }
        }
    }
}

if (isset($_POST['insert'])) {
    $data = getPost();

    if (empty($data[0]) || empty($data[1])){
        echo "Enter the data";
    }
    else {
        $insertStmt = $con -> prepare ("insert into fakultas (idfakultas, fakultas) VALUES (:idfakultas, :fakultas)");
        $insertStmt -> execute (array(
            ':idfakultas' => $data[0],
            ':fakultas' => $data[1]
        ));

        if ($insertStmt) {
            echo 'Data inserted';
        }
    }
}

if (isset($_POST['update'])) {
    $data = getPost();

    if (empty($data[0]) || empty($data[1])){
        echo "Enter the data";
    }
    else {
        $updateStmt = $con -> prepare ("update fakultas set idfakultas = :idfakultas, fakultas = :fakultas where idfakultas = :idfakultas");
        $updateStmt -> execute (array(
            ':idfakultas' => $data[0],
            ':fakultas' => $data[1]
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
        $deleteStmt = $con -> prepare ("delete from fakultas where idfakultas = :idfakultas");
        $deleteStmt -> execute (array(
            ':idfakultas' => $data[0],
            ':fakultas' => $data[1]
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
    <form action="homeFakultas.php" method="post">
        <table>
            <thead>
            <tr>
                <td>ID Fakultas</td>
                <td>Fakultas</td>
                <td colspan="4">Aksi</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="number" name="idfakultas" value="<?php echo $idfakultas;?>"></td> <br>
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