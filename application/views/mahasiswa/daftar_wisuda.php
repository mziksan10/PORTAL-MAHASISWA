  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0"><i class="nav-icon fas fa-graduation-cap ml-1 mr-2"></i><?= $title; ?></h1>
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
      <?php
      if($alumni):?>
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/') ?>dist/img/foto/<?= $alumni->foto; ?>" alt="User profile picture">
          <h3 class="profile-username text-center"><?= $alumni->nama; ?></h3>
          <p class="text-muted text-center">Anda Sudah Terdaftar <i class="fas fa-check"></i></p>
         <a href="<?= base_url('mahasiwa/lihat_alumni');?>" class="btn btn-primary" data-toggle="modal" data-target="#lihat">Lihat Data<i class="fas fa-eye ml-2"></i></a>
        </div>
        <div class="text-center">
        <img src="<?= base_url('assets/'); ?>dist/img/graduation.png" style="width: 50%;">
        <h1 style="font-family: cooper;">Happy Graduation</h1>
        </div>
      </div>
      <!-- Modal Lihat -->
      <div class="modal fade" id="lihat" tabindex="-1" role="dialog" aria-labelledby="lihatLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="lihatLabel"><i class="fas fa-eye"></i> Lihat Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-2">
          <img class="profile-user-img img-fluid" src="<?= base_url('assets/') ?>dist/img/foto/<?= $alumni->foto; ?>" alt="User profile picture" style="width: 100%;">
              </div>
              <div class="col-10">
              <table>
              <tr>
                <th>NPM</th>
                <td>: <?= $alumni->npm; ?></td>
              </tr>
              <tr>
                <th>Nama</th>
                <td>: <?= $alumni->nama; ?></td>
              </tr>
              <tr>
                <th>Tempat/Tanggal Lahir</th>
                <td>: <?= $alumni->tempat_lahir.', '.$alumni->tanggal_lahir; ?></td>
              </tr>
              <tr>
                <th>Program Studi</th>
                <td>: <?= $alumni->prodi; ?></td>
              </tr>
              <tr>
                <th>Pembimbing I</th>
                <td>: <?= $alumni->pembimbing_1; ?></td>
              </tr>
              <tr>
                <th>Pembimbing II</th>
                <td>: <?= $alumni->pembimbing_2; ?></td>
              </tr>
              <tr>
                <th>Judul Karya Ilmiah</th>
                <td>: <?= $alumni->judul_karya_ilmiah; ?></td>
              </tr>
              <tr>
                <th>PKL/Bekerja di</th>
                <td>: <?= $alumni->pkl_atau_bekerja; ?></td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>: <?= $alumni->alamat; ?></td>
              </tr>
              <tr>
                <th>Link Jurnal</th>
                <td>: <?= $alumni->link_jurnal; ?><a href="<?= $alumni->link_jurnal; ?>" class="badge badge-primary ml-2" target="_blank">Lihat Jurnal <i class="fas fa-eye"></i></a></td>
              </tr>
            </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="col">
            <p class="card-text"><small class="text-muted">*Jika ada kesalahan data segera hubungi bagian kemahasiswaan.</small></p>
            </div>
            <div class="col" style="text-align: right;">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
      <?php else:?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Peringatan!</strong><br>Bagi Calon Wisudawan yang akan mengisi Buku Wisuda, harap mengisi dengan benar.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-12">
            <div class="card-body">
                <form action="<?= base_url('mahasiswa/daftar_wisuda_aksi'); ?>">
                <table class="table table-striped">
                    <tr>
                    <th class="col-md-2">Pas Foto 2x3</th>
                    <td><input type="file" class="form-control" name="foto"></td>
                    </tr> 
                    <tr>
                    <th class="col-md-2">NPM</th>
                    <td><input type="text" class="form-control" value="<?= trim($npm); ?>" name="npm"></td>
                    </tr>
                    <tr>
                    <th>Nama Lengkap</th>
                    <td><input type="text" class="form-control"  value="<?= trim(ucwords(strtolower($nama))); ?>" name="nama"></td>
                    </tr>
                    <tr>
                    <th>Tempat Lahir</th>
                    <td><input type="text" class="form-control"  value="<?= trim(ucwords(strtolower($tempat_lahir))); ?>" name="tempat_lahir"></td>
                    </tr>
                    <tr>
                    <th>Tanggal Lahir</th>
                    <td><input type="date" class="form-control"  value="<?= trim($tanggal_lahir); ?>" name="tanggal_lahir"></td>
                    </tr>
                    <tr>
                    <th>Program Studi</th>
                    <td>
                    <select name="prodi" class="form-control">
                      <option value="<?php if($jurusan == 'AKE'){ echo 'Administrasi Keuangan'; }elseif($jurusan == 'KAT'){ echo 'Komputerisasi Akuntansi'; }elseif($jurusan == 'MBIS'){ echo 'Manajemen Bisnis'; }elseif($jurusan == 'AKS'){ echo 'Analis Kesehatan'; }elseif($jurusan == 'FAR'){ echo 'Farmasi'; }elseif($jurusan == 'FIS'){ echo 'Fisioterapi'; }elseif($jurusan == 'IRM'){ echo 'Informatika Rekam Medis'; }elseif($jurusan == 'RMIK'){ echo 'Rekam Medis dan Informasi Kesehatan'; }elseif($jurusan == 'ARS'){ echo 'Administrasi Rumah Sakit'; }elseif($jurusan == 'MIF'){ echo 'Manajemen Informatika'; }elseif($jurusan == 'SI'){ echo 'Sistem Informasi'; }elseif($jurusan == 'TIK'){ echo 'Teknik Informatika'; }elseif($jurusan == 'KAM'){ echo 'Komputer Multimedia'; }else{ echo '-'; }?>"><?php if($jurusan == 'AKE'){ echo 'Administrasi Keuangan'; }elseif($jurusan == 'KAT'){ echo 'Komputerisasi Akuntansi'; }elseif($jurusan == 'MBIS'){ echo 'Manajemen Bisnis'; }elseif($jurusan == 'AKS'){ echo 'Analis Kesehatan'; }elseif($jurusan == 'FAR'){ echo 'Farmasi'; }elseif($jurusan == 'FIS'){ echo 'Fisioterapi'; }elseif($jurusan == 'IRM'){ echo 'Informatika Rekam Medis'; }elseif($jurusan == 'RMIK'){ echo 'Rekam Medis dan Informasi Kesehatan'; }elseif($jurusan == 'ARS'){ echo 'Administrasi Rumah Sakit'; }elseif($jurusan == 'MIF'){ echo 'Manajemen Informatika'; }elseif($jurusan == 'SI'){ echo 'Sistem Informasi'; }elseif($jurusan == 'TIK'){ echo 'Teknik Informatika'; }elseif($jurusan == 'KAM'){ echo 'Komputer Multimedia'; }else{ echo '-'; }?></option>
                      <?php foreach($prodi->result() as $row):{?>
                      <option value="<?= trim(ucwords(strtolower($row->nama_program_studi))); ?>"><?= trim(ucwords(strtolower($row->nama_program_studi))); ?></option>
                      <?php }endforeach;?>
                    </select>  
                    <tr>
                    <th>Pembimbing I</th>
                    <td>
                      <input type="text" class="form-control"  name="pem1">
                    </td>
                    </tr>
                    <tr>
                    <th>Pembimbing II (Opsional)</th>
                    <td><input type="text" class="form-control" name="pem2"></td>
                    </tr>
                    <tr>
                    <th>Judul Karya Ilmiah</th>
                    <td><textarea name="judul" class="form-control" cols="30" rows="10" placeholder="Ketik disini.."></textarea></td>
                    </tr>
                    <tr>
                    <th>Link Jurnal</th>
                    <td><input type="text" class="form-control" name="link"></td>
                    </tr>
                    <tr>
                    <th>PKL/Bekerja di</th>
                    <td><input type="text" class="form-control" name="pkl"></td>
                    </tr>
                    <tr>
                    <th>Alamat Lengkap</th>
                    <td><textarea name="alamat" class="form-control" cols="30" rows="10" placeholder="Ketik disini.."><?= trim($alamat); ?></textarea></td>
                    </tr>
                </table>
                <button class="btn btn-primary"><i class="nav-icon fas fa-save"></i> Simpan</button>
                <span><p class="card-text float-right"><small class="text-muted">*dimohon untuk mengisi data secara lengkap & benar.</small></p></span>    
            </form>
            </div>
            </div>
        </div>
        </div>
      <?php endif;?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



