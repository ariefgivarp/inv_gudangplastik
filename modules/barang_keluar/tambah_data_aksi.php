<?php
if ($_POST['Submit'] == "Submit") {
	$kode_barang			= $_POST['kode_barang'];
	$kode_transaksi		= $_POST['kode_transaksi'];
	$jumlah_keluar		= $_POST['jumlah_keluar'];
    $satuan		        = $_POST['satuan'];

	include './../../config/koneksi.php';
	$selSto = mysqli_query($koneksi, "SELECT * FROM i_plastik WHERE kode_barang='$kode_barang'");
	$sto    = mysqli_fetch_array($selSto);
	$stok	= $sto['stok'];
	//menghitung sisa stok
	$sisa	= $stok - $jumlah_keluar;

	if ($stok === $jumlah_keluar) {
?>
		<script language="JavaScript">
			alert('Oops! Jumlah pengeluaran lebih besar dari stok ...');
			document.location = 'tambah_data.php';
		</script>
		<?php
	}
	//proses	
	else {
		$insert = mysqli_query($koneksi, "INSERT INTO i_barangkeluar (kode_transaksi, kode_barang, tgl_input, jumlah_keluar, satuan) VALUES ('$kode_transaksi', '$kode_barang', NOW(), '$jumlah_keluar', '$satuan')");
		if ($insert) {
			//update stok
			$upstok = mysqli_query($koneksi, "UPDATE i_plastik SET stok='$sisa' WHERE kode_barang='$kode_barang'");
		?>
			<script language="JavaScript">
				alert('Good! Input Kasur Masuk berhasil ...');
				document.location = 'barang_keluar.php';
			</script>
<?php
		} else {
			echo "<div><b>Oops!</b> 404 Error Server.</div>";
		}
	}
}
?>