<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["role"] !== "Admin") {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Lapangan - Futsal Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
                            <a class="nav-link" aria-current="page" href="#">Dashboard</a>
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

    <!-- Form Input Lapangan dengan Card -->
    <div class="container mt-5 pt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center">Tambah Lapangan</h2>
            <form method="POST" action="#" enctype="multipart/form-data">
                <!-- Gambar Lapangan -->
                <div class="mb-3">
                    <label for="lapangan_images" class="form-label">Upload Gambar Lapangan (minimal 3)</label>
                    <input 
                      type="file" 
                      class="form-control" 
                      id="lapangan_images" 
                      name="lapangan_images[]" 
                      multiple 
                      required 
                    />
                </div>

                <!-- Nama Lapangan -->
                <div class="mb-3">
                    <label for="lapangan_name" class="form-label">Nama Lapangan</label>
                    <input 
                      type="text" 
                      class="form-control" 
                      id="lapangan_name" 
                      name="lapangan_name" 
                      placeholder="Contoh: Lapangan Futsal MDP" 
                      required 
                    />
                </div>

                <!-- Jumlah Lapangan -->
                <div class="mb-3">
                    <label for="jumlah_lapangan" class="form-label">Tipe Lapangan (Contoh: A/B/C)</label>
                    <input 
                      type="text" 
                      class="form-control" 
                      id="jumlah_lapangan" 
                      name="jumlah_lapangan" 
                      placeholder="Contoh: A,B,C" 
                      required 
                    />
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi & Fasilitas Lapangan</label>
                    <textarea 
                      class="form-control" 
                      id="deskripsi" 
                      name="deskripsi" 
                      rows="4" 
                      placeholder="Contoh: Rumput sintetis, ruang tunggu, toilet, parkir luas" 
                      required
                    ></textarea>
                </div>

                <!-- Jam Aktif -->
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="jam_buka" class="form-label">Jam Buka</label>
                            <input 
                              type="time" 
                              class="form-control" 
                              id="jam_buka" 
                              name="jam_buka" 
                              required 
                              onchange="checkAvailability()"
                            />
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="jam_tutup" class="form-label">Jam Tutup</label>
                            <input 
                              type="time" 
                              class="form-control" 
                              id="jam_tutup" 
                              name="jam_tutup" 
                              required 
                              onchange="checkAvailability()"
                            />
                        </div>
                    </div>
                    <small class="text-muted">
                      Pelanggan hanya bisa memilih jam yang kosong nanti
                    </small>
                    <div 
                      id="warningMessage" 
                      class="mt-2 text-danger" 
                      style="display:none;"
                    >
                        Jam yang Anda pilih sudah dipesan oleh pelanggan lain.
                    </div>
                </div>

                <!-- Harga -->
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga per Jam (Rp)</label>
                    <input 
                      type="number" 
                      class="form-control"
                      min="1" 
                      id="harga" 
                      name="harga" 
                      placeholder="Contoh: 150000" 
                      required 
                    />
                </div>

                <!-- Tombol -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>