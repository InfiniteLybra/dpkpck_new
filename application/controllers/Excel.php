<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Excel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Auth_model");
        // $this->load->model("Model_DPKCPK");
    }
    public function laporan_kkpr($id)
    {
        $data['data'] = $this->db->query("SELECT * FROM data_sertifikat_peta WHERE id_permohonan = '$id'")->row(); 
        $html = $this->load->view('excel/kkpr/peta', $data);
    }    
    public function draf_peta($id)
    {
        $data['data'] = $this->db->query("SELECT * FROM data_sertifikat_draft_peta WHERE id_permohonan = '$id'")->row(); 
        $html = $this->load->view('pdf/draf_peta', $data, TRUE);
    }
    public function lhs($id)
    {
        $data['data'] = $this->db->query("SELECT * FROM data_sertifikat_lhs WHERE id_permohonan = '$id'")->row(); 
        $html = $this->load->view('pdf/lhs', $data, TRUE);
    }
}
