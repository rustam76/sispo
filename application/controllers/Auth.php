<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_auth');
	}

	public function index()
	{
		$this->load->view('V_login');
	}

	public function Login()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');


		$cekuser = $this->M_auth->CekUser($email);

		if ($cekuser) {
			$ceklogin = $this->M_auth->CekLogin($email, $password);
			if ($ceklogin) {
				foreach ($ceklogin as $row)
					if ($row->status == "aktif") {
						$this->session->set_userdata('username', $row->username);
						$this->session->set_userdata('email', $row->email);
						$this->session->set_userdata('level', $row->level);
						if ($this->session->userdata('level') == 1) {
							$this->session->set_flashdata('pesan','berhasil Login');
							redirect('admin/Home', 'refresh');
						} else {
							redirect('admin/Home');
						}
					} else {
						$this->session->set_flashdata('pesan','maaf username belum aktif');
						redirect('admin/Auth', 'refresh');
					}
			} else {
				$this->session->set_flashdata('pesan','maaf username salah');
				
				redirect('Auth', 'refresh');
			}
		} else {
			$this->session->set_flashdata('pesan','Belum Terdafaftar');
			
			redirect('Auth', 'refresh');
		}
	}
	function logout(){
		$this->session->sess_destroy();

		$this->session->set_flashdata('pesan', 'berhasi LogOut');
		redirect('Auth');
	}
}
