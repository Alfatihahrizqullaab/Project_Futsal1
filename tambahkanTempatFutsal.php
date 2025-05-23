<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["role"] !== "Admin") {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Tempat Lapangan - Futsal Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<style>
    body {
      padding-top: 30px; /* Sesuaikan dengan tinggi navbar */
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



        <!-- Form Input Lapangan dengan Card -->
        <div class="container mt-3 pt-5">
            <div class="my-2">
                <a href="DashboardAdmin.php" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left">  Kembali</i>
                </a>
            </div>
            <div class="card shadow-sm p-4">
                <h2 class="mb-4 text-center">Tambah Tempat Lapangan</h2>
                 <form method="POST" action="proses-tambahTempatLapangan.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tempat_lapangan" class="form-label">Nama Tempat</label>
                        <input type="text" class="form-control" id="tempat_lapangan" name="tempat_lapangan" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_lapangan" class="form-label">Jumlah Lapangan</label>
                        <input type="number" class="form-control" id="jumlah_lapangan" name="jumlah_lapangan" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="lapangan_images" class="form-label">Gambar Tempat</label>
                        <input type="file" class="form-control" id="lapangan_images" name="lapangan_images[]" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
