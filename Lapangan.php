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
    <title>Tambah Lapangan - Futsal Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px; /* Sesuaikan dengan tinggi navbar */
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
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
                            <a class="nav-link" aria-current="page" href="DashboardAdmin.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tambah Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="Lapangan.php">Tambah Lapangan</a>
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

    <!-- Section -->
    <section id="booking" class="my-5 bg-white">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <a href="tambahkanLapangan.php" class="btn btn-success">Tambahkan Lapangan</a>
                </div>
            </div>

            <div class="row g-4">
                <!-- Lapangan A -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="https://admin.saraga.id/storage/images/whatsapp-image-2021-11-10-at-122412-am1_1636475326.jpeg" class="card-img-top" alt="Lapangan A">
                        <div class="card-body">
                            <h5 class="card-title">Lapangan A</h5>
                            <p class="card-text">Lapangan indoor dengan lantai vinyl dan pencahayaan LED.</p>
                            <a href="detailLapanganAdmin.php" class="btn btn-primary w-100">Detail Lapangan</a>
                        </div>
                    </div>
                </div>

                <!-- Lapangan B -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="https://storage.googleapis.com/data.ayo.co.id/photos/77445/SEO%20HDI%204/80.%20Cara%20Cepat%20dan%20Mudah%20Menyewa%20Lapangan%20Futsal%20untuk%20Tim%20Anda.jpg" class="card-img-top" alt="Lapangan B">
                        <div class="card-body">
                            <h5 class="card-title">Lapangan B</h5>
                            <p class="card-text">Lapangan semi outdoor dengan tribun penonton.</p>
                            <a href="detailLapanganAdmin.php" class="btn btn-primary w-100">Detail Lapangan</a>
                        </div>
                    </div>
                </div>

                <!-- Lapangan C -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="https://www.tangerangkota.go.id/files/gallery/108267-575e13475fe292a0f1aae288d0a3aef2-108267.jpeg" class="card-img-top" alt="Lapangan C">
                        <div class="card-body">
                            <h5 class="card-title">Lapangan C</h5>
                            <p class="card-text">Lapangan ber-AC dengan fasilitas shower dan ruang tunggu nyaman.</p>
                            <a href="detailLapanganAdmin.php" class="btn btn-primary w-100">Detail Lapangan</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
