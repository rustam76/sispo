<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{

    public function CekUser($email)
    {

        $query = $this->db->query("SELECT * from tbl_user where email ='$email'");
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function CekLogin($email,$password){
        
        $query = $this->db->query("SELECT * from tbl_user where email ='$email' and password='$password'");
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    
    }

    public function LogCekUser($email)
    {

        $query = $this->db->query("SELECT * from tbl_pelanggan where nama_pelanggan ='$email'");
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function LogCekLogin($email,$password){
        
        $query = $this->db->query("SELECT * from tbl_pelanggan where nama_pelanggan ='$email' and password='$password'");
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
}
