<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lapangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
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


    <!-- Content -->
    <section class="pt-5 mt-5">
        <div class="container my-5">
            <div class="row align-items-start">
            <!-- Kolom Gambar -->
            <div class="col-md-6">
                <div class="mb-3">
                    <img src="https://admin.saraga.id/storage/images/whatsapp-image-2021-11-10-at-122412-am1_1636475326.jpeg" 
                        alt="Gambar utama" 
                        class="img-fluid rounded" 
                        style="width: 100%; max-width: 519px; height: auto;">
                </div>
                <div class="d-flex gap-2">
                    <img src="https://admin.saraga.id/storage/images/whatsapp-image-2021-11-10-at-122412-am1_1636475326.jpeg" 
                        alt="Thumbnail" 
                        class="img-thumbnail" 
                        style="width: 80px; height: 80px;">
                    <img src="https://admin.saraga.id/storage/images/whatsapp-image-2021-11-10-at-122412-am1_1636475326.jpeg" 
                        alt="Thumbnail" 
                        class="img-thumbnail" 
                        style="width: 80px; height: 80px;">
                    <img src="https://admin.saraga.id/storage/images/whatsapp-image-2021-11-10-at-122412-am1_1636475326.jpeg" 
                        alt="Thumbnail" 
                        class="img-thumbnail" 
                        style="width: 80px; height: 80px;">
                </div>
            </div>

            <!-- Kolom Info -->
            <div class="col-md-6">
                <h3>Lapangan Futsal A</h3>
                <h4>Alamat: <span style="font-weight: 500; font-size: 14px;">Jl. Tulang Bawang Raya</span></h4>
                <h4>Diskripsi</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem placeat enim quas aperiam architecto voluptate, officiis accusamus, amet tempora nemo ipsa odit iure hic iste et harum optio. Aspernatur, nihil!</p>
                <button type="button" class="btn btn-outline-primary " >Booking Sekarang</button>
            </div>
            </div>
        </div>
    </section>


     </section>
</body>
</html>