<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->model('M_dataUser');
		$this->load->model('M_dataPelanggan');
		$this->load->model('M_tagihan');
       
		if($this->session->userdata('level')==null){
			redirect('Auth');
		}
    }

	public function index()
	{
		$data=array(
			'totalPelanggan'=> $this->M_dataPelanggan->totalDataPelanggan(),
			'totalKaryawan'=> $this->M_dataUser->totalDataUser(),
			'transaksi' => $this->M_tagihan->tampilDataTransaksi2(),
		);
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_home',$data);
		$this->load->view('templet/footer');
	}
}
