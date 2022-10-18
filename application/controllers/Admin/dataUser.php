<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dataUser extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_dataUser');

		if ($this->session->userdata('level') == null) {
			redirect('Auth');
		}
	}

	public function index()
	{

		$data = array(
			'user' => $this->M_dataUser->tampilDataUser(),
			'role' => $this->M_dataUser->tampilDataRole(),
		);
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_user', $data);
		$this->load->view('templet/footer');
	}

	public function simpanDataUser()
	{
		$config['upload_path']="./assets/user";
        $config['allowed_types']='jpg||png';
        $config['max_size']= 0;
     

        $this->load->library('upload',$config);
		if(!$this->upload->do_upload('fot'))
        {
            $error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan', 'error');
            redirect('admin/dataUser',$error);	
        } else {

		$foto = $this->upload->data();
		$foto = $foto['file_name'];

		$nama = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$data = array(
			'username' => $nama,
			'email' => $email,
			'password' => $password,
			'level' => $level,
			'foto' => $foto
		);

		var_dump($data);

		// $this->M_dataUser->simpanData($data, 'tbl_user');

		// $this->session->set_flashdata('pesan', 'berhasil tambah Karyawan');
		// redirect('admin/dataUser');
		}
	}

	public function updateDataUser()
	{
		$config['upload_path']="./assets/user";
        $config['allowed_types']='jpg||png';
        $config['max_size']= 0;
     

        $this->load->library('upload',$config);
		if(!$this->upload->do_upload('foto'))
        {
            $error = array('error' => $this->upload->display_errors());
            redirect('admin/dataUser',$error);	
        } else {

		$id_user = $this->input->post('id_user');
		$foto = $this->upload->data();
		$foto = $foto['file_name'];
		

		$nama = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$status = $this->input->post('status');
	
		$where = array(
			'id_user' => $id_user,
		);

		$data = array(
			'username' => $nama,
			'email' => $email,
			'password' => $password,
			'level' => $level,
			'status' => $status,
			'foto' => $foto
		);

		var_dump($data);

		// $this->M_dataUser->updateUser($where, $data, 'tbl_user');

		// $this->session->set_flashdata('pesan', 'berhasil edit Karyawan');
		// redirect('admin/dataUser');
		}
	}

	function hapusDataUser($id_user)
	{
		$where = array(
			'id_user' => $id_user
		);
		$this->M_dataUser->hapusUser($where, 'tbl_user');
		$this->session->set_flashdata('pesan', 'berhasil hapus data');
		redirect('admin/dataUser');
	}
}
