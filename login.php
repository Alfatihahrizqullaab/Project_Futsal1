<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $role = $_POST['role'];
    $email = $db_conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $table = $role === "Pelanggan" ? "Pelanggan" : "Pengelola";

    $result = $db_conn->query("SELECT * FROM $table WHERE email='$email'");
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Login sukses
            $_SESSION['login'] = true;
            $_SESSION['role'] = $role === "Pelanggan" ? "Pelanggan" : "Admin";
            $_SESSION['user_id'] = $user[$role === "Pelanggan" ? "id_pelanggan" : "id_pengelola"];
            $_SESSION['nama'] = $user['nama'];

            if ($_SESSION['role'] === "Pelanggan") {
                header("Location: DashboardPelanggan.php");
            } else {
                header("Location: DashboardAdmin.php");
            }
            exit;
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Email tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - Futsal Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light py-5">
  <div class="container mt-5 pt-3">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header text-center">
            <h4>Login</h4>
          </div>
          <div class="card-body">
            <?php if (isset($error)): ?>
              <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <form method="POST">
              <div class="mb-3">
                <label for="role" class="form-label">Masuk Sebagai</label>
                <select name="role" id="role" class="form-select" required>
                  <option value="" disabled selected>Pilih Peran</option>
                  <option value="Pelanggan">Pelanggan</option>
                  <option value="Admin">Admin</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required />
              </div>
              <div class="mb-3">
                <label class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control" required />
              </div>
              <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
            </form>
          </div>
          <div class="card-footer text-center">
            Belum punya akun? <a href="register.php">Daftar di sini</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
