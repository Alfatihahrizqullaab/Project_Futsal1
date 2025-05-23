<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] !== "Admin") {
    header("Location: login.php");
    exit;
}

$nama = $_SESSION['nama'];
$id_pengelola = $_SESSION['id_pengelola'];

// Cek apakah sudah punya tempat futsal
$cek_tempat = mysqli_query($db_conn, "SELECT * FROM TempatFutsal WHERE id_pengelola = $id_pengelola");
$punya_tempat = mysqli_num_rows($cek_tempat) > 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin - Futsal Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<style>
    body {
      padding-top: 70px; /* Sesuaikan dengan tinggi navbar */
    }
    .card-img-top {
      height: 200px;
      object-fit: cover;
    }
</style>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow-sm mb-4">
    <div class="container">
        <!-- Logo & Brand -->
        <a class="navbar-brand d-flex align-items-center fw-bold" href="#">
            <img src="https://www.shutterstock.com/image-vector/football-futsal-shield-logo-vector-600w-1607225962.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            <span class="ms-2">Futsal</span>
        </a>

        <!-- Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Offcanvas Menu -->
        <div class="offcanvas offcanvas-end text-bg-white" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="d-flex align-items-center text-decoration-none text-dark" href="#">
                    <img src="https://www.shutterstock.com/image-vector/football-futsal-shield-logo-vector-600w-1607225962.jpg" alt="Logo" width="30" height="30">
                    <h5 class="ms-2 mb-0 fw-bold">Futsal</h5>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body justify-content-between">
                <!-- Navbar Links -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tambah Event</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="Lapangan.php">Tambah Lapangan</a>
                    </li>
                  <div class="mt-3 mt-lg-0 ms-lg-3">
                    <?php if (isset($_SESSION['login']) && $_SESSION['role'] === 'Admin'): ?>
                      <a href="logout.php" class="btn btn-danger fw-bold">Logout</a>
                    <?php else: ?>
                      <a href="login.php" class="btn btn-primary fw-bold">Login</a>
                      <a href="register.php" class="btn btn-primary fw-bold">Daftar</a>
                    <?php endif; ?>
                  </div>
                </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <?php if (!$punya_tempat): ?>
        <a href="tambahkanTempatFutsal.php" class="btn btn-success mb-4">+ Tambah Tempat</a>
    <?php else: ?>
        <div class="alert alert-info">Anda sudah menambahkan 1 tempat futsal. Tidak bisa menambahkan lagi.</div>
    <?php endif; ?>
    <div class="row g-4">
        <?php
        $result = mysqli_query($db_conn, "SELECT * FROM TempatFutsal");
        while ($row = mysqli_fetch_assoc($result)) {
            $isChecked = $row['statusTempatLapangan'] == 'Tersedia' ? 'checked' : '';
            $labelId = "statusLabel" . $row['id_tempat'];
            $switchId = "switch" . $row['id_tempat'];
        ?>
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <img src="<?= $row['gambar'] ?>" class="card-img-top" alt="<?= $row['nama_tempat'] ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= $row['nama_tempat'] ?></h5>
                    <p class="card-text"><?= $row['alamat'] ?></p>
                    <p class="card-text">Jumlah Lapangan: <?= $row['Jumlah_Lapangan'] ?></p>
                    <div class="form-check form-switch mt-auto">
                        <input class="form-check-input" type="checkbox" id="<?= $switchId ?>" <?= $isChecked ?> 
                            onchange="toggleStatus(this, <?= $row['id_tempat'] ?>)">
                        <label class="form-check-label" for="<?= $switchId ?>" id="<?= $labelId ?>">
                            <?= $row['statusTempatLapangan'] ?>
                        </label>
                    </div>
                    <a href="proses-hapusTempat.php?id=<?= $row['id_tempat'] ?>" class="btn btn-sm btn-danger mt-3" onclick="return confirm('Yakin ingin menghapus tempat ini?')">Hapus</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<script>
function toggleStatus(checkbox, id) {
    const newStatus = checkbox.checked ? "Tersedia" : "Tidak Tersedia";
    const label = document.getElementById("statusLabel" + id);
    label.textContent = newStatus;

    // Redirect ke PHP handler
    window.location.href = `proses-updateStatus.php?id=${id}&status=${newStatus}`;
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
