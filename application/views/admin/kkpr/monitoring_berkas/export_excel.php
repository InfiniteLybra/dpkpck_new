<?php
// fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// membuat nama file ekspor "export-to-excel.xls"
date_default_timezone_set("Asia/jakarta");
header("Content-Disposition: attachment; filename= Laporan_Rekap_KKPR_" . date("Y-m-d h:i:sa") . ".xls");

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

        .export-table th{
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
    <table class="export-table" align="text-center" border="1">
        <thead>
            <tr style="text-transform: uppercase;">
                <th>No.</th>
                <!-- <th >Type</th> -->
                <th>tgl.verif berkas</th>
                <th>tgl.survei</th>
                <th>no.reg.terbit</th>
                <th>tgl.reg</th>
                <th>surveyor 1</th>
                <th>surveyor 2</th>
                <th>Nama pemohon</th>
                <th>Alamat pemohon</th>
                <th>nama perusahaan</th>
                <th>alamat perusahaan</th>
                <th>nib</th>
                <th>skala usaha</th>
                <th>klasifikasi risiko</th>
                <th>kbli</th>
                <th>peruntukan</th>
                <th>kategori</th>
                <th>(perluasan)</th>
                <th>lokasi usaha</th>
                <th>kel./desa</th>
                <th>kec.</th>
                <th>status lahan</th>
                <th>luas</th>
                <th>keadaan tanah <br> <small>(surat tanah)</small></th>
                <th>guna lahan awal</th>
                <th>guna lahan eksisting</th>
                <th>batas utara</th>
                <th>batas selatan</th>
                <th>batas barat</th>
                <th>batas timur</th>
                <th>kemiringan</th>
                <th>sarana sekitar</th>
                <th>batas sebelah (I)</th>
                <th>fungsi jalan (I)</th>
                <th>kelas jalan (I)</th>
                <th>status jalan (I)</th>
                <th>kondisi jalan (I)</th>
                <th>median (I)</th>
                <th>perkerasan (I)</th>
                <th>bahu (I)</th>
                <th>trotoar (I)</th>
                <th>saluran (I)</th>
                <th>ambang pengaman (I)</th>
                <th>jalur hijau (I)</th>
                <th>gsb (I)</th>
                <th>koordinat tengah</th>
                <th>no.&th.perda</th>
                <th>judul perda</th>
                <th>rencana pola ruang</th>
                <th>fz</th>
                <th>lsd</th>
                <th>kp2b</th>
                <th class="text-center min-w-70px">Actions</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $no = 1;
            foreach ($kkpr as $i) {
            ?>
                <?php
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
                        <span class="fw-bold"><?= $i->nama_pemohon ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?php if ($peta) echo $peta->alamat_pemohon ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->nama_perusahaan ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?php if ($peta) echo $peta->alamat_perusahaan ?></span>
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
                        <span class="fw-bold"><?= $i->kbli ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->peruntukan_tanah ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->kategori ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->perluasan ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->lokasi_tanah ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $kelurahan_tanah->nama_desa ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $kecamatan_tanah->nama_kecamatan ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold">
                            <?php
                            $status_tanah = json_decode($i->status_tanah);
                            foreach ($status_tanah as $s) {
                                echo $s->status_tanah . "<br>";
                            }
                            ?>
                        </span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->luas_tanah ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?php if ($lhs) echo $lhs->guna_lahan ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?php if ($lhs) echo $lhs->batas_utara ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?php if ($lhs) echo $lhs->batas_selatan ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?php if ($lhs) echo $lhs->batas_barat ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?php if ($lhs) echo $lhs->batas_timur ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?php if ($lhs) echo $lhs->kemiringan_tanah ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?php if ($peta) echo $peta->gsp_gsb ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?php if ($draft) echo $draft->titik_koordinat_tengah ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?php if ($lhs) echo $lhs->rencana_pola_ruang ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?php if ($peta) echo $peta->flexsible_zoning ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                    <td class="text-center pe-0">
                        <!-- <span class="fw-bold"></span> -->
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>