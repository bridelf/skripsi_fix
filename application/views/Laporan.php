 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 font-weight-bold text-primary">BUKU KAS</h1>
<hr>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

    <form action="<?= base_url('Laporan') ?>" method="post">
      <div class="row">

        <h5 class="font-weight-bold mt-2 ml-3">Periode</h5>

        <div class="col-md-2">
          <input type="date" class="form-control" name="awal">
        </div>

        <div class="col-md-2">
          <input type="date" class="form-control" name="akhir">
        </div>

        <div class="col-md-2">
          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
          <a href="<?= base_url('Laporan/cetak?awal='.$awal .'&'.'akhir='. $akhir) ?>" class='btn btn-success' target="_blank"><i class='fas fa-print'></i></a>
        </div>

      </div>

    </form>
  
    </div>
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
                        <th colspan="4"></th>
                        
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
