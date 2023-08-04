<?php
session_start();
include '../conn.php';

$photo = upload();
if (!$photo) {
    return false;
}
$namaPemilik = trim(strtolower($_POST['nama_pemilik']));
$noRekening = $_POST['no_rekening'];
$namaBank = $_POST['nama_bank'];
$created_at = date('Y-m-d H:i:s');

$addDataBank = mysqli_query($conn,"INSERT INTO `bank`(`id`, `photo`, `nama_bank`, `nama_pemilik`, `no_rek`, `created_at`, `updated_at`) VALUES ('','$photo','$namaBank','$namaPemilik','$noRekening','$created_at','')");

if ($addDataBank) {
    $_SESSION['status-info'] = "Data Berhasil dimasukan";
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Ditambahkan";
}


function upload (){
    $namaFile = $_FILES['photo']['name'];
    $ukuranFile = $_FILES['photo']['size'];
    $error =  $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    if ($error === 4) {
        $_SESSION['status-fail'] = "Pilih Gambar Dulu";
        return false;
    }

    //cek apakah yang diupload Adalah Gambar

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png','svg','JPG','JPEG','PNG'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array( $ekstensiGambar,$ekstensiGambarValid)) {
        $_SESSION['status-fail'] = "Yang Anda Upload Bukan Gambar";
        return false;
    }

    // cek ukuran gambar jika terlalu besar

    if ($ukuranFile > 1000000) {
        $_SESSION['status-fail'] = "Ukuran GAmbar Terlalu Besar";
        return false;
    }

    // lolos pengecekan
    move_uploaded_file($tmpName, "../../assets/img/image-bank/" . $namaFile);

	return $namaFile;

}

header("Location:../../dataAkunBank.php");
?>