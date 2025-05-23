<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION["login"]) || $_SESSION["role"] !== "Admin") {
    header("Location: login.php");
    exit;
}

$id_tempat = $_POST['id_tempat'];
$nama = $_POST['nama_lapangan'];
$tipe = $_POST['tipe_Lapangan'];
$deskripsi = $_POST['deskripsi'];
$jam = $_POST['jam_aktif'];
$harga = $_POST['harga_per_jam'];

// Validasi jumlah lapangan
$cek_jumlah = mysqli_query($conn, "SELECT COUNT(*) as total FROM Lapangan WHERE id_tempat = $id_tempat");
$data_jumlah = mysqli_fetch_assoc($cek_jumlah);
$jumlah_terisi = $data_jumlah['total'];

$cek_batas = mysqli_query($conn, "SELECT Jumlah_Lapangan FROM TempatFutsal WHERE id_tempat = $id_tempat");
$data_batas = mysqli_fetch_assoc($cek_batas);
$jumlah_boleh = $data_batas['Jumlah_Lapangan'];

if ($jumlah_terisi >= $jumlah_boleh) {
    echo "<script>alert('Lapangan sudah mencapai batas maksimum.');window.location='Lapangan.php';</script>";
    exit;
}

// Upload Gambar
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$folder = "uploads/";
move_uploaded_file($tmp, $folder.$gambar);

// Simpan ke database
mysqli_query($conn, "INSERT INTO Lapangan (id_tempat, nama_lapangan, gambar, tipe_Lapangan, deskripsi, jam_aktif, harga_per_jam, status)
VALUES ('$id_tempat', '$nama', '$gambar', '$tipe', '$deskripsi', '$jam', '$harga', 'Tersedia')");

header("Location: Lapangan.php");
exit;
