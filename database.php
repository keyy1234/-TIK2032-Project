<?php
$host = 'localhost';
$db = 'website';
$user = 'root'; // ganti dengan user database Anda
$pass = ''; // ganti dengan password database Anda

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>