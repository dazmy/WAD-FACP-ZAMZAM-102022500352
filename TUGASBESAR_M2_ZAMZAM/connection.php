<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "modul_bengkel_maintenance";
$port = 3306;

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}