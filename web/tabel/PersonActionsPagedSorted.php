<?php

try
{
	//Open database connection
	$con = mysql_connect("localhost","root","");
	mysql_select_db("gapura_aplikasi", $con);

	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get record count
		$result = mysql_query("SELECT COUNT(*) AS tanggal FROM produk_masuk");
		$row = mysql_fetch_array($result);
		$recordCount = $row['tanggal'];

		//Get records from database
		$result = mysql_query("SELECT * FROM produk_masuk WHERE tanggal like '%" . $nana . "%' ORDER BY " . $_GET["jtSorting"] . " LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";");
		
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
		    $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['TotalRecordCount'] = $recordCount;
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		$result2 = mysql_query("SELECT * FROM supplier WHERE id_produk = '$_POST[id_produk]'");
		$row2 = mysql_fetch_array($result2);
		$harga=$row2['harga'];
		$sub=$harga*$_POST["jumlah"];
		//Insert record into database
		$result = mysql_query("INSERT INTO produk_masuk(id_produk,tanggal,jumlah,harga_beli,sub_total,keterangan) VALUES(" . $_POST["id_produk"] . ",now() ," . $_POST["jumlah"] . ", " . $harga . ", " . $sub . ",'" . $_POST["keterangan"] . "');");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM produk_masuk WHERE id_transaksi = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		$result3 = mysql_query("SELECT * FROM supplier WHERE id_produk = '$_POST[id_produk]'");
		$row3 = mysql_fetch_array($result3);
		$harga=$row3['harga'];
		$sub=$harga*$_POST["jumlah"];
		//Update record in database
		$result = mysql_query("UPDATE produk_masuk SET id_produk = " . $_POST["id_produk"] . ", tanggal = '" . $_POST["tanggal"] . "' , jumlah = " . $_POST["jumlah"] . ", harga_beli = " . $harga . ", sub_total = " . $sub . ", keterangan = '" . $_POST["keterangan"] . "' WHERE id_transaksi = " . $_POST["id_transaksi"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM produk_masuk WHERE id_transaksi = " . $_POST["id_transaksi"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($con);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>