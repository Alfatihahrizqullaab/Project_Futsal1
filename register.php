<?php
require_once 'koneksi.php'; // ini membuat $db_conn tersedia di global scope
require_once 'proses-register.php'; // file yang memuat fungsi register()

if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "<script>alert('User baru berhasil ditambahkan!')</script>";
    } else {
        echo mysqli_error($db_conn);
    }
}


?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Futsal Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
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
            <!-- <img src="images/logo.png" alt="Logo" width="30" height="30"> -->
            <h5 class="ms-2 mb-0 fw-bold">Futsal</h5>
          </a>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body justify-content-between">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Event Turnament</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Daftar Akun Baru</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Gmail</label>
                        <input type="email" class="form-control" id="email" name="gmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="phone" name="no_hp" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Daftar Sebagai</label>
                        <select name="role" class="form-select" required>
                        <option value="" selected disabled>Pilih Peran</option>
                        <option value="Pelanggan">Pelanggan</option>
                        <option value="Admin">Admin Penyedia Lapangan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="register">Daftar</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    Sudah punya akun? <a href="">Login di sini</a>
                </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
