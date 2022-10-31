<?php
include '../config.php';

$Id = $_GET['Id'];
$sql = mysqli_query($con, "SELECT * FROM user WHERE Id=$Id AND Level='Admin' ");
while ($data = mysqli_fetch_array($sql)) {
?>

  <div class="row">
    <div class="col-xs-12">
      <div class="card-box">

        <div class="row">
          <div class="col-sm-12 col-xs-12 col-md-12">

            <h4 class="header-title m-t-0">Update Profil</h4>
            <p class="text-muted font-13 m-b-10">
              <span class="text-danger">*</span>
              Wajib diisi.
            </p>

            <div class="p-20">
              <form action="profil_update.php" method="POST" data-parsley-validate novalidate>
                <input type="hidden" name="Id" value="<?php echo $data['Id']; ?>">

                <div class="form-group">
                  <label for="userName">Nama<span class="text-danger">*</span></label>
                  <input type="text" name="Nama" parsley-trigger="change" required class="form-control" value="<?php echo $data['Nama']; ?>">
                </div>
                <div class="form-group">
                  <label for="emailAddress">Username<span class="text-danger">*</span></label>
                  <input type="email" name="Username" parsley-trigger="change" required class="form-control" value="<?php echo $data['Username']; ?>">
                </div>
                <div class="form-group">
                  <label for="pass1">Password<span class="text-danger">*</span></label>
                  <input id="pass1" type="password" name="Password" required class="form-control" value="<?php echo $data['Password']; ?>">
                </div>

                <div class="form-group text-right m-b-0">
                  <button class="btn btn-primary waves-effect waves-light" type="submit">
                    Submit
                  </button>
                  <a href="index.php" type="reset" class="btn btn-secondary waves-effect m-l-5">
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

<?php } ?>