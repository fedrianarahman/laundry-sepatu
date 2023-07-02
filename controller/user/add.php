<?php
session_start();
include '../conn.php';

$nama = trim(strtolower($_POST['nama']));
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$role = $_POST['role'];
$username = trim(strtolower($_POST['username']));
$password = $_POST['password'];
$created_at = date('Y-m-d H:i:s');

// mengecek apakah ada username yang sama
$cekUsername = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
$r = mysqli_fetch_array($cekUsername);

if ($r) {
    $_SESSION['status-fail'] = "Akun Sudah Tersedia";
} else {
    // menambahkan user
    $query = mysqli_query($conn, "INSERT INTO `user`(`id`, `nama`, `email`, `no_hp`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES ('','$nama','$email','$no_hp','$username','$password','$role','$created_at','')");

    if ($query) {
        $_SESSION['status-info'] = "Data User Berhasil Ditambahkan";
    } else {
        $_SESSION['status-fail'] = "Data User Tidak Berhasil Ditambahkan";
    }
    
}

header("Location:../../dataUser.php");
?>