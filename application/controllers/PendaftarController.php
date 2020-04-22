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

    // public function edit_pendaftar($id_tabel_pendaftar){
    //    $data = [
    //        'nip' => $this->input->post('nip');
    //        'no_antrian' => $this->input->post('no_antrian');
    //        'usia_anak' => $this->input->post('usia_anak');
    //        'tinggi_anak' => $this->input->post('tinggi_anak');
    //        'berat_anak' => $this->input->post('berat_anak');
    //        'keluhan' => $this->input->post('keluhan');      
    //    ];
    // }

    public function add_pendaftar()
    {
      $data = [];
      $msg = array('success' => false, 'messages' => array());
      $this->form_validation->set_rules("nip", "NIP", "trim|required");
      $this->form_validation->set_rules("no_antrian", "No Antrian", "trim|required");
      $this->form_validation->set_rules("usia_anak", "Usia Anak", "trim|required");
      $this->form_validation->set_rules("tinggi_anak", "Tinggi Anak", "trim|required");
      $this->form_validation->set_rules("berat_anak", "Berat Anak", "trim|required");
      $this->form_validation->set_rules("keluhan", "Keluhan", "trim|required");
      $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
  
      if ($this->form_validation->run()) {
        $msg['success'] = true;
        foreach ($_POST as $key => $value) {
          $data[$key] = $value;
        }
        $data1 = [
          'nip' => $data['nip'],
          'id_jadwal'=> $data['tanggal'],
          'no_antrian' => $data['no_antrian'],
          'usia_anak' => $data['usia_anak'],
          'tinggi_anak' => $data['tinggi_anak'],
          'berat_anak' => $data['berat_anak'],
          'keluhan' => $data['keluhan']
        ];
        $this->PendaftarModel->addPendaftar($data1);
      } else {
        foreach ($_POST as $key => $value) {
          $msg['messages'][$key] = form_error($key);
        }
      }
      echo json_encode($msg);
    }

}
