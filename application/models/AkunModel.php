<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AkunModel extends CI_Model
{
    public function GetAkun()
    {
        $query = $this->db->query('SELECT * FROM akun');

        return $query->result();
    }

    public function delete_akun($username)
    {
        $this->db->where('username', $username);
        return $this->db->delete('akun');
    }
}
