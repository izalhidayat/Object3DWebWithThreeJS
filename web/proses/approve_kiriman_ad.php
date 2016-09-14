<?php
include "../koneksi.php";
$id_penjualan=$_GET['id'];
$id_toko=$_GET['toko'];
$create_pembayaran = mysql_query("INSERT INTO data_pembayaran VALUES('','$id_toko','$id_penjualan','pending','');");
$update_pembayaran = mysql_query("UPDATE data_penjualan SET status_penjualan = 'shipping_ok' WHERE id_penjualan = " . $id_penjualan . ";");
header("location:../ad/data_penjualan.php?not=sh_ok");
?>