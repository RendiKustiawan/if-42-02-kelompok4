<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DokterController extends CI_Controller
{
    public function index()
    {
        $content['main_view'] = 'DokterView';
        $content['title'] = 'Dokter';
        $this->load->view('Body', $content);
    }
}
?>