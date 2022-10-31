<div class="row">
  <div class="col-sm-12">
    <div class="card-box table-responsive">
      <h4 class="m-t-0 header-title"><b>Data Pengeluaran</b></h4>
      <hr>


      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Nominal (Rp)</th>
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