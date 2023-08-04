<?php
session_start();
include './controller/conn.php';
if (!isset($_SESSION['nama'])) {
    header("Location: ./auth/login.php");
    exit();
}
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Data USer</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo-biru.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/feathericon.min.css">
    <link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">
        <!-- start navbar -->
        <?php require('./include/Navbar.php') ?>
        <!-- end navbar -->

        <!-- start sidebar -->
        <?php require('./include/Sidebar.php') ?>
        <!-- end sidebar -->
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <h3 class="page-title mt-3">Konfirmasi Pemesanan</h3>
                            <!-- <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Data Kategori Obat Page</li>
                            </ul> -->
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="card rounded flex-fill">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form method="POST" action="./controller/sepatu/add.php" enctype="multipart/form-data">
                                            <?php
                                            $getDataPemesanan = mysqli_query($conn, "SELECT pemesanan.id AS id_pemesanan,pemesanan.userId AS id_penyewa,pemesanan.layana_id AS layana_id,pemesanan.nama_pemesan AS nama_pemesan,pemesanan.email_pemesan AS email_pemesan,pemesanan.merk_sepatu AS merk_sepatu,pemesanan.no_hp_pemesan AS no_hp_pemesan,pemesanan.jenis_sepatu AS jenis_sepatu,pemesanan.warna_sepatu AS warna_sepatu,pemesanan.created_at AS created_at,pemesanan.status AS status,service.judul AS judul,service.harga AS harga FROM pemesanan INNER JOIN service ON service.id  = pemesanan.layana_id WHERE pemesanan.id = '$id'");
                                            while ($dataPemesanan = mysqli_fetch_array($getDataPemesanan)) {

                                            ?>
                                                <div class="row formtype">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Nama Pemilik</label>
                                                            <input class="form-control" type="text" name="nama_pemilik" value="<?php echo $dataPemesanan['nama_pemesan']?>">
                                                            <input class="form-control" hidden type="text" name="id_penyewa" value="<?php echo $dataPemesanan['id_penyewa']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>NO HP Pemilik</label>
                                                            <input class="form-control" type="text" name="no_hp_pemilik" value="<?php echo $dataPemesanan['no_hp_pemesan']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Merk Sepatu</label>
                                                            <input class="form-control" type="text" name="merk_sepatu" value="<?php echo $dataPemesanan['merk_sepatu']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Jenis Sepatu</label>
                                                            <input class="form-control" type="text" name="jenis_sepatu" value="<?php echo $dataPemesanan['jenis_sepatu']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Warna</label>
                                                            <input class="form-control" type="text" name="warna" value="<?php echo $dataPemesanan['warna_sepatu']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Jenis Layanan</label>
                                                            <select class="form-control" name="jenis_layanan">
                                                                <option>Pilih</option>
                                                                <?php
                                                                $ambildataService = mysqli_query($conn, "SELECT * FROM service");
                                                                while ($dataService = mysqli_fetch_array($ambildataService)) {
                                                                ?>
                                                                    <option value="<?php echo $dataService['id'] ?>" <?php if ($dataPemesanan['layana_id']==$dataService['id']) {
                                                                        echo 'selected';
                                                                    } ?>><?php echo ucwords($dataService['judul']) ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="font-weight-bolder">Jumlah Yang Harus Dibayar</label>
                                                            <input class="form-control" type="text" name="harga" value="Rp <?php echo number_format($dataPemesanan['harga'], 0, ',', '.')?>">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                <p>Status Pemesanan : <?php if ($dataPemesanan['status']=='P') {
                                                        echo '<span class="badge light badge-warning text-white">Belum Terkonfirmasi</span>';
                                                    } else {
                                                        echo '<span class="alert-success p-2 text-success font-weight-bold">Terkonfirmasi</span>';
                                                    }
                                                    ?> </p>
                                                </div>
                                                <a href="./dataPemesanan.php" class="btn btn-warning text-white">Kembali</a>
                                                <?php
                                                if ($dataPemesanan['status']=='P') {
                                                    echo '<a class="btn btn-primary" href="./controller/pemesanan/updateStatusPembayaran.php?id=' . $dataPemesanan['id_pemesanan'] . '" style="float: right;">Konfirmasi Pembayaran</a>';
                                                } else {
                                                    echo '<span class="btn btn-primary" style="float: right;">Konfirmasi Pembayaran</span>';
                                                }
                                                
                                                ?>
                                                <div class="row">
                                                    <?php } ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/raphael/raphael.min.js"></script>
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/js/chart.morris.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>