<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/') ?>assets/css/cetak.css" rel="stylesheet" type="text/css" />
    <title>DRAF PETA INFORMASI KESESUAIAN PEMANFAATAN RUANG</title>
</head>

<body>
    <h4 class="text-center">DRAF PETA KESESUAIAN KEGIATAN PEMANFAATAN RUANG</h4>
    <table width="100%" cellspacing="0" style="border-collapse: collapse;" cellpadding="5">
        <tr>
            <td style="border: 1px solid black; padding: 5px;" colspan="2">
                <table class="font-size-12" cellspacing="0" cellpadding="1" class="font-size-12">
                    <tr>
                        <td>Nama </td>
                        <td>:</td>
                        <td><?= $data->nama_pemohon ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $data->alamat_pemohon ?></td>
                    </tr>
                    <tr>
                        <td>Bertindak Atas Nama</td>
                        <td>:</td>
                        <td><?= $data->nama_perusahaan ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $data->alamat_perusahaan ?></td>
                    </tr>
                    <tr>
                        <td>Peruntukan Dimohon</td>
                        <td>:</td>
                        <td><?= $data->peruntukan_tanah ?></td>
                    </tr>
                    <tr>
                        <td>Lokasi Dimohon</td>
                        <td>:</td>
                        <td><?= $data->lokasi_tanah ?></td>
                    </tr>
                    <tr>
                        <td>Luas Tanah Dimohon</td>
                        <td>:</td>
                        <td><?= $data->luas_tanah ?></td>
                    </tr>
                    <tr>
                        <td>Skala Usaha</td>
                        <td>:</td>
                        <td><?= $data->skala_usaha ?></td>
                    </tr>
                    <tr>
                        <td>Klarifikasi Resiko</td>
                        <td>:</td>
                        <td><?= $data->klasifikasi_resiko ?></td>
                    </tr>
                    <tr>
                        <td>TItik Koordinat (Tengah)</td>
                        <td>:</td>
                        <td><?= $data->titik_koordinat_tengah ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="text-center bold" style="border: 1px solid black; padding:0px;" class="text-center bold">CITRA SATELIT</td>
            <td class="text-center bold" style="border: 1px solid black; padding:0px;" class="text-center bold">PETA RENCANA POLA RUANG</td>
        </tr>
        <style>
            p {
                font-size: 10px;
            }
        </style>

        <tr>
            <td width="51%" align="center" style="border: 1px solid black;">
                <img src="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->citra_satelit ?>" alt="" style="width: 10cm; height: 12cm;">
            </td>
            <td width="49%" style="border: 1px solid black; text-align: center;" class="center font-size-12">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="text-align: center;">
                            <img src="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->pola_ruang ?>" alt="" style="width: 9cm; height: 10cm;">
                        </td>
                    </tr>
                    <!-- <img src="<?= base_url('assets/image/legenda.jpeg') ?>" alt="" style="width: 10cm; height: 1cm;"> -->
                    <tr>
                        <td style="text-align: left;" class="font-size-12">
                            <b>Legenda :</b>
                            <br>
                            <table style="font-size: 8px; border-collapse: collapse;">
                                <?php
                                $legenda = json_decode($data->legenda_pola_ruang);

                                $counter = 0; // Menghitung elemen untuk pengaturan kolom

                                foreach ($legenda as $l) {
                                    $get_legenda = $this->db->query("SELECT * FROM legenda WHERE id_legenda = '$l->legenda'")->row();

                                    // Jika counter adalah kelipatan 2, maka buka baris baru dalam tabel
                                    if ($counter % 2 == 0) {
                                        echo '<tr>';
                                    }
                                ?>
                                    <td style="margin-bottom: 20px;"><img src="<?php echo base_url('assets/legenda/'); ?><?= $get_legenda->foto ?>" alt="" style="width: 8px; height: 3px;"></td>
                                    <td style="margin-bottom: 20px;"><?= $get_legenda->legenda ?></td>
                                <?php
                                    $counter++;

                                    // Jika counter adalah kelipatan 2, maka tutup baris dalam tabel
                                    if ($counter % 2 == 0) {
                                        echo '</tr>';
                                    }
                                }

                                // Jika loop selesai tetapi counter tidak habis dibagi 2, tambahkan sel kosong untuk menutup baris terakhir
                                if ($counter % 2 != 0) {
                                    echo '<td></td><td></td></tr>';
                                }
                                ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black;" class="text-center bold">PETA SITUASI</td>
            <td style="border: 1px solid black;" class="text-center bold">PETA LSD</td>
        </tr>
        <tr>
            <td style="border: 1px solid black; text-align: center;" class="center font-size-12">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="text-align: center;">
                            <img src="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->peta_situasi ?>" alt="" style="width: 10cm; height: 8cm;">
                        </td>
                    </tr>
                    <!-- <img src="<?= base_url('assets/image/legenda.jpeg') ?>" alt="" style="width: 10cm; height: 1cm;"> -->
                    <tr>
                        <td style="text-align: left;" class="font-size-12">
                            <b>Legenda :</b>
                            <br>
                            <?php
                            $legenda = json_decode($data->legenda_peta_situasi);

                            foreach ($legenda as $l) {
                                $get_legenda = $this->db->query("SELECT * FROM legenda WHERE id_legenda = '$l->legenda'")->row();
                            ?>
                                <table style="font-size: 9px;">
                                    <tr>
                                        <td><img src="<?php echo base_url('assets/legenda/'); ?><?= $get_legenda->foto ?>" alt="" style="width: 8px; height: 3px;"></td>
                                        <td><?= $get_legenda->legenda ?></td>
                                    </tr>
                                </table>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="border: 1px solid black; text-align: center;" class="center font-size-12">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="text-align: center;">
                            <img src="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->peta_lsd ?>" alt="" style="width: 10cm; height: 9cm;">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;" class="font-size-12">
                            <b>Legenda :</b>
                            <br>
                            <?php
                            $legenda = json_decode($data->legenda_peta_lsd);

                            foreach ($legenda as $l) {
                                $get_legenda = $this->db->query("SELECT * FROM legenda WHERE id_legenda = '$l->legenda'")->row();
                            ?>
                                <table style="font-size: 9px;">
                                    <tr>
                                        <td><img src="<?php echo base_url('assets/legenda/'); ?><?= $get_legenda->foto ?>" alt="" style="width: 8px; height: 3px;"></td>
                                        <td><?= $get_legenda->legenda ?></td>
                                    </tr>
                                </table>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black;" class="font-size-12">Draf Peta Informasi Kesesuaian Kegiatan Ruang (KKPR) ini merupakan informasi awal terkait kesesuaian antara rencana kegiatan pemanfaatan ruang dengan Rencana Tata Ruang Kabupaten Malang</td>
        </tr>
    </table>
</body>

</html>