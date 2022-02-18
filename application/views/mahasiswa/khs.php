  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="nav-icon fas fa-tasks ml-1 mr-2"></i><?= $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa'); ?>">Home</a></li>
              <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <?php foreach ($smt->result() as $tab) :
                  if ($tab->smt != 0) { ?>
                  <li class="nav-item">
                    <a class="nav-link <?php if ($tab->smt === '1') { echo 'active';} ?>" id="custom-tabs-three-home-tab" data-toggle="pill" href="#semester<?= $tab->smt; ?>" role="tab" aria-controls="semester<?= $tab->smt; ?>" aria-selected="true">Semester <?= $tab->smt; ?></a>
                  </li>
                  <?php }endforeach; ?>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">

                <?php foreach ($smt->result() as $tabpanel) :
                  if ($tabpanel->smt != 0) { ?>
                  <div class="tab-pane fade show <?php if ($tabpanel->smt === '1') { echo 'active';} ?>" id="semester<?= $tabpanel->smt; ?>" role="tabpanel" aria-labelledby="semester<?= $tabpanel->smt; ?>-tab">
                    <table class="table table-bordered">
                      <tr style="text-align: center;">
                        <th>No</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Nilai Mutu</th>
                        <th>Nilai Angka</th>
                      </tr>
                      <?php
                        $tsks = 0;
                        $tindex = 0;
                        $no = 1;
                      foreach($nilai->result() as $row) :
                        $smt = $row->smt;
                        if ($smt == $tabpanel->smt) {
                          $sks = $row->SKS;
                          $index = $row->asss;
                          if($row->KodeMatkul){
                      ?>
                      <tr style="text-align: center;">
                        <td><?= $no++; ?></td>
                        <td><?= $row->KodeMatkul; ?></td>
                        <td><?= $row->namamatkul; ?></td>
                        <td><?php if(is_numeric($row->SKS)){ echo $row->SKS; }?></td>
                        <td><?= round($row->nilaiuts); ?></td>
                        <td><?= round($row->nilaiuas); ?></td>
                        <td><?= $row->nilaiakhir; ?></td>
                        <td><?= $row->asss; ?></td>
                      </tr>
                      <?php
                      if(!is_numeric($sks)){ $sks = 0;}
                      if(!is_numeric($index)){ $index = 0;}
                      $tsks += $sks;
											$tindex += ($index * $sks);
                      if($tindex > 0 | $tsks >0){
                        $ip = round($tindex / $tsks, 2);
                      }
                    }
										}
									endforeach; ?>
                        <tr style="text-align: right;">
                        <th colspan="3">TOTAL SKS</th>
                        <td style="text-align: center;"><?= $tsks; ?></td>
                        <th colspan="3">TOTAL IPS</th>
                        <td style="text-align: center;"><?= $ip; ?></td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-6">
                          <a href="<?= base_url('mahasiswa/cetak_khs/') . $tabpanel->smt; ?>" target="_blank" class="btn btn-primary"><i class="fas fa-print mr-2"></i>Cetak KHS</a>
                        </div>
                        <div class="col-6">
                          <p class="card-text float-right"><small class="text-muted">*jika data tidak sesuai, segera hubungi Bagian Akademik Nilai</small></p>
                        </div>
                    </div>
                  </div>
                  <?php }endforeach; ?>

                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



