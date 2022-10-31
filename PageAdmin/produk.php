<div class="row">
  <div class="col-sm-12">
    <div class="card-box table-responsive">
      <h4 class="m-t-0 header-title"><b>Data Produk</b></h4>
      <a href="index.php?Page=ProdukAdd" class="btn btn-success"> <i class="fa fa-plus"></i> <span>Tambah Produk</span> </a>
      <hr>


      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga (Rp.)</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>

          <?php
          $no = 1;
          $sql = mysqli_query($con, "SELECT * FROM produk ORDER BY Nama_produk ASC");
          while ($data = mysqli_fetch_array($sql)) {
          ?>

            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['Nama_produk']; ?></td>
              <td><?= number_format($data['Harga'], 0, ",", "."); ?></td>
              <td>
                <a href="index.php?Page=ProdukUpdate&&Id=<?= $data['Id_produk']; ?>" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> <span>Update</span> </a>
                <a href="produk_delete.php?Id=<?= $data['Id_produk']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Produk : <?= $data['Nama_produk']; ?>')"> <i class="fa fa-trash"></i> <span>Delete</span> </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div> <!-- end row -->