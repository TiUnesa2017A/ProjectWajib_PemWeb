<?php
$user = "root";
$pass = "";
$dbnm = "anyar";
$host = "localhost";

try {
    $dbh = new PDO('mysql:host='.$host.';dbname='.$dbnm, $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>