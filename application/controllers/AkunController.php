<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AkunController extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->library('form_validation');
    // }

    // public function index()
    // {
    //     $this->form_validation->set_rules('username', 'Username', 'required|trim');
    //     $this->form_validation->set_rules('password', 'password', 'required|trim');
    //     $content['main_view'] = 'LoginView';
    //     $content['title'] = 'Sign In';

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('Body', $content);
    //     } else {
    //         $this->_login();
    //     }
    // }

    // private function _login()
    // {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');

    //     $query = $this->db->get_where('akun', ['username' => $username])->row_array();
    //     // var_dump($query);
    //     // die;
    //     if ($query) {
    //         if ($query['hak_akses'] == 3) {
    //             if (password_verify($password, $query['password'])) {
    //                 $data = [
    //                     'username' => $query['username']
    //                 ];
    //                 $this->session->set_userdata($data);
    //                 redirect('PasienController');
    //             } else {
    //                 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
    //                 redirect('AkunController');
    //             }
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">username tidak memiliki hak akses!</div>');
    //             redirect('AkunController');
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is Not Registered!</div>');
    //         redirect('AkunController');
    //     }
    // }

    // public function registrasi()
    // {
    //     $this->form_validation->set_rules('nip', 'Nip', 'required|trim|is_unique[pasien_user.nip]', [
    //         'is_unique' => 'NIP sudah Terdaftar'
    //     ]);
    //     $this->form_validation->set_rules('name', 'Name', 'required|trim');
    //     $this->form_validation->set_rules('username', 'Username', 'required|is_unique[pasien_user.username]trim', [
    //         'is_unique' => 'Username Sudah Terdaftar'
    //     ]);
    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
    //         'matches' => 'Password dont Match!',
    //         'min_length' => 'Password too Short'
    //     ]);
    //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('RegistrasiView');
    //     } else {

    //         $data1 = [
    //             'username' => $this->input->post('username', true),
    //             'password' => password_hash(
    //                 $this->input->post('password1'),
    //                 PASSWORD_DEFAULT
    //             ),
    //             'hak_akses' => 3
    //         ];
    //         $data2 = [
    //             'username' => $this->input->post('username', true),
    //             'nip' => $this->input->post('nip', true),
    //             'nama_pasien' => $this->input->post('name', true)


    //         ];

    //         $this->session->set_flashdata('message', '<div class="alert alert-success" 
    //         role="alert">Data Berhasil Ditambahkan!</div>');
    //         $this->db->insert('akun', $data1);
    //         $this->db->insert('pasien_user', $data2);
    //         redirect('AkunController');
    //     }
    // }
}
