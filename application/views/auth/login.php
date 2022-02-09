
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
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Halo!</strong> bagi Mahasiswa Baru, silahkan registrasi terlebih dahulu menggunakan NPM anda. Jika sudah abaikan pesan ini.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('auth/aksi_login')?>" method="post" autocomplete="off">
        <div class="input-group mb-1">
          <input type="text" class="form-control" placeholder="NPM" name="npm">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <?= form_error('npm', '<div class="text-danger small ml-3">','</div>'); ?>
        <div class="input-group mb-1">
          <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?= form_error('password', '<div class="text-danger small ml-3">','</div>'); ?>
        <div class="row mt-2">
          <div class="col-8">
          <p class="mb-0">Belum punya akun?
            <a href="<?= base_url('auth/register'); ?>" class="text-center">Klik daftar</a>
          </p>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


