<?php 
include "head.php";
?>
</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <?php include "sidebar.php";?>
    
    <!-- main content start-->
		<div class="main-content main-content4" id="wrapper">
			<?php 
			include "notifikasi.php";
			?>
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Sales Data</h3>
					<div class="switches">
			<?php
			error_reporting(0);
			$sql_pemilik=mysql_query("SELECT * FROM data_penjual where id_penjual='$id_user'");
			$arr=mysql_fetch_array($sql_pemilik);
			$show = explode(',', $arr['dashboard']);
			if ($show[2]=="1"){
			?>
			<div class="col-4">
			<?php
			$sql_pending=mysql_query("SELECT * FROM data_penjualan where status=''");
			$banyak_pending=mysql_num_rows($sql_pending);
			$sql_terjual=mysql_query("SELECT * FROM data_penjualan where status!=''");
			$banyak_terjual=mysql_num_rows($sql_terjual);
			?>
				<div class="col-md-4 switch-right">
					<div class="switch-right-grid">
						<div class="switch-right-grid1">
							<h3>Status Penjualan</h3>
							<p>Penjualan untuk Minggu ini</p>
							<ul>
								<li>Terjual: <?php echo $banyak_terjual ?> </li>
								<li>Pending: <?php echo $banyak_pending ?> </li>
								<li>Total: <?php echo $banyak_pending+$banyak_terjual ?></li>
							</ul>
						</div>
					</div>
					<div class="sparkline">
						<canvas id="line" height="150" width="480" style="width: 480px; height: 150px;"></canvas>
							<script>
									var lineChartData = {
										labels : ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],
										datasets : [
											{
												fillColor : "#fff",
												strokeColor : "#F44336",
												pointColor : "#fbfbfb",
												pointStrokeColor : "#F44336",
												data : [20,35,45,30,10,65,40]
											}
										]
										
									};
									new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
							</script>
					</div>
				</div>
				<div class="col-md-4 switch-right">
							<div class="stats-info stats-info1">
								<div class="panel-heading">
									<h4 class="panel-title">Product Sold</h4>
								</div>
								<div class="panel-body panel-body2">
									<ul class="list-unstyled">
								<?php
									$sql_penjualan=mysql_query("SELECT * FROM data_penjualan where id_toko='$id_toko' limit 5");
						  			$i=1;
						  			$total=0;
						  			while($aray_penjualan=mysql_fetch_array($sql_penjualan)){
						  			$sql_pesanan=mysql_query("SELECT * FROM data_pesanan where id_pesanan='$aray_penjualan[id_pesanan]' group by id_produk");
						  			$hitung_produk=mysql_num_rows($sql_pesanan);
						  			$aray_pesanan=mysql_fetch_array($sql_pesanan);
						  				//Get data_produk
						  				$sql_produk=mysql_query("SELECT * FROM data_produk where id_produk='$aray_pesanan[id_produk]'");
						  				$aray_produk=mysql_fetch_array($sql_produk);

								?>
										<li><?php echo $aray_produk['nama_produk']?><div class="text-success pull-right"><?php echo $hitung_produk?><i class="fa fa-level-up"></i></div></li>
									<?php $i++; }?>
									</ul>
								</div>
							</div>
						</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<br/>
		<?php }?>
					 <div class="xs tabls">
						<div class="bs-example4" data-example-id="contextual-table">
						<table class="table">
						  <thead>
							<tr>
							  <th>No</th>
							  <th>Date</th>
							  <th>Sale ID</th>
							  <th>Buyer Name</th>
							  <th>Product Name</th>
							  <th>Price</th>
							  <th>Amount</th>
							  <th>Sub Total</th>
							  <th>Status</th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
						  <?php 
						//Navigation
						$BatasAwal = 5;
						if (!empty($_GET['page'])) {
							$hal = $_GET['page'] - 1;
							$MulaiAwal = $BatasAwal * $hal;
						} else if (!empty($_GET['page']) and $_GET['page'] == 1) {
							$MulaiAwal = 0;
						} else if (empty($_GET['page'])) {
							$MulaiAwal = 0;
						};
						//Get data_pesanan
						  $sql_penjualan=mysql_query("SELECT * FROM data_penjualan WHERE id_toko='$id_toko' order by tanggal_penjualan DESC LIMIT $MulaiAwal , $BatasAwal");
						  $hitung_data=mysql_num_rows($sql_penjualan);
						  $i=1;
						  $total=0;
						  while($aray_penjualan=mysql_fetch_array($sql_penjualan)){
						  $sql_pesanan=mysql_query("SELECT * FROM data_pesanan where id_pesanan='$aray_penjualan[id_pesanan]'");
						  $aray_pesanan=mysql_fetch_array($sql_pesanan);
						  	//Get data_pembeli
						  	$sql_pembeli=mysql_query("SELECT * FROM data_pembeli where email='$aray_pesanan[id_pembeli]'");
						  	$aray_pembeli=mysql_fetch_array($sql_pembeli);
						  	//Get data_produk
						  	$sql_produk=mysql_query("SELECT * FROM data_produk where id_produk='$aray_pesanan[id_produk]'");
						  	$aray_produk=mysql_fetch_array($sql_produk);

						  	if($i%2==0){
								echo "<tr class='info'>";
							}else{
								echo "<tr>";
							};
						$date=date_create($aray_penjualan['tanggal_penjualan']);
						?>
							  <th scope="row"><?php echo $i+$MulaiAwal?></th>
							  <td><?php echo date_format($date,'D, d/m/y - H:i')?></td>
							  <td>PJN-00<?php echo $aray_penjualan['id_penjualan']?></td>
							  <td><?php echo $aray_pembeli['nama_pembeli']?></td>
							  <td><?php echo $aray_produk['nama_produk']?></td>
							  <td>Rp <?php echo number_format($aray_penjualan['harga_penjualan'])?></td>
							  <td><?php echo $aray_pesanan['jumlah']?></td>
							  <td>Rp <?php echo $sub=$aray_pesanan['jumlah']*$aray_penjualan['harga_penjualan']?>
				<?php if ($aray_penjualan['status_penjualan']==''){
						echo "<td><span class='label label-warning'>Not Delivered</span></td>";
					}else{
						echo "<td><span class='label label-success'>Delivered</span></td>";
					}?>
							  <td><a href="#" class="tooltipp detail<?php echo $i?>" title="Sale Detail"><h3 style="margin-bottom:0px"><span class="lnr lnr-magnifier"></span></a>
							  <script>
							  	$('.detail<?php echo $i?>').confirm({
							  					keyboardEnabled: true,
                                            	columnClass: 'col-md-12',
                                                content: 'url:detail_penjulan.php?id=<?php echo $aray_penjualan[id_penjualan]?>',
                                                title: "Sale Detail",
                                                confirmButton: false,
                                    			cancelButtonClass: 'btn-danger',
                                    			cancelButton: 'Tutup',
                                    			animation: 'scale',
                                    			animationClose: 'top',
                                   			 	opacity: 0.5,
                                      		});
							  </script>
							  <?php
							  if ($aray_penjualan['status_penjualan']==''){ 
							  ?>
							  <a href="proses/approve_kiriman.php?id=<?php echo $aray_penjualan['id_penjualan']?>&toko=<?php echo $id_toko?>" class="tooltipp" title="Product Delivered"><span class="lnr lnr-thumbs-up" style="color:green"></span></a>
							  <?php } ?>
							  </h4>
							  </td>
							</tr>
							<?php $i++;
								  $total=$total+$sub;}
							if ($hitung_data==0){
								echo "<div class='alert alert-danger' role='alert'>
							<strong>Sorry</strong> Your sales data empty</div>";
								};
							?>
						  </tbody>
						</table>
						<table>	<tr>	<td><td>
										<td><h4>Sales Total : Rp <?php echo number_format($total)?></h4></td>
								</tr>
						</table>
						<?php
							$cek_data = mysql_query("SELECT * FROM data_penjualan WHERE id_toko='$id_toko'");
							$jumlahData = mysql_num_rows($cek_data);
							if ($jumlahData > $BatasAwal) {
								echo '<nav><ul class="pagination">';
								$ju=round($jumlahData/$BatasAwal);
								$a = explode(".", $jumlahData / $BatasAwal);
								$b = $a[0];
								$c = $b + 1;
								echo '<li class="disabled"><a href="../web/data_penjualan.php" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li>';
								for ($i = 1; $i <= $ju; $i++) {
									if ($_GET['page'] == $i) {
										echo '<li class="active"> <a';
									}else if ($_GET['page'] == null and $i==1) {
										echo '<li class="active"> <a';
									}else {
										echo '<li><a ';
									}
									echo ' href="../web/data_penjualan.php?page=' . $i . '">' . $i . ' <span class="sr-only">(current)</span></a></li>';
								}
								echo '</ul></nav>';
							}
						?>
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