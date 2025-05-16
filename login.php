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

  <div class="container mt-5 pt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header d-flex justify-content-between align-items-center">
            <a href="index.html" class="btn btn-sm btn-outline-secondary">
              <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <h4 class="mb-0 mx-auto">Login Akun</h4>
            <span style="width: 60px;"></span>
          </div>
          <div class="card-body">
            <!-- Alert contoh, bisa dihapus -->
            <form action="#" method="POST">
              <div class="mb-3">
                <label for="login" class="form-label">Username / Gmail</label>
                <input type="text" class="form-control" id="login" name="login" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Login Sebagai</label>
                <select name="role" class="form-select" required>
                  <option value="" selected disabled>Pilih Peran</option>
                  <option value="pelanggan">Pelanggan</option>
                  <option value="penyedia">Admin Penyedia Lapangan</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
          </div>
          <div class="card-footer text-center">
            Belum punya akun? <a href="register.html">Daftar di sini</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
