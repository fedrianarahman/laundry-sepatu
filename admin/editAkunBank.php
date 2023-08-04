<?php
session_start();
if (!isset($_SESSION['nama'])) {
    header("Location: ./auth/login.php");
    exit();
}
include './controller/conn.php';
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Data Bank</title>
    <?php include './include/iconWeb.php' ?>
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
                            <h3 class="page-title mt-3">Tambah Akun Bank</h3>
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
                                        <form method="POST" action="./controller/bank/update.php" enctype="multipart/form-data">
                                            <?php
                                            $getData = mysqli_query($conn, "SELECT * FROM bank WHERE id ='$id'");
                                            while ($dataBank = mysqli_fetch_array($getData)) {
                                            ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label>Photo Bank</label>
                                                            <input type="file" class="form-control input-default " name="photo">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label>Nama Bank</label>
                                                            <input hidden type="text" class="form-control input-default " placeholder="Nama Bank" name="id" value="<?php echo $dataBank['id'] ?>">
                                                            <input hidden type="text" class="form-control input-default " placeholder="Nama Bank" name="created_at" value="<?php echo $dataBank['created_at'] ?>">
                                                            <input hidden type="text" class="form-control input-default " placeholder="Nama Bank" name="old_photo" value="<?php echo $dataBank['photo'] ?>">
                                                            <input type="text" class="form-control input-default " placeholder="Nama Bank" name="nama_bank" value="<?php echo $dataBank['nama_bank'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label>Nama Pemilik</label>
                                                            <input type="text" class="form-control input-default " placeholder="Nama Pemilik" name="nama_pemilik" value="<?php echo $dataBank['nama_pemilik'] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label>No Rekening</label>
                                                            <input type="text" class="form-control input-default " placeholder="No Rekening" name="no_rekening" value="<?php echo $dataBank['no_rek'] ?>">
                                                        </div>
                                                    </div>

                                                </div>
                                            <?php } ?>
                                            <a href="./dataAkunBank.php" class="btn btn-warning text-white">Kembali</a>
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