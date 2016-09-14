<?php 
include "../koneksi.php";
  //--------------------------------------------------------------------------
  // Example php script for fetching data from mysql database
  // by Trystan Lea : openenergymonitor.org : GNU GPL
  //--------------------------------------------------------------------------
  $tableName = "stok_produk";

  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------
  $dbs = mysql_select_db($database, $conn);

  //--------------------------------------------------------------------------
  // 2) Query database for data
  //--------------------------------------------------------------------------
  $result = mysql_query("SELECT * FROM $tableName");            //query                         
  while($array = mysql_fetch_array($result)){                       //fetch result  
    $id_produk=$array['id_produk']; $jumlah=$array['jumlah'];
    $table_data[]= array('id_produk'=>"$id_produk",'stok'=>"$jumlah");
  }
  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  echo json_encode($table_data);
?>
