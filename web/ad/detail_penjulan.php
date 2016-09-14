<?php 
error_reporting(0);
include "head.php";
include "../koneksi.php";
?>
				<div class="graphs">
					 <div class="xs tabls">
						<div class="bs-example5" data-example-id="contextual-table" style="padding:0px">
							<div class="row">
								<div class="col-md-3 grid_box1" style="background: #EFEFEF;padding: 15px;">
								<h4>Product</h4>
						<table class="table">
						  <tbody>
						  <?php 
						  $sql_penjualan=mysql_query("SELECT * FROM data_penjualan where id_penjualan='$_GET[id]'");
						  $aray_penjualan=mysql_fetch_array($sql_penjualan);
						  //Get data_pesanan
						  $i=1;
						  $sql_pesanan=mysql_query("SELECT * FROM data_pesanan where id_pesanan='$aray_penjualan[id_pesanan]'");
						  $hitung_data=mysql_num_rows($sql_pesanan);
						  $aray_pesanan=mysql_fetch_array($sql_pesanan);
						  	//Get data_pembeli
						  	$sql_pembeli=mysql_query("SELECT * FROM data_pembeli where email='$aray_pesanan[id_pembeli]'");
						  	$aray_pembeli=mysql_fetch_array($sql_pembeli);
						  	//Get data_produk
						  	$sql_produk=mysql_query("SELECT * FROM data_produk where id_produk='$aray_pesanan[id_produk]'");
						  	$aray_produk=mysql_fetch_array($sql_produk);

						?>
						<tr><td>ID Pesanan</td> <td>: PSN-00<?php echo $aray_pesanan['id_pesanan']?></td></tr>
						<tr><td>Nama Produk</td> <td>: <?php echo $aray_produk['nama_produk']?></td></tr>
						<tr><td>Harga</td> <td>: <?php echo $aray_penjualan['harga_penjualan']?></td></tr>
						<tr><td>Jumlah</td> <td>: <?php echo $aray_pesanan['jumlah']?></td></tr>
						<tr><td>Sub Total</td> <td>: <?php echo $sub=$aray_pesanan['jumlah']*$aray_penjualan['harga']?></td></tr>
						<tr><td>Status</td> 
						<?php if ($sub=$aray_pesanan['status']=='approve'){
							echo "<td>: <span class='label label-success'>Approved</span></td>";
							}else{
								echo "<td>:</td>";
								}?></tr>
						</tbody>
						</table>
						</div>

						<div class="col-md-3 grid_box1" style="padding: 15px;">
						<h4>Data Pembeli</h4>
						<center><img src="../img/<?php echo $aray_pembeli['foto']?>" id="foto"></center>
						<table class="table">
							<tr><td>Nama Pembeli</td><td>: <?php echo $aray_pembeli['nama_pembeli']?></td></tr>
							<tr><td>Alamat</td><td>: <?php echo $aray_pembeli['alamat']?></td></tr>
							<tr><td>Kontak</td><td>: <?php echo $aray_pembeli['no_tlp']?></td></tr>
							<tr><td>Status</td>
							<?php if ($aray_pembeli['status_pembeli']=='ok'){
							echo "<td>: <span class='label label-success'>Terverifikasi</span></td>";
							}else{
								echo "<td>:</td>";
								}?></tr>
						</table>
					  	</div>
					  	<div class="col-md-6 grid_box1" style="background: #EFEFEF;padding: 15px;">
					  	<h4>Buyer Location</h4>
					  	<iframe src="../gis/index.php?id=<?php echo $aray_pembeli['id_pembeli']?>" width="100%" height="300px" frameborder="0" style="border:0" scrolling="no" allowfullscreen></iframe>
					  	</div>
					  </div>
				</div>
			</div>
		</div>