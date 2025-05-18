<?php
session_start();
require "koneksi.php";

if (isset($_SESSION["login"])) {
    if ($_SESSION["role"] === "Admin") {
        header("Location: admin/DashboardAdmin.php");
        exit;
    } elseif ($_SESSION["role"] === "Pelanggan") {
        header("Location: DashboardPelanggan.php");
        exit;
    }
}

$error = false;

if (isset($_POST["login"])) {
    $loginInput = mysqli_real_escape_string($db_conn, $_POST["username_gmail"]);
    $password = $_POST["password"];
    $role = $_POST["role"];

    $query = "SELECT * FROM user WHERE (username = '$loginInput' OR gmail = '$loginInput') AND role = '$role'";
    $result = mysqli_query($db_conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];
            $_SESSION["role"] = $row["role"];

            if ($row["role"] === "Admin") {
                header("Location:admin/DashboardAdmin.php");
                exit;
            } else {
                header("Location:DashboardPelanggan.php");
                exit;
            }
        } else {
            $error = true;
        }
    } else {
        $error = true;
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
  <div class="container mt-5 pt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-header text-center">
            <h4>Login Akun</h4>
          </div>
          <div class="card-body">
            <?php if ($error): ?>
              <div class="alert alert-danger">Username/Gmail, Password, atau Role salah!</div>
            <?php endif; ?>
            <form action="" method="POST">
              <div class="mb-3">
                <label for="login" class="form-label">Username / Gmail</label>
                <input type="text" id="login" name="username_gmail" class="form-control" required />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" id="password" name="password" class="form-control" required />
              </div>
              <div class="mb-3">
                <label for="role" class="form-label">Login Sebagai</label>
                <select id="role" name="role" class="form-select" required>
                  <option value="" disabled selected>Pilih Peran</option>
                  <option value="Pelanggan">Pelanggan</option>
                  <option value="Admin">Admin</option>
                </select>
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
