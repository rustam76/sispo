<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthUser extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_auth');
	}

	public function index()
	{
		$this->load->view('user/V_login');
	}

	public function Login()
	{

		$email = $this->input->post('nama_pelanggan');
		$password = $this->input->post('password');


		$cekuser = $this->M_auth->LogCekUser($email);

		if ($cekuser) {
			$ceklogin = $this->M_auth->LogCekLogin($email, $password);
			if ($ceklogin) {
				foreach ($ceklogin as $row)
					if ($row->statusUser == "aktif") {
						$this->session->set_userdata('id_pelanggan', $row->id_pelanggan);
						$this->session->set_userdata('nama_pelanggan', $row->nama_pelanggan);
						$this->session->set_userdata('no_hp', $row->no_hp);
						$this->session->set_userdata('alamat', $row->alamat);
						$this->session->set_userdata('foto', $row->foto);
						if ($this->session->userdata('nama_pelanggan') == true ) {
							$this->session->set_flashdata('pesan','berhasil Login');
							redirect('Pengguna/User', 'refresh');
						} else {
							redirect('Pengguna/User');
						}
					} else {
						$this->session->set_flashdata('pesan','maaf username belum aktif');
						redirect('Pengguna/User', 'refresh');
					}
			} else {
				$this->session->set_flashdata('pesan','maaf username salah');
				
				redirect('AuthUser', 'refresh');
			}
		} else {
			$this->session->set_flashdata('pesan','Belum Terdafaftar');
			
			redirect('AuthUser', 'refresh');
		}
	}
	function logout(){
		$this->session->sess_destroy();

		$this->session->set_flashdata('pesan', 'berhasi LogOut');
		redirect('AuthUser');
	}
}
