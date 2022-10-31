<?php
include '../config.php';
session_start();
if ($_SESSION['Level'] != "Owner") {
  header("location:../index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
  <meta name="author" content="Coderthemes">

  <link rel="shortcut icon" href="../assets/images/UIR.png">

  <title>Sistem Keuangan Berbasis Web</title>

  <!-- DataTables -->
  <link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <!-- Plugins css -->
  <link href="../assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
  <link href="../assets/plugins/mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
  <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="../assets/plugins/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
  <link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="../assets/plugins/morris/morris.css">
  <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
  <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
  <script src="../assets/js/modernizr.min.js"></script>

</head>


<body class="fixed-left">

  <!-- Begin page -->
  <div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

      <!-- LOGO -->
      <div class="topbar-left">
        <a href="index.php" class="logo">
          <i class="zmdi zmdi-group-work icon-user"></i>
          <span>OWNER</span></a>
      </div>


      <nav class="navbar navbar-custom">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <button class="button-menu-mobile open-left waves-light waves-effect">
              <i class="zmdi zmdi-menu"></i>
            </button>
          </li>
        </ul>

        <ul class="nav navbar-nav pull-right">

          <li class="nav-item dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <img src="../assets/images/users/user.png" alt="user" class="img-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown " aria-labelledby="Preview">
              <!-- item-->
              <div class="dropdown-item noti-title">
                <h5 class="text-overflow"><small>Welcome ! <?= $_SESSION['Username']; ?></small> </h5>
              </div>

              <!-- item-->
              <a href="index.php?Page=Profil&&Id=2" class="dropdown-item notify-item">
                <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
              </a>
              <!-- item-->
              <a href="../logout.php" class="dropdown-item notify-item">
                <i class="zmdi zmdi-power"></i> <span>Logout</span>
              </a>

            </div>
          </li>

        </ul>

      </nav>

    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
      <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
          <ul>
            <li class="text-muted menu-title">Menu</li>

            <li class="has_sub">
              <a href="index.php" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span> Dashboard </span> </a>
            </li>
            <li class="has_sub">
              <a href="index.php?Page=Saldo" class="waves-effect"><i class="zmdi zmdi-card"></i><span> Saldo </span> </a>
            </li>
            <li class="has_sub">
              <a href="index.php?Page=Produk" class="waves-effect"><i class="zmdi zmdi-mall"></i><span> Data Produk </span> </a>
            </li>
            <li class="has_sub">
              <a href="index.php?Page=Pemasukan" class="waves-effect"><i class="zmdi zmdi-assignment-returned"></i><span> Data Pemasukan </span> </a>
            </li>
            <li class="has_sub">
              <a href="index.php?Page=Pengeluaran" class="waves-effect"><i class="zmdi zmdi-assignment-return"></i><span> Data Pengeluaran </span> </a>
            </li>
            <li class="has_sub">
              <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-assignment"></i> <span> Laporan </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">
                <li><a href="index.php?Page=LaporanPemasukan">Pemasukan</a></li>
                <li><a href="index.php?Page=LaporanPengeluaran">Pengeluaran</a></li>
              </ul>
            </li>
            <li class="has_sub">
              <a href="../logout.php" class="waves-effect"><i class="zmdi zmdi-sign-in"></i><span> Logout </span> </a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

      </div>

    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
      <!-- Start content -->
      <div class="content">
        <div class="container">

          <div class="row">
            <div class="col-xs-12">
              <div class="page-title-box">
                <h4 class="page-title">Sistem Informasi Keuangan Berbasis Web</h4>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>

          <?php
          if (isset($_GET['Page'])) {
            $Page = $_GET['Page'];


            switch ($Page) {
              case 'Profil':
                include "profil.php";
                break;

                //BARANG
              case 'Produk':
                include "produk.php";
                break;

                //PEMASUKAN
              case 'Pemasukan':
                include "pemasukan.php";
                break;
              case 'LaporanPemasukan':
                include "laporan_pemasukan.php";
                break;

                //PENGELUARAN
              case 'Pengeluaran':
                include "pengeluaran.php";
                break;
              case 'LaporanPengeluaran':
                include "laporan_pengeluaran.php";
                break;

              case 'Saldo':
                include "saldo.php";
                break;

                //PAGE NOT FOUND
              default:
                require "404.php";
                break;
            }
          } else {
            include "home.php";
          }


          ?>


        </div> <!-- container -->
      </div> <!-- content -->
    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

    <footer class="footer text-right">
      2020 © Teknik Informatika - Universitas Islam Riau.
    </footer>


  </div>
  <!-- END wrapper -->


  <script>
    var resizefunc = [];
  </script>

  <!-- jQuery  -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/tether.min.js"></script>

  <!-- Tether for Bootstrap -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/detect.js"></script>
  <script src="../assets/js/fastclick.js"></script>
  <script src="../assets/js/jquery.blockUI.js"></script>
  <script src="../assets/js/waves.js"></script>
  <script src="../assets/js/jquery.nicescroll.js"></script>
  <script src="../assets/js/jquery.scrollTo.min.js"></script>
  <script src="../assets/js/jquery.slimscroll.js"></script>
  <script src="../assets/plugins/switchery/switchery.min.js"></script>

  <!-- Required datatable js -->
  <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- DatePicker -->
  <script src="../assets/plugins/moment/moment.js"></script>
  <script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <script src="../assets/plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="../assets/plugins/clockpicker/bootstrap-clockpicker.js"></script>
  <script src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="../assets/pages/jquery.form-pickers.init.js"></script>

  <script src="../assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="../assets/plugins/multiselect/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="../assets/pages/jquery.formadvanced.init.js"></script>

  <!-- Counter Up  -->
  <script src="../assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
  <script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>

  <!-- App js -->
  <script src="../assets/js/jquery.core.js"></script>
  <script src="../assets/js/jquery.app.js"></script>

  <!-- Page specific js -->
  <script src="../assets/pages/jquery.dashboard.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').DataTable();

      //Buttons examples
      var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
      });

      table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });
  </script>

</body>

</html>