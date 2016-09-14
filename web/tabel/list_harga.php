<?php
	$con = mysql_connect("localhost","root","");
	mysql_select_db("gapura_aplikasi", $con);
 
 //Get records from database
  $result = mysql_query("SELECT id,harga FROM supplier");

  //Add all records to an array
  $rows = array();
while($row = mysql_fetch_array($result,MYSQL_ASSOC))
  {
     $eil=array();
     $eil["DisplayText"]=$row["harga"];
     $eil["Value"]=$row["id"];
     $rows[]=$eil;
  }

  //Return result to jTable
  $jTableResult = array();
  $jTableResult['Result'] = "OK";
  $jTableResult['Options'] = $rows;
  print json_encode($jTableResult);
?>