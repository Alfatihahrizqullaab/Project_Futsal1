<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM TempatFutsal WHERE id_tempat = $id";
    mysqli_query($db_conn, $query);
}

header("Location: DashboardAdmin.php");
exit;
?>
