<?php
session_start();
include './controller/conn.php';
// Cek apakah sesi login telah diatur
if (!isset($_SESSION['nama'])) {
    header("Location: ./auth/login.php");
    exit();
}
$kode_spt = $_GET['kode_spt'];
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
    <!-- data tabele -->
    <link rel="stylesheet" href="./assets/data-table/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="./assets/data-table/css/style.css"> -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/timeline.css">
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
                        <div class="col-sm-12 mt-5">
                            <h3 class="page-title mt-3">Good Morning Soeng Souy!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active"><?php echo "Route halaman saat ini: " . $route; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Progress</h4>
                            </div>
                            <div class="card-body">
                                <form action="./controller/sepatu/updateProgress.php" method="POST">
                                    <?php
                                    //   mengambil sepatu berdasarkan kode
                                    $ambilData = mysqli_query($conn, "SELECT *
                                FROM progress_sepatu
                                WHERE kode_sepatu = '$kode_spt'
                                ORDER BY id DESC
                                LIMIT 1");
                                    while ($data = mysqli_fetch_array($ambilData)) {

                                    ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nama Pemilik</label>
                                                    <input hidden class="form-control" type="text" name="kode_spt" value="<?php echo $data['kode_sepatu'] ?>" readonly>
                                                    <input hidden class="form-control" type="text" name="jenis_layanan" value="<?php echo $data['jenis_layanan'] ?>" readonly>
                                                    <input hidden class="form-control" type="text" name="no_hp_pemilik" value="<?php echo $data['no_hp_pemilik'] ?>" readonly>
                                                    <input hidden class="form-control" type="text" name="created_at" value="<?php echo $data['created_at'] ?>" readonly>
                                                    <input class="form-control" type="text" name="nama_pemilik" value="<?php echo $data['pemilik'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Jenis Sepatu</label>
                                                    <input class="form-control" type="text" name="jenis_sepatu" value="<?php echo $data['merk_sepatu'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Warna Sepatu</label>
                                                    <input class="form-control" type="text" name="warna_sepatu" value="<?php echo $data['warna'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="time-line-wrapper">
                                            <div class="timeline p-4  mb-4">
                                                <?php
                                                $getStatus = mysqli_query($conn, "SELECT status, IFNULL(created_at, updated_at) AS tanggal FROM progress_sepatu WHERE kode_sepatu = '$kode_spt'");
                                                while ($datastatus = mysqli_fetch_array($getStatus)) {
                                                    $tanggal = $datastatus['tanggal'];
                                                    $hari = date('l', strtotime($tanggal)); // Mengambil nama hari dari tanggal
                                                ?>
                                                    <div class="tl-item active">
                                                        <div class="<?php if ($datastatus['status']=="finish") {
                                                            echo 'tl-dot-finish';
                                                        } else {
                                                            echo 'tl-dot';
                                                        }
                                                        ?>"></div>
                                                        <div class="tl-content">
                                                            <div class=""><?php if ($datastatus['status']=="finish") {
                                                                echo 'Sepatu Sudah Selesai';
                                                            } else {
                                                                echo $datastatus['status'];
                                                            }
                                                             ?></div>
                                                            <div ><small><?php echo $hari . ', ' . $tanggal ?></small></div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label class="display-block"> Status Pencucian</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="blog_active" value="Sepatu Dalam Proses Pencucian">
                                                    <label class="form-check-label" for="blog_active">Sepatu Dalam Proses Pencucian</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="blog_active" value="Sepatu Dalam Proses Pengeringan">
                                                    <label class="form-check-label" for="blog_active">Sepatu Dalam Proses Pengeringan</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="blog_active" value="Sepatu Dala Proses Packing">
                                                    <label class="form-check-label" for="blog_active">Sepatu Dala Proses Packing</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="blog_active" value="finish">
                                                    <label class="form-check-label" for="blog_active">Sepatu Sudah Selesai</label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        </div>
                                        <a href="./dataSepatu.php" class="btn btn-warning text-white">Kembali</a>
                                        <button class="btn btn-primary " style="float: right;">Save</button>
                                </form>
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
    <!-- data tabel -->
    <script src="./assets/data-table/js/jquery.dataTables.min.js"></script>
    <script src="./assets/data-table/js/datatables.init.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/raphael/raphael.min.js"></script>
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/js/chart.morris.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>