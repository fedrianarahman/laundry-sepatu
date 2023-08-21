<?php
session_start();
include '../conn.php';

$idPesanan = $_POST['id_pesanan'];
$akunTujuan = $_POST['akun_tujuan'];
$asalBank = $_POST['asal_bank'];
$jumlah = $_POST['jumlah_tf'];
$namaPengirim = $_POST['nama_pengirim'];
$photo = upload();
$harga_layanan = $_POST['harga_layanan'];

if ($jumlah!=$harga_layanan) {
    $_SESSION['status-fail'] = "Nominal Tidak Sesuai";
    header("Location:../../paymentPage.php?id_pemesanan=$idPesanan");
} else {
    
    $updateData = mysqli_query($conn, "UPDATE `pemesanan` SET `via_bank`='$akunTujuan',`jumlah_bayar`='$jumlah',`asal_bank`='$asalBank',`nama_pengirim`='$namaPengirim',`bukti_tf`='$photo',`status_pembayaran`='L',`expire_start`='',`expire_end`='',`status`='P' WHERE `id`='$idPesanan'");

    if ($updateData) {
        header("Location:../../pemesananSelesai.php");
    }
}


function upload()
{
    $namaFile = $_FILES['photo']['name'];
    $ukuranFile = $_FILES['photo']['size'];
    $error =  $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    if ($error === 4) {
        $_SESSION['status-fail'] = "Pilih Gambar Dulu";
        return false;
    }

    //cek apakah yang diupload Adalah Gambar

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'svg', 'JPG', 'JPEG', 'PNG'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        $_SESSION['status-fail'] = "Yang Anda Upload Bukan Gambar";
        return false;
    }

    // cek ukuran gambar jika terlalu besar

    if ($ukuranFile > 1000000) {
        $_SESSION['status-fail'] = "Ukuran Gambar Terlalu Besar";
        return false;
    }

    // lolos pengecekan
    move_uploaded_file($tmpName, "../../admin/assets/img/img-transfer/" . $namaFile);

    return $namaFile;
}
?>