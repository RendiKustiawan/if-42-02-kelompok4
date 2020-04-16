<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    public function GetAdmin()
    {
        $query = $this->db->query('SELECT * FROM admin');

        return $query->result();
    }
}
