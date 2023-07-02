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
                                <h4 class="card-title float-left mt-2">Data Rolse User</h4>
                                <a href="addSepatu.php" class="btn btn-primary float-right veiwbutton"><i class="fas mr-2 fa-plus"></i>Tambah data</a>
                                <!-- <button type="button" class="btn btn-primary float-right veiwbutton"></button> -->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-sm">
                                    <table id="example3" class="display " style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Sepatu</th>
                                                <th>Pemilik</th>
                                                <th>NO HP</th>
                                                <th>Merk Sepatu</th>
                                                <th>Warna</th>
                                                <th>Jenis Layanan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ambilDataSepatu = mysqli_query($conn, " SELECT p1.*, service.judul
                                            FROM progress_sepatu p1
                                            INNER JOIN service ON service.id = p1.jenis_layanan
                                            LEFT JOIN progress_sepatu p2 ON p1.kode_sepatu = p2.kode_sepatu AND p1.id < p2.id
                                            WHERE p2.id IS NULL");
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($ambilDataSepatu)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $data['kode_sepatu'] ?></td>
                                                    <td><?php echo $data['pemilik'] ?></td>
                                                    <td><?php echo $data['no_hp_pemilik'] ?></td>
                                                    <td><?php echo $data['merk_sepatu'] ?></td>
                                                    <td><?php echo $data['warna'] ?></td>
                                                    <td><?php echo $data['judul'] ?></td>
                                                    <td>
                                                        <div class="actions">
                                                            <a href="detailProses.php?kode_spt=<?php echo $data['kode_sepatu'] ?>" class="
                                                            <?php
                                                            if ($data['status']=="finish") {
                                                                echo 'badge badge-danger text-white ';
                                                            } else {
                                                                echo 'badge badge-warning text-white ';
                                                            }
                                                            
                                                            ?>">
                                                                <?php
                                                                if ($data['status'] == 'finish') {
                                                                    echo "Finish !";
                                                                } else {
                                                                    echo "prosess";
                                                                } ?></a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="./editSepatu.php?id=<?php echo $data['kode_sepatu'] ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                                        <a href="./controller/role/delete.php?id=<?php echo $data['kode_sepatu'] ?>" class="btn btn-danger" data-toggle="tooltip" title="delete"><i class="fas fa-trash-alt"></i></a>
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