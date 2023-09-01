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
    <title> Edit Data Testimonial</title>
    <?php include './include/iconWeb.php' ?>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/feathericon.min.css">
    <link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .card-custom {
            max-width: 250px;
            position: relative;
            padding: 5px;
            border: 1px solid #ddd;
            margin: auto;
        }

        .card-custom img {
            width: 100%;
            object-fit: fill;
        }
    </style>
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
                            <h3 class="page-title mt-3">Tambah Data Testimonial</h3>
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
                                        <form method="POST" action="./controller/testimonial/update.php" enctype="multipart/form-data" >
                                            <?php
                                            $getData= mysqli_query($conn, "SELECT * FROM testimonial WHERE id = '$id'");
                                            while ($dataTestimonial = mysqli_fetch_array($getData)) {
                                                
                                            ?>
                                            <div class="row formtype">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="card-custom">
                                                            <img id="blah" src="./assets/img/testimonial/<?php echo $dataTestimonial['photo_before'] ?>" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="card-custom">
                                                            <img id="blah1" src="./assets/img/testimonial/<?php echo $dataTestimonial['photo_after'] ?>" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Photo Before</label>
                                                        <input class="form-control" type="file" name="photoBefore" onchange="readURL(this);">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Photo After</label>
                                                        <input class="form-control" type="file" name="photoAfter" onchange="readURL1(this);">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Sepatu</label>
                                                        <input class="form-control" type="text" name="nama_sepatu" value="<?php  echo $dataTestimonial['merk_sepatu'] ?>">
                                                        <input hidden class="form-control" type="text" name="id_testimonial" value="<?php  echo $dataTestimonial['id'] ?>">
                                                        <input hidden class="form-control" type="text" name="photo_before_old" value="<?php  echo $dataTestimonial['photo_before'] ?>">
                                                        <input hidden class="form-control" type="text" name="photo_after_old" value="<?php  echo $dataTestimonial['photo_after'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Layanan</label>
                                                        <select class="form-control" name="jenis_layanan">
                                                            <option>Pilih</option>
                                                            <?php
                                                            $ambildataService = mysqli_query($conn, "SELECT * FROM service");
                                                            while ($dataService = mysqli_fetch_array($ambildataService)) {
                                                            ?>
                                                                <option <?php if ($dataTestimonial['jenis_layanan']== $dataService['judul']) {
                                                                    echo 'selected';
                                                                } 
                                                                 ?> value="<?php echo $dataService['judul'] ?>" ><?php echo ucwords($dataService['judul'])?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                            <a href="./dataTestimonial.php" class="btn btn-warning text-white">Kembali</a>
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah1')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>