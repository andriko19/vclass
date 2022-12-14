    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
       <!--  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
      </div>
       <!-- Page Heading -->
          <p class="mb-4">Pada halaman ini anda dapat menambahkan, mengubah, serta menghapus tampilan <?= $title;?> yang ada pada halaman depan website.</p>
          <!-- <button type="button" class="btn btn-secondary btn-lg">Large button</button> -->
          <?= $this->session->flashdata('message');?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
              <button type="button" class="btn btn-primary btn-icon-split float-right" data-toggle="modal" data-target="#tambahBerita">
                <span class="icon text-white-50">
                  <i class="fas fa-keyboard"></i>
                </span>
                <span class="text">Tambah <?= $title;?></span>
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <td>No.</td>
                      <td>Nama Keunggulan</td>
                      <td width="50%">Deskripsi</td>
                      <td>Aksi</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1 ?>
                    <?php foreach($keunggulan as $data): ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $data['nama_keunggulan']; ?></td>
                      <td><?= $data['deskripsi']; ?></td>
                      <td>
                        <button type="button" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#UbahModal<?php echo $data['id_keunggulan'];?>">
                          <span class="icon text-white-50">
                            <i class="far fa-edit"></i>
                          </span>
                        </button> ||
                        <a href="" onclick="$('#modalHapus #formDelete').attr('action','<?= base_url() ;?>admin/hapus_keunggulan/<?= $data['id_keunggulan']; ?>')" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#modalHapus"> 
                          <span class="icon text-white-50">
                            <i class="fas fa-trash-alt"></i>
                          </span>
                        </a>
                      </td>
                    </tr>
                    <?php $no++ ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
   <!-- modal tambah -->
  <div class="modal fade" id="tambahBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open_multipart('admin/proses_tambah_keunggulan');?>
          <div class="form-group">
            <label>Nama Keunggulan</label>
            <input type="text" name="nama_keunggulan" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Deskripsi Keunggulan</label>
            <textarea type="text" name="deskripsi" class="form-control" required cols="40" rows="10"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="reset" class="btn btn-success">Reset</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
  <!-- and modal tambah -->

  <!-- modal ubah -->
  <?php $no = 0;
    foreach ($keunggulan as $data) : $no++; ?>
    <div class="modal fade" id="UbahModal<?php echo $data['id_keunggulan'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Ubah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open_multipart('admin/proses_ubah_keunggulan');?>
            <input type="hidden" name="id_keunggulan" value="<?= $data['id_keunggulan'];?>">
             <div class="form-group">
              <label>Nama Keunggulan</label>
              <input type="text" name="nama_keunggulan" class="form-control" value="<?= $data['nama_keunggulan'];?>" required="">
            </div>
            <div class="form-group">
              <label>Deskripsi Keunggulan</label>
              <textarea type="text" name="deskripsi" class="form-control" required cols="40" rows="10"><?= $data['deskripsi'];?></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <!-- and modal ubah -->

  <!-- Modal hapus-->
  <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">??</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda ingin meghapus data ini?. Klik <strong>Ya</strong> jika ingin menghapusnya.</div>
        <div class="modal-footer">
          <form id="formDelete" action="" method="post">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-danger" type="submit">Ya</button>
          </form>

          <!-- <a class="btn btn-primary" href="<?= base_url(); ?>admin/logout">Ya</a> -->
        </div>
      </div>
    </div>
  </div>
  <!-- Modal hapus-->