<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dataPelanggan extends CI_Model{
    public function tampilDataPelanggan()
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->order_by('id_pelanggan',"DESC");
        $query= $this->db->get();
        return $query->result();
    }

    function simpanDataPelanggan($data, $pelanggan)
    {
        $this->db->insert($pelanggan, $data);
    }

    function updateDataPelanggan($where,$data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapusDataPelanggan($where,$table)
    {
        $this->db->where($where,$table);
        $this->db->delete($table);

    }

    // function detailDataArsip($id_arsip = NULL){
    //     $query = $this->db->get_where('arsip',array('id_arsip' => $id_arsip))->row();
    //     return $query;
    // }
   
    public function totalDataPelanggan()
    {
        return $this->db->get('tbl_pelanggan')->num_rows();
    }

}