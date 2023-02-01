<?php
include "../layout/navbar.php";
?>

<section class="p-4" id="main-content">
    <button class="btn btn-secondary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>
    <div class="container mt-5">
    <p class="h2">Barang Masuk</p>

    <div class="position-relative">
        <div class="row">
            <div class="col">
                <div class="card text-center mt-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h4>Tabel Data Barang Masuk</h4>
                            </div>
                            <div class="p-2 "><a href="tambah_data.php" class="fa fa-plus" style="text-decoration:none"> Tambah Data</a></button></div>
                        </div>
                        <hr>
                        <div class="container mt-3">
                            <table class="table table-bordered border-primary" id="tabel-data">
                                <thead class="table-primary" style="font-size:90%">
                                    <tr>
                                    <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Input</th>
                                        <th>Jumlah Keluar</th>
                                        <th>Satuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include './../../config/koneksi.php';
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "SELECT i_barangkeluar.id_bk, i_barangkeluar.kode_transaksi, i_barangkeluar.tgl_input, i_plastik.nama_barang, i_barangkeluar.jumlah_keluar, i_barangkeluar.satuan FROM i_barangkeluar 
                                    inner join i_plastik on i_plastik.kode_barang = i_barangkeluar.kode_barang 
                                    ORDER BY id_bk DESC");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['kode_transaksi']; ?></td>
                                            <td><?php echo $d['nama_barang']; ?></td>
                                            <td><?php echo $d['tgl_input']; ?></td>
                                            <td><?php echo $d['jumlah_keluar']; ?></td>
                                            <td><?php echo $d['satuan']; ?></td>
                                            <td> <a data-toggle="tooltip" data-placement="top" title="edit" href="hapus_data.php?id_bk=<?php echo $d['id_bk']; ?>"><span class="fa fa-trash"></span></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <script>
                                    $(document).ready(function() {
                                        $('#tabel-data').DataTable();
                                    });
                                </script>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<?php
include '../layout/footer.php';
?>