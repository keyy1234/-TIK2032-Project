<?php
$host = 'localhost';
$db = 'artikeldb';
$user = 'root'; // ganti dengan user database Anda
$pass = ''; // ganti dengan password database Anda

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$icon = $_POST['icon'];
$category = $_POST['category'];
$title = $_POST['title'];
$link = $_POST['link'];

$sql = "INSERT INTO articles (icon, category, title, link) VALUES ('$icon', '$category', '$title', '$link')";

if ($mysqli->query($sql) === TRUE) {
    echo "Artikel berhasil ditambahkan!";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

header("Location: index.php");
exit();
?>
