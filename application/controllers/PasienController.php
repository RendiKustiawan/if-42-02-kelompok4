<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasienController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PasienModel');
    }

    public function index()
    {
        $content['main_view'] = 'PasienView';
        $content['title'] = 'Data Pasien';

        $this->load->view('Body', $content);
    }

    public function data_pasien()
    {
        $data = $this->PasienModel->GetPasien();

        echo json_encode($data);
    }
}
