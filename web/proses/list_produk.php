<?php
include "../koneksi.php";
 //Get records from database
  $result = mysql_query("SELECT * FROM kategori_produk");

  //Add all records to an array
  $rows = array();
while($row = mysql_fetch_array($result,MYSQL_ASSOC))
  {
     $eil=array();
     $eil["DisplayText"]=$row["nama_produk"];
     $eil["Value"]=$row["nama_produk"];
     $rows[]=$eil;
  }

  //Return result to jTable
  $jTableResult = array();
  $jTableResult['Result'] = "OK";
  $jTableResult['Options'] = $rows;
  print json_encode($jTableResult);
?>