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