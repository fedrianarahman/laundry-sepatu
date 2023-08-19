<?php
$route = basename($_SERVER['PHP_SELF']);
?>
<style>
  .btn-custom{
    background-color: #72A4A5;
    color: white;
    box-shadow: 0px 4px 16px 0px rgba(114, 164, 165, 0.35);
  }
  
</style>
<nav
        class="navbar navbar-expand-lg justify-content-between  shadow-sm bg-transparent  fixed-top mb-4"
      >
        <div class="container">
          <a class="navbar-brand" href="#"><img src="./assets/img/logo.png" width="50px" alt=""></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link <?php if ($route==='index.php') {
										# code...
										echo 'active';
									} else {
										# code...
										echo '';
									}
									?>" href="index.php">Beranda </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if ($route==='about.php') {
										# code...
										echo 'active';
									} else {
										# code...
										echo '';
									}
									?>" href="./about.php">Tentang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if ($route==='service.php') {
										# code...
										echo 'active';
									} else {
										# code...
										echo '';
									}
									?>" href="./service.php">Layanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if ($route==='contact.php') {
										# code...
										echo 'active';
									} else {
										# code...
										echo '';
									}
									?>" href="./contact.php">Kontak Kami</a>
              </li>
             <?php
             if (!empty($_SESSION['nama'])) {
            ?>
            <li class="nav-item ">
              <a class="nav-link  <?php if ($route==='profile.php') {
										# code...
										echo 'active';
									} else {
										# code...
										echo '';
									}
									?>" href="./profile.php">Profile</a>
              </li>
            <?php }?>
            </ul>
            <?php
          if (!empty($_SESSION['nama'])) {
            
              echo '<a class="btn btn-custom" href="./logout.php">Logout</a>';
          } else {
            echo '<a class="btn btn-custom" href="./auth/login.php">Masuk</a>';
          }
          
          ?>
            
          </div>
        </div>
      </nav>