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
					<h3 class="blank1">Buyer</h3>
			<?php 
			if ($_GET['not']=="approve"){
								echo "<div class='alert alert-success' role='alert'>
							<strong>Sucess </strong> Order succes to Approve
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
							  <th>Buyer ID</th>
							  <th>Buyer Name</th>
							  <th>Address</th>
							  <th>Contact</th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
						  <?php 
						  //Navigation
						$BatasAwal = 2;
						if (!empty($_GET['page'])) {
							$hal = $_GET['page'] - 1;
							$MulaiAwal = $BatasAwal * $hal;
						} else if (!empty($_GET['page']) and $_GET['page'] == 1) {
							$MulaiAwal = 0;
						} else if (empty($_GET['page'])) {
							$MulaiAwal = 0;
						};
						  //Get data_pesanan
						  $i=1;
						  $sql_pesanan=mysql_query("SELECT * FROM data_pesanan where id_toko='$id_toko' group by id_pembeli LIMIT $MulaiAwal , $BatasAwal");
						  $hitung_data=mysql_num_rows($sql_pesanan);
						  while($aray_pesanan=mysql_fetch_array($sql_pesanan)){
						  	//Get data_pembeli
						  	$sql_pembeli=mysql_query("SELECT * FROM data_pembeli where email='$aray_pesanan[id_pembeli]'");
						  	$aray_pembeli=mysql_fetch_array($sql_pembeli);

						  	if($i%2==0){
								echo "<tr class='info'>";
							}else{
								echo "<tr>";
							}
						?>
							  <th scope="row"><?php echo $i?></th>
							  <th><img src="img/<?php echo $aray_pembeli['foto']?>" width="50px"></th>
							  <td>PBL-00<?php echo $aray_pembeli['id_pembeli']?></td>
							  <td><?php echo $aray_pembeli['nama_pembeli']?></td>
							  <td><?php echo $aray_pembeli['alamat']?></td>
							  <td>+62<?php echo $aray_pembeli['no_tlp']?></td>
							  <td><a href="#" class="tooltipp detail<?php echo $i?>" title="Buyer Detail"><h3 style="margin-bottom:0px"><span class="lnr lnr-magnifier"></span></a>
							  <script>
							  	$('.detail<?php echo $i?>').confirm({
							  					keyboardEnabled: true,
                                            	columnClass: 'col-md-12',
                                                content: 'url:detail_pembeli.php?id=<?php echo $aray_pembeli[id_pembeli]?>',
                                                title: false,
                                                confirmButton: false,
                                    			cancelButtonClass: 'btn-danger',
                                    			cancelButton: 'Close',
                                    			animation: 'scale',
                                    			animationClose: 'top',
                                   			 	opacity: 0.5,
                                      		});
							  </script>
							  <a href="proses/approve_pesanan.php?id=<?php echo $aray_pesanan['id_pesanan']?>" class="tooltipp blacklist" title="Blacklist"><span class="lnr lnr-circle-minus" style="color:red"></span></h3></a>
							  </td>
							</tr>
							<?php $i++;};
							if ($hitung_data==0){
								echo "<div class='alert alert-danger' role='alert'>
							<strong>Sorry</strong> Your buyer data empty</div>";
								};
							?>
						  </tbody>
						</table>
						<?php
							$cek_data = mysql_query("SELECT * FROM data_pembeli where id_toko='$id_toko'");
							$jumlahData = mysql_num_rows($cek_data);
							if ($jumlahData > $BatasAwal) {
								echo '<nav><ul class="pagination">';
								$ju=round($jumlahData/$BatasAwal);
								$a = explode(".", $jumlahData / $BatasAwal);
								$b = $a[0];
								$c = $b + 1;
								echo '<li class="disabled"><a href="data_pembeli.php" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li>';
								for ($i = 1; $i <= $ju; $i++) {
									if ($_GET['page'] == $i) {
										echo '<li class="active"> <a';
									}else if ($_GET['page'] == null and $i==1) {
										echo '<li class="active"> <a';
									}else {
										echo '<li><a ';
									}
									echo ' href="data_pembeli.php?page=' . $i . '">' . $i . ' <span class="sr-only">(current)</span></a></li>';
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
           	content: "Are you sure <b>BLACKLIST</b> this buyer ?",
           	title: "Confirmation",
           	confirmButton: 'Yes',
  			confirmButtonClass: 'btn-info',
  			cancelButton: 'Cancel',
  			cancelButtonClass: 'btn-danger',
  			icon: 'fa fa-question-circle',
  			animation: 'scale',
 			animationClose: 'top',
   			opacity: 0.5,
       	});</script>
		<?php include "footer.php";?>
	</section>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>