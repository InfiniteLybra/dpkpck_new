<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Legenda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Legenda_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['legenda'] = $this->Legenda_model->getAllLegenda();
        $this->load->view('templates/header');
        $this->load->view('admin/legenda/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/legenda/script');
    }

    public function tambah()
    {
        // $this->form_validation->set_rules('id_legenda', 'Id Legenda', 'required');
        // $this->form_validation->set_rules('type', 'Type', 'required');
        // $this->form_validation->set_rules('legenda', 'Legenda', 'required');
        // $this->form_validation->set_rules('foto', 'Foto', 'required');

        // if ($this->form_validation->run() == FALSE) {
        //     echo 'ko';die;
            $this->load->view('templates/header');
            $this->load->view('admin/legenda/tambah');
            $this->load->view('templates/footer');
            $this->load->view('templates/footScript');
        // } else {
        //     echo 'ok';die;
        //     if ($this->Legenda_model->TambahDataLegenda() == true) {
        //         $this->session->set_flashdata('flash', 'Ditambahkan');
        //         redirect('legenda');
        //     } else {
        //         $this->session->set_flashdata('flash', 'Gagal Ditambahkan');
        //     }
        // }
    }

    public function tambahData() {
        if ($this->Legenda_model->TambahDataLegenda() == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            redirect('legenda');
        } else {
            $this->session->set_flashdata('success', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data tidak tersimpan');
        }
    }
    public function ubahData() {
        if ($this->Legenda_model->UbahDataLegenda() == true) {
            $this->session->set_flashdata('success', 'Data berhasil diubah');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            redirect('legenda');
        } else {
            $this->session->set_flashdata('success', 'Data gagal diubah');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data tidak tersimpan');
        }
    }

    public function hapus($id_legenda)
    {
        $this->Legenda_model->HapusDataLegenda($id_legenda);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('legenda');
    }

    public function ubah($id)
    {
        $data['legenda'] = $this->Legenda_model->getLegendaById($id);

        // $this->form_validation->set_rules('id_legenda', 'Id Legenda', 'required');
        // $this->form_validation->set_rules('type', 'Type', 'required');
        // $this->form_validation->set_rules('legenda', 'Legenda', 'required');
        // $this->form_validation->set_rules('foto', 'Foto', 'required');

        // if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('admin/legenda/ubah', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/footScript');
        // } else {
        //     $this->Legenda_model->UbahDataLegenda();
        //     $this->session->set_flashdata('flash', 'Diubah');
        //     redirect('legenda');
        // }
    }
}
