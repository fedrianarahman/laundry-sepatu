
<?php
session_start();
include '../controller/conn.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cekDataUser = mysqli_query($conn, "SELECT user.id AS id_user, user.nama AS nama_user, user.email AS email_user, user.no_hp AS no_hp_user, user.photo AS photo_user, user.username AS username_user, user.password AS password_user,user.created_at AS created_at ,role.nama_role AS role_user FROM user INNER JOIN role ON role.id = user.role");

    $loggedIn = false; // Flag untuk menandakan status login

    while ($result = mysqli_fetch_array($cekDataUser)) {
        if ($username == $result['username_user'] && $password == $result['password_user']) {
            $loggedIn = true;
            $_SESSION['nama'] = $result['nama_user'];
            $_SESSION['email'] = $result['email_user'];
            $_SESSION['no_hp'] = $result['no_hp_user'];
            $_SESSION['level'] = $result['role_user'];
            $_SESSION['username'] = $result['username_user'];
			$_SESSION['password'] = $result['password_user'];
			$_SESSION['photo'] = $result['photo_user'];
			$_SESSION['joined_at'] = $result['created_at'];
            break; // Keluar dari loop jika data ditemukan
        }
    }
    
    if ($loggedIn) {
        header("Location: ../index.php");
        exit();
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Hotel Dashboard Template</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/feathericon.min.css">
	<link rel="stylesheet" href="../assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="../assets/css/style.css"> </head>

<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left">
                        <img class="img-fluid" src="./../assets/img/logo-biru.png" alt="Logo">
                     </div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Login</h1>
							<p class="account-subtitle">Access to our dashboard</p>
							<?php
                                    if (isset($error)) : ?>
                                        <p style="color:red; font-style: italic; text-align: center;">username / password salah <?php echo $username?></p>

                                    <?php endif; ?>
							<form method="POST">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="username" name="username"> </div>
								<div class="form-group">
									<input class="form-control" type="password" placeholder="Password" name="password"> </div>
								<div class="form-group">
									<button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
								</div>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../assets/js/jquery-3.5.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/js/script.js"></script>
</body>

</html>