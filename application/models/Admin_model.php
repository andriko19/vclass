<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function users()
	{
		return $this->db->get('users')->result_array();
	}

	public function user($user)
	{
		return $this->db->get_where('users', ['username' => $user])->row_array();
	}

	public function banner()
	{
		return $this->db->get('banner')->result_array();
	}

	public function tambah_banner($data)
	{
		$this->db->insert('banner', $data);
	}

	public function hapusBanner($id_banner)
	{
		$this->db->where('id_banner', $id_banner);
		return $this->db->delete('banner');
	}

	public function getDataByIdBanner($id_banner)
	{
		$this->db->where('id_banner', $id_banner);
		return $this->db->get('banner');
	}

	public function berita()
	{
		return $this->db->get('berita')->result_array();
	}

	public function tambah_berita($data)
	{
		$this->db->insert('berita', $data);
	}

	public function hapusBerita($id_berita)
	{
		$this->db->where('id_berita', $id_berita);
		return $this->db->delete('berita');
	}

	public function getDataByIdBerita($id_berita)
	{
		$this->db->where('id_berita', $id_berita);
		return $this->db->get('berita');
	}

	public function tentang()
	{
		return $this->db->get('tentang')->result_array();
	}

	public function tambah_tentang($data)
	{
		$this->db->insert('tentang', $data);
	}

	public function hapusTentang($id_tentang)
	{
		$this->db->where('id_tentang', $id_tentang);
		return $this->db->delete('tentang');
	}

	public function getDataByIdTentang($id_tentang)
	{
		$this->db->where('id_tentang', $id_tentang);
		return $this->db->get('tentang');
	}

	public function video()
	{
		return $this->db->get('video')->result_array();
	}

	public function tambah_video($data)
	{
		$this->db->insert('video', $data);
	}

	public function ubah_video($data, $id_video)
	{
		$this->db->where('id_video',$id_video);
    $this->db->update('video', $data);
	}

	public function hapusVideo($id_video)
	{
		$this->db->where('id_video', $id_video);
		return $this->db->delete('video');
	}

	public function bahan_ajar()
	{
		return $this->db->get('bahan_ajar')->result_array();
	}

	public function tambah_bahan_ajar($data)
	{
		$this->db->insert('bahan_ajar', $data);
	}

	public function hapusBahanAjar($id_bahan_ajar)
	{
		$this->db->where('id_bahan_ajar', $id_bahan_ajar);
		return $this->db->delete('bahan_ajar');
	}

	public function getDataByIdBahanAjar($id_bahan_ajar)
	{
		$this->db->where('id_bahan_ajar', $id_bahan_ajar);
		return $this->db->get('bahan_ajar');
	}

	public function panduan()
	{
		return $this->db->get('panduan')->result_array();
	}

	public function tambah_panduan($data)
	{
		$this->db->insert('panduan', $data);
	}

	public function hapusPanduan($id_panduan)
	{
		$this->db->where('id_panduan', $id_panduan);
		return $this->db->delete('panduan');
	}

	public function getDataByIdPanduan($id_panduan)
	{
		$this->db->where('id_panduan', $id_panduan);
		return $this->db->get('panduan');
	}

	public function keunggulan()
	{
		return $this->db->get('keunggulan')->result_array();
	}

	public function tambah_keunggulan($data)
	{
		$this->db->insert('keunggulan', $data);
	}

	public function ubah_keunggulan($data, $id_keunggulan)
	{
		$this->db->where('id_keunggulan',$id_keunggulan);
    $this->db->update('keunggulan', $data);
	}

	public function hapusKeunggulan($id_keunggulan)
	{
		$this->db->where('id_keunggulan', $id_keunggulan);
		return $this->db->delete('keunggulan');
	}

	public function hitungJumlahVideo()
	{
    $query = $this->db->get('video');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}

	public function hitungJumlahBahanAjar()
	{
    $query = $this->db->get('bahan_ajar');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}

	public function hitungJumlahBerita()
	{
    $query = $this->db->get('berita');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}

	public function hitungJumlahPanduan()
	{
    $query = $this->db->get('panduan');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}

	public function getDetailBerita($id_berita)
	{
		$this->db->where('id_berita', $id_berita);
    $query = $this->db->get('berita');
    return $query->row_array();
	}

}