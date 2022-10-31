<div class="row">
  <div class="col-sm-12">
    <div class="card-box table-responsive">
      <h4 class="m-t-0 header-title"><b>Data Pemasukan</b></h4>
      <a href="index.php?Page=PemasukanAdd" class="btn btn-success"> <i class="fa fa-plus"></i> <span>Tambah Transaksi</span> </a>
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
            <th>Aksi</th>
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
              <td>
                <a href="index.php?Page=PemasukanUpdate&&Id=<?= $data['Id_masuk']; ?>" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> <span>Update</span> </a>
                <a href="pemasukan_delete.php?Id=<?= $data['Id_masuk']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data ?')"> <i class="fa fa-trash"></i> <span>Delete</span> </a>
              </td>
            </tr>
          <?php
            $ttl = $ttl + $sub;
          }
          ?>
        </tbody>
        <tr>
          <th colspan="5">TOTAL</th>
          <th colspan="2"><?= number_format($ttl, 0, ",", ".");; ?></th>
        </tr>
      </table>
    </div>
  </div>
</div> <!-- end row -->