<?php 
include "head.php";
?>
</head> 
 <?php
 $sql_pemilik=mysql_query("SELECT * FROm data_pemilik where id_user='$id_user'");
 $aray_sql=mysql_fetch_array($sql_pemilik);
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
				<label class="col-md-2 control-label">Nama Pemilik</label>
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
				<label class="col-md-2 control-label">Alamat</label>
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
				<label class="col-md-2 control-label">No.Telepon</label>
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
				<label class="col-md-2 control-label">No.KTP</label>
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