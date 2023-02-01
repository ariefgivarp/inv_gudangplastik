<?php

include './../../config/koneksi.php';

if( isset($_GET['id_bk']) ){

    // ambil id dari query string
    $id_bk = $_GET['id_bk'];

    // buat query hapus
    $sql = "DELETE FROM i_barangkeluar WHERE id_bk=$id_bk";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: barang_keluar.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>