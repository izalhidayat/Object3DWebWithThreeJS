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
				<h3 class="blank1">Laporan Stok Produk</h3>
<?php 
include "koneksi.php";
/* Fetch result set from t_test table */
$data=mysql_query("SELECT * FROM grap");
?>
				<div class="grid_1">
								<div class="legend">
									<div id="os-Win-lbl">Gas LPG <span></span></div>
									<div id="os-Mac-lbl">Galon Aqua <span> 15%</span></div>
									<div id="os-Other-lbl">Beras<span>25%</span></div>
								 </div>

								<canvas id="pie" height="315" width="470" style="width: 470px; height: 315px;"></canvas>
								
								<script> 
								var myata=[
								<?php 
								while($info=mysql_fetch_array($data))
    							echo $das=$info['isi'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
								?>];

									var pieData = [
										{
											value: myata[0],
											color:"#8BC34A"
										},
										{
											value: myata[1],
											color:"#ef553a"
										},
										{
											value: myata[2],
											color:"#00ACED"
										}									
									];
									new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
								</script>
							</div>
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