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
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
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
    <?= $this->session->flashdata('message'); ?>
      <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <a href="<?= base_url('admin/export_buku_wisuda');?>" class="btn btn-success mb-2"><i class="fas fa-file-excel ml-1 mr-2"></i> Export To Excel</a>
          </div>
          <div class="col-sm-6">
          <div id="example1_filter" class="dataTables_filter float-right">
            <form action="<?= base_url('admin/pendaftar_buku_wisuda'); ?>" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari NPM/Nama Lengkap" name="keyword" autocomplete="off" autofocus>
              <input type="submit" class=" btn btn-primary" name="submit">
            </div>
            </form>
          </div>
          </div>
        </div>
      <div class="row">
        <div class="col-sm-12">
      <?php if($this->input->post('keyword')) :?>
          <h5>Hasil Pencarian : <?= $total_rows; ?></h5>
      <?php endif;?>
      <table class="table table-bordered table-striped dataTable dtr-inline">
      <thead>
      <tr role="row">
        <th class="sorting sorting_asc">No</th>
        <th class="sorting">NPM</th>
        <th class="sorting">Nama Lengkap</th>
        <th class="sorting">Program Studi</th>
        <th class="sorting">Tanggal Daftar</th>
        <th class="sorting" style="text-align: center;">Status</th>
      </tr>
      </thead>
      <tbody>
      <?php if(empty($pendaftar)) :?>
        <tr>
          <td colspan="6">
          <div class="alert alert-danger" role="alert">
          Data tidak ditemukan :(
          </div>
          </td>
        </tr>
      <?php endif;?>
      <?php
      foreach($pendaftar as $row):{
      ?>
      <tr >
      <td class="align-middle"><?= ++$start; ?></td>
      <td class="align-middle"><?= $row->npm; ?></td>
      <td class="align-middle"><?= $row->nama; ?></td>
      <td class="align-middle"><?= $row->prodi; ?></td>
      <td class="align-middle"><?= $row->tanggal_daftar; ?></td>
      <td class="align-middle" style="text-align: center;">
      <a href="<?= base_url('admin/lihat_pendaftar/') . $row->id;?>" class="badge badge-primary" data-toggle="modal" data-target="#lihat"><i class="fas fa-eye"></i> Lihat Detail</a><br>
      <?php if($row->status == 0) :?>
      <a href="<?= base_url('admin/terima_pendaftar/'.$row->id); ?>" class="badge badge-success"><i class="fas fa-check"></i> Terima</a>
      <a href="<?= base_url('admin/tolak_pendaftar/'.$row->id); ?>" class="badge badge-danger" ><i class="fas fa-trash"></i> Tolak</a>
      <?php elseif($row->status == 1) :?>
      <span class="badge badge-warning">Sudah diterima</span>
      <?php endif;?>
      </td>
      </tr>
      <?php }endforeach;?>
      </tbody>
      <tfoot>
      </tfoot>
      </table>
      <?= $this->pagination->create_links();?>
    </div>
  </div>
      </div>
    </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



