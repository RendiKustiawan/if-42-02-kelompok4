<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasienController extends CI_Controller
{
    public function index()
    {
        echo 'Selamat datang ' . $this->session->userdata('nama');
    }
}
