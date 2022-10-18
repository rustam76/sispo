<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dataUser extends CI_Model{

    public function tampilDataUser(){

        $this->db->select('tbl_user.id_user, tbl_user.username,tbl_user.email, tbl_user.password, role.level, tbl_user.status');
        $this->db->from('tbl_user');
        $this->db->join('role', 'role.id_role = tbl_user.level' );
        $this->db->order_by('tbl_user.id_user',"DESC");
        $query = $this->db->get();
        return $query->result();


    }
    function simpanData($data, $user){
        
        $this->db->insert($user, $data);
    }

     function updateUser($where,$data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapusUser($where,$table)
    {
        $this->db->where($where,$table);
        $this->db->delete($table);
    }

    function tampilDataRole(){
        return $this->db->get('role')->result();
    }

    public function totalDataUser()
    {
        return $this->db->get('tbl_user')->num_rows();
    }


}