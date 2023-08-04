<?php
session_start();
include '../controller/conn.php';

if (isset($_POST['login'])) {
    $nama = trim(strtolower($_POST['nama']));
    $email = $_POST['email'];
    $no_hp = $_POST['no_telpon'];
    $role = 4;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $created_at = date('Y-m-d H:i:s');

    // menambahkan data penyewa
    $query = mysqli_query($conn, "INSERT INTO `user`(`id`, `nama`, `email`, `no_hp`, `alamat`, `role`, `username`, `password`, `photo`, `created_at`, `updated_at`) VALUES ('','$nama','$email','$no_hp','','$role','$username','$password','','$created_at','')");

    if ($query) {
        $_SESSION['status-info'] = "Silahkan Masuk";
        header("Location:./login.php");
    }else{
        $_SESSION['status-fail'] = "Registrasi Gagal";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Registrasi</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo.png">
	<link rel="stylesheet" href="../admin/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../admin/assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="../admin/assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="../admin/assets/css/feathericon.min.css">
	<link rel="stylesheet" href="../admin/assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="../admin/assets/css/style.css"> </head>

<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left">
                        <img class="img-fluid" src="../admin/assets/img/logo.png" alt="Logo">
                     </div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1 class="mb-2">Regist</h1>
                            <?php
                                      if (isset($_SESSION['status-fail'])) {
                                        echo '<div class="alert alert-danger alert-dismissible fade show">
                                        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                        <strong>Error!</strong> '.$_SESSION['status-fail'].'.
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                    </div>';
                                        unset($_SESSION['status-fail']);
                                    }
                                    ?>
							<form method="POST">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Nama" name="nama"> 
                                </div>
								<div class="form-group">
									<input class="form-control" type="email" placeholder="Email" name="email"> 
                                </div>
								<div class="form-group">
									<input class="form-control" type="text" placeholder="NO HP" name="no_telpon"> 
                                </div>
								<div class="form-group">
									<input class="form-control" type="text" placeholder="username" name="username"> 
                                </div>
								<div class="form-group">
									<input class="form-control" type="password" placeholder="Password" name="password"> </div>
								<div class="form-group">
									<button class="btn btn-primary btn-block" type="submit" name="login">Regist</button>
								</div>
                                <div class="text-center dont-have">Already have an account? <a href="./login.php">Sign in</a></div>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../admin/assets/js/jquery-3.5.1.min.js"></script>
	<script src="../adminassets/js/popper.min.js"></script>
	<script src="../adminassets/js/bootstrap.min.js"></script>
	<script src="../adminassets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../adminassets/js/script.js"></script>
</body>

</html>