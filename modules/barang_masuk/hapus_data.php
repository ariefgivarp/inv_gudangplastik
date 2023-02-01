<?php

include './../../config/koneksi.php';

if( isset($_GET['id_bm']) ){

    // ambil id dari query string
    $id_bm = $_GET['id_bm'];

    // buat query hapus
    $sql = "DELETE FROM i_barangmasuk WHERE id_bm=$id_bm";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: barang_masuk.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>