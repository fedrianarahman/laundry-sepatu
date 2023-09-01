<?php
session_start();
include '../conn.php';

$id = $_POST['id_testimonial'];
$namaSepatu = $_POST['nama_sepatu'];
// photo Before
if (!empty($_FILES['photoBefore']['name'])) {
    $photoBefore = uploadBefore();
} else {
    $photoBefore = $_POST['photo_before_old'];
}
// photo After
if (!empty($_FILES['photoAfter']['name'])) {
    $photoAfter = uploadAfter();
} else {
    $photoAfter = $_POST['photo_after_old'];
}

$jenisLayanan = $_POST['jenis_layanan'];
$updated_at = date('Y-m-d H:i:s');

$updateData = mysqli_query($conn, "UPDATE `testimonial` SET `photo_before`='$photoBefore',`photo_after`='$photoAfter',`merk_sepatu`='$namaSepatu',`jenis_layanan`='$jenisLayanan',`updated_at`='$updated_at' 
WHERE `id`='$id'");

if ($updateData) {
    $_SESSION['status-info'] = "Data Berhasil Dirubah";
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Dirubah";
}



function uploadBefore() {
    $namaFile = $_FILES['photoBefore']['name'];
    $ukuranFile = $_FILES['photoBefore']['size'];
    $error =  $_FILES['photoBefore']['error'];
    $tmpName = $_FILES['photoBefore']['tmp_name'];

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
   // Buat nama unik berdasarkan timestamp
   $namaUnik = time() . '.' . $namaFile;

   // Lolos pengecekan, pindahkan gambar ke direktori yang ditentukan
   move_uploaded_file($tmpName, "../../assets/img/testimonial/" . $namaUnik);

   return $namaUnik;
}
function uploadAfter(){
    $namaFile = $_FILES['photoAfter']['name'];
    $ukuranFile = $_FILES['photoAfter']['size'];
    $error =  $_FILES['photoAfter']['error'];
    $tmpName = $_FILES['photoAfter']['tmp_name'];

    if ($error === 4) {
        $_SESSION['status-fail'] = "Pilih Gambar Dulu";
        return false;
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'svg', 'JPG', 'JPEG', 'PNG'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        $_SESSION['status-fail'] = "Yang Anda Upload Bukan Gambar";
        return false;
    }

    // Cek ukuran gambar jika terlalu besar
    if ($ukuranFile > 1000000) {
        $_SESSION['status-fail'] = "Ukuran Gambar Terlalu Besar";
        return false;
    }

    // Buat nama unik berdasarkan timestamp
    $namaUnik = time() . '.' . $namaFile;

    // Lolos pengecekan, pindahkan gambar ke direktori yang ditentukan
    move_uploaded_file($tmpName, "../../assets/img/testimonial/" . $namaUnik);

    return $namaUnik;
}
header("Location:../../dataTestimonial.php");