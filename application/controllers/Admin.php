<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		if (!$this->session->userdata('username')) {
			redirect('home/login_admin');
		}
		$this->load->library('form_validation');
		$this->load->model('admin_model');
	}

	public function index()
	{

		$user = $this->session->userdata('username');
		$data['video'] 			= $this->admin_model->hitungJumlahVideo();
		$data['bahan_ajar'] = $this->admin_model->hitungJumlahBahanAjar();
		$data['berita']	 		= $this->admin_model->hitungJumlahBerita();
		$data['panduan'] 		= $this->admin_model->hitungJumlahPanduan();
		$data['user'] 			= $this->admin_model->user($user);
		$data['title'] 			= 'Dashboard';
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');	
		$this->load->view('template/topbar', $data);	
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}

	public function banner()
	{
		$user = $this->session->userdata('username');
		$data['user'] = $this->admin_model->user($user);
		$data['title'] = 'Banner';
		$data['banner'] = $this->admin_model->banner();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');	
		$this->load->view('template/topbar', $data);	
		$this->load->view('admin/banner/banner', $data);
		$this->load->view('template/footer');
	}

	public function tambah_banner()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');	
		$this->load->view('template/topbar');	
		$this->load->view('admin/banner/tambah_banner');
		$this->load->view('template/footer');
	}

	function proses_tambah_banner()
	{
		$config['upload_path']          = './asset/image/banner/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2048;
		// $config['max_width']            = 1280;
		// $config['max_height']           = 570;
		// $config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('gambar'))
		{
			$data = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
   			. $data . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		 	redirect('admin/banner');
		} else
		{
			$data['nama_banner'] = $this->input->post('nama_banner', TRUE);
			$data['jenis_banner'] = $this->input->post('jenis_banner', TRUE);
			$data['gambar'] = $this->upload->data('file_name');
			$data['creat_at'] = time();

			$this->admin_model->tambah_banner($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  		Banner Berhasil<strong> DiTambahkan!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		 	redirect('admin/banner');
		}	
	}

	public function proses_ubah_banner()
	{
		$id_banner = $this->input->post('id_banner');
		$gambar = $this->db->get_where('banner',['id_banner' => $id_banner])->row_array();

		$data = [
			'nama_banner' => $this->input->post('nama_banner', TRUE),
			'jenis_banner' => $this->input->post('jenis_banner', TRUE),
			'creat_at' => time()
		];

		// jika ada gambar yang diupload
		$upload_gambar = $_FILES['gambar']['name'];
		
		if ($upload_gambar) {
			$config['upload_path']          = './asset/image/banner/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			// $config['max_width']            = 1280;
			// $config['max_height']           = 570;
			// $config['encrypt_name']			= TRUE;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar'))
				{
					$gambar_lama = $gambar['gambar'];
						if($gambar_lama != 'default.jpg') {
							unlink(FCPATH . '/asset/image/banner/' . $gambar_lama);
						}
					$gambar_baru = $this->upload->data('file_name');
					$this->db->set('gambar', $gambar_baru);
				} else
				{
					$data = $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
		   			. $data . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		     			<span aria-hidden="true">&times;</span>
		   			</button>
				 	</div>');
				 	redirect('admin/banner');
				}	
		}
		$this->db->where('id_banner',$id_banner);
    $this->db->update('banner', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
  		Banner Berhasil<strong> Diubah!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		redirect('admin/banner');
	}

	public function hapus_banner($id_banner)
	{
		$data = $this->admin_model->getDataByIdBanner($id_banner)->row();
		$gambar ='./asset/image/banner/' . $data->gambar;

		if (is_readable($gambar) && unlink($gambar)) {
			$this->admin_model->hapusBanner($id_banner);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  		Banner Berhasil<strong> Dihapus!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
			redirect('admin/banner');
		} else {
			echo "Gagal";
		}
	}

	public function berita()
	{
		$user = $this->session->userdata('username');
		$data['user'] = $this->admin_model->user($user);
		$data['title'] = 'Berita';
		$data['berita'] = $this->admin_model->berita();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');	
		$this->load->view('template/topbar', $data);	
		$this->load->view('admin/berita/berita', $data);
		$this->load->view('template/footer');
	}

	function proses_tambah_berita()
	{
		$config['upload_path']          = './asset/image/berita/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2048;
		// $config['max_width']            = 1280;
		// $config['max_height']           = 570;
		// $config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('gambar'))
		{
			$data = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
   			. $data . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		 	redirect('admin/berita');
		} else
		{
			$data['nama_berita'] = $this->input->post('nama_berita', TRUE);
			$data['isi_berita'] = $this->input->post('isi_berita', TRUE);
			$data['gambar'] = $this->upload->data('file_name');
			$data['creat_at'] = time();

			$this->admin_model->tambah_berita($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  		Berita Berhasil<strong> DiTambahkan!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		 	redirect('admin/berita');
		}	
	}

	public function hapus_berita($id_berita)
	{
		$data = $this->admin_model->getDataByIdBerita($id_berita)->row();
		$gambar ='./asset/image/berita/' . $data->gambar;

		if (is_readable($gambar) && unlink($gambar)) {
			$this->admin_model->hapusBerita($id_berita);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  		Berita Berhasil<strong> Dihapus!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
			redirect('admin/berita');
		} else {
			echo "Gagal";
		}
	}

	public function proses_ubah_berita()
	{
		$id_berita = $this->input->post('id_berita');
		$gambar = $this->db->get_where('berita',['id_berita' => $id_berita])->row_array();

		$data = [
			'nama_berita' => $this->input->post('nama_berita', TRUE),
			'isi_berita' => $this->input->post('isi_berita', TRUE),
			'creat_at' => time()
		];

		// jika ada gambar yang diupload
		$upload_gambar = $_FILES['gambar']['name'];
		
		if ($upload_gambar) {
			$config['upload_path']          = './asset/image/berita/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			// $config['max_width']            = 1280;
			// $config['max_height']           = 570;
			// $config['encrypt_name']			= TRUE;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar'))
				{
					$gambar_lama = $gambar['gambar'];
						if($gambar_lama != 'default.jpg') {
							unlink(FCPATH . 'asset/image/berita/' . $gambar_lama);
						}
					$gambar_baru = $this->upload->data('file_name');
					$this->db->set('gambar', $gambar_baru);
				} else
				{
					$data = $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
		   			. $data . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		     			<span aria-hidden="true">&times;</span>
		   			</button>
				 	</div>');
				 	redirect('admin/berita');
				}	
		}
		$this->db->where('id_berita',$id_berita);
    $this->db->update('berita', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
  		Berita Berhasil<strong> Diubah!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		redirect('admin/berita');
	}

	public function tentang()
	{
		$user = $this->session->userdata('username');
		$data['user'] = $this->admin_model->user($user);
		$data['title'] = 'Tentang';
		$data['tentang'] = $this->admin_model->tentang();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');	
		$this->load->view('template/topbar', $data);	
		$this->load->view('admin/tentang/tentang', $data);
		$this->load->view('template/footer');
	}

	function proses_tambah_tentang()
	{
		$config['upload_path']          = './asset/image/tentang/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2048;
		// $config['max_width']            = 1280;
		// $config['max_height']           = 570;
		// $config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('gambar'))
		{
			$data = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
   			. $data . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		 	redirect('admin/tentang');
		} else
		{
			$data['nama_portal'] = $this->input->post('nama_portal', TRUE);
			$data['deskripsi'] = $this->input->post('deskripsi', TRUE);
			$data['gambar'] = $this->upload->data('file_name');
			$data['link_youtube'] = $this->input->post('link_youtube', TRUE);
			$data['creat_at'] = time();

			$this->admin_model->tambah_tentang($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  		Tentang Protal Berhasil<strong> DiTambahkan!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		 	redirect('admin/tentang');
		}	
	}

	public function hapus_tentang($id_tentang)
	{
		$data = $this->admin_model->getDataByIdTentang($id_tentang)->row();
		$gambar ='./asset/image/tentang/' . $data->gambar;

		if (is_readable($gambar) && unlink($gambar)) {
			$this->admin_model->hapusTentang($id_tentang);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  		Tentang Portal Berhasil<strong> Dihapus!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
			redirect('admin/tentang');
		} else {
			echo "Gagal";
		}
	}

	public function proses_ubah_tentang()
	{
		$id_tentang = $this->input->post('id_tentang');
		$gambar = $this->db->get_where('tentang',['id_tentang' => $id_tentang])->row_array();

		$data = [
			'nama_portal' => $this->input->post('nama_portal', TRUE),
			'deskripsi' => $this->input->post('deskripsi', TRUE),
			'link_youtube' => $this->input->post('link_youtube', TRUE),
			'creat_at' => time()
		];

		// jika ada gambar yang diupload
		$upload_gambar = $_FILES['gambar']['name'];
		
		if ($upload_gambar) {
			$config['upload_path']          = './asset/image/tentang/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			// $config['max_width']            = 1280;
			// $config['max_height']           = 570;
			// $config['encrypt_name']			= TRUE;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar'))
				{
					$gambar_lama = $gambar['gambar'];
						if($gambar_lama != 'default.jpg') {
							unlink(FCPATH . 'asset/image/tentang/' . $gambar_lama);
						}
					$gambar_baru = $this->upload->data('file_name');
					$this->db->set('gambar', $gambar_baru);
				} else
				{
					$data = $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
		   			. $data . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		     			<span aria-hidden="true">&times;</span>
		   			</button>
				 	</div>');
				 	redirect('admin/tentang');
				}	
		}
		$this->db->where('id_tentang',$id_tentang);
    $this->db->update('tentang', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
  		Tentang Portal Berhasil<strong> Diubah!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		redirect('admin/tentang');
	}

	public function video()
	{
		$user = $this->session->userdata('username');
		$data['user'] = $this->admin_model->user($user);
		$data['title'] = 'Video';
		$data['video'] = $this->admin_model->video();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');	
		$this->load->view('template/topbar', $data);	
		$this->load->view('admin/video/video', $data);
		$this->load->view('template/footer');
	}

	function proses_tambah_video()
	{
		$data = [
				'nama_video'     => htmlspecialchars($this->input->post('nama_video', 'true')),
				'embed_youtube' => htmlspecialchars($this->input->post('embed_youtube', 'true')),
				'creat_at'   => time()
			];

			$this->admin_model->tambah_video($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  			Video Berhasil<strong> DiTambahkan!.</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
			</div>');
			redirect('admin/video');
	}

	function proses_ubah_video()
	{
		$id_video = $this->input->post('id_video');

		$data = [
				'nama_video'     => htmlspecialchars($this->input->post('nama_video', 'true')),
				'embed_youtube' => htmlspecialchars($this->input->post('embed_youtube', 'true')),
				'creat_at'   => time()
			];

			$this->admin_model->ubah_video($data, $id_video);
			$this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
  			Video Berhasil<strong> Diubah!.</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
			</div>');
			redirect('admin/video');
	}

	public function hapus_video($id_video)
	{
		$this->admin_model->hapusVideo($id_video);
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Video Berhasil<strong> Dihapus!.</strong>
 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
   			<span aria-hidden="true">&times;</span>
 			</button>
	 	</div>');
		redirect('admin/video');
	}

	public function bahan_ajar()
	{
		$user = $this->session->userdata('username');
		$data['user'] = $this->admin_model->user($user);
		$data['title'] = 'Bahan Ajar';
		$data['bahan_ajar'] = $this->admin_model->bahan_ajar();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');	
		$this->load->view('template/topbar', $data);	
		$this->load->view('admin/bahan_ajar/bahan_ajar', $data);
		$this->load->view('template/footer');
	}

	function proses_tambah_bahan_ajar()
	{
		$config['upload_path']          = './asset/image/pdf/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 2048;
		// $config['max_width']            = 1280;
		// $config['max_height']           = 570;
		// $config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file'))
		{
			$data = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
   			. $data . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		 	redirect('admin/bahan_ajar');
		} else
		{
			$data['nama_bahan_ajar'] = $this->input->post('nama_bahan_ajar', TRUE);
			$data['deskripsi'] = $this->input->post('deskripsi', TRUE);
			$data['file'] = $this->upload->data('file_name');
			$data['creat_at'] = time();

			$this->admin_model->tambah_bahan_ajar($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  		Bahan Ajar Berhasil<strong> DiTambahkan!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		 	redirect('admin/bahan_ajar');
		}	
	}

	public function proses_ubah_bahan_ajar()
	{
		$id_bahan_ajar = $this->input->post('id_bahan_ajar');
		$file = $this->db->get_where('bahan_ajar',['id_bahan_ajar' => $id_bahan_ajar])->row_array();

		$data = [
			'nama_bahan_ajar' => $this->input->post('nama_bahan_ajar', TRUE),
			'deskripsi' => $this->input->post('deskripsi', TRUE),
			'creat_at' => time()
		];

		// jika ada gambar yang diupload
		$upload_file = $_FILES['file']['name'];
		
		if ($upload_file) {
			$config['upload_path']          = './asset/image/pdf/';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 2048;
			// $config['max_width']            = 1280;
			// $config['max_height']           = 570;
			// $config['encrypt_name']			= TRUE;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file'))
				{
					$file_lama = $file['file'];
						if($file_lama != 'default.jpg') {
							unlink(FCPATH . 'asset/image/pdf/' . $file_lama);
						}
					$file_baru = $this->upload->data('file_name');
					$this->db->set('file', $file_baru);
				} else
				{
					$data = $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
		   			. $data . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		     			<span aria-hidden="true">&times;</span>
		   			</button>
				 	</div>');
				 	redirect('admin/bahan_ajar');
				}	
		}
		$this->db->where('id_bahan_ajar',$id_bahan_ajar);
    $this->db->update('bahan_ajar', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
  		Bahan Ajar Berhasil<strong> Diubah!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		redirect('admin/bahan_ajar');
	}

	public function hapus_bahan_ajar($id_bahan_ajar)
	{
		$data = $this->admin_model->getDataByIdBahanAjar($id_bahan_ajar)->row();
		$file ='./asset/image/pdf/' . $data->file;

		if (is_readable($file) && unlink($file)) {
			$this->admin_model->hapusBahanAjar($id_bahan_ajar);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  		Bahan Ajar Berhasil<strong> Dihapus!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
			redirect('admin/bahan_ajar');
		} else {
			echo "Gagal";
		}
	}

	public function panduan()
	{
		$user = $this->session->userdata('username');
		$data['user'] = $this->admin_model->user($user);
		$data['title'] = 'Panduan Penggunaan';
		$data['panduan'] = $this->admin_model->panduan();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');	
		$this->load->view('template/topbar', $data);	
		$this->load->view('admin/panduan/panduan', $data);
		$this->load->view('template/footer');
	}

	function proses_tambah_panduan()
	{
		$config['upload_path']          = './asset/image/panduan/';
		$config['allowed_types']        = 'pdf|pptx';
		$config['max_size']             = 20266;
		// $config['max_width']            = 1280;
		// $config['max_height']           = 570;
		// $config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file'))
		{
			$data = $this->upload->display_errors();
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
   			. $data . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		 	redirect('admin/panduan');
		} else
		{
			$data['nama_panduan'] = $this->input->post('nama_panduan', TRUE);
			$data['file'] = $this->upload->data('file_name');
			$data['creat_at'] = time();

			$this->admin_model->tambah_panduan($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  		Panduan Penggunaan Berhasil<strong> DiTambahkan!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		 	redirect('admin/panduan');
		}	
	}

	public function proses_ubah_panduan()
	{
		$id_panduan = $this->input->post('id_panduan');
		$file = $this->db->get_where('panduan',['id_panduan' => $id_panduan])->row_array();

		$data = [
			'nama_panduan' => $this->input->post('nama_panduan', TRUE),
			'creat_at' => time()
		];

		// jika ada gambar yang diupload
		$upload_file = $_FILES['file']['name'];
		
		if ($upload_file) {
			$config['upload_path']          = './asset/image/panduan/';
			$config['allowed_types']        = 'pdf|pptx';
			$config['max_size']             = 20266;
			// $config['max_width']            = 1280;
			// $config['max_height']           = 570;
			// $config['encrypt_name']			= TRUE;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file'))
				{
					$file_lama = $file['file'];
						if($file_lama != 'default.jpg') {
							unlink(FCPATH . 'asset/image/panduan/' . $file_lama);
						}
					$file_baru = $this->upload->data('file_name');
					$this->db->set('file', $file_baru);
				} else
				{
					$data = $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
		   			. $data . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		     			<span aria-hidden="true">&times;</span>
		   			</button>
				 	</div>');
				 	redirect('admin/panduan');
				}	
		}
		$this->db->where('id_panduan',$id_panduan);
    $this->db->update('panduan', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
  		Panduan Penggunaan Berhasil<strong> Diubah!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		redirect('admin/panduan');
	}

	public function hapus_panduan($id_panduan)
	{
		$data = $this->admin_model->getDataByIdPanduan($id_panduan)->row();
		$file ='./asset/image/panduan/' . $data->file;

		if (is_readable($file) && unlink($file)) {
			$this->admin_model->hapusPanduan($id_panduan);
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  		Panduan Penggunaan Berhasil<strong> Dihapus!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
			redirect('admin/panduan');
		} else {
			echo "Gagal";
		}
	}

	public function keunggulan()
	{
		$user = $this->session->userdata('username');
		$data['user'] = $this->admin_model->user($user);
		$data['title'] = 'Keunggulan';
		$data['keunggulan'] = $this->admin_model->keunggulan();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');	
		$this->load->view('template/topbar', $data);	
		$this->load->view('admin/keunggulan/keunggulan', $data);
		$this->load->view('template/footer');
	}

	function proses_tambah_keunggulan()
	{
		$data = [
				'nama_keunggulan' => htmlspecialchars($this->input->post('nama_keunggulan', 'true')),
				'deskripsi' 			=> htmlspecialchars($this->input->post('deskripsi', 'true')),
				'creat_at'   			=> time()
			];

			$this->admin_model->tambah_keunggulan($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  			Keunggulan Berhasil<strong> DiTambahkan!.</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
			</div>');
			redirect('admin/keunggulan');
	}

	public function hapus_keunggulan($id_keunggulan)
	{
		$this->admin_model->hapusKeunggulan($id_keunggulan);
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Keunggulan Berhasil<strong> Dihapus!.</strong>
 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
   			<span aria-hidden="true">&times;</span>
 			</button>
	 	</div>');
		redirect('admin/keunggulan');
	}

	function proses_ubah_keunggulan()
	{
		$id_keunggulan = $this->input->post('id_keunggulan');

		$data = [
				'nama_keunggulan' => htmlspecialchars($this->input->post('nama_keunggulan', 'true')),
				'deskripsi' 			=> htmlspecialchars($this->input->post('deskripsi', 'true')),
				'creat_at'   			=> time()
			];

			$this->admin_model->ubah_keunggulan($data, $id_keunggulan);
			$this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
  			Keunggulan Berhasil<strong> Diubah!.</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
			</div>');
			redirect('admin/keunggulan');
	}

	public function profil()
	{
		$user = $this->session->userdata('username');
		$data['user'] = $this->admin_model->user($user);
		$data['title'] = 'Profil';
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');	
		$this->load->view('template/topbar', $data);	
		$this->load->view('admin/profil/profil', $data);
		$this->load->view('template/footer');
	}

	public function proses_ubah_profil()
	{
		$id_users = $this->input->post('id_users');
		$foto = $this->db->get_where('users',['id_users' => $id_users])->row_array();

		$data = [
			'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
			'profesi' => $this->input->post('profesi', TRUE),
			'created_at' => time()
		];

		// jika ada gambar yang diupload
		$upload_foto = $_FILES['foto']['name'];
		
		if ($upload_foto) {
			$config['upload_path']          = './asset/image/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;
			// $config['max_width']            = 1280;
			// $config['max_height']           = 570;
			// $config['encrypt_name']			= TRUE;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto'))
				{
					$foto_lama = $foto['foto'];
						if($foto_lama != 'default.jpg') {
							unlink(FCPATH . 'asset/image/' . $foto_lama);
						}
					$foto_baru = $this->upload->data('file_name');
					$this->db->set('foto', $foto_baru);
				} else
				{
					$data = $this->upload->display_errors();
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
		   			. $data . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		     			<span aria-hidden="true">&times;</span>
		   			</button>
				 	</div>');
				 	redirect('admin/profil');
				}	
		}
		$this->db->where('id_users',$id_users);
    $this->db->update('users', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
  		Profil Anda Berhasil<strong> Diubah!.</strong>
   			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
     			<span aria-hidden="true">&times;</span>
   			</button>
		 	</div>');
		redirect('admin/profil');
	}





































































































	public function logout() 
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama_lengkap');

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Anda Sudah <strong>Berhasil </strong> Logout.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  			<span aria-hidden="true">&times;</span>
			</button>
		</div>');
		redirect('home/login_admin');

	}



}
