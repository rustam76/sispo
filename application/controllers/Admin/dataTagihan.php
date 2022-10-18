<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dataTagihan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_tagihan');
		$this->load->model('M_dataPelanggan');
		$params = array('server_key' => 'SB-Mid-server-KQDvV6aYBQ0v0buAcyCs7fsY', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);

		if($this->session->userdata('level')==null){
			redirect('Auth');
		}
	}

	public function index()
	{
		$dariDB = $this->M_tagihan->cekkode();
        
        $nourut = substr($dariDB, 3, 4);
        $kodeBarangSekarang = $nourut + 1;
		$data = array(
			'tagihan' => $this->M_tagihan->tampilDataTagihan(),
			'kode_tagihan' => $kodeBarangSekarang,
			// 'nama' => $this->M_dataPelanggan->tampilDataPelanggan(),
			'nomor' => $this->M_dataPelanggan->tampilDataPelanggan(),
		);



		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_tagihan', $data);
		// $this->load->view('admin/V_tagihan',$data);
		$this->load->view('templet/footer');
	}

	public function SimpanDataTagihan()
	{

		$kode = $this->input->post('kode_tagihan', true);
		$bulan = $this->input->post('date_tagihan', true);
		$bayar = $this->input->post('bayar', true);
		$id_pelanggan = $this->input->post('id_pelanggan', true);


		$this->M_tagihan->SimpanDataTagihan($kode, $bulan, $bayar, $id_pelanggan);
		// var_dump($data); die;
		$this->session->set_flashdata('pesan','berhasil Tambah data');
		redirect('admin/dataTagihan'); 

	}

	public function dataStatus($id)
	{
		$where = array(
			'tagih_id' => $id
		);

		$data = array(
		
			'status' => $this->M_tagihan->statusDataPelanggan($where),
	
		);
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_status',$data);
		$this->load->view('templet/footer');
	}

	public function detailTagihan($id)
	{
		$where = array(
			'tagih_id' => $id
		);

		$data = array(
		
			'tagihan' => $this->M_tagihan->tampilDataTagihan(),
			// 'bulan' => $this->M_tagihan->tampilbulan(),
			'detail' => $this->M_tagihan->detailDataPelanggan($where),
			'nomor' => $this->M_dataPelanggan->tampilDataPelanggan(),
		);
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_detailTagihan',$data);
		$this->load->view('templet/footer');
	}

	function hapusTagihan($id){
       
        $this->M_tagihan->deleteTagih($id);
		$this->session->set_flashdata('pesan','berhasil hapus data');
		redirect('admin/dataTagihan');
    }

	function hapusDatadetail($id_detail)
	{
		$where = array(
			'id_detail' => $id_detail
		);
		$this->M_tagihan->hapusDetail($where, 'tbl_detail_tagihan');
		$this->session->set_flashdata('pesan', 'berhasil hapus data');
		redirect('admin/dataTagihan/');
	}

	

	// // Edit kategori
	// public function EditKategori()
	// {

	// }

	// // HApus KAtegori
	// public function HapusDataKategori($id_kategori)
	// {
	// 	$data = array(
	// 			'id_kategori' => $id_kategori
	// 	);
	// 	$this->M_kategori->hapusDataKategori($data);
	// 	redirect('Kategori');
	// }
}
