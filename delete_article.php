<?php
$host = 'localhost';
$db = 'artikeldb';
$user = 'root'; // ganti dengan user database Anda
$pass = ''; // ganti dengan password database Anda

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$id = $_POST['id'];

$sql = "DELETE FROM articles WHERE id=$id";

if ($mysqli->query($sql) === TRUE) {
    echo "Artikel berhasil dihapus!";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

header("Location: index.php");
exit();
?>
