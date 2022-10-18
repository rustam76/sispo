<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->model('M_tagihan');
       
		if($this->session->userdata('level')==null){
			redirect('Auth');
		}
    }

public function index(){
		$data = array(
			'pesan' => $this->M_tagihan->tampilDataPesan(),
		);
		$this->load->view('templet/header');
		$this->load->view('templet/sidebar');
		$this->load->view('admin/V_Pesan',$data);
		$this->load->view('templet/footer');
	}

    function hapusDataPesan($id_pesan)
	{
		$where = array(
			'id_pesan' => $id_pesan
		);
		$this->M_tagihan->hapusPesan($where, 'tbl_pesan');
		$this->session->set_flashdata('pesan', 'berhasil hapus data');
		redirect('admin/Pesan');
	}

    public function kirimPesan()
	{
			date_default_timezone_set('Asia/Makassar');
			$waktu = date("Y-m-d H:i:s");
			$nama_akses=$this->session->userdata('username');

			$input = $this->input->post('no_hp', true);
			$isi_pesan = $this->input->post('pesan', true);
				
				//POST FORM		
				$spasi='';

				for ($i=0; $i < count($input) ; $i++) 
				{ 
				//Ambil data kontak
				$result = $this->db->query("SELECT * FROM tbl_pelanggan where tbl_pelanggan.no_hp=$input[$i]");
				foreach ($result->result_array() as $id)
				$nama=$id['nama_pelanggan'];
				
				
				//Kirim API
				$phone=$input[$i];
				$pesan=''.$spasi.'Yth Bpk/Ibu '.$nama.''.$spasi.''.$spasi.''.$isi_pesan; 
				$this->kirimWa($phone,$pesan);

				$simpan=array(
					'tanggal'			=> $waktu,
					'no_hp'			    => $phone,
					'interval'			=> 5, 
					'isi_pesan'			=> $isi_pesan,
                    'proses'			=> 1,
					'device'			=> $nama_akses
				);
					$this->db->insert('tbl_pesan', $simpan);
                   
					
				}

	}

	public function kirimWa($phone,$pesan){

		$api_key   = '9699c055d1ea2d9ce1ca02e22adf36ef69f6fc2a';  // API KEY Anda
		$id_device = '3852'; // ID DEVICE yang di SCAN (Sebagai pengirim)
        $url   = 'https://api.watsap.id/send-message'; // URL API
		$no_hp = $phone; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $pesan; // Pesan yang dikirim

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 20); // batas waktu response
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_POST, 1);

		$data_post = [
			'id_device' => $id_device,
			'api-key' => $api_key,
			'no_hp'   => $no_hp,
			'pesan'   => $pesan
		];
		// var_dump($data_post); die;
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
		curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		$response = curl_exec($curl);
		curl_close($curl);
		echo 'RESULT <br><pre>';
    	var_dump($response);
        // echo $response;
		// $this->updateStatus($response);
	}
    // public function updateStatus($response){
      
	

    // }



}