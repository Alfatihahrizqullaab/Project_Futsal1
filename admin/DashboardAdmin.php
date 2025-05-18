<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["role"] !== "Admin") {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard Admin - Futsal Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container mt-5">
    <h1>Selamat datang, Admin <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>Ini adalah dashboard admin.</p>
    <a href="../logout.php" class="btn btn-danger">Logout</a>
  </div>
</body>
</html>
