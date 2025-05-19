<?php

session_start();
if (isset($_SESSION["login"])) {
    // Logout dulu jika masih login
    session_unset();
    session_destroy();
    // Redirect kembali ke register agar bersih
    header("Location: register.php");
    exit;
}
require_once 'proses-register.php';


if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Registrasi gagal! Coba lagi.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar - Futsal Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light py-5">
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
                <input type="text" id="username" name="username" class="form-control" required />
              </div>
              <div class="mb-3">
                <label for="gmail" class="form-label">Gmail</label>
                <input type="email" id="gmail" name="gmail" class="form-control" required />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" id="password" name="password" class="form-control" required />
              </div>
              <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="text" id="no_hp" name="no_hp" class="form-control" required />
              </div>
              <div class="mb-3">
                <label for="role" class="form-label">Daftar Sebagai</label>
                <select id="role" name="role" class="form-select" required>
                  <option value="" disabled selected>Pilih Peran</option>
                  <option value="Pelanggan">Pelanggan</option>
                  <option value="Admin">Admin</option>
                </select>
              </div>
              <button type="submit" name="register" class="btn btn-primary w-100">Daftar</button>
            </form>
          </div>
          <div class="card-footer text-center">
            Sudah punya akun? <a href="login.php">Login di sini</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>