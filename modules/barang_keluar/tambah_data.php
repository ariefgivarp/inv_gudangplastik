<?php
include "../layout/navbar.php";
?>

<section class="p-4" id="main-content">
    <button class="btn btn-secondary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>
    <div class="container mt-5">
        <p class="h2">Barang Keluar</p>

        <div class="position-relative">
            <div class="row">
                <div class="col">
                    <div class="card text-center mt-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="p-2">
                                    <h4>Tambah Data Barang Keluar</h4>
                                </div>
                                <div class="p-2 "><a href="barang_keluar.php" class="fa fa-undo" style="text-decoration:none"> Kembali</a></button></div>
                            </div>
                            <hr>

                            <form action="tambah_data_aksi.php" method="post">
                                <?php
                                include './../../config/koneksi.php';
                                require_once './../../config/fungsi_rupiah.php';

                                $query = mysqli_query($koneksi, "SELECT max(kode_transaksi) as kodeTerbesar FROM i_barangkeluar");
                                $data = mysqli_fetch_array($query);
                                $kodeBarang = $data['kodeTerbesar'];

                                $urutan = (int) substr($kodeBarang, 4, 4);

                                $urutan++;
                                $huruf = "TMK-";
                                $kodeBarang = $huruf . sprintf("%04s", $urutan);

                                ?>
                                <div class="container mt-3">
                                    <table class="text-start">
                                        <tr>
                                            <td><label for="ex1" class="">Kode Transaksi</label></td>
                                            <td>
                                                <div class="form-group row p-2 g-col-6">
                                                    <div class="col-xs-3">
                                                        <input class="form-control" type="text" name="kode_transaksi" required="required" value="<?php echo $kodeBarang ?>" readonly>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="jenis_kasur" class="form-label">Nama Barang</label></td>
                                            <td>
                                                <div class="p-2 g-col-6">
                                                    <select class="form-select" name="kode_barang" id="kode_barang" class="select_value" data-placeholder="-- Pilih --" autocomplete="off" required>
                                                        <option value="---- PILIH ----" disabled selected>---- PILIH ----</option>
                                                        <?php
                                                        include './../../config/koneksi.php';
                                                        $sql = mysqli_query($koneksi, "SELECT * FROM i_plastik");
                                                        while ($data = mysqli_fetch_array($sql)) {
                                                        ?>
                                                            <option value="<?= $data['kode_barang'] ?>"><?= $data['kode_barang'] ?> | <?= $data['nama_barang'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="ex1" class="">Jumlah Keluar</label></td>
                                            <td>
                                                <div class="form-group row p-2 g-col-6">
                                                    <div class="col-xs-3">
                                                        <input class="form-control" type="text" name="jumlah_keluar" required="required">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="satuan" class="form-label">Satuan</label></td>
                                            <td>
                                                <div class="mb-3 p-2 g-col-6">
                                                    <select class="form-select" name="satuan" id="satuan" class="select_value" data-placeholder="-- Pilih --" autocomplete="off" required>
                                                        <option value="---- PILIH ----" disabled selected>---- PILIH ----</option>
                                                        <option>Pcs</option>
                                                        <option>Lusin</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="reset" value="Reset" class="btn btn-danger" /> <input type="submit" name="Submit" value="Submit" class="btn btn-success" />
                                            </td>
                                        </tr>
                                        <input type="hidden" name="tgl_input" value="<?php echo date("d-m-Y"); ?>">
                                    </table>
                                </div>
                            </form>
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