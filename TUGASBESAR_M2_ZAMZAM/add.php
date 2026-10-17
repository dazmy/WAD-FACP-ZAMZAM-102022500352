<?php
require_once "connection.php";
// require_once "data.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_bengkel = trim($_POST["nama_bengkel"]);
    $lokasi = trim($_POST["lokasi"]);
    $kontak = trim($_POST["kontak"]);
    $jenis_layanan = trim($_POST["jenis_layanan"]);

    $query = "INSERT INTO bengkel (nama_bengkel, lokasi, kontak, jenis_layanan) VALUES ('$nama_bengkel', '$lokasi', '$kontak', '$jenis_layanan')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

// {
//         if (empty($nama_bengkel)) {
//         $nama_bengkel_err = "Nama bengkel harus diisi.";
//     }

//     if (empty($lokasi)) {
//         $lokasi_err = "Lokasi harus diisi.";
//     }

//     if (empty($kontak)) {
//         $kontak_err = "Kontak harus diisi.";
//     } else if (!ctype_digit($kontak)) {
//         $kontak_err = "Kontak harus berupa angka.";
//     }

//     if (empty($jenis_layanan)) {
//         $jenis_layanan_err = "Jenis layanan harus diisi.";
//     }

//     if (!(empty($nama_bengkel_err) && empty($lokasi_err) && empty($kontak_err) && empty($jenis_layanan_err))) {
//         return;
//     }
// }