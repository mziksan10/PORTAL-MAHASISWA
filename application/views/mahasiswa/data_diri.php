  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0"><i class="nav-icon fas fa-user ml-1 mr-2"></i><?= $title; ?></h1>
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
      <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-12">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                    <th class="col-md-2">NPM</th>
                    <td>: <?= $npm; ?></td>
                    </tr>
                    <tr>
                    <th>Program Studi</th>
                    <td>: <?php if($jurusan == 'AKE'){ echo 'Administrasi Keuangan'; }elseif($jurusan == 'KAT'){ echo 'Komputerisasi Akuntansi'; }elseif($jurusan == 'MBIS'){ echo 'Manajemen Bisnis'; }elseif($jurusan == 'AKS'){ echo 'Analis Kesehatan'; }elseif($jurusan == 'FAR'){ echo 'Farmasi'; }elseif($jurusan == 'FIS'){ echo 'Fisioterapi'; }elseif($jurusan == 'IRM'){ echo 'Informatika Rekam Medis'; }elseif($jurusan == 'RMIK'){ echo 'Rekam Medis dan Informasi Kesehatan'; }elseif($jurusan == 'ARS'){ echo 'Administrasi Rumah Sakit'; }elseif($jurusan == 'MIF'){ echo 'Manajemen Informatika'; }elseif($jurusan == 'SI'){ echo 'Sistem Informasi'; }elseif($jurusan == 'TIK'){ echo 'Teknik Informatika'; }elseif($jurusan == 'KAM'){ echo 'Komputer Multimedia'; }else{ echo '-'; }?></td>
                    </tr>
                    <tr>
                    <th>Kelas</th>
                    <td>: <?= $kelas; ?></td>
                    </tr>
                    <tr>
                    <th>Semester</th>
                    <td>: <?= $semester; ?></td>
                    </tr>
                    <tr>
                    <th>Nama Lengkap</th>
                    <td>: <?= ucwords(strtolower($nama)); ?></td>
                    </tr>
                    <tr>
                    <th>Tempat Lahir</th>
                    <td>: <?= ucwords(strtolower($tempat_lahir)); ?></td>
                    </tr>
                    <tr>
                    <th>Tanggal Lahir</th>
                    <td>: <?= $tanggal_lahir; ?></td>
                    </tr>
                    <tr>
                    <th>Kelamin</th>
                    <td>: 
                    <?php
                      if (trim($kelamin) == 'P'){
                          echo "Perempuan";
                      }elseif(trim($kelamin) == 'L'){
                        echo "Laki-laki";
                      }
                    ?>
                    </td>
                    </tr>
                    <th>Agama</th>
                    <td>: <?= ucwords(strtolower($agama)); ?></td>
                    </tr>
                    <th>Alamat</th>
                    <td>: <?= ucwords(strtolower($alamat)); ?></td>
                    </tr>
                    <th>No. Handphone</th>
                    <td>: <?= $no_hp; ?></td>
                    </tr>
                </table>
                <p class="card-text float-right"><small class="text-muted">*jika data tidak sesuai, segera hubungi Bagian Front Office</small></p>
            </div>
            </div>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



