<?php
include './../../config/koneksi.php';
require_once './../../config/fungsi_rupiah.php';
       
if(isset($_POST['simpan'])){
    // ambil data dari formulir
        $kode_barang  = mysqli_real_escape_string($koneksi, trim($_POST['kode_barang']));
        $nama_barang  = mysqli_real_escape_string($koneksi, trim($_POST['nama_barang']));
        $jenis_barang  = mysqli_real_escape_string($koneksi, trim($_POST['jenis_barang']));
        $nama_merek  = mysqli_real_escape_string($koneksi, trim($_POST['nama_merek']));
        $harga_beli = str_replace('.', '', mysqli_real_escape_string($koneksi, trim($_POST['harga_beli'])));
        $harga_jual = str_replace('.', '', mysqli_real_escape_string($koneksi, trim($_POST['harga_jual'])));
        $satuan     = mysqli_real_escape_string($koneksi, trim($_POST['satuan']));
        $stok     = mysqli_real_escape_string($koneksi, trim($_POST['stok']));

        // buat query update
        $sql = "UPDATE i_plastik SET nama_barang='$nama_barang', jenis_barang='$jenis_barang', nama_merek='$nama_merek', harga_beli='$harga_beli', harga_jual='$harga_jual', satuan='$satuan', stok='$stok' WHERE kode_barang = '$kode_barang'";
        $query = mysqli_query($koneksi, $sql);

        // apakah query update berhasil?
        if( $query ) {
            // kalau berhasil, dialihkan ke:
            header('Location: barang.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }


    } else {
        die("Akses dilarang...");
    }

?>