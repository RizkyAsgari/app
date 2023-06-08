<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kategori extends CI_Model
{
	public function lensa()
	{
		return $this->db->get_where('product', array('kategori' => 'lensa'));
	}

	public function lighting()
	{
		return $this->db->get_where('product', array('kategori' => 'lighting'));
	}

	public function kamera()
	{
		return $this->db->get_where('product', array('kategori' => 'kamera'));
	}

	public function tripod()
	{
		return $this->db->get_where('product', array('kategori' => 'tripod'));
	}

	public function gimbal()
	{
		return $this->db->get_where('product', array('kategori' => 'gimbal'));
	}
}
