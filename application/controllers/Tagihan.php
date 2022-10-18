<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_tagihan');
        $this->load->model('M_dataPelanggan');

	}

	public function index()
	{
		$data = array(
			'tagihan' => $this->M_tagihan->tampilDataTagihan(),
            'bulan' => $this->M_tagihan->tampilbulan(),
            'nama' => $this->M_dataPelanggan->tampilDataPelanggan(),
            
			
		);

		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_tagihan',$data);
		$this->load->view('templet/footer');
	}
}