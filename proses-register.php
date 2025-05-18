<?php

function register($data){
    global $db_conn;
    $username = strtolower($data["username"]);
    $gmail = strtolower($data["gmail"]);
    $password = mysqli_real_escape_string($db_conn,$data["password"]);
    $no_hp = trim($data["no_hp"]);
    $role = $data["role"];

    $result = mysqli_query($db_conn, "SELECT username FROM user WHERE username = '$username' ");

    if(mysqli_fetch_row($result)){
        echo "<script>
            alert('username sudah terdaftar!');
        </script>";
        return false;
    }

    if (!preg_match("/^[0-9]{10,15}$/", $no_hp)) {
        echo "<script>
            alert(Nomor HP harus angka (10-15 digit.))
        </script>";
        return false;
    
    }

    if ($role !== 'Pelanggan' && $role !== 'Admin') {
        echo "<script>
            alert(Role tidak valid.)
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($db_conn,"INSERT INTO user VALUES('','$username','$gmail','$password','$no_hp','$role')");

    return mysqli_affected_rows($db_conn);

}
?>