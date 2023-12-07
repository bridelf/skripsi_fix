 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 font-weight-bold text-primary ml-2">BUKU KAS</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
       <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#kas_masuk"> <i class="fas fa-arrow-down"></i> Kas Masuk</button>
       <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#kas_keluar"> <i class="fas fa-arrow-up"></i> Kas Keluar</button>
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
                        <th colspan="2">Action</th>
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

                          <th class="text-center">
                            <a type="buuton" data-toggle="modal" data-target="#edit_<?= $kas['id'] ?>"><i class="fas fa-edit text-success"></i> Edit</a>
                          </th>
                          <th class="text-center">
                          <a href="<?= base_url('Kas_umum/hapus/' . $kas['id']) ?>" class="tombol-hapus" ><i class="fas fa-trash text-danger"></i> Hapus</a>
                          </th>
                      </tr>
                    <?php } ?>

                    <!-- total -->
                    <tr class="font-weight-bold text-primary">
                        <th colspan="3">Total</th>

                        <th> Rp. <?= number_format($tot_masuk[0]['masuk'], 0, ".", ".") ?></th>
                        <th> Rp. <?= number_format($tot_keluar[0]['keluar'], 0, ".", ".") ?></th>
                        <th colspan="2"></th>
                        
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

<!-- Modal tambah kas masuk-->
<div class="modal fade" id="kas_masuk" tabindex="-1" aria-labelledby="kas_masuk" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold text-primary" id="kas_masuk">Tambah Kas Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Kas_umum/tambah_masuk') ?>" method="post">
          <div class="modal-body">
          
              <div class="form-group">
                <label class="font-weight-bold" for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
              </div>

              <div class="form-group">
                <label class="font-weight-bold" for="masuk">Kas Masuk</label>
                <input type="number" class="form-control" id="masuk" name="masuk" placeholder="Kas Masuk">
              </div>
          
              <div class="form-group">
                <label class="font-weight-bold" for="uraian">Uraian Kas</label>
                <textarea class="form-control" id="uraian" name="uraian" rows="3"></textarea>
              </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
    </form>
  </div>
</div>


<!-- Modal tambah kas keluar-->
<div class="modal fade" id="kas_keluar" tabindex="-1" aria-labelledby="kas_keluar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold text-primary" id="kas_keluar">Tambah Kas Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Kas_umum/tambah_keluar') ?>" method="post">
          <div class="modal-body">
            
              <div class="form-group">
                <label class="font-weight-bold" for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
              </div>

              <div class="form-group">
                <label class="font-weight-bold" for="keluar">Kas Keluar</label>
                <input type="number" class="form-control" id="keluar" name="keluar" placeholder="Kas Keluar">
              </div>
          
              <div class="form-group">
                <label class="font-weight-bold" for="uraian">Uraian Kas</label>
                <textarea class="form-control" id="uraian" name="uraian" rows="3"></textarea>
              </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
    </form>
  </div>
</div>



<!-- Modal edit kas masuk-->
<?php foreach ($kas_umum as $kas1) { ?>

      <div class="modal fade" id="edit_<?= $kas1['id'] ?>" tabindex="-1" aria-labelledby="kas_masuk" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title font-weight-bold text-primary" id="kas_masuk">Edit Kas Umum</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url('Kas_umum/edit_kas') ?>" method="post">
                <div class="modal-body">

                    <input type="text" class="form-control" id="id" name="id" value="<?= $kas1['id'] ?>" hidden >
                
                    <div class="form-group">
                      <label class="font-weight-bold" for="tanggal">Tanggal</label>
                      <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $kas1['tanggal'] ?>">
                    </div>

                    <?php
                        if ($kas1['jenis_kas'] == "masuk") {
                          echo '
                            <div class="form-group">
                              <label class="font-weight-bold" for="masuk">Kas Masuk</label>
                              <input type="number" class="form-control" id="masuk" name="masuk" value="' . $kas1["masuk"] . '">
                            </div>';
                        } else {
                          echo '
                            <div class="form-group">
                              <label class="font-weight-bold" for="keluar">Kas Keluar</label>
                              <input type="number" class="form-control" id="keluar" name="keluar" value="' . $kas1["keluar"] . '">
                            </div>';
                        }
                      ?>
                
                    <div class="form-group">
                      <label class="font-weight-bold" for="uraian">Uraian Kas</label>
                      <textarea class="form-control" id="uraian" name="uraian" rows="3"><?= $kas1['uraian'] ?></textarea>
                    </div>
                
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
          </form>
        </div>
      </div>
<?php } ?>
