<?php
include '../config.php';

date_default_timezone_set("Asia/Jakarta");
?>

<div class="row">
  <div class="col-xs-12">
    <div class="card-box">

      <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12">

          <h4 class="header-title m-t-0">Transaksi</h4>
          <p class="text-muted font-13 m-b-10">
            <span class="text-danger">*</span>
            Wajib diisi.
          </p>

          <div class="p-20">
            <form action="pemasukan_add_proses.php" method="POST" data-parsley-validate novalidate>

              <div class="form-group">
                <label>Tanggal<span class="text-danger">*</span></label>
                <div>
                  <div class="input-group">
                    <input type="text" name="Tanggal" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" />
                    <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                  </div>
                  <!-- input-group -->
                </div>
              </div>

              <div class="form-group">
                <label>Nama Produk<span class="text-danger">*</span></label>
                <select class="form-control select2" name="Produk">
                  <option disabled selected>Pilih Produk</option>

                  <?php
                  $sql = mysqli_query($con, "SELECT * FROM produk ORDER BY Nama_produk ");
                  while ($data = mysqli_fetch_array($sql)) {
                  ?>

                    <option value="<?= $data['Id_produk']; ?>"><?= $data['Nama_produk']; ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Qty<span class="text-danger">*</span></label>
                <input type="number" name="Qty" parsley-trigger="change" required class="form-control" placeholder="Jumlah">
              </div>

              <div class="form-group text-right m-b-0">
                <button class="btn btn-primary waves-effect waves-light" type="submit">
                  Submit
                </button>
                <a href="index.php?Page=Pemasukan" type="reset" class="btn btn-secondary waves-effect m-l-5">
                  Cancel
                </a>
              </div>
            </form>
          </div>

        </div>
      </div>
      <!-- end row -->

    </div>
  </div><!-- end col-->

</div>