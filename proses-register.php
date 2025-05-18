<?php
require_once 'koneksi.php';

function register($data) {
    global $db_conn;

    $username = strtolower(trim($data["username"]));
    $gmail = strtolower(trim($data["gmail"]));
    $password_hash = $data["password"];
    $no_hp = trim($data["no_hp"]);
    $role = $data["role"];

    // Cek username sudah ada atau belum
    $cekUser = mysqli_query($db_conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_num_rows($cekUser) > 0) {
        echo "<script>alert('Username sudah terdaftar!');</script>";
        return false;
    }

    // Validasi nomor HP
    if (!preg_match("/^[0-9]{10,15}$/", $no_hp)) {
        echo "<script>alert('Nomor HP harus angka dan 10-15 digit!');</script>";
        return false;
    }

    // Validasi role
    if ($role !== 'Pelanggan' && $role !== 'Admin') {
        echo "<script>alert('Role tidak valid!');</script>";
        return false;
    }

    // Hash password
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);


    // Insert user
    $query = "INSERT INTO user (username, gmail, password, no_hp, role)
              VALUES ('$username', '$gmail', '$password_hash', '$no_hp', '$role')";
    mysqli_query($db_conn, $query);

    return mysqli_affected_rows($db_conn);
}
?>