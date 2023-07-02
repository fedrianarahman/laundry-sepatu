<?php
session_start();
include '../conn.php';
$kode_spt = $_GET['id'];

$deleteData = mysqli_query($conn, "DELETE FROM progress_sepatu WHERE kode_sepatu  = '$kode_spt'");

if ($deleteData) {
    $_SESSION['status-info'] = "Data Berhasil dihapus";
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Dihapus";
}

header("Location:../../dataSepatu.php");
?>