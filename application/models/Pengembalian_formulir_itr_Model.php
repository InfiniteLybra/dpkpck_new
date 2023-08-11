<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian_formulir_itr_Model extends CI_Model
{
    public function upload_ulang()
    {
        $id_itr = $this->input->post('id_itr');
        $get_foto = $this->db->query("SELECT * FROM itr_permohonan WHERE id_itr = '$id_itr'")->row();

        $config['upload_path']          = './assets_dokumen/itr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        // $config['max_width']            = 2048;
        // $config['max_height']           = 2000;
        // $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['file_fotokopi_ktp']['name'])) {
            $this->upload->do_upload('file_fotokopi_ktp');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }else{
            $file1 = $get_foto->fotokopi_ktp;
        }
         //file2
         if (!empty($_FILES['file_surat_kuasa']['name'])) {
            $this->upload->do_upload('file_surat_kuasa');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        }else{
            $file2 = $get_foto->surat_kuasa;
        }
        //file3
        if (!empty($_FILES['file_peta_bidang']['name'])) {
            $this->upload->do_upload('file_peta_bidang');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        }else{
            $file3 = $get_foto->peta_bidang;
        }
        //file4
        if (!empty($_FILES['file_surat_tanah']['name'])) {
            $this->upload->do_upload('file_surat_tanah');
            $data4 = $this->upload->data();
            $file4 = $data4['file_name'];
        }else{
            $file4 = $get_foto->surat_tanah;
        }
        //file5
        if (!empty($_FILES['file_akte_pendidikan']['name'])) {
            $this->upload->do_upload('file_akte_pendidikan');
            $data5 = $this->upload->data();
            $file5 = $data5['file_name'];
        }else{
            $file5 = $get_foto->akte_pendidikan;
        }        

        $query = $this->db->query("UPDATE itr_permohonan SET
                            fotokopi_ktp = '$file1',
                            surat_kuasa = '$file2',
                            peta_bidang = '$file3',                            
                            surat_tanah = '$file4',
                            akte_perusahaan = '$file5'
                            WHERE 
                            id_itr = '$id_itr'
        ");

        if ($query) {
            return true;
        } else {
            return false;
        } 
    }
    public function upload_ulang_kkpr()
    {
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $get_foto = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id'")->row();

        $config['upload_path']          = './assets_dokumen/kkpr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        // $config['max_width']            = 2048;
        // $config['max_height']           = 2000;
        // $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['file_dokumen_oss']['name'])) {
            $this->upload->do_upload('file_dokumen_oss');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }else{
            $file1 = $get_foto->dokumen_oss;
        }

        //file2
        if (!empty($_FILES['file_fotokopi_ktp']['name'])) {
            $this->upload->do_upload('file_fotokopi_ktp');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        }else{
            $file2 = $get_foto->fotokopi_ktp;
        }
        //file3
        if (!empty($_FILES['file_surat_kuasa']['name'])) {
            $this->upload->do_upload('file_surat_kuasa');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        }else{
            $file3 = $get_foto->surat_kuasa;
        }
        //file4
        if (!empty($_FILES['file_akta_perusahaan']['name'])) {
            $this->upload->do_upload('file_akta_perusahaan');
            $data4 = $this->upload->data();
            $file4 = $data4['file_name'];
        }else{
            $file4 = $get_foto->akta_perusahaan;
        }
        //file5
        if (!empty($_FILES['file_siup']['name'])) {
            $this->upload->do_upload('file_siup');
            $data5 = $this->upload->data();
            $file5 = $data5['file_name'];
        }else{
            $file5 = $get_foto->siup;
        }
        //file6
        if (!empty($_FILES['file_tdp']['name'])) {
            $this->upload->do_upload('file_tdp');
            $data6 = $this->upload->data();
            $file6 = $data6['file_name'];
        }else{
            $file6 = $get_foto->tdp;
        }
        //file7
        if (!empty($_FILES['file_npwp']['name'])) {
            $this->upload->do_upload('file_npwp');
            $data7 = $this->upload->data();
            $file7 = $data7['file_name'];
        }else{
            $file7 = $get_foto->npwp;
        }
        //file8
        if (!empty($_FILES['file_surat_tanah']['name'])) {
            $this->upload->do_upload('file_surat_tanah');
            $data8 = $this->upload->data();
            $file8 = $data8['file_name'];
        }else{
            $file8 = $get_foto->surat_tanah;
        }
        //file9
        if (!empty($_FILES['file_peta_bidang']['name'])) {
            $this->upload->do_upload('file_peta_bidang');
            $data9 = $this->upload->data();
            $file9 = $data9['file_name'];
        }else{
            $file9 = $get_foto->peta_bidang;
        }
        //file10
        if (!empty($_FILES['file_teknis_pertanahan']['name'])) {
            $this->upload->do_upload('file_teknis_pertanahan');
            $data10 = $this->upload->data();
            $file10 = $data10['file_name'];
        }else{
            $file10 = $get_foto->teknis_pertanahan;
        }
        //TAMBAHAN
        //file11
        if (!empty($_FILES['file_surat_kematian']['name'])) {
            $this->upload->do_upload('file_surat_kematian');
            $data11 = $this->upload->data();
            $file11 = $data11['file_name'];
        }else{
            $file11 = $get_foto->surat_kematian;
        }
        //file12
        if (!empty($_FILES['file_surat_kuasa_ahli_waris']['name'])) {
            $this->upload->do_upload('file_surat_kuasa_ahli_waris');
            $data12 = $this->upload->data();
            $file12 = $data12['file_name'];
        }else{
            $file12 = $get_foto->surat_kuasa_ahli_waris;
        }
        //file13
        if (!empty($_FILES['file_surat_tanah_dibawah_5000']['name'])) {
            $this->upload->do_upload('file_surat_tanah_dibawah_5000');
            $data13 = $this->upload->data();
            $file13 = $data13['file_name'];
        }else{
            $file13 = $get_foto->surat_tanah_dibawah_5000;
        }
        //file14
        if (!empty($_FILES['file_peta_bidang_dibawah_5000']['name'])) {
            $this->upload->do_upload('file_peta_bidang_dibawah_5000');
            $data14 = $this->upload->data();
            $file14 = $data14['file_name'];
        }else{
            $file14 = $get_foto->peta_bidang_dibawah_5000;
        }
        //file15
        if (!empty($_FILES['file_surat_tanah_diatas_5000']['name'])) {
            $this->upload->do_upload('file_surat_tanah_diatas_5000');
            $data15 = $this->upload->data();
            $file15 = $data15['file_name'];
        }else{
            $file15 = $get_foto->surat_tanah_diatas_5000;
        }
        //file16
        if (!empty($_FILES['file_peta_bidang_diatas_5000']['name'])) {
            $this->upload->do_upload('file_peta_bidang_diatas_5000');
            $data16 = $this->upload->data();
            $file16 = $data16['file_name'];
        }else{
            $file16 = $get_foto->peta_bidang_diatas_5000;
        }
        //file17
        if (!empty($_FILES['file_surat_dinas_komunikasi']['name'])) {
            $this->upload->do_upload('file_surat_dinas_komunikasi');
            $data17 = $this->upload->data();
            $file17 = $data17['file_name'];
        }else{
            $file17 = $get_foto->surat_dinas_komunikasi;
        }
        //file18
        if (!empty($_FILES['file_surat_rekom_tni']['name'])) {
            $this->upload->do_upload('file_surat_rekom_tni');
            $data18 = $this->upload->data();
            $file18 = $data18['file_name'];
        }else{
            $file18 = $get_foto->surat_rekom_tni;
        }
        //file19
        if (!empty($_FILES['file_surat_dinas_perdagangan']['name'])) {
            $this->upload->do_upload('file_surat_dinas_perdagangan');
            $data19 = $this->upload->data();
            $file19 = $data19['file_name'];
        }else{
            $file19 = $get_foto->surat_dinas_perdagangan;
        }
        //file20
        if (!empty($_FILES['file_surat_dinas_peternakan']['name'])) {
            $this->upload->do_upload('file_surat_dinas_peternakan');
            $data20 = $this->upload->data();
            $file20 = $data20['file_name'];
        }else{
            $file20 = $get_foto->surat_dinas_perdagangan;
        }
        //file21
        if (!empty($_FILES['file_surat_pertamina']['name'])) {
            $this->upload->do_upload('file_surat_pertamina');
            $data21 = $this->upload->data();
            $file21 = $data21['file_name'];
        }else{
            $file21 = $get_foto->surat_pertamina;
        }
        //file22
        if (!empty($_FILES['file_daftar_nama_kk']['name'])) {
            $this->upload->do_upload('file_daftar_nama_kk');
            $data22 = $this->upload->data();
            $file22 = $data22['file_name'];
        }else{
            $file22 = $get_foto->daftar_nama_kk;
        }
        //file23
        if (!empty($_FILES['file_surat_fkub']['name'])) {
            $this->upload->do_upload('file_surat_fkub');
            $data23 = $this->upload->data();
            $file23 = $data23['file_name'];
        }else{
            $file23 = $get_foto->surat_fkub;
        }
        if($type == "default")
        {
            $query = $this->db->query("UPDATE kkpr_permohonan SET
                    dokumen_oss = '$file1',                    
                    fotokopi_ktp = '$file2',                    
                    surat_kuasa = '$file3',                    
                    akta_perusahaan = '$file4',                    
                    siup = '$file5',                    
                    tdp = '$file6',                    
                    npwp = '$file7',                    
                    surat_tanah = '$file8',                    
                    peta_bidang = '$file9',                    
                    teknis_pertanahan = '$file10'                    
                    WHERE
                    id_kkpr_permohonan = '$id'
            ");
        }
        if($type == "pemilik_lahan_meninggal")
        {
            $query = $this->db->query("UPDATE kkpr_permohonan SET
                    dokumen_oss = '$file1',                    
                    fotokopi_ktp = '$file2',                    
                    surat_kuasa = '$file3',                    
                    akta_perusahaan = '$file4',                    
                    siup = '$file5',                    
                    tdp = '$file6',                    
                    npwp = '$file7',                    
                    surat_tanah = '$file8',                    
                    peta_bidang = '$file9',                    
                    teknis_pertanahan = '$file10',
                    surat_kematian = '$file11',                    
                    surat_kuasa_ahli_waris = '$file12'                    
                    WHERE
                    id_kkpr_permohonan = '$id'
            ");
        }
        if($type == "perumahan")
        {
            $query = $this->db->query("UPDATE kkpr_permohonan SET
                    dokumen_oss = '$file1',                    
                    fotokopi_ktp = '$file2',                    
                    surat_kuasa = '$file3',                    
                    akta_perusahaan = '$file4',                    
                    siup = '$file5',                    
                    tdp = '$file6',                    
                    npwp = '$file7',                    
                    surat_tanah = '$file8',                    
                    peta_bidang = '$file9',                    
                    teknis_pertanahan = '$file10',
                    surat_tanah_dibawah_5000 = '$file13',                    
                    peta_bidang_dibawah_5000 = '$file14',                    
                    surat_tanah_diatas_5000 = '$file15',                    
                    peta_bidang_diatas_5000 = '$file16'                   
                    WHERE
                    id_kkpr_permohonan = '$id'
            ");
        }
        if($type == "tower")
        {
            $query = $this->db->query("UPDATE kkpr_permohonan SET
                    dokumen_oss = '$file1',                    
                    fotokopi_ktp = '$file2',                    
                    surat_kuasa = '$file3',                    
                    akta_perusahaan = '$file4',                    
                    siup = '$file5',                    
                    tdp = '$file6',                    
                    npwp = '$file7',                    
                    surat_tanah = '$file8',                    
                    peta_bidang = '$file9',                    
                    teknis_pertanahan = '$file10',
                    surat_dinas_komunikasi = '$file17',                    
                    surat_rekom_tni = '$file18'                    
                    WHERE
                    id_kkpr_permohonan = '$id'
            ");
        }
        if($type == "minimarket")
        {
            $query = $this->db->query("UPDATE kkpr_permohonan SET
                    dokumen_oss = '$file1',                    
                    fotokopi_ktp = '$file2',                    
                    surat_kuasa = '$file3',                    
                    akta_perusahaan = '$file4',                    
                    siup = '$file5',                    
                    tdp = '$file6',                    
                    npwp = '$file7',                    
                    surat_tanah = '$file8',                    
                    peta_bidang = '$file9',                    
                    teknis_pertanahan = '$file10',
                    surat_dinas_perdagangan = '$file19'                    
                    WHERE
                    id_kkpr_permohonan = '$id'
            ");
        }
        if($type == "peternakan")
        {
            $query = $this->db->query("UPDATE kkpr_permohonan SET
                    dokumen_oss = '$file1',                    
                    fotokopi_ktp = '$file2',                    
                    surat_kuasa = '$file3',                    
                    akta_perusahaan = '$file4',                    
                    siup = '$file5',                    
                    tdp = '$file6',                    
                    npwp = '$file7',                    
                    surat_tanah = '$file8',                    
                    peta_bidang = '$file9',                    
                    teknis_pertanahan = '$file10',
                    surat_dinas_peternakan = '$file20'                    
                    WHERE
                    id_kkpr_permohonan = '$id'
            ");
        }
        if($type == "spbu")
        {
            $query = $this->db->query("UPDATE kkpr_permohonan SET
                dokumen_oss = '$file1',                    
                fotokopi_ktp = '$file2',                    
                surat_kuasa = '$file3',                    
                akta_perusahaan = '$file4',                    
                siup = '$file5',                    
                tdp = '$file6',                    
                npwp = '$file7',                    
                surat_tanah = '$file8',                    
                peta_bidang = '$file9',                    
                teknis_pertanahan = '$file10',
                surat_pertamina = '$file21'                     
                WHERE
                id_kkpr_permohonan = '$id'
            ");
        }
        if($type == "tempat_ibadah")
        {
            $query = $this->db->query("UPDATE kkpr_permohonan SET
                    dokumen_oss = '$file1',                    
                    fotokopi_ktp = '$file2',                    
                    surat_kuasa = '$file3',                    
                    akta_perusahaan = '$file4',                    
                    siup = '$file5',                    
                    tdp = '$file6',                    
                    npwp = '$file7',                    
                    surat_tanah = '$file8',                    
                    peta_bidang = '$file9',                    
                    teknis_pertanahan = '$file10',
                    daftar_nama_kk = '$file22',                    
                    surat_fkub = '$file23'                    
                    WHERE
                    id_kkpr_permohonan = '$id'
            ");
        }
        if ($query) {
            return true;
        } else {
            return false;
        } 
    
    }
}
?>