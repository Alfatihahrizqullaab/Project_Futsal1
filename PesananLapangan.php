<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Detail Turnamen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .header-image {
      max-height: 400px;
      object-fit: cover;
    }
    html, body {
        height: 100%;
        margin: 0;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    main {
        flex: 1;
    }

  </style>
</head>
<body>

 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center fw-bold" href="#">
        <img src="https://www.shutterstock.com/image-vector/football-futsal-shield-logo-vector-600w-1607225962.jpg" alt="Logo" width="30" height="30" />
        <span class="ms-2">Futsal</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-white" id="offcanvasNavbar">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title fw-bold">Futsal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body justify-content-between">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Event Turnamen</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
          </ul>
          <div class="mt-3 mt-lg-0 ms-lg-3">
            <a href="{{ route('login') }}" class="btn btn-primary fw-bold">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary fw-bold ms-2">Daftar</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

<!-- Konten Form -->
<main class="container my-5 pt-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Booking Lapangan</h4>
          </div>
          <div class="card-body">
            <form>
              <div class="mb-3">
                <label for="namaTim" class="form-label">Nama</label>
                <input type="text" class="form-control" id="namaTim" placeholder="Contoh: Galaxy FC" required>
              </div>

              <div class="mb-3">
                <label for="noHp" class="form-label">No. WhatsApp Aktif</label>
                <input type="tel" class="form-control" id="noHp" placeholder="Contoh: 081234567890" required>
              </div>
  
              <div class="mb-3">
                <label for="email" class="form-label">Email Aktif</label>
                <input type="email" class="form-control" id="email" placeholder="Contoh: timfutsal@email.com" required>
              </div>

              <div class="mb-2">
                <label for="tanggal" class="form-label">Pilih Tanggal Booking:</label>
                <input type="date" id="tanggal" name="tanggal_booking" class="form-control">
              </div>

              <div class="mb-2">
                <label for="jam" class="form-label">Pilih Waktu Booking:</label>
                <input type="time" id="jam" name="jam_booking" class="form-control">
              </div>
  
              <div class="mb-3">
                <label for="buktiPembayaran" class="form-label">Upload Bukti Pembayaran</label>
                <input class="form-control" type="file" id="buktiPembayaran" required>
                <div class="form-text">Format JPG/PNG/PDF, max 2MB.</div>
              </div>
  
              <button type="submit" class="btn btn-primary w-100">Kirim Pendaftaran</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-4 mt-5">
    <div class="container">
      <p class="mb-0">&copy; 2025 Futsal Booking. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
