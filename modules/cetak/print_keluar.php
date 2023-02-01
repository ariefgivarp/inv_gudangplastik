<?php ob_start(); ?>
<html>

<head>
	<title>Cetak PDF</title>
	<style>
		.table {
			border-collapse: collapse;
			table-layout: fixed;
			width: 630px;
		}

		.table th {
			padding: 5px;
		}

		.table td {
			word-wrap: break-word;
			width: 20%;
			padding: 5px;
		}
	</style>
</head>

<body>
	<?php
	// Load file koneksi.php
	include './../../config/koneksi.php';

	$tgl_awal = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
	$tgl_akhir = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

	if (empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
		// Buat query untuk menampilkan semua data transaksi
		$query = "SELECT i_barangkeluar.kode_transaksi, i_barangkeluar.tgl_input, i_plastik.nama_barang, i_barangkeluar.jumlah_keluar, i_barangkeluar.satuan FROM i_barangkeluar 
        inner join i_plastik on i_plastik.kode_barang = i_barangkeluar.kode_barang ORDER BY tgl_input DESC";
		$url_cetak = "print_keluar.php";
		$label = "* Semua Data Transaksi";
	} else { // Jika terisi
		// Buat query untuk menampilkan data transaksi sesuai periode tanggal
		$query = "SELECT i_barangkeluar.kode_transaksi, i_barangkeluar.tgl_input, i_plastik.nama_barang, i_barangkeluar.jumlah_keluar, i_barangkeluar.satuan FROM i_barangkeluar 
        inner join i_plastik on i_plastik.kode_barang = i_barangkeluar.kode_barang WHERE (i_barangkeluar.tgl_input BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "') order by tgl_input desc";
		$url_cetak = "print_keluar.php?tgl_awal=" . $tgl_awal . "&tgl_akhir=" . $tgl_akhir . "&filter=true";
		$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
		$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
		$label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
	}
	?>
		<address style="margin-bottom: 5px; text-align: center;">
			<h3 style="text-align:center;">Admin UD. Lancar Plastik</h3>
			Jl. Sudirman No.15, Rembang<br>
			Kec. Rembang, Purbalingga,<br>
			Jawa Tengah 53382<br>
			Phone: +62 822 6558 0438<br>
			Email: lancarplastik@gmail.com
		</address>
		<br>
	<hr>
	<h4 style="margin-bottom: 5px;text-align: center;">Data Barang Keluar</h4>
	<br>
	<?php echo $label ?>
	<table class="table table-bordered" width="100%" style="margin-top: 20px;">
		<tr>
			<th>Tanggal</th>
			<th>Kode Transaksi</th>
			<th>Nama Barang</th>
			<th>Jumlah</th>
			<th>satuan</th>
		</tr>
		<?php
		error_reporting(E_ALL ^ E_NOTICE);
		$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
		$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

		if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
			while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
				$tgl = date('d-m-Y', strtotime($data['tgl_input'])); // Ubah format tanggal jadi dd-mm-yyyy

				echo "<tr>";
				echo "<td>" . $tgl . "</td>";
				echo "<td>" . $data['kode_transaksi'] . "</td>";
				echo "<td>" . $data['nama_barang'] . "</td>";
				echo "<td>" . $data['jumlah_keluar'] . "</td>";
				echo "<td>" . $data['satuan'] . "</td>";
				echo "</tr>";
			}
		} else { // Jika data tidak ada
			echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
		}
		?>
	</table>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
require './../../libraries/libraries/html2pdf/autoload.php';
$pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('Data Transaksi Keluar.pdf', 'I');
?>