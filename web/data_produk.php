<?php 
include "head.php";
?>
</head> 
   
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
				<h3 class="blank1">My Product</h3>
				<?php 
					include "koneksi.php";
					$data=mysql_query("SELECT * FROM data_produk where id_toko='$id_toko'");
					$banyak_produk=mysql_num_rows($data);
				$sql_pemilik=mysql_query("SELECT * FROM data_penjual where id_penjual='$id_user'");
				$arr=mysql_fetch_array($sql_pemilik);
				$show = explode(',', $arr['dashboard']);
				if ($show[0]==1){
				?>
				<div class="col-md-6 widget_bottom_left">
							<div class="banner-bottom-video-grid-left">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
									  <h4 class="panel-title asd">
										<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										  <span class="lnr lnr-chevron-down"></span><i class="lnr lnr-chevron-up"></i><label>Cara Menambahkan Barang?</label>
										</a>
									  </h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									  <div class="panel-body panel_text">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
									  </div>
									</div>
								  </div>
								  <div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingTwo">
									  <h4 class="panel-title asd">
										<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										  <span class="lnr lnr-chevron-down"></span><i class="lnr lnr-chevron-up"></i><label>Syarat dan Ketentuan</label>
										</a>
									  </h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									   <div class="panel-body panel_text">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
									  </div>
									</div>
								  </div>
								   <div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingFive">
									  <h4 class="panel-title asd">
										<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
										  <span class="lnr lnr-chevron-down"></span><i class="lnr lnr-chevron-up"></i><label>Panduan Pengunaan Aplikasi<label>
										</label></label></a>
									  </h4>
									</div>
									<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
									   <div class="panel-body panel_text">
										Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
									  </div>
									</div>
								  </div>
								</div>
							</div>
						</div>

					<div class="col-md-6 widget_bottom_right">
							<div class="banner-bottom-video-grid-left">
								<canvas id="pie" height="315" width="470" style="width: 470px; height: 315px;background: #F8F8F8;"></canvas>
								
								<script> 
								var myata=[
								<?php 
								while($info=mysql_fetch_array($data))
    							echo $das[]=$info['berat'].',';
								?>];
									var warna=["#F44336","#8BC34A","#00ACED","#EFCE2D","#9358ac","#000"];
									var pieData = [
									<?php $i=0; while($i<$banyak_produk){ ?>
										{
											value: myata[<?php echo $i ?>],
											color: warna[<?php echo $i ?>]
										},
									 <?php $i++; }?>							
									];
									new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
								</script>
								<div class="legend">
									<?php $j=0;
										$warna=["#F44336","#8BC34A","#00ACED","#EFCE2D","#9358ac","#000"];
										$data_produk=mysql_query("SELECT * FROM data_produk where id_toko='$id_toko'");
										while($aray_produk=mysql_fetch_array($data_produk)){ ?>
											<div id="os-Win-lbl" style="border-left: <?php echo $warna[$j]?> solid 1em"><?php echo $aray_produk['nama_produk']?> <span><?php echo $das[$j]?></span></div>
									<?php $j++;}?>
								</div>
							</div>
					</div>
					</div>
				<?php }?>
				<iframe src="tabel_data_produk.php?id_toko=<?php echo $id_toko?>" width="100%" height="500px" style="border:none"></iframe>
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