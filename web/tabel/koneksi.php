<?php

$host="localhost";
$user="root";
$passw="";
$database="toko";

$conn=mysql_connect($host,$user,$passw);
if(! $conn){
	echo "Koneksi Gagal";	
}
mysql_select_db($database) or
die ("Database tidak tersedia");

?>