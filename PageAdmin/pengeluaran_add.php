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
                        <form action="pengeluaran_add_proses.php" method="POST" data-parsley-validate novalidate>

                            <div class="form-group">
                                <label>Tanggal<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="Tanggal" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" />
                                    <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Keterangan<span class="text-danger">*</span></label>
                                <input type="text" name="Keterangan" parsley-trigger="change" required class="form-control" placeholder="Keterangan">
                            </div>

                            <div class="form-group">
                                <label>Nominal<span class="text-danger">*</span></label>
                                <input type="number" name="Nominal" parsley-trigger="change" required class="form-control" placeholder="Nominal">
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