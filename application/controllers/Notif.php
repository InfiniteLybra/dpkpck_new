<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Auth_model");
        $this->Auth_model->cek_login();
    }
    public function terimakasih_formulir()
    {        
        $this->load->view('templates/header');
        $this->load->view('templates/terimakasih/terimakasih_formulir');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
    }
    public function terimakasih_admin_permohonan()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/terimakasih/terimakasih_admin_permohonan');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
    }
    public function terimakasih_config()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/terimakasih/terimakasih_config');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
    }
    public function terimakasih_kelola_user()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/terimakasih/terimakasih_kelola_user');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
    }
    public function terimakasih_pengembalian()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/terimakasih/terimakasih_pengembalian');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
    }
    public function terimakasih_tolak_permohonan()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/terimakasih/terimakasih_tolak_permohonan');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
    }
    public function terimakasih_simpan_admin_permohonan()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/terimakasih/terimakasih_simpan_admin_permohonan');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
    }
}