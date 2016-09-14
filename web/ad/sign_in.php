<!DOCTYPE HTML>
<html>
<head>
<title>TA BISA</title>
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

</head> 
<?php
error_reporting(0);
$error=$_GET['err']; 
?>
 <body class="sign-in-up">
    <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<p><span>Login untuk </span> <a href="index.php">Toko</a></p>
						</div>
						<div class="signin">
							<form name="login" action="../proses/login.php" method="POST">
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" class="user" name="username" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}" required/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" class="lock" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password:';}" required/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="signin-rit">
								<span>Lupa Sandi ?</span>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" name="submit" value="Login">
						</form>
						</div>
						<?php
						if($error=='1'){
							echo "Username atau Password Salah";
						} 
						?>
						<div class="new_people">
							<a href="sign-up.html">Daftar Sekarang</a>
						</div>
					</div>
				</div>
			</div>
		<!--footer section start-->
			<footer>
			</footer>
        <!--footer section end-->
	</section>
	
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>