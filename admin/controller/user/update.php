<?php
session_start();
include '../conn.php';

$id = $_POST['id'];
$nama = trim(strtolower($_POST['nama']));
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$role = $_POST['role'];
$username = $_POST['username'];
$password = $_POST['password'];
$created_at = $_POST['created_at'];
$updated_at  = date('Y-m-d H:i:s');

$updateUser = mysqli_query($conn, "UPDATE `user` SET `nama`='$nama',`email`='$email',`no_hp`='$no_hp',`username`='$username',`password`='$password',`role`='$role',`created_at`='$created_at',`updated_at`='$updated_at' WHERE `id`='$id'");

if ($updateUser) {
    $_SESSION['status-info'] = "Data User Berhasil Dirubah";
} else {
    $_SESSION['status-fail'] = "Data User Tidak Berhasil Dirubah";
}

header("Location:../../dataUser.php");
?>