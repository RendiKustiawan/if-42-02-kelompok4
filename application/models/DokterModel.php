<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DokterModel extends CI_Model {

	public function GetDokter()
    {
        $query = $this->db->query('SELECT * FROM  dokter');

        return $query->result();
    }


}