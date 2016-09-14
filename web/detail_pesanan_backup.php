<?php 
error_reporting(0);
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
					<h3 class="blank1">Pesanan Barang</h3>
				<a href="data_pesanan.php" class="tooltipp" title="Kembali"><h3><span class="lnr lnr-arrow-left-circle"></span></a>
				<a href="proses/approve_pesanan.php?id=<?php echo $aray_pesanan['id_pesanan']?>" class="tooltipp" title="Setujui Pesanan"><span class="lnr lnr-checkmark-circle" style="color: green;"></span></a>
				<a href="#" class="tooltipp" title="Tolak Pesanan"><span class="lnr lnr-cross-circle" style="color: red;"></span></a></h3>
					 <div class="xs tabls">
						<div class="bs-example5" data-example-id="contextual-table">
							<div class="row">
								<div class="col-md-3 grid_box1">
								<h4>Data Barang</h4>
						<table class="table">
						  <tbody>
						  <?php 
						  //Get data_pesanan
						  $i=1;
						  $sql_pesanan=mysql_query("SELECT * FROM data_pesanan where id_pesanan='$_GET[id]' AND status=''");
						  $hitung_data=mysql_num_rows($sql_pesanan);
						  $aray_pesanan=mysql_fetch_array($sql_pesanan);
						  	//Get data_pembeli
						  	$sql_pembeli=mysql_query("SELECT * FROM data_pembeli where id_pembeli='$aray_pesanan[id_pembeli]'");
						  	$aray_pembeli=mysql_fetch_array($sql_pembeli);
						  	//Get data_produk
						  	$sql_produk=mysql_query("SELECT * FROM data_produk where id_produk='$aray_pesanan[id_produk]'");
						  	$aray_produk=mysql_fetch_array($sql_produk);

						?>
						<tr><td>ID Pesanan</td> <td>: PSN-00<?php echo $aray_pesanan['id_pesanan']?></td></tr>
						<tr><td>Nama Produk</td> <td>: <?php echo $aray_produk['nama_produk']?></td></tr>
						<tr><td>Harga</td> <td>: <?php echo $aray_produk['harga']?></td></tr>
						<tr><td>Jumlah</td> <td>: <?php echo $aray_pesanan['jumlah']?></td></tr>
						<tr><td>Sub Total</td> <td>: <?php echo $sub=$aray_pesanan['jumlah']*$aray_produk['harga']?></td></tr>
						<tr><td>Status</td> 
						<?php if ($sub=$aray_pesanan['status']==''){
							echo "<td>: <span class='label label-warning'>Pending</span></td>";
							}else{
								echo "<td>:</td>";
								}?></tr>
						</tbody>
						</table>
						</div>

						<div class="col-md-3 grid_box1">
						<h4>Data Pembeli</h4>
						<center><img src="img/<?php echo $aray_pembeli['foto']?>" id="foto"></center>
						<table class="table">
							<tr><td>Nama Pembeli</td><td>: <?php echo $aray_pembeli['nama_pembeli']?></td></tr>
							<tr><td>Alamat</td><td>: <?php echo $aray_pembeli['alamat']?></td></tr>
							<tr><td>Kontak</td><td>: <?php echo $aray_pembeli['no_tlp']?></td></tr>
							<tr><td>Status</td>
							<?php if ($aray_pembeli['status']=='ok'){
							echo "<td>: <span class='label label-success'>Terverifikasi</span></td>";
							}else{
								echo "<td>:</td>";
								}?></tr>
						</table>
					  	</div>
					  	<div class="col-md-6 grid_box1">
					  	<h4>Lokasi Pembeli</h4>
					  	<iframe src="gis/index.php?id=<?php echo $aray_pembeli['id_pembeli']?>" width="100%" height="300px" frameborder="0" style="border:0" scrolling="no" allowfullscreen></iframe>
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