<?php
include 'koneksi.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status']; // tidak dibalik!

    $query = "UPDATE TempatFutsal SET statusTempatLapangan='$status' WHERE id_tempat=$id";
    mysqli_query($db_conn, $query);
}

header("Location: DashboardAdmin.php");
exit;
?>
