<!-- header-starts -->
			<div class="header-section">
			 
			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->

			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">  	
					<div class="profile_details_left">
						<ul class="nofitications-dropdown">
							<li class="login_box" id="loginContainer">
									<div class="search-box">
										<div id="sb-search" class="sb-search">
										</div>
									</div>
										<!-- search-scripts -->
										<script src="js/classie.js"></script>
										<script src="js/uisearch.js"></script>
											<script>
												new UISearch( document.getElementById( 'sb-search' ) );
											</script>
										<!-- //search-scripts -->
<audio id="soundHandle" style="display: none;"></audio>
<script>
  soundHandle = document.getElementById('soundHandle');
  soundHandle.src = 'suara.mp3';
</script>

<script>
 $(document).ready(function() {
     $("#is").load("response.php");
   var refreshId = setInterval(function() 
      {
      $("#is").load('response.php?randval='+ Math.random());
      }, 30000);// 5 menit sekali ngcek
                               });
</script>

							</li>
							<li class="dropdown" id="is">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i></a>
									<ul class="dropdown-menu">
										<li>
											<div class="notification_header">
												<h3>You dont have notification</h3>
											</div>
										</li>
									</ul>
							</li>
							<?php $sql_penjualan=mysql_query("SELECT * FROm data_penjualan where id_toko=$id_toko and status_penjualan=''");
										$cek_data_pending=mysql_num_rows($sql_penjualan);
										if ($cek_data_pending !=0){
							?>
							<li class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1"><?php echo $cek_data_pending ?></span></a>
									<ul class="dropdown-menu">
										<li>
											<div class="notification_header">
												<h3>Sedang Menunggu Proses</h3>
											</div>
										</li>
										
										<li><a href="data_penjualan.php">
												<div class="task-info">
												<span class="task-desc">Barang Belum Dikirim </span><span class="percentage"><?php echo $cek_data_pending ?></span>
												<div class="clearfix"></div>	
											   </div>
												<div class="progress progress-striped active">
												 <div class="bar yellow" style="width:<?php echo $cek_data_pending*5?>%;"></div>
											</div>
										</a></li>
									</ul>
							</li>
							<?php } ?>	   							   		
							<div class="clearfix"></div>	
						</ul>
					</div>
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span style="background:url(../images/1.jpg) no-repeat center"> </span> 
										 <div class="user-name">
											<p><?php echo $nama_user?><span>Admin</span></p>
										 </div>
										 <i class="lnr lnr-chevron-down"></i>
										 <i class="lnr lnr-chevron-up"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="pengaturan.php"><i class="fa fa-cog"></i> Settings</a> </li> 
									<li> <a href="#"><i class="fa fa-user"></i>Profile</a> </li> 
									<li> <a href="proses/logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>		
					<div class="clearfix"></div>
				</div>
			</div>
			<!--notification menu end -->
			</div>
	<!-- //header-ends -->