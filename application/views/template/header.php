<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>VClass | <?= $title;?></title>
   <!-- Favicons -->
  <link href="<?= base_url(); ?>asset/image/favicon.png" rel="icon">
  <!-- Custom fonts for this template-->
  <link href="<?= base_url(); ?>asset/sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?= base_url(); ?>asset/sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url(); ?>asset/style_admin.css">

   <!-- Custom styles for this page -->
  <link href="<?= base_url(); ?>asset/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">