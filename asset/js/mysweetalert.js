const flashData = $('.flash_data').data(flashdata);

if (flashData) {
	Swal({
		title: 'Data User',
		text: 'Berhasil' + flashData,
		type: 'success'
	});
}