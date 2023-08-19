<?php
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer-master/PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/PHPMailer-master/src/SMTP.php';
session_start();
include '../conn.php';

$kode_sepatu = $_POST['kode_spt'];
$pemilik = $_POST['nama_pemilik'];
$jenisSepatu = $_POST['jenis_sepatu'];
$warna = $_POST['warna_sepatu'];
$status = $_POST['status'];
// $created_at = $_POST['created_at'];
$jenis_layanan = $_POST['jenis_layanan'];
$no_hp_pemilik = $_POST['no_hp_pemilik'];
$updated_at = date('Y-m-d H:i:s');
$updated_tgl = strtotime($updated_at);
$tglProgress = date('d F Y',$updated_tgl );
$created_at = $_POST['created_at'];
// tambahan
$userId = $_POST['id_penyewa'];
$status_sepatu = "at store";
$emailPemesanan = $_POST['email'];
// mengupdate status
$query = mysqli_query($conn, "INSERT INTO `progress_sepatu`(`id`, `kode_sepatu`, `userId`,`pemilik`, `no_hp_pemilik`, `merk_sepatu`, `warna`, `jenis_layanan`, `status`, `created_at`, `updated_at`,`status_sepatu`) VALUES ('','$kode_sepatu','$userId','$pemilik','$no_hp_pemilik','$jenisSepatu','$warna','$jenis_layanan','$status','$created_at','$updated_at','$status_sepatu')");

if ($query) {
    $_SESSION['status-info'] = "Progress Berhasil Ditambahkan";
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

        $mail->setFrom('fedrianarahman21@gmail.com', 'Notifikasi Progress Sepatu');
        $mail->addAddress($emailPemesanan, 'Rahman Fedriana');

        $mail->isHTML(true);
        $mail->Subject = "Shoeslab Notifikasi Progress Sepatu";
        // $mail->Body = "Hi $nama_pemilik, Terimakasih Telah Memilih shoeslab sebagai layanan treatment sepatu anda, Pembayaran Anda Pemesanan Anda Telah Diterima, Berikut Detail : <br/> Nama Pemilik  : $nama_pemilik <br/> Jenis Sepatu : $jenis_sepatu <br/> Warna Sepatu  : $warna_sepatu<br/> Kode Sepatu : $kode_barang ";
        $mail->Body ='
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title></title>
            <style>
                /* Masukkan CSS Anda di sini */
                body {
                    font-family: Arial, sans-serif;
                    background-color: #ddd;
                }
                .container {
                    padding: 20px;
                    border-radius: 12px;
                    background: #fff;
                    width: 296px;
                    height: 464px;
                    box-shadow: 0px 4px 16px 0px rgba(114, 164, 165, 0.35);
                }
                .header-img {
                    display: block;
                    margin: auto;
                    width : 141px;
                    height : 141px;
                }
                h6 {
                    margin-top: 10px;
                    text-align:center;
                    color: #152C5B;
                    font-family: Poppins;
                    font-size: 20px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: normal;
                    margin-bottom:15px;
                }
            </style>
        </head>
        <body>
           <p>hi, '.$nama_pemilik.' Progress Sepatu Anda</p>
           <p>'.($status=='finish'? 'Sepatu Sudah Selesai' : $status).'</p>
           <p>'.$tglProgress.'</p>
        </body>
        </html>
    ';
        $mail->AltBody = '';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    $_SESSION['status-fail'] = "Progress Tidak Berhasil ditambahkan";
}

header("Location:../../dataSepatu.php");

?>