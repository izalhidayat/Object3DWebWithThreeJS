<?php 
include "head.php";
?>
</head> 
 <?php
 $sql_pemilik=mysql_query("SELECT * FROm data_pemilik where id_user='$id_user'");
 $aray_sql=mysql_fetch_array($sql_pemilik);
 $chart = explode(',', $aray_sql['dashboard']);
 ?>
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <?php include "sidebar.php";?>
    
    <!-- main content start-->
		<div class="main-content main-content4">
			<?php 
			include "notifikasi.php";
			?>
			<div id="page-wrapper">
				<div class="graphs">

 <div class="panel-body panel-body-inputin">
		<form role="form" class="form-horizontal" action="proses/setting.php" method="POST">
			<div class="form-group">
				<label class="col-md-2 control-label">Username</label>
				<div class="col-md-4">
					<div class="input-group input-icon right in-grp1">
						<span class="input-group-addon">
							<i class="fa fa-envelope-o"></i>
						</span>
						<input id="email" name="user" class="form-control1" type="text" placeholder="Username">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Password</label>
				<div class="col-md-4">
					<div class="input-group input-icon right in-grp1">
						<span class="input-group-addon">
							<i class="fa fa-key"></i>
						</span>
						<input type="password" name="password" class="form-control1" placeholder="Password">
						<input type="hidden" name="id_user" value="<?php echo $id_user?>">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="form-group">
				<label for="checkbox" class="col-md-2 control-label">Chart Page</label>
				<div class="col-md-8">`
				<?php 
				if ($chart[0]==1){
					echo '<div class="checkbox-inline"><label><input type="checkbox" name="produk" value="1" checked> Produk</label></div>';
				}else{
					echo '<div class="checkbox-inline"><label><input type="checkbox" name="produk" value="1" > Produk</label></div>';
				}

				if ($chart[1]==1){
					echo '<div class="checkbox-inline"><label><input type="checkbox" name="pesanan" value="1" checked> Pesanan</label></div>';
				}else{
					echo '<div class="checkbox-inline"><label><input type="checkbox" name="pesanan" value="1" > Pesanan</label></div>';
				}

				if ($chart[2]==1){
					echo '<div class="checkbox-inline"><label><input type="checkbox" name="penjualan" value="1" checked> Penjualan</label></div>';
				}else{
					echo '<div class="checkbox-inline"><label><input type="checkbox" name="penjualan" value="1" > Penjualan</label></div>';
				}
				?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8">`
				<center><input class="btn-success btn" type="submit" value="Simpan"></center>
				</div>
			</div>
		</form>
	</div>

				</div>
			</div>
		</div>
		<?php include "footer.php";?>
	</section>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>