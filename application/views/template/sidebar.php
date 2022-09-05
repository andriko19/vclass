    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>admin">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">VClass</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li <?= $this->uri->segment(2) == 'index.php' || $this->uri->segment(2) == '' ? 'class="nav-item active"' : '' ?> class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Setting
      </div>

      <!-- Nav Item - Dashboard -->
      <li <?= $this->uri->segment(2) == 'banner' ? 'class="nav-item active"' : '' ?> class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>admin/banner">
          <i class="fas fa-fw fa-arrows-alt"></i>
          <span>Banner</span></a>
      </li>
      <!-- Nav Item - Dashboard -->
      <li <?= $this->uri->segment(2) == 'tentang' ? 'class="nav-item active"' : '' ?> class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>admin/tentang">
          <i class="fas fa-fw fa-address-card"></i>
          <span>Tentang</span></a>
      </li>
      <!-- Nav Item - Dashboard -->
      <li <?= $this->uri->segment(2) == 'video' ? 'class="nav-item active"' : '' ?> class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>admin/video">
          <i class="fab fa-fw fa-youtube"></i>
          <span>Video</span></a>
      </li>
      <!-- Nav Item - Dashboard -->
      <li <?= $this->uri->segment(2) == 'bahan_ajar' ? 'class="nav-item active"' : '' ?> class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>admin/bahan_ajar">
          <i class="fas fa-fw fa-copy"></i>
          <span>Bahan Ajar</span></a>
      </li>
      <!-- Nav Item - Dashboard -->
      <li <?= $this->uri->segment(2) == 'berita' ? 'class="nav-item active"' : '' ?> class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>admin/berita">
          <i class="far fa-fw fa-newspaper"></i>
          <span>Berita</span></a>
      </li>
      <!-- Nav Item - Dashboard -->
      <li <?= $this->uri->segment(2) == 'panduan' ? 'class="nav-item active"' : '' ?> class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>admin/panduan">
          <i class="fas fa-fw fa-file-pdf"></i>
          <span>Panduan</span></a>
      </li>
      <!-- Nav Item - Dashboard -->
      <li <?= $this->uri->segment(2) == 'keunggulan' ? 'class="nav-item active"' : '' ?> class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>admin/keunggulan">
          <i class="fas fa-fw fa-chart-line"></i>
          <span>Keunggulan</span></a>
      </li>
   

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
