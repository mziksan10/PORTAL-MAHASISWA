  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="nav-icon fas fa-comment-dots ml-1 mr-2"></i><?= $title; ?></h1>
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
      <div class="container-fluid" align="center" style="width: 50%;">
          <form action="">
                <label>NPM</label>
                <input type="text" class="form-control" name="npm" value="<?= $npm; ?>" disabled>
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $nama; ?>" disabled>
                <label>Pesan</label>
                <textarea class="form-control mb-2" name=""cols="30" rows="10"></textarea>
              <button class="btn btn-primary"><i class="fas fa-paper-plane"></i> Kirim</button>
          </form>
          <p class="card-text float-right"><small class="text-muted">*jika ada keluhan tolong sampaikan</small></p>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



