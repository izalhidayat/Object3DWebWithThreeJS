<?php
$database='data_penjualan';
$id_toko=1;
$cek_data = mysql_query("SELECT * FROM '$database' WHERE id_toko='$id_toko'");
$jumlahData = mysql_num_rows($cek_data);
if ($jumlahData > $BatasAwal) {
echo '<nav><ul class="pagination">';
$ju=round($jumlahData/$BatasAwal);
$a = explode(".", $jumlahData / $BatasAwal);
$b = $a[0];
$c = $b + 1;
echo '<li class="disabled"><a href="../web/data_penjualan.php" aria-label="Previous"><i class="fa fa-angle-left"></i></a></li>';
for ($i = 1; $i <= $ju; $i++) {
	if ($_GET['page'] == $i) {
		echo '<li class="active"> <a';
	}else if ($_GET['page'] == null) {
		echo '<li class="active"> <a';
	}
	else {
		echo '<li><a ';
	}
	echo ' href="../web/data_penjualan.php?page=' . $i . '">' . $i . ' <span class="sr-only">(current)</span></a></li>';
}
echo '</ul></nav>';
}
?>