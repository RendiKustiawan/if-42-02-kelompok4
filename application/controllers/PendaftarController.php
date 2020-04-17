<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PendaftarController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PendaftarModel');
    }

    public function index()
    {
        $content['main_view'] = 'PendaftarView';
        $content['title'] = 'Data Pendaftaran';

        $this->load->view('Body', $content);
    }

    public function data_pendaftar()
    {
        $data = $this->PendaftarModel->GetPendaftar();

        echo json_encode($data);
    }

    public function delete_pendaftar($id_tabel_pendaftar) {
        $this->PendaftarModel->deletePendaftar($id_tabel_pendaftar);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data '.$id_tabel_pendaftar.' Berhasil Dihapus</div>');
    }
}
