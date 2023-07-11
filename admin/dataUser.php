<?php
    // $currentPage = 'dataUser';
    // $route = $_SERVER['REQUEST_URI'];
// Cek apakah sesi login telah diatur
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
                                <h4 class="card-title float-left mt-2">Data User</h4>
                                <a href="addUser.php" class="btn btn-primary float-right veiwbutton"><i class="fas mr-2 fa-plus"></i>Tambah data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-sm">
                                    <table class="table table-sm  table-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>photo</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>No HP</th>
                                                <th>Role</th>
                                                <th >Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                            //mengambil data user
                                            $query = mysqli_query($conn, "SELECT user.id As id_user,user.nama AS nama, user.email AS email, user.no_hp As no_hp, role.nama_role AS nama_role FROM user INNER JOIN role ON role.id = user.role");
                                            $i = 1;
                                            while ($data = mysqli_fetch_array($query)) {
                                           ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><span class="avatar avatar-sm mr-2"><img src="./assets/img/profiles/avatar-03.jpg" class="avatar-img rounded-circle" alt=""></span></td>
                                                <td><?php echo $data['nama']?></td>
                                                <td><?php echo $data['email']?></td>
                                                <td><?php echo $data['no_hp']?></td>
                                                <td><?php echo $data['nama_role']?></td>
                                                <td >
                                                <a href="editUser.php?id=<?php echo $data['id_user']?>" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="./controller/user/delete.php?id=<?php echo $data['id_user']?>" class="btn btn-danger" data-toggle="tooltip" title="delete"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                           <?php $i++?>
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
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/raphael/raphael.min.js"></script>
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/js/chart.morris.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>