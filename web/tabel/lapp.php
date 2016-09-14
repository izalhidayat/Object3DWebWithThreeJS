<?php
try
{
	//Open database connection
include "koneksi.php";

	//Getting records (listAction)
	if($_GET["action"] == "list")
	{

		//Get Post id_toko
		$id_toko=1;
		//Get record count
		$result = mysql_query("SELECT COUNT(*) AS nama_produk FROM data_produk where id_toko='$id_toko'");
		$row = mysql_fetch_array($result);
		$recordCount = $row['nama_produk'];


		//Get records from database
		$result = mysql_query("SELECT * FROM data_produk where id_toko='$id_toko'");
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
			//if ($row['id_produk']!=null){
			//$id_produk=$row['id_produk'];
			//$sql_stok = mysql_query("SELECT * FROM stok_produk where id_produk='$id_toko'");
			//$row_stok = mysql_fetch_array($sql_stok);
			//$rows[] = $row_stok['jumlah'];
			//}
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
		$result = mysql_query("INSERT INTO supplier (id_produk,nama_produk,harga,nama_perusahaan,alamat,kontak) VALUES(".$_POST["id_produk"].",'".$_POST["nama_produk"]."'," . $_POST["harga"] . ", '" . $_POST["nama_perusahaan"]."','" . $_POST["alamat"] . "',".$_POST["kontak"].");");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM supplier WHERE key = LAST_INSERT_ID();");
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
		$result = mysql_query("UPDATE supplier SET id_produk = " . $_POST["id_produk"] . ", nama_produk = '" . $_POST["nama_produk"] . "', harga = " . $_POST["harga"] . " , nama_perusahaan = '" . $_POST["nama_perusahaan"] . "', alamat = '" . $_POST["alamat"] . "', kontak = " . $_POST["kontak"] . " WHERE key = ".$_POST["key"].";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM supplier WHERE key = " . $_POST["key"] . ";");

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