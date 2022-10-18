<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_tagihan');
        // $this->load->model('M_dataPelanggan');
		if($this->session->userdata('nama_pelanggan')==null){
			redirect('AuthUser');
		}

	}

	public function index()
	{
		$user = $this->db->get_where('tbl_pelanggan', [
			'nama_pelanggan' => $this->session->userdata('nama_pelanggan')])->row_array();
		// $status =$this->db->get_where('transaksi',['status_code' => 201,]);
		$data = array(

			'tagihan' => $this->M_tagihan->tampilDataTagihanUser($user),	
		);

		$this->load->view('user/templet/header');
		$this->load->view('user/V_user',$data);
		$this->load->view('user/templet/headerBottom');
		// $this->load->view('user/templet/footer');
	}
	public function SudahBayar(){
		
		$user = $this->db->get_where('tbl_pelanggan', ['nama_pelanggan' => $this->session->userdata('nama_pelanggan')])->row_array();
		
		$data = array(
			'transaksi' => $this->M_tagihan->tampilDataTransaksi($user),
        
            	
		);

		$this->load->view('user/templet/header');
		$this->load->view('user/V_sudah',$data);
		$this->load->view('user/templet/headerBottom');
	}
	public function Profil(){

		$this->load->view('user/templet/header');
		$this->load->view('user/V_profil');
		$this->load->view('user/templet/headerBottom');
	}
}