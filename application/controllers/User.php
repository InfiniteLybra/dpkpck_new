<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Itr_Model");
        
    }
    public function index()
    {
        $data['itr'] = $this->db->query("SELECT * FROM itr_kuasa")->result();
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_kuasa")->result();
        $this->load->view('templates/header');
        $this->load->view('user/dashboard/dashboard',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        // $this->load->view('itr/permohonan/script_itr_tambah');
    }
}
?>