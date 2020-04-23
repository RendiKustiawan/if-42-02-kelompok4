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

  public function data_one_pendaftar($nip)
  {
    $data = $this->PendaftarModel->GetOnePendaftar($nip);
    echo json_encode($data);
  }

  public function update_pendaftar($id_tabel_pendaftar)
  {
    $data= $this->PendaftarModel->dapatsatupendaftar($id_tabel_pendaftar);
    echo json_encode($data);
  }

  public function delete_pendaftar($id_tabel_pendaftar)
  {
    $this->PendaftarModel->deletePendaftar($id_tabel_pendaftar);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ' . $id_tabel_pendaftar . ' Berhasil Dihapus</div>');
  }

  
  public function edit_pendaftar()
  {
    $data = [];
    $msg = array('success' => false, 'messages' => array());
    $this->form_validation->set_rules("nipp", "NIP", "trim|required");
    $this->form_validation->set_rules("noantrian", "No Antrian", "trim|required");
    $this->form_validation->set_rules("usiaanak", "Usia Anak", "trim|required");
    $this->form_validation->set_rules("tinggianak", "Tinggi Anak", "trim|required");
    $this->form_validation->set_rules("beratanak", "Berat Anak", "trim|required");
    $this->form_validation->set_rules("keluhann", "Keluhan", "trim|required");
    $this->form_validation->set_rules("tanggall", "Tanggal", "trim|required|callback_check_tanggal");
    $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');

    if ($this->form_validation->run()) {
      $msg['success'] = true;
      foreach ($_POST as $key => $value) {
        $data[$key] = $value;
      }
      $data1 = [
        'nip' => $data['nip'],
        'id_jadwal' => $data['tanggall'],
        'no_antrian' => $data['noantrian'],
        'usia_anak' => $data['usiaanak'].' '.$data['usiaa'],
        'tinggi_anak' => $data['tinggianak'].' cm',
        'berat_anak' => $data['beratanak'].' kg',
        'keluhan' => $data['keluhann']
      ];
      $this->PendaftarModel->editPendaftar($data1, $id_tabel_pendaftar);
    } else {
      foreach ($_POST as $key => $value) {
        $msg['messages'][$key] = form_error($key);
      }
  }
}

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
    $this->form_validation->set_rules("tanggal", "Tanggal", "trim|required|callback_check_tanggal");
    $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');

    if ($this->form_validation->run()) {
      $msg['success'] = true;
      foreach ($_POST as $key => $value) {
        $data[$key] = $value;
      }
      $data1 = [
        'nip' => $data['nip'],
        'id_jadwal' => $data['tanggal'],
        'no_antrian' => $data['no_antrian'],
        'usia_anak' => $data['usia_anak'].' '.$data['usia'],
        'tinggi_anak' => $data['tinggi_anak'].' cm',
        'berat_anak' => $data['berat_anak'].' kg',
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

  function check_tanggal()
  {
    foreach ($_POST as $key => $value) {
      $data[$key] = $value;
    }

    $query = $this->db->query("SELECT `id_jadwal` FROM `tabel_pendaftar_imunisasi` WHERE `nip` = " . $data['nip'] . " AND `id_jadwal` = " . $data['tanggal']);

    if ($query->num_rows() > 0) {
      $this->form_validation->set_message('check_tanggal', "You've already registered for this date");
      return FALSE;
    } else {
      return TRUE;
    }
  }

  public function count_jadwal($id_jadwal)
  {
    $data = $this->PendaftarModel->countJadwal($id_jadwal);
    echo json_encode($data);
  }
}
