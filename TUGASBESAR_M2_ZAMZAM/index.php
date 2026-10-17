<?php
require_once "connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Bengkel Maintenance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Modul Bengkel Maintenance</h1>
    <form action="add.php" method="post">
        <input type="text" name="nama_bengkel" placeholder="Nama Bengkel" required />
        <input type="text" name="lokasi" placeholder="Lokasi" required />
        <input type="text" name="kontak" placeholder="Kontak" required />
        <select name="jenis_layanan" required>
            <option value="">Pilih Jenis Layanan</option>
            <option value="Servis Mesin">Servis Mesin</option>
            <option value="Ganti Oli">Ganti Oli</option>
            <option value="Cuci">Cuci</option>
        </select>
        <button type="submit">Simpan</button>
    </form>

    <h1>Data Bengkel</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Bengkel</th>
            <th>Lokasi</th>
            <th>Kontak</th>
            <th>Jenis Layanan</th>
            <th>Aksi</th>
        </tr>
        <?php

        $query = "SELECT * FROM bengkel";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama_bengkel'] . "</td>";
            echo "<td>" . $row['lokasi'] . "</td>";
            echo "<td>" . $row['kontak'] . "</td>";
            echo "<td>" . $row['jenis_layanan'] . "</td>";
            echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a><a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?')\">Hapus</a></td>";
            echo "</tr>";
        }

        mysqli_close($conn);
        ?>
</body>
</html>