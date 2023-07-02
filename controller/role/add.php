<?php
session_start();
include '../conn.php';

$role = trim(strtolower($_POST['role']));
$dateInput = date('Y-m-d H:i:s');

// menegcek apakah ada role yang sama
$cekRole  = mysqli_query($conn, "SELECT * FROM role WHERE nama_role  = '$role'");
$r = mysqli_fetch_array($cekRole);

if ($r) {
    $_SESSION['status-fail'] = "Nama Role Sudah Ada";
} else {
    // menambahkan data kedalam databse;
    $query = mysqli_query($conn, "INSERT INTO `role`(`id`, `nama_role`, `craeted_at`, `updated_at`) VALUES ('','$role','$dateInput','')");

    if ($query) {
        $_SESSION['status-info'] = "Data Berhasil Ditambahkan";
    } else {
        $_SESSION['status-fail'] = "Data Gagal Ditambahkan";
    }
    
}

header("Location:../../dataRole.php");

?>