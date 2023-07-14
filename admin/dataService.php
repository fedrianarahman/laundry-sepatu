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
          <div class="row align-items-center">
            <div class="col">
              <div class="mt-5">
                <h4 class="card-title float-left mt-2">Service</h4> <a href="addService.php" class="btn btn-primary float-right veiwbutton">Add Service</a>
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

          <?php
          $ambilDataService = mysqli_query($conn, "SELECT * FROM service");
          while ($data = mysqli_fetch_array($ambilDataService)) {
          ?>
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">

              <div class="card p-4">
                <img class="card-img" width="50px" height="150px" src="./assets/img/image-content/<?php echo $data['photo'] ?>" alt="">

                <div class="card-body">
                  <h4 class="card-title text-center"><?php echo ucwords($data['judul']) ?></h4>
                  <p class="card-text mt-3 text-center"><?php echo $data['subJudul'] ?></p>
                  <p class="card-text mt-3 text-center">Rp <?php echo number_format($data['harga'], 0, ',', '.') ?></p>
                  <a href="./editService.php?id=<?php echo $data['id'] ?>" class="btn btn-info">Edit</a>
                  <a href="./controller/service/delete.php?id=<?php echo $data['id'] ?>" class="btn btn-danger">Hapus</a>
                </div>

              </div>
            </div>
          <?php } ?>
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