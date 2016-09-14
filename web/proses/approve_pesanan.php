<?php
include "../koneksi.php";
$id_pesanan=$_GET['id'];
$sql_pesanan=mysql_query("SELECT * FROM data_pesanan where id_pesanan='$id_pesanan'");
$aray_pesanan=mysql_fetch_array($sql_pesanan);
$sql_produk=mysql_query("SELECT * FROM data_produk where id_produk='$aray_pesanan[id_produk]'");
$aray_produk=mysql_fetch_array($sql_produk);
$stok_lama=$aray_produk['berat'];
$stok_baru=$stok_lama-$aray_pesanan['jumlah'];
$tanggal=date("Y-m-d H:i:s");
$create_penjualan = mysql_query("INSERT INTO data_penjualan (tanggal_penjualan,id_toko,id_pesanan,harga_penjualan) VALUES('" . $tanggal . "'," . $aray_produk["id_toko"] . "," . $id_pesanan . "," . $aray_produk["harga"] . ");");
$update_pesanan = mysql_query("UPDATE data_pesanan SET status = 'approve' WHERE id_pesanan = " . $id_pesanan . ";");
$update_pesanan = mysql_query("UPDATE data_produk SET stok_produk = '$stok_baru' WHERE id_produk = " . $aray_pesanan['id_produk'] . ";");
// include "http://localhost/andro/gcm/index2.php?email=idih@gmail.com";
header("location:../data_pesanan.php?not=approve");
?>