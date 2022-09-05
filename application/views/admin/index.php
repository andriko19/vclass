
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title?></h1>
       <!--  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
      </div>

      <!-- Content Row -->
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Video</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $video; ?></div>
                </div>
                <div class="col-auto">
                  <i class="fab fa-youtube fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Bahan Ajar</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $bahan_ajar; ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-copy fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Berita</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $berita; ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-globe fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Panduan</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $panduan; ?></div>
                </div>
                <div class="col-auto">
                  <i class="far fa-file-pdf fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Content Row -->

      <div class="row">
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5 mx-auto">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Jam Digital</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body mx-auto">
              <div class="chart-pie pt-4 pb-2">
                <!-- <canvas id="myPieChart">
                </canvas> -->
                <div class="jam" id="jam"></div>
                <div class="jam1"><?= date('l, d-m-Y');?></div>
              </div>
              <div class="mt-4 text-center small">
                <span class="mr-2">
                  <i class="fas fa-circle text-primary"></i> 
                </span>
                 <span class="mr-2">
                  <i class="fas fa-circle text-success"></i> 
                </span>
                 <span class="mr-2">
                  <i class="fas fa-circle text-info"></i> 
                </span>
                 <span class="mr-2">
                  <i class="fas fa-circle text-warning"></i> 
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->