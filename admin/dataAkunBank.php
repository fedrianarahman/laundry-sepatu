<?php
session_start();
include './controller/conn.php';
if (!isset($_SESSION['nama'])) {
    header("Location: ./auth/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Data Akun Bank</title>
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
                        <div class="col-sm-12 mt-5">
                            <?php include './include/welcomeText.php'?>
                            
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
                            <a href="#" class="alert-link">message</a>' .$_SESSION['status-info']. '
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
                            <a href="#" class="alert-link">message</a>'.$_SESSION['status-fail'].'
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
                        <div class="card card-table flex-fill">
                            <div class="card-header ">
                                <h4 class="card-title float-left mt-2">Data Akun Bank</h4>
                                <a href="addAkunBank.php" class="btn btn-primary float-right veiwbutton"><i class="fas mr-2 fa-plus"></i>Tambah data</a>
                                <!-- <button type="button" class="btn btn-primary float-right veiwbutton"></button> -->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-sm">
                                    <table class="table table-sm  table-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Nama Bank</th>
                                                <th>Nama Pemilik</th>
                                                <th>Nomor Rekening</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ambilDataBank = mysqli_query($conn, "SELECT * FROM bank");
                                            $i = 1;
                                            while ($dataBank  = mysqli_fetch_array($ambilDataBank)) {

                                            ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><img src="./assets/img/image-bank/<?php echo $dataBank['photo'] ?>" alt="" width="50"></td>
                                                    <td><?php echo $dataBank['nama_bank']?></td>
                                                    <td><?php echo $dataBank['no_rek']?></td>               
                                                    <td><?php echo $dataBank['nama_pemilik']?></td>
                                                    <td>
                                                        <a href="./editAkunBank.php?id=<?php echo $dataBank['id']?>" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                                        <a href="./controller/bank/delete.php?id=<?php echo $dataBank['id']?>" class="btn btn-danger" data-toggle="tooltip" title="delete"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $i++ ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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