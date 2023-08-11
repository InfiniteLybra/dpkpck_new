<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Itr_Model extends CI_Model
{
    public function tambah_permohonan_itr()
    {
        $config['upload_path']          = './assets_dokumen/itr';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 2048; //2MB
        // $config['max_width']            = 2048;
        // $config['max_height']           = 2000;
        // $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['fotokopi_ktp']['name'])) {
            $this->upload->do_upload('fotokopi_ktp');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }

        //file2
        if (!empty($_FILES['surat_kuasa']['name'])) {
            $this->upload->do_upload('surat_kuasa');
            $data2 = $this->upload->data();
            $file2 = $data2['file_name'];
        }
        //file3
        if (!empty($_FILES['peta_bidang']['name'])) {
            $this->upload->do_upload('peta_bidang');
            $data3 = $this->upload->data();
            $file3 = $data3['file_name'];
        }
        //file4
        if (!empty($_FILES['surat_tanah']['name'])) {
            $this->upload->do_upload('surat_tanah');
            $data4 = $this->upload->data();
            $file4 = $data4['file_name'];
        }
        //file5
        if (!empty($_FILES['akte_pendidikan']['name'])) {
            $this->upload->do_upload('akte_pendidikan');
            $data5 = $this->upload->data();
            $file5 = $data5['file_name'];
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

        $query = $this->db->query("INSERT INTO itr_permohonan (							
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

                            lokasi_tanah,
                            rt_tanah,
                            rw_tanah,
                            kota_tanah,
                            kecamatan_tanah,
                            kelurahan_tanah,                            
                            luas_tanah,
                            peruntukan_tanah,

                            fotokopi_ktp,
                            surat_kuasa,
                            peta_bidang,                            
                            surat_tanah,
                            akte_perusahaan
							) 
							VALUES(                                
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

                                '$lokasi_tanah',
								'$rt_tanah',
								'$rw_tanah',
								'KAB Malang',
								'$kecamatan_tanah',
								'$kelurahan_tanah',
								'$luas_tanah',
								'$peruntukan_tanah',

                                '$file1',
                                '$file2',
                                '$file3',
                                '$file4',
                                '$file5'                                                                                                                                                          
								
								)");
        if ($query) {
            return true;
        } else {
            return false;
        } 
    }
    public function tambah_kuasa_itr_pengurusan()
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

        $query = $this->db->query("INSERT INTO itr_kuasa (
                            type,

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
                                'pengurusan',
                                
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
    public function tambah_kuasa_itr_penerbitan()
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

        $query = $this->db->query("INSERT INTO itr_kuasa (
                            type,

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
                                'penerbitan',

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
    public function tambah_keterangan()
    {
        $id_itr = $this->input->post('id_itr');
        $fotokopi_ktp = $this->input->post('fotokopi_ktp');
        $surat_kuasa = $this->input->post('surat_kuasa');
        $peta_bidang = $this->input->post('peta_bidang');
        $surat_tanah = $this->input->post('surat_tanah');
        $akte_pendidikan = $this->input->post('akte_pendidikan');

        $get_keterangan = $this->db->query("SELECT * FROM pengembalian_itr_permohonan WHERE id_permohonan = '$id_itr'")->row();
        if($get_keterangan)
        {
            $query = $this->db->query("UPDATE pengembalian_itr_permohonan SET 
                    fotokopi_ktp = '$fotokopi_ktp',
                    surat_kuasa = '$surat_kuasa',
                    peta_bidang = '$peta_bidang',
                    surat_tanah = '$surat_tanah',
                    akte_perusahaan = '$akte_pendidikan'
                    WHERE
                    id_permohonan = '$id_itr'
                    ");
        }else{
            $query = $this->db->query("INSERT INTO pengembalian_itr_permohonan 
                (
                    id_permohonan,
                    fotokopi_ktp,
                    surat_kuasa,
                    peta_bidang,
                    surat_tanah,
                    akte_perusahaan
                )
                VALUES(
                    '$id_itr',
                    '$fotokopi_ktp',
                    '$surat_kuasa',
                    '$peta_bidang',
                    '$surat_tanah',
                    '$akte_pendidikan'
                )");
        }
                 if ($query) {
                    return true;
                } else {
                    return false;
                } 
    }
}
?>