<?php
	session_start();
	unset($_SESSION['uid']);
	header("location:../sign_in.php");
?>