<?php
session_start();
include '../conn.php';

$id = $_GET['id'];

$deleteDataService = mysqli_query($conn, "DELETE FROM `service` WHERE id ='$id'");

if ($deleteDataService) {
    $_SESSION['status-info'] = "Data Berhasil Dihapus";
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Dihapus";
}

header("Location:../../dataService.php");
?>