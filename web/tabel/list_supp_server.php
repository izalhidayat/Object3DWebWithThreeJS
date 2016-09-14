<?php
require "koneksi_bak.php";
 //Get records from database
  $result = mysql_query("SELECT id,NAMA FROM PRODUK WHERE VENDOR='14'");

  //Add all records to an array
  $rows = array();
while($row = mysql_fetch_array($result,MYSQL_ASSOC))
  {
     $eil=array();
     $eil["DisplayText"]=$row["NAMA"];
     $eil["Value"]=$row["id"];
     $rows[]=$eil;
  }

  //Return result to jTable
  $jTableResult = array();
  $jTableResult['Result'] = "OK";
  $jTableResult['Options'] = $rows;
  print json_encode($jTableResult);
?>