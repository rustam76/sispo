<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tagihan extends CI_Model{

    public function tampilDataTagihan(){

        $this->db->select('*');
        $this->db->from('tbl_tagih');
        $this->db->order_by('id_tagih',"DESC");
        return $this->db->get()->result();

        // $this->db->select('tbl_tagihan.id_tagihan, tbl_tagihan.kode, tbl_pelanggan.nama_pelanggan, tbl_tagihan.bulan,
        //                     tbl_tagihan.tahun, tbl_tagihan.bayar, tbl_tagihan.sattus');
        // $this->db->from('tbl_tagihan');
        // $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = tbl_tagihan.id_pelanggan');
        // $query = $this->db->get();
        // return $query->result();
    }

    public function detailDataPelanggan($id){

        $this->db->select('tbl_detail_tagihan.id_detail,tbl_detail_tagihan.nama_pelanggan_id, 
        tbl_detail_tagihan.tagih_id, tbl_tagih.kode_tagihan, tbl_tagih.date_tagihan, tbl_pelanggan.nama_pelanggan,tbl_pelanggan.no_hp, tbl_tagih.total_tagihan,
        tbl_detail_tagihan.order_id,tbl_detail_tagihan.gross_amount,tbl_detail_tagihan.payment_type,tbl_detail_tagihan.transaction_time,
        tbl_detail_tagihan.bank,tbl_detail_tagihan.va_number,tbl_detail_tagihan.pdf_url,tbl_detail_tagihan.status_code
        ');
		$this->db->from('tbl_detail_tagihan');
		$this->db->join('tbl_tagih', 'tbl_tagih.id_tagih = tbl_detail_tagihan.tagih_id');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = tbl_detail_tagihan.nama_pelanggan_id',);

		$this->db->where($id);
		return $this->db->get()->result();
        
    }

    public function statusDataPelanggan($id){

        $this->db->select('tbl_detail_tagihan.id_detail, tbl_detail_tagihan.tagih_id, tbl_tagih.kode_tagihan, 
        tbl_tagih.date_tagihan, tbl_pelanggan.nama_pelanggan,tbl_pelanggan.no_hp, tbl_tagih.total_tagihan, 
        transaksi.status_code,transaksi.pdf_url');
		$this->db->from('tbl_detail_tagihan');
		$this->db->join('tbl_tagih', 'tbl_tagih.id_tagih = tbl_detail_tagihan.tagih_id');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = tbl_detail_tagihan.nama_pelanggan_id',);
        $this->db->join('transaksi', 'transaksi.pelanggan_id = tbl_detail_tagihan.nama_pelanggan_id');
		$this->db->where($id);
		return $this->db->get()->result();
        
    }

    function SimpanDataTagihan($kode,$bulan,$bayar,$id_pelanggan){
      $this->db->trans_start();
            //INSERT TO PACKAGE
            // date_default_timezone_set("Asia/Bangkok");
            $data  = array(
                'kode_tagihan' => $kode,
                'date_tagihan' => $bulan,
                'total_tagihan' => $bayar
            );
        $this->db->insert('tbl_tagih', $data);
        $tagih_id = $this->db->insert_id();
        $result = array();
        foreach($id_pelanggan as $key => $val){
            $result[] = array(
                'tagih_id' => $tagih_id,
                'nama_pelanggan_id' => $_POST['id_pelanggan'][$key],
            );
        }
        $this->db->insert_batch('tbl_detail_tagihan',$result);
    $this->db->trans_complete();

    }

    function deleteTagih($id){
        $this->db->trans_start();
            $this->db->delete('tbl_detail_tagihan', array(' tagih_id' => $id));
            $this->db->delete('tbl_tagih', array('id_tagih' => $id));
        $this->db->trans_complete();
    }

    function tampilDataPesan(){
        $this->db->select('*');
        $this->db->from('tbl_pesan');
        $this->db->order_by('id_pesan',"DESC");
        return $this->db->get()->result();

    }

    function hapusPesan($where, $table){
        $this->db->where($where,$table);
        $this->db->delete($table);
    
    }
    function hapusDetail($where, $table){
        $this->db->where($where,$table);
        $this->db->delete($table);
    }

    public function cekkode()
    {
        $query = $this->db->query("SELECT MAX(kode_tagihan) as kode_tagihan from tbl_tagih");
        $hasil = $query->row();
        return $hasil->kode_tagihan;
    }
    public function tampilBulan(){
        $this->db->select('*');
        $this->db->from('tbl_bulan');
        $query= $this->db->get();
        return $query->result();
    }

    public function tampilDataTagihanUser($user){
       
        
        $this->db->select('tbl_detail_tagihan.id_detail, tbl_detail_tagihan.tagih_id, 
        tbl_tagih.kode_tagihan, tbl_tagih.date_tagihan, tbl_pelanggan.nama_pelanggan,
        tbl_pelanggan.no_hp, tbl_tagih.total_tagihan');
		$this->db->from('tbl_detail_tagihan');
		$this->db->join('tbl_tagih', 'tbl_tagih.id_tagih = tbl_detail_tagihan.tagih_id');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan = tbl_detail_tagihan.nama_pelanggan_id',);
        // $this->db->join('transaksi', 'transaksi.pelanggan_id = tbl_detail_tagihan.nama_pelanggan_id');
		$this->db->where($user);
        $this->db->order_by('tagih_id',"DESC");
        return $this->db->get()->result();

    }
    function tampilDataTransaksi2(){

        $this->db->select('.transaksi.order_id,tbl_pelanggan.nama_pelanggan,transaksi.gross_amount,
        transaksi.payment_type, transaksi.transaction_time, transaksi.bank, transaksi.va_number, 
        transaksi.status_code, transaksi.pdf_url');
		$this->db->from('transaksi');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan= transaksi.pelanggan_id',);
        $this->db->order_by('transaksi.order_id',"DESC");
        return $this->db->get()->result();
    }

    function tampilDataTransaksi($user){

        $this->db->select('.transaksi.order_id,tbl_pelanggan.nama_pelanggan,transaksi.gross_amount,
        transaksi.payment_type, transaksi.transaction_time, transaksi.bank, transaksi.va_number, 
        transaksi.status_code, transaksi.pdf_url');
		$this->db->from('transaksi');
        $this->db->join('tbl_pelanggan', 'tbl_pelanggan.id_pelanggan= transaksi.pelanggan_id',);
		$this->db->where($user);
        $this->db->order_by('order_id',"DESC");
        return $this->db->get()->result();
    }
}