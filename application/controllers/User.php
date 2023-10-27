<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Itr_Model");
        $this->load->model("Auth_model");
        $this->Auth_model->cek_login();
    }
    public function index()
    {
        // $data['itr'] = $this->db->query("SELECT * FROM itr_kuasa")->result();
        // $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_kuasa")->result();
        $this->load->view('templates/header');
        $this->load->view('user/dashboard/dashboard');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('user/dashboard/script');
    }
    public function kelola_user()
    {        
        $this->load->view('templates/header');
        $this->load->view('admin/kelola_user/index');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        // $this->load->view('user/dashboard/script');
    }
}
?>