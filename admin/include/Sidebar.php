<?php
$route = basename($_SERVER['PHP_SELF']);
print_r($route)
?>


<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="active"> <a href="index.php"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
						<li class="list-divider"></li>
						<li> <a href="dataService.php"><i class="fas fa-tools"></i> <span>Service</span></a> </li>
						<li class="list-divider"></li>
						<li> <a href="dataPemesanan.php"><i class="fas fa-suitcase"></i> <span>Data Pesanan</span></a> </li>
						<li class="list-divider"></li>
						<li> <a href="dataSepatu.php"><i class="fas fa-shoe-prints"></i> <span>Sepatu</span></a> </li>
						<li> <a href="dataAkunBank.php"><i class="fas fa-money-check"></i> <span>Akun Bank</span></a> </li>
						<li class="list-divider"></li>
						<?php
						if ($_SESSION['level'] == 'admin') {
							
						?>
						<li class="submenu"> <a href="#" class=""><i class="fas fa-user"></i> <span> User </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="<?php if($route ==='dataRole.php'|$route ==='dataUser.php') echo'display:block;'?>">
								<li>
									<a 
									class="<?php if ($route==='dataUser.php') {
										# code...
										echo 'active';
									} else {
										# code...
										echo '';
									}
									?>"
									href="dataUser.php"> Data user 

									</a>
								</li>
								<li><a href="dataRole.php" class="<?php if ($route==='dataRole.php') {
										# code...
										echo 'active';
									} else {
										# code...
										echo '';
									}
									?>"> Data Role</a></li>
								
							</ul>
						</li>
						<?php }?>
						
					</ul>
				</div>
			</div>
		</div>