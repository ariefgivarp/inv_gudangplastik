<?php
// panggil file untuk koneksi ke database
require_once "./config/koneksi.php";

// ambil data hasil submit dari form
$user = mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars(trim($_POST['user'])))));
$pass = md5(mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars(trim($_POST['pass']))))));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($user) OR !ctype_alnum($pass)) {
	header("Location: index.php?alert=1");
}
else {
	// ambil data dari tabel user untuk pengecekan berdasarkan inputan username dan passrword
	$query = mysqli_query($koneksi, "SELECT * FROM i_users WHERE user='$user' AND pass='$pass'")
									or die('Ada kesalahan pada query user: '.mysqli_error($koneksi));
	$rows  = mysqli_num_rows($query);

	// jika data ada, jalankan perintah untuk membuat session
	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['id_user']   = $data['id_user'];
		$_SESSION['user']  = $data['user'];
		$_SESSION['pass']  = $data['pass'];
		$_SESSION['nama_user'] = $data['nama_user'];
		$_SESSION['level'] = $data['level'];
		$_SESSION['status'] = "login";
		
		// lalu alihkan ke halaman user
		header("Location: ./modules/home/home.php");
	}

	// jika data tidak ada, alihkan ke halaman login dan tampilkan pesan = 1
	else {
		header("Location: index.php?alert=1");
	}
}
?>