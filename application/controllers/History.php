<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Auth_model");
        $this->Auth_model->cek_login();
    }
    public function index()
    {
        $id = $this->session->userdata('id_user');
        $data['log'] = $this->db->query("SELECT * FROM log_admin WHERE id_user = '$id'")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/history/index',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        // $this->load->view('admin/history/script');
    }
}