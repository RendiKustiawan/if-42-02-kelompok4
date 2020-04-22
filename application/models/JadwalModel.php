<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalModel extends CI_Model {

	public function GetJadwal()
    {
        $query = $this->db->query('SELECT * FROM jadwal_imunisasi JOIN dokter WHERE dokter.id_dokter = jadwal_imunisasi.id_dokter');

        return $query->result();
    }
    public function deleteJadwal($id_jadwal) {
        $this->db->where('id_jadwal', $id_jadwal);
        return $this->db->delete('jadwal_imunisasi');
    }
    public function addJadwal($data) {
        $this->db->insert('jadwal_imunisasi', $data);
        return $this->db->insert_id();
    }

}

/* End of file JadwalModel.php */
/* Location: ./application/models/JadwalModel.php */