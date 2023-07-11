<?php
session_start();
include '../conn.php';

$id = $_GET['id'];

$deleteDataUser = mysqli_query($conn, "DELETE FROM user WHERE id = '$id'");

if ($deleteDataUser) {
    $_SESSION['status-info'] = "Data Berhasil Dihapus";
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Dihapus";
}


header("Location:../../dataUser.php");
?>