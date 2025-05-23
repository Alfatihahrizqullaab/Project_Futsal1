<?php
session_start();
include "koneksi.php"; // pastikan koneksi disimpan dalam $db_conn

if (isset($_POST['daftar'])) {
    $role = $_POST['role'];
    $nama = $db_conn->real_escape_string($_POST['nama']);
    $email = $db_conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];
    $no_hp = $db_conn->real_escape_string($_POST['no_hp']);

    // Validasi konfirmasi password
    if ($password !== $konfirmasi) {
        $error = "Konfirmasi password tidak cocok.";
    }
    // Validasi No HP hanya angka
    elseif (!preg_match('/^\d+$/', $no_hp)) {
        $error = "No. HP hanya boleh berisi angka.";
    }
    else {
        $table = $role === "Pelanggan" ? "Pelanggan" : "Pengelola";
        $cek = $db_conn->query("SELECT * FROM $table WHERE email='$email'");
        if ($cek->num_rows > 0) {
            $error = "Email sudah digunakan.";
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            if ($role === "Pelanggan") {
                $sql = "INSERT INTO Pelanggan (nama, email, password, no_hp)
                        VALUES ('$nama', '$email', '$password_hash', '$no_hp')";
            } else {
                $nama_tempat = $db_conn->real_escape_string($_POST['nama_tempat']);
                $alamat_tempat = $db_conn->real_escape_string($_POST['alamat_tempat']);
                $sql = "INSERT INTO Pengelola (nama, email, password, no_hp, nama_tempat_futsal, alamat_tempat)
                        VALUES ('$nama', '$email', '$password_hash', '$no_hp', '$nama_tempat', '$alamat_tempat')";
            }

            if ($db_conn->query($sql)) {
                $sukses = "Pendaftaran berhasil! Silakan login.";
            } else {
                $error = "Terjadi kesalahan: " . $db_conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Akun - Futsal Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script>
    function toggleRoleFields() {
      const role = document.getElementById("role").value;
      const adminFields = document.getElementById("admin-fields");
      adminFields.style.display = role === "Admin" ? "block" : "none";
    }
  </script>
</head>
<body class="bg-light py-5">
  <div class="container mt-5 pt-3">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <div class="card shadow">
          <div class="card-header text-center">
            <h4>Daftar Akun</h4>
          </div>
          <div class="card-body">
            <?php if (isset($error)): ?>
              <div class="alert alert-danger"><?= $error ?></div>
            <?php elseif (isset($sukses)): ?>
              <div class="alert alert-success"><?= $sukses ?></div>
            <?php endif; ?>
            <form method="POST">
              <div class="mb-3">
                <label for="role" class="form-label">Daftar Sebagai</label>
                <select name="role" id="role" class="form-select" onchange="toggleRoleFields()" required>
                  <option value="" disabled selected>Pilih Peran</option>
                  <option value="Pelanggan">Pelanggan</option>
                  <option value="Admin">Admin</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required />
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required />
              </div>
              <div class="mb-3">
                <label class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control" required />
              </div>
              <div class="mb-3">
                <label class="form-label">Konfirmasi Sandi</label>
                <input type="password" name="konfirmasi" class="form-control" required />
              </div>
              <div class="mb-3">
                <label class="form-label">No. HP</label>
                <input type="tel" name="no_hp" class="form-control" pattern="\d+" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required />
                <div class="form-text">Hanya angka yang diperbolehkan.</div>
              </div>

              <!-- Field Tambahan untuk Admin -->
              <div id="admin-fields" style="display: none;">
                <hr />
                <div class="mb-3">
                  <label class="form-label">Nama Tempat Futsal</label>
                  <input type="text" name="nama_tempat" class="form-control" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Alamat Tempat Futsal</label>
                  <textarea name="alamat_tempat" class="form-control" rows="2"></textarea>
                </div>
              </div>

              <button type="submit" name="daftar" class="btn btn-success w-100">Daftar</button>
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
