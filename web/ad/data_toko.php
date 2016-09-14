<?php 
error_reporting(0);
include "head.php";
?>
<link rel="stylesheet" href="../css/normalize.css">
<link rel="stylesheet" href="../css/keyframes.css">
<link rel="stylesheet" href="../css/layout.css">
<link rel="stylesheet" href="../css/pageTransitions.css">
</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
    <?php include "sidebar.php";?>
    
    <!-- main content start-->
		<div class="main-content main-content4 m-scene" id="main">
			<?php 
			include "notifikasi.php";
			?>
			<div id="page-wrapper" class="scene_element scene_element--fadeinright">
				<div class="graphs">
					<h3 class="blank1">List Store</h3>
			<?php 
			if ($_GET['not']=="approve"){
								echo "<div class='alert alert-success' role='alert'>
							<strong>Approve Sukses</strong> Pesanan berhasil di Approve, segera lakukan pengiriman barang.
						   </div>";
								}
			?>
					 <div class="xs tabls">
						<div class="bs-example4" data-example-id="contextual-table">
						<table class="table">
						  <thead>
							<tr>
							  <th>No</th>
							  <th>Photo</th>
							  <th>Store ID</th>
							  <th>Store Name</th>
							  <th>Address</th>
							  <th>Phone</th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
						  <?php 
						  //Navigation
						$BatasAwal = 10;
						if (!empty($_GET['page'])) {
							$hal = $_GET['page'] - 1;
							$MulaiAwal = $BatasAwal * $hal;
						} else if (!empty($_GET['page']) and $_GET['page'] == 1) {
							$MulaiAwal = 0;
						} else if (empty($_GET['page'])) {
							$MulaiAwal = 0;
						};
						  $i=1;
						  $sql_toko=mysql_query("SELECT * FROM data_toko limit $MulaiAwal , $BatasAwal");
						  while($aray_toko=mysql_fetch_array($sql_toko)){

						  	$sql_pemilik=mysql_query("SELECT * FROM data_penjual where id_penjual='$aray_toko[id_pemilik]'");
						  	$aray_pemilik=mysql_fetch_array($sql_pemilik);

						  	if($i%2==0){
								echo "<tr class='info'>";
							}else{
								echo "<tr>";
							}
						?>
							  <th scope="row"><?php echo $i?></th>
							  <th><img src="http://localhost/andro/penjual/uploads/<?php echo $aray_toko['foto_toko']?>" width="50px"></th>
							  <td>TK-00<?php echo $aray_pemilik['id_penjual']?></td>
							  <td><?php echo $aray_toko['nama_toko']?></td>
							  <td><?php echo $aray_pemilik['alamat_penjual']?></td>
							  <td>+62<?php echo $aray_pemilik['telp_penjual']?></td>
							  <td><a href="#" class="tooltipp detail<?php echo $i?>" title="Detail"><h3 style="margin-bottom:0px"><span class="lnr lnr-magnifier"></span></a>
							  <script>
							  	$('.detail<?php echo $i?>').confirm({
							  					keyboardEnabled: true,
                                            	columnClass: 'col-md-12',
                                                content: 'url:detail_pembeli.php?id=<?php echo $aray_pemilik[id_pemilik]?>',
                                                title: false,
                                                confirmButton: false,
                                    			cancelButtonClass: 'btn-danger',
                                    			cancelButton: 'Close',
                                    			animation: 'scale',
                                    			animationClose: 'top',
                                   			 	opacity: 0.5,
                                      		});
							  </script>
							  <a href="#" class="tooltipp blacklist" title="Blacklist"><span class="lnr lnr-circle-minus" style="color:red"></span></h3></a>
							  </td>
							</tr>
							<?php $i++;};
							?>
						  </tbody>
						</table>
						<?php
							$cek_data = mysql_query("SELECT * FROM data_toko");
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
									echo ' href="data_toko.php?page=' . $i . '">' . $i . ' <span class="sr-only">(current)</span></a></li>';
								}
								echo '</ul></nav>';
							}
						?>
					   </div>
					  </div>
				</div>
			</div>
		</div>
		<script>
		$('.blacklist').confirm({
           	content: "Are you sure <b>BLACKLIST</b> this store ?",
           	title: "Confirmation",
           	confirmButton: 'Sure',
  			confirmButtonClass: 'btn-info',
  			cancelButton: 'Cancel',
  			cancelButtonClass: 'btn-danger',
  			icon: 'fa fa-question-circle',
  			animation: 'scale',
 			animationClose: 'top',
   			opacity: 0.5,
       	});</script>
		<?php include "../footer.php";?>
	</section>
<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script src="../js/jquery.smoothState.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/jquery.nicescroll.js"></script>
<script src="../js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>