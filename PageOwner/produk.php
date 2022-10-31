<div class="row">
  <div class="col-sm-12">
    <div class="card-box table-responsive">
      <h4 class="m-t-0 header-title"><b>Data Produk</b></h4>

      <hr>


      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga (Rp.)</th>
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
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div> <!-- end row -->