<?php
include "../koneksi.php";
$email=$_POST['email'];
$pass=$_POST['password'];
if ($_POST['produk']==null){
	$produk=0;
}else{
	$produk=$_POST['produk'];
}
if ($_POST['pesanan']==null){
	$pesanan=0;
}else{
	$pesanan=$_POST['pesanan'];
}
if ($_POST['penjualan']==null){
	$penjualan=0;
}else{
	$penjualan=$_POST['penjualan'];
}
$id_user=$_POST['id_user'];
$chart="$produk,$pesanan,$penjualan";

$update_profil = mysql_query("UPDATE data_penjual SET dashboard = '$chart' WHERE id_penjual = " . $id_user . ";");
header("location:../pengaturan.php?not=sh_ok");
?>