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
    <table class="export-table" align="text-center" border="1">
        <thead>
            <tr style="text-transform: uppercase;">
                <th class="text-center min-w-50px">Id Kkpr Permohonan</th>
                <th>Id User</th>
                <th>Tgl Veriv Berkas</th>
                <th>Tgl Survei</th>
                <th>No. Reg Terbit</th>
                <th>Tanggal Reg</th>
                <th>Surveyor 1</th>
                <th>Surveyor 2</th>
                <th>Type</th>
                <th>Nama Pemohon</th>
                <th>Alamat Pemohon</th>
                <th>Rt Pemohon</th>
                <th>Rw Pemohon</th>
                <th>Provinsi Pemohon</th>
                <th>Kota Pemohon</th>
                <th>Kecamatan Pemohon</th>
                <th>Kelurahan Pemohon</th>
                <th>Telp Pemohon</th>
                <th>Nama Perusahaan</th>
                <th>NIB</th>
                <th>Skala Usaha</th>
                <th>Klasifikasi Resiko</th>
                <th>KBLI</th>
                <th>Alamat Perusahaan</th>
                <th>RT Perusahaan</th>
                <th>RW Perusahaan</th>
                <th>Provinsi Perusahaan</th>
                <th>Kota Perusahaan</th>
                <th>Kecamatan Perusahaan</th>
                <th>Kelurahan Perusahaan</th>
                <th>Peruntukan Tanah</th>
                <th>Luas Tanah</th>
                <th>Kategori</th>
                <th>Perluasan</th>
                <th>Status Tanah</th>
                <th>Lokasi Tanah</th>
                <th>RT Tanah</th>
                <th>RW Tanah</th>
                <th>Kota Tanah</th>
                <th>Kecamatan Tanah</th>
                <th>Kelurahan Tanah</th>
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
                        <span class="fw-bold"><?= $i->id_kkpr_permohonan ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->id_user ?></span>
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
                        <span class="fw-bold"><?= $i->alamat_pemohon ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= '00' . $i->rt_pemohon ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= "00" . $i->rw_pemohon ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->provinsi_pemohon ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->kota_pemohon ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->kecamatan_pemohon ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->kelurahan_pemohon ?></span>
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
                        <span class="fw-bold"><?= $i->provinsi_perusahaan ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->kota_perusahaan ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->kecamatan_perusahaan ?></span>
                    </td>
                    <td class="text-center pe-0">
                        <span class="fw-bold"><?= $i->kelurahan_perusahaan ?></span>
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
                <?php } ?>
        </tbody>
    </table>