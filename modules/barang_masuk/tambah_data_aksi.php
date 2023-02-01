<?php
if ($_POST['Submit'] == "Submit") {
	$kode_barang			= $_POST['kode_barang'];
	$kode_transaksi		= $_POST['kode_transaksi'];
	$jumlah_masuk		= $_POST['jumlah_masuk'];
    $kode_supplier		= $_POST['kode_supplier'];
    $satuan		= $_POST['satuan'];

	include './../../config/koneksi.php';
	$selSto = mysqli_query($koneksi, "SELECT * FROM i_plastik WHERE kode_barang='$kode_barang'");
	$sto    = mysqli_fetch_array($selSto);
	$stok	= $sto['stok'];
	//menghitung sisa stok
	$sisa	= $stok + $jumlah_masuk;

	if ($stok == $jumlah_masuk) {
?>
		<script language="JavaScript">
			alert('Oops! Jumlah pengeluaran lebih besar dari stok ...');
			document.location = 'tambah_data.php';
		</script>
		<?php
	}
	//proses	
	else {
		$insert = mysqli_query($koneksi, "INSERT INTO i_barangmasuk (kode_transaksi, kode_barang, tgl_input, jumlah_masuk, kode_supplier, satuan) VALUES ('$kode_transaksi', '$kode_barang', NOW(), '$jumlah_masuk', '$kode_supplier', '$satuan')");
		if ($insert) {
			//update stok
			$upstok = mysqli_query($koneksi, "UPDATE i_plastik SET stok='$sisa' WHERE kode_barang='$kode_barang'");
		?>
			<script language="JavaScript">
				alert('Good! Input Barang Masuk berhasil ...');
				document.location = 'barang_masuk.php';
			</script>
<?php
		} else {
			echo "<div><b>Oops!</b> 404 Error Server.</div>";
		}
	}
}
?>