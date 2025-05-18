<?php

$db_conn = mysqli_connect("localhost", "root", "", "db_futsal");

if (!$db_conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>