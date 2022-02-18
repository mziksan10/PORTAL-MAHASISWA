
<body class="hold-transition login-page">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url('assets/')?>dist/img/piksi.png" alt="piksi" height="60" width="60">
  </div>
<div class="login-box">
  <div class="login-logo">
    <img src="<?= base_url('assets/'); ?>dist/img/portal_mahasiswa.png" alt="logo portal" style="width: 100%;">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p align="center"><?= $title; ?></p>
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('auth/aksi_lupa_password')?>" method="post">
      <div class="input-group mb-1">
          <input type="text" class="form-control" placeholder="Email Terdaftar" name="email" value="<?= set_value('email');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?= form_error('npm', '<div class="text-danger small ml-3">','</div>'); ?>
        <div class="input-group mb-1">
          <input type="text" class="form-control" placeholder="NPM" name="npm" value="<?= set_value('npm');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?= form_error('npm', '<div class="text-danger small ml-3">','</div>'); ?>
        <div class="input-group mb-1">
          <input type="password" class="form-control" placeholder="Password Baru" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('password', '<div class="text-danger small ml-3">','</div>'); ?>
        <div class="input-group mb-1">
          <input type="password" class="form-control" placeholder="Konfirmasi Password Baru" name="password2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('password2', '<div class="text-danger small ml-3">','</div>'); ?>
        <div class="row mt-2">
          <div class="col-8">
          <p class="mb-0">
            <a class="align-middle btn btn-primary" href="<?= base_url('auth'); ?>" class="text-center"><i class="fas fa-arrow-left mr-2"></i> Kembali</a>
          </p>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Kirim</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


