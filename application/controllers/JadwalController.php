<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('JadwalModel');
    }

    public function index()
    {
        $content['main_view'] = 'JadwalView';
        $content['title'] = 'Data Jadwal Imunisasi';

        $this->load->view('Body', $content);
    }

    public function data_jadwal()
    {
        $data = $this->JadwalModel->GetJadwal();

        echo json_encode($data);
    }
    public function delete_jadwal($id_jadwal) {
        $this->JadwalModel->deleteJadwal($id_jadwal);
    }
}