<?php

$db_conn = mysqli_connect("localhost","root","","db_futsal");

if($conn -> connect_error){
    echo "Failed to connect to MySQL:" . $conn -> connect_error;
    exit();
}
?>