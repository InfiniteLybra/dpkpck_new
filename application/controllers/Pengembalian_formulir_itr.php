<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian_formulir_itr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Itr_Model");
        $this->load->model("Pengembalian_formulir_itr_Model");
        $this->load->model("Auth_model");
        
    }
    public function index()
    {
        $data['pengembalian_itr']= $this->db->query("SELECT * FROM pengembalian_itr_permohonan")->result();
        $data['pengembalian_kkpr']= $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan")->result();
        $this->load->view('templates/header');
        $this->load->view('user/itr/pengembalian_formulir_itr',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('user/itr/script_pengembalian_itr');
    }
    public function detail_formulir_itr($id)
    {
        $data['itr'] = $this->db->query("SELECT * FROM itr_permohonan WHERE id_itr = '$id'")->row();
        $this->load->view('templates/header');
        $this->load->view('user/itr/detail_pengembalian_formulir_itr',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        // $this->load->view('user/itr/script_itr');
    }
    function proses_upload_ulang()
    {
        $query = $this->Pengembalian_formulir_itr_Model->upload_ulang();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil di Upload Ulang');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal di Upload Ulang');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            // redirect('Itr');
        }
        redirect('Pengembalian_formulir_itr');
    }
    public function detail_formulir_kkpr($id)
    {
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id'")->row();
        $this->load->view('templates/header');
        $this->load->view('user/kkpr/detail_pengembalian_formulir_kkpr',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        // $this->load->view('user/kkpr/detail_pengembalian_formulir_kkpr');
    }
    function proses_upload_ulang_kkpr()
    {
        $query = $this->Pengembalian_formulir_itr_Model->upload_ulang_kkpr();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil di Upload Ulang');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal di Upload Ulang');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            // redirect('Itr');
        }
        redirect('Pengembalian_formulir_itr');
    }
}
?>