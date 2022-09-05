    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
       <!--  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
      </div>
       <!-- Page Heading -->
          <p class="mb-4">Pada halaman ini anda dapat mengubah <?= $title;?> data diri anda.</p>
          <!-- <button type="button" class="btn btn-secondary btn-lg">Large button</button> -->
          <div style="max-width: 740px;">
            <?= $this->session->flashdata('message');?>
          </div>
          <!-- DataTales Example -->
          <div class="card mb-3" style="max-width: 740px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url(); ?>asset/image/<?= $user['foto']; ?>" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <pre class="card-title">Username     : <?= $user['username']; ?></pre>
                  <pre class="card-title">Nama Lengkap : <?= $user['nama_lengkap']; ?></pre>
                  <pre class="card-title">Profesi      : <?= $user['profesi']; ?></pre>
                  <p class="card-text"><small class="text-muted">Create User, <?= date('d-F-Y', $user['created_at']); ?></small></p>
                  <!-- Divider -->
                  <hr class="sidebar-divider my-0">
                  <button type="button" class="btn btn-success btn-icon-split mt-3" data-toggle="modal" data-target="#editProfil<?php echo $user['id_users'];?>">
                    <span class="icon text-white-50">
                      <i class="far fa-edit"></i>
                    </span>
                    <span class="text">Edit <?= $title;?></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- modal ubah -->
  <div class="modal fade" id="editProfil<?php echo $user['id_users'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Ubah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open_multipart('admin/proses_ubah_profil');?>
          <input type="hidden" name="id_users" value="<?= $user['id_users'];?>">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?= $user['username'];?>" readonly="">
          </div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="<?= $user['nama_lengkap'];?>" required="">
          </div>
          <div class="form-group">
            <label>Profesi</label>
            <input type="text" name="profesi" class="form-control" value="<?= $user['profesi'];?>" required="">
          </div>
          <div class="form-group">
            <label>Foto</label>
            <div class="row">
              <div class="col-sm-4">
                <img src="<?= base_url(); ?>asset/image/<?= $user['foto']; ?>" class="img-thumbnail">
              </div>
              <div class="col-sm-8">
                <input type="file" name="foto" class="form-control" size="30">
                <small class="text-danger"> Disarankan Ukuran Gambar : 225px x 225px.</small>
              </div>
            </div>
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
  <!-- and modal ubah -->