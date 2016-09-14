<?php
require "../koneksi.php";
require "../proses/session.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<title>Aplikasi Toko Berbasis Web</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="../js/Chart.js"></script>
<script src="../js/notif.js"></script>
<!-- //chart -->
<!--animate-->
<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="../js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->
<link rel="stylesheet" type="text/css" href="../css/tooltipster.css" />
<script type="text/javascript" src="../js/jquery.tooltipster.min.js"></script>
<script>
        $(document).ready(function() {
            $('.tooltipp').tooltipster({
   				animation: 'grow',
   				theme: 'tooltipster-noir',
   				touchDevices: false,
   				trigger: 'hover'
			});
        });
</script>
<style type="text/css">
    .space10{
        height: 10px;
    } </style> 
<link rel="stylesheet" type="text/css" href="../css/jquery-confirm.css" />
<script type="text/javascript" src="../js/jquery-confirm.js"></script>
<?php 
include "../koneksi.php";
$id_toko=0;
?>