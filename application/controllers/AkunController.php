<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AkunController extends CI_Controller
{

    public function index()
    {
        $this->load->view('LoginView');
    }

    public function registrasi()
    {
        $this->load->view('RegistrasiView');
    }
}
