<?php 
include "head.php";
error_reporting(0);
?>
<link rel="stylesheet" type="text/css" href="style.css" />
</head> 
<?php 
//Get data_pesanan
$j=0;
$data_aray=["pending","cash"];
$totall=array();
while ($j<2){
	$sql_pembayaran=mysql_query("SELECT * FROM data_pembayaran where id_toko='$id_toko' AND status='$data_aray[$j]'");
	$hitung_data=mysql_num_rows($sql_pembayaran);
	$i=1;$total=0; 
		while($aray_pembayaran=mysql_fetch_array($sql_pembayaran)){						  
			$sql_penjualan=mysql_query("SELECT * FROM data_penjualan where id_penjualan='$aray_pembayaran[id_penjualan]'");
			$aray_penjualan=mysql_fetch_array($sql_penjualan);
			$sql_pesanan=mysql_query("SELECT * FROM data_pesanan where id_pesanan='$aray_penjualan[id_pesanan]'");
			$aray_pesanan=mysql_fetch_array($sql_pesanan);
			$subb=$aray_pesanan['jumlah']*$aray_penjualan['harga_penjualan'];
			$total=$total+$subb;
		}
	$totall[$j]=$total;
	$j++; 
}
?>
 <body class="sticky-header left-side-collapsed" >
     <section>
    <?php include "sidebar.php";?>
    
    <!-- main content start-->
		<div class="main-content main-content4" id="wrapper">
			<?php 
			include "notifikasi.php";
			?>
			<div id="page-wrapper">
			<div id="boxpopup" class="box">
</div>
				<div class="graphs">
					<h3 class="blank1">Payment</h3>

					<div class="widgets_top">
						<div class="col_3">
							<div class="col-md-3 widget widget1">
								<div class="r3_counter_box">
									<i class="fa fa-usd"></i>
									<div class="stats">
									  <h5><span>Rp </span><?php echo number_format($totall[0])?> <span>,-</span></h5>
									  <div class="grow grow2">
										<p>Deposit</p>
									  </div>
									</div>
								</div>
							</div>
							<div class="col-md-3 widget widget1">
								<div class="r3_counter_box">
									<i class="fa fa-mail-forward"></i>
									<div class="stats">
									  <h5><span>Rp </span><?php echo number_format($totall[1])?><span>,-</span></h5>
									  <div class="grow">
										<p>Paid</p>
									  </div>
									</div>
								</div>
							</div>
							<div class="col-md-3 widget widget1">
								<div class="r3_counter_box">
									<i class="fa fa-users"></i>
									<div class="stats">
									  <h5><span>Rp </span><?php echo number_format($totall[0]+$totall[1])?><span>,-</span></h5>
									  <div class="grow grow1">
										<p>Full Payment</p>
									  </div>
									</div>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					 <div class="xs tabls" style="margin-top: 20px;">
						<div class="bs-example4" data-example-id="contextual-table">
						<table class="table">
						  <thead>
							<tr>
							  <th>No</th>
							  <th>Payment ID</th>
							  <th>Sale ID</th>
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
						  $sql_pembayaran=mysql_query("SELECT * FROM data_pembayaran where id_toko='$id_toko' limit $MulaiAwal , $BatasAwal");
						  $hitung_data=mysql_num_rows($sql_pembayaran);
						  $i=1;
						  $total=0;
						  while($aray_pembayaran=mysql_fetch_array($sql_pembayaran)){						  
						  	$sql_penjualan=mysql_query("SELECT * FROM data_penjualan where id_penjualan='$aray_pembayaran[id_penjualan]'");
						  	$aray_penjualan=mysql_fetch_array($sql_penjualan);
						  	$sql_pesanan=mysql_query("SELECT * FROM data_pesanan where id_pesanan='$aray_penjualan[id_pesanan]'");
						  	$aray_pesanan=mysql_fetch_array($sql_pesanan);
						  	if($i%2==0){
								echo "<tr class='info'>";
							}else{
								echo "<tr>";
							}
						?>
							  <th scope="row"><?php echo $i?></th>
							  <td>PMB-00<?php echo $aray_pembayaran['id_bayar']?></td>
							  <td>PJN-00<?php echo $aray_pembayaran['id_penjualan']?></td>
							  <td>Rp <?php echo $sub=$aray_pesanan['jumlah']*$aray_penjualan['harga_penjualan']?>
							  <?php if ($aray_pembayaran['status']=='pending'){
							echo "<td><span class='label label-warning'>Pending</span></td>";
							}else{
								echo "<td><span class='label label-success'>Paid</span></td>";
								}?>
							  <td><a href="#" class="tooltipp" title="Payment Detail"><h3 style="margin-bottom:0px"><span class="lnr lnr-magnifier"></span></a></h3>
							  </td>
							</tr>
							<?php $i++;
								  $total=$total+$sub;}
							if ($hitung_data==0){
								echo "<div class='alert alert-danger' role='alert'>
							<strong>Mohon maaf</strong> Belum ada data pembayaran untuk Anda</div>";
								};
							?>
						  </tbody>
						</table>
						<?php
							$cek_data = mysql_query("SELECT * FROM data_pembayaran where id_toko='$id_toko'");
							$jumlahData = mysql_num_rows($cek_data);
							if ($jumlahData > $BatasAwal) {
								echo '<nav><ul class="pagination">';
								$ju=round($jumlahData/$BatasAwal);
								$a = explode(".", $jumlahData / $BatasAwal);
								$b = $a[0];
								$c = $b + 1;
								echo '<li class="disabled"><a href="../web/data_pesanan.php" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li>';
								for ($i = 1; $i <= $ju; $i++) {
									if ($_GET['page'] == $i) {
										echo '<li class="active"> <a';
									}else if ($_GET['page'] == null and $i==1) {
										echo '<li class="active"> <a';
									}else {
										echo '<li><a ';
									}
									echo ' href="data_pembayaran.php?page=' . $i . '">' . $i . ' <span class="sr-only">(current)</span></a></li>';
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