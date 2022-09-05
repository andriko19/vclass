<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VClass | Detail Berita</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="<?= base_url(); ?>asset/image/favicon.png" rel="icon">
  <link href="<?= base_url(); ?>asset/mamba/assets/image/apple-touch-icon.png" rel="apple-touch-icon">
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
        <!-- <a href="index.html"><img src="assets/img/logo-ristek-new2.png" alt="" class="img-fluid"></a> -->
       <a href="<?= base_url(); ?>home"><img src="<?= base_url(); ?>asset/image/Vclass.png" alt="" class="img-fluid gambar_logo"></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"> tes</a> -->
      </div>
      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?= base_url(); ?>home">Home</a></li>
          <li><a href="https://www.olp.vclass.id/www/index.php" target="blank">E-learning</a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Detail Berita <small> / Dipublikasikan : <?= date('d-F-Y', $det_berita['creat_at']); ?></small></h2>
          <ol>
            <li><a href="<?= base_url(); ?>home">Home</a></li>
            <li>Berita</li>
            <li>Detail Berita</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section class="portfolio-details">
      <div class="container">

        <div class="portfolio-details-container">

          <div class="owl-carousel portfolio-details-carousel">
            <img src="<?= base_url(); ?>asset/image/berita/<?= $det_berita['gambar']; ?>" class="img-fluid" alt="">
          </div>
        </div>

        <div class="portfolio-description">
          <h2><?= $det_berita['nama_berita']; ?></h2>
          <p> <?= $det_berita['isi_berita']; ?> </p>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

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
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>asset/mamba/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>asset/mamba/assets/js/main.js"></script>

</body>

</html>