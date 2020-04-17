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

    public function all_data_pasien()
    {
        $data = $this->PasienModel->GetAllPasien();

        echo json_encode($data);
    }

    public function delete_pasien($username) {
        $this->PasienModel->deletePasien($username);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data '.$username.' Berhasil Dihapus</div>');
    }
}
