<?php
require "koneksi.php";
session_start();// Memulai Session
// Menyimpan Session
$id_user=$_SESSION['uid'];
$id_toko=$_SESSION['id_toko'];
if ($id_toko=='0'){
$nama_user="Admin";
}else{
// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
$ses_sql=mysql_query("SELECT * FROM users_toko where uid='$id_user'");
$row = mysql_fetch_array($ses_sql);
$nama_user =$row['name'];
}

if(!isset($id_user)){
  mysql_close($conn); // Menutup koneksi
  header('Location: ../web/sign_in.php'); // Mengarahkan ke Home Page
}
?>