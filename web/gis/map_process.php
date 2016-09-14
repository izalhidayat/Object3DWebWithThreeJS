<?php
require "../koneksi.php";
$mysqli = new mysqli($host, $user, $passw, $database);

if (mysqli_connect_errno()) 
{
	header('HTTP/1.1 500 Error: Could not connect to db!'); 
	exit();
}

//Create a new DOMDocument object
$dom = new DOMDocument("1.0");
$node = $dom->createElement("data_pembeli"); //Create new element node
$parnode = $dom->appendChild($node); //make the node show up 

// Select all the rows in the markers table
$ids=$_GET['id'];
if($ids!=null){
$results = $mysqli->query("SELECT * FROM data_pembeli WHERE id_pembeli='$ids'");
} else {
$results = $mysqli->query("SELECT * FROM data_pembeli WHERE 1");
}
if (!$results) {  
	header('HTTP/1.1 500 Error: Could not get markers!'); 
	exit();
}

//set document header to text/xml
header("Content-type: text/xml"); 

// Iterate through the rows, adding XML nodes for each
while($obj = $results->fetch_object())
{
  $node = $dom->createElement("marker");  
  $newnode = $parnode->appendChild($node);   
  $newnode->setAttribute("nama_pembeli",$obj->nama_pembeli);
  $newnode->setAttribute("alamat", $obj->alamat);  
  $newnode->setAttribute("lat", $obj->lat);  
  $newnode->setAttribute("long", $obj->long);
}

echo $dom->saveXML();