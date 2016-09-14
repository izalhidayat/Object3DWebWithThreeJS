<?php
include "../koneksi.php";
$id_pesanan=$_GET['id'];
$update_pesanan = mysql_query("UPDATE data_pesanan SET status = 'disapprove' WHERE id_pesanan = " . $id_pesanan . ";");
header("location:../data_pesanan.php?not=disapprove");
?>