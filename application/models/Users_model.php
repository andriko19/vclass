<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function register($data)
	{
		$this->db->insert('users', $data);
	}

	public function last_tentang()
	{
		$last = $this->db->order_by('id_tentang',"desc")
		  ->limit(1)
		  ->get('tentang')
		  ->row_array();
		return $last;
	}

}