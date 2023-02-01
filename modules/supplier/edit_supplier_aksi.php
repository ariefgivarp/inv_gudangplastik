<?php
include './../../config/koneksi.php';
       
if(isset($_POST['simpan'])){
    // ambil data dari formulir
        $kode_supplier  = mysqli_real_escape_string($koneksi, trim($_POST['kode_supplier']));
        $nama_supplier  = mysqli_real_escape_string($koneksi, trim($_POST['nama_supplier']));
        $no_telp  = mysqli_real_escape_string($koneksi, trim($_POST['no_telp']));
        $alamat_supplier  = mysqli_real_escape_string($koneksi, trim($_POST['alamat']));

        // buat query update
        $sql = "UPDATE i_supplier SET nama_supplier='$nama_supplier',  no_telp='$no_telp',  alamat='$alamat_supplier' WHERE kode_supplier = '$kode_supplier'";
        $query = mysqli_query($koneksi, $sql);

        // apakah query update berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman list-siswa.php
            header('Location: supplier.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }


    } else {
        die("Akses dilarang...");
    }

?>