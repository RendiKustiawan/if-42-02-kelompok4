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

    public function add_dokter()
    {
    $data = [];
    $msg = array('success' => false, 'messages' => array());
    $this->form_validation->set_rules("username", "Username", "trim|required|is_unique[akun.username]");
    $this->form_validation->set_rules("password", "Password", "trim|required|min_length[5]");
    $this->form_validation->set_rules("name", "name", "trim|required");
    $this->form_validation->set_rules("spesialis", "spesialis", "trim|required");
    $this->form_validation->set_rules("lama_bekerja", "lama_bekerja", "trim|required");
    $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');

    if ($this->form_validation->run()) {
      $msg['success'] = true;
      foreach ($_POST as $key => $value) {
        $data[$key] = $value;
      }
      $data1 = [
        'username' => $data['username'],
        'password' => password_hash($data['password'], PASSWORD_DEFAULT),
        'hak_akses' => 2
      ];
      $data2 = [
        'username' => $data['username'],
        'nama' => $data['name'],
        'spesialis' => $data['spesialis'],
        'lama_bekerja' => $data['lama_bekerja'],
      ];
      $this->DokterModel->addAkun($data1);
      $this->DokterModel->addDokter($data2);
    } else {
      foreach ($_POST as $key => $value) {
        $msg['messages'][$key] = form_error($key);
      }
    }
    echo json_encode($msg);
    }
}