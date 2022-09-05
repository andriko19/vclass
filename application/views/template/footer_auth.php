  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url(); ?>asset/sbadmin2/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>asset/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url(); ?>asset/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url(); ?>asset/sbadmin2/js/sb-admin-2.min.js"></script>

  <!-- sweetalert -->
  <script src="<?= base_url(); ?>asset/js/sweetalert2.all.min.js"></script>

  <!-- my sweetalert -->
  <script src="<?= base_url(); ?>asset/js/mysweetalert.js"></script>

  <script type="text/javascript">
  	const flashData = $('.flash-data').data('flashdata');
		if(flashData) {
			Swal.fire({
				title:'Data Perusahaan',
				text:'Berhasil ' + flashData,
				icon:'success'
			});
		}
  </script>

</body>

</html>
