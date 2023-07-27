<?php
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer-master/PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/PHPMailer-master/src/SMTP.php';
session_start();
include '../conn.php';



$auto = mysqli_query($conn, "SELECT max(id) AS maxID FROM progress_sepatu");
                                    
$cek = mysqli_fetch_array($auto);
$code = $cek['maxID'];
$code++;
$huruf = "SPT-";
$kd_booking = $huruf . sprintf("%03s", $code);
$urutan = (int)substr($code, 1, 3);


$kode_barang = $kd_booking;


$nama_pemilik = $_POST['nama_pemilik'];
$no_hp_pemilik = $_POST['no_hp_pemilik'];
$jenis_sepatu = $_POST['jenis_sepatu'];
$warna_sepatu = $_POST['warna'];
$jenis_layanan = $_POST['jenis_layanan'];
$status = $_POST['status'];
$created_at = date('Y-m-d H:i:s');
$emailPemesanan = $_POST['email_pemesan'];

// menambahkan ke dalam database
$addProgressSepatu = mysqli_query($conn, "INSERT INTO `progress_sepatu`(`id`, `kode_sepatu`, `pemilik`, `no_hp_pemilik`, `merk_sepatu`, `warna`, `jenis_layanan`, `status`, `created_at`, `updated_at`) VALUES ('','$kode_barang','$nama_pemilik','$no_hp_pemilik','$jenis_sepatu','$warna_sepatu','$jenis_layanan','$status','$created_at','')");


if ($addProgressSepatu) {
    $_SESSION['status-info'] = "Data Berhasil ditambahkan";
    
    $mail = new PHPMailer();
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'fedrianarahman21@gmail.com';
        $mail->Password = 'zmlcpmwkljevadmo';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('fedrianarahman21@gmail.com', 'Pembayaran Terkonfirmasi');
        $mail->addAddress($emailPemesanan, 'Rahman Fedriana');

        $mail->isHTML(true);
        $mail->Subject = "Pembayaran Layanan Treatment shoeslab Terkonfirmasi";
        $mail->Body = "Hi $nama_pemilik, Terimakasih Telah Memilih shoeslab sebagai layanan treatment sepatu anda, Pembayaran Anda Pemesanan Anda Telah Diterima, Berikut Detail : <br/> Nama Pemilik  : $nama_pemilik <br/> Jenis Sepatu : $jenis_sepatu <br/> Warna Sepatu  : $warna_sepatu<br/> Kode Sepatu : $kode_barang ";
        $mail->AltBody = '';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    $_SESSION['status-fail'] = "Data Tidak Berhasil Ditambahkan";
}

header("Location:../../dataSepatu.php");
exit();

?>