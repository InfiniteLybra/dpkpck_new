<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Itr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Itr_Model");
        
    }
    public function index()
    {
        $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
        $this->load->view('templates/header');
        $this->load->view('itr/permohonan/itr_tambah',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('itr/permohonan/script_itr_tambah');
    }
    public function proses_tambah_itr_permohonan()
    {
        $query = $this->Itr_Model->tambah_permohonan_itr();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            // redirect('Itr');
        }
        redirect('Itr');
    }
    public function pengurusan()
    {
        $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
        $this->load->view('templates/header');
        $this->load->view('itr/kuasa_pengurusan/itr_tambah',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('itr/kuasa_pengurusan/script_itr_tambah');
    }
    public function proses_tambah_itr_kuasa_pengurusan()
    {
        $query = $this->Itr_Model->tambah_kuasa_itr_pengurusan();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            // redirect('Itr');
        }
        redirect('Itr/pengurusan');
    }
    public function penerbitan()
    {
        $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
        $this->load->view('templates/header');
        $this->load->view('itr/kuasa_penerbitan/itr_tambah',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('itr/kuasa_penerbitan/script_itr_tambah');
    }
    public function proses_tambah_itr_kuasa_penerbitan()
    {
        $query = $this->Itr_Model->tambah_kuasa_itr_penerbitan();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            // redirect('Itr');
        }
        redirect('Itr/penerbitan');
    }
    public function admin_itr()
    {
        $data['itr'] = $this->db->query("SELECT * FROM itr_permohonan")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/itr/permohonan/itr',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/itr/permohonan/script_itr');
    }
    public function detail_itr($id)
    {
        $data['itr'] = $this->db->query("SELECT * FROM itr_permohonan WHERE id_itr = '$id'")->row();
        $this->load->view('templates/header');
        $this->load->view('admin/itr/permohonan/detail_itr',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/itr/permohonan/script_itr');
    }
    function proses_keterangan()
    {
        $query = $this->Itr_Model->tambah_keterangan();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            // redirect('Itr');
        }
        redirect('Itr/admin_itr');
    }
    public function admin_itr_kuasa()
    {
        $data['itr'] = $this->db->query("SELECT * FROM itr_kuasa")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/itr/kuasa/admin_itr_kuasa',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/itr/kuasa/script_admin_itr_kuasa');
    }
    public function admin__itr_detail_kuasa($id)
    {
        $data['itr'] = $this->db->query("SELECT * FROM itr_kuasa WHERE id_itr_kuasa = '$id'")->row();
        $this->load->view('templates/header');
        $this->load->view('admin/itr/kuasa/admin_itr_detail_kuasa',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/itr/kuasa/script_admin_itr_kuasa');
    }
    public function get_kota()
    {
        $id_provinsi = $this->input->post('id',TRUE);
        $data = $this->db->query("SELECT * FROM indo_kota WHERE prov_id = '$id_provinsi'")->result();
        echo json_encode($data);
    }
    public function get_kecamatan()
    {
        $id_kota = $this->input->post('id',TRUE);
        $data = $this->db->query("SELECT * FROM indo_kecamatan WHERE city_id = '$id_kota'")->result();
        echo json_encode($data);
    }
    public function get_kelurahan()
    {
        $id_kecamatan = $this->input->post('id',TRUE);
        $data = $this->db->query("SELECT * FROM indo_kelurahan WHERE dis_id = '$id_kecamatan'")->result();
        echo json_encode($data);
    }
    public function get_desa()
    {
        $id_kecamatan = $this->input->post('id',TRUE);
        $data = $this->db->query("SELECT * FROM desa WHERE id_kecamatan = '$id_kecamatan'")->result();
        echo json_encode($data);
    }
}
?>