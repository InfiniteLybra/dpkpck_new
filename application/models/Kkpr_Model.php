<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kkpr_Model extends CI_Model
{
    public function tambah_kkpr_new()
    {
        $pengurusan = $this->input->post('type_pengurusan');
        if ($pengurusan == 'perusahaan') {
            $config['upload_path']          = './assets_dokumen/kkpr';
            $config['allowed_types']        = 'pdf|PDF|jpg|JPG|zip';
            $config['max_size']             = 5120; //5MB
            // $config['max_width']            = 2048;
            // $config['max_height']           = 2000;
            // $config['encrypt_name']         = true;
            $this->load->library('upload', $config);

            //file1
            if (!empty($_FILES['dokumen_oss']['name'])) {
                $this->upload->do_upload('dokumen_oss');
                $data1 = $this->upload->data();
                $file1 = $data1['file_name'];
            }

            //file2
            if (!empty($_FILES['fotokopi_ktp']['name'])) {
                $this->upload->do_upload('fotokopi_ktp');
                $data2 = $this->upload->data();
                $file2 = $data2['file_name'];
            }
            //file3
            if (!empty($_FILES['fc_akta_perusahaan']['name'])) {
                $this->upload->do_upload('fc_akta_perusahaan');
                $data3 = $this->upload->data();
                $file3 = $data3['file_name'];
            }
            //file4
            // if (!empty($_FILES['siup']['name'])) {
            //     $this->upload->do_upload('siup');
            //     $data4 = $this->upload->data();
            //     $file4 = $data4['file_name'];
            // }
            //file5
            if (!empty($_FILES['tdp_nib']['name'])) {
                $this->upload->do_upload('tdp_nib');
                $data5 = $this->upload->data();
                $file5 = $data5['file_name'];
            }
            //file6
            if (!empty($_FILES['npwp']['name'])) {
                $this->upload->do_upload('npwp');
                $data6 = $this->upload->data();
                $file6 = $data6['file_name'];
            }
            //file7
            $jumlah_berkas = count($_FILES['file_status_tanah']['name']);
            $dataArray_surat_tanah = array();

            for ($i = 0; $i < $jumlah_berkas; $i++) {
                if (!empty($_FILES['file_status_tanah']['name'][$i])) {
                    $_FILES['file']['name'] = $_FILES['file_status_tanah']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['file_status_tanah']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['file_status_tanah']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['file_status_tanah']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['file_status_tanah']['size'][$i];

                    if ($this->upload->do_upload('file')) {
                        $uploadData = $this->upload->data();
                        $data = array(
                            'surat_tanah' => $uploadData['file_name']
                        );
                        $dataArray_surat_tanah[] = $data;
                    }
                }
            }

            $file7 = json_encode($dataArray_surat_tanah);

            // $this->upload->do_upload('file_status_tanah[]');
            // $data7 = $this->upload->data();
            // $file7 = $data7['file_name'];                        
            //file8
            if (!empty($_FILES['peta_bidang']['name'])) {
                $this->upload->do_upload('peta_bidang');
                $data8 = $this->upload->data();
                $file8 = $data8['file_name'];
            }
            //file9
            // if (!empty($_FILES['surat_teknis_tanah']['name'])) {
            //     $this->upload->do_upload('surat_teknis_tanah');
            //     $data9 = $this->upload->data();
            //     $file9 = $data9['file_name'];
            // }
            //TAMBAHAN
            //file10
            if (!empty($_FILES['surat_kematian']['name'])) {
                $this->upload->do_upload('surat_kematian');
                $data10 = $this->upload->data();
                $file10 = $data10['file_name'];
            }
            //file11
            if (!empty($_FILES['surat_kuasa_ahli_waris']['name'])) {
                $this->upload->do_upload('surat_kuasa_ahli_waris');
                $data11 = $this->upload->data();
                $file11 = $data11['file_name'];
            }
            //file12
            if (!empty($_FILES['rekomendasi_dinas_komunikasi']['name'])) {
                $this->upload->do_upload('rekomendasi_dinas_komunikasi');
                $data12 = $this->upload->data();
                $file12 = $data12['file_name'];
            }
            //file13
            if (!empty($_FILES['rekomendasi_tni']['name'])) {
                $this->upload->do_upload('rekomendasi_tni');
                $data13 = $this->upload->data();
                $file13 = $data13['file_name'];
            }
            //file14
            if (!empty($_FILES['surat_dinas_perdagangan']['name'])) {
                $this->upload->do_upload('surat_dinas_perdagangan');
                $data14 = $this->upload->data();
                $file14 = $data14['file_name'];
            }
            //file15
            if (!empty($_FILES['surat_dinas_peternakan']['name'])) {
                $this->upload->do_upload('surat_dinas_peternakan');
                $data15 = $this->upload->data();
                $file15 = $data15['file_name'];
            }
            //file16
            if (!empty($_FILES['surat_pertamina']['name'])) {
                $this->upload->do_upload('surat_pertamina');
                $data16 = $this->upload->data();
                $file16 = $data16['file_name'];
            }
            //file17
            if (!empty($_FILES['daftar_nama_kk']['name'])) {
                $this->upload->do_upload('daftar_nama_kk');
                $data17 = $this->upload->data();
                $file17 = $data17['file_name'];
            }
            //file18
            if (!empty($_FILES['surat_fkub']['name'])) {
                $this->upload->do_upload('surat_fkub');
                $data18 = $this->upload->data();
                $file18 = $data18['file_name'];
            }
            //file19
            if (!empty($_FILES['fotokopi_ktp_kuasa']['name'])) {
                $this->upload->do_upload('fotokopi_ktp_kuasa');
                $data19 = $this->upload->data();
                $file19 = $data19['file_name'];
            }
            //file20
            if (!empty($_FILES['shp']['name'])) {
                $this->upload->do_upload('shp');
                $data20 = $this->upload->data();
                $file20 = $data20['file_name'];
            }
            //file21
            if (!empty($_FILES['file_surat_peralihan_sm']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_sm');
                $data21 = $this->upload->data();
                $file21 = $data21['file_name'];
            }
            //file23
            if (!empty($_FILES['file_surat_peralihan_pk']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_pk');
                $data23 = $this->upload->data();
                $file23 = $data23['file_name'];
            }
            //file24
            if (!empty($_FILES['file_surat_peralihan_ppjb']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_ppjb');
                $data24 = $this->upload->data();
                $file24 = $data24['file_name'];
            }
            //file25
            if (!empty($_FILES['file_surat_peralihan_ajb']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_ajb');
                $data25 = $this->upload->data();
                $file25 = $data25['file_name'];
            }
            //file26
            if (!empty($_FILES['file_surat_peralihan_ah']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_ah');
                $data26 = $this->upload->data();
                $file26 = $data26['file_name'];
            }
            //file27
            if (!empty($_FILES['file_surat_peralihan_aph']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_aph');
                $data27 = $this->upload->data();
                $file27 = $data27['file_name'];
            }
            //file28
            if (!empty($_FILES['file_surat_peralihan_kw']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_kw');
                $data28 = $this->upload->data();
                $file28 = $data28['file_name'];
            }
             //file22
            $jumlah_berkas_peta_bidang = count($_FILES['file_peta_bidang']['name']);
            $dataArray_peta_bidang = array();

            for ($i = 0; $i < $jumlah_berkas_peta_bidang; $i++) {
                if (!empty($_FILES['file_peta_bidang']['name'][$i])) {
                    $_FILES['file']['name'] = $_FILES['file_peta_bidang']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['file_peta_bidang']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['file_peta_bidang']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['file_peta_bidang']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['file_peta_bidang']['size'][$i];

                    if ($this->upload->do_upload('file')) {
                        $uploadData = $this->upload->data();
                        $data = array(
                            'peta_bidang' => $uploadData['file_name']
                        );
                        $dataArray_peta_bidang[] = $data;
                    }
                }
            }

            $file22 = json_encode($dataArray_peta_bidang);

            $id_kkpr_query = $this->db->query("SELECT MAX(id_kkpr_permohonan) AS hasil FROM kkpr_permohonan")->row();
            $id_kkpr = $id_kkpr_query->hasil + 1;
            $this->session->set_userdata('id_kkpr_permohonan', $id_kkpr);

            $id_user = $this->session->userdata('id_user');
            $type_isi_kategori = $this->input->post('type_isi_kategori');
            $type_kategori = $this->input->post('type_kategori');
            $pemilik_lahan_meninggal = $this->input->post('pemilik_lahan_meninggal');
            $badan_hukum = $this->input->post('badan_hukum');
            $kuasa = $this->input->post('kuasa');
            $lainya = $this->input->post('lainya');

            $nama_pemohon = $this->input->post('nama_pemohon');
            $alamat_pemohon = $this->input->post('alamat_pemohon');
            $rt_pemohon = $this->input->post('rt_pemohon');
            $rw_pemohon = $this->input->post('rw_pemohon');
            $provinsi_pemohon = $this->input->post('provinsi_pemohon');
            $kota_pemohon = $this->input->post('kota_pemohon');
            $kecamatan_pemohon = $this->input->post('kecamatan_pemohon');
            $kelurahan_pemohon = $this->input->post('kelurahan_pemohon');
            $telp_pemohon = $this->input->post('telp_pemohon');

            $nama_kuasa = $this->input->post('nama_kuasa');
            $alamat_kuasa = $this->input->post('alamat_kuasa');
            $rt_kuasa = $this->input->post('rt_kuasa');
            $rw_kuasa = $this->input->post('rw_kuasa');
            $provinsi_kuasa = $this->input->post('provinsi_kuasa');
            $kota_kuasa = $this->input->post('kota_kuasa');
            $kecamatan_kuasa = $this->input->post('kecamatan_kuasa');
            $kelurahan_kuasa = $this->input->post('kelurahan_kuasa');
            $telp_kuasa = $this->input->post('telp_kuasa');

            $nama_perusahaan = $this->input->post('nama_perusahaan');
            $nib = $this->input->post('nib');
            $skala_usaha = $this->input->post('skala_usaha');
            $klasifikasi_resiko = $this->input->post('klasifikasi_resiko');
            $kbli = $this->input->post('kbli_array'); //array
            $alamat_perusahaan = $this->input->post('alamat_perusahaan');
            $rt_perusahaan = $this->input->post('rt_perusahaan');
            $rw_perusahaan = $this->input->post('rw_perusahaan');
            $provinsi_perusahaan = $this->input->post('provinsi_perusahaan');
            $kota_perusahaan = $this->input->post('kota_perusahaan');
            $kecamatan_perusahaan = $this->input->post('kecamatan_perusahaan');
            $kelurahan_perusahaan = $this->input->post('kelurahan_perusahaan');

            $status_tanah_sm = $this->input->post('status_tanah_sm');
            $peruntukan_tanah = $this->input->post('peruntukan_tanah');
            $luas_tanah = $this->input->post('luas_tanah');
            $perluasan = $this->input->post('perluasan');
            $status_tanah = $this->input->post('status_tanah');
            $status_tanah_array = $this->input->post('status_tanah_array');
            $lokasi_tanah = $this->input->post('lokasi_tanah');
            $rt_tanah = $this->input->post('rt_tanah');
            $rw_tanah = $this->input->post('rw_tanah');
            $kelurahan_tanah = $this->input->post('kelurahan_tanah');
            $kecamatan_tanah = $this->input->post('kecamatan_tanah');

            $status_surat_tanah = $this->input->post('st_1');
            $dasar_surat_tanah_pribadi = $this->input->post('st_2');
            $surat_peralihan = $this->input->post('st_3');
            $dasar_surat_tanah_sm = $this->input->post('st_sewa_menyewa');
            $dasar_surat_tanah_pk = $this->input->post('st_perjanjian_kerjasama');
            $dasar_surat_tanah_ppjb = $this->input->post('st_ppjb');
            $dasar_surat_tanah_ajb = $this->input->post('st_ajb');
            $dasar_surat_tanah_ah = $this->input->post('st_akta_hibah');
            $dasar_surat_tanah_aph = $this->input->post('st_akta_pelepasan_hak');
            $dasar_surat_tanah_kw = $this->input->post('st_keterangan_waris');

            $dataArray = array();
            if (!empty($status_tanah_array)) {
                foreach ($status_tanah_array as $input) {
                    if (!empty($input)) {
                        $data = array(
                            'status_tanah' => $input
                        );
                        $dataArray[] = $data;
                    }
                }
            }
            $Tanah_Array = json_encode($dataArray);

            $dataArray_kbli = array();
            if (!empty($kbli)) {
                foreach ($kbli as $input) {
                    if (!empty($input)) {
                        $data = array(
                            'kbli' => $input
                        );
                        $dataArray_kbli[] = $data;
                    }
                }
            }
            $kbli_Array = json_encode($dataArray_kbli);
            $tgl_reg = date('d-m-y');

            if ($kuasa == '1') {
                $insert = "INSERT INTO kkpr_permohonan (
                    id_kkpr_permohonan,
                    id_user,
                    type,
                    type_lainya,
                    tgl_reg,
    
                    nama_pemohon,
                    alamat_pemohon,
                    rt_pemohon,
                    rw_pemohon,
                    provinsi_pemohon,
                    kota_pemohon,
                    kecamatan_pemohon,
                    kelurahan_pemohon,
                    telp_pemohon,
    
                    nama_kuasa,
                    alamat_kuasa,
                    rt_kuasa,
                    rw_kuasa,
                    provinsi_kuasa,
                    kota_kuasa,
                    kecamatan_kuasa,
                    kelurahan_kuasa,
                    telp_kuasa,
    
                    nama_perusahaan,
                    nib,
                    skala_usaha,
                    klasifikasi_resiko,
                    kbli,
                    alamat_perusahaan,
                    rt_perusahaan,
                    rw_perusahaan,
                    provinsi_perusahaan,
                    kota_perusahaan,
                    kecamatan_perusahaan,
                    kelurahan_perusahaan,                            
    
                    peruntukan_tanah,
                    luas_tanah,
                    kategori,
                    perluasan,
                    status_tanah,
                    lokasi_tanah,
                    rt_tanah,
                    rw_tanah,
                    kota_tanah,
                    kecamatan_tanah,
                    kelurahan_tanah,    
    
                    status_berkas,                            
    
                    dokumen_oss,
                    fotokopi_ktp,
                    fotokopi_ktp_kuasa,
                    akta_perusahaan,                
                    tdp,
                    shp,
                     " . (($status_surat_tanah == 'atas_nama_sendiri') ? "status_surat_tanah,dasar_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 

                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "surat_tanah,peta_bidang,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "npwp,surat_tanah,peta_bidang,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "surat_tanah,peta_bidang,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "npwp,surat_tanah,peta_bidang,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "surat_tanah,peta_bidang,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "npwp,surat_tanah,peta_bidang,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "surat_tanah,peta_bidang,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "npwp,surat_tanah,peta_bidang,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,daftar_nama_kk,surat_fkub" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "surat_tanah,peta_bidang,daftar_nama_kk,surat_fkub" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "npwp,surat_tanah,peta_bidang,daftar_nama_kk,surat_fkub" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,daftar_nama_kk,surat_fkub" : "") . "                                            
                    ) 
                    VALUES(
                        '$id_kkpr',
                        '$id_user',
                        '$type_kategori',
                        '$lainya',
                        '$tgl_reg',
    
                        '$nama_pemohon',
                        '$alamat_pemohon',
                        '$rt_pemohon',
                        '$rw_pemohon',
                        '$provinsi_pemohon',
                        '$kota_pemohon',
                        '$kecamatan_pemohon',
                        '$kelurahan_pemohon',
                        '$telp_pemohon',
    
                        '$nama_kuasa',
                        '$alamat_kuasa',
                        '$rt_kuasa',
                        '$rw_kuasa',
                        '$provinsi_kuasa',
                        '$kota_kuasa',
                        '$kecamatan_kuasa',
                        '$kelurahan_kuasa',
                        '$telp_kuasa',
    
                        '$nama_perusahaan',
                        '$nib',
                        '$skala_usaha',
                        '$klasifikasi_resiko',
                        '$kbli_Array',
                        '$alamat_perusahaan',
                        '$rt_perusahaan',
                        '$rw_perusahaan',
                        '$provinsi_perusahaan',
                        '$kota_perusahaan',
                        '$kecamatan_perusahaan',
                        '$kelurahan_perusahaan',
    
                        '$peruntukan_tanah',
                        '$luas_tanah',
                        '$type_isi_kategori',
                        '$perluasan',
                        '$Tanah_Array',
                        '$lokasi_tanah',
                        '$rt_tanah',
                        '$rw_tanah',
                        'KAB Malang',
                        '$kecamatan_tanah',
                        '$kelurahan_tanah',
    
                        '0',
    
                        '$file1',
                        '$file2',
                        '$file19',
                        '$file3',                    
                        '$file5',
                        '$file20',
                        " . (($status_surat_tanah == 'atas_nama_sendiri') ? "'$status_surat_tanah','$dasar_surat_tanah_pribadi'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_sm','$surat_peralihan','$file21'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_sm','$surat_peralihan','$file21','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_pk','$surat_peralihan','$file23'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_pk','$surat_peralihan','$file23','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_ppjb','$surat_peralihan','$file24'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_ppjb','$surat_peralihan','$file24','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_ajb','$surat_peralihan','$file25'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_ajb','$surat_peralihan','$file25','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_ah','$surat_peralihan','$file26'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_ah','$surat_peralihan','$file26','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_aph','$surat_peralihan','$file27'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_aph','$surat_peralihan','$file27','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_kw','$surat_peralihan','$file28'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_kw','$surat_peralihan','$file28','$file22'," : "") . " 

                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "'$file6','$file7','$file8','$file10','$file11','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "'$file7','$file8','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "'$file6','$file7','$file8','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "'$file7','$file8','$file10','$file11','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "'$file6','$file7','$file8','$file10','$file11','$file14'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "'$file7','$file8','$file14'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "'$file6','$file7','$file8','$file14'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "'$file7','$file8','$file10','$file11','$file14'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "'$file6','$file7','$file8','$file10','$file11','$file15'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "'$file7','$file8','$file15'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "'$file6','$file7','$file8','$file15'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "'$file7','$file8','$file10','$file11','$file15'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "'$file6','$file7','$file8','$file10','$file11','$file16'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "'$file7','$file8','$file16'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "'$file6','$file7','$file8','$file16'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "'$file7','$file8','$file10','$file11','$file16'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "'$file6','$file7','$file8','$file10','$file11','$file17','$file18'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "'$file7','$file8','$file17','$file18'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "'$file6','$file7','$file8','$file17','$file18'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "'$file7','$file8','$file10','$file11','$file17','$file18'" : "") . "                                                                    
                        )";
            } else {
                $insert = "INSERT INTO kkpr_permohonan (
                    id_kkpr_permohonan,
                    id_user,
                    type,
                    type_lainya,
                    tgl_reg,
    
                    nama_pemohon,
                    alamat_pemohon,
                    rt_pemohon,
                    rw_pemohon,
                    provinsi_pemohon,
                    kota_pemohon,
                    kecamatan_pemohon,
                    kelurahan_pemohon,
                    telp_pemohon,
    
                    nama_perusahaan,
                    nib,
                    skala_usaha,
                    klasifikasi_resiko,
                    kbli,
                    alamat_perusahaan,
                    rt_perusahaan,
                    rw_perusahaan,
                    provinsi_perusahaan,
                    kota_perusahaan,
                    kecamatan_perusahaan,
                    kelurahan_perusahaan,                            
    
                    peruntukan_tanah,
                    luas_tanah,
                    kategori,
                    perluasan,
                    status_tanah,
                    lokasi_tanah,
                    rt_tanah,
                    rw_tanah,
                    kota_tanah,
                    kecamatan_tanah,
                    kelurahan_tanah,    
    
                    status_berkas,                            
    
                    dokumen_oss,
                    fotokopi_ktp,                    
                    akta_perusahaan,                
                    tdp,
                    shp,
                     " . (($status_surat_tanah == 'atas_nama_sendiri') ? "status_surat_tanah,dasar_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 

                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "surat_tanah,peta_bidang,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "npwp,surat_tanah,peta_bidang,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "surat_tanah,peta_bidang,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "npwp,surat_tanah,peta_bidang,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "surat_tanah,peta_bidang,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "npwp,surat_tanah,peta_bidang,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "surat_tanah,peta_bidang,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "npwp,surat_tanah,peta_bidang,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,daftar_nama_kk,surat_fkub" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "surat_tanah,peta_bidang,daftar_nama_kk,surat_fkub" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "npwp,surat_tanah,peta_bidang,daftar_nama_kk,surat_fkub" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,daftar_nama_kk,surat_fkub" : "") . "                                            
                    ) 
                    VALUES(
                        '$id_kkpr',
                        '$id_user',
                        '$type_kategori',
                        '$lainya',
                        '$tgl_reg',
    
                        '$nama_pemohon',
                        '$alamat_pemohon',
                        '$rt_pemohon',
                        '$rw_pemohon',
                        '$provinsi_pemohon',
                        '$kota_pemohon',
                        '$kecamatan_pemohon',
                        '$kelurahan_pemohon',
                        '$telp_pemohon',                       
    
                        '$nama_perusahaan',
                        '$nib',
                        '$skala_usaha',
                        '$klasifikasi_resiko',
                        '$kbli_Array',
                        '$alamat_perusahaan',
                        '$rt_perusahaan',
                        '$rw_perusahaan',
                        '$provinsi_perusahaan',
                        '$kota_perusahaan',
                        '$kecamatan_perusahaan',
                        '$kelurahan_perusahaan',
    
                        '$peruntukan_tanah',
                        '$luas_tanah',
                        '$type_isi_kategori',
                        '$perluasan',
                        '$Tanah_Array',
                        '$lokasi_tanah',
                        '$rt_tanah',
                        '$rw_tanah',
                        'KAB Malang',
                        '$kecamatan_tanah',
                        '$kelurahan_tanah',
    
                        '0',
    
                        '$file1',
                        '$file2',                    
                        '$file3',                    
                        '$file5',
                        '$file20',
                        " . (($status_surat_tanah == 'atas_nama_sendiri') ? "'$status_surat_tanah','$dasar_surat_tanah_pribadi'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_sm','$surat_peralihan','$file21'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_sm','$surat_peralihan','$file21','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_pk','$surat_peralihan','$file23'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_pk','$surat_peralihan','$file23','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_ppjb','$surat_peralihan','$file24'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_ppjb','$surat_peralihan','$file24','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_ajb','$surat_peralihan','$file25'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_ajb','$surat_peralihan','$file25','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_ah','$surat_peralihan','$file26'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_ah','$surat_peralihan','$file26','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_aph','$surat_peralihan','$file27'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_aph','$surat_peralihan','$file27','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_kw','$surat_peralihan','$file28'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_kw','$surat_peralihan','$file28','$file22'," : "") . " 
                        
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "'$file6','$file7','$file8','$file10','$file11','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "'$file7','$file8','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "'$file6','$file7','$file8','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "'$file7','$file8','$file10','$file11','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "'$file6','$file7','$file8','$file10','$file11','$file14'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "'$file7','$file8','$file14'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "'$file6','$file7','$file8','$file14'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "'$file7','$file8','$file10','$file11','$file14'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "'$file6','$file7','$file8','$file10','$file11','$file15'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "'$file7','$file8','$file15'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "'$file6','$file7','$file8','$file15'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "'$file7','$file8','$file10','$file11','$file15'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "'$file6','$file7','$file8','$file10','$file11','$file16'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "'$file7','$file8','$file16'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "'$file6','$file7','$file8','$file16'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "'$file7','$file8','$file10','$file11','$file16'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "'$file6','$file7','$file8','$file10','$file11','$file17','$file18'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "'$file7','$file8','$file17','$file18'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "'$file6','$file7','$file8','$file17','$file18'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "'$file7','$file8','$file10','$file11','$file17','$file18'" : "") . "                                                                    
                        )";
            }

            // echo $insert;
            $query = $this->db->query($insert);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } else {
            $config['upload_path']          = './assets_dokumen/kkpr';
            $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG|zip';
            $config['max_size']             = 2048; //2MB
            // $config['max_width']            = 2048;
            // $config['max_height']           = 2000;
            // $config['encrypt_name']         = true;
            $this->load->library('upload', $config);

            //file1
            if (!empty($_FILES['dokumen_oss']['name'])) {
                $this->upload->do_upload('dokumen_oss');
                $data1 = $this->upload->data();
                $file1 = $data1['file_name'];
            }

            //file2
            if (!empty($_FILES['fotokopi_ktp']['name'])) {
                $this->upload->do_upload('fotokopi_ktp');
                $data2 = $this->upload->data();
                $file2 = $data2['file_name'];
            }
            //file4
            // if (!empty($_FILES['siup']['name'])) {
            //     $this->upload->do_upload('siup');
            //     $data4 = $this->upload->data();
            //     $file4 = $data4['file_name'];
            // }
            //file5
            if (!empty($_FILES['tdp_nib']['name'])) {
                $this->upload->do_upload('tdp_nib');
                $data5 = $this->upload->data();
                $file5 = $data5['file_name'];
            }
            //file6
            if (!empty($_FILES['npwp']['name'])) {
                $this->upload->do_upload('npwp');
                $data6 = $this->upload->data();
                $file6 = $data6['file_name'];
            }
            //file7
            $jumlah_berkas = count($_FILES['file_status_tanah']['name']);
            $dataArray_surat_tanah = array();

            for ($i = 0; $i < $jumlah_berkas; $i++) {
                if (!empty($_FILES['file_status_tanah']['name'][$i])) {
                    $_FILES['file']['name'] = $_FILES['file_status_tanah']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['file_status_tanah']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['file_status_tanah']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['file_status_tanah']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['file_status_tanah']['size'][$i];

                    if ($this->upload->do_upload('file')) {
                        $uploadData = $this->upload->data();
                        $data = array(
                            'surat_tanah' => $uploadData['file_name']
                        );
                        $dataArray_surat_tanah[] = $data;
                    }
                }
            }

            $file7 = json_encode($dataArray_surat_tanah);
            //file8
            if (!empty($_FILES['peta_bidang']['name'])) {
                $this->upload->do_upload('peta_bidang');
                $data8 = $this->upload->data();
                $file8 = $data8['file_name'];
            }
            //file9
            // if (!empty($_FILES['surat_teknis_tanah']['name'])) {
            //     $this->upload->do_upload('surat_teknis_tanah');
            //     $data9 = $this->upload->data();
            //     $file9 = $data9['file_name'];
            // }
            //TAMBAHAN
            //file10
            if (!empty($_FILES['surat_kematian']['name'])) {
                $this->upload->do_upload('surat_kematian');
                $data10 = $this->upload->data();
                $file10 = $data10['file_name'];
            }
            //file11
            if (!empty($_FILES['surat_kuasa_ahli_waris']['name'])) {
                $this->upload->do_upload('surat_kuasa_ahli_waris');
                $data11 = $this->upload->data();
                $file11 = $data11['file_name'];
            }
            //file12
            if (!empty($_FILES['rekomendasi_dinas_komunikasi']['name'])) {
                $this->upload->do_upload('rekomendasi_dinas_komunikasi');
                $data12 = $this->upload->data();
                $file12 = $data12['file_name'];
            }
            //file13
            if (!empty($_FILES['rekomendasi_tni']['name'])) {
                $this->upload->do_upload('rekomendasi_tni');
                $data13 = $this->upload->data();
                $file13 = $data13['file_name'];
            }
            //file14
            if (!empty($_FILES['surat_dinas_perdagangan']['name'])) {
                $this->upload->do_upload('surat_dinas_perdagangan');
                $data14 = $this->upload->data();
                $file14 = $data14['file_name'];
            }
            //file15
            if (!empty($_FILES['surat_dinas_peternakan']['name'])) {
                $this->upload->do_upload('surat_dinas_peternakan');
                $data15 = $this->upload->data();
                $file15 = $data15['file_name'];
            }
            //file16
            if (!empty($_FILES['surat_pertamina']['name'])) {
                $this->upload->do_upload('surat_pertamina');
                $data16 = $this->upload->data();
                $file16 = $data16['file_name'];
            }
            //file17
            if (!empty($_FILES['daftar_nama_kk']['name'])) {
                $this->upload->do_upload('daftar_nama_kk');
                $data17 = $this->upload->data();
                $file17 = $data17['file_name'];
            }
            //file18
            if (!empty($_FILES['surat_fkub']['name'])) {
                $this->upload->do_upload('surat_fkub');
                $data18 = $this->upload->data();
                $file18 = $data18['file_name'];
            }
            //file19
            if (!empty($_FILES['fotokopi_ktp_kuasa']['name'])) {
                $this->upload->do_upload('fotokopi_ktp_kuasa');
                $data19 = $this->upload->data();
                $file19 = $data19['file_name'];
            }
            //file20
            if (!empty($_FILES['shp']['name'])) {
                $this->upload->do_upload('shp');
                $data20 = $this->upload->data();
                $file20 = $data20['file_name'];
            }
            //file21
            if (!empty($_FILES['file_surat_peralihan_sm']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_sm');
                $data21 = $this->upload->data();
                $file21 = $data21['file_name'];
            }
            //file23
            if (!empty($_FILES['file_surat_peralihan_pk']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_pk');
                $data23 = $this->upload->data();
                $file23 = $data23['file_name'];
            }
            //file24
            if (!empty($_FILES['file_surat_peralihan_ppjb']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_ppjb');
                $data24 = $this->upload->data();
                $file24 = $data24['file_name'];
            }
            //file25
            if (!empty($_FILES['file_surat_peralihan_ajb']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_ajb');
                $data25 = $this->upload->data();
                $file25 = $data25['file_name'];
            }
            //file26
            if (!empty($_FILES['file_surat_peralihan_ah']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_ah');
                $data26 = $this->upload->data();
                $file26 = $data26['file_name'];
            }
            //file27
            if (!empty($_FILES['file_surat_peralihan_aph']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_aph');
                $data27 = $this->upload->data();
                $file27 = $data27['file_name'];
            }
            //file28
            if (!empty($_FILES['file_surat_peralihan_kw']['name'])) {
                $this->upload->do_upload('file_surat_peralihan_kw');
                $data28 = $this->upload->data();
                $file28 = $data28['file_name'];
            }
             //file22
            $jumlah_berkas_peta_bidang = count($_FILES['file_peta_bidang']['name']);
            $dataArray_peta_bidang = array();

            for ($i = 0; $i < $jumlah_berkas_peta_bidang; $i++) {
                if (!empty($_FILES['file_peta_bidang']['name'][$i])) {
                    $_FILES['file']['name'] = $_FILES['file_peta_bidang']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['file_peta_bidang']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['file_peta_bidang']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['file_peta_bidang']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['file_peta_bidang']['size'][$i];

                    if ($this->upload->do_upload('file')) {
                        $uploadData = $this->upload->data();
                        $data = array(
                            'peta_bidang' => $uploadData['file_name']
                        );
                        $dataArray_peta_bidang[] = $data;
                    }
                }
            }

            $file22 = json_encode($dataArray_peta_bidang);

            $id_kkpr_query = $this->db->query("SELECT MAX(id_kkpr_permohonan) AS hasil FROM kkpr_permohonan")->row();
            $id_kkpr = $id_kkpr_query->hasil + 1;
            $this->session->set_userdata('id_kkpr_permohonan', $id_kkpr);

            $id_user = $this->session->userdata('id_user');
            $type_isi_kategori = $this->input->post('type_isi_kategori');
            $type_kategori = $this->input->post('type_kategori');
            $pemilik_lahan_meninggal = $this->input->post('pemilik_lahan_meninggal');
            $badan_hukum = $this->input->post('badan_hukum');
            $kuasa = $this->input->post('kuasa');
            $lainya = $this->input->post('lainya');

            $nama_pemohon = $this->input->post('nama_pemohon');
            $alamat_pemohon = $this->input->post('alamat_pemohon');
            $rt_pemohon = $this->input->post('rt_pemohon');
            $rw_pemohon = $this->input->post('rw_pemohon');
            $provinsi_pemohon = $this->input->post('provinsi_pemohon');
            $kota_pemohon = $this->input->post('kota_pemohon');
            $kecamatan_pemohon = $this->input->post('kecamatan_pemohon');
            $kelurahan_pemohon = $this->input->post('kelurahan_pemohon');
            $telp_pemohon = $this->input->post('telp_pemohon');

            $nama_kuasa = $this->input->post('nama_kuasa');
            $alamat_kuasa = $this->input->post('alamat_kuasa');
            $rt_kuasa = $this->input->post('rt_kuasa');
            $rw_kuasa = $this->input->post('rw_kuasa');
            $provinsi_kuasa = $this->input->post('provinsi_kuasa');
            $kota_kuasa = $this->input->post('kota_kuasa');
            $kecamatan_kuasa = $this->input->post('kecamatan_kuasa');
            $kelurahan_kuasa = $this->input->post('kelurahan_kuasa');
            $telp_kuasa = $this->input->post('telp_kuasa');

            $nib = $this->input->post('nib');
            $skala_usaha = $this->input->post('skala_usaha');
            $klasifikasi_resiko = $this->input->post('klasifikasi_resiko');
            $kbli = $this->input->post('kbli_array');

            $peruntukan_tanah = $this->input->post('peruntukan_tanah');
            $luas_tanah = $this->input->post('luas_tanah');
            $perluasan = $this->input->post('perluasan');
            $status_tanah = $this->input->post('status_tanah');
            $status_tanah_array = $this->input->post('status_tanah_array');
            $lokasi_tanah = $this->input->post('lokasi_tanah');
            $rt_tanah = $this->input->post('rt_tanah');
            $rw_tanah = $this->input->post('rw_tanah');
            $kelurahan_tanah = $this->input->post('kelurahan_tanah');
            $kecamatan_tanah = $this->input->post('kecamatan_tanah');

            $status_surat_tanah = $this->input->post('st_1');
            $dasar_surat_tanah_pribadi = $this->input->post('st_2');
            $surat_peralihan = $this->input->post('st_3');
            $dasar_surat_tanah_sm = $this->input->post('st_sewa_menyewa');
            $dasar_surat_tanah_pk = $this->input->post('st_perjanjian_kerjasama');
            $dasar_surat_tanah_ppjb = $this->input->post('st_ppjb');
            $dasar_surat_tanah_ajb = $this->input->post('st_ajb');
            $dasar_surat_tanah_ah = $this->input->post('st_akta_hibah');
            $dasar_surat_tanah_aph = $this->input->post('st_akta_pelepasan_hak');
            $dasar_surat_tanah_kw = $this->input->post('st_keterangan_waris');

            $dataArray = array();
            if (!empty($status_tanah_array)) {
                foreach ($status_tanah_array as $input) {
                    if (!empty($input)) {
                        $data = array(
                            'status_tanah' => $input
                        );
                        $dataArray[] = $data;
                    }
                }
            }
            $Tanah_Array = json_encode($dataArray);
            $dataArray_kbli = array();
            if (!empty($kbli)) {
                foreach ($kbli as $input) {
                    if (!empty($input)) {
                        $data = array(
                            'kbli' => $input
                        );
                        $dataArray_kbli[] = $data;
                    }
                }
            }
            $kbli_Array = json_encode($dataArray_kbli);
            $tgl_reg = date('d-m-y');

            if ($kuasa == '1') {
                $insert = "INSERT INTO kkpr_permohonan (
                    id_kkpr_permohonan,
                    id_user,
                    type,
                    type_lainya,
                    tgl_reg,
    
                    nama_pemohon,
                    alamat_pemohon,
                    rt_pemohon,
                    rw_pemohon,
                    provinsi_pemohon,
                    kota_pemohon,
                    kecamatan_pemohon,
                    kelurahan_pemohon,
                    telp_pemohon,
    
                    nama_kuasa,
                    alamat_kuasa,
                    rt_kuasa,
                    rw_kuasa,
                    provinsi_kuasa,
                    kota_kuasa,
                    kecamatan_kuasa,
                    kelurahan_kuasa,
                    telp_kuasa,
    
                    nib,
                    skala_usaha,
                    klasifikasi_resiko,
                    kbli,
    
                    peruntukan_tanah,
                    luas_tanah,
                    kategori,
                    perluasan,
                    status_tanah,
                    lokasi_tanah,
                    rt_tanah,
                    rw_tanah,
                    kota_tanah,
                    kecamatan_tanah,
                    kelurahan_tanah,   
    
                    status_berkas,                         
    
                    dokumen_oss,
                    fotokopi_ktp,
                    fotokopi_ktp_kuasa,
                    tdp,
                    shp,
                    " . (($status_surat_tanah == 'atas_nama_sendiri') ? "status_surat_tanah,dasar_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 

                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'perumahan') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'perumahan') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'perumahan') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'perumahan') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "surat_tanah,peta_bidang,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "npwp,surat_tanah,peta_bidang,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "surat_tanah,peta_bidang,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "npwp,surat_tanah,peta_bidang,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "surat_tanah,peta_bidang,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "npwp,surat_tanah,peta_bidang,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "surat_tanah,peta_bidang,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "npwp,surat_tanah,peta_bidang,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,daftar_nama_kk,surat_fkub" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "surat_tanah,peta_bidang,daftar_nama_kk,surat_fkub" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "npwp,surat_tanah,peta_bidang,daftar_nama_kk,surat_fkub" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,daftar_nama_kk,surat_fkub" : "") . "                                            
                    ) 
                    VALUES(
                        '$id_kkpr',
                        '$id_user',
                        '$type_kategori',
                        '$lainya',
                        '$tgl_reg',
    
                        '$nama_pemohon',
                        '$alamat_pemohon',
                        '$rt_pemohon',
                        '$rw_pemohon',
                        '$provinsi_pemohon',
                        '$kota_pemohon',
                        '$kecamatan_pemohon',
                        '$kelurahan_pemohon',
                        '$telp_pemohon',
    
                        '$nama_kuasa',
                        '$alamat_kuasa',
                        '$rt_kuasa',
                        '$rw_kuasa',
                        '$provinsi_kuasa',
                        '$kota_kuasa',
                        '$kecamatan_kuasa',
                        '$kelurahan_kuasa',
                        '$telp_kuasa',
    
                        '$nib',
                        '$skala_usaha',
                        '$klasifikasi_resiko',
                        '$kbli_Array',                    
    
                        '$peruntukan_tanah',
                        '$luas_tanah',
                        '$type_isi_kategori',
                        '$perluasan',
                        '$Tanah_Array',
                        '$lokasi_tanah',
                        '$rt_tanah',
                        '$rw_tanah',
                        'KAB Malang',
                        '$kecamatan_tanah',
                        '$kelurahan_tanah',
    
                        '0',
    
                        '$file1',
                        '$file2',              
                        '$file19',              
                        '$file5',
                        '$file20',
                        " . (($status_surat_tanah == 'atas_nama_sendiri') ? "'$status_surat_tanah','$dasar_surat_tanah_pribadi'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_sm','$surat_peralihan','$file21'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_sm','$surat_peralihan','$file21','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_pk','$surat_peralihan','$file23'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_pk','$surat_peralihan','$file23','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_ppjb','$surat_peralihan','$file24'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_ppjb','$surat_peralihan','$file24','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_ajb','$surat_peralihan','$file25'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_ajb','$surat_peralihan','$file25','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_ah','$surat_peralihan','$file26'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_ah','$surat_peralihan','$file26','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_aph','$surat_peralihan','$file27'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_aph','$surat_peralihan','$file27','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_kw','$surat_peralihan','$file28'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_kw','$surat_peralihan','$file28','$file22'," : "") . " 

                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'perumahan') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'perumahan') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'perumahan') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'perumahan') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "'$file6','$file7','$file8','$file10','$file11','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "'$file7','$file8','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "'$file6','$file7','$file8','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "'$file7','$file8','$file10','$file11','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "'$file6','$file7','$file8','$file10','$file11','$file14'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "'$file7','$file8','$file14'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "'$file6','$file7','$file8','$file14'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "'$file7','$file8','$file10','$file11','$file14'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "'$file6','$file7','$file8','$file10','$file11','$file15'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "'$file7','$file8','$file15'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "'$file6','$file7','$file8','$file15'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "'$file7','$file8','$file10','$file11','$file15'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "'$file6','$file7','$file8','$file10','$file11','$file16'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "'$file7','$file8','$file16'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "'$file6','$file7','$file8','$file16'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "'$file7','$file8','$file10','$file11','$file16'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "'$file6','$file7','$file8','$file10','$file11','$file17','$file18'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "'$file7','$file8','$file17','$file18'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "'$file6','$file7','$file8','$file17','$file18'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "'$file7','$file8','$file10','$file11','$file17','$file18'" : "") . "                                                                    
                        )";
            }else{
                $insert = "INSERT INTO kkpr_permohonan (
                    id_kkpr_permohonan,
                    id_user,
                    type,
                    type_lainya,
                    tgl_reg,
    
                    nama_pemohon,
                    alamat_pemohon,
                    rt_pemohon,
                    rw_pemohon,
                    provinsi_pemohon,
                    kota_pemohon,
                    kecamatan_pemohon,
                    kelurahan_pemohon,
                    telp_pemohon,    
    
                    nib,
                    skala_usaha,
                    klasifikasi_resiko,
                    kbli,
    
                    peruntukan_tanah,
                    luas_tanah,
                    kategori,
                    perluasan,
                    status_tanah,
                    lokasi_tanah,
                    rt_tanah,
                    rw_tanah,
                    kota_tanah,
                    kecamatan_tanah,
                    kelurahan_tanah,   
    
                    status_berkas,                         
    
                    dokumen_oss,
                    fotokopi_ktp,                
                    tdp,
                    shp,                                                            
                    " . (($status_surat_tanah == 'atas_nama_sendiri') ? "status_surat_tanah,dasar_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'sertifikat') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan," : "") . " 
                    " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'letter') ? "status_surat_tanah,dasar_surat_tanah,type_surat_peralihan,surat_peralihan,peta_bidang_surat_tanah," : "") . " 

                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'perumahan') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'perumahan') ? "surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'perumahan') ? "npwp,surat_tanah,peta_bidang" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'perumahan') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "surat_tanah,peta_bidang,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "npwp,surat_tanah,peta_bidang,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "surat_tanah,peta_bidang,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "npwp,surat_tanah,peta_bidang,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "surat_tanah,peta_bidang,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "npwp,surat_tanah,peta_bidang,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_peternakan" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "surat_tanah,peta_bidang,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "npwp,surat_tanah,peta_bidang,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,surat_pertamina" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "npwp,surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,daftar_nama_kk,surat_fkub" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "surat_tanah,peta_bidang,daftar_nama_kk,surat_fkub" : "") . "                                            
                    " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "npwp,surat_tanah,peta_bidang,daftar_nama_kk,surat_fkub" : "") . "                                            
                    " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "surat_tanah,peta_bidang,surat_kematian,surat_kuasa_ahli_waris,daftar_nama_kk,surat_fkub" : "") . "                                            
                    ) 
                    VALUES(
                        '$id_kkpr',
                        '$id_user',
                        '$type_kategori',
                        '$lainya',
                        '$tgl_reg',
    
                        '$nama_pemohon',
                        '$alamat_pemohon',
                        '$rt_pemohon',
                        '$rw_pemohon',
                        '$provinsi_pemohon',
                        '$kota_pemohon',
                        '$kecamatan_pemohon',
                        '$kelurahan_pemohon',
                        '$telp_pemohon',                        
    
                        '$nib',
                        '$skala_usaha',
                        '$klasifikasi_resiko',
                        '$kbli_Array',                    
    
                        '$peruntukan_tanah',
                        '$luas_tanah',
                        '$type_isi_kategori',
                        '$perluasan',
                        '$Tanah_Array',
                        '$lokasi_tanah',
                        '$rt_tanah',
                        '$rw_tanah',
                        'KAB Malang',
                        '$kecamatan_tanah',
                        '$kelurahan_tanah',
    
                        '0',
    
                        '$file1',
                        '$file2',                                                  
                        '$file5',
                        '$file20',
                        " . (($status_surat_tanah == 'atas_nama_sendiri') ? "'$status_surat_tanah','$dasar_surat_tanah_pribadi'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_sm','$surat_peralihan','$file21'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_sm == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_sm','$surat_peralihan','$file21','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_pk','$surat_peralihan','$file23'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_pk == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_pk','$surat_peralihan','$file23','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_ppjb','$surat_peralihan','$file24'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ppjb == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_ppjb','$surat_peralihan','$file24','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_ajb','$surat_peralihan','$file25'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ajb == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_ajb','$surat_peralihan','$file25','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_ah','$surat_peralihan','$file26'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_ah == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_ah','$surat_peralihan','$file26','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_aph','$surat_peralihan','$file27'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_aph == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_aph','$surat_peralihan','$file27','$file22'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'sertifikat') ? "'$status_surat_tanah','$dasar_surat_tanah_kw','$surat_peralihan','$file28'," : "") . " 
                        " . (($status_surat_tanah == 'atas_nama_orang_lain' && $dasar_surat_tanah_kw == 'letter') ? "'$status_surat_tanah','$dasar_surat_tanah_kw','$surat_peralihan','$file28','$file22'," : "") . " 

                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'biasa') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'biasa') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'lainya') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'lainya') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'klinik') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'klinik') ? "'$file7','$file8','$file10','$file11'" : "") . "  
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'pergudangan') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'pergudangan') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                                                              
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'perumahan') ? "'$file6','$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'perumahan') ? "'$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'perumahan') ? "'$file6','$file7','$file8'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'perumahan') ? "'$file7','$file8','$file10','$file11'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "'$file6','$file7','$file8','$file10','$file11','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "'$file7','$file8','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tower') ? "'$file6','$file7','$file8','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tower') ? "'$file7','$file8','$file10','$file11','$file12','$file13'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "'$file6','$file7','$file8','$file10','$file11','$file14'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "'$file7','$file8','$file14'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'minimarket') ? "'$file6','$file7','$file8','$file14'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'minimarket') ? "'$file7','$file8','$file10','$file11','$file14'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "'$file6','$file7','$file8','$file10','$file11','$file15'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "'$file7','$file8','$file15'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'peternakan') ? "'$file6','$file7','$file8','$file15'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'peternakan') ? "'$file7','$file8','$file10','$file11','$file15'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "'$file6','$file7','$file8','$file10','$file11','$file16'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "'$file7','$file8','$file16'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'spbu') ? "'$file6','$file7','$file8','$file16'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'spbu') ? "'$file7','$file8','$file10','$file11','$file16'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "'$file6','$file7','$file8','$file10','$file11','$file17','$file18'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "'$file7','$file8','$file17','$file18'" : "") . "                                                
                        " . (($badan_hukum == '1' && $pemilik_lahan_meninggal == '0' && $type_kategori == 'tempat_ibadah') ? "'$file6','$file7','$file8','$file17','$file18'" : "") . "                                                
                        " . (($badan_hukum == '0' && $pemilik_lahan_meninggal == '1' && $type_kategori == 'tempat_ibadah') ? "'$file7','$file8','$file10','$file11','$file17','$file18'" : "") . "                                                                    
                        )";
            }
            // echo $insert;
            $query = $this->db->query($insert);
            if ($query) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function tambah_kuasa()
    {
        $nama_pemberi = $this->input->post('nama_pemberi');
        $pekerjaan_pemberi = $this->input->post('pekerjaan_pemberi');
        $alamat_pemberi = $this->input->post('alamat_pemberi');
        $rt_pemberi = $this->input->post('rt_pemberi');
        $rw_pemberi = $this->input->post('rw_pemberi');
        $provinsi_pemberi = $this->input->post('provinsi_pemberi');
        $kota_pemberi = $this->input->post('kota_pemberi');
        $kecamatan_pemberi = $this->input->post('kecamatan_pemberi');
        $kelurahan_pemberi = $this->input->post('kelurahan_pemberi');
        $telp_pemberi = $this->input->post('telp_pemberi');

        $nama_penerima = $this->input->post('nama_penerima');
        $pekerjaan_penerima = $this->input->post('pekerjaan_penerima');
        $alamat_penerima = $this->input->post('alamat_penerima');
        $rt_penerima = $this->input->post('rt_penerima');
        $rw_penerima = $this->input->post('rw_penerima');
        $provinsi_penerima = $this->input->post('provinsi_penerima');
        $kota_penerima = $this->input->post('kota_penerima');
        $kecamatan_penerima = $this->input->post('kecamatan_penerima');
        $kelurahan_penerima = $this->input->post('kelurahan_penerima');
        $telp_penerima = $this->input->post('telp_penerima');

        $lokasi_tanah = $this->input->post('lokasi_tanah');
        $rt_tanah = $this->input->post('rt_tanah');
        $rw_tanah = $this->input->post('rw_tanah');
        $kecamatan_tanah = $this->input->post('kecamatan_tanah');
        $kelurahan_tanah = $this->input->post('kelurahan_tanah');
        $status_tanah = $this->input->post('status_tanah');
        $luas_tanah = $this->input->post('luas_tanah');

        $query = $this->db->query("INSERT INTO kkpr_kuasa (
                            nama_pemberi,
                            pekerjaan_pemberi,
                            alamat_pemberi,
                            rt_pemberi,
                            rw_pemberi,
                            provinsi_pemberi,
                            kota_pemberi,
                            kecamatan_pemberi,
                            kelurahan_pemberi,
                            telp_pemberi,

                            nama_penerima,
                            pekerjaan_penerima,
                            alamat_penerima,
                            rt_penerima,
                            rw_penerima,
                            provinsi_penerima,
                            kota_penerima,
                            kecamatan_penerima,
                            kelurahan_penerima,
                            telp_penerima,

                            lokasi_tanah,
                            rt_tanah,
                            rw_tanah,
                            kota_tanah,
                            kecamatan_tanah,
                            kelurahan_tanah,
                            status_tanah,
                            luas_tanah
                            )
                            VALUES(
								'$nama_pemberi',
								'$pekerjaan_pemberi',
								'$alamat_pemberi',
								'$rt_pemberi',
								'$rw_pemberi',
								'$provinsi_pemberi',
								'$kota_pemberi',
								'$kecamatan_pemberi',
								'$kelurahan_pemberi',
								'$telp_pemberi',

                                '$nama_penerima',
								'$pekerjaan_penerima',
								'$alamat_penerima',
								'$rt_penerima',
								'$rw_penerima',
								'$provinsi_penerima',
								'$kota_penerima',
								'$kecamatan_penerima',
								'$kelurahan_penerima',
								'$telp_penerima',

                                '$lokasi_tanah',
								'$rt_tanah',
								'$rw_tanah',
								'Kabupaten Malang',
								'$kecamatan_tanah',
								'$kelurahan_tanah',
								'$status_tanah',                         		
								'$luas_tanah'
								)");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function tambah_permohonan_default()
    {
        $config['upload_path']          = './assets_dokumen/kkpr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        // $config['max_width']            = 2048;
        // $config['max_height']           = 2000;
        // $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['dokumen_oss']['name'])) {
            $this->upload->do_upload('dokumen_oss');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }

        //file2
        if (!empty($_FILES['fotokopi_ktp']['name'])) {
            $this->upload->do_upload('fotokopi_ktp');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        }
        //file3
        if (!empty($_FILES['spkkp']['name'])) {
            $this->upload->do_upload('spkkp');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        }
        //file4
        if (!empty($_FILES['fc_akta_perusahaan']['name'])) {
            $this->upload->do_upload('fc_akta_perusahaan');
            $data4 = $this->upload->data();
            $file4 = $data4['file_name'];
        }
        //file5
        if (!empty($_FILES['siup']['name'])) {
            $this->upload->do_upload('siup');
            $data5 = $this->upload->data();
            $file5 = $data5['file_name'];
        }
        //file6
        if (!empty($_FILES['tdp_nib']['name'])) {
            $this->upload->do_upload('tdp_nib');
            $data6 = $this->upload->data();
            $file6 = $data6['file_name'];
        }
        //file7
        if (!empty($_FILES['npwp']['name'])) {
            $this->upload->do_upload('npwp');
            $data7 = $this->upload->data();
            $file7 = $data7['file_name'];
        }
        //file8
        if (!empty($_FILES['surat_tanah']['name'])) {
            $this->upload->do_upload('surat_tanah');
            $data8 = $this->upload->data();
            $file8 = $data8['file_name'];
        }
        //file9
        if (!empty($_FILES['peta_bidang']['name'])) {
            $this->upload->do_upload('peta_bidang');
            $data9 = $this->upload->data();
            $file9 = $data9['file_name'];
        }
        //file10
        if (!empty($_FILES['surat_teknis_tanah']['name'])) {
            $this->upload->do_upload('surat_teknis_tanah');
            $data10 = $this->upload->data();
            $file10 = $data10['file_name'];
        }
        $nama_pemohon = $this->input->post('nama_pemohon');
        $alamat_pemohon = $this->input->post('alamat_pemohon');
        $rt_pemohon = $this->input->post('rt_pemohon');
        $rw_pemohon = $this->input->post('rw_pemohon');
        $provinsi_pemohon = $this->input->post('provinsi_pemohon');
        $kota_pemohon = $this->input->post('kota_pemohon');
        $kecamatan_pemohon = $this->input->post('kecamatan_pemohon');
        $kelurahan_pemohon = $this->input->post('kelurahan_pemohon');
        $telp_pemohon = $this->input->post('telp_pemohon');

        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $rt_perusahaan = $this->input->post('rt_perusahaan');
        $rw_perusahaan = $this->input->post('rw_perusahaan');
        $provinsi_perusahaan = $this->input->post('provinsi_perusahaan');
        $kota_perusahaan = $this->input->post('kota_perusahaan');
        $kecamatan_perusahaan = $this->input->post('kecamatan_perusahaan');
        $kelurahan_perusahaan = $this->input->post('kelurahan_perusahaan');

        $peruntukan_tanah = $this->input->post('peruntukan_tanah');
        $luas_tanah = $this->input->post('luas_tanah');
        $lokasi_tanah = $this->input->post('lokasi_tanah');
        $rt_tanah = $this->input->post('rt_tanah');
        $rw_tanah = $this->input->post('rw_tanah');
        $kelurahan_tanah = $this->input->post('kelurahan_tanah');
        $kecamatan_tanah = $this->input->post('kecamatan_tanah');

        $query = $this->db->query("INSERT INTO kkpr_permohonan (
							type,

                            nama_pemohon,
                            alamat_pemohon,
                            rt_pemohon,
                            rw_pemohon,
                            provinsi_pemohon,
                            kota_pemohon,
                            kecamatan_pemohon,
                            kelurahan_pemohon,
                            telp_pemohon,

                            nama_perusahaan,
                            alamat_perusahaan,
                            rt_perusahaan,
                            rw_perusahaan,
                            provinsi_perusahaan,
                            kota_perusahaan,
                            kecamatan_perusahaan,
                            kelurahan_perusahaan,                            

                            peruntukan_tanah,
                            luas_tanah,
                            lokasi_tanah,
                            rt_tanah,
                            rw_tanah,
                            kota_tanah,
                            kecamatan_tanah,
                            kelurahan_tanah,                            

                            dokumen_oss,
                            fotokopi_ktp,
                            surat_kuasa,
                            akta_perusahaan,
                            siup,
                            tdp,
                            npwp,
                            surat_tanah,
                            peta_bidang,
                            teknis_pertanahan
							) 
							VALUES(
                                'default',

								'$nama_pemohon',
								'$alamat_pemohon',
								'$rt_pemohon',
								'$rw_pemohon',
								'$provinsi_pemohon',
								'$kota_pemohon',
								'$kecamatan_pemohon',
								'$kelurahan_pemohon',
								'$telp_pemohon',

                                '$nama_perusahaan',
								'$alamat_perusahaan',
								'$rt_perusahaan',
								'$rw_perusahaan',
								'$provinsi_perusahaan',
								'$kota_perusahaan',
								'$kecamatan_perusahaan',
								'$kelurahan_perusahaan',

								'$peruntukan_tanah',
								'$luas_tanah',
                                '$lokasi_tanah',
								'$rt_tanah',
								'$rw_tanah',
								'KAB Malang',
								'$kecamatan_tanah',
								'$kelurahan_tanah',

                                '$file1',
                                '$file2',
                                '$file3',
                                '$file4',
                                '$file5',
                                '$file6',
                                '$file7',
                                '$file8',
                                '$file9',
                                '$file10'                                
								
								)");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function tambah_permohonan_pemilik_lahan_meninggal()
    {
        $config['upload_path']          = './assets_dokumen/kkpr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        // $config['max_width']            = 2048;
        // $config['max_height']           = 2000;
        // $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['dokumen_oss']['name'])) {
            $this->upload->do_upload('dokumen_oss');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }

        //file2
        if (!empty($_FILES['fotokopi_ktp']['name'])) {
            $this->upload->do_upload('fotokopi_ktp');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        }
        //file3
        if (!empty($_FILES['spkkp']['name'])) {
            $this->upload->do_upload('spkkp');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        }
        //file4
        if (!empty($_FILES['fc_akta_perusahaan']['name'])) {
            $this->upload->do_upload('fc_akta_perusahaan');
            $data4 = $this->upload->data();
            $file4 = $data4['file_name'];
        }
        //file5
        if (!empty($_FILES['siup']['name'])) {
            $this->upload->do_upload('siup');
            $data5 = $this->upload->data();
            $file5 = $data5['file_name'];
        }
        //file6
        if (!empty($_FILES['tdp_nib']['name'])) {
            $this->upload->do_upload('tdp_nib');
            $data6 = $this->upload->data();
            $file6 = $data6['file_name'];
        }
        //file7
        if (!empty($_FILES['npwp']['name'])) {
            $this->upload->do_upload('npwp');
            $data7 = $this->upload->data();
            $file7 = $data7['file_name'];
        }
        //file8
        if (!empty($_FILES['surat_tanah']['name'])) {
            $this->upload->do_upload('surat_tanah');
            $data8 = $this->upload->data();
            $file8 = $data8['file_name'];
        }
        //file9
        if (!empty($_FILES['peta_bidang']['name'])) {
            $this->upload->do_upload('peta_bidang');
            $data9 = $this->upload->data();
            $file9 = $data9['file_name'];
        }
        //file10
        if (!empty($_FILES['surat_teknis_tanah']['name'])) {
            $this->upload->do_upload('surat_teknis_tanah');
            $data10 = $this->upload->data();
            $file10 = $data10['file_name'];
        }
        //TAMBAHAN
        //file11
        if (!empty($_FILES['surat_kematian']['name'])) {
            $this->upload->do_upload('surat_kematian');
            $data11 = $this->upload->data();
            $file11 = $data11['file_name'];
        }
        //file12
        if (!empty($_FILES['surat_kuasa_ahli_waris']['name'])) {
            $this->upload->do_upload('surat_kuasa_ahli_waris');
            $data12 = $this->upload->data();
            $file12 = $data12['file_name'];
        }
        $nama_pemohon = $this->input->post('nama_pemohon');
        $alamat_pemohon = $this->input->post('alamat_pemohon');
        $rt_pemohon = $this->input->post('rt_pemohon');
        $rw_pemohon = $this->input->post('rw_pemohon');
        $provinsi_pemohon = $this->input->post('provinsi_pemohon');
        $kota_pemohon = $this->input->post('kota_pemohon');
        $kecamatan_pemohon = $this->input->post('kecamatan_pemohon');
        $kelurahan_pemohon = $this->input->post('kelurahan_pemohon');
        $telp_pemohon = $this->input->post('telp_pemohon');

        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $rt_perusahaan = $this->input->post('rt_perusahaan');
        $rw_perusahaan = $this->input->post('rw_perusahaan');
        $provinsi_perusahaan = $this->input->post('provinsi_perusahaan');
        $kota_perusahaan = $this->input->post('kota_perusahaan');
        $kecamatan_perusahaan = $this->input->post('kecamatan_perusahaan');
        $kelurahan_perusahaan = $this->input->post('kelurahan_perusahaan');

        $peruntukan_tanah = $this->input->post('peruntukan_tanah');
        $luas_tanah = $this->input->post('luas_tanah');
        $lokasi_tanah = $this->input->post('lokasi_tanah');
        $rt_tanah = $this->input->post('rt_tanah');
        $rw_tanah = $this->input->post('rw_tanah');
        $kelurahan_tanah = $this->input->post('kelurahan_tanah');
        $kecamatan_tanah = $this->input->post('kecamatan_tanah');

        $query = $this->db->query("INSERT INTO kkpr_permohonan (
							type,

                            nama_pemohon,
                            alamat_pemohon,
                            rt_pemohon,
                            rw_pemohon,
                            provinsi_pemohon,
                            kota_pemohon,
                            kecamatan_pemohon,
                            kelurahan_pemohon,
                            telp_pemohon,

                            nama_perusahaan,
                            alamat_perusahaan,
                            rt_perusahaan,
                            rw_perusahaan,
                            provinsi_perusahaan,
                            kota_perusahaan,
                            kecamatan_perusahaan,
                            kelurahan_perusahaan,                            

                            peruntukan_tanah,
                            luas_tanah,
                            lokasi_tanah,
                            rt_tanah,
                            rw_tanah,
                            kota_tanah,
                            kecamatan_tanah,
                            kelurahan_tanah,                            

                            dokumen_oss,
                            fotokopi_ktp,
                            surat_kuasa,
                            akta_perusahaan,
                            siup,
                            tdp,
                            npwp,
                            surat_tanah,
                            peta_bidang,
                            teknis_pertanahan,
                            surat_kematian,
                            surat_kuasa_ahli_waris
							) 
							VALUES(
                                'pemilik_lahan_meninggal',

								'$nama_pemohon',
								'$alamat_pemohon',
								'$rt_pemohon',
								'$rw_pemohon',
								'$provinsi_pemohon',
								'$kota_pemohon',
								'$kecamatan_pemohon',
								'$kelurahan_pemohon',
								'$telp_pemohon',

                                '$nama_perusahaan',
								'$alamat_perusahaan',
								'$rt_perusahaan',
								'$rw_perusahaan',
								'$provinsi_perusahaan',
								'$kota_perusahaan',
								'$kecamatan_perusahaan',
								'$kelurahan_perusahaan',

								'$peruntukan_tanah',
								'$luas_tanah',
                                '$lokasi_tanah',
								'$rt_tanah',
								'$rw_tanah',
								'KAB Malang',
								'$kecamatan_tanah',
								'$kelurahan_tanah',

                                '$file1',
                                '$file2',
                                '$file3',
                                '$file4',
                                '$file5',
                                '$file6',
                                '$file7',
                                '$file8',
                                '$file9',
                                '$file10',                                
                                '$file11',                                
                                '$file12'                                
								
								)");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function tambah_permohonan_perumahan()
    {
        $config['upload_path']          = './assets_dokumen/kkpr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        // $config['max_width']            = 2048;
        // $config['max_height']           = 2000;
        // $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['dokumen_oss']['name'])) {
            $this->upload->do_upload('dokumen_oss');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }

        //file2
        if (!empty($_FILES['fotokopi_ktp']['name'])) {
            $this->upload->do_upload('fotokopi_ktp');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        }
        //file3
        if (!empty($_FILES['spkkp']['name'])) {
            $this->upload->do_upload('spkkp');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        }
        //file4
        if (!empty($_FILES['fc_akta_perusahaan']['name'])) {
            $this->upload->do_upload('fc_akta_perusahaan');
            $data4 = $this->upload->data();
            $file4 = $data4['file_name'];
        }
        //file5
        if (!empty($_FILES['siup']['name'])) {
            $this->upload->do_upload('siup');
            $data5 = $this->upload->data();
            $file5 = $data5['file_name'];
        }
        //file6
        if (!empty($_FILES['tdp_nib']['name'])) {
            $this->upload->do_upload('tdp_nib');
            $data6 = $this->upload->data();
            $file6 = $data6['file_name'];
        }
        //file7
        if (!empty($_FILES['npwp']['name'])) {
            $this->upload->do_upload('npwp');
            $data7 = $this->upload->data();
            $file7 = $data7['file_name'];
        }
        //file8
        if (!empty($_FILES['surat_tanah']['name'])) {
            $this->upload->do_upload('surat_tanah');
            $data8 = $this->upload->data();
            $file8 = $data8['file_name'];
        }
        //file9
        if (!empty($_FILES['peta_bidang']['name'])) {
            $this->upload->do_upload('peta_bidang');
            $data9 = $this->upload->data();
            $file9 = $data9['file_name'];
        }
        //file10
        if (!empty($_FILES['surat_teknis_tanah']['name'])) {
            $this->upload->do_upload('surat_teknis_tanah');
            $data10 = $this->upload->data();
            $file10 = $data10['file_name'];
        }
        //TAMBAHAN
        //file11
        if (!empty($_FILES['surat_tanah_tambah_dibawah_5000']['name'])) {
            $this->upload->do_upload('surat_tanah_tambah_dibawah_5000');
            $data11 = $this->upload->data();
            $file11 = $data11['file_name'];
        }
        //file12
        if (!empty($_FILES['peta_bidang_tambah_dibawah_5000']['name'])) {
            $this->upload->do_upload('peta_bidang_tambah_dibawah_5000');
            $data12 = $this->upload->data();
            $file12 = $data12['file_name'];
        }
        //file13
        if (!empty($_FILES['surat_tanah_tambah_diatas_5000']['name'])) {
            $this->upload->do_upload('surat_tanah_tambah_diatas_5000');
            $data13 = $this->upload->data();
            $file13 = $data13['file_name'];
        }
        //file14
        if (!empty($_FILES['peta_bidang_tambah_diatas_5000']['name'])) {
            $this->upload->do_upload('peta_bidang_tambah_diatas_5000');
            $data14 = $this->upload->data();
            $file14 = $data14['file_name'];
        }
        $nama_pemohon = $this->input->post('nama_pemohon');
        $alamat_pemohon = $this->input->post('alamat_pemohon');
        $rt_pemohon = $this->input->post('rt_pemohon');
        $rw_pemohon = $this->input->post('rw_pemohon');
        $provinsi_pemohon = $this->input->post('provinsi_pemohon');
        $kota_pemohon = $this->input->post('kota_pemohon');
        $kecamatan_pemohon = $this->input->post('kecamatan_pemohon');
        $kelurahan_pemohon = $this->input->post('kelurahan_pemohon');
        $telp_pemohon = $this->input->post('telp_pemohon');

        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $rt_perusahaan = $this->input->post('rt_perusahaan');
        $rw_perusahaan = $this->input->post('rw_perusahaan');
        $provinsi_perusahaan = $this->input->post('provinsi_perusahaan');
        $kota_perusahaan = $this->input->post('kota_perusahaan');
        $kecamatan_perusahaan = $this->input->post('kecamatan_perusahaan');
        $kelurahan_perusahaan = $this->input->post('kelurahan_perusahaan');

        $peruntukan_tanah = $this->input->post('peruntukan_tanah');
        $luas_tanah = $this->input->post('luas_tanah');
        $lokasi_tanah = $this->input->post('lokasi_tanah');
        $rt_tanah = $this->input->post('rt_tanah');
        $rw_tanah = $this->input->post('rw_tanah');
        $kelurahan_tanah = $this->input->post('kelurahan_tanah');
        $kecamatan_tanah = $this->input->post('kecamatan_tanah');

        $query = $this->db->query("INSERT INTO kkpr_permohonan (
							type,

                            nama_pemohon,
                            alamat_pemohon,
                            rt_pemohon,
                            rw_pemohon,
                            provinsi_pemohon,
                            kota_pemohon,
                            kecamatan_pemohon,
                            kelurahan_pemohon,
                            telp_pemohon,

                            nama_perusahaan,
                            alamat_perusahaan,
                            rt_perusahaan,
                            rw_perusahaan,
                            provinsi_perusahaan,
                            kota_perusahaan,
                            kecamatan_perusahaan,
                            kelurahan_perusahaan,                            

                            peruntukan_tanah,
                            luas_tanah,
                            lokasi_tanah,
                            rt_tanah,
                            rw_tanah,
                            kota_tanah,
                            kecamatan_tanah,
                            kelurahan_tanah,                            

                            dokumen_oss,
                            fotokopi_ktp,
                            surat_kuasa,
                            akta_perusahaan,
                            siup,
                            tdp,
                            npwp,
                            surat_tanah,
                            peta_bidang,
                            teknis_pertanahan,
                            surat_tanah_dibawah_5000,
                            peta_bidang_dibawah_5000,
                            surat_tanah_diatas_5000,
                            peta_bidang_diatas_5000
							) 
							VALUES(
                                'perumahan',

								'$nama_pemohon',
								'$alamat_pemohon',
								'$rt_pemohon',
								'$rw_pemohon',
								'$provinsi_pemohon',
								'$kota_pemohon',
								'$kecamatan_pemohon',
								'$kelurahan_pemohon',
								'$telp_pemohon',

                                '$nama_perusahaan',
								'$alamat_perusahaan',
								'$rt_perusahaan',
								'$rw_perusahaan',
								'$provinsi_perusahaan',
								'$kota_perusahaan',
								'$kecamatan_perusahaan',
								'$kelurahan_perusahaan',

								'$peruntukan_tanah',
								'$luas_tanah',
                                '$lokasi_tanah',
								'$rt_tanah',
								'$rw_tanah',
								'KAB Malang',
								'$kecamatan_tanah',
								'$kelurahan_tanah',

                                '$file1',
                                '$file2',
                                '$file3',
                                '$file4',
                                '$file5',
                                '$file6',
                                '$file7',
                                '$file8',
                                '$file9',
                                '$file10',                                
                                '$file11',                                
                                '$file12',                                
                                '$file13',                                
                                '$file14'                                
								
								)");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function tambah_permohonan_tower()
    {
        $config['upload_path']          = './assets_dokumen/kkpr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        // $config['max_width']            = 2048;
        // $config['max_height']           = 2000;
        // $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['dokumen_oss']['name'])) {
            $this->upload->do_upload('dokumen_oss');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }

        //file2
        if (!empty($_FILES['fotokopi_ktp']['name'])) {
            $this->upload->do_upload('fotokopi_ktp');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        }
        //file3
        if (!empty($_FILES['spkkp']['name'])) {
            $this->upload->do_upload('spkkp');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        }
        //file4
        if (!empty($_FILES['fc_akta_perusahaan']['name'])) {
            $this->upload->do_upload('fc_akta_perusahaan');
            $data4 = $this->upload->data();
            $file4 = $data4['file_name'];
        }
        //file5
        if (!empty($_FILES['siup']['name'])) {
            $this->upload->do_upload('siup');
            $data5 = $this->upload->data();
            $file5 = $data5['file_name'];
        }
        //file6
        if (!empty($_FILES['tdp_nib']['name'])) {
            $this->upload->do_upload('tdp_nib');
            $data6 = $this->upload->data();
            $file6 = $data6['file_name'];
        }
        //file7
        if (!empty($_FILES['npwp']['name'])) {
            $this->upload->do_upload('npwp');
            $data7 = $this->upload->data();
            $file7 = $data7['file_name'];
        }
        //file8
        if (!empty($_FILES['surat_tanah']['name'])) {
            $this->upload->do_upload('surat_tanah');
            $data8 = $this->upload->data();
            $file8 = $data8['file_name'];
        }
        //file9
        if (!empty($_FILES['peta_bidang']['name'])) {
            $this->upload->do_upload('peta_bidang');
            $data9 = $this->upload->data();
            $file9 = $data9['file_name'];
        }
        //file10
        if (!empty($_FILES['surat_teknis_tanah']['name'])) {
            $this->upload->do_upload('surat_teknis_tanah');
            $data10 = $this->upload->data();
            $file10 = $data10['file_name'];
        }
        //TAMBAHAN
        //file11
        if (!empty($_FILES['rekomendasi_dinas_komunikasi']['name'])) {
            $this->upload->do_upload('rekomendasi_dinas_komunikasi');
            $data11 = $this->upload->data();
            $file11 = $data11['file_name'];
        }
        //file12
        if (!empty($_FILES['rekomendasi_tni']['name'])) {
            $this->upload->do_upload('rekomendasi_tni');
            $data12 = $this->upload->data();
            $file12 = $data12['file_name'];
        }
        $nama_pemohon = $this->input->post('nama_pemohon');
        $alamat_pemohon = $this->input->post('alamat_pemohon');
        $rt_pemohon = $this->input->post('rt_pemohon');
        $rw_pemohon = $this->input->post('rw_pemohon');
        $provinsi_pemohon = $this->input->post('provinsi_pemohon');
        $kota_pemohon = $this->input->post('kota_pemohon');
        $kecamatan_pemohon = $this->input->post('kecamatan_pemohon');
        $kelurahan_pemohon = $this->input->post('kelurahan_pemohon');
        $telp_pemohon = $this->input->post('telp_pemohon');

        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $rt_perusahaan = $this->input->post('rt_perusahaan');
        $rw_perusahaan = $this->input->post('rw_perusahaan');
        $provinsi_perusahaan = $this->input->post('provinsi_perusahaan');
        $kota_perusahaan = $this->input->post('kota_perusahaan');
        $kecamatan_perusahaan = $this->input->post('kecamatan_perusahaan');
        $kelurahan_perusahaan = $this->input->post('kelurahan_perusahaan');

        $peruntukan_tanah = $this->input->post('peruntukan_tanah');
        $luas_tanah = $this->input->post('luas_tanah');
        $lokasi_tanah = $this->input->post('lokasi_tanah');
        $rt_tanah = $this->input->post('rt_tanah');
        $rw_tanah = $this->input->post('rw_tanah');
        $kelurahan_tanah = $this->input->post('kelurahan_tanah');
        $kecamatan_tanah = $this->input->post('kecamatan_tanah');

        $query = $this->db->query("INSERT INTO kkpr_permohonan (
							type,

                            nama_pemohon,
                            alamat_pemohon,
                            rt_pemohon,
                            rw_pemohon,
                            provinsi_pemohon,
                            kota_pemohon,
                            kecamatan_pemohon,
                            kelurahan_pemohon,
                            telp_pemohon,

                            nama_perusahaan,
                            alamat_perusahaan,
                            rt_perusahaan,
                            rw_perusahaan,
                            provinsi_perusahaan,
                            kota_perusahaan,
                            kecamatan_perusahaan,
                            kelurahan_perusahaan,                            

                            peruntukan_tanah,
                            luas_tanah,
                            lokasi_tanah,
                            rt_tanah,
                            rw_tanah,
                            kota_tanah,
                            kecamatan_tanah,
                            kelurahan_tanah,                            

                            dokumen_oss,
                            fotokopi_ktp,
                            surat_kuasa,
                            akta_perusahaan,
                            siup,
                            tdp,
                            npwp,
                            surat_tanah,
                            peta_bidang,
                            teknis_pertanahan,
                            surat_dinas_komunikasi,
                            Surat_rekom_tni
							) 
							VALUES(
                                'tower',

								'$nama_pemohon',
								'$alamat_pemohon',
								'$rt_pemohon',
								'$rw_pemohon',
								'$provinsi_pemohon',
								'$kota_pemohon',
								'$kecamatan_pemohon',
								'$kelurahan_pemohon',
								'$telp_pemohon',

                                '$nama_perusahaan',
								'$alamat_perusahaan',
								'$rt_perusahaan',
								'$rw_perusahaan',
								'$provinsi_perusahaan',
								'$kota_perusahaan',
								'$kecamatan_perusahaan',
								'$kelurahan_perusahaan',

								'$peruntukan_tanah',
								'$luas_tanah',
                                '$lokasi_tanah',
								'$rt_tanah',
								'$rw_tanah',
								'KAB Malang',
								'$kecamatan_tanah',
								'$kelurahan_tanah',

                                '$file1',
                                '$file2',
                                '$file3',
                                '$file4',
                                '$file5',
                                '$file6',
                                '$file7',
                                '$file8',
                                '$file9',
                                '$file10',                                
                                '$file11',                                
                                '$file12'                                                              
								
								)");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function tambah_permohonan_minimarket()
    {
        $config['upload_path']          = './assets_dokumen/kkpr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        // $config['max_width']            = 2048;
        // $config['max_height']           = 2000;
        // $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['dokumen_oss']['name'])) {
            $this->upload->do_upload('dokumen_oss');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }

        //file2
        if (!empty($_FILES['fotokopi_ktp']['name'])) {
            $this->upload->do_upload('fotokopi_ktp');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        }
        //file3
        if (!empty($_FILES['spkkp']['name'])) {
            $this->upload->do_upload('spkkp');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        }
        //file4
        if (!empty($_FILES['fc_akta_perusahaan']['name'])) {
            $this->upload->do_upload('fc_akta_perusahaan');
            $data4 = $this->upload->data();
            $file4 = $data4['file_name'];
        }
        //file5
        if (!empty($_FILES['siup']['name'])) {
            $this->upload->do_upload('siup');
            $data5 = $this->upload->data();
            $file5 = $data5['file_name'];
        }
        //file6
        if (!empty($_FILES['tdp_nib']['name'])) {
            $this->upload->do_upload('tdp_nib');
            $data6 = $this->upload->data();
            $file6 = $data6['file_name'];
        }
        //file7
        if (!empty($_FILES['npwp']['name'])) {
            $this->upload->do_upload('npwp');
            $data7 = $this->upload->data();
            $file7 = $data7['file_name'];
        }
        //file8
        if (!empty($_FILES['surat_tanah']['name'])) {
            $this->upload->do_upload('surat_tanah');
            $data8 = $this->upload->data();
            $file8 = $data8['file_name'];
        }
        //file9
        if (!empty($_FILES['peta_bidang']['name'])) {
            $this->upload->do_upload('peta_bidang');
            $data9 = $this->upload->data();
            $file9 = $data9['file_name'];
        }
        //file10
        if (!empty($_FILES['surat_teknis_tanah']['name'])) {
            $this->upload->do_upload('surat_teknis_tanah');
            $data10 = $this->upload->data();
            $file10 = $data10['file_name'];
        }
        //TAMBAHAN
        //file11
        if (!empty($_FILES['surat_dinas_perdagangan']['name'])) {
            $this->upload->do_upload('surat_dinas_perdagangan');
            $data11 = $this->upload->data();
            $file11 = $data11['file_name'];
        }
        $nama_pemohon = $this->input->post('nama_pemohon');
        $alamat_pemohon = $this->input->post('alamat_pemohon');
        $rt_pemohon = $this->input->post('rt_pemohon');
        $rw_pemohon = $this->input->post('rw_pemohon');
        $provinsi_pemohon = $this->input->post('provinsi_pemohon');
        $kota_pemohon = $this->input->post('kota_pemohon');
        $kecamatan_pemohon = $this->input->post('kecamatan_pemohon');
        $kelurahan_pemohon = $this->input->post('kelurahan_pemohon');
        $telp_pemohon = $this->input->post('telp_pemohon');

        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $rt_perusahaan = $this->input->post('rt_perusahaan');
        $rw_perusahaan = $this->input->post('rw_perusahaan');
        $provinsi_perusahaan = $this->input->post('provinsi_perusahaan');
        $kota_perusahaan = $this->input->post('kota_perusahaan');
        $kecamatan_perusahaan = $this->input->post('kecamatan_perusahaan');
        $kelurahan_perusahaan = $this->input->post('kelurahan_perusahaan');

        $peruntukan_tanah = $this->input->post('peruntukan_tanah');
        $luas_tanah = $this->input->post('luas_tanah');
        $lokasi_tanah = $this->input->post('lokasi_tanah');
        $rt_tanah = $this->input->post('rt_tanah');
        $rw_tanah = $this->input->post('rw_tanah');
        $kelurahan_tanah = $this->input->post('kelurahan_tanah');
        $kecamatan_tanah = $this->input->post('kecamatan_tanah');

        $query = $this->db->query("INSERT INTO kkpr_permohonan (
							type,

                            nama_pemohon,
                            alamat_pemohon,
                            rt_pemohon,
                            rw_pemohon,
                            provinsi_pemohon,
                            kota_pemohon,
                            kecamatan_pemohon,
                            kelurahan_pemohon,
                            telp_pemohon,

                            nama_perusahaan,
                            alamat_perusahaan,
                            rt_perusahaan,
                            rw_perusahaan,
                            provinsi_perusahaan,
                            kota_perusahaan,
                            kecamatan_perusahaan,
                            kelurahan_perusahaan,                            

                            peruntukan_tanah,
                            luas_tanah,
                            lokasi_tanah,
                            rt_tanah,
                            rw_tanah,
                            kota_tanah,
                            kecamatan_tanah,
                            kelurahan_tanah,                            

                            dokumen_oss,
                            fotokopi_ktp,
                            surat_kuasa,
                            akta_perusahaan,
                            siup,
                            tdp,
                            npwp,
                            surat_tanah,
                            peta_bidang,
                            teknis_pertanahan,
                            surat_dinas_perdagangan
							) 
							VALUES(
                                'minimarket',

								'$nama_pemohon',
								'$alamat_pemohon',
								'$rt_pemohon',
								'$rw_pemohon',
								'$provinsi_pemohon',
								'$kota_pemohon',
								'$kecamatan_pemohon',
								'$kelurahan_pemohon',
								'$telp_pemohon',

                                '$nama_perusahaan',
								'$alamat_perusahaan',
								'$rt_perusahaan',
								'$rw_perusahaan',
								'$provinsi_perusahaan',
								'$kota_perusahaan',
								'$kecamatan_perusahaan',
								'$kelurahan_perusahaan',

								'$peruntukan_tanah',
								'$luas_tanah',
                                '$lokasi_tanah',
								'$rt_tanah',
								'$rw_tanah',
								'KAB Malang',
								'$kecamatan_tanah',
								'$kelurahan_tanah',

                                '$file1',
                                '$file2',
                                '$file3',
                                '$file4',
                                '$file5',
                                '$file6',
                                '$file7',
                                '$file8',
                                '$file9',
                                '$file10',                                
                                '$file11'                                                                                                                            
								
								)");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function tambah_permohonan_peternakan()
    {
        $config['upload_path']          = './assets_dokumen/kkpr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        // $config['max_width']            = 2048;
        // $config['max_height']           = 2000;
        // $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['dokumen_oss']['name'])) {
            $this->upload->do_upload('dokumen_oss');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }

        //file2
        if (!empty($_FILES['fotokopi_ktp']['name'])) {
            $this->upload->do_upload('fotokopi_ktp');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        }
        //file3
        if (!empty($_FILES['spkkp']['name'])) {
            $this->upload->do_upload('spkkp');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        }
        //file4
        if (!empty($_FILES['fc_akta_perusahaan']['name'])) {
            $this->upload->do_upload('fc_akta_perusahaan');
            $data4 = $this->upload->data();
            $file4 = $data4['file_name'];
        }
        //file5
        if (!empty($_FILES['siup']['name'])) {
            $this->upload->do_upload('siup');
            $data5 = $this->upload->data();
            $file5 = $data5['file_name'];
        }
        //file6
        if (!empty($_FILES['tdp_nib']['name'])) {
            $this->upload->do_upload('tdp_nib');
            $data6 = $this->upload->data();
            $file6 = $data6['file_name'];
        }
        //file7
        if (!empty($_FILES['npwp']['name'])) {
            $this->upload->do_upload('npwp');
            $data7 = $this->upload->data();
            $file7 = $data7['file_name'];
        }
        //file8
        if (!empty($_FILES['surat_tanah']['name'])) {
            $this->upload->do_upload('surat_tanah');
            $data8 = $this->upload->data();
            $file8 = $data8['file_name'];
        }
        //file9
        if (!empty($_FILES['peta_bidang']['name'])) {
            $this->upload->do_upload('peta_bidang');
            $data9 = $this->upload->data();
            $file9 = $data9['file_name'];
        }
        //file10
        if (!empty($_FILES['surat_teknis_tanah']['name'])) {
            $this->upload->do_upload('surat_teknis_tanah');
            $data10 = $this->upload->data();
            $file10 = $data10['file_name'];
        }
        //TAMBAHAN
        //file11
        if (!empty($_FILES['surat_dinas_peternakan']['name'])) {
            $this->upload->do_upload('surat_dinas_peternakan');
            $data11 = $this->upload->data();
            $file11 = $data11['file_name'];
        }
        $nama_pemohon = $this->input->post('nama_pemohon');
        $alamat_pemohon = $this->input->post('alamat_pemohon');
        $rt_pemohon = $this->input->post('rt_pemohon');
        $rw_pemohon = $this->input->post('rw_pemohon');
        $provinsi_pemohon = $this->input->post('provinsi_pemohon');
        $kota_pemohon = $this->input->post('kota_pemohon');
        $kecamatan_pemohon = $this->input->post('kecamatan_pemohon');
        $kelurahan_pemohon = $this->input->post('kelurahan_pemohon');
        $telp_pemohon = $this->input->post('telp_pemohon');

        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $rt_perusahaan = $this->input->post('rt_perusahaan');
        $rw_perusahaan = $this->input->post('rw_perusahaan');
        $provinsi_perusahaan = $this->input->post('provinsi_perusahaan');
        $kota_perusahaan = $this->input->post('kota_perusahaan');
        $kecamatan_perusahaan = $this->input->post('kecamatan_perusahaan');
        $kelurahan_perusahaan = $this->input->post('kelurahan_perusahaan');

        $peruntukan_tanah = $this->input->post('peruntukan_tanah');
        $luas_tanah = $this->input->post('luas_tanah');
        $lokasi_tanah = $this->input->post('lokasi_tanah');
        $rt_tanah = $this->input->post('rt_tanah');
        $rw_tanah = $this->input->post('rw_tanah');
        $kelurahan_tanah = $this->input->post('kelurahan_tanah');
        $kecamatan_tanah = $this->input->post('kecamatan_tanah');

        $query = $this->db->query("INSERT INTO kkpr_permohonan (
							type,

                            nama_pemohon,
                            alamat_pemohon,
                            rt_pemohon,
                            rw_pemohon,
                            provinsi_pemohon,
                            kota_pemohon,
                            kecamatan_pemohon,
                            kelurahan_pemohon,
                            telp_pemohon,

                            nama_perusahaan,
                            alamat_perusahaan,
                            rt_perusahaan,
                            rw_perusahaan,
                            provinsi_perusahaan,
                            kota_perusahaan,
                            kecamatan_perusahaan,
                            kelurahan_perusahaan,                            

                            peruntukan_tanah,
                            luas_tanah,
                            lokasi_tanah,
                            rt_tanah,
                            rw_tanah,
                            kota_tanah,
                            kecamatan_tanah,
                            kelurahan_tanah,                            

                            dokumen_oss,
                            fotokopi_ktp,
                            surat_kuasa,
                            akta_perusahaan,
                            siup,
                            tdp,
                            npwp,
                            surat_tanah,
                            peta_bidang,
                            teknis_pertanahan,
                            surat_dinas_peternakan
							) 
							VALUES(
                                'peternakan',

								'$nama_pemohon',
								'$alamat_pemohon',
								'$rt_pemohon',
								'$rw_pemohon',
								'$provinsi_pemohon',
								'$kota_pemohon',
								'$kecamatan_pemohon',
								'$kelurahan_pemohon',
								'$telp_pemohon',

                                '$nama_perusahaan',
								'$alamat_perusahaan',
								'$rt_perusahaan',
								'$rw_perusahaan',
								'$provinsi_perusahaan',
								'$kota_perusahaan',
								'$kecamatan_perusahaan',
								'$kelurahan_perusahaan',

								'$peruntukan_tanah',
								'$luas_tanah',
                                '$lokasi_tanah',
								'$rt_tanah',
								'$rw_tanah',
								'KAB Malang',
								'$kecamatan_tanah',
								'$kelurahan_tanah',

                                '$file1',
                                '$file2',
                                '$file3',
                                '$file4',
                                '$file5',
                                '$file6',
                                '$file7',
                                '$file8',
                                '$file9',
                                '$file10',                                
                                '$file11'                                                                                                                            
								
								)");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function tambah_permohonan_spbu()
    {
        $config['upload_path']          = './assets_dokumen/kkpr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        // $config['max_width']            = 2048;
        // $config['max_height']           = 2000;
        // $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['dokumen_oss']['name'])) {
            $this->upload->do_upload('dokumen_oss');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }

        //file2
        if (!empty($_FILES['fotokopi_ktp']['name'])) {
            $this->upload->do_upload('fotokopi_ktp');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        }
        //file3
        if (!empty($_FILES['spkkp']['name'])) {
            $this->upload->do_upload('spkkp');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        }
        //file4
        if (!empty($_FILES['fc_akta_perusahaan']['name'])) {
            $this->upload->do_upload('fc_akta_perusahaan');
            $data4 = $this->upload->data();
            $file4 = $data4['file_name'];
        }
        //file5
        if (!empty($_FILES['siup']['name'])) {
            $this->upload->do_upload('siup');
            $data5 = $this->upload->data();
            $file5 = $data5['file_name'];
        }
        //file6
        if (!empty($_FILES['tdp_nib']['name'])) {
            $this->upload->do_upload('tdp_nib');
            $data6 = $this->upload->data();
            $file6 = $data6['file_name'];
        }
        //file7
        if (!empty($_FILES['npwp']['name'])) {
            $this->upload->do_upload('npwp');
            $data7 = $this->upload->data();
            $file7 = $data7['file_name'];
        }
        //file8
        if (!empty($_FILES['surat_tanah']['name'])) {
            $this->upload->do_upload('surat_tanah');
            $data8 = $this->upload->data();
            $file8 = $data8['file_name'];
        }
        //file9
        if (!empty($_FILES['peta_bidang']['name'])) {
            $this->upload->do_upload('peta_bidang');
            $data9 = $this->upload->data();
            $file9 = $data9['file_name'];
        }
        //file10
        if (!empty($_FILES['surat_teknis_tanah']['name'])) {
            $this->upload->do_upload('surat_teknis_tanah');
            $data10 = $this->upload->data();
            $file10 = $data10['file_name'];
        }
        //TAMBAHAN
        //file11
        if (!empty($_FILES['surat_pertamina']['name'])) {
            $this->upload->do_upload('surat_pertamina');
            $data11 = $this->upload->data();
            $file11 = $data11['file_name'];
        }
        $nama_pemohon = $this->input->post('nama_pemohon');
        $alamat_pemohon = $this->input->post('alamat_pemohon');
        $rt_pemohon = $this->input->post('rt_pemohon');
        $rw_pemohon = $this->input->post('rw_pemohon');
        $provinsi_pemohon = $this->input->post('provinsi_pemohon');
        $kota_pemohon = $this->input->post('kota_pemohon');
        $kecamatan_pemohon = $this->input->post('kecamatan_pemohon');
        $kelurahan_pemohon = $this->input->post('kelurahan_pemohon');
        $telp_pemohon = $this->input->post('telp_pemohon');

        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $rt_perusahaan = $this->input->post('rt_perusahaan');
        $rw_perusahaan = $this->input->post('rw_perusahaan');
        $provinsi_perusahaan = $this->input->post('provinsi_perusahaan');
        $kota_perusahaan = $this->input->post('kota_perusahaan');
        $kecamatan_perusahaan = $this->input->post('kecamatan_perusahaan');
        $kelurahan_perusahaan = $this->input->post('kelurahan_perusahaan');

        $peruntukan_tanah = $this->input->post('peruntukan_tanah');
        $luas_tanah = $this->input->post('luas_tanah');
        $lokasi_tanah = $this->input->post('lokasi_tanah');
        $rt_tanah = $this->input->post('rt_tanah');
        $rw_tanah = $this->input->post('rw_tanah');
        $kelurahan_tanah = $this->input->post('kelurahan_tanah');
        $kecamatan_tanah = $this->input->post('kecamatan_tanah');

        $query = $this->db->query("INSERT INTO kkpr_permohonan (
							type,

                            nama_pemohon,
                            alamat_pemohon,
                            rt_pemohon,
                            rw_pemohon,
                            provinsi_pemohon,
                            kota_pemohon,
                            kecamatan_pemohon,
                            kelurahan_pemohon,
                            telp_pemohon,

                            nama_perusahaan,
                            alamat_perusahaan,
                            rt_perusahaan,
                            rw_perusahaan,
                            provinsi_perusahaan,
                            kota_perusahaan,
                            kecamatan_perusahaan,
                            kelurahan_perusahaan,                            

                            peruntukan_tanah,
                            luas_tanah,
                            lokasi_tanah,
                            rt_tanah,
                            rw_tanah,
                            kota_tanah,
                            kecamatan_tanah,
                            kelurahan_tanah,                            

                            dokumen_oss,
                            fotokopi_ktp,
                            surat_kuasa,
                            akta_perusahaan,
                            siup,
                            tdp,
                            npwp,
                            surat_tanah,
                            peta_bidang,
                            teknis_pertanahan,
                            surat_pertamina
							) 
							VALUES(
                                'spbu',

								'$nama_pemohon',
								'$alamat_pemohon',
								'$rt_pemohon',
								'$rw_pemohon',
								'$provinsi_pemohon',
								'$kota_pemohon',
								'$kecamatan_pemohon',
								'$kelurahan_pemohon',
								'$telp_pemohon',

                                '$nama_perusahaan',
								'$alamat_perusahaan',
								'$rt_perusahaan',
								'$rw_perusahaan',
								'$provinsi_perusahaan',
								'$kota_perusahaan',
								'$kecamatan_perusahaan',
								'$kelurahan_perusahaan',

								'$peruntukan_tanah',
								'$luas_tanah',
                                '$lokasi_tanah',
								'$rt_tanah',
								'$rw_tanah',
								'KAB Malang',
								'$kecamatan_tanah',
								'$kelurahan_tanah',

                                '$file1',
                                '$file2',
                                '$file3',
                                '$file4',
                                '$file5',
                                '$file6',
                                '$file7',
                                '$file8',
                                '$file9',
                                '$file10',                                
                                '$file11'                                                                                                                            
								
								)");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function tambah_permohonan_tempat_ibadah()
    {
        $config['upload_path']          = './assets_dokumen/kkpr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        // $config['max_width']            = 2048;
        // $config['max_height']           = 2000;
        // $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['dokumen_oss']['name'])) {
            $this->upload->do_upload('dokumen_oss');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }

        //file2
        if (!empty($_FILES['fotokopi_ktp']['name'])) {
            $this->upload->do_upload('fotokopi_ktp');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        }
        //file3
        if (!empty($_FILES['spkkp']['name'])) {
            $this->upload->do_upload('spkkp');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        }
        //file4
        if (!empty($_FILES['fc_akta_perusahaan']['name'])) {
            $this->upload->do_upload('fc_akta_perusahaan');
            $data4 = $this->upload->data();
            $file4 = $data4['file_name'];
        }
        //file5
        if (!empty($_FILES['siup']['name'])) {
            $this->upload->do_upload('siup');
            $data5 = $this->upload->data();
            $file5 = $data5['file_name'];
        }
        //file6
        if (!empty($_FILES['tdp_nib']['name'])) {
            $this->upload->do_upload('tdp_nib');
            $data6 = $this->upload->data();
            $file6 = $data6['file_name'];
        }
        //file7
        if (!empty($_FILES['npwp']['name'])) {
            $this->upload->do_upload('npwp');
            $data7 = $this->upload->data();
            $file7 = $data7['file_name'];
        }
        //file8
        if (!empty($_FILES['surat_tanah']['name'])) {
            $this->upload->do_upload('surat_tanah');
            $data8 = $this->upload->data();
            $file8 = $data8['file_name'];
        }
        //file9
        if (!empty($_FILES['peta_bidang']['name'])) {
            $this->upload->do_upload('peta_bidang');
            $data9 = $this->upload->data();
            $file9 = $data9['file_name'];
        }
        //file10
        if (!empty($_FILES['surat_teknis_tanah']['name'])) {
            $this->upload->do_upload('surat_teknis_tanah');
            $data10 = $this->upload->data();
            $file10 = $data10['file_name'];
        }
        //TAMBAHAN
        //file11
        if (!empty($_FILES['daftar_nama_kk']['name'])) {
            $this->upload->do_upload('daftar_nama_kk');
            $data11 = $this->upload->data();
            $file11 = $data11['file_name'];
        }
        //file12
        if (!empty($_FILES['surat_fkub']['name'])) {
            $this->upload->do_upload('surat_fkub');
            $data12 = $this->upload->data();
            $file12 = $data12['file_name'];
        }
        $nama_pemohon = $this->input->post('nama_pemohon');
        $alamat_pemohon = $this->input->post('alamat_pemohon');
        $rt_pemohon = $this->input->post('rt_pemohon');
        $rw_pemohon = $this->input->post('rw_pemohon');
        $provinsi_pemohon = $this->input->post('provinsi_pemohon');
        $kota_pemohon = $this->input->post('kota_pemohon');
        $kecamatan_pemohon = $this->input->post('kecamatan_pemohon');
        $kelurahan_pemohon = $this->input->post('kelurahan_pemohon');
        $telp_pemohon = $this->input->post('telp_pemohon');

        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $rt_perusahaan = $this->input->post('rt_perusahaan');
        $rw_perusahaan = $this->input->post('rw_perusahaan');
        $provinsi_perusahaan = $this->input->post('provinsi_perusahaan');
        $kota_perusahaan = $this->input->post('kota_perusahaan');
        $kecamatan_perusahaan = $this->input->post('kecamatan_perusahaan');
        $kelurahan_perusahaan = $this->input->post('kelurahan_perusahaan');

        $peruntukan_tanah = $this->input->post('peruntukan_tanah');
        $luas_tanah = $this->input->post('luas_tanah');
        $lokasi_tanah = $this->input->post('lokasi_tanah');
        $rt_tanah = $this->input->post('rt_tanah');
        $rw_tanah = $this->input->post('rw_tanah');
        $kelurahan_tanah = $this->input->post('kelurahan_tanah');
        $kecamatan_tanah = $this->input->post('kecamatan_tanah');

        $query = $this->db->query("INSERT INTO kkpr_permohonan (
							type,

                            nama_pemohon,
                            alamat_pemohon,
                            rt_pemohon,
                            rw_pemohon,
                            provinsi_pemohon,
                            kota_pemohon,
                            kecamatan_pemohon,
                            kelurahan_pemohon,
                            telp_pemohon,

                            nama_perusahaan,
                            alamat_perusahaan,
                            rt_perusahaan,
                            rw_perusahaan,
                            provinsi_perusahaan,
                            kota_perusahaan,
                            kecamatan_perusahaan,
                            kelurahan_perusahaan,                            

                            peruntukan_tanah,
                            luas_tanah,
                            lokasi_tanah,
                            rt_tanah,
                            rw_tanah,
                            kota_tanah,
                            kecamatan_tanah,
                            kelurahan_tanah,                            

                            dokumen_oss,
                            fotokopi_ktp,
                            surat_kuasa,
                            akta_perusahaan,
                            siup,
                            tdp,
                            npwp,
                            surat_tanah,
                            peta_bidang,
                            teknis_pertanahan,
                            daftar_nama_kk,
                            surat_fkub
							) 
							VALUES(
                                'tempat_ibadah',

								'$nama_pemohon',
								'$alamat_pemohon',
								'$rt_pemohon',
								'$rw_pemohon',
								'$provinsi_pemohon',
								'$kota_pemohon',
								'$kecamatan_pemohon',
								'$kelurahan_pemohon',
								'$telp_pemohon',

                                '$nama_perusahaan',
								'$alamat_perusahaan',
								'$rt_perusahaan',
								'$rw_perusahaan',
								'$provinsi_perusahaan',
								'$kota_perusahaan',
								'$kecamatan_perusahaan',
								'$kelurahan_perusahaan',

								'$peruntukan_tanah',
								'$luas_tanah',
                                '$lokasi_tanah',
								'$rt_tanah',
								'$rw_tanah',
								'KAB Malang',
								'$kecamatan_tanah',
								'$kelurahan_tanah',

                                '$file1',
                                '$file2',
                                '$file3',
                                '$file4',
                                '$file5',
                                '$file6',
                                '$file7',
                                '$file8',
                                '$file9',
                                '$file10',                                
                                '$file11',                                                                                                                            
                                '$file12'                                                                                                                            
								
								)");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function tambah_keterangan_old()
    {
        $id = $this->input->post('id');
        $telp_pemohon = $this->input->post('telp_pemohon');
        $type = $this->input->post('type');
        $dokumen_oss = $this->input->post('dokumen_oss');
        $fotokopi_ktp = $this->input->post('fotokopi_ktp');
        $akta_perusahaan = $this->input->post('akta_perusahaan');
        $siup = $this->input->post('siup');
        $tdp = $this->input->post('tdp');
        $npwp = $this->input->post('npwp');
        $surat_tanah = $this->input->post('surat_tanah');
        $peta_bidang = $this->input->post('peta_bidang');
        $teknis_pertanahan = $this->input->post('teknis_pertanahan');

        $surat_kematian = $this->input->post('surat_kematian');
        $surat_kuasa_ahli_waris = $this->input->post('surat_kuasa_ahli_waris');

        $surat_dinas_komunikasi = $this->input->post('surat_dinas_komunikasi');
        $surat_rekom_tni = $this->input->post('surat_rekom_tni');

        $surat_dinas_perdagangan = $this->input->post('surat_dinas_perdagangan');

        $surat_dinas_peternakan = $this->input->post('surat_dinas_peternakan');

        $surat_pertamina = $this->input->post('surat_pertamina');

        $daftar_nama_kk = $this->input->post('daftar_nama_kk');
        $surat_fkub = $this->input->post('surat_fkub');

        $yn_dokumen_oss = $this->input->post('yn_dokumen_oss');
        $yn_fotokopi_ktp = $this->input->post('yn_fotokopi_ktp');
        $yn_akta_perusahaan = $this->input->post('yn_akta_perusahaan');
        $yn_siup = $this->input->post('yn_siup');
        $yn_tdp = $this->input->post('yn_tdp');
        $yn_npwp = $this->input->post('yn_npwp');
        $yn_surat_tanah = $this->input->post('yn_surat_tanah');
        $yn_peta_bidang = $this->input->post('yn_peta_bidang');
        $yn_teknis_pertanahan = $this->input->post('yn_teknis_pertanahan');

        $yn_surat_kematian = $this->input->post('yn_surat_kematian');
        $yn_surat_kuasa_ahli_waris = $this->input->post('yn_surat_kuasa_ahli_waris');

        $yn_surat_dinas_komunikasi = $this->input->post('yn_surat_dinas_komunikasi');
        $yn_surat_rekom_tni = $this->input->post('yn_surat_rekom_tni');

        $yn_surat_dinas_perdagangan = $this->input->post('yn_surat_dinas_perdagangan');

        $yn_surat_dinas_peternakan = $this->input->post('yn_surat_dinas_peternakan');

        $yn_surat_pertamina = $this->input->post('yn_surat_pertamina');

        $yn_daftar_nama_kk = $this->input->post('yn_daftar_nama_kk');
        $yn_surat_fkub = $this->input->post('yn_surat_fkub');

        $preview = $this->input->post('preview');

        $array_surat_tanah = array();
        if (!empty($surat_tanah)) {
            foreach ($surat_tanah as $input) {
                if (!empty($input)) {
                    $data = array(
                        'surat_tanah' => $input
                    );
                    $array_surat_tanah[] = $data;
                }
            }
        }
        $surat_tanah_array = json_encode($array_surat_tanah);
        $dataArray_tanah = array();
        foreach ($yn_surat_tanah as $value) {
            $data = array("surat_tanah" => $value);
            $dataArray_tanah[] = $data;
        }
        $yn_surat_tanah_array = json_encode($dataArray_tanah);
        // echo $yn_surat_tanah_array;

        $get_keterangan = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_permohonan = '$id'")->row();
        $get_yn = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_permohonan = '$id'")->row();
        if ($get_keterangan) {
            $update = "UPDATE pengembalian_kkpr_permohonan SET 
                dokumen_oss = '$dokumen_oss',
                fotokopi_ktp = '$fotokopi_ktp',
                akta_perusahaan = '$akta_perusahaan',
                siup = '$siup',
                tdp = '$tdp',
                " . ($type == 'biasa' ? "npwp='$npwp',surat_tanah='$surat_tanah_array ',peta_bidang='$peta_bidang'='$teknis_pertanahan',surat_kematian='$surat_kematian',surat_kuasa_ahli_waris='$surat_kuasa_ahli_waris'" : "") . "
                " . ($type == 'perumahan' ? "npwp='$npwp',surat_tanah='$surat_tanah_array ',peta_bidang='$peta_bidang',teknis_pertanahan='$teknis_pertanahan',surat_kematian='$surat_kematian',surat_kuasa_ahli_waris='$surat_kuasa_ahli_waris'" : "") . "
                " . ($type == 'tower' ? "npwp='$npwp',surat_tanah='$surat_tanah_array ',peta_bidang='$peta_bidang',teknis_pertanahan='$teknis_pertanahan',surat_kematian='$surat_kematian',surat_kuasa_ahli_waris='$surat_kuasa_ahli_waris',surat_dinas_komunikasi='$surat_dinas_komunikasi',surat_rekom_tni='$surat_rekom_tni'" : "") . "
                " . ($type == 'minimarket' ? "npwp='$npwp',surat_tanah='$surat_tanah_array ',peta_bidang='$peta_bidang',teknis_pertanahan='$teknis_pertanahan',surat_kematian='$surat_kematian',surat_kuasa_ahli_waris='$surat_kuasa_ahli_waris',surat_dinas_perdagangan='$surat_dinas_perdagangan'" : "") . "
                " . ($type == 'peternakan' ? "npwp='$npwp',surat_tanah='$surat_tanah_array ',peta_bidang='$peta_bidang',teknis_pertanahan='$teknis_pertanahan',surat_kematian='$surat_kematian',surat_kuasa_ahli_waris='$surat_kuasa_ahli_waris',surat_dinas_peternakan='$surat_dinas_peternakan'" : "") . "
                " . ($type == 'spbu' ? "npwp='$npwp',surat_tanah='$surat_tanah_array ',peta_bidang='$peta_bidang',teknis_pertanahan='$teknis_pertanahan',surat_kematian='$surat_kematian',surat_kuasa_ahli_waris='$surat_kuasa_ahli_waris',surat_pertamina='$surat_pertamina'" : "") . "
                " . ($type == 'tempat_ibadah' ? "npwp='$npwp',surat_tanah='$surat_tanah_array ',peta_bidang='$peta_bidang',teknis_pertanahan='$teknis_pertanahan',surat_kematian='$surat_kematian',surat_kuasa_ahli_waris='$surat_kuasa_ahli_waris',daftar_nama_kk='$daftar_nama_kk',surat_fkub='$surat_fkub'" : "") . "
                WHERE id_permohonan = '$id'
                ";
            $query = $this->db->query($update);
            $this->db->query("UPDATE kkpr_permohonan SET status_berkas = '1' WHERE id_kkpr_permohonan = '$id'");
        } else {
            $insert = "INSERT INTO pengembalian_kkpr_permohonan (
                id_permohonan,                                        
                type,    
    
                dokumen_oss,
                fotokopi_ktp,
                akta_perusahaan,
                siup,
                tdp,
                " . ($type == 'biasa' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                " . ($type == 'perumahan' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                " . ($type == 'tower' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                " . ($type == 'minimarket' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                " . ($type == 'peternakan' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_peternakan" : "") . "                                            
                " . ($type == 'spbu' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_pertamina" : "") . "                                            
                " . ($type == 'tempat_ibadah' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,daftar_nama_kk,surat_fkub" : "") . "                                            
                ) 
                VALUES(
                    '$id',            
                    '$type', 
    
                    '$dokumen_oss',
                    '$fotokopi_ktp',
                    '$akta_perusahaan',
                    '$siup',
                    '$tdp',
                    " . ($type == 'biasa' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris'" : "") . "                                                
                    " . ($type == 'perumahan' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris'" : "") . "                                                
                    " . ($type == 'tower' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris','$surat_dinas_komunikasi','$surat_rekom_tni'" : "") . "                                                
                    " . ($type == 'minimarket' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris','$surat_dinas_perdagangan'" : "") . "                                                
                    " . ($type == 'peternakan' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris','$surat_dinas_peternakan'" : "") . "                                                
                    " . ($type == 'spbu' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris','$surat_pertamina'" : "") . "                                                
                    " . ($type == 'tempat_ibadah' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris','$daftar_nama_kk','$surat_fkub'" : "") . "                                                
                    )";
            // echo $insert;
            $query = $this->db->query($insert);
            $this->db->query("UPDATE kkpr_permohonan SET status_berkas = '1' WHERE id_kkpr_permohonan = '$id'");
        }
        if ($get_yn) {
            $update = "UPDATE action_pengembalian_kkpr_permohonan SET 
                dokumen_oss = '$yn_dokumen_oss',
                fotokopi_ktp = '$yn_fotokopi_ktp',
                akta_perusahaan = '$yn_akta_perusahaan',
                siup = '$yn_siup',
                tdp = '$yn_tdp',
                " . ($type == 'biasa' ? "npwp='$yn_npwp',surat_tanah='$yn_surat_tanah_array',peta_bidang='$yn_peta_bidang',teknis_pertanahan='$yn_teknis_pertanahan',surat_kematian='$yn_surat_kematian',surat_kuasa_ahli_waris='$yn_surat_kuasa_ahli_waris'" : "") . "
                " . ($type == 'perumahan' ? "npwp='$yn_npwp',surat_tanah='$yn_surat_tanah_array',peta_bidang='$yn_peta_bidang',teknis_pertanahan='$yn_teknis_pertanahan',surat_kematian='$yn_surat_kematian',surat_kuasa_ahli_waris='$yn_surat_kuasa_ahli_waris'" : "") . "
                " . ($type == 'tower' ? "npwp='$yn_npwp',surat_tanah='$yn_surat_tanah_array',peta_bidang='$yn_peta_bidang',teknis_pertanahan='$yn_teknis_pertanahan',surat_kematian='$yn_surat_kematian',surat_kuasa_ahli_waris='$yn_surat_kuasa_ahli_waris',surat_dinas_komunikasi='$yn_surat_dinas_komunikasi',surat_rekom_tni='$yn_surat_rekom_tni'" : "") . "
                " . ($type == 'minimarket' ? "npwp='$yn_npwp',surat_tanah='$yn_surat_tanah_array',peta_bidang='$yn_peta_bidang',teknis_pertanahan='$yn_teknis_pertanahan',surat_kematian='$yn_surat_kematian',surat_kuasa_ahli_waris='$yn_surat_kuasa_ahli_waris',surat_dinas_perdagangan='$yn_surat_dinas_perdagangan'" : "") . "
                " . ($type == 'peternakan' ? "npwp='$yn_npwp',surat_tanah='$yn_surat_tanah_array',peta_bidang='$yn_peta_bidang',teknis_pertanahan='$yn_teknis_pertanahan',surat_kematian='$yn_surat_kematian',surat_kuasa_ahli_waris='$yn_surat_kuasa_ahli_waris',surat_dinas_peternakan='$yn_surat_dinas_peternakan'" : "") . "
                " . ($type == 'spbu' ? "npwp='$yn_npwp',surat_tanah='$yn_surat_tanah_array',peta_bidang='$yn_peta_bidang',teknis_pertanahan='$yn_teknis_pertanahan',surat_kematian='$yn_surat_kematian',surat_kuasa_ahli_waris='$yn_surat_kuasa_ahli_waris',surat_pertamina='$yn_surat_pertamina'" : "") . "
                " . ($type == 'tempat_ibadah' ? "npwp='$yn_npwp',surat_tanah='$yn_surat_tanah_array',peta_bidang='$yn_peta_bidang',teknis_pertanahan='$yn_teknis_pertanahan',surat_kematian='$yn_surat_kematian',surat_kuasa_ahli_waris='$yn_surat_kuasa_ahli_waris',daftar_nama_kk='$yn_daftar_nama_kk',surat_fkub='$yn_surat_fkub'" : "") . "
                WHERE id_permohonan = '$id'
                ";
            $this->db->query($update);
            // echo $update;
            $this->db->query("UPDATE kkpr_permohonan SET status_berkas = '1' WHERE id_kkpr_permohonan = '$id'");
        } else {
            $insert = "INSERT INTO action_pengembalian_kkpr_permohonan (
                id_permohonan,                                        
                type,    
    
                dokumen_oss,
                fotokopi_ktp,
                akta_perusahaan,
                siup,
                tdp,
                " . ($type == 'biasa' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                " . ($type == 'perumahan' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                " . ($type == 'tower' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                " . ($type == 'minimarket' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                " . ($type == 'peternakan' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_peternakan" : "") . "                                            
                " . ($type == 'spbu' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_pertamina" : "") . "                                            
                " . ($type == 'tempat_ibadah' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,daftar_nama_kk,surat_fkub" : "") . "                                            
                ) 
                VALUES(
                    '$id',            
                    '$type', 
    
                    '$yn_dokumen_oss',
                    '$yn_fotokopi_ktp',
                    '$yn_akta_perusahaan',
                    '$yn_siup',
                    '$yn_tdp',
                    " . ($type == 'biasa' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris'" : "") . "                                                
                    " . ($type == 'perumahan' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris'" : "") . "                                                
                    " . ($type == 'tower' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris','$yn_surat_dinas_komunikasi','$yn_surat_rekom_tni'" : "") . "                                                
                    " . ($type == 'minimarket' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris','$yn_surat_dinas_perdagangan'" : "") . "                                                
                    " . ($type == 'peternakan' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris','$yn_surat_dinas_peternakan'" : "") . "                                                
                    " . ($type == 'spbu' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris','$yn_surat_pertamina'" : "") . "                                                
                    " . ($type == 'tempat_ibadah' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris','$yn_daftar_nama_kk','$yn_surat_fkub'" : "") . "                                                
                    )";
            // echo $insert;
            $this->db->query($insert);
            $this->db->query("UPDATE kkpr_permohonan SET status_berkas = '1' WHERE id_kkpr_permohonan = '$id'");
        }
        $validasi = $this->db->query("SELECT * FROM validasi_formulir WHERE id_permohonan = '$id'")->row();
        $id_user = $this->session->userdata('id_user');
        if ($validasi) {
            $this->db->query("UPDATE validasi_formulir SET tolak_formulir = '$id_user' WHERE id_permohonan = '$id' ");
        } else {
            $this->db->query("INSERT INTO validasi_formulir (id_permohonan,tolak_formulir) VALUES ('$id','$id_user')");
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $telp_pemohon,
                'message' => $preview,
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 5@6!I4e2eSKYewSZSFhD' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function tambah_keterangan()
    {
        $id = $this->input->post('id');
        $telp_pemohon = $this->input->post('telp_pemohon');
        $type = $this->input->post('type');
        $dokumen_oss = $this->input->post('dokumen_oss');
        $fotokopi_ktp = $this->input->post('fotokopi_ktp');
        $akta_perusahaan = $this->input->post('akta_perusahaan');
        $siup = $this->input->post('siup');
        $tdp = $this->input->post('tdp');
        $npwp = $this->input->post('npwp');
        $surat_tanah = $this->input->post('surat_tanah');
        $peta_bidang = $this->input->post('peta_bidang');
        $shp = $this->input->post('shp');
        $teknis_pertanahan = $this->input->post('teknis_pertanahan');

        $surat_kematian = $this->input->post('surat_kematian');
        $surat_kuasa_ahli_waris = $this->input->post('surat_kuasa_ahli_waris');

        $surat_dinas_komunikasi = $this->input->post('surat_dinas_komunikasi');
        $surat_rekom_tni = $this->input->post('surat_rekom_tni');

        $surat_dinas_perdagangan = $this->input->post('surat_dinas_perdagangan');

        $surat_dinas_peternakan = $this->input->post('surat_dinas_peternakan');

        $surat_pertamina = $this->input->post('surat_pertamina');

        $daftar_nama_kk = $this->input->post('daftar_nama_kk');
        $surat_fkub = $this->input->post('surat_fkub');

        $file_dokumen_oss = $this->input->post('file_dokumen_oss');
        $file_fotokopi_ktp = $this->input->post('file_fotokopi_ktp');
        $file_akta_perusahaan = $this->input->post('file_fotokopi_akta_perusahaan');
        $file_siup = $this->input->post('file_siup');
        $file_tdp = $this->input->post('file_nib');
        $file_npwp = $this->input->post('file_npwp');
        $file_surat_tanah = $this->input->post('file_surat_tanah');
        $file_peta_bidang_surat_tanah = $this->input->post('file_peta_bidang_surat_tanah');
        $file_peta_bidang = $this->input->post('file_peta_bidang');
        $file_shp = $this->input->post('file_shp');
        $file_teknis_pertanahan = $this->input->post('file_teknis_pertanahan');

        $file_surat_kematian = $this->input->post('file_surat_kematian');
        $file_surat_kuasa_ahli_waris = $this->input->post('file_surat_kuasa');

        $file_surat_dinas_komunikasi = $this->input->post('file_surat_dinas_komunikasi');
        $file_surat_rekom_tni = $this->input->post('file_surat_rekom_tni');

        $file_surat_dinas_perdagangan = $this->input->post('file_surat_dinas_perdagangan');

        $file_surat_dinas_peternakan = $this->input->post('file_surat_dinas_peternakan');

        $file_surat_pertamina = $this->input->post('file_surat_pertamina');

        $file_daftar_nama_kk = $this->input->post('file_daftar_nama_kk');
        $file_surat_fkub = $this->input->post('file_surat_fkub');

        $yn_dokumen_oss = $this->input->post('yn_dokumen_oss');
        $yn_fotokopi_ktp = $this->input->post('yn_fotokopi_ktp');
        $yn_akta_perusahaan = $this->input->post('yn_akta_perusahaan');
        $yn_siup = $this->input->post('yn_siup');
        $yn_tdp = $this->input->post('yn_tdp');
        $yn_npwp = $this->input->post('yn_npwp');
        $yn_surat_tanah = $this->input->post('yn_surat_tanah');
        $yn_peta_bidang = $this->input->post('yn_peta_bidang');
        $yn_shp = $this->input->post('yn_shp');
        $yn_teknis_pertanahan = $this->input->post('yn_teknis_pertanahan');

        $yn_surat_kematian = $this->input->post('yn_surat_kematian');
        $yn_surat_kuasa_ahli_waris = $this->input->post('yn_surat_kuasa_ahli_waris');

        $yn_surat_dinas_komunikasi = $this->input->post('yn_surat_dinas_komunikasi');
        $yn_surat_rekom_tni = $this->input->post('yn_surat_rekom_tni');

        $yn_surat_dinas_perdagangan = $this->input->post('yn_surat_dinas_perdagangan');

        $yn_surat_dinas_peternakan = $this->input->post('yn_surat_dinas_peternakan');

        $yn_surat_pertamina = $this->input->post('yn_surat_pertamina');

        $yn_daftar_nama_kk = $this->input->post('yn_daftar_nama_kk');
        $yn_surat_fkub = $this->input->post('yn_surat_fkub');

        $preview = $this->input->post('preview');

        $kkpr = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id'")->row();

        $array_surat_tanah = array();
        // $data_surat_tanah = json_decode();
        // $jumlah_data = count($data_surat_tanah);

        // for ($i = 0; $i < $jumlah_data; $i++) {
        //     $data = array(
        //         'surat_tanah' => isset($data_surat_tanah[$i]['surat_tanah']) ? $data_surat_tanah[$i]['surat_tanah'] : null
        //     );
        //     $array_surat_tanah[] = $data;
        // }

        // $surat_tanah_array = json_encode($array_surat_tanah);

        if (!empty($surat_tanah)) {
            foreach ($surat_tanah as $input) {
                // if (!empty($input)) {
                    $data = array(
                        'surat_tanah' => $input
                    );
                    $array_surat_tanah[] = $data;
                // }
            }
        }
        $surat_tanah_array = json_encode($array_surat_tanah);

        $array_file_surat_tanah = array();
        if (!empty($file_surat_tanah)) {
            foreach ($file_surat_tanah as $input) {
                if (!empty($input)) {
                    $data = array(
                        'surat_tanah' => $input
                    );
                    $array_file_surat_tanah[] = $data;
                }
            }
        }
        $file_surat_tanah_array = json_encode($array_file_surat_tanah);

        $array_file_peta_bidang_surat_tanah = array();
        if (!empty($file_peta_bidang_surat_tanah)) {
            foreach ($file_peta_bidang_surat_tanah as $input) {
                if (!empty($input)) {
                    $data = array(
                        'surat_tanah' => $input
                    );
                    $array_file_peta_bidang_surat_tanah[] = $data;
                }
            }
        }
        $file_peta_bidang_surat_tanah_array = json_encode($array_file_peta_bidang_surat_tanah);

        $dataArray_tanah = array();
        foreach ($yn_surat_tanah as $value) {
            $data = array("surat_tanah" => $value);
            $dataArray_tanah[] = $data;
        }
        $yn_surat_tanah_array = json_encode($dataArray_tanah);
        // echo $yn_surat_tanah_array;

        $get_keterangan = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_permohonan = '$id'")->row();
        $get_yn = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_permohonan = '$id'")->row();
        $unikAngka = mt_rand(1000, 9999);
        $date = date('y-m-d');
            $insert_pengembalian = "INSERT INTO pengembalian_kkpr_permohonan (
                id_permohonan,                                        
                type,    
                id_file,
    
                dokumen_oss,
                fotokopi_ktp,
                akta_perusahaan,
                siup,
                tdp,
                shp,
                " . ($type == 'biasa' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                " . ($type == 'pergudangan' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                " . ($type == 'perumahan' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                " . ($type == 'tower' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                " . ($type == 'minimarket' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                " . ($type == 'peternakan' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_peternakan" : "") . "                                            
                " . ($type == 'spbu' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_pertamina" : "") . "                                            
                " . ($type == 'tempat_ibadah' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,daftar_nama_kk,surat_fkub" : "") . "                                            
                ) 
                VALUES(
                    '$id',            
                    '$type', 
                    '$unikAngka', 
    
                    '$dokumen_oss',
                    '$fotokopi_ktp',
                    '$akta_perusahaan',
                    '$siup',
                    '$tdp',
                    '$shp',
                    " . ($type == 'biasa' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris'" : "") . "                                                
                    " . ($type == 'pergudangan' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris'" : "") . "                                                
                    " . ($type == 'perumahan' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris'" : "") . "                                                
                    " . ($type == 'tower' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris','$surat_dinas_komunikasi','$surat_rekom_tni'" : "") . "                                                
                    " . ($type == 'minimarket' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris','$surat_dinas_perdagangan'" : "") . "                                                
                    " . ($type == 'peternakan' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris','$surat_dinas_peternakan'" : "") . "                                                
                    " . ($type == 'spbu' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris','$surat_pertamina'" : "") . "                                                
                    " . ($type == 'tempat_ibadah' ? "'$npwp','$surat_tanah_array ','$peta_bidang','$teknis_pertanahan','$surat_kematian','$surat_kuasa_ahli_waris','$daftar_nama_kk','$surat_fkub'" : "") . "                                                
                    )";
            // echo $insert_pengembalian;
            $query1 = $this->db->query($insert_pengembalian);
            // $this->db->query("UPDATE kkpr_permohonan SET status_berkas = '1' WHERE id_kkpr_permohonan = '$id'");

            $insert_file_pengembalian = "INSERT INTO file_pengembalian_kkpr_permohonan (
                id_pengembalian,
                id_permohonan,                                        
                type,    
    
                dokumen_oss,
                fotokopi_ktp,
                akta_perusahaan,
                siup,
                tdp,
                shp,
                " . ($type == 'biasa' ? "npwp,surat_tanah,peta_bidang_surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                " . ($type == 'pergudangan' ? "npwp,surat_tanah,peta_bidang_surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                " . ($type == 'perumahan' ? "npwp,surat_tanah,peta_bidang_surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                " . ($type == 'tower' ? "npwp,surat_tanah,peta_bidang_surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                " . ($type == 'minimarket' ? "npwp,surat_tanah,peta_bidang_surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                " . ($type == 'peternakan' ? "npwp,surat_tanah,peta_bidang_surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_peternakan" : "") . "                                            
                " . ($type == 'spbu' ? "npwp,surat_tanah,peta_bidang_surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_pertamina" : "") . "                                            
                " . ($type == 'tempat_ibadah' ? "npwp,surat_tanah,peta_bidang_surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,daftar_nama_kk,surat_fkub" : "") . "                                            
                ) 
                VALUES(
                    '$unikAngka',            
                    '$id',            
                    '$type', 
    
                    '$file_dokumen_oss',
                    '$file_fotokopi_ktp',
                    '$file_akta_perusahaan',
                    '$file_siup',
                    '$file_tdp',
                    '$file_shp',
                    " . ($type == 'biasa' ? "'$file_npwp','$file_surat_tanah_array ','$file_peta_bidang_surat_tanah_array','$file_peta_bidang','$file_teknis_pertanahan','$file_surat_kematian','$file_surat_kuasa_ahli_waris'" : "") . "                                                
                    " . ($type == 'pergudangan' ? "'$file_npwp','$file_surat_tanah_array ','$file_peta_bidang_surat_tanah_array','$file_peta_bidang','$file_teknis_pertanahan','$file_surat_kematian','$file_surat_kuasa_ahli_waris'" : "") . "                                                
                    " . ($type == 'perumahan' ? "'$file_npwp','$file_surat_tanah_array ','$file_peta_bidang_surat_tanah_array','$file_peta_bidang','$file_teknis_pertanahan','$file_surat_kematian','$file_surat_kuasa_ahli_waris'" : "") . "                                                
                    " . ($type == 'tower' ? "'$file_npwp','$file_surat_tanah_array ','$file_peta_bidang_surat_tanah_array','$file_peta_bidang','$file_teknis_pertanahan','$file_surat_kematian','$file_surat_kuasa_ahli_waris','$file_surat_dinas_komunikasi','$file_surat_rekom_tni'" : "") . "                                                
                    " . ($type == 'minimarket' ? "'$file_npwp','$file_surat_tanah_array ','$file_peta_bidang_surat_tanah_array','$file_peta_bidang','$file_teknis_pertanahan','$file_surat_kematian','$file_surat_kuasa_ahli_waris','$file_surat_dinas_perdagangan'" : "") . "                                                
                    " . ($type == 'peternakan' ? "'$file_npwp','$file_surat_tanah_array ','$file_peta_bidang_surat_tanah_array','$file_peta_bidang','$file_teknis_pertanahan','$file_surat_kematian','$file_surat_kuasa_ahli_waris','$file_surat_dinas_peternakan'" : "") . "                                                
                    " . ($type == 'spbu' ? "'$file_npwp','$file_surat_tanah_array ','$file_peta_bidang_surat_tanah_array','$file_peta_bidang','$file_teknis_pertanahan','$file_surat_kematian','$file_surat_kuasa_ahli_waris','$file_surat_pertamina'" : "") . "                                                
                    " . ($type == 'tempat_ibadah' ? "'$file_npwp','$file_surat_tanah_array ','$file_peta_bidang_surat_tanah_array','$file_peta_bidang','$file_teknis_pertanahan','$file_surat_kematian','$file_surat_kuasa_ahli_waris','$file_daftar_nama_kk','$file_surat_fkub'" : "") . "                                                
                    )";
            // echo $insert_file_pengembalian;
            $query2 = $this->db->query($insert_file_pengembalian);

            $insert_yn = "INSERT INTO action_pengembalian_kkpr_permohonan (
                id_permohonan,                                        
                type,   
                id_file, 
    
                dokumen_oss,
                fotokopi_ktp,
                akta_perusahaan,
                siup,
                tdp,
                shp,
                " . ($type == 'biasa' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                " . ($type == 'pergudangan' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                " . ($type == 'perumahan' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris" : "") . "                                            
                " . ($type == 'tower' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_komunikasi,surat_rekom_tni" : "") . "                                            
                " . ($type == 'minimarket' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_perdagangan" : "") . "                                            
                " . ($type == 'peternakan' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_dinas_peternakan" : "") . "                                            
                " . ($type == 'spbu' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,surat_pertamina" : "") . "                                            
                " . ($type == 'tempat_ibadah' ? "npwp,surat_tanah,peta_bidang,teknis_pertanahan,surat_kematian,surat_kuasa_ahli_waris,daftar_nama_kk,surat_fkub" : "") . "                                            
                ) 
                VALUES(
                    '$id',            
                    '$type', 
                    '$unikAngka', 
    
                    '$yn_dokumen_oss',
                    '$yn_fotokopi_ktp',
                    '$yn_akta_perusahaan',
                    '$yn_siup',
                    '$yn_tdp',
                    '$yn_shp',
                    " . ($type == 'biasa' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris'" : "") . "                                                
                    " . ($type == 'pergudangan' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris'" : "") . "                                                
                    " . ($type == 'perumahan' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris'" : "") . "                                                
                    " . ($type == 'tower' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris','$yn_surat_dinas_komunikasi','$yn_surat_rekom_tni'" : "") . "                                                
                    " . ($type == 'minimarket' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris','$yn_surat_dinas_perdagangan'" : "") . "                                                
                    " . ($type == 'peternakan' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris','$yn_surat_dinas_peternakan'" : "") . "                                                
                    " . ($type == 'spbu' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris','$yn_surat_pertamina'" : "") . "                                                
                    " . ($type == 'tempat_ibadah' ? "'$yn_npwp','$yn_surat_tanah_array','$yn_peta_bidang','$yn_teknis_pertanahan','$yn_surat_kematian','$yn_surat_kuasa_ahli_waris','$yn_daftar_nama_kk','$yn_surat_fkub'" : "") . "                                                
                    )";
            // echo $insert_yn;
            $this->db->query($insert_yn);
            $this->db->query("UPDATE kkpr_permohonan SET status_berkas = '1',tgl_tolak = '$date' WHERE id_kkpr_permohonan = '$id'");  
            
            $admin = $this->session->userdata('id_user');
            $waktu = date('Y-m-d H:i:s');
            $this->db->query("INSERT INTO log_admin (type,id_user,id_permohonan,keterangan,waktu) VALUES('insert dan update','$admin','$id','Tambah Keterangan dan tolak berkas di halaman admin permohonan','$waktu')");

        $validasi = $this->db->query("SELECT * FROM validasi_formulir WHERE id_permohonan = '$id'")->row();
        $id_user = $this->session->userdata('id_user');
        if ($validasi) {
            $this->db->query("UPDATE validasi_formulir SET tolak_formulir = '$id_user' WHERE id_permohonan = '$id' ");
        } else {
            $this->db->query("INSERT INTO validasi_formulir (id_permohonan,tolak_formulir) VALUES ('$id','$id_user')");
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $telp_pemohon,
                'message' => $preview,
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 5@6!I4e2eSKYewSZSFhD' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        if ($query1) {
            return true;
        } else {
            return false;
        }
    }
    public function terima_berkas($id)
    {
        $query = $this->db->query("UPDATE kkpr_permohonan SET status_berkas = '2' WHERE id_kkpr_permohonan = '$id'");
        $admin = $this->session->userdata('id_user');
        $waktu = date('Y-m-d H:i:s');
        $this->db->query("INSERT INTO log_admin (type,id_user,id_permohonan,keterangan,waktu) VALUES('insert dan update','$admin','$id','Terima berkas di halaman admin permohonan','$waktu')");
        $data = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id'")->row();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $data->telp_pemohon,
                'message' => 'Berkas Anda telah di terima oleh Petugas',
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 5@6!I4e2eSKYewSZSFhD' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function config_peta()
    {
        $id_permohonan = $this->input->post('id_permohonan');
        $status_tanah = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id_permohonan'")->row();
        $cek_data = $this->db->query("SELECT * FROM data_sertifikat_peta WHERE id_permohonan = '$id_permohonan'")->row();
        $config['upload_path']          = './assets_dokumen/kkpr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['peta']['name'])) {
            $this->upload->do_upload('peta');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        } else {
            $file1 = $cek_data->gambar_peta;
        }

        $nomor = $this->input->post('nomor');
        $nama_pemohon = $this->input->post('nama_pemohon');
        $alamat_pemohon = $this->input->post('alamat_pemohon');
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $nib_skala_usaha = $this->input->post('nib_skala_usaha');
        $kbli_tingkat_resiko = $this->input->post('kbli_tingkat_resiko');
        $peruntukan = $this->input->post('peruntukan');
        $lokasi = $this->input->post('lokasi');
        $luas_tanah = $this->input->post('luas_tanah');
        // $status_tanah = $this->input->post('status_tanah');        
        $legenda = $this->input->post('legenda');
        $koordinat = $this->input->post('koordinat');
        // $koordinat_a = $this->input->post('koordinat_a');
        // $koordinat_b = $this->input->post('koordinat_b');
        // $koordinat_c = $this->input->post('koordinat_c');
        // $koordinat_d = $this->input->post('koordinat_d');
        $ketentuan = $this->input->post('ketentuan');
        $lainya = $this->input->post('lainya');
        $pemanfaatan_ruang = $this->input->post('pemanfaatan_ruang');
        $luas_tanah_disetujui = $this->input->post('luas_tanah_disetujui');
        // $pola_ruang = $this->input->post('pola_ruang');
        $luas_tanah_lsd = $this->input->post('luas_tanah_lsd');
        $luas_tanah_kp2b = $this->input->post('luas_tanah_kp2b');
        $koefisien_bangunan = $this->input->post('koefisien_bangunan');
        $koefisien_dasar_hijau = $this->input->post('koefisien_dasar_hijau');
        // $gsp_gsb = $this->input->post('gsp_gsb');
        $koefisien_lantai = $this->input->post('koefisien_lantai');
        $flexsible_zoning = $this->input->post('flexsible_zoning');
        $perda_rtr1 = $this->input->post('perda_rtr1');
        $perda_rtr2 = $this->input->post('perda_rtr2');
        $perda_rtr3 = $this->input->post('perda_rtr3');
        $masuk_lsd = $this->input->post('masuk_lsd');
        $masuk_kp2b = $this->input->post('masuk_kp2b');
        $diijinkan_sebagian = $this->input->post('diijinkan_sebagian');
        $blok_kepanjen = $this->input->post('blok_kepanjen');
        $zona_kepanjen1 = $this->input->post('zona_kepanjen1');
        $zona_kepanjen2 = $this->input->post('zona_kepanjen2');
        $zona_kepanjen3 = $this->input->post('zona_kepanjen3');
        $indikasi_ppr = $this->input->post('indikasi_ppr');
        $fungsi_jalan1 = $this->input->post('fungsi_jalan1');
        $fungsi_jalan2 = $this->input->post('fungsi_jalan2');
        $fungsi_jalan3 = $this->input->post('fungsi_jalan3');
        $fungsi_jalan4 = $this->input->post('fungsi_jalan4');
        $kelas_jalan1 = $this->input->post('kelas_jalan1');
        $kelas_jalan2 = $this->input->post('kelas_jalan2');
        $kelas_jalan3 = $this->input->post('kelas_jalan3');
        $kelas_jalan4 = $this->input->post('kelas_jalan4');

        // $titik_koordinat = '[{"koordinat_a":"' . $koordinat_a . '","koordinat_b":"' . $koordinat_b . '","koordinat_c":"' . $koordinat_c . '","koordinat_d":"' . $koordinat_d . '"}]';
        $legenda_array = array();
        if (!empty($legenda)) {
            foreach ($legenda as $input) {
                if (!empty($input)) {
                    $data = array(
                        'legenda' => $input
                    );
                    $legenda_array[] = $data;
                }
            }
        }
        $hasil_legenda = json_encode($legenda_array);

        $ketentuan_array = array();
        if (!empty($ketentuan)) {
            foreach ($ketentuan as $input) {
                if (!empty($input)) {
                    $data = array(
                        'ketentuan' => $input
                    );
                    $ketentuan_array[] = $data;
                }
            }
        }
        $hasil_ketentuan = json_encode($ketentuan_array);

        $kbli_array = array();
        if (!empty($kbli_tingkat_resiko)) {
            foreach ($kbli_tingkat_resiko as $input) {
                if (!empty($input)) {
                    $data = array(
                        'kbli' => $input
                    );
                    $kbli_array[] = $data;
                }
            }
        }
        $hasil_kbli = json_encode($kbli_array);
        
        $koordinat_array = array();
        if (!empty($koordinat)) {
            foreach ($koordinat as $input) {
                if (!empty($input)) {
                    $data = array(
                        'koordinat' => $input
                    );
                    $koordinat_array[] = $data;
                }
            }
        }
        $titik_koordinat= json_encode($koordinat_array);

        if ($cek_data) {
            $query = "UPDATE data_sertifikat_peta SET
                id_permohonan='$id_permohonan',
                nomor='$nomor',
                nama_pemohon='$nama_pemohon',
                alamat_pemohon='$alamat_pemohon',
                nama_perusahaan='$nama_perusahaan',
                alamat_perusahaan='$alamat_perusahaan',
                nib_skala_usaha='$nib_skala_usaha',
                kbli_tingkat_resiko='$hasil_kbli',
                peruntukan='$peruntukan',
                lokasi='$lokasi',
                luas_tanah='$luas_tanah',
                status_tanah='$status_tanah->status_tanah',
                gambar_peta='$file1',
                legenda='$hasil_legenda',
                titik_koordinat='$titik_koordinat',
                ketentuan_lainya='$hasil_ketentuan',
                lainya_ketentuan='$lainya',
                pemanfaatan_ruang='$pemanfaatan_ruang',
                luas_disetujui='$luas_tanah_disetujui',
                luas_tanah_lsd='$luas_tanah_lsd',
                luas_tanah_kp2b='$luas_tanah_kp2b',
                koefisien_bangunan='$koefisien_bangunan',
                koefisien_dasar_hijau='$koefisien_dasar_hijau',
                lantai_bangunan='$koefisien_lantai',
                flexsible_zoning='$flexsible_zoning',
                perda_rtr1='$perda_rtr1',
                perda_rtr2='$perda_rtr2',
                perda_rtr3='$perda_rtr3',
                masuk_lsd='$masuk_lsd',
                masuk_kp2b='$masuk_kp2b',
                diijinkan_sebagian='$diijinkan_sebagian',
                blok_kepanjen='$blok_kepanjen',
                zona_kepanjen1='$zona_kepanjen1',
                zona_kepanjen2='$zona_kepanjen2',
                zona_kepanjen3='$zona_kepanjen3',
                indikasi_ppr='$indikasi_ppr',
                fungsi_jalan1='$fungsi_jalan1',
                fungsi_jalan2='$fungsi_jalan2',
                fungsi_jalan3='$fungsi_jalan3',
                fungsi_jalan4='$fungsi_jalan4',
                kelas_jalan1='$kelas_jalan1',
                kelas_jalan2='$kelas_jalan2',
                kelas_jalan3='$kelas_jalan3',
                kelas_jalan4='$kelas_jalan4'
            WHERE
            id_permohonan = '$id_permohonan'
            ";
        } else {

            $query = "INSERT INTO data_sertifikat_peta (
            id_permohonan,
            nomor,
            nama_pemohon,
            alamat_pemohon,
            nama_perusahaan,
            alamat_perusahaan,
            nib_skala_usaha,
            kbli_tingkat_resiko,
            peruntukan,
            lokasi,
            luas_tanah,
            status_tanah,
            gambar_peta,
            legenda,
            titik_koordinat,
            ketentuan_lainya,
            lainya_ketentuan,
            pemanfaatan_ruang,
            luas_disetujui,
            luas_tanah_lsd,
            luas_tanah_kp2b,
            koefisien_bangunan,
            koefisien_dasar_hijau,
            lantai_bangunan,
            flexsible_zoning,
            perda_rtr1,
            perda_rtr2,
            perda_rtr3,
            masuk_lsd,
            masuk_kp2b,
            diijinkan_sebagian,
            blok_kepanjen,
            zona_kepanjen1,
            zona_kepanjen2,
            zona_kepanjen3,
            indikasi_ppr,
            fungsi_jalan1,
            fungsi_jalan2,
            fungsi_jalan3,
            fungsi_jalan4,
            kelas_jalan1,
            kelas_jalan2,
            kelas_jalan3,
            kelas_jalan4
        )VALUES(
            '$id_permohonan',
            '$nomor',
            '$nama_pemohon',
            '$alamat_pemohon',
            '$nama_perusahaan',
            '$alamat_perusahaan',
            '$nib_skala_usaha',
            '$hasil_kbli',
            '$peruntukan',
            '$lokasi',
            '$luas_tanah',
            '$status_tanah->status_tanah',
            '$file1',
            '$hasil_legenda',
            '$titik_koordinat',
            '$hasil_ketentuan',
            '$lainya',
            '$pemanfaatan_ruang',
            '$luas_tanah_disetujui',
            '$luas_tanah_lsd',
            '$luas_tanah_kp2b',
            '$koefisien_bangunan',
            '$koefisien_dasar_hijau',
            '$koefisien_lantai',
            '$flexsible_zoning',
            '$perda_rtr1',
            '$perda_rtr2',
            '$perda_rtr3',
            '$masuk_lsd',
            '$masuk_kp2b',
            '$diijinkan_sebagian',
            '$blok_kepanjen',
            '$zona_kepanjen1',
            '$zona_kepanjen2',
            '$zona_kepanjen3',
            '$indikasi_ppr',
            '$fungsi_jalan1',
            '$fungsi_jalan2',
            '$fungsi_jalan3',
            '$fungsi_jalan4',
            '$kelas_jalan1',
            '$kelas_jalan2',
            '$kelas_jalan3',
            '$kelas_jalan4'
        )";
        }

        $admin = $this->session->userdata('id_user');
            $waktu = date('Y-m-d H:i:s');
            $this->db->query("INSERT INTO log_admin (type,id_user,id_permohonan,keterangan,waktu) VALUES('insert atau update','$admin','$id_permohonan','Tambah atau Update pada config peta','$waktu')");
        // echo $query;
        $query1 = $this->db->query($query);
        if ($query1) {
            return true;
        } else {
            return false;
        }
    }
    public function config_draft_peta()
    {
        $id_permohonan = $this->input->post('id_permohonan');
        $cek_data = $this->db->query("SELECT * FROM data_sertifikat_draft_peta WHERE id_permohonan = '$id_permohonan'")->row();
        $config['upload_path']          = './assets_dokumen/kkpr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['citra_satelit']['name'])) {
            $this->upload->do_upload('citra_satelit');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        } else {
            $file1 = $cek_data->citra_satelit;
        }
        //file2
        if (!empty($_FILES['pola_ruang']['name'])) {
            $this->upload->do_upload('pola_ruang');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        } else {
            $file2 = $cek_data->pola_ruang;
        }
        //file3
        if (!empty($_FILES['peta_situasi']['name'])) {
            $this->upload->do_upload('peta_situasi');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        } else {
            $file3 = $cek_data->peta_situasi;
        }
        //file4
        if (!empty($_FILES['peta_lsd']['name'])) {
            $this->upload->do_upload('peta_lsd');
            $data4 = $this->upload->data();
            $file4 = $data4['file_name'];
        } else {
            $file4 = $cek_data->peta_lsd;
        }

        $nama_pemohon = $this->input->post('nama_pemohon');
        $alamat_pemohon = $this->input->post('alamat_pemohon');
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $peruntukan = $this->input->post('peruntukan');
        $lokasi = $this->input->post('lokasi');
        $luas_tanah = $this->input->post('luas_tanah');
        $skala_usaha = $this->input->post('skala_usaha');
        $klasifikasi_resiko = $this->input->post('klasifikasi_resiko');
        $koordinat_tengah = $this->input->post('koordinat_tengah');

        $legenda_pola_ruang = $this->input->post('legenda_pola_ruang');
        // $legenda_peta_situasi = $this->input->post('legenda_peta_situasi');
        // $legenda_peta_lsd = $this->input->post('legenda_lsd');

        $legenda_pola_ruang_array = array();
        if (!empty($legenda_pola_ruang)) {
            foreach ($legenda_pola_ruang as $input) {
                if (!empty($input)) {
                    $data = array(
                        'legenda' => $input
                    );
                    $legenda_pola_ruang_array[] = $data;
                }
            }
        }
        $hasil_legenda_pola_ruang = json_encode($legenda_pola_ruang_array);
        // $legenda_peta_situasi_array = array();
        // if (!empty($legenda_peta_situasi)) {
        //     foreach ($legenda_peta_situasi as $input) {
        //         if (!empty($input)) {
        //             $data = array(
        //                 'legenda' => $input
        //             );
        //             $legenda_peta_situasi_array[] = $data;
        //         }
        //     }
        // }
        // $hasil_legenda_peta_situasi = json_encode($legenda_peta_situasi_array);
        // $legenda_peta_lsd_array = array();
        // if (!empty($legenda_peta_lsd)) {
        //     foreach ($legenda_peta_lsd as $input) {
        //         if (!empty($input)) {
        //             $data = array(
        //                 'legenda' => $input
        //             );
        //             $legenda_peta_lsd_array[] = $data;
        //         }
        //     }
        // }
        // $hasil_legenda_peta_lsd = json_encode($legenda_peta_lsd_array);
        $hasil_legenda_peta_lsd = '[{"legenda":"27"},{"legenda":"28"},{"legenda":"29"}]';
        $hasil_legenda_peta_situasi = '[{"legenda":"55"},{"legenda":"56"},{"legenda":"57"}]';

        $ketentuan_array = array();
        if (!empty($ketentuan)) {
            foreach ($ketentuan as $input) {
                if (!empty($input)) {
                    $data = array(
                        'ketentuan' => $input
                    );
                    $ketentuan_array[] = $data;
                }
            }
        }
        if ($cek_data) {
            $query = "UPDATE data_sertifikat_draft_peta SET
                id_permohonan='$id_permohonan',
                nama_pemohon='$nama_pemohon',
                alamat_pemohon='$alamat_pemohon',
                nama_perusahaan='$nama_perusahaan',
                alamat_perusahaan='$alamat_perusahaan',
                peruntukan_tanah='$peruntukan',
                lokasi_tanah='$lokasi',
                luas_tanah='$luas_tanah',
                skala_usaha='$skala_usaha',
                klasifikasi_resiko='$klasifikasi_resiko',
                titik_koordinat_tengah='$koordinat_tengah',
                citra_satelit='$file1',
                pola_ruang='$file2',
                legenda_pola_ruang='$hasil_legenda_pola_ruang',
                peta_situasi='$file3',
                legenda_peta_situasi='$hasil_legenda_peta_situasi',
                peta_lsd='$file4',
                legenda_peta_lsd='$hasil_legenda_peta_lsd'               
            WHERE
            id_permohonan = '$id_permohonan'
            ";
        } else {

            $query = "INSERT INTO data_sertifikat_draft_peta (
            id_permohonan,
            nama_pemohon,
            alamat_pemohon,
            nama_perusahaan,
            alamat_perusahaan,
            peruntukan_tanah,
            lokasi_tanah,
            luas_tanah,
            skala_usaha,
            klasifikasi_resiko,
            titik_koordinat_tengah,
            citra_satelit,
            pola_ruang,
            legenda_pola_ruang,
            peta_situasi,
            legenda_peta_situasi,
            peta_lsd,
            legenda_peta_lsd

        )VALUES(
            '$id_permohonan',
            '$nama_pemohon',
            '$alamat_pemohon',
            '$nama_perusahaan',
            '$alamat_perusahaan',
            '$peruntukan',
            '$lokasi',
            '$luas_tanah',
            '$skala_usaha',
            '$klasifikasi_resiko',
            '$koordinat_tengah',
            '$file1',            
            '$file2',            
            '$hasil_legenda_pola_ruang',            
            '$file3',            
            '$hasil_legenda_peta_situasi',            
            '$file4',            
            '$hasil_legenda_peta_lsd'            
        )";
        }
        $admin = $this->session->userdata('id_user');
            $waktu = date('Y-m-d H:i:s');
            $this->db->query("INSERT INTO log_admin (type,id_user,id_permohonan,keterangan,waktu) VALUES('insert dan update','$admin','$id_permohonan','Insert atau Update data pada config draft peta','$waktu')");
        // echo $query;
        $query1 = $this->db->query($query);
        if ($query1) {
            return true;
        } else {
            return false;
        }
    }
    public function config_lhs()
    {
        $id_permohonan = $this->input->post('id_permohonan');
        $cek_data = $this->db->query("SELECT * FROM data_sertifikat_lhs WHERE id_permohonan = '$id_permohonan'")->row();
        $config['upload_path']          = './assets_dokumen/kkpr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['foto1']['name'])) {
            $this->upload->do_upload('foto1');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        } else {
            $file1 = $cek_data->foto1;
        }
        //file2
        if (!empty($_FILES['foto2']['name'])) {
            $this->upload->do_upload('foto2');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        } else {
            $file2 = $cek_data->foto2;
        }
        //file3
        if (!empty($_FILES['foto3']['name'])) {
            $this->upload->do_upload('foto3');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        } else {
            $file3 = $cek_data->foto3;
        }
        //file4
        if (!empty($_FILES['foto4']['name'])) {
            $this->upload->do_upload('foto4');
            $data4 = $this->upload->data();
            $file4 = $data4['file_name'];
        } else {
            $file4 = $cek_data->foto4;
        }
        //file5
        if (!empty($_FILES['foto5']['name'])) {
            $this->upload->do_upload('foto5');
            $data5 = $this->upload->data();
            $file5 = $data5['file_name'];
        } else {
            $file5 = $cek_data->foto5;
        }
        //file6
        if (!empty($_FILES['foto6']['name'])) {
            $this->upload->do_upload('foto6');
            $data6 = $this->upload->data();
            $file6 = $data6['file_name'];
        } else {
            $file6 = $cek_data->foto6;
        }

        $no_reg = $this->input->post('no_reg');
        $tgl_survei = $this->input->post('tgl_survei');
        $petugas1 = $this->input->post('petugas1');
        $petugas2 = $this->input->post('petugas2');
        $nama_pemohon = $this->input->post('nama_pemohon');
        $alamat_pemohon = $this->input->post('alamat_pemohon');
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $alamat_perusahaan = $this->input->post('alamat_perusahaan');
        $nib = $this->input->post('nib');
        $lokasi = $this->input->post('lokasi');
        $koordinat = $this->input->post('koordinat');
        $luas_tanah_jalan = $this->input->post('luas_tanah_jalan');
        $guna_lahan = $this->input->post('guna_lahan');
        $batas_utara = $this->input->post('batas_utara');
        $batas_selatan = $this->input->post('batas_selatan');
        $batas_barat = $this->input->post('batas_barat');
        $batas_timur = $this->input->post('batas_timur');
        $kemiringan_tanah = $this->input->post('kemiringan_tanah');
        $fungsi_kelas_jalan = $this->input->post('fungsi_kelas_jalan');
        $keterangan1 = $this->input->post('keterangan1');
        $keterangan2 = $this->input->post('keterangan2');
        $keterangan3 = $this->input->post('keterangan3');
        $keterangan4 = $this->input->post('keterangan4');
        $keterangan5 = $this->input->post('keterangan5');
        $keterangan6 = $this->input->post('keterangan6');
        $rencana_pola_ruang = $this->input->post('rencana_pola_ruang');
        $masuk_lsd = $this->input->post('masuk_lsd');
        $masuk_kp2b = $this->input->post('masuk_kp2b');
        $radius_mata_air = $this->input->post('radius_mata_air');
        $pihak_lain = $this->input->post('pihak_lain');

        if ($cek_data) {
            $query = "UPDATE data_sertifikat_lhs SET
                id_permohonan='$id_permohonan',
                no_reg='$no_reg',
                tgl_survei='$tgl_survei',
                petugas1='$petugas1',
                petugas2='$petugas2',
                nama_pemohon='$nama_pemohon',
                alamat_pemohon='$alamat_pemohon',
                nama_perusahaan='$nama_perusahaan',
                alamat_perusahaan='$alamat_perusahaan',                             
                nib='$nib',                             
                lokasi='$lokasi',                             
                koordinat='$koordinat',                             
                luas_tanah_jalan='$luas_tanah_jalan',                             
                guna_lahan='$guna_lahan',                             
                batas_utara='$batas_utara',                             
                batas_selatan='$batas_selatan',                             
                batas_barat='$batas_barat',                             
                batas_timur='$batas_timur',                             
                kemiringan_tanah='$kemiringan_tanah',                             
                fungsi_kelas_jalan='$fungsi_kelas_jalan',                             
                foto1='$file1',                             
                keterangan1='$keterangan1',                             
                foto2='$file2',                             
                keterangan2='$keterangan2',                             
                foto3='$file3',                             
                keterangan3='$keterangan3',                             
                foto4='$file4',                             
                keterangan4='$keterangan4',                             
                foto5='$file5',                             
                keterangan5='$keterangan5',                             
                foto6='$file6',                             
                keterangan6='$keterangan6',                             
                rencana_pola_ruang='$rencana_pola_ruang',                             
                masuk_lsd='$masuk_lsd',                             
                masuk_kp2b='$masuk_kp2b',                             
                radius_mata_air='$radius_mata_air',                             
                pihak_lain='$pihak_lain'                             
            WHERE
            id_permohonan = '$id_permohonan'
            ";
        } else {

            $query = "INSERT INTO data_sertifikat_lhs (
            id_permohonan,
            no_reg,
            tgl_survei,
            petugas1,
            petugas2,            
            nama_pemohon,
            alamat_pemohon,
            nama_perusahaan,
            alamat_perusahaan,  
            nib,
            lokasi,
            koordinat,
            luas_tanah_jalan,
            guna_lahan,
            batas_utara,          
            batas_selatan,          
            batas_barat,          
            batas_timur,          
            kemiringan_tanah,
            fungsi_kelas_jalan,
            foto1,          
            keterangan1,          
            foto2,          
            keterangan2,          
            foto3,          
            keterangan3,          
            foto4,          
            keterangan4,          
            foto5,          
            keterangan5,          
            foto6,
            keterangan6,   
            rencana_pola_ruang,
            masuk_lsd,
            masuk_kp2b,
            radius_mata_air,
            pihak_lain       

        )VALUES(
            '$id_permohonan',
            '$no_reg',
            '$tgl_survei',
            '$petugas1',
            '$petugas2',
            '$nama_pemohon',
            '$alamat_pemohon',
            '$nama_perusahaan',
            '$alamat_perusahaan',                      
            '$nib',                      
            '$lokasi',                      
            '$koordinat',                      
            '$luas_tanah_jalan',                      
            '$guna_lahan',                      
            '$batas_utara',                      
            '$batas_selatan',                      
            '$batas_barat',                      
            '$batas_timur',                      
            '$kemiringan_tanah',                      
            '$fungsi_kelas_jalan',                      
            '$file1',                      
            '$keterangan1',                      
            '$file2',                      
            '$keterangan2',                      
            '$file3',                      
            '$keterangan3',                      
            '$file4',                      
            '$keterangan4',                      
            '$file5',                      
            '$keterangan5',                      
            '$file6',                      
            '$keterangan6',                      
            '$rencana_pola_ruang',                      
            '$masuk_lsd',                      
            '$masuk_kp2b',                      
            '$radius_mata_air',                      
            '$pihak_lain'                      
        )";
        }
        $this->db->query("UPDATE kkpr_permohonan SET 
            tgl_survei = '$tgl_survei',
            surveyor1 = '$petugas1',
            surveyor2 = '$petugas2'
            WHERE 
            id_kkpr_permohonan = '$id_permohonan'
        ");
        $admin = $this->session->userdata('id_user');
        $waktu = date('Y-m-d H:i:s');
        $this->db->query("INSERT INTO log_admin (type,id_user,id_permohonan,keterangan,waktu) VALUES('insert dan update','$admin','$id_permohonan','Insert atau Update data pada config lhs','$waktu')");
        // echo $query;
        $query1 = $this->db->query($query);
        if ($query1) {
            return true;
        } else {
            return false;
        }
    }

    public function pengembalian()
    {
        $id = $this->input->post('id');
        $kkpr = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id'")->row();
        $index = $this->input->post('index');
        $cek = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id' ")->row();
        $config['upload_path']          = './assets_dokumen/kkpr';
        $config['allowed_types']        = 'pdf|PDF|jpg|JPG|zip';
        $config['max_size']             = 5120; //5MB          
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['file_dokumen_oss']['name'])) {
            $this->upload->do_upload('file_dokumen_oss');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        } else {
            $file1 = $cek->dokumen_oss;
        }

        //file2
        if (!empty($_FILES['file_fotokopi_ktp']['name'])) {
            $this->upload->do_upload('file_fotokopi_ktp');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        } else {
            $file2 = $cek->fotokopi_ktp;
        }
        //file3
        if (!empty($_FILES['file_akta_perusahaan']['name'])) {
            $this->upload->do_upload('file_akta_perusahaan');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        } else {
            $file3 = $cek->akta_perusahaan;
        }
        //file5
        if (!empty($_FILES['file_tdp']['name'])) {
            $this->upload->do_upload('file_tdp');
            $data5 = $this->upload->data();
            $file5 = $data5['file_name'];
        } else {
            $file5 = $cek->tdp;
        }
        //file6
        if (!empty($_FILES['file_npwp']['name'])) {
            $this->upload->do_upload('file_npwp');
            $data6 = $this->upload->data();
            $file6 = $data6['file_name'];
        } else {
            $file6 = $cek->npwp;
        }
        //file7
        $index = $this->input->post('index'); //index[]
        if (!empty($_FILES['file_status_tanah']['name'])) {
            $jumlah_berkas = count($_FILES['file_status_tanah']['name']);
            $dataArray_surat_tanah = array();

            for ($i = 0; $i < $jumlah_berkas; $i++) {
                if (!empty($_FILES['file_status_tanah']['name'][$i])) {
                    $_FILES['file']['name'] = $_FILES['file_status_tanah']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['file_status_tanah']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['file_status_tanah']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['file_status_tanah']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['file_status_tanah']['size'][$i];

                    if ($this->upload->do_upload('file')) {
                        $uploadData = $this->upload->data();
                        $data = array(
                            'no' => $index[$i],
                            'surat_tanah' => $uploadData['file_name']
                        );
                        $dataArray_surat_tanah[] = $data;
                    }
                }
            }

            $file7 = json_encode($dataArray_surat_tanah);
            $cek_st = json_encode($dataArray_surat_tanah);
            // echo $cek_st.'<br>';
        } else {
            $file7 = $cek->surat_tanah;
        }
        if (!empty($_FILES['file_peta_bidang_status_tanah']['name'])) {
            $jumlah_berkas = count($_FILES['file_peta_bidang_status_tanah']['name']);
            $dataArray_peta_bidang_surat_tanah = array();

            for ($i = 0; $i < $jumlah_berkas; $i++) {
                if (!empty($_FILES['file_peta_bidang_status_tanah']['name'][$i])) {
                    $_FILES['file']['name'] = $_FILES['file_peta_bidang_status_tanah']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['file_peta_bidang_status_tanah']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['file_peta_bidang_status_tanah']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['file_peta_bidang_status_tanah']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['file_peta_bidang_status_tanah']['size'][$i];

                    if ($this->upload->do_upload('file')) {
                        $uploadData = $this->upload->data();
                        $data = array(
                            'no' => $index[$i],
                            'peta_bidang' => $uploadData['file_name']
                        );
                        $dataArray_peta_bidang_surat_tanah[] = $data;
                    }
                }
            }

            $file19 = json_encode($dataArray_peta_bidang_surat_tanah);
            $cek_pbst = json_encode($dataArray_peta_bidang_surat_tanah);
            // echo $cek_st.'<br>';
        } else {
            $file19 = $cek->peta_bidang;
        }
        //file8
        if (!empty($_FILES['file_peta_bidang']['name'])) {
            $this->upload->do_upload('file_peta_bidang');
            $data8 = $this->upload->data();
            $file8 = $data8['file_name'];
        } else {
            $file8 = $cek->peta_bidang;
        }
        //TAMBAHAN
        //file10
        if (!empty($_FILES['file_surat_kematian']['name'])) {
            $this->upload->do_upload('file_surat_kematian');
            $data10 = $this->upload->data();
            $file10 = $data10['file_name'];
        } else {
            $file10 = $cek->surat_kematian;
        }
        //file11
        if (!empty($_FILES['file_surat_kuasa_ahli_waris']['name'])) {
            $this->upload->do_upload('file_surat_kuasa_ahli_waris');
            $data11 = $this->upload->data();
            $file11 = $data11['file_name'];
        } else {
            $file11 = $cek->surat_kuasa_ahli_waris;
        }
        //file12
        if (!empty($_FILES['file_surat_dinas_komunikasi']['name'])) {
            $this->upload->do_upload('file_surat_dinas_komunikasi');
            $data12 = $this->upload->data();
            $file12 = $data12['file_name'];
        } else {
            $file12 = $cek->surat_dinas_komunikasi;
        }
        //file13
        if (!empty($_FILES['file_surat_rekom_tni']['name'])) {
            $this->upload->do_upload('file_surat_rekom_tni');
            $data13 = $this->upload->data();
            $file13 = $data13['file_name'];
        } else {
            $file13 = $cek->surat_rekom_tni;
        }
        //file14
        if (!empty($_FILES['file_surat_dinas_perdagangan']['name'])) {
            $this->upload->do_upload('file_surat_dinas_perdagangan');
            $data14 = $this->upload->data();
            $file14 = $data14['file_name'];
        } else {
            $file14 = $cek->surat_dinas_perdagangan;
        }
        //file15
        if (!empty($_FILES['file_surat_dinas_peternakan']['name'])) {
            $this->upload->do_upload('file_surat_dinas_peternakan');
            $data15 = $this->upload->data();
            $file15 = $data15['file_name'];
        } else {
            $file15 = $cek->surat_dinas_peternakan;
        }
        //file16
        if (!empty($_FILES['file_surat_pertamina']['name'])) {
            $this->upload->do_upload('file_surat_pertamina');
            $data16 = $this->upload->data();
            $file16 = $data16['file_name'];
        } else {
            $file16 = $cek->surat_pertamina;
        }
        //file17
        if (!empty($_FILES['file_daftar_nama_kk']['name'])) {
            $this->upload->do_upload('file_daftar_nama_kk');
            $data17 = $this->upload->data();
            $file17 = $data17['file_name'];
        } else {
            $file17 = $cek->daftar_nama_kk;
        }
        //file18
        if (!empty($_FILES['file_fkub']['name'])) {
            $this->upload->do_upload('file_fkub');
            $data18 = $this->upload->data();
            $file18 = $data18['file_name'];
        } else {
            $file18 = $cek->surat_fkub;
        }
        //file20
        if (!empty($_FILES['file_shp']['name'])) {
            $this->upload->do_upload('shp');
            $data20 = $this->upload->data();
            $file20 = $data20['file_name'];
        } else {
            $file20 = $cek->shp;
        }

        if ($cek_st) {
            if ($kkpr->dasar_surat_tanah == 'letter' && $kkpr->status_surat_tanah == 'atas_nama_orang_lain') {
            $query = "UPDATE kkpr_permohonan SET
            dokumen_oss = '$file1',
            fotokopi_ktp = '$file2',
            akta_perusahaan = '$file3',
            tdp = '$file5',
            npwp = '$file6',
            peta_bidang = '$file8',
            surat_kematian = '$file10',
            surat_kuasa_ahli_waris = '$file11',
            surat_dinas_komunikasi = '$file12',
            surat_rekom_tni = '$file13',
            surat_dinas_perdagangan = '$file14',
            surat_dinas_peternakan = '$file15',
            surat_pertamina = '$file16',
            daftar_nama_kk = '$file17',
            surat_fkub = '$file18',
            shp = '$file20',
            status_berkas = '0'
            WHERE id_kkpr_permohonan = '$id'
            ";
            $surat_tanah_for = json_decode($cek_st);
            foreach ($surat_tanah_for as $cst) {
                $query_st = "UPDATE kkpr_permohonan
                SET surat_tanah = JSON_SET(surat_tanah, '$[$cst->no].surat_tanah', '$cst->surat_tanah')
                WHERE id_kkpr_permohonan = '$id';
            ";
            // echo $query_st.'<br>';
            $this->db->query($query_st);
            }
            
            $peta_bidang_surat_tanah_for = json_decode($cek_pbst);
            foreach ($peta_bidang_surat_tanah_for as $cst) {
                $query_pbst = "UPDATE kkpr_permohonan
                SET peta_bidang_surat_tanah = JSON_SET(peta_bidang_surat_tanah, '$[$cst->no].peta_bidang', '$cst->peta_bidang')
                WHERE id_kkpr_permohonan = '$id';
            ";
                // echo $query_pbst.'<br>';
                $this->db->query($query_pbst);
            }
        }else{
            $query = "UPDATE kkpr_permohonan SET
            dokumen_oss = '$file1',
            fotokopi_ktp = '$file2',
            akta_perusahaan = '$file3',
            tdp = '$file5',
            npwp = '$file6',
            peta_bidang = '$file8',
            surat_kematian = '$file10',
            surat_kuasa_ahli_waris = '$file11',
            surat_dinas_komunikasi = '$file12',
            surat_rekom_tni = '$file13',
            surat_dinas_perdagangan = '$file14',
            surat_dinas_peternakan = '$file15',
            surat_pertamina = '$file16',
            daftar_nama_kk = '$file17',
            surat_fkub = '$file18',
            shp = '$file20',
            status_berkas = '0'
            WHERE id_kkpr_permohonan = '$id'
            ";
            $surat_tanah_for = json_decode($cek_st);
            foreach ($surat_tanah_for as $cst) {
                $query_st = "UPDATE kkpr_permohonan
                SET surat_tanah = JSON_SET(surat_tanah, '$[$cst->no].surat_tanah', '$cst->surat_tanah')
                WHERE id_kkpr_permohonan = '$id';
            ";
                // echo $query_st.'<br>';
                $this->db->query($query_st);
            }
        }
        } else {
            $query = "UPDATE kkpr_permohonan SET
            dokumen_oss = '$file1',
            fotokopi_ktp = '$file2',
            akta_perusahaan = '$file3',
            tdp = '$file5',
            npwp = '$file6',
            surat_tanah = '$file7',
            peta_bidang = '$file8',
            surat_kematian = '$file10',
            surat_kuasa_ahli_waris = '$file11',
            surat_dinas_komunikasi = '$file12',
            surat_rekom_tni = '$file13',
            surat_dinas_perdagangan = '$file14',
            surat_dinas_peternakan = '$file15',
            surat_pertamina = '$file16',
            daftar_nama_kk = '$file17',
            surat_fkub = '$file18',
            shp = '$file20',
            status_berkas = '0'
            WHERE id_kkpr_permohonan = '$id'
            ";
        }
        $update = $this->db->query($query);
        // $this->db->query("DELETE FROM pengembalian_kkpr_permohonan WHERE id_permohonan = '$id'");
        // $this->db->query("DELETE FROM action_pengembalian_kkpr_permohonan WHERE id_permohonan = '$id'");
        echo $query;
        if ($update) {
            return true;
        } else {
            return false;
        }
    }
    public function tolak_dan_kirim_notif($id,$notif)
    {        
        $data = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id'")->row();
        $curl = curl_init();

        if($notif == 'wa')
        {
            $query = $this->db->query("UPDATE kkpr_permohonan SET status_berkas = '98' WHERE id_kkpr_permohonan = '$id'");
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $data->telp_pemohon,
                    'message' => 'Mohon perbaiki berkas Anda pada halaman Pengembalian Berkas, Jika tidak di perbaiki pada kurun waktu 7 hari setelah ditolak maka berkas Anda akan kami tolak',
                    'countryCode' => '62', //optional
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: 5@6!I4e2eSKYewSZSFhD' //change TOKEN to your actual token
                ),
            ));
        }else 
        {
            $query = $this->db->query("UPDATE kkpr_permohonan SET status_berkas = '99' WHERE id_kkpr_permohonan = '$id'");
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $data->telp_pemohon,
                    'message' => 'Berkas Anda Tertolak karena tidak memperbaiki formulir selama 7 hari',
                    'countryCode' => '62', //optional
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: 5@6!I4e2eSKYewSZSFhD' //change TOKEN to your actual token
                ),
            ));
        }

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;        
    }
    public function getAllKkpr()
    {
        return $this->db->get('kkpr_permohonan')->result_array();
    }

    public function getDataByYear($tahun)
    {
        // Ubah query sesuai dengan struktur dan nama tabel Anda
        $query = $this->db->query("SELECT * FROM kkpr_permohonan WHERE YEAR(tgl_survei) = $tahun");
        return $query->result();
    }
    public function pembagian_berkas($id_kkpr,$id_user)
    {
        $query = $this->db->query("UPDATE kkpr_permohonan SET id_petugas = '$id_user' WHERE id_kkpr_permohonan = '$id_kkpr' ");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function get_permohonan_by_status($status_array)
    {
        return $this->db->where_in('status_berkas', $status_array)->get('kkpr_permohonan')->result();
    }

    public function kirim_pesan_whatsapp($permohonan)
    {
        // Implementasikan logika pengiriman pesan WhatsApp
        $curl = curl_init();
        $telp_pemohon = $permohonan->telp_pemohon;
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $telp_pemohon,
                'message' => 'Mohon perbaiki berkas Anda pada halaman Pengembalian Berkas, Jika tidak di perbaiki pada kurun waktu 7 hari setelah ditolak maka berkas Anda akan kami tolak',
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 5@6!I4e2eSKYewSZSFhD' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);

        // Cek apakah pengiriman berhasil
        if ($response !== false) {
            // Pengiriman berhasil, set status berkas ke 98
            $this->db->set('status_berkas', '98');
            $this->db->where('id_kkpr_permohonan', $permohonan->id_kkpr_permohonan);
            $this->db->update('kkpr_permohonan');
        } else {
            echo "Gagal mengirim pesan WhatsApp.";
        }

        curl_close($curl);
        echo $response;
    }

    public function kirim_pesan_tolak_whatsapp($permohonan)
    {
        $curl = curl_init();

        // Ambil nomor telepon pemohon dari data permohonan
        $telp_pemohon = $permohonan->telp_pemohon;

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $telp_pemohon,
                'message' => 'Berkas Anda Tertolak karena tidak memperbaiki formulir selama 7 hari',
                'countryCode' => '62', // optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 5@6!I4e2eSKYewSZSFhD' // change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);

        if ($response !== false) {
            // Lakukan penolakan permohonan
            $this->db->set('status_berkas', '99');
            $this->db->where('id_kkpr_permohonan', $permohonan->id_kkpr_permohonan);
            $this->db->update('kkpr_permohonan');
        } else {
            echo "Gagal mengirim pesan WhatsApp.";
        }

        curl_close($curl);
        echo $response;
    }


    public function get_user_data($user_id)
    {
        return $this->db->where('id_user', $user_id)->get('users')->row();
    }

    public function simpan_koordinat($id, $koordinat)
    {
        // Menyimpan koordinat ke dalam tabel data_sertifikat_peta
        $data = array(
            'titik_koordinat' => $koordinat
        );

        $this->db->where('id_permohonan', $id); // Menggunakan kolom 'id_permohonan' yang sesuai
        $this->db->update('data_sertifikat_peta', $data);
    }

}
