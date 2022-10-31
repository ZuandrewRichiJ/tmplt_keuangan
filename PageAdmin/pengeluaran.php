<div class="row">
  <div class="col-sm-12">
    <div class="card-box table-responsive">
      <h4 class="m-t-0 header-title"><b>Data Pengeluaran</b></h4>
      <a href="index.php?Page=PengeluaranAdd" class="btn btn-success"> <i class="fa fa-plus"></i> <span>Tambah Transaksi</span> </a>
      <hr>


      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Nominal (Rp)</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>

          <?php
          error_reporting(0);
          $no = 1;
          $sql = mysqli_query($con, "SELECT * FROM pengeluaran ORDER BY Id_keluar DESC");
          while ($data = mysqli_fetch_array($sql)) {
          ?>

            <tr>
              <td><?= $no++; ?></td>
              <td><?= DATE('d/F/Y', strtotime($data['Tanggal'])) ?></td>
              <td><?= $data['Keterangan']; ?></td>
              <td><?= number_format($data['Nominal'], 0, ",", "."); ?></td>
              <td>
                <a href="index.php?Page=PengeluaranUpdate&&Id=<?= $data['Id_keluar']; ?>" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> <span>Update</span> </a>
                <a href="pengeluaran_delete.php?Id=<?= $data['Id_keluar']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data ?')"> <i class="fa fa-trash"></i> <span>Delete</span> </a>
              </td>
            </tr>
          <?php
            $ttl = $ttl + $data['Nominal'];
          }
          ?>
        </tbody>
        <tr>
          <th colspan="3">TOTAL</th>
          <th colspan="2"><?= number_format($ttl, 0, ",", ".");; ?></th>
        </tr>
      </table>
    </div>
  </div>
</div> <!-- end row -->