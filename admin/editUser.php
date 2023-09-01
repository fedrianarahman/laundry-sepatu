<?php
session_start();
include './controller/conn.php';
// Cek apakah sesi login telah diatur
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
    <title>Edit Data USer</title>
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
                            <h3 class="page-title mt-3">Edit Data User</h3>
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
                                        <form method="POST" action="./controller/user/update.php" enctype="mu">
                                           <?php
                                            // mengambil Data user berdasarkan id
                                            $ambilDataUser = mysqli_query($conn, "SELECT user.id AS id_user, user.nama AS nama_user, user.email AS email_user, user.no_hp As no_hp_user, user.username AS username, user.password AS password, user.role AS role, user.created_at as created_at FROM user INNER JOIN role ON role.id = user.role WHERE user.id = '$id'");
                                            while ($dataUser = mysqli_fetch_array($ambilDataUser)) {
                                           ?>
                                            <div class="row formtype">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input hidden class="form-control" type="text" name="id" value="<?php echo $dataUser['id_user']?>">
                                                        <input hidden class="form-control" type="text" name="created_at" value="<?php echo $dataUser['created_at']?>">
                                                        <input class="form-control" type="text" name="nama" value="<?php echo $dataUser['nama_user']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Emaill</label>
                                                        <input class="form-control" type="text" name="email" value="<?php echo $dataUser['email_user']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>No HP</label>
                                                        <input class="form-control" type="text" name="no_hp" value="<?php echo $dataUser['no_hp_user']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Role</label>
                                                        <select class="form-control" name="role">
                                                            <option>Pilih</option>
                                                            <?php
                                                            $ambildataRole = mysqli_query($conn, "SELECT * FROM role");
                                                            while ($dataRole = mysqli_fetch_array($ambildataRole)) {
                                                            ?>
                                                             <option value="<?php echo $dataRole['id']?>"
                                                              <?php
                                                              if ($dataUser['role']==$dataRole['id']) {
                                                                echo 'selected';
                                                              }
                                                             ?>><?php echo $dataRole['nama_role']?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input class="form-control" type="text" name="username" value="<?php echo $dataUser['username']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="form-control" type="password" name="password" value="<?php echo $dataUser['password']?>">
                                                    </div>
                                                </div>
                                            </div>
                                           <?php }?>
                                            <a href="./dataUser.php" class="btn btn-warning text-white">Kembali</a>
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