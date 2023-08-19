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
    <style>
        .badge-custom {
            background-color: #ecfae4;
            color: #68CF29;
            padding: 3px 10px;
        }

        .badge-custom-proses {
            background-color: #ffefee;
            color: #FF4C41;
            padding: 3px 10px;
        }

        .badge-custom-done {
            background-color: #fff0da;
            color: #FFAB2D;
            padding: 3px 10px;
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
                        <div class="col-sm-12 mt-5">
                            <?php include './include/welcomeText.php' ?>
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
                        <div class="card card-table flex-fill">
                            <div class="card-header ">
                                <h4 class="card-title float-left mt-2">Data Pencucian Selesai</h4>
                              
                                <!-- <button type="button" class="btn btn-primary float-right veiwbutton"></button> -->
                            </div>
                            <div class="card-body">
                              
                                <div class="table-responsive table-sm">
                                    <table id="example3" class="display " style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Pemilik</th>
                                                <th>Kode Sepatu</th>
                                                <th>NO HP</th>
                                                <th>Merk Sepatu</th>
                                                <th>Warna</th>
                                                <th>Jenis Layanan</th>
                                                <th>Status Sepatu</th>
                                                <th>Tanggal Pengambilan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $getDataSepatu = mysqli_query($conn, "SELECT p1.*, service.judul
                                            FROM progress_sepatu p1
                                            INNER JOIN service ON service.id = p1.jenis_layanan
                                            LEFT JOIN progress_sepatu p2 ON p1.kode_sepatu = p2.kode_sepatu AND p1.id < p2.id
                                            WHERE p2.id IS NULL AND p1.status_sepatu ='sudah diambil'");
                                            $i = 1;
                                            while ($dataSepatuSelesai = mysqli_fetch_array($getDataSepatu)) {
                                                
                                            ?>
                                           <tr>
                                                <td><?php echo $i++?></td>
                                                <td><span class="badge"><?php echo $dataSepatuSelesai['pemilik'] ?></span></td>
                                                <td><span class="badge"><?php echo $dataSepatuSelesai['kode_sepatu'] ?></span></td>
                                                <td><span class="badge"><?php echo $dataSepatuSelesai['no_hp_pemilik'] ?></span></td>
                                                <td><span class="badge"><?php echo $dataSepatuSelesai['merk_sepatu'] ?></span></td>
                                                <td><span class="badge"><?php echo $dataSepatuSelesai['warna'] ?></span></td>
                                                <td><span class="badge"><?php echo $dataSepatuSelesai['judul'] ?></span></td>
                                                <td> <span class="badge badge-custom"><?php echo $dataSepatuSelesai['status_sepatu'] ?></span></td>
                                                <td><span class="badge"><?php $tglPengambilan = strtotime($dataSepatuSelesai['updated_at']); echo date('d F Y', $tglPengambilan);  ?></span></td>
                                           </tr>
                                           <?php }?>
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