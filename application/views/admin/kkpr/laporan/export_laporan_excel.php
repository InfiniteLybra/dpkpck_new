<?php
// fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// membuat nama file ekspor "export-to-excel.xls"
date_default_timezone_set("Asia/jakarta");
header("Content-Disposition: attachment; filename= Laporan_Monitoring_KKPR_" . date("Y-m-d h:i:sa") . ".xls");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Proses Exsport</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <!-- <link href="<?php echo base_url('assets/'); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
	<script src="<?php echo base_url('assets/'); ?>assets/js/scripts.bundle.js"></script> -->
    <style>
        .export-table {
            border-collapse: collapse;
            width: 100%;
            table-layout: auto;
            /* Tambahkan ini untuk membuat kolom meregang otomatis */
        }

        .export-table th {
            text-align: center;
        }

        .export-table td {
            padding: 8px;
            text-align: left;
            font-size: 12px;
            vertical-align: middle;
            word-wrap: break-word;
            width: auto;
            /* white-space: nowrap; */
            /* overflow: hidden; */
            text-overflow: ellipsis;
            /* Agar teks panjang pindah ke baris berikutnya */
        }

        .export-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-transform: uppercase;
        }


        /* Teks rata kanan */
        .text-end {
            text-align: end;
        }
    </style>

</head>

<body>
    <center>
        <h3><b>Laporan Rekap KKPR</b></h3>
        <!-- <h4><b>Master Barang</b></h4> -->
        <h5 class="center-text">Tanggal : <?= date("Y-m-d") ?></h5>
        <hr>
    </center>
    <div class="separator mb-3 opacity-75"></div>
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
            <thead>                
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="text-center min-w-150px">No</th>
                    <th class="text-center min-w-150px">Tgl Veriv Berkas</th>
                    <th class="text-center min-w-150px">Tgl Survei</th>
                    <th class="text-center min-w-150px">No. Reg Terbit</th>
                    <th class="text-center min-w-150px">Tanggal Reg</th>
                    <th class="text-center min-w-150px">Surveyor 1</th>
                    <th class="text-center min-w-150px">Surveyor 2</th>
                    <th class="text-center min-w-150px">Type</th>
                    <th class="text-center min-w-150px">Nama Pemohon</th>
                    <th class="text-center min-w-150px">Alamat Pemohon</th>
                    <th class="text-center min-w-150px">Rt Pemohon</th>
                    <th class="text-center min-w-150px">Rw Pemohon</th>
                    <th class="text-center min-w-150px">Provinsi Pemohon</th>
                    <th class="text-center min-w-150px">Kota Pemohon</th>
                    <th class="text-center min-w-150px">Kecamatan Pemohon</th>
                    <th class="text-center min-w-150px">Kelurahan Pemohon</th>
                    <th class="text-center min-w-150px">Telp Pemohon</th>
                    <th class="text-center min-w-150px">Nama Perusahaan</th>
                    <th class="text-center min-w-150px">NIB</th>
                    <th class="text-center min-w-150px">Skala Usaha</th>
                    <th class="text-center min-w-150px">Klasifikasi Resiko</th>
                    <th class="text-center min-w-150px">KBLI</th>
                    <th class="text-center min-w-150px">Alamat Perusahaan</th>
                    <th class="text-center min-w-150px">RT Perusahaan</th>
                    <th class="text-center min-w-150px">RW Perusahaan</th>
                    <th class="text-center min-w-150px">Provinsi Perusahaan</th>
                    <th class="text-center min-w-150px">Kota Perusahaan</th>
                    <th class="text-center min-w-150px">Kecamatan Perusahaan</th>
                    <th class="text-center min-w-150px">Kelurahan Perusahaan</th>
                    <th class="text-center min-w-150px">Peruntukan Tanah</th>
                    <th class="text-center min-w-150px">Luas Tanah</th>
                    <th class="text-center min-w-150px">Kategori</th>
                    <th class="text-center min-w-150px">Perluasan</th>
                    <th class="text-center min-w-800px">Status Tanah</th>
                    <th class="text-center min-w-150px">Lokasi Tanah</th>
                    <th class="text-center min-w-150px">RT Tanah</th>
                    <th class="text-center min-w-150px">RW Tanah</th>
                    <th class="text-center min-w-150px">Kota Tanah</th>
                    <th class="text-center min-w-150px">Kecamatan Tanah</th>
                    <th class="text-center min-w-150px">Kelurahan Tanah</th>
                    <th class="text-center min-w-150px">Dokumen Oss</th>
                    <th class="text-center min-w-150px">Fotokopi KTP</th>
                    <th class="text-center min-w-150px">Akta Perusahaan</th>
                    <th class="text-center min-w-150px">SIUP</th>
                    <th class="text-center min-w-150px">TDP</th>
                    <th class="text-center min-w-150px">NPWP</th>
                    <th class="text-center min-w-150px">Surat Tanah</th>
                    <th class="text-center min-w-150px">Peta Bidang</th>
                    <th class="text-center min-w-150px">Teknis Pertanahan</th>
                    <th class="text-center min-w-150px">Surat Kematian</th>
                    <th class="text-center min-w-150px">Surat Kuasa Ahli Waris</th>
                    <th class="text-center min-w-150px">Surat Dinas Komunikasi</th>
                    <th class="text-center min-w-150px">Surat Rekom TNI</th>
                    <th class="text-center min-w-150px">Surat Dinas Perdagangan</th>
                    <th class="text-center min-w-150px">Surat Dinas Peternakan</th>
                    <th class="text-center min-w-150px">Surat Pertamina</th>
                    <th class="text-center min-w-150px">Daftar Nama KK</th>
                    <th class="text-center min-w-150px">Surat FKUB</th>
                    <th class="text-center min-w-150px">Status Berkas</th>

                    <!-- <th class="text-center min-w-100px">Type</th> -->
                    <!-- <th class="text-center min-w-70px">Actions</th> -->
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $no = 1;
                foreach ($kkpr as $i) {
                ?>
                    <?php
                    $kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$i->kelurahan_pemohon' ")->row();
                    $kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$i->kecamatan_pemohon' ")->row();
                    $kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$i->kota_pemohon' ")->row();
                    $provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$i->provinsi_pemohon' ")->row();
                    $peta = $this->db->query("SELECT * FROM data_sertifikat_peta WHERE id_permohonan = '$i->id_kkpr_permohonan'")->row();
                    $lhs = $this->db->query("SELECT * FROM data_sertifikat_lhs WHERE id_permohonan = '$i->id_kkpr_permohonan'")->row();
                    $draft = $this->db->query("SELECT * FROM data_sertifikat_draft_peta WHERE id_permohonan = '$i->id_kkpr_permohonan'")->row();
                    $kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$i->kelurahan_tanah' ")->row();
                    $kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$i->kecamatan_tanah' ")->row();
                    ?>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $no++ ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->tgl_verif_berkas ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->tgl_survei ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->no_reg_terbit ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->tgl_reg ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->surveyor1 ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->surveyor2 ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->type ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->nama_pemohon ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if ($peta) echo $peta->alamat_pemohon ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= '00' . $i->rt_pemohon ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= "00" . $i->rw_pemohon ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $provinsi->prov_name ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kota->city_name ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kecamatan->dis_name ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kelurahan->subdis_name ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->telp_pemohon ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->nama_perusahaan ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->nib ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->skala_usaha ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->klasifikasi_resiko ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <?php
                            $kbli = json_decode($i->kbli);
                            foreach ($kbli as $k) {
                                echo '<span class="fw-bold">' . $k->kbli . '</span>';
                            }
                            ?>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->alamat_perusahaan ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= "00" . $i->rt_perusahaan ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= "00" . $i->rw_perusahaan ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $provinsi->prov_name ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kota->city_name ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kecamatan->dis_name ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kelurahan->subdis_name ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->peruntukan_tanah ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->luas_tanah ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->kategori ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->perluasan ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <?php
                            $status_tanah = json_decode($i->status_tanah);
                            foreach ($status_tanah as $s) {
                                echo '<span class="fw-bold">' . $s->status_tanah . '</span>';
                            }
                            ?>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->lokasi_tanah ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= "00" . $i->rt_tanah ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= "00" . $i->rw_tanah ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->kota_tanah ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kecamatan_tanah->nama_kecamatan ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kelurahan_tanah->nama_desa ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->dokumen_oss ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->fotokopi_ktp ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->akta_perusahaan ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->siup ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->tdp ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->npwp ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->surat_tanah ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->peta_bidang ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->teknis_pertanahan ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->surat_kematian ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->surat_kuasa_ahli_waris ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->surat_dinas_komunikasi ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->surat_rekom_tni ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->surat_dinas_perdagangan ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->surat_dinas_peternakan ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->surat_pertamina ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->daftar_nama_kk ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->surat_fkub ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->status_berkas ?></span>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>