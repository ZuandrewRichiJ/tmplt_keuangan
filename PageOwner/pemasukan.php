<div class="row">
  <div class="col-sm-12">
    <div class="card-box table-responsive">
      <h4 class="m-t-0 header-title"><b>Data Pemasukan</b></h4>
      <hr>


      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
          </tr>
        </thead>

        <tbody>

          <?php
          error_reporting(0);
          $no = 1;
          $sql = mysqli_query($con, "SELECT * FROM pemasukan, produk WHERE pemasukan.Id_produk=produk.Id_produk ORDER BY Id_masuk DESC");
          while ($data = mysqli_fetch_array($sql)) {
            $sub = $data['Harga'] * $data['Qty'];
          ?>

            <tr>
              <td><?= $no++; ?></td>
              <td><?= DATE('d/F/Y', strtotime($data['Tanggal'])); ?></td>
              <td><?= $data['Nama_produk']; ?></td>
              <td><?= number_format($data['Harga'], 0, ",", "."); ?></td>
              <td><?= $data['Qty']; ?></td>
              <td><?= number_format($sub, 0, ",", "."); ?></td>
            </tr>
          <?php
            $ttl = $ttl + $sub;
          }
          ?>
        </tbody>
        <tr>
          <th colspan="5">TOTAL</th>
          <th><?= number_format($ttl, 0, ",", ".");; ?></th>
        </tr>
      </table>
    </div>
  </div>
</div> <!-- end row -->