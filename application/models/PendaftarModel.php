<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PendaftarModel extends CI_Model
{
    public function GetPendaftar()
    {
        $query = $this->db->query('SELECT * FROM tabel_pendaftar_imunisasi INNER JOIN jadwal_imunisasi INNER JOIN dokter');
        return $query->result();
    }

    public function deletePendaftar($id_tabel_pendaftar) {
        $this->db->where('id_tabel_pendaftar', $id_tabel_pendaftar);
        return $this->db->delete('tabel_pendaftar_imunisasi');
    }

    // public function editPendaftar($id_tabel_pendaftar){
    //     $this->db->where('id_tabel_pendaftar', $id_tabel_pendaftar);
    //     return $this->db->edit('tabel_pendaftar_imunisasi');
    // }

    public function addPendaftar($data)
    {
        $this->db->insert('tabel_pendaftar_imunisasi', $data);
        return $this->db->insert_id();
    }
}
