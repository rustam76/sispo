<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dataPelanggan extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_dataPelanggan');

		if($this->session->userdata('level')==null){
			redirect('Auth');
		}
    }
	// Menampilkan data Arsip
	public function index()
	{
		$data=array(
			'pelanggan'=> $this->M_dataPelanggan->tampilDataPelanggan(),
		);
		
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_dataPelanggan',$data);
		$this->load->view('templet/footer');
	}

	public function simpanDataPelanggan()
	{
		$config['upload_path']="./assets/pelanggan";
        $config['allowed_types']='jpg||png';
        $config['max_size']= 0;
     

        $this->load->library('upload',$config);
		if(!$this->upload->do_upload('foto'))
        {
            $error = array('error' => $this->upload->display_errors());
            redirect('admin/dataPelanggan',$error);	
        } else {

		$foto = $this->upload->data();
		$foto = $foto['file_name'];

		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');


		$data = array(
			'nama_pelanggan' => $nama_pelanggan,
			'email' => $email,
			'password' =>$password,
			'no_hp' => $no_hp,
			'alamat' => $alamat,
			'foto' => $foto
		);

		$this->M_dataPelanggan->simpanDataPelanggan($data,'tbl_pelanggan');
		$this->session->set_flashdata('pesan','berhasil tambah data');
		redirect('admin/dataPelanggan');
	}

	}

	public function editDataPelanggan(){
		$config['upload_path']="./assets/pelanggan";
        $config['allowed_types']='jpg||png';
        $config['max_size']= 0;
     

        $this->load->library('upload',$config);
		if(!$this->upload->do_upload('foto'))
        {
            $error = array('error' => $this->upload->display_errors());
            redirect('admin/dataPelanggan',$error);	
        } else {
		
		$id = $this->input->post('id_pelanggan');
		$foto = $this->upload->data();
		$foto = $foto['file_name'];

		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');


		$data = array(
			'nama_pelanggan' => $nama_pelanggan,
			'email' => $email,
			'password' =>$password,
			'no_hp' => $no_hp,
			'alamat' => $alamat,
			'foto' => $foto
		);

		$where = array(
			'id_pelanggan' => $id,
		);

		$this->M_dataPelanggan->updateDataPelanggan($where,$data,'tbl_pelanggan');
		$this->session->set_flashdata('pesan','berhasil ubah data');
		redirect('admin/dataPelanggan');
	}
	}

	public function hapusDataPelanggan($id_pelanggan){
		$where= array(
			'id_pelanggan' => $id_pelanggan
		);
		$this->M_dataPelanggan->hapusDataPelanggan($where,'tbl_pelanggan');
		$this->session->set_flashdata('pesan','berhasil hapus data');
		redirect('admin/dataPelanggan');
	}

	
}
