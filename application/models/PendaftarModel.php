<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PendaftarModel extends CI_Model
{
    public function GetPendaftar()
    {
        $query = $this->db->query('SELECT * FROM tabel_pendaftar_imunisasi');
        return $query->result();
    }
}
