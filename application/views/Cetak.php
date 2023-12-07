<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $website[0]['nama'] ?></title>
    <!-- Favicons -->
    <link href="<?= base_url('assets/admin/img/') ?><?= $website[0]['logo'] ?>" rel="icon">
    <link href="<?= base_url('assets/admin/') ?>img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->

    <link href="<?= base_url('assets/admin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>summernote/summernote-bs4.min.css">
    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/admin/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/admin/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Uraian Kas</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($kas_umum)) : ?>
                        <tr>
                            <td colspan="7" class="text-center">
                                <div class="alert alert-danger" role="alert">
                                    Data kosong!
                                </div>
                            </td>
                        </tr>
                    <?php endif ?>

                    <?php
                      $no = 1;
                      foreach ($kas_umum as $kas) { ?>

                      <tr>
                          <th class="text-center"><?= $no++ ?></th>
                          <th><?= $kas['tanggal'] ?></th>
                          <th><?= $kas['uraian'] ?></th>

                          <?php
                            if($kas['masuk']=="0"){
                              echo"<th class='text-center'>-</th>";
                            }else{
                              echo "<th>Rp. " . number_format($kas['masuk'], 0, ".", ".") . "</th>";
                            }
                          ?>

                          <?php
                            if($kas['keluar']=="0"){
                              echo"<th class='text-center'>-</th>";
                            }else{
                              echo "<th>Rp. " . number_format($kas['keluar'], 0, ".", ".") . "</th>";
                            }
                          ?>
                      </tr>
                    <?php } ?>

                    <!-- total -->
                    <tr class="font-weight-bold text-primary">
                        <th colspan="3">Total</th>

                        <th> Rp. <?= number_format($tot_masuk[0]['masuk'], 0, ".", ".") ?></th>
                        <th> Rp. <?= number_format($tot_keluar[0]['keluar'], 0, ".", ".") ?></th>
                        
                        
                    </tr>

                    <!-- Saldo -->
                    <tr class="font-weight-bold text-primary">
                        <th colspan="3">Saldo</th>
                        
                        <?php 
                          $masuk = $tot_masuk[0]['masuk'];
                          $keluar = $tot_keluar[0]['keluar'];
                          $saldo =  $masuk-$keluar;
                           echo "<th colspan='2' class='text-center'>Rp. " . number_format($saldo, 0, ".", ".") . "</th>";
                        ?>
                        
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
       
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <script type="text/javascript">
        window.print();
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/admin/') ?>js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Page level plugins -->
    <script src="<?= base_url('assets/admin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/admin/') ?>js/demo/datatables-demo.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/admin/') ?>js/sb-admin-2.min.js"></script>
    <!-- <script src="<?= base_url('assets/admin/') ?>summernote/summernote-bs4.min.js"></script> -->
    <script src="<?= base_url('assets/admin/') ?>dist/sweetalert2.all.min.js"></script>
    <!-- <script src="<?= base_url('assets/admin/') ?>dist/myscript.js"></script> -->

    <script src="<?= base_url('assets/admin/') ?>ckeditor/ckeditor.js"></script>
    </body>

 </html>