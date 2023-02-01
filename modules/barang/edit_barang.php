<?php
include "../layout/navbar.php";
?>

<section class="p-4" id="main-content">
    <button class="btn btn-secondary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>
    <div class="container mt-5">
        <p class="h2">Edit Data</p>

        <div class="position-relative">
            <div class="row">
                <div class="col">
                    <div class="card text-center mt-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="p-2">
                                    <h4>Edit Data Barang</h4>
                                </div>
                                <div class="p-2 "><a href="barang.php" class="fa fa-undo" style="text-decoration:none"> Kembali</a></button></div>
                            </div>
                            <hr>

                            <form action="edit_barang_aksi.php" method="post" autocomplete="on">
                                <?php
                                include './../../config/koneksi.php';
                                require_once './../../config/fungsi_rupiah.php';

                                if (isset($_GET['id_barang'])) {
                                    $query = mysqli_query($koneksi, "select * from i_plastik where id_barang='$_GET[id_barang]'")
                                        or die('Ada kesalahan pada query tampil Data  : ' . mysqli_error($mysqli));
                                    $d  = mysqli_fetch_assoc($query);
                                }
                                ?>
                                <div class="container mt-3">
                                    <table class="text-start">
                                        <tr>
                                            <td><label for="ex1" class="">Kode Barang</label></td>
                                            <td>
                                                <div class="form-group row p-2 g-col-6">
                                                    <div class="col-xs-3">
                                                        <input class="form-control" type="text" name="kode_barang" required="required" value="<?php echo $d['kode_barang']; ?>" readonly>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="ex1" class="">Nama Barang</label></td>
                                            <td>
                                                <div class="form-group row p-2 g-col-6">
                                                    <div class="col-xs-3">
                                                        <input class="form-control" type="text" name="nama_barang" value="<?php echo $d['nama_barang']; ?>">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="jenis_kasur" class="form-label">Jenis Barang</label></td>
                                            <td>
                                                <div class="p-2 g-col-6">
                                                    <select class="form-select" name="jenis_barang" id="jenis_barang" class="select_value" data-placeholder="-- Pilih --" autocomplete="on">
                                                        <option value="<?php echo $d['jenis_barang']; ?>"selected><?php echo $d['jenis_barang']; ?></option>
                                                        <?php
                                                        include './../../config/koneksi.php';
                                                        $sql = mysqli_query($koneksi, "SELECT * FROM i_jenis");
                                                        while ($data = mysqli_fetch_array($sql)) {
                                                        ?>
                                                            <option value="<?= $data['jenis_barang'] ?>"><?= $data['jenis_barang'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="ukuran_kasur" class="form-label">Nama Merk</label></td>
                                            <td>
                                                <div class="p-2 g-col-6">
                                                    <select class="form-select" name="nama_merek" id="nama_merek" class="select_value" data-placeholder="-- Pilih --" autocomplete="on">
                                                        <option value="<?php echo $d['nama_merek']; ?>" selected><?php echo $d['nama_merek']; ?></option>
                                                        <?php
                                                        include './../../config/koneksi.php';
                                                        $sql = mysqli_query($koneksi, "SELECT * FROM i_merek");
                                                        while ($data = mysqli_fetch_array($sql)) {
                                                        ?>
                                                            <option value="<?= $data['nama_merek'] ?>"><?= $data['nama_merek'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="ex1" class="">Harga Beli</label></td>
                                            <td>
                                                <div class="form-group row p-2 g-col-6">
                                                    <div class="col-xs-3">
                                                        <input type="numeric" class="form-control" id="harga_beli" name="harga_beli" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo format_rupiah($d['harga_beli']); ?>" required>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="ex1" class="">Harga Jual</label></td>
                                            <td>
                                                <div class="form-group row p-2 g-col-6">
                                                    <div class="col-xs-3">
                                                        <input type="numeric" class="form-control" id="harga_jual" name="harga_jual" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo format_rupiah($d['harga_jual']); ?>" required>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="ex1" class="">Stok</label></td>
                                            <td>
                                                <div class="form-group row p-2 g-col-6">
                                                    <div class="col-xs-3">
                                                        <input class="form-control" type="numeric" name="stok" value="<?php echo $d['stok']; ?>">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="satuan" class="form-label">Satuan</label></td>
                                            <td>
                                                <div class="mb-3 p-2 g-col-6">
                                                    <select class="form-select" name="satuan" id="satuan" class="select_value" data-placeholder="-- Pilih --" autocomplete="on">
                                                        <option value="<?php echo $d['satuan']; ?>"selected><?php echo $d['satuan']; ?></option>
                                                        <option>Pcs</option>
                                                        <option>Lusin</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <button class="btn btn-danger" type="reset" onclick="location.href='barang.php'">Cancel</button>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-success" name="simpan">Submit</button>
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