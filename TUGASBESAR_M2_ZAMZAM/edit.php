<?php
require_once "connection.php";

$id = $_GET['id'] ?? null;

if ($id) {
    $query = "SELECT * FROM bengkel WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $bengkel = mysqli_fetch_assoc($result);

    if (!$bengkel) {
        echo "Data bengkel tidak ditemukan.";
        header("Location: index.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bengkel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Bengkel - <?= $bengkel['nama_bengkel'] ?></h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $bengkel['id'] ?>">
        <input type="text" name="nama_bengkel" value="<?= $bengkel['nama_bengkel'] ?>" placeholder="Nama Bengkel" required />
        <input type="text" name="lokasi" value="<?= $bengkel['lokasi'] ?>" placeholder="Lokasi" required />
        <input type="text" name="kontak" value="<?= $bengkel['kontak'] ?>" placeholder="Kontak" required />
        <select name="jenis_layanan" required>
            <option value="">Pilih Jenis Layanan</option>
            <option value="Servis Mesin" <?= $bengkel['jenis_layanan'] == 'Servis Mesin' ? 'selected' : '' ?>>Servis Mesin</option>
            <option value="Ganti Oli" <?= $bengkel['jenis_layanan'] == 'Ganti Oli' ? 'selected' : '' ?>>Ganti Oli</option>
            <option value="Cuci" <?= $bengkel['jenis_layanan'] == 'Cuci' ? 'selected' : '' ?>>Cuci</option>
        </select>
        <button type="submit">Update</button>
    </form>
</body>
</html>