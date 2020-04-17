<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DokterModel extends CI_Model {

	public function GetDokter()
    {
        $query = $this->db->query('SELECT * FROM  dokter');

        return $query->result();
    }
    public function deleteDokter($username) {
        $this->db->where('username', $username);
        return $this->db->delete('akun');
    }


}