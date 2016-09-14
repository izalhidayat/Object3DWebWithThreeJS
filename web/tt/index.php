<!DOCTYPE HTML>
<html>
<head>
<title>Aplikasi Toko Berbasis Web</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="js/Chart.js"></script>
<script src="js/notif.js"></script>
<!-- //chart -->
<!--animate-->
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->
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
<script type="text/javascript" src="js/jquery-confirm.js"></script>
</head>
<body onload="JavaScript:AutoRefresh();">
<script>
 function AutoRefresh() {
     $("#is").load("response.php");
   var refreshId = setInterval(function() 
      {
      $("#is").load('response.php?randval='+ Math.random());
      }, 3000);// 5 menit sekali ngcek
 };
</script>

<h1 class="dropdown" id="is" data-toggle="dropdown" aria-expanded="false">Keluar</h1>

</body>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</html>