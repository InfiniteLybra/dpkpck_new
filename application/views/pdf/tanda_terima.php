<?php
$kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$kkpr->kelurahan_tanah' ")->row();
$kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$kkpr->kecamatan_tanah' ")->row();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/') ?>assets/css/cetak.css" rel="stylesheet" type="text/css" />
    <title>Tanda Terima KKPR</title>
</head>

<body>
    <h4 class="text-center bold">TANDA TERIMA</h4>
    <p>
        Telah diterima berkas permohonan Informasi Kegiatan Pemanfaatan Ruang / Informasi Tata Ruang :
    </p>
    <table>
        <tr>
            <td>Nomor Register</td>
            <td>:</td>
            <td><?= $kkpr->id_kkpr_permohonan ?></td>
        </tr>
        <tr>
            <td>Jenis Permohonan</td>
            <td>:</td>
            <td>Informasi Kesesuaian Kegiatan Pemanfaatan Ruang</td>
        </tr>
        <tr>
            <td>Nomor Induk Berusaha</td>
            <td>:</td>
            <td><?= $kkpr->nib ?></td>
        </tr>
        <tr>
            <td>Nama Pemohon</td>
            <td>:</td>
            <td><?= $kkpr->nama_pemohon ?></td>
        </tr>
        <?php if($kkpr->nama_perusahaan){ ?>
        <tr>
            <td>Bertindak Atas Nama</td>
            <td>:</td>
            <td><?= $kkpr->nama_perusahaan ?></td>
        </tr>
        <?php }?>
        <tr>
            <td>Lokasi Utama</td>
            <td>:</td>
            <td><?php if ($kkpr) echo $kkpr->lokasi_tanah ?> Desa / Kel. <?= $kelurahan_tanah->nama_desa ?> - Kec. <?= $kecamatan_tanah->nama_kecamatan ?></td>
        </tr>
        <tr>
            <td>Skala Usaha</td>
            <td>:</td>
            <td><?= $kkpr->skala_usaha ?></td>
        </tr>
        <tr>
            <td>Peruntukan</td>
            <td>:</td>
            <td><?= $kkpr->peruntukan_tanah ?></td>
        </tr>
    </table>
    <p>Dokumen tersebut telah diterima dalam keadaan baik untuk selanjutnya dapat ditindaklanjuti sebagai permohonan Informasi Kesesuaian Kegiatan Pemanfaatan Ruang / Informasi Tata Ruang sesuai dengan prosedur dan aturanyang berlaku. </p>
    <p class="text-right">
        Kepanjen, ...................................................
    </p>
</body>



</html>