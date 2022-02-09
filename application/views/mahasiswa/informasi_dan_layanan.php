  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="nav-icon fab fa-whatsapp ml-1 mr-2"></i><?= $title; ?></h1>
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
                <?php foreach ($kontak->result() as $tab) :
                  if ($tab->bagian != '') { ?>
                  <li class="nav-item">
                    <a class="nav-link <?php if (trim($tab->bagian) === 'FRONT OFFICE') { echo 'active';} ?>" id="custom-tabs-three-home-tab" data-toggle="pill" href="#bagian<?= $tab->bagian; ?>" role="tab" aria-controls="bagian<?= $tab->bagian; ?>" aria-selected="true">BAGIAN <?= $tab->bagian; ?></a>
                  </li>
                  <?php }endforeach; ?>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">

                <?php foreach ($kontak->result() as $tabpanel) :
                  if ($tabpanel->bagian != '') { ?>
                  <div class="tab-pane fade show <?php if (trim($tabpanel->bagian) === 'FRONT OFFICE'){ echo 'active';} ?>" id="bagian<?= $tabpanel->bagian; ?>" role="tabpanel" aria-labelledby="bagian<?= $tabpanel->bagian; ?>-tab">
                    <table class="table table-bordered">
                      <tr style="text-align: center;">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Sub Bagian</th>
                        <th>Nomor</th>
                        <th>Chat Only </th>
                      </tr>
                      <?php foreach($kontak->result() as $row):{
                        $no = 1;
                        $bagian = $row->bagian;
                        if ($bagian == $tabpanel->bagian) {
                      ?>
                      <tr>
                        <td style="text-align: center;"><?= $no++; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->sub_bagian; ?></td>
                        <td><?= $row->nomor; ?></td>
                        <td style="text-align: center;">
                          <a href="https://api.whatsapp.com/send?phone=62<?= $row->nomor; ?>&text=Assalamualaikum, Halo Kak! Nama saya <?= ucwords(strtolower($nama)); ?> NPM saya <?= $npm; ?> Saya ingin bertanya ..." type="button" class="badge bg-success">
                          <i class="fab fa-whatsapp"></i>
                          </a>
                       </td>
                      </tr>
                      <?php }}endforeach;?>
                    </table>
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



