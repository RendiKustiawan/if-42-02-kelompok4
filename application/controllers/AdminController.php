<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
    }

    public function index()
    {
        $content['main_view'] = 'AdminView';
        $content['title'] = 'Data Admin';

        $this->load->view('Body', $content);
    }

    public function data_admin()
    {
        $data = $this->AdminModel->GetAdmin();

        echo json_encode($data);
    }
}
