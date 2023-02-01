<?php
include "../layout/navbar.php";
?>

<section class="p-4" id="main-content">
    <button class="btn btn-secondary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>
    <div class="container mt-5">
        <p class="h2">Data Barang</p>
        <div class="position-relative">
            <div class="row">
                <div class="col">
                    <div class="card text-center mt-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="p-2">
                                    <h4>Tabel Data Barang</h4>
                                </div>
                                <div class="p-2 "><a href="tambah_barang.php" class="fa fa-plus" style="text-decoration:none"> Tambah Data</a></button></div>
                            </div>
                            <hr>
                            <div class="container mt-3">
                                <table class="table table-bordered border-primary" id="tabel-data">
                                    <thead class="table-primary" style="font-size:90%">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Nama Merk</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Satuan</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include './../../config/koneksi.php';
                                        require_once './../../config/fungsi_rupiah.php';
                                        $no = 1;
                                        $data = mysqli_query($koneksi, "SELECT * FROM i_plastik ORDER BY id_barang DESC");
                                        while ($d = mysqli_fetch_array($data)) {
                                            $harga_beli = format_rupiah($d['harga_beli']);
                                            $harga_jual = format_rupiah($d['harga_jual']);
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $d['kode_barang']; ?></td>
                                                <td><?php echo $d['nama_barang']; ?></td>
                                                <td><?php echo $d['jenis_barang']; ?></td>
                                                <td><?php echo $d['nama_merek']; ?></td>
                                                <td><label>Rp. </label><?php echo $harga_beli; ?></td>
                                                <td><label>Rp. </label><?php echo $harga_jual; ?></td>
                                                <td><?php echo $d['satuan']; ?></td>
                                                <td><?php echo $d['stok']; ?></td>
                                                <td>
                                                    <a data-toggle="tooltip" data-placement="top" title="edit" href="edit_barang.php?id_barang=<?php echo $d['id_barang']; ?>"><span class="fa fa-pencil-square"></span></a>

                                                    <a data-toggle="tooltip" data-placement="top" title="Hapus" href="hapus_barang.php?id_barang=<?php echo $d['id_barang']; ?>"><span class="fa fa-trash"></span></a>
                                                </td>
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