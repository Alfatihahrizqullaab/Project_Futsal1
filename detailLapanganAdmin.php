<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["role"] !== "Admin") {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM Lapangan WHERE id_lapangan = $id");
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Lapangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 pt-5">
    <div class="card shadow-sm p-4">
        <h2><?= $data['nama_lapangan'] ?></h2>
        <img src="uploads/<?= $data['gambar'] ?>" class="img-fluid mb-3" style="max-height: 300px;">
        <p><strong>Tipe:</strong> <?= $data['tipe_Lapangan'] ?></p>
        <p><strong>Deskripsi:</strong> <?= $data['deskripsi'] ?></p>
        <p><strong>Jam Aktif:</strong> <?= $data['jam_aktif'] ?></p>
        <p><strong>Harga per Jam:</strong> Rp <?= number_format($data['harga_per_jam'], 0, ',', '.') ?></p>
        <p><strong>Status:</strong> <?= $data['status'] ?></p>
        <a href="Lapangan.php" class="btn btn-secondary">Kembali</a>
    </div>
</div>
</body>
</html>
