<?php
session_start();
include './controller/conn.php';
// Cek apakah sesi login telah diatur
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
	<title>Dashboard</title>
	<?php include './include/iconWeb.php' ?>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<php ?>

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
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard <?php echo $_SESSION['level'] ?></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<a href="./dataUser.php">
								<div class="card board1 fill">
									<div class="card-body">
										<div class="dash-widget-header">
											<div>
												<?php
												$getDataUser = mysqli_query($conn, "SELECT * FROM user");
												$dataUser = mysqli_num_rows($getDataUser);
												?>
												<h3 class="card_widget_header"><?= $dataUser ?></h3>
												<h6 class="text-muted">Total user</h6>
											</div>
											<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><i class="fas fa-user"></i></span> </div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<a href="./dataAkunBank.php">
								<div class="card board1 fill">
									<div class="card-body">
										<div class="dash-widget-header">
											<?php
											$getdataBank = mysqli_query($conn, "SELECT * FROM bank");
											$dataBank = mysqli_num_rows($getdataBank);
											?>
											<div>
												<h3 class="card_widget_header"><?= $dataBank ?></h3>
												<h6 class="text-muted">Akun Bank</h6>
											</div>
											<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><i class="fas fa-money-check"></i></span> </div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<a href="./dataPemesanan.php">
								<div class="card board1 fill">
									<div class="card-body">
										<div class="dash-widget-header">
											<div>
												<?php
												$getDataPesanan = mysqli_query($conn, "SELECT * FROM pemesanan  WHERE status = 'P'");
												$dataPemesanan = mysqli_num_rows($getDataPesanan);
												?>
												<h3 class="card_widget_header"><?= $dataPemesanan ?></h3>
												<h6 class="text-muted">Pesanan</h6>
											</div>
											<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><i class="fas fa-suitcase"></i></span> </div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<a href="./dataSepatu.php">
								<div class="card board1 fill">
									<div class="card-body">
										<div class="dash-widget-header">
											<?php
											$getDataSepatu = mysqli_query($conn, "SELECT * FROM progress_sepatu WHERE status_sepatu='at store' GROUP BY id ASC");
											$dataSepatu = mysqli_num_rows($getDataSepatu);
											?>
											<div>
												<h3 class="card_widget_header"><?= $dataSepatu  ?></h3>
												<h6 class="text-muted">Sepatu</h6>
											</div>
											<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><i class="fas fa-shoe-prints"></i></span> </div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<a href="./dataService.php">
								<div class="card board1 fill">
									<div class="card-body">
										<div class="dash-widget-header">
											<?php
											$getDataLayanan = mysqli_query($conn, "SELECT * FROM service");
											$dataLayanan = mysqli_num_rows($getDataLayanan);
											?>
											<div>
												<h3 class="card_widget_header"><?= $dataLayanan  ?></h3>
												<h6 class="text-muted">Layanan</h6>
											</div>
											<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><i class="fas fa-tools"></i> </span> </div>
										</div>
									</div>
								</div>
							</a>
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