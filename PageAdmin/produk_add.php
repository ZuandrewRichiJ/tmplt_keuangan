    <div class="row">
      <div class="col-xs-12">
        <div class="card-box">

          <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12">

              <h4 class="header-title m-t-0">Tambah Produk</h4>
              <p class="text-muted font-13 m-b-10">
                <span class="text-danger">*</span>
                Wajib diisi.
              </p>

              <div class="p-20">
                <form action="produk_add_proses.php" method="POST" data-parsley-validate novalidate>

                  <div class="form-group">
                    <label>Nama Produk<span class="text-danger">*</span></label>
                    <input type="text" name="NamaProduk" parsley-trigger="change" required class="form-control" placeholder="Input Nama Produk">
                  </div>
                  <div class="form-group">
                    <label>Harga<span class="text-danger">*</span></label>
                    <input type="number" name="Harga" parsley-trigger="change" required class="form-control" placeholder="Input Harga">
                  </div>

                  <div class="form-group text-right m-b-0">
                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                      Submit
                    </button>
                    <a href="index.php?Page=Produk" type="reset" class="btn btn-secondary waves-effect m-l-5">
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