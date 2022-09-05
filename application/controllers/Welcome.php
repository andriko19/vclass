<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('halaman_utama');
	}

	public function login_admin()
	{
		$this->load->view('login');
	}
}
