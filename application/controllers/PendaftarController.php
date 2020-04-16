<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasienController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PendaftarModel');
    }

    public function index()
    {
        $content['main_view'] = 'PendaftarView';
        $content['title'] = 'Data Pendaftar';

        $this->load->view('Body', $content);
    }

    public function data_pendaftar()
    {
        $data = $this->PendaftarModel->GetPendaftar();

        echo json_encode($data);
    }
}
