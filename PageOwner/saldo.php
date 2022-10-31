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

<div class="ex-page-content text-xs-center">
    <h1 class="text-uppercase text-dark">Saldo :</h1>
    <h2 class="m-b-20">Rp. <span data-plugin="counterup"><?= number_format($pemasukan - $pengeluaran, 0, ",", ","); ?></span></h2>
    <br>
    <a class="btn btn-pink waves-effect waves-light" href="index.php"> Return Home</a>
</div>