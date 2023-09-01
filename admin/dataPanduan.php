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
  <title>Data Panduan</title>
  <?php include './include/iconWeb.php' ?>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="assets/css/feathericon.min.css">
  <link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
  <link rel="stylesheet" href="assets/plugins/morris/morris.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .panduan{
        font-weight: bolder;
        font-size: 25px;
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
          <div class="row align-items-center">
            <div class="col">
              <div class="mt-5">
                <h4 class="card-title float-left mt-2">Panduan Pemesanan</h4> <a href="addPanduan.php" class="btn mt-2 btn-primary float-right veiwbutton">Tambah</a>
              </div>
            </div>
          </div>
        </div>
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card shadow-sm">
                            <div class="card-body mx-auto">
                                <p class="text-center panduan mb-4">Panduan</p>
                                <ul>
                              <?php
                              $getData = mysqli_query($conn, "SELECT * FROM panduan WHERE status='panduan' ORDER BY id ASC");
                              while ($dataPanduan = mysqli_fetch_array($getData)) {
                              ?>
                                    <li><?php echo $dataPanduan['judul'] ?><span><a href="./editPanduan.php?id=<?php echo $dataPanduan['id'] ?>" class="ml-4"><i class="fas fa-edit"></i></a><a href="./controller/panduan/delete.php?id=<?php echo $dataPanduan['id'] ?>" class="ml-2"><i class="fas fa-trash-alt"></i></a></span></li>
                                    <?php
                                }
                                ?>
                                </ul>
                                <p class="text-center text-danger panduan mb-4">Note</p>
                                <ul>
                                <?php
                                $getData = mysqli_query($conn, "SELECT * FROM panduan WHERE status='note' ORDER BY id ASC");
                                while ($dataPanduan = mysqli_fetch_array($getData)) {
                                  
                                ?>
                                    <li class="text-danger"><?php echo $dataPanduan['judul'] ?> <span><a href="./editPanduan.php?id=<?php echo $dataPanduan['id'] ?>" class="ml-4"><i class="fas fa-edit"></i></a><a href="./controller/panduan/delete.php?id=<?php echo $dataPanduan['id'] ?>" class="ml-2"><i class="fas fa-trash-alt"></i></a></span></li>
                                    <?php }?>
                                </ul>
                              
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