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
    public function addJadwal($data)
    {
        $this->db->insert('jadwal_imunisasi', $data);
        return $this->db->insert_id();
    }
    public function addAkun($data)
    {
        $this->db->insert('akun', $data);
        return $this->db->insert_id();
    }
    public function addDokter($data)
    {
        $this->db->insert('dokter', $data);
        return $this->db->insert_id();
    }


}