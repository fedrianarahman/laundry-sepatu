<?php
session_start();
include './controller/conn.php';
// Cek apakah sesi login telah diatur
if (!isset($_SESSION['nama'])) {
	header("Location: ./auth/login.php");
	exit();
}
$idUser = $_SESSION['id_user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Profile|Admin</title>
	<?php include './include/iconWeb.php' ?>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/profile.css">
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
					<div class="page-header mt-5">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">

							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#per_details_tab">My Profile</a> </li>

								</ul>
							</div>
						</div>
						<div class="tab-content profile-tab-cont">
							<div class="tab-pane fade show active" id="per_details_tab">
								<div class="row">
									<div class="col-md-12">
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
										<div class="card">
											<div class="card-body">
												<form action="./controller/user/updateProfile.php" method="POST" enctype="multipart/form-data">
													<?php
													$getDataUser = mysqli_query($conn, "SELECT * FROM user INNER JOIN role ON role.id = user.role WHERE user.id = '$idUser'");
													while ($dataUser = mysqli_fetch_array($getDataUser)) {
													?>
														<div class="row align-items-center">
															<div class="col-auto ">
																<div class="picture-container">
																	<div class="picture">
																		<img src="./assets/img/img-profile/<?php echo $dataUser['photo']?>" class="picture-src " id="blah" title="">
																		<input type="file" id="wizard-picture" class="" onchange="readURL(this);" name="photo">
																	</div>
																	<h6 class="mt-2 pict-text">Choose Picture</h6>

																</div>
															</div>
															<div class="col ml-md-n2 profile-user-info">
																<h4 class="user-name mb-3"><?php echo $dataUser['nama'] ?></h4>
																<h6 class="text-muted mt-1"><?php echo $dataUser['nama_role'] ?></h6>

															</div>
															<div class="row">
																<div class="col-md-4">
																	<div class="form-group">
																		<label>Nama </label>
																		<input class="form-control" type="text" name="nama" value="<?php echo $dataUser['nama'] ?>">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label>Email </label>
																		<input class="form-control" type="text" name="email" value="<?php echo $dataUser['email'] ?>">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label>NO HP</label>
																		<input class="form-control" type="text" name="no_hp" value="<?php echo $dataUser['no_hp'] ?>">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label>username</label>
																		<input class="form-control" type="text" name="username" value="<?php echo $dataUser['username'] ?>">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label>Password</label>
																		<input class="form-control" type="password" name="password" value="<?php echo $dataUser['password'] ?>">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label>Joined at</label>
																		<input class="form-control" type="text" name="created_at" value="<?php echo $dataUser['created_at'] ?>">
																	</div>
																</div>
															</div>
															<button class="btn btn-warning text-white float-right">Save Changes</button>
														</div>
													<?php } ?>
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
		</script>
	</body>

</html>