<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalModel extends CI_Model {

	public function GetJadwal()
    {
        $query = $this->db->query('SELECT * FROM jadwal_imunisasi INNER JOIN dokter');

        return $query->result();
    }


}

/* End of file JadwalModel.php */
/* Location: ./application/models/JadwalModel.php */