<?php
$user = "root";
$pass = "123456789";
$dbnm = "loginn";
$host = "localhost";

try {
    $dbh = new PDO('mysql:host='.$host.';dbname='.$dbnm, $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>