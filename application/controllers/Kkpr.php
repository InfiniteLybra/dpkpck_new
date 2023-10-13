<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kkpr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kkpr_Model");
        $this->load->library('session');
        $this->load->model("Auth_model");
        $this->Auth_model->cek_login();
    }
    
    public function index()
    {
        $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
        $this->load->view('templates/header');
        $this->load->view('kkpr/tidak_diwakilkan/kkpr_tambah',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('kkpr/tidak_diwakilkan/script_kkpr_tambah');
    }
    public function filter()
    {       
        $this->load->view('templates/header');
        $this->load->view('kkpr/filter/filter');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('kkpr/filter/script_filter');
    }
    public function persiapan()
    {       
        $this->load->view('templates/header');
        $this->load->view('kkpr/filter/persiapan');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        // $this->load->view('kkpr/filter/script_filter');
    }
    public function proses_filter()
    {
        $formulir = $this->input->post('formulir');
        if($formulir == 'itr')
        {
            $pengurusan_itr = $this->input->post('pengurusan_itr');
            $badan_hukum_itr = $this->input->post('badan_hukum_itr');
            $data['pengurusan'] = $pengurusan_itr;
            $data['badan_hukum'] = $badan_hukum_itr;
            $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
            $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
            $data['draft_data'] = $this->session->userdata('draft_data');

            if($pengurusan_itr == 'perusahaan')
            {
                $this->load->view('templates/header');
                $this->load->view('kkpr/filter/itr_perusahaan',$data);
                $this->load->view('templates/footer');
                $this->load->view('templates/footScript');
                $this->load->view('kkpr/filter/script_itr_perusahaan');
            }else{
                $this->load->view('templates/header');
                $this->load->view('kkpr/filter/itr_perorangan',$data);
                $this->load->view('templates/footer');
                $this->load->view('templates/footScript');
                $this->load->view('kkpr/filter/script_itr_perorangan');
            }
        }
        else
        {
            $pengurusan = $this->input->post('pengurusan');
            $badan_hukum = $this->input->post('badan_hukum');
            $kuasa = $this->input->post('kuasa');
            $pemilik_lahan_meninggal = $this->input->post('pemilik_lahan_meninggal');
            $pengajuan = $this->input->post('pengajuan');
            $isi_pengajuan = $this->input->post('isi_pengajuan');
            $lainya = $this->input->post('lainya');
            $id_user = $this->session->userdata('id_user');
            $data['pengurusan'] = $pengurusan;
            $data['badan_hukum'] = $badan_hukum;
            $data['pemilik_lahan_meninggal'] = $pemilik_lahan_meninggal;
            $data['pengajuan'] = $pengajuan;
            $data['kuasa'] = $kuasa;
            $data['isi_pengajuan'] = $isi_pengajuan;
            $data['lainya'] = $lainya;
            $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
            $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
            $data['draft_data'] = $this->session->userdata('draft_data');
            $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_user = '$id_user' AND status_berkas = '99' ORDER BY id_kkpr_permohonan ASC")->row();

            if($pengurusan == 'perusahaan' AND $kuasa == '0')
            {
                $this->load->view('templates/header');
                $this->load->view('kkpr/filter/kkpr_perusahaan',$data);
                $this->load->view('templates/footer');
                $this->load->view('templates/footScript');
                $this->load->view('kkpr/filter/script_perusahaan');
            }else if($pengurusan == 'perusahaan' AND $kuasa == '1')
            {
                $this->load->view('templates/header');
                $this->load->view('kkpr/filter/kkpr_perusahaan_kuasa',$data);
                $this->load->view('templates/footer');
                $this->load->view('templates/footScript');
                $this->load->view('kkpr/filter/script_perusahaan_kuasa');
            }else if($pengurusan == 'perorangan' AND $kuasa == '1')
            {
                $this->load->view('templates/header');
                $this->load->view('kkpr/filter/kkpr_perorangan_kuasa',$data);
                $this->load->view('templates/footer');
                $this->load->view('templates/footScript');
                $this->load->view('kkpr/filter/script_perorangan_kuasa');
            }
            else{
                $this->load->view('templates/header');
                $this->load->view('kkpr/filter/kkpr_perorangan',$data);
                $this->load->view('templates/footer');
                $this->load->view('templates/footScript');
                $this->load->view('kkpr/filter/script_perorangan');
            }
        }        
    }
    public function insert_kkpr()
    {
        $query = $this->Kkpr_Model->tambah_kkpr_new();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');            
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Filter.html');
        }
        redirect('NotifikasiFormulir.html');
    }
    public function proses_terima($id)
    {
        $query = $this->Kkpr_Model->terima_berkas($id);
        if ($query == true) {
            $this->session->set_flashdata('success', 'Berkas Diterima');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Kkpr/admin_kkpr');
        }
        redirect('NotifikasiPermohonan.html');
    }
    public function config()
    {   
        $id_user = $this->session->userdata('id_user');
        $data['data'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_petugas = '$id_user' AND status_berkas = '2' OR status_berkas = '3'")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/config_sertifikat/list_data',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kkpr/config_sertifikat/script_config');
    }
    public function detail_config_peta($id)
    {     
        $cek = $this->db->query("SELECT * FROM data_sertifikat_peta WHERE id_permohonan = '$id'")->row(); 
        $data['cek'] = $cek;
        if($cek)
        {
            $data['data'] = $this->db->query("SELECT * FROM data_sertifikat_peta WHERE id_permohonan = '$id'")->row(); 
        } 
        else
        {
            $data['data'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id'")->row(); 
        }
        $data['ketentuan'] = $this->db->query(
            "SELECT * FROM ketentuan_lainya 
            WHERE 
            id_ketentuan_lainya = '9' OR 
            id_ketentuan_lainya = '11' OR 
            id_ketentuan_lainya = '40' OR 
            id_ketentuan_lainya = '42' OR 
            id_ketentuan_lainya = '43' OR 
            id_ketentuan_lainya = '44' 
            ")->result();         
        // $data['legenda'] = $legenda; 
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/config_sertifikat/config_peta',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kkpr/config_sertifikat/script_peta');

        $this->session->set_userdata('detail_config', current_url());
    }
    public function proses_config_peta()
    {
        $query = $this->Kkpr_Model->config_peta();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Kkpr/config');
        }
        redirect('NotifikasiConfig.html');
        // $previousPage = $this->session->userdata('detail_config');

        // if ($previousPage && filter_var($previousPage, FILTER_VALIDATE_URL)) {
        //     redirect($previousPage);
        // } else {
        //     redirect('Kkpr/config');
        // }
    }
    public function detail_config_draft($id)
    {     
        $cek = $this->db->query("SELECT * FROM data_sertifikat_draft_peta WHERE id_permohonan = '$id'")->row(); 
        $data['cek'] = $cek;
        if($cek)
        {
            $data['data'] = $this->db->query("SELECT * FROM data_sertifikat_draft_peta WHERE id_permohonan = '$id'")->row(); 
        } 
        else
        {
            $data['data'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id'")->row(); 
        }
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/config_sertifikat/config_draf_peta',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        // $this->load->view('admin/kkpr/config_sertifikat/script_config');
        $this->session->set_userdata('detail_config_draft', current_url());
    }
    public function proses_config_draft_peta()
    {
        $query = $this->Kkpr_Model->config_draft_peta();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Kkpr/config');
        }
        redirect('NotifikasiConfig.html');
        // $previousPage = $this->session->userdata('detail_config_draft');

        // if ($previousPage && filter_var($previousPage, FILTER_VALIDATE_URL)) {
        //     redirect($previousPage);
        // } else {
        //     redirect('Kkpr/config');
        // }
    }
    public function detail_config_lhs($id)
    {     
        $cek = $this->db->query("SELECT * FROM data_sertifikat_lhs WHERE id_permohonan = '$id'")->row(); 
        $data['cek'] = $cek;
        if($cek)
        {
            $data['data'] = $this->db->query("SELECT * FROM data_sertifikat_lhs WHERE id_permohonan = '$id'")->row(); 
        } 
        else
        {
            $data['data'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id'")->row(); 
        }
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/config_sertifikat/config_lhs',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        // $this->load->view('admin/kkpr/config_sertifikat/script_config');
         $this->session->set_userdata('detail_config_draft', current_url());
    }
    public function proses_config_lhs()
    {
        $query = $this->Kkpr_Model->config_lhs();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Kkpr/config');
        }
        redirect('NotifikasiConfig.html');
        // $previousPage = $this->session->userdata('detail_config_draft');

        // if ($previousPage && filter_var($previousPage, FILTER_VALIDATE_URL)) {
        //     redirect($previousPage);
        // } else {
        //     redirect('Kkpr/config');
        // }
    }
    public function status_selesai($id)
    {
        $query = $this->db->query("UPDATE kkpr_permohonan SET status_berkas = '3' WHERE id_kkpr_permohonan = '$id'");
        if ($query) {
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');            
        }
        redirect('Kkpr/config');
    }
    public function rekap()
    {       
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/rekap/rekap',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kkpr/rekap/script_rekap');
    }
    public function export_rekap()
    {       
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan")->result();
        $this->load->view('admin/kkpr/rekap/export_excel',$data);    
    }
    public function proses_filter_1()
    {
        $pengurusan = $this->input->post('pengurusan');
        $badan_hukum = $this->input->post('badan_hukum');
        $pemilik_lahan_meninggal = $this->input->post('pemilik_lahan_meninggal');
        $pengajuan = $this->input->post('pengajuan');

        if($pengurusan == 'perusahaan' AND $badan_hukum == '1' AND $pemilik_lahan_meninggal == '0' AND $pengajuan == 'tower')
        {
            redirect('Kkpr/tower_menara');
        }
        else if($pengurusan == 'perusahaan' AND $badan_hukum == '1' AND $pemilik_lahan_meninggal == '0' AND $pengajuan == 'perumahan')
        {
            redirect('Kkpr/perumahan');
        }
        else
        {
            redirect('Kkpr');
        }
    }
    public function proses_tambah_kkpr()
    {
        $query = $this->Kkpr_Model->tambah_permohonan_default();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Kkpr/index');
        }
        redirect('Kkpr/index');
    }
    public function diwakilkan()
    {
        $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
        $this->load->view('templates/header');
        $this->load->view('kkpr/diwakilkan/kkpr_tambah',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('kkpr/diwakilkan/script_kkpr_tambah');
    }
    public function proses_tambah_diwakilkan()
    {
        $query = $this->Kkpr_Model->tambah_kuasa();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Kkpr/diwakilkan');
        }
        redirect('Kkpr/diwakilkan');
    }
    public function pemilik_lahan_meninggal()
    {
        $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
        $this->load->view('templates/header');
        $this->load->view('kkpr/pemilik_lahan_meninggal/kkpr_tambah',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('kkpr/pemilik_lahan_meninggal/script_kkpr_tambah');
    }
    public function proses_tambah_kkpr_Pemilik_lahan_meninggal()
    {
        $query = $this->Kkpr_Model->tambah_permohonan_pemilik_lahan_meninggal();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Kkpr/pemilik_lahan_meninggal');
        }
        redirect('Kkpr/pemilik_lahan_meninggal');
    }
    public function perumahan()
    {
        $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
        $this->load->view('templates/header');
        $this->load->view('kkpr/perumahan/kkpr_tambah',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('kkpr/perumahan/script_kkpr_tambah');
    }
    public function proses_tambah_kkpr_perumahan()
    {
        $query = $this->Kkpr_Model->tambah_permohonan_perumahan();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Kkpr/perumahan');
        }
        redirect('Kkpr/perumahan');
    }
    public function tower_menara()
    {
        $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
        $this->load->view('templates/header');
        $this->load->view('kkpr/tower_menara/kkpr_tambah',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('kkpr/tower_menara/script_kkpr_tambah');
    }
    public function proses_tambah_kkpr_tower()
    {
        $query = $this->Kkpr_Model->tambah_permohonan_tower();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Kkpr/tower_menara');
        }
        redirect('Kkpr/tower_menara');
    }
    public function minimarket()
    {
        $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
        $this->load->view('templates/header');
        $this->load->view('kkpr/minimarket/kkpr_tambah',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('kkpr/minimarket/script_kkpr_tambah');
    }
    public function proses_tambah_kkpr_minimarket()
    {
        $query = $this->Kkpr_Model->tambah_permohonan_minimarket();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Kkpr/minimarket');
        }
        redirect('Kkpr/minimarket');
    }
    public function peternakan()
    {
        $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
        $this->load->view('templates/header');
        $this->load->view('kkpr/peternakan/kkpr_tambah',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('kkpr/peternakan/script_kkpr_tambah');
    }
    public function proses_tambah_kkpr_peternakan()
    {
        $query = $this->Kkpr_Model->tambah_permohonan_peternakan();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Kkpr/peternakan');
        }
        redirect('Kkpr/peternakan');
    }
    public function spbu()
    {
        $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
        $this->load->view('templates/header');
        $this->load->view('kkpr/spbu/kkpr_tambah',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('kkpr/spbu/script_kkpr_tambah');
    }
    public function proses_tambah_kkpr_spbu()
    {
        $query = $this->Kkpr_Model->tambah_permohonan_spbu();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Kkpr/spbu');
        }
        redirect('Kkpr/spbu');
    }
    public function tempat_ibadah()
    {
        $data['provinsi'] = $this->db->query("SELECT * FROM indo_provinsi")->result();
        $data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();
        $this->load->view('templates/header');
        $this->load->view('kkpr/tempat_ibadah/kkpr_tambah',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('kkpr/tempat_ibadah/script_kkpr_tambah');
    }
    public function proses_tambah_kkpr_tempat_ibadah()
    {
        $query = $this->Kkpr_Model->tambah_permohonan_tempat_ibadah();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
            redirect('Kkpr/tempat_ibadah');
        }
        redirect('Kkpr/tempat_ibadah');
    }
    public function admin_kkpr()
    {
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE status_berkas = '0'")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/permohonan/kkpr',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kkpr/permohonan/script_kkpr');
    }
    public function detail_kkpr($id)
    {
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id'")->row();
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/permohonan/detail_kkpr',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kkpr/permohonan/script_detail');
    }
    function proses_keterangan()
    {
        $query = $this->Kkpr_Model->tambah_keterangan();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
        }
        redirect('Kkpr/admin_kkpr');
    }
    public function admin_kkpr_kuasa()
    {
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_kuasa")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/kuasa/admin_kkpr_kuasa',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kkpr/kuasa/script_admin_kkpr_kuasa');
    }
    public function admin_kkpr_detail_kuasa($id)
    {
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_kuasa WHERE id_kkpr_kuasa = '$id'")->row();
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/kuasa/admin_kkpr_detail_kuasa',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kkpr/kuasa/script_admin_kkpr_kuasa');
    }
    public function daftar_pengembalian()
    {       
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE status_berkas = '1' OR status_berkas = '98' ")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/daftar_pengembalian_formulir/index',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kkpr/daftar_pengembalian_formulir/script');
    }
    public function proses_tolak_notif($id,$notif)
    {
        $query = $this->Kkpr_Model->tolak_dan_kirim_notif($id,$notif);
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
        }
        redirect('Kkpr/daftar_pengembalian');
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

    //PEMOHON
    public function pengembalian_formulir()
    {
        $id_user = $this->session->userdata('id_user');
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_user = '$id_user' AND status_berkas = '1'")->result();
        $this->load->view('templates/header');
        $this->load->view('user/kkpr/pengembalian_formulir',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('user/kkpr/script_pengembalian');
    }
    public function detail_pengembalian($id)
    {
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id'")->row();
        $this->load->view('templates/header');
        $this->load->view('user/kkpr/detail_pengembalian_formulir_kkpr',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('user/kkpr/script_pengembalian');
    }
    function proses_pengembalian()
    {
        $query = $this->Kkpr_Model->pengembalian();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
        }
        redirect('Kkpr/pengembalian_formulir');
    }
    public function monitoring_berkas()
    {
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE status_berkas = '0' OR status_berkas = '2' OR status_berkas = '3' ")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/monitoring_berkas/monitoring_berkas',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kkpr/monitoring_berkas/script');
    }
    public function export_monitoring_berkas()
    {
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE status_berkas = '0' OR status_berkas = '2' OR status_berkas = '3' ")->result();
        $this->load->view('admin/kkpr/monitoring_berkas/export_monitoring_excel',$data);        
    }
    public function terimakasih_formulir()
    {
        $this->load->view('templates/terimakasih/terimakasih_formulir');
    }
    public function terimakasih_admin_permohonan()
    {
        $this->load->view('templates/terimakasih/terimakasih_admin_permohonan');
    }
    public function terimakasih_config()
    {
        $this->load->view('templates/terimakasih/terimakasih_config');
    }

    public function draft()
    {
        $data['draft_data'] = $this->session->userdata('draft_data');
        $this->load->view('templates/header');
        $this->load->view('kkpr/draft/draft',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('kkpr/draft/script');
    }
    public function save_draft()
    {
        // Simpan data draft ke session
        $draft_data = $this->input->post(); // Ambil data dari formulir
        $this->session->set_userdata('draft_data', $draft_data);

        // Redirect kembali ke halaman formulir
        redirect('Kkpr/draft');
    }
    public function export_laporan_berkas()
    {
        $tahun = $this->input->get('tahun');
        // var_dump($tahun);die;
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE YEAR(tgl_survei) = $tahun ")->result();
        $this->load->view('admin/kkpr/laporan/export_laporan_excel',$data);        
    }
    public function export_laporan_berkas_all()
    {
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan ")->result();
        $this->load->view('admin/kkpr/laporan/export_laporan_excel',$data);        
    }

    public function getAllKkpr()
    {
        $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_permohonan ")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/laporan/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kkpr/laporan/script');
    }

    public function filterDataByYear() {
        // Tangkap tahun dari URL
        $tahun = $this->input->get('tahun');

        // Panggil model untuk mengambil data berdasarkan tahun
        $data['KKPR'] = $this->Kkpr_Model->getDataByYear($tahun);
        // var_dump($data);die;

        // Tampilkan data ke view
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/laporan/index_filter', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kkpr/laporan/script');
    }
    public function pembagian_berkas()
    {
        $data['data'] = $this->db->query("SELECT * FROM kkpr_permohonan WHERE status_berkas = '2' OR status_berkas = '3'")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/kkpr/pembagian_berkas/index',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kkpr/pembagian_berkas/script');
    }
    public function proses_pembagian_berkas($id_kkpr,$id_user)
    {
        $query = $this->Kkpr_Model->pembagian_berkas($id_kkpr,$id_user);
        if ($query == true) {
            $this->session->set_flashdata('success', 'Formulir berhasil diserahkan ke petugas');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
        }
        redirect('Kkpr/pembagian_berkas');
    }

}
?>