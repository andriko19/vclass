<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('users_model');
		$this->load->model('admin_model');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('admin');
		}
		// jumlah conten
		$data['videojum'] 			= $this->admin_model->hitungJumlahVideo();
		$data['bahan_ajarjum'] = $this->admin_model->hitungJumlahBahanAjar();
		$data['beritajum']	 		= $this->admin_model->hitungJumlahBerita();
		$data['panduanjum'] 		= $this->admin_model->hitungJumlahPanduan();

		// banner
		$data['banner'] = $this->admin_model->banner();

		// tentang
		$data['tentang'] = $this->users_model->last_tentang();

		// tentang
		$data['video'] = $this->admin_model->video();

		// bahan_ajar
		$data['bahan_ajar'] = $this->admin_model->bahan_ajar();

		// berita
		$data['berita'] = $this->admin_model->berita();

		// panduan
		$data['panduan'] = $this->admin_model->panduan();

		// users
		$data['users'] = $this->admin_model->users();

		// keunggulan
		$data['keunggulan'] = $this->admin_model->keunggulan();




		$this->load->view('halaman_utama', $data);
	}

	public function login_admin()
	{
		if ($this->session->userdata('username')) {
			redirect('admin');
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required' => 'Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'Tidak Boleh Kosong!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('template/header_auth', $data);
			$this->load->view('login');
			$this->load->view('template/footer_auth');
		} else {
			// apabila validasi alert-success
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['username' => $username])->row_array();
		
		// jika usernya ada
		if ($user) {
			// jika passwornya benar
			if (password_verify($password, $user['password'])) {
				// jika benra
				$data = [
					'username' => $user['username'],
					'nama_lengkap' => $user['nama_lengkap']
				];
				$this->session->set_userdata($data);
				redirect('admin');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  			Password Anda<strong> Salah!.</strong>
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    			<span aria-hidden="true">&times;</span>
	  			</button>
				</div>');
				redirect('home/login_admin');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  			Username belum<strong> Terdaftar!.</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
			</div>');
			redirect('home/login_admin');
		}
	}

	public function register_admin()
	{
		if ($this->session->userdata('username')) {
			redirect('admin');
		}
		
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
			'required' => 'Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('profesi', 'Profesi', 'required|trim', [
			'required' => 'Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
			'is_unique' => 'Username sudah digunakan!',
			'required' => 'Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
			'matches' => 'Password harus sama!',
			'min_length' => 'Password harus 6 karakter!',
			'required' => 'Tidak Boleh Kosong!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Register';
			$this->load->view('template/header_auth', $data);
			$this->load->view('register');
			$this->load->view('template/footer_auth');
		} else {
			$data = [
				'username'     => htmlspecialchars($this->input->post('username', 'true')),
				'password'     => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', 'true')),
				'profesi'  	   => htmlspecialchars($this->input->post('profesi', 'true')),
				'foto' 		   => 'default.jpg',
				'created_at'   => time()
			];

			$this->users_model->register($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  			Data User Berhasil<strong> DiTambahkan!.</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
			</div>');
			redirect('home/login_admin');
		}
	}

	public function detail_berita($id_berita)
	{
		$data['det_berita'] = $this->admin_model->getDetailBerita($id_berita);
		$this->load->view('detail_berita', $data);
	}

	public function index_admin()
	{
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar');
    $this->load->view('template/content');
    $this->load->view('template/footer');
	}

	public function download_file($file)
	{
		force_download('asset/image/pdf/'.$file, NULL);
	}

	public function download_panduan($file)
	{
		force_download('asset/image/panduan/'.$file, NULL);
	}
}
