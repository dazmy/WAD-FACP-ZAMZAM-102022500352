<?php
require_once "connection.php";

$id = $_GET['id'] ?? null;

if ($id) {
    $query = "DELETE FROM bengkel WHERE id = '$id'";

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