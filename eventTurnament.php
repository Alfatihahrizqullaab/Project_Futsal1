<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Beranda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

  <!-- Komentar Navigasi -->
  <!-- Beranda | Event | Login | Logout | Kontak | Profil -->

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

  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow-sm">
        <div class="container">
            <!-- Logo & Brand -->
            <a class="navbar-brand d-flex align-items-center fw-bold" href="#">
                <!-- <img src="{{asset('images/logo.png')}}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top"> -->
                <span class="ms-2">Kick Zone</span>
            </a>
    
            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <!-- Offcanvas Menu -->
            <div class="offcanvas offcanvas-end text-bg-white" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <a class="d-flex align-items-center text-decoration-none text-dark" href="#">
                        <!-- <img src="{{asset('images/logo.png')}}" alt="Logo" width="30" height="30"> -->
                        <h5 class="ms-2 mb-0 fw-bold">Futsal</h5>
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body justify-content-between">
                    <!-- Navbar Links -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{route("welcome")}}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('eventTurnament.view')}}">Event Turnament</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kontak</a>
                        </li>
                    </ul>
                    <!-- Login Button -->
                    <div class="mt-3 mt-lg-0 ms-lg-3">
                        <a href="{{ route('login') }}" class="btn btn-primary fw-bold">Login</a>
                    </div>
                    <div class="mt-3 mt-lg-0 ms-lg-3">
                      <a href="{{ route('register') }}" class="btn btn-primary fw-bold">Daftar</a>
                  </div>
                </div>
            </div>
        </div>
    </nav>

  <!-- Section Event Turnamen -->
  <section class="py-5 my-5 bg-light" id="event-turnamen">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-6">
          <h2 class="fw-bold">Event Turnamen Futsal</h2>
          <p>Cari dan ikuti turnamen futsal seru di kotamu!</p>
        </div>
        <div class="col-md-6">
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Cari nama turnamen..." aria-label="Search" />
            <button class="btn btn-outline-primary" type="submit">Cari</button>
          </form>
        </div>
      </div>

      <div class="row g-4">
        <!-- Card Turnamen 1 -->
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="https://vendors.id/wp-content/uploads/2024/03/ezgif-3-639eb0bef5.webp" class="card-img-top" alt="Turnamen 1" />
            <div class="card-body">
              <h5 class="card-title">Futsal Championship 2025</h5>
              <p class="card-text"><strong>Tanggal:</strong> 15 Juni 2025<br><strong>Lokasi:</strong> GOR Dempo Palembang</p>
              <a href="#" class="btn btn-primary w-100">Lihat Detail</a>
            </div>
          </div>
        </div>

        <!-- Card Turnamen 2 -->
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="https://vendors.id/wp-content/uploads/2024/03/ezgif-3-639eb0bef5.webp" class="card-img-top" alt="Turnamen 2" />
            <div class="card-body">
              <h5 class="card-title">Turnamen Pelajar Se-Kota</h5>
              <p class="card-text"><strong>Tanggal:</strong> 1 Juli 2025<br><strong>Lokasi:</strong> Lapangan Victory Futsal</p>
              <a href="#" class="btn btn-primary w-100">Lihat Detail</a>
            </div>
          </div>
        </div>

        <!-- Card Turnamen 3 -->
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="https://vendors.id/wp-content/uploads/2024/03/ezgif-3-639eb0bef5.webp" class="card-img-top" alt="Turnamen 3" />
            <div class="card-body">
              <h5 class="card-title">Kompetisi Antar Komunitas</h5>
              <p class="card-text"><strong>Tanggal:</strong> 20 Juli 2025<br><strong>Lokasi:</strong> Lapangan Galaxy Arena</p>
              <a href="#" class="btn btn-primary w-100">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-4 mt-5 mb-0">
    <div class="container">
      <p class="mb-1">&copy; 2025 Futsal Booking. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
