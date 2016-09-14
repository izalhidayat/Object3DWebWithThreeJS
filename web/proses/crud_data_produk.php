<?php
try
{
	//Open database connection
include "../koneksi.php";
	//Get Post id_toko
	$id_toko=$_GET['id_toko'];
	if($_GET["action"] == "list")
	{
		//Getting records (listAction)
		//Get record count
		$result = mysql_query("SELECT COUNT(*) AS id_produk FROM data_produk where id_toko='$id_toko'");
		$row = mysql_fetch_array($result);
		$recordCount = $row['id_produk'];
		if ($_POST["nana"] != null){
			$nana=$_POST["nana"];
		}else{
			$nana="";
		};
		//Get records from database
		$result = mysql_query("SELECT * FROM data_produk where id_toko='$id_toko' AND nama_produk like '%" . $nana . "%' ORDER BY " . $_GET["jtSorting"] . " LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";");
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
	//Creating a new record (createAction)//
	else if($_GET["action"] == "create")
	{
		$result = mysql_query("INSERT INTO data_produk (nama_produk,harga,stok_produk,id_toko,keterangan) VALUES('".$_POST["nama_produk"]."'," . $_POST["harga"] . ", " . $_POST["stok_produk"]."," . $id_toko . ",'".$_POST["keterangan"]."');");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM data_produk WHERE id_produk = LAST_INSERT_ID();");
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
		$result = mysql_query("UPDATE data_produk SET nama_produk = '" . $_POST["nama_produk"] . "', harga = " . $_POST["harga"] . " , stok_produk = " . $_POST["stok_produk"] . ", keterangan = '" . $_POST["keterangan"] . "' WHERE id_produk = ".$_POST["id_produk"].";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM data_produk WHERE id_produk = " . $_POST["id_produk"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($conn);

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