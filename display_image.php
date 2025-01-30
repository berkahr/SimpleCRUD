<?php
include 'koneksi.php';

// Ambil ID menu dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$query = $conn->prepare("SELECT gambar FROM menu WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$query->bind_result($gambar);
$query->fetch();

// Set header agar browser tahu ini adalah file gambar
header("Content-Type: image/jpeg");
echo $gambar;

$query->close();
?>
