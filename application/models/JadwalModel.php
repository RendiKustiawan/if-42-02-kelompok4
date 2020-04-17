<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalModel extends CI_Model {

	public function GetJadwal()
    {
        $query = $this->db->query('SELECT * FROM jadwal_imunisasi INNER JOIN dokter');

        return $query->result();
    }
    public function deleteJadwal($id_jadwal) {
        $this->db->where('id_jadwal', $id_jadwal);
        return $this->db->delete('jadwal_imunisasi');
    }

}

/* End of file JadwalModel.php */
/* Location: ./application/models/JadwalModel.php */