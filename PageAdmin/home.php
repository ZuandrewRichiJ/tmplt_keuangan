<?php
error_reporting(0);
$sql = mysqli_query($con, "SELECT * FROM pemasukan, produk WHERE pemasukan.Id_produk=produk.Id_produk ORDER BY Id_masuk DESC");
while ($data = mysqli_fetch_array($sql)) {
  $sub = $data['Harga'] * $data['Qty'];
  $pemasukan  = $pemasukan + $sub;
  $produklaku = $produklaku + $data['Qty'];
}
$sql2 = mysqli_query($con, "SELECT * FROM pengeluaran");
while ($data = mysqli_fetch_array($sql2)) {
  $pengeluaran = $pengeluaran + $data['Nominal'];
}
?>

<div class="row">
  <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
    <div class="card-box tilebox-one">
      <i class="ion-card pull-xs-right text-muted"></i>
      <h6 class="text-muted text-uppercase m-b-20">Saldo</h6>
      <h2 class="m-b-20">Rp. <span data-plugin="counterup"><?= number_format($pemasukan - $pengeluaran, 0, ",", ","); ?></span></h2>
    </div>
  </div>

  <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
    <div class="card-box tilebox-one">
      <i class="ion-cash pull-xs-right text-muted"></i>
      <h6 class="text-muted text-uppercase m-b-20">Pemasukan</h6>
      <h2 class="m-b-20">Rp. <span data-plugin="counterup"><?= number_format($pemasukan, 0, ",", ","); ?></span></h2>
    </div>
  </div>

  <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
    <div class="card-box tilebox-one">
      <i class="ion-cash pull-xs-right text-muted"></i>
      <h6 class="text-muted text-uppercase m-b-20">Pengeluaran</h6>
      <h2 class="m-b-20">Rp. <span data-plugin="counterup"><?= number_format($pengeluaran, 0, ",", ","); ?></span></h2>
    </div>
  </div>

  <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
    <div class="card-box tilebox-one">
      <i class="ion-ios7-cart pull-xs-right text-muted"></i>
      <h6 class="text-muted text-uppercase m-b-20">Product Terjual</h6>
      <h2 class="m-b-20" data-plugin="counterup"><?= $produklaku; ?></h2>
    </div>
  </div>
</div>