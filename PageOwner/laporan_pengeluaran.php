<div class="row">
    <div class="col-xs-12">
        <div class="card-box">

            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <h4 class="header-title m-t-0">Laporan Data Pengeluaran</h4>
                    <hr>

                    <div class="p-20">
                        <form action="index.php?Page=LaporanPengeluaran" method="POST" data-parsley-validate novalidate>
                            <div class="form-group">
                                <label>Pilih Periode Tanggal :</label>
                                <div>
                                    <div class="input-daterange input-group" id="date-range">
                                        <input type="text" class="form-control" name="start" />
                                        <span class="input-group-addon bg-custom b-0">Sampai</span>
                                        <input type="text" class="form-control" name="end" />
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect waves-light" name="Submit" type="submit">
                                Tampilkan Data
                            </button>
                            <hr>
                        </form>
                        <?php
                        error_reporting(0);
                        include '../config.php';

                        if (isset($_POST['Submit'])) {
                            $start = $_POST['start'];
                            $end = $_POST['end'];
                            if (empty($start) || empty($end)) {
                                //jika data tanggal kosong
                        ?>
                                <script language="JavaScript">
                                    alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                                    document.location = 'index.php?Page=LaporanPengeluaran';
                                </script>
                            <?php
                            } else {
                                $no = 1;
                                $sql = "SELECT * FROM pengeluaran WHERE Tanggal BETWEEN '$start' AND '$end' ORDER BY Tanggal DESC";
                                $query = mysqli_query($con, $sql);
                            }
                            ?>
                            <a href="laporan_pengeluaran_print.php?sql=<?= $sql; ?>&&start=<?= $start; ?>&&end=<?= $end; ?>" target="" type="button" class="btn btn-danger waves-effect waves-light">
                            <span class="btn-label"><i class="fa fa-print"></i>
                            </span>Print PDF</a>
                            <p></p>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Nominal</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= DATE('d/F/Y', strtotime($row['Tanggal'])); ?></td>
                                            <td><?= $row['Keterangan']; ?></td>
                                            <td><?= number_format($row['Nominal'], 0, ",", "."); ?></td>
                                        </tr>
                                    <?php
                                        $ttl = $ttl + $row['Nominal'];
                                    }
                                    ?>
                                </tbody>
                                <tr>
                                    <th colspan="3">TOTAL</th>
                                    <th><?= number_format($ttl, 0, ",", ".");
                                    } ?></th>
                                </tr>
                            </table>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>