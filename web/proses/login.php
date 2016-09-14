<?php
session_start(); // Memulai Session
include "../koneksi.php";
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
	}
	else
	{
		// Variabel username dan password
		$email=$_POST['username'];
		$password=$_POST['password'];
		// Mencegah MySQL injection
		$email = stripslashes($email);
		$password = stripslashes($password);
		$email = mysql_real_escape_string($email);
		$password = mysql_real_escape_string($password);
		// SQL query untuk memeriksa apakah karyawan terdapat di database?
		$query = mysql_query("SELECT * FROM users_toko WHERE email='$email'") or die(mysql_error());
		$rows = mysql_num_rows($query);
		$aray=mysql_fetch_array($query);
			if ($rows > 0){
				$salt = $aray['salt'];
           		$encrypted_password = $aray['encrypted_password'];
            	$hash = checkhashSSHA($salt, $password);
            	// check for password equality
            	if ($encrypted_password == $hash) {
                // user authentication details are correct
            	$id_penjual=$aray['uid'];
            	$sql_toko = mysql_query("SELECT * FROM data_toko WHERE id_pemilik='$id_penjual'");
				$aray_toko=mysql_fetch_array($sql_toko);
				$_SESSION['uid']=$id_penjual; // Membuat Sesi/session
				$_SESSION['id_toko']=$aray_toko['id_toko'];
					if($_SESSION['uid']!=null && $_SESSION['id_toko']!=null){
						header("location: ../data_produk.php"); // Mengarahkan ke halaman profil
					};
				}else{
					$error = "Username atau Password belum terdaftar";
					header("Location:../sign_in.php?err=2");
				};
			} else {
					$error = "Username atau Password belum terdaftar";
					header("Location:../sign_in.php?err=1");
				}
				mysql_close($conn); // Menutup koneksi
	}
}else{
	echo "Gagal";
}

function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
}
?>