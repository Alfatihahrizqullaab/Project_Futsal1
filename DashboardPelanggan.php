<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["role"] !== "Pelanggan") {
    header("Location: login.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Beranda - Futsal Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .animate-fade {
      opacity: 0;
      transform: translateY(-20px);
      animation: fadeInUp 1.2s ease-out forwards;
    }
    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .card-img-top {
      height: 250px;
      object-fit: cover;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center fw-bold" href="#">
        <!-- <img src="images/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top"> -->
        <span class="ms-2">Kick Zone</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-white" tabindex="-1" id="offcanvasNavbar">
        <div class="offcanvas-header">
          <a class="d-flex align-items-center text-decoration-none text-dark" href="#">
            <img src="images/logo.png" alt="Logo" width="30" height="30">
            <h5 class="ms-2 mb-0 fw-bold">Futsal</h5>
          </a>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body justify-content-between">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="#">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Event Turnament</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Kontak</a>
            </li>
          </ul>
          <div class="mt-3 mt-lg-0 ms-lg-3">
            <a href="login.html" class="btn btn-primary fw-bold">Login</a>
          </div>
          <div class="mt-3 mt-lg-0 ms-lg-3">
            <a href="register.html" class="btn btn-primary fw-bold">Daftar</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Jumbotron -->
  <section class="py-5 bg-light text-center mt-5">
    <div class="container">
      <!-- <img src="images/logo.png" alt="Logo Futsal" class="img-fluid mx-auto d-block mb-4 animate-fade shadow-lg rounded-circle" width="150"> -->
      <h1 class="display-4 fw-bold">Selamat Datang di Kick Zone Booking</h1>
      <p class="lead">Pesan lapangan dengan cepat dan mudah hanya dalam beberapa klik.</p>
      <a href="#booking" class="btn btn-primary btn-lg mt-3">Booking Sekarang</a>
    </div>
  </section>

  <!-- Booking Section -->
  <section id="booking" class="py-5 bg-white">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-6">
          <h2 class="fw-bold">Pilih Lapangan</h2>
        </div>
        <div class="col-md-6">
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Cari lapangan..." aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Cari</button>
          </form>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="https://admin.saraga.id/storage/images/whatsapp-image-2021-11-10-at-122412-am1_1636475326.jpeg" class="card-img-top" alt="Lapangan A">
            <div class="card-body">
              <h5 class="card-title">Lapangan A</h5>
              <p class="card-text">Lapangan indoor dengan lantai vinyl dan pencahayaan LED.</p>
              <a href="#" class="btn btn-primary w-100">Booking</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="https://storage.googleapis.com/data.ayo.co.id/photos/77445/SEO%20HDI%204/80.%20Cara%20Cepat%20dan%20Mudah%20Menyewa%20Lapangan%20Futsal%20untuk%20Tim%20Anda.jpg" class="card-img-top" alt="Lapangan B">
            <div class="card-body">
              <h5 class="card-title">Lapangan B</h5>
              <p class="card-text">Lapangan semi outdoor dengan tribun penonton.</p>
              <a href="#" class="btn btn-primary w-100">Booking</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="https://www.tangerangkota.go.id/files/gallery/108267-575e13475fe292a0f1aae288d0a3aef2-108267.jpeg" class="card-img-top" alt="Lapangan C">
            <div class="card-body">
              <h5 class="card-title">Lapangan C</h5>
              <p class="card-text">Lapangan ber-AC dengan fasilitas shower dan ruang tunggu nyaman.</p>
              <a href="#" class="btn btn-primary w-100">Booking</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-4 mt-5">
    <div class="container">
      <p class="mb-1">&copy; 2025 Futsal Booking. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
