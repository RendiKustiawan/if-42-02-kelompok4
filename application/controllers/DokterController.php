<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DokterController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DokterModel');
    }

    public function index()
    {
        $content['main_view'] = 'DokterView';
        $content['title'] = 'Data Dokter';

        $this->load->view('Body', $content);
    }

    public function data_dokter()
    {
        $data = $this->DokterModel->GetDokter();

        echo json_encode($data);
    }
    public function delete_dokter($username) {
        $this->DokterModel->deleteDokter($username);
    }
}