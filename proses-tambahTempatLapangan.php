<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_tempat = $_POST['tempat_lapangan'];
    $alamat = $_POST['alamat'];
    $jumlah_lapangan = $_POST['jumlah_lapangan'];
    $status = "Tersedia";

    // Proses gambar
    $gambar_nama = $_FILES['lapangan_images']['name'][0];
    $gambar_tmp = $_FILES['lapangan_images']['tmp_name'][0];
    $upload_dir = "uploads/";

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir);
    }

    $target_path = $upload_dir . basename($gambar_nama);
    move_uploaded_file($gambar_tmp, $target_path);

    // Simpan ke database
    $query = "INSERT INTO TempatFutsal (gambar, nama_tempat, alamat, Jumlah_Lapangan, statusTempatLapangan)
              VALUES ('$target_path', '$nama_tempat', '$alamat', '$jumlah_lapangan', '$status')";

    if (mysqli_query($db_conn, $query)) {
        header("Location: DashboardAdmin.php?success=1");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($db_conn);
    }
}
?>
