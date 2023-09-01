<?php
session_start();
include '../conn.php';
$id = $_GET['id'];

$deleteData = mysqli_query($conn, "DELETE FROM `testimonial` WHERE id = '$id'");

if ($deleteData) {
    $_SESSION['status-info'] = "Data Berhasil Dihapus";
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Dihapus";
}

header("Location:../../dataTestimonial.php");