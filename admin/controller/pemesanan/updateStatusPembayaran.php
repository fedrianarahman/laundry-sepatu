<?php
session_start();
include '../conn.php';

$id = $_GET['id'];

// cek data
$cek = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id ='$id'");
$r = mysqli_fetch_array($cek);
$idPemesanan = $r['id'];

if ($idPemesanan) {
    $updateStatusPembayaran = mysqli_query($conn, "UPDATE pemesanan SET status ='A' WHERE id = '$id' ");
    if ($updateStatusPembayaran) {
        $_SESSION['status-info'] = "Pembayaran Terkonfirmasi, Silahkan Input Progress";
        header("Location:../../addSepatu.php?id=$idPemesanan");
    } else {
        $_SESSION['status-fail'] = "Error";
        
    }
    
} else {
    $_SESSION['status-fail'] = "Gagal Mengkonfirmasi Pembayaran";
    header("Location:../../dataPemesanan.php");
}

?>