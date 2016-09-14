<?php 
require "head.php";
error_reporting(0);
if (isset($_POST['submit'])) {
	if (empty($_POST['cari']) AND empty($_POST['tanggal']) AND $_POST['status_filter']==''){
			$error = 1;
	}else{
		if ($_POST['tanggal']!=null){
		$tanggal_filter=date_create("$_POST[tanggal]");
		$date=date_format($tanggal_filter,"Y-m-d");
		$filter_tanggal="AND data_pesanan.tanggal like '$date%'";
		}else{
			$filter_tanggal="";
		}
		if ($_POST['status_filter']!=""){
			if ($_POST['status_filter']=="pending"){
				$filter_status="AND data_pesanan.status=''";
			}else{
				$filter_status="AND data_pesanan.status='$_POST[status_filter]'";
			}
		}else{
			$filter_status="";
		}
		if ($_POST['cari']!=""){
		$filter_pembeli="AND data_pembeli.nama_pembeli like '%$_POST[cari]%'";
		}else{
			$filter_pembeli="";
		}
		$error=0;
	}
}else{
	$filter_status="";
	$filter_pembeli="";
	$filter_tanggal="";
}
?>
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
					<h3 class="blank1">Product Order</h3>
			<?php 
			if ($_GET['not']=="approve"){
				echo "<div class='alert alert-success' role='alert'>
					 <strong>Approve Sukses</strong> Pesanan berhasil di Approve, segera lakukan pengiriman barang.
					 </div>";
			}else if ($id_notif=$_GET['st']!=null){
				$update_notif = mysql_query("UPDATE notif SET status = '0' WHERE id_notif = " . $id_notif . ";");
			}else if ($_GET['not']=="disapprove"){
				echo "<div class='alert alert-danger' role='alert'>
					 <strong>Pesanan Telah Ditolak</strong> Anda baru saja menolak pesanan.
					 </div>";
			}
			$sql_pe=mysql_query("SELECT * FROM data_penjual where id_penjual='$id_user'");
			$arr=mysql_fetch_array($sql_pe);
			$show = explode(',', $arr['dashboard']);
			if ($show[1]=="1"){
			?>
			<div class="col-4" >
				<div class="col-md-5 grid_2">
				<?php $sql_pesanan=mysql_query("SELECT sum(jumlah) as jumlah FROM data_pesanan where status='' group by id_produk");
					  $banyak_jenis_produk=mysql_num_rows($sql_pesanan)?>
							<div class="grid_1" style="height: 327px !important">
								<h4>Jenis Barang</h4>
								<canvas id="doughnut" height="300" width="470" style="width: 470px; height: 300px;"></canvas>
								<script>
								var warna=["#F44336","#8BC34A","#00ACED","#EFCE2D","#9358ac","#000"];
								var data=[
								<?php 
								while($aray_pesanan=mysql_fetch_array($sql_pesanan))
    							echo $jum[]=$aray_pesanan['jumlah'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
								?>];
									var doughnutData = [
									<?php $i=0; while ($i<$banyak_jenis_produk){ ?>
									{
										value: data[<?php echo $i?>],
										color: warna[<?php echo $i?>]
									},
									<?php $i++; }?>
									];
									new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(doughnutData);
								</script>
								<div class="legend" style="margin: 0 0px 0px 15px !important;">
									<div id="os-Win-lbl" style="border-left: #F44336 solid 1em">Gas LPG <span>8,</span></div>
									<div id="os-Win-lbl" style="border-left: #8BC34A solid 1em">Galon Aqua  <span>3,</span></div>
									<div id="os-Win-lbl" style="border-left: #00ACED solid 1em">Beras <span>5,</span></div>
									<div id="os-Win-lbl" style="border-left: #EFCE2D solid 1em">Gas LPG 12 Kg <span>5,</span></div>
									<div id="os-Win-lbl" style="border-left: #9358ac solid 1em">Galon Amidis <span>4,</span></div>
								</div>
						</div>
				</div>
				<div class="col-md-4 switch-right">
				<?php 
					$pesanan_diterima=0;
					$pesanan_ditolak=0;
					$pesanan_pending=0;
					$sql_pesanan=mysql_query("SELECT * FROM data_pesanan");
					while($aray_pesanan=mysql_fetch_array($sql_pesanan)){
						if ($aray_pesanan['status']=="approve"){
							$pesanan_diterima=$pesanan_diterima+1;
						}else if ($aray_pesanan['status']=="disapprove"){
							$pesanan_ditolak=$pesanan_ditolak+1;
						}else{
							$pesanan_pending=$pesanan_pending+1;
						}
					}

					$mon=0;		$tue=0;		$wed=0;		$thu=0;
					$fri=0;		$sat=0;		$sun=0;
					$sql_pesanan=mysql_query("SELECT * FROM data_pesanan");
					while($aray_pesanan=mysql_fetch_array($sql_pesanan)){
						$waktu=date_create($aray_pesanan['tanggal']);
						$hari=date_format($waktu,'D');
						if ($hari=="Mon"){
							$mon=$mon+1;
						}else if ($hari=="Tue"){
							$tue=$tue+1;
						}else if ($hari=="Wed"){
							$wed=$wed+1;
						}else if ($hari=="Thu"){
							$thu=$thu+1;
						}else if ($hari=="Fri"){
							$fri=$fri+1;
						}else if ($hari=="Sat"){
							$sat=$sat+1;
						}else if ($hari=="Sun"){
							$sun=$sun+1;
						}

					}
				?>
					<div class="switch-right-grid">
						<div class="switch-right-grid1">
							<h3>Banyak Pesanan Minggu Ini</h3>
							<ul>
								<li><b style="color:#9358ac">Diterima: <?php echo $pesanan_diterima?></b></li>
								<li><b style="color:#F44336">Ditolak: <?php echo $pesanan_ditolak?></b></li>
								<li>Pending: <?php echo $pesanan_pending?></li>
							</ul>
						</div>
					</div>
					<div class="sparkline">
						<canvas id="bar" height="150" width="480" style="width: 480px; height: 150px;"></canvas>
							<script>
								var barChartData = {
									labels : ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],
									datasets : [
										{
											fillColor : "#9358ac",
											strokeColor : "#9358ac",
											data : [<?php echo $mon.',';echo $tue.',';echo $wed.',';echo $thu.',';echo $fri.',';echo $sat.',';echo $sun;?>]
										},
										{
											fillColor : "#F44336",
											strokeColor : "#F44336",
											data : [0,0,0,0,0,0,0]
										}
									]
									
								};
									new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
							</script>
					</div>
				</div>
				<div class="col-md-3" style="padding: 0 !important;width: 24% !important;">
							<div class="online" style="background: #8BC34A;">
							<h3>Profil Pembeli</h3>
							<?php 
								$sql_pembeli_pesanan=mysql_query("SELECT * FROM data_pesanan where status='' group by id_pembeli limit 2");
								while ($aray_pembeli=mysql_fetch_array($sql_pembeli_pesanan)){
									$sql_pembeli=mysql_query("SELECT * FROM data_pembeli where email='$aray_pembeli[id_pembeli]'");
									$data_pembeli=mysql_fetch_array($sql_pembeli);
							?>
								<a href="detail_pembeli.php?id=<?php echo $data_pembeli['id_pembeli']?>"><div class="online-top">
									<div class="top-at">
										<img class="img-responsive" src="img/<?php echo $data_pembeli['foto']?>" alt="">
									</div>
									<div class="top-on">
										<div class="top-on1">
											<p><?php echo $data_pembeli['nama_pembeli']?></p>
											<span>+62<?php echo $data_pembeli['no_tlp']?></span>
											<br/><span><?php echo $data_pembeli['alamat']?></span>
										</div>
										<label class="round"> </label>
										<div class="clearfix"> </div>
									</div>
									<div class="clearfix"> </div>
								</div></a>
							<?php } ?>
							</div>
						</div>
				<div class="clearfix"></div>
			</div>
		</div><br/>
		<?php };?>
					 <div class="xs tabls">
						<div class="bs-example4" data-example-id="contextual-table">
						<div class="filter">
						 		<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingTwo">
									  <h4 class="panel-title asd">
										<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										  <span class="lnr lnr-magnifier"></span><i class="lnr lnr-chevron-up"></i><label>Search</label>
										</a>
									  </h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									   <form name="filter" action="#" method="POST">
								<input class="form-control1" type="text" name="cari" placeholder="Search Costumer" style="width:200px !important" />
								<input class="form-control1" type="date" name="tanggal" style="width:200px !important"/>
								<select class="form-control1" name="status_filter" style="width:200px !important">
									<option value="">Select Status</option>
									<option value="approve">Approve</option>
									<option value="pending">Pending</option>
									<option value="disapprove">Disapprove</option>
								</select>
								<input class="btn-success btn" type="submit" name="submit" value="Search" style="width:200px !important">
							</form>
									</div>
								 </div>
						</div>
						<table class="table">
						  <thead>
							<tr>
							  <th>No</th>
							  <th>Date</th>
							  <th>Order ID</th>
							  <th>Buyer Name</th>
							  <th>Product Name</th>
							  <th>Amount</th>
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
						  //Get data_pesanan & Pembeli
						  $i=1;
						  $sql_pesanan=mysql_query("SELECT * FROM data_pesanan INNER JOIN data_pembeli ON data_pembeli.email=data_pesanan.id_pembeli WHERE 1=1 $filter_status $filter_tanggal $filter_pembeli AND id_toko='$id_toko' order by tanggal DESC limit $MulaiAwal , $BatasAwal");
						  $hitung_data=mysql_num_rows($sql_pesanan);
						  while($aray_pesanan=mysql_fetch_array($sql_pesanan)){
						  	//Get data_produk
						  	$sql_produk=mysql_query("SELECT * FROM data_produk where id_produk='$aray_pesanan[id_produk]'");
						  	$aray_produk=mysql_fetch_array($sql_produk);
						  	if($i%2==0){
								echo "<tr class='info'>";
							}else{
								echo "<tr>";
							}

							$date=date_create($aray_pesanan['tanggal']);
						?>
							  <th scope="row"><?php echo $i+$MulaiAwal?></th>
							  <td><?php echo date_format($date, 'D, d/m/y - h:i');?></td>
							  <td>PSN-00<?php echo $aray_pesanan['id_pesanan']?></td>
							  <td><?php echo $aray_pesanan['nama_pembeli']?></td>
							  <td><?php echo $aray_produk['nama_produk']?></td>
							  <td><?php echo $aray_pesanan['jumlah']?></td>
							  <td><?php if ($aray_pesanan['status']=="approve"){
							  	echo "<span class='label label-success'>Approve</span>";
							  }else if ($aray_pesanan['status']=="disapprove"){
							  	echo "<span class='label label-danger'>Disapprove</span>";
							  }else{
							  	echo "<span class='label label-warning'>Pending</span>";
							  }?></td>
							  <td><a href="#" class="tooltipp detail<?php echo $i?>" title="Order Detail"><h3 style="margin-bottom: 0em;"><span class="lnr lnr-magnifier"></span></a>
							  <a href="proses/approve_pesanan.php?id=<?php echo $aray_pesanan['id_pesanan']?>" class="tooltipp terima" title="Approve"><span class="lnr lnr-checkmark-circle" style="color: green;"></span></a>
							  <a href="proses/disapprove_pesanan.php?id=<?php echo $aray_pesanan['id_pesanan']?>" class="tooltipp tutup" title="Disapprove"><span class="lnr lnr-cross-circle" style="color: red;"></span></h3></a>
							  </td>
							</tr>
							<script>
							  	$('.detail<?php echo $i?>').confirm({
							  					keyboardEnabled: true,
                                            	columnClass: 'col-md-12',
                                                content: 'url:detail_pesanan.php?id=<?php echo $aray_pesanan[id_pesanan]?>',
                                                title: "Order Detail",
                                                confirmButton: false,
                                    			cancelButtonClass: 'btn-danger',
                                    			cancelButton: 'Close',
                                    			animation: 'scale',
                                    			animationClose: 'top',
                                   			 	opacity: 0.5,
                                      		});
							  </script>
							<?php
							$i++;};
							if ($hitung_data==0){
								echo "<div class='alert alert-danger' role='alert'>
							<strong>Sorry</strong> Order Empty</div>";
								};
							?>
						  </tbody>
						</table>
						<?php
							$cek_data = mysql_query("SELECT * FROM data_pesanan INNER JOIN data_pembeli ON data_pembeli.id_pembeli=data_pesanan.id_pembeli WHERE 1=1 $filter_status $filter_tanggal $filter_pembeli AND id_toko='$id_toko' ");
							$jumlahData = mysql_num_rows($cek_data);
							if ($jumlahData > $BatasAwal) {
								echo '<nav><ul class="pagination">';
								$ju=round($jumlahData/$BatasAwal);
								$a = explode(".", $jumlahData / $BatasAwal);
								$b = $a[0];
								$c = $b + 1;
								echo '<li class="disabled"><a href="data_pesanan.php" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li>';
								for ($i = 1; $i <= $ju; $i++) {
									if ($_GET['page'] == $i) {
										echo '<li class="active"> <a';
									}else if ($_GET['page'] == null and $i==1) {
										echo '<li class="active"> <a';
									}else {
										echo '<li><a ';
									}
									echo ' href="data_pesanan.php?page=' . $i . '">' . $i . ' <span class="sr-only">(current)</span></a></li>';
								}
								echo '</ul></nav>';
							}
						?>
					   </div>
					   </div>
					  </div>
				</div>
			</div>
		</div>
<script>
                                            $('.tutup').confirm({
                                                content: "Yakin untuk <b>MENOLAK</b> pesanan ini ?",
                                                title: "Konfirmasi",
                                                confirmButton: 'Yakin',
                                    			confirmButtonClass: 'btn-info',
                                    			cancelButton: 'Tidak',
                                    			icon: 'fa fa-question-circle',
                                    			animation: 'scale',
                                    			animationClose: 'top',
                                   			 	opacity: 0.5,
                                            });

                                            $('.terima').confirm({
                                                content: "Yakin untuk <b>MENERIMA</b> pesanan ini ? Pastikan barang tersedia.",
                                                title: "Konfirmasi",
                                                confirmButton: 'Ya',
                                    			confirmButtonClass: 'btn-info',
                                    			cancelButton: 'Tidak',
                                    			icon: 'fa fa-question-circle',
                                    			animation: 'scale',
                                    			animationClose: 'top',
                                   			 	opacity: 0.5,
                                            });
                                        </script>
		<?php include "footer.php";?>
	</section>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>