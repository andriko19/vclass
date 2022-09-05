<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VClass | Halaman Utama </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="<?= base_url(); ?>asset/image/favicon.png" rel="icon">
 <!--  <link href="<?= base_url(); ?>asset/mamba/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="<?= base_url(); ?>asset/mamba/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>asset/mamba/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>asset/mamba/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>asset/mamba/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>asset/mamba/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url(); ?>asset/mamba/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>asset/mamba/assets/vendor/aos/aos.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>asset/mamba/assets/css/style.css" rel="stylesheet">
  <link href="<?= base_url(); ?>asset/mamba/assets/css/style_home.css" rel="stylesheet">

  <!-- jam digital -->
  <script type="text/javascript">
    window.onload = function() {jam();}

    function jam() {
      var a = document.getElementById('jam'),
      d = new Date(), h, m, s;
      h = d.getHours();
      m = set(d.getMinutes());
      s = set(d.getSeconds());

      a.innerHTML = h + ":" + m + ":" + s;

      setTimeout('jam()', 1000);
    }

    function set(a) {
      a = a < 10 ? '0' + a : a;
      return a;
    }
  </script>
</head>

<body>
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i>surya@uwp.ac.id
        <i class="icofont-envelope"></i>muhammadharist@uwp.ac.id
      </div>
      <div class="social-links float-right">
        <a href="#" class="facebook"><i class="icofont-stopwatch"></i></a>
        <a href="#" class="twitter" id="jam"></a>
        <a href="#" class="facebook"><?= date('l, d-m-Y');?></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">
      <div class="logo float-left">
        <!-- <img src="<?= base_url(); ?>asset/image/logo-ristek-new2.png" alt="" class="img-fluid"> -->
        <a href="<?= base_url(); ?>home"><img src="<?= base_url(); ?>asset/image/Vclass.png" alt="" class="img-fluid gambar_logo"></a>
        <!-- <h1 class="text-light"><a href="<?= base_url(); ?>home"><span> Virtual Class </span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"> tes</a> -->
      </div>
      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?= base_url(); ?>home">Home</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#youtube">Vedio</a></li>
          <li><a href="#berkas">Bahan Ajar</a></li>
          <li><a href="#berita">Berita</a></li>
          <li><a href="#panduan">Panduan</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#keunggulan">Keunggulan</a></li>
          <li class="drop-down"><a href="">E-learning</a>
            <ul>
                <li><a href="https://www.olp.vclass.id/www/index.php" target="blank">OLP</a></li>
                <li><a href="https://smawp.vclass.id" target="blank">SMAWP</a></li>
                <li><a href="https://sties.vclass.id/" target="blank">STIES</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide 1 -->
          <?php $urutan = 0; ?>
          <?php foreach($banner as $data) { ?>
          <?php $urutan++; ?>
          <?php if ($urutan ==1) { ?>
            <div class="carousel-item active" style="background-image: url('<?= base_url(); ?>asset/image/banner/<?= $data['gambar']; ?>');">
              <div class="carousel-container">
                <div class="carousel-content container">
                  <h2 class="animate__animated animate__fadeInDown"><?= $data['jenis_banner']; ?> <br> <span><?= $data['nama_banner']; ?></span></h2>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <div class="carousel-item" style="background-image: url('<?= base_url(); ?>asset/image/banner/<?= $data['gambar']; ?>');">
              <div class="carousel-container">
                <div class="carousel-content container">
                  <h2 class="animate__animated animate__fadeInDown"><?= $data['jenis_banner']; ?> <br> <span><?= $data['nama_banner']; ?></span></h2>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
              </div>
            </div>
          <?php } } ?>
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-6 video-box">
            <img src="<?= base_url(); ?>asset/image/tentang/<?= $tentang['gambar']; ?>" class="img-fluid" alt="">
            <a href="<?= $tentang['link_youtube']; ?>" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
            <div class="section-title" data-aos="fade-up" data-aos-delay="100">
              <h2><?= $tentang['nama_portal']; ?></h2>
               <p class="p1"><?= $tentang['deskripsi']; ?></p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Us Section -->
     <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
            <div class="count-box">
              <i class="icofont-youtube-play" style="color: #20b38e;"></i>
              <span data-toggle="counter-up"><?php echo $videojum; ?></span>
              <p>Video</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="count-box">
              <i class="icofont-document-folder" style="color: #c042ff;"></i>
              <span data-toggle="counter-up"><?php echo $bahan_ajarjum; ?></span>
              <p>Bahan Ajar</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="count-box">
              <i class="icofont-news" style="color: #ffb459;"></i>
              <span data-toggle="counter-up"><?php echo $beritajum; ?></span>
              <p>Berita</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
            <div class="count-box">
              <i class="icofont-file-pdf" style="color: #46d1ff;"></i>
              <span data-toggle="counter-up"><?php echo $panduanjum; ?></span>
              <p>Panduan</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Counts Section -->
    <!-- ======= Video Youtube ======= -->
    <section class="about-lists youtube" id="youtube">
      <div class="container">
        <div class="section-title">
          <h2>Video</h2>
        </div>
        <div class="row no-gutters">
          <?php $urutan = 0; ?>
          <?php foreach($video as $data) { ?>
          <?php $urutan++; ?>
            <div class="col-lg-6 col-md-6 content-item video-box" data-aos="fade-up">
              <iframe width="560" height="315" src="<?= $data['embed_youtube']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <h5><?= $data['nama_video']; ?></h5>
              <p><i class="icofont-upload" style="color: #428bca;"></i> Upload : <?= date('d-F-Y', $data['creat_at']); ?></p>
            </div>
          <?php } ?>
        </div>
      </div>
    </section><!-- End Video Youtube -->
     <!-- ======= Berkas ======= -->
    <section class="about-lists section-bg" id="berkas">
      <div class="container">
        <div class="section-title">
          <h2>Bahan Ajar</h2>
        </div>
        <div class="row no-gutters">
          <?php $urutan = 0; ?>
          <?php foreach($bahan_ajar as $data) { ?>
          <?php $urutan++; ?>
            <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
              <img src="<?= base_url(); ?>asset/image/PDF.png" class="img1">
              <a href="<?= base_url() ;?>home/download_file/<?= $data['file'];?>">Download file</a>
              <h4><?= $data['nama_bahan_ajar']; ?></h4>
              <p><?= $data['deskripsi']; ?></p>
            </div>
          <?php } ?>
        </div>
      </div>
    </section><!-- End Berkas -->
    <!-- ======= Berita ======= -->
    <section id="berita" class="services about-lists">
      <div class="container">
        <div class="section-title">
          <h2>Berita</h2>
        </div>
        <div class="row no-gutters">
          <?php $urutan = 0; ?>
          <?php foreach($berita as $data) { ?>
          <?php $urutan++; ?>
            <div class="col-lg-4 col-md-6 icon-box content-item" data-aos="fade-up">
              <img src="<?= base_url(); ?>asset/image/berita/<?= $data['gambar']; ?>" class="img2">
              <h4 class="title"><?= $data['nama_berita']; ?></h4>
              <p class="description"> <?= word_limiter($data['isi_berita'], 5);?> <a href="<?= base_url(); ?>home/detail_berita/<?= $data['id_berita']; ?>" class="badge badge-parimary"> Read More <i class="icofont-arrow-right"></i></a> </p>
            </div>
          <?php } ?>
        </div>
      </div>
    </section><!-- End Berita -->
    <!-- ======= Our Album ======= -->
    <section class="about-lists section-bg" id="panduan">
      <div class="container">
        <div class="section-title">
          <h2>Panduan Penggunaan</h2>
        </div>
        <div class="row no-gutters">
          <?php $urutan = 0; ?>
          <?php foreach($panduan as $data) { ?>
          <?php $urutan++; ?>
            <div class="col-lg-6 col-md-6 content-item" data-aos="fade-up">
              <img src="<?= base_url(); ?>asset/image/PDF.png" class="img1">
              <a href="<?= base_url() ;?>home/download_panduan/<?= $data['file'];?>">Download file</a>
              <h4><?= $data['nama_panduan']; ?></h4>
            </div>
          <?php } ?>          
          <!-- <div class="col-lg-6 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
            <img src="<?= base_url(); ?>asset/image/PDF.png" class="img1">
            <a href="<?= base_url() ;?>home/download_panduan ">Download file</a>
            <h4>Panduan Pengguanan (Mahasiswa)</h4>
          </div> -->
        </div>
      </div>
    </section><!-- End Album -->
    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team">
      <div class="container">
        <div class="section-title">
          <h2>Team</h2>
        </div>
        <div class="row">
          <?php $urutan = 0; ?>
          <?php foreach($users as $data) { ?>
          <?php $urutan++; ?>
            <div class="col-xl-3 col-lg-4 col-md-6 team1" data-aos="fade-up">
              <div class="member">
                <div class="pic"><img src="<?= base_url(); ?>asset/image/<?= $data['foto'];?>" class="img-fluid" alt="" style="width: 600px;"></div>
                <div class="member-info">
                  <h4><?= $data['nama_lengkap'];?></h4>
                  <span><?= $data['profesi'];?></span>
                  <div class="social">
                    <a href=""><i class="icofont-twitter"></i></a>
                    <a href=""><i class="icofont-facebook"></i></a>
                    <a href=""><i class="icofont-instagram"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section><!-- End Our Team Section -->
    <!-- ======= Keunggulan ======= -->
    <section id="keunggulan" class="faq section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Keunggulan</h2>
        </div>
        <div class="row d-flex align-items-stretch">
          <?php $urutan = 0; ?>
          <?php foreach($keunggulan as $data) { ?>
          <?php $urutan++; ?>
            <div class="col-lg-6 faq-item" data-aos="fade-up">
              <h4><?= $data['nama_keunggulan'];?></h4>
              <p>
                <?= $data['deskripsi'];?>
              </p>
            </div>
          <?php } ?>
          <!-- <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="100">
            <h4>Mudah Digunakan</h4>
            <p>
              VClass memiliki menu yang mudah untuk dipahami baik dari dosen maupun mahasiswa.
            </p>
          </div>
          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="200">
            <h4>Bahan Ajar</h4>
            <p>
              VClass juga memudahkan dosen untuk menambahkan bahan pembelejaran dan bahan pembelajaran tersebut dapat didownload oleh para mahasiswa.
            </p>
          </div>
          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="300">
            <h4>Video Pembejalaran</h4>
            <p>
              Didalam vclass dosen dapat menampilkan video dimana video tersebut dapat dijadikan sebagai informasi atau penjelasan terkait materi yang diberikan oleh mahasiswa. serta video tersebut dapat dinonton langsung oleh para mahasiswa.
            </p>
          </div>
          <div class="col-lg-6 faq-item" data-aos="fade-up" data-aos-delay="400">
            <h4>Dokumentasi Kegiatan</h4>
            <p>
              Dosen dapat menampilkan dokumentasi pembelajaran sebagai informasi kegiatan belajar mengajar.
            </p>
          </div> -->
        </div>
      </div>
    </section><!-- End Keunggulan -->
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
         &copy; Copyright<strong><span> 2020 Virtual Class.</span></strong>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>asset/mamba/assets/js/main.js"></script>

</body>

</html>