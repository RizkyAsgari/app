<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{

	public function lensa()
	{
		$data['title'] = 'Lensa Categories';
		$data['lensa'] = $this->model_kategori->lensa()->result();
		$this->load->view('layout/home/header', $data);
		$this->load->view('home/lensa', $data);
		$this->load->view('layout/home/footer');
	}

	public function lighting()
	{
		$data['title'] = 'Lighting Categories';
		$data['lighting'] = $this->model_kategori->lighting()->result();
		$this->load->view('layout/home/header', $data);
		$this->load->view('home/lighting', $data);
		$this->load->view('layout/home/footer');
	}

	public function kamera()
	{
		$data['title'] = 'Kamera Categories';
		$data['kamera'] = $this->model_kategori->kamera()->result();
		$this->load->view('layout/home/header', $data);
		$this->load->view('home/kamera', $data);
		$this->load->view('layout/home/footer');
	}

	public function tripod()
	{
		$data['title'] = 'Tripod Categories';
		$data['tripod'] = $this->model_kategori->tripod()->result();
		$this->load->view('layout/home/header', $data);
		$this->load->view('home/tripod', $data);
		$this->load->view('layout/home/footer');
	}

	public function gimbal()
	{
		$data['title'] = 'Gimbal Categories';
		$data['gimbal'] = $this->model_kategori->gimbal()->result();
		$this->load->view('layout/home/header', $data);
		$this->load->view('home/gimbal', $data);
		$this->load->view('layout/home/footer');
	}
}
