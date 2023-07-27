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
                            <h3 class="page-title mt-3">Tambah Data Sepatu</h3>
                            <!-- <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Data Kategori Obat Page</li>
                            </ul> -->
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 ">
                    <?php
                        if (isset($_SESSION['status-info'])) {
                            echo '
                            <div
                            class="alert alert-success alert-dismissible fade show"
                            role="alert"
                            >
                            <strong>Success!</strong> 
                            <a href="#" class="alert-link">message</a>' . $_SESSION['status-info'] . '
                            <button
                                type="button"
                                class="close"
                                data-dismiss="alert"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
                            unset($_SESSION['status-info']);
                        }
                        if (isset($_SESSION['status-fail'])) {
                            echo '<div
                            class="alert alert-danger alert-dismissible fade show"
                            role="alert"
                          >
                            <strong>Fail!</strong> 
                            <a href="#" class="alert-link">message</a>' . $_SESSION['status-fail'] . '
                            <button
                              type="button"
                              class="close"
                              data-dismiss="alert"
                              aria-label="Close"
                            >
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>';
                            unset($_SESSION['status-fail']);
                        }
                        ?>
                        <div class="card rounded flex-fill">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form method="POST" action="./controller/sepatu/add.php" enctype="multipart/form-data">
                                            <?php
                                            // getDataPemesanan
                                            $getData = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id = '$id'");
                                            
                                            $cekData = mysqli_num_rows($getData);
                                            
                                            if ($cekData > 0) {
                                                
                                                while ($dataPemesanan = mysqli_fetch_array($getData)) {
                                                
                                            ?>
                                             <div class="row formtype">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nama Pemilik</label>
                                                        <input class="form-control" type="text" name="nama_pemilik" value="<?php echo $dataPemesanan['nama_pemesan']?>" >
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
                                                        <label>Email</label>
                                                        <input class="form-control" type="text" name="email_pemesan" value="<?php echo $dataPemesanan['email_pemesan']?>">
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
                                                        <label>Role</label>
                                                        <select class="form-control" name="jenis_layanan">
                                                            <option>Pilih</option>
                                                            <?php
                                                            $ambildataService = mysqli_query($conn, "SELECT * FROM service");
                                                            while ($dataService = mysqli_fetch_array($ambildataService)) {
                                                            ?>
                                                                <option value="<?php echo $dataService['id'] ?>" <?php if ($dataPemesanan['layana_id']== $dataService['id']) {
                                                                    echo 'selected';
                                                                }?>><?php echo ucwords($dataService['judul']) ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="display-block"> Status</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="blog_active" value="Sepatu Dalam Proses Antrian" checked>
                                                        <label class="form-check-label" for="blog_active">Sepatu Dalam Proses Antrian</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="blog_inactive" value="Sepatu Dalam Proses Pencucian">
                                                        <label class="form-check-label" for="blog_inactive">
                                                            Sepatu Dalam Proses Pencucian
                                                        </label>
                                                    </div>
                                                </div>
                                                </div>
                                            <?php }?>
                                            <?php }else{?>
                                                <div class="row formtype">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nama Pemilik</label>
                                                        <input class="form-control" type="text" name="nama_pemilik" value="" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>NO HP Pemilik</label>
                                                        <input class="form-control" type="text" name="no_hp_pemilik" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Jenis Sepatu</label>
                                                        <input class="form-control" type="text" name="jenis_sepatu" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Warna</label>
                                                        <input class="form-control" type="text" name="warna" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Layanan</label>
                                                        <select class="form-control" name="jenis_layanan">
                                                            <option>Pilih</option>
                                                            <?php
                                                            $ambildataService = mysqli_query($conn, "SELECT * FROM service");
                                                            while ($dataService = mysqli_fetch_array($ambildataService)) {
                                                            ?>
                                                                <option value="<?php echo $dataService['id'] ?>" ><?php echo ucwords($dataService['judul']) ?>| Rp <?php echo number_format($dataService['harga'], 0, ',', '.') ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="display-block">Blog Status</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="blog_active" value="Sepatu Dalam Proses Antrian" checked>
                                                        <label class="form-check-label" for="blog_active">Sepatu Dalam Proses Antrian</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="blog_inactive" value="Sepatu Dalam Proses Pencucian">
                                                        <label class="form-check-label" for="blog_inactive">
                                                            Sepatu Dalam Proses Pencucian
                                                        </label>
                                                    </div>
                                                </div>
                                                </div>
                                            <?php }?>
                                            <a href="./dataSepatu.php" class="btn btn-warning text-white">Kembali</a>
                                            <button class="btn btn-primary " style="float: right;">Save</button>
                                            <div class="row">
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