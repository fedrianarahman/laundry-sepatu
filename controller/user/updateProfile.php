<?php
session_start();
include '../conn.php';
$idUser = $_SESSION['user_id'];

// data from form
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$username = $_POST['username']; 
$password = $_POST['password'];
$updated_at  = date('Y-m-d H:i:s');
// photo
if (!empty($_FILES['photo']['name'])) {
    $photo = upload();
    if (!$photo) {
        return false;
    }
} else {
    $photo = $_POST['old_photo'];
}

$updateProfile = mysqli_query($conn, "UPDATE `user` SET `photo`='$photo',`nama`='$nama',`email`='$email',`no_hp`='$no_hp',`username`='$username',alamat='$alamat',`password`='$password',`updated_at`='$updated_at' WHERE `id`='$idUser'");

if ($updateProfile) {
    $_SESSION['status-info'] = "Profile Berhasil Diupdate";
} else {
    $_SESSION['status-info'] = "Profile Gagal Diupdate";
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

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png','svg'];
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
    move_uploaded_file($tmpName, "../../assets/img/img-profile/" . $namaFile);

	return $namaFile;
}
header("Location:../../profile.php");