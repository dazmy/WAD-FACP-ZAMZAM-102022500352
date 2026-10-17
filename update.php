<?php
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? null;
    $query = "SELECT * FROM bengkel WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $bengkel = mysqli_fetch_assoc($result);

    if (!$bengkel) {
        echo "Data bengkel tidak ditemukan.";
        header("Location: index.php");
        exit();
    }

    $nama_bengkel = trim($_POST["nama_bengkel"]);
    $lokasi = trim($_POST["lokasi"]);
    $kontak = trim($_POST["kontak"]);
    $jenis_layanan = trim($_POST["jenis_layanan"]);

    $query = "UPDATE bengkel SET nama_bengkel = '$nama_bengkel', lokasi = '$lokasi', kontak = '$kontak', jenis_layanan = '$jenis_layanan' WHERE id = '$id'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }  
} else {
    header("Location: index.php");
    exit();
}