<?php 
error_reporting(0);
include "koneksi.php";
?>
				<div class="graphs">
					 <div class="xs tabls">
						<div class="bs-example5" data-example-id="contextual-table">
							<div class="row">
						  <?php 
						  //Get data_penbeli
						  	$sql_pembeli=mysql_query("SELECT * FROM data_pembeli where id_pembeli='$_GET[id]'");
						  	$aray_pembeli=mysql_fetch_array($sql_pembeli);

						?>
						<div class="col-md-3 grid_box1">
						<h4>Buyer Detail</h4>
						<center><img src="img/<?php echo $aray_pembeli['foto']?>" id="foto"></center>
						<table class="table">
							<tr><td>Buyer Name</td><td>: <?php echo $aray_pembeli['nama_pembeli']?></td></tr>
							<tr><td>Address</td><td>: <?php echo $aray_pembeli['alamat']?></td></tr>
							<tr><td>Contact</td><td>: <?php echo $aray_pembeli['no_tlp']?></td></tr>
							<tr><td>Status</td>
							<?php if ($aray_pembeli['status_pembeli']=='ok'){
							echo "<td>: <span class='label label-success'>Terverifikasi</span></td>";
							}else{
								echo "<td>:</td>";
								}?></tr>
						</table>
					  	</div>
					  	<div class="col-md-9 grid_box1">
					  	<h4>Buyer Location</h4>
					  	<iframe src="gis/index.php?id=<?php echo $_GET['id']?>" width="100%" height="300px" frameborder="0" style="border:0" scrolling="no" allowfullscreen></iframe>
					  	</div>
					  </div>
				</div>
				<div class="col-md-12">
							<div class="banner-bottom-video-grid-left">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								  <div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
									  <h4 class="panel-title asd">
										<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
										  <span class="lnr lnr-chevron-down"></span><i class="lnr lnr-chevron-up"></i><label>Location Direction</label>
										</a>
									  </h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
									  <div class="panel-body panel_text">
										<iframe src="gis/direction.php?lat1=<?php echo 0?>&long1=<?php echo 0?>&lat2=<?php echo $aray_pembeli['lat']?>&long2=<?php echo $aray_pembeli['long']?>" style="border:none" width="100%" height="500px"></iframe>
									  </div>
									</div>
								  </div>
								 </div>
							</div>
						</div>
				</div>