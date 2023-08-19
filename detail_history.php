<?php
session_start();
include './controller/conn.php';
$idUser = $_SESSION['user_id'];
$idPesanan = $_GET['id_pemesanan'];
date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu ke WIB (Waktu Indonesia Bagian Barat)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>shoeslab|Tentang</title>
    <!-- link bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- link css -->
    <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
    <style>
        footer {
            padding-top: 30px;
            padding-bottom: 10px;
            border-top: 1px solid rgba(114, 164, 165, 0.35);
            /* margin-bottom: 10px; */
            border-bottom: 1px solid rgba(114, 164, 165, 0.35);
        }

        .icon {
            display: flex;
            flex-direction: row;
        }

        .profile {
            margin-bottom: 150px;
        }

        .first-icon .fa-whatsapp,
        .second-icon .fa-instagram,
        a {
            font-size: 20px;
            color: #72A4A5;
        }

        .second-icon {
            margin-left: 15px;
        }

        .profile-link {
            padding: 4px;

        }

        .profile-link.active {
            background-color: #FEB500;
            color: white;
            border-radius: 8px;
        }

        .profile-link.active a {
            color: white;
        }

        ul li {
            list-style: none;
        }

        .profile-link a {
            text-decoration: none;
        }

        .btn-cs-order {

            background: #FEB500;

            color: #FFF;
            text-align: center;
            font-size: 18px;
            font-family: Poppins;
            font-style: normal;
            font-weight: 300;
        }

        .breadcrumb-item a {
            text-decoration: none;
            font-size: 18px;
        }

        .repaint {
            color: #4FB5B7;
        }

        td {
            font-size: 15px;
            font-weight: 500;
            color: #999;
        }

        tr {
            margin-bottom: 10px;
        }

        .sp-pembayaran {
            background-color: #ecfae4;
            color: #68CF29;
            padding: 3px 10px;
        }

        .s-pemesanan {
            padding: 3px 10px;
            background-color: #fff0da;
            color: #FFAB2D;
        }

        .note {
            color: red;
        }

        .note p {
            line-height: 9px;
        }
    </style>
</head>

<body>
    <!-- navigasi -->
    <?php include './include/navbar.php' ?>
    <!-- end navigasi -->
    <br />
    <br />
    <br />
    <br />
    <br />
    <?php include './include/panduan.php' ?>
    <div class="container">

        <section class="profile">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <?php
                            $getDataPhoto = mysqli_query($conn, "SELECT * FROM user WHERE id = '$idUser'");
                            while ($dataPhoto = mysqli_fetch_array($getDataPhoto)) {

                            ?>
                                <img src="./assets/img/img-profile/<?php echo $dataPhoto['photo'] ?>" class="img-thumbnail mx-auto d-block mb-4 rounded-circle" width="114px" alt="">
                            <?php } ?>
                            <ul>
                                <li class="profile-link "><a href="./profile.php">My Profile</a></li>
                                <li class="profile-link active"><a href="order_history.php">Order History</a></li>
                                <li class="profile-link "><a href="./pesananSaya.php">My Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./order_history.php">Order History</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail History</li>
                        </ol>
                    </nav>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <?php
                            $getDapaPesanan = mysqli_query($conn, "SELECT pemesanan.id AS id_pesanan, pemesanan.layanan_harga AS harga_layanan, pemesanan.merk_sepatu AS merk_sepatu,pemesanan.jenis_sepatu AS jenis_sepatu,pemesanan.warna_sepatu AS warna_sepatu,pemesanan.status_pembayaran AS status_pembayaran,pemesanan.status AS status_pemesanan, pemesanan.created_at AS tgl_pemesanan, pemesanan.nama_pengirim AS nama_pengirim,pemesanan.jumlah_bayar AS jumlah_bayar,pemesanan.asal_bank AS asal_bank,bank.nama_bank AS nama_bank,bank.nama_pemilik AS nama_pemilik,bank.no_rek AS no_rek,service.judul AS jenis_layanan FROM pemesanan INNER JOIN bank ON bank.id = pemesanan.via_bank INNER JOIN service ON service.id = pemesanan.layana_id WHERE pemesanan.id = '$idPesanan' ");
                            while ($dataPemesanan = mysqli_fetch_array($getDapaPesanan)) {

                            ?>
                                <table class="mb-4">
                                    <tr>
                                        <td>Merk Sepatu</td>
                                        <td>:</td>
                                        <td><?php echo $dataPemesanan['merk_sepatu'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Sepatu</td>
                                        <td>:</td>
                                        <td><?php echo $dataPemesanan['jenis_sepatu'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Warna Sepatu</td>
                                        <td>:</td>
                                        <td><?php echo $dataPemesanan['warna_sepatu'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Layanan</td>
                                        <td>:</td>
                                        <td><span class="repaint"><?php echo $dataPemesanan['jenis_layanan'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Harga Layanan</td>
                                        <td>:</td>
                                        <td>Rp.<?php echo number_format($dataPemesanan['harga_layanan'], 0, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status Pembayaran</td>
                                        <td>:</td>
                                        <td><span class="sp-pembayaran"><?php
                                                                        if ($dataPemesanan['status_pembayaran'] == 'L') {
                                                                            echo 'Lunas';
                                                                        } else {
                                                                            echo '';
                                                                        }

                                                                        ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Akun Bank Tujuan</td>
                                        <td>:</td>
                                        <td><?php echo $dataPemesanan['nama_bank'] ?> | <?php echo $dataPemesanan['no_rek'] ?> an <?php echo $dataPemesanan['nama_pemilik'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Asal Bank</td>
                                        <td>:</td>
                                        <td><?php echo $dataPemesanan['asal_bank'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Bayar</td>
                                        <td>:</td>
                                        <td>Rp.<?php echo number_format($dataPemesanan['jumlah_bayar'], 0, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pengirim</td>
                                        <td>:</td>
                                        <td><?php echo $dataPemesanan['nama_pengirim'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status Pemesanan</td>
                                        <td>:</td>
                                        <td class="<?php
                                                    if ($dataPemesanan['status_pemesanan'] == 'P') {
                                                        echo 's-pemesanan';
                                                    } else {
                                                        echo 'sp-pembayaran';
                                                    } ?>"><?php
                                                            if ($dataPemesanan['status_pemesanan'] == 'P') {
                                                                echo 'Menunggu Penyerahan Sepatu';
                                                            } else {
                                                                echo 'Sepatu Terkonfirmasi!';
                                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pemesanan</td>
                                        <td>:</td>
                                        <td><?php
                                            $created_old = strtotime($dataPemesanan['tgl_pemesanan']);
                                            echo date('F d Y', $created_old) ?></td>
                                    </tr>
                                </table>
                                <div class="row mb-4">
                                    <div class="note">
                                        <p>*Note :</p>
                                        <p>- Silahkan Datang Ke Store untuk menyerahkan sepatu Sebelum Tanggal : <span style="font-weight:bold;">
                                                <?php
                                                $tglPemesanan = strtotime($dataPemesanan['tgl_pemesanan']);
                                                $limaHariDariSekarang = date('d F Y', strtotime('+5 days', $tglPemesanan));
                                                echo $limaHariDariSekarang;
                                                ?></span></p>
                                        <p>- Jika Lewat Dari Tanggal Yang Sudah Ditentukan Maka Pemesanan Dianggap Hangus</p>
                                        <p>- <span style="font-weight: bold;">No Refund</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="./order_history.php" class="btn btn-warning btn-sm">Kembali</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="./printInvoice.php?id_pesanan=<?php echo $dataPemesanan['id_pesanan'] ?>" class="btn btn-primary btn-sm" target="_blank" style="float: right;">Cetak Invoice</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- footer -->
    <?php include './include/footer.php' ?>
    <!-- end footer -->

    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- script fontawesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="./assets/js/script2.js"></script>
</body>

</html>