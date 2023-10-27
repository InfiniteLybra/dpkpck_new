<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model("Kkpr_Model");
        $this->load->library('session');
        $this->load->model("Auth_model");
        $this->Auth_model->cek_login();
    }
    public function admin()
    {       
        $this->load->view('templates/header');
        $this->load->view('dashboard/dashboard_admin');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        // $this->load->view('kkpr/filter/script_filter');
    }
    public function user()
    {       
        $this->load->view('templates/header');
        $this->load->view('dashboard/dashboard_user');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        // $this->load->view('kkpr/filter/script_filter');
    }
    // public function user()
    // {       
        // $this->load->view('templates/header');
        // $this->load->view('templates/landing');
        // $this->load->view('templates/script_landing');
        // $this->load->view('templates/footer');
        // $this->load->view('templates/footScript');
        // $this->load->view('kkpr/filter/script_filter');
    // }
}