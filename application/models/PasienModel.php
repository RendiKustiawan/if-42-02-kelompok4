<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasienModel extends CI_Model
{
    public function GetPasien()
    {
        $query = $this->db->query('SELECT * FROM pasien_user');
        return $query->result();
    }
}
