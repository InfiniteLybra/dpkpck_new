<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Auth_model");
        $this->Auth_model->cek_login();
        $this->load->model("History_model");
    }
    public function index()
    {
        $id = $this->session->userdata('id_user');
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE status_berkas = '99'")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/history/index',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        // $this->load->view('admin/history/script');
    }
    public function pulih_data($id)
    {
        $query = $this->History_model->update_kkpr($id);
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');            
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('History');
        }
        redirect('NotifikasiPemulihanData.html');
    }
}