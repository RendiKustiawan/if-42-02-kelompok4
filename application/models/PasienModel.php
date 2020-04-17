<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasienModel extends CI_Model
{
    public function GetAllPasien()
    {
        $query = $this->db->query('SELECT * FROM pasien_user');
        return $query->result();
    }

    public function deletePasien($username) {
        $this->db->where('username', $username);
        return $this->db->delete('akun');
    }
}
