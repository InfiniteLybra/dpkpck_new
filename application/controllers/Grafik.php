<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('admin/grafik/index');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/grafik/script');
    }
}
