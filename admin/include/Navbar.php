<div class="header">
			<div class="header-left">
				<a href="index.php" class="logo"> <img src="" width="50" height="70" alt="logo"> <span class="logoclass"> </span> </a>
				<a href="index.php" class="logo logo-small"> <img src="assets/img/logo-biru.png" alt="Logo" width="30" height="30"> </a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
			<!-- <a href="#" id="toggle_btn"> Rumah Sakit </a> -->
			<!-- <a href="" style=""></a> -->
			<a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
			
				<h2 style="align-items:center; color:#009688; display:inline-flex; float:left; font-size:30px;height: 77px; justify-content:center; margin: left 15px; padding:0 15px;">Shoes Laundry</h2>
			<ul class="nav user-menu">
				
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="assets/img/img-profile/<?php echo $_SESSION['photo']?>" width="31" alt="Soeng Souy"></span> </a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm"> <img src="assets/img/img-profile/<?php echo $_SESSION['photo']?>" alt="User Image" class="avatar-img rounded-circle"> </div>
							<div class="user-text">
								<h6><?php echo $_SESSION['nama']?></h6>
								<p class="text-muted mb-0"><?php echo $_SESSION['level']?></p>
							</div>
						</div> <a class="dropdown-item" href="profile.php">My Profile</a> <a class="dropdown-item" href="logout.php">Logout</a> </div>
				</li>
			</ul>
		</div>