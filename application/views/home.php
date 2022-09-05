<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- favicon -->
    <link
      rel="shortcut icon"
      href="<?= base_url(); ?>asset/image/favicon.png"
      type="image/x-icon"/>
    <!-- file css -->
    <link rel="stylesheet" href="<?= base_url(); ?>asset/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/animate.css">
    <!-- my font -->
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <!-- fonawesome -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>asset/fontawesome/css/all.min.css">
    <title>Portal | Pembelajaran Daring </title>
  </head>
  <style type="text/css">
    body {
      /*background-color: #bcc1c4;*/
      background-image: url(<?php echo base_url("asset/image/keren.gif");?>);
      /*background-repeat: no-repeat;*/
      /*background-size: cover;*/
    }
    .jumbotron {
        background-image: url(<?php echo base_url("asset/image/keren.gif");?>);
      }
    @media (min-width: 992px) {
      .jumbotron {
        background-image: url(<?php echo base_url("asset/image/keren.gif");?>);
        background-size: 1200px 650px;
        background-repeat: no-repeat;
        /*margin-top: 0px;*/
      }
    }
  </style>

  <body>
    <div class="container">
      <!-- navbar -->
      <!-- <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
         <img src="<?= base_url(); ?>asset/image/UWP.png" class="d-inline-block align-top image1" alt="" loading="lazy">
         <img src="<?= base_url(); ?>asset/image/logo akred.png" class="d-inline-block align-top ml-auto image2" alt="" loading="lazy">
        </div>
      </nav> -->
      <!-- end navbar -->

      <!-- jumbotron -->
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
           <img src="<?= base_url(); ?>asset/image/logo-ristek-new2.png" class="d-inline-block align-top image1" alt="" loading="lazy">
          <p class="text-pembuka animated bounceIn"> 
            Selamat Datang
          </p>
          <p class="text-univ animated infinite tada">
            Portal Pembelajaran Daring
          </p>
          <div class="row tombol-akses animated bounceInUp">
            <div class="col-sm-6 tobol1">
              <div class="card">
                <a href="http://localhost/efront/www/index.php" class="btn btn-primary vidiolink"> Integrasi Elearning <i class="fas fa-book-reader"></i></a>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <a href="#" class="btn btn-primary" id="vidiolink">Informasi Mengenai Portal Pembelajaran <i class="fa fa-info-circle" aria-hidden="true"> &nbsp; </i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end jumbotron -->

      <!-- text berjalan -->
      <marquee class="text-jalan" onmouseover="this.stop()" onmouseout="this.start()"> Ini Adalah Portal Pembelajaran Daring Dimana Kegiatan Belajar Mengajar Dapat Dilakukan Tanpa Batas Waktu, Dimana Saja dan Kapan Saja.
      </marquee>
      <!-- end text berjalan -->
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?= base_url(); ?>asset/jquery.magnific-popup.min.js"></script>
   <!--  <script src="https://www.youtube.com/iframe_api"></script> -->
    <!-- <script>
      $(document).ready(function(){
        $('.vidiolink').magnificPopup({
            type: 'iframe',
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com/', 
                        id: function(url) {        
                            var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
                            if ( !m || !m[1] ) return null;
                            return m[1];
                        },
                        src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                    },
                    vimeo: {
                        index: 'vimeo.com/', 
                        id: function(url) {        
                            var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
                            if ( !m || !m[5] ) return null;
                            return m[5];
                        },
                        src: '//player.vimeo.com/video/%id%?autoplay=1'
                    }
                }
            }
        });

        // $('.vidiolink').magnificPopup({
        //   type: 'iframe',
        //   iframe: {
        //     markup: '<div class="mfp-iframe-scaler">'+
        //             '<div class="mfp-close"></div>'+
        //             '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
        //             '</div>',
        //     patterns: {
        //       youtube: {
        //         index: 'youtube.com/',
        //         id: 'v=',
        //         src: 'https://www.youtube.com/embed/%id%?autoplay=1'
        //       },
        //       vimeo: {
        //         index: 'vimeo.com/',
        //         id: '/',
        //         src: '//player.vimeo.com/video/%id%?autoplay=1'
        //       },
        //       gmaps: {
        //         index: '//maps.google.',
        //         src: '%id%&output=embed'
        //       }
        //     },
        //     srcAction: 'iframe_src',
        //   }
        // });
      });
    </script> -->
  </body>
</html>