<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Log_model');
    }
    public function index()
    {
        $data['log'] = $this->Log_model->getAlldata();
        $data['user'] = $this->Log_model->getAlluser();
        // var_dump($data['user']);die;
        $this->load->view('templates/header');
        $this->load->view('log/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('log/script');
    }
}