<?php
include "../layout/navbar.php";
?>

<section class="p-4" id="main-content">
    <button class="btn btn-secondary" id="button-toggle">
        <i class="bi bi-list"></i>
    </button>
    <div class="container mt-5">
        <p class="h2">Rekap Barang Masuk</p>

        <div class="position-relative">
            <div class="row">
                <div class="col">
                    <div class="card text-center mt-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="p-2">
                                    <h4>Tabel Data Barang Masuk</h4>
                                </div>
                                <div class="p-2 "><a href="print_masuk.php" class="fa fa-download" style="text-decoration:none"> Cetak Data</a></button></div>
                            </div>
                            <div class="contact-form">
                                <div class="container">
                                    <form method="get" action="cetak_barang_masuk.php">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-4">
                                                <div class="container mt-3">
                                                    <table class="text-start">
                                                        <tr>
                                                            <td><label for="ex1" class="">dari tanggal</label></td>
                                                            <td>
                                                                <div class="form-group row p-2 g-col-6">
                                                                    <div class="col-xs-3">
                                                                        <input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" placeholder="Tanggal Awal" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="ex1" class="">sampai tanggal</label></td>
                                                            <td>
                                                                <div class="form-group row p-2 g-col-6">
                                                                    <div class="col-xs-3">
                                                                        <input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" placeholder="Tanggal Akhir" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <?php
                                                                if (isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                                                                    echo '<a href="cetak_barang_masuk.php" class="btn btn-default">RESET</a>';
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                    </form>

                                    <?php
                                    // Load file koneksi.php
                                    include './../../config/koneksi.php';

                                    $tgl_awal = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
                                    $tgl_akhir = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

                                    if (empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
                                        // Buat query untuk menampilkan semua data transaksi
                                        $query = "SELECT i_barangmasuk.kode_transaksi, i_barangmasuk.tgl_input, i_plastik.nama_barang, i_barangmasuk.jumlah_masuk, i_supplier.nama_supplier, i_barangmasuk.satuan FROM i_barangmasuk 
                                        inner join i_plastik on i_plastik.kode_barang = i_barangmasuk.kode_barang 
                                        inner join i_supplier on i_supplier.kode_supplier = i_barangmasuk.kode_supplier";
                                        $url_cetak = "print_masuk.php";
                                        $label = "Semua Data Transaksi";
                                    } else { // Jika terisi
                                        // Buat query untuk menampilkan data transaksi sesuai periode tanggal
                                        $query = "SELECT i_barangmasuk.kode_transaksi, i_barangmasuk.tgl_input, i_plastik.nama_barang, i_barangmasuk.jumlah_masuk, i_supplier.nama_supplier, i_barangmasuk.satuan FROM i_barangmasuk 
                                        inner join i_plastik on i_plastik.kode_barang = i_barangmasuk.kode_barang 
                                        inner join i_supplier on i_supplier.kode_supplier = i_barangmasuk.kode_supplier WHERE (i_barangmasuk.tgl_input BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "')";
                                        $url_cetak = "print_masuk.php?tgl_awal=" . $tgl_awal . "&tgl_akhir=" . $tgl_akhir . "&filter=true";
                                        $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
                                        $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
                                        $label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
                                    }
                                    ?>
                                    <hr />
                                    <h4 style="margin-bottom: 5px;"><b>Data Transaksi</b></h4>
                                    <?php echo $label ?><br />

                                    <div style="margin-top: 5px;">
                                        <a href="<?php echo $url_cetak ?>">CETAK PDF</a>
                                    </div>

                                    <div class="table-responsive" style="margin-top: 10px;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Kode Transaksi</th>
                                                    <th>Nama Barang</th>
                                                    <th>Nama Supplier</th>
                                                    <th>Jumlah</th>
                                                    <th>satuan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // error_reporting(E_ALL ^ E_NOTICE);
                                                $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                                                $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

                                                if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                                                    while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                                        $tgl = date('d-m-Y', strtotime($data['tgl_input'])); // Ubah format tanggal jadi dd-mm-yyyy

                                                        echo "<tr>";
                                                        echo "<td>" . $tgl . "</td>";
                                                        echo "<td>" . $data['kode_transaksi'] . "</td>";
                                                        echo "<td>" . $data['nama_barang'] . "</td>";
                                                        echo "<td>" . $data['nama_supplier'] . "</td>";
                                                        echo "<td>" . $data['jumlah_masuk'] . "</td>";
                                                        echo "<td>" . $data['satuan'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else { // Jika data tidak ada
                                                    echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Include File JS Bootstrap -->
                                <script src="./../../libraries/js/bootstrap.min.js"></script>

                                <!-- Include library Bootstrap Datepicker -->
                                <script src="./../../libraries/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

                                <!-- Include File JS Custom (untuk fungsi Datepicker) -->
                                <script src="./../../libraries/js/custom.js"></script>

                                <script>
                                    $(document).ready(function() {
                                        setDateRangePicker(".tgl_awal", ".tgl_akhir")
                                    })
                                </script>
                                <script>
                                    $(document).ready(function() {
                                        $('#tabel-data').DataTable();
                                    });
                                </script>
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