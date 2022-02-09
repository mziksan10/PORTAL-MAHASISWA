<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mahasiswa | <?= $title; ?> </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>dist/css/style.css">

    <!-- Icon -->
    <link rel="icon" href="<?= base_url('assets/')?>dist/img/piksi.png">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url('assets/'); ?>dist/img/piksi.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('mahasiswa'); ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('mahasiswa/kontak'); ?>" class="nav-link">Kontak</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <div class="dropdown show">
      <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?= ucwords(strtolower($nama)); ?>
      </a>

      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="<?= base_url('auth/change_pass'); ?>"><i class="nav-icon fas fa-key mr-2"></i>Ubah password</a>
        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i class="nav-icon fas fa-power-off mr-2"></i>Keluar</a>
      </div>
    </div>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('mahasiswa'); ?>" class="brand-link">
      <img src="<?= base_url('assets/'); ?>dist/img/piksi.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">Portal Mahasiswa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('mahasiswa'); ?>" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('mahasiswa/data_diri'); ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data diri
              </p>
            </a>
          </li>          
          <li class="nav-item">
            <a href="<?= base_url('mahasiswa/khs'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Kartu Hasil Studi
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Kartu Rencana Studi
              </p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Rincian Keuangan
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="<?= base_url('mahasiswa/daftar_buku_wisuda'); ?>" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Daftar Buku Wisuda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('mahasiswa/informasi_dan_layanan'); ?>" class="nav-link">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>
                Informasi & Layanan
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>