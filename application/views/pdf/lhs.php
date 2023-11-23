<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/') ?>assets/css/cetak.css" rel="stylesheet" type="text/css" />
    <title>Laporan Hasil Survei Untuk Informasi Kesesuaian Pemanfaatan Ruang</title>
</head>

<body>
    <table width="100%" cellspacing="0" style="border-collapse: collapse; font-size: 10px;" cellpadding="2">
        <tr>
            <td width="160">
                <!-- <td> -->
                Tanggal Survei :
                <br>
                <?= $data->tgl_survei?>
                <br>
                Petugas Teknis :
                <br>
                1. <?= $data->petugas1?>
                <br>
                2. <?= $data->petugas2?>
            </td>
            <td align="right" colspan="2" class="font-size-12">
                <b>
                    LAPORAN HASIL SURVEI
                    <br>
                    UNTUK INFORMASI KESESUIAN KEGIATAN PEMANFAATAN RUANG
                    <br>
                </b>
                (No. Register : <?= $data->no_reg?> Tgl. <?= $data->tgl_survei?>)
            </td>
        </tr>
        <?php $kkpr = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$data->id_permohonan'")->row(); ?>
        <tr>
            <th colspan="3">Peruntukan dimohon [Kategori] : <?= $kkpr->kategori?></th>
        </tr>
        <tr>
            <td style="border: 1px solid black; padding:8px;" colspan="3" class="bold gray">
                IDENTITAS PEMOHON
            </td>
        </tr>
        <tr>
            <td>Nama </td>
            <td width="10">:</td>
            <td align="left "><?= $data->nama_pemohon?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td align="left"><?= $data->alamat_pemohon?></td>
        </tr>
        <tr>
            <td>Bertindak Atas Nama</td>
            <td>:</td>
            <td align="left"><?= $data->nama_perusahaan?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td align="left"><?= $data->alamat_perusahaan?></td>
        </tr>
        <tr>
            <td>NIB</td>
            <td>:</td>
            <td align="left"><?= $data->nib?></td>
        </tr>

        <tr>
            <td style="border: 1px solid black; padding:8px;" colspan="3" class="bold gray">
                KONDISI EKSISTING OBJEK
            </td>
        </tr>
        <tr>
            <td>Lokasi dimohon</td>
            <td>:</td>
            <td><?= $data->lokasi?></td>
        </tr>
        <tr>
            <td>Titik Koordinat</td>
            <td>:</td>
            <td><?= $data->koordinat?></td>
        </tr>
        <tr>
            <td>L. Tanah DIluar Sempadan Jalan</td>
            <td>:</td>
            <td><?= $data->luas_tanah_jalan?></td>
        </tr>
        <tr>
            <td>Guna Lahan saat Survei</td>
            <td>:</td>
            <td><?= $data->guna_lahan?></td>
        </tr>
        <tr>
            <td>Batas Utara</td>
            <td>:</td>
            <td><?= $data->batas_utara?></td>
        </tr>
        <tr>
            <td>Batas Selatan</td>
            <td>:</td>
            <td><?= $data->batas_selatan?></td>
        </tr>
        <tr>
            <td>Batas Barat</td>
            <td>:</td>
            <td><?= $data->batas_barat?></td>
        </tr>
        <tr>
            <td>Batas Timur</td>
            <td>:</td>
            <td><?= $data->batas_timur?></td>
        </tr>
        <tr>
            <td>Kemiringan Tanah</td>
            <td>:</td>
            <td><?= $data->kemiringan_tanah?></td>
        </tr>
        <tr>
            <td>Fungsi dan Kelas Jalan</td>
            <td>:</td>
            <td><?= $data->fungsi_kelas_jalan?></td>
        </tr>
        <tr>
            <td>Penampang Melintang Jalan</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <img src="<?= base_url('assets/lhs/atas_lhs.jpg') ?>" style="width: 25cm; height: 8cm;">
            </td>            
        </tr>
        <tr>
            <td colspan="3" align="left">
                <table width="100%">
                    <tr>
                        <td style="width: 140px;">Barat</td>
                        <td style="width: 80px;">23</td>
                        <td style="width: 48px;">2</td>
                        <td style="width: 49px;">23</td>
                        <td style="width: 50px;">24</td>
                        <td style="width: 50px;">25</td>
                        <td style="width: 140px;">26</td>
                        <td style="width: 128px;">72</td>
                        <td style="width: 25px;">28</td>
                        <td style="width: 14px;"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="10" align="right">
                            <img src="<?= base_url('assets/lhs/garis1.jpg') ?>" width="367px">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" align="left">
                            Barat
                        </td align="left">
                        <td>1/2 Badan Jalan = 4</td>
                    </tr>
                    <tr>
                        <td colspan="10" align="right">
                            <img src="<?= base_url('assets/lhs/garis2.jpg') ?>" width="475px">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" align="left">
                            Barat
                        </td align="left">
                        <td>1/2 Rumaja = 6</td>
                    </tr>
                    <tr>
                        <td colspan="10" align="right">
                            <img src="<?= base_url('assets/lhs/garis3.jpg') ?>" width="533px">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" align="left">
                            Barat
                        </td align="left">
                        <td>1/2 Rumaja = 6</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <table width="100%">
                    <tr>
                        <td>
                            <img src="<?= base_url('assets_dokumen/kkpr/') ?><?= $data->foto1?>" style="width: 6cm; height: 4cm;">
                            <br>
                            <table style="border: 1;">
                                <tr>
                                    <td>
                                        <?= $data->keterangan1?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <img src="<?= base_url('assets_dokumen/kkpr/') ?><?= $data->foto2?>" style="width: 6cm; height: 4cm;">
                            <br>
                            <table style="border: 1;">
                                <tr>
                                    <td>
                                    <?= $data->keterangan2?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <img src="<?= base_url('assets_dokumen/kkpr/') ?><?= $data->foto3?>" style="width: 6cm; height: 4cm;">
                            <br>
                            <table style="border: 1;">
                                <tr>
                                    <td>
                                    <?= $data->keterangan3?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?= base_url('assets_dokumen/kkpr/') ?><?= $data->foto4?>" style="width: 6cm; height: 4cm;">
                            <br>
                            <table style="border: 1;">
                                <tr>
                                    <td>
                                    <?= $data->keterangan4?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <img src="<?= base_url('assets_dokumen/kkpr/') ?><?= $data->foto5?>" style="width: 6cm; height: 4cm;">
                            <br>
                            <table style="border: 1;">
                                <tr>
                                    <td>
                                    <?= $data->keterangan5?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <img src="<?= base_url('assets_dokumen/kkpr/') ?><?= $data->foto6?>" style="width: 6cm; height: 4cm;">
                            <br>
                            <table style="border: 1;">
                                <tr>
                                    <td>
                                    <?= $data->keterangan6?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid black; padding:8px;" colspan="3" class="bold gray">
                RENCANA TATA RUANG
            </td>
        </tr>
        <tr>
            <td colspan="3">Perda Kab. Malang No. 03 Tahun 2010 tentang Rencana Tata Ruang Wilayah Kabupaten Malang</td>
        </tr>
        <tr>
            <td>Rencana Pola Ruang</td>
            <td>:</td>
            <td>Tegalan</td>
        </tr>
        <tr>
            <td>Masuk LSD</td>
            <td>:</td>
            <td><?php if($data->masuk_lsd == '1'){echo "Ya";}else{echo"Tidak";} ?></td>
        </tr>
        <?php if($data->yn_radius_mata_air == 1){ ?>
        <tr>
            <td>Radius Dengan Air Mata</td>
            <td>:</td>
            <td><?= $data->radius_mata_air?></td>
        </tr>
        <?php }else{?>
        <tr>
            <td>Radius Dengan Air Mata</td>
            <td>:</td>
            <td>Tidak</td>
        </tr>
        <?php }?>
        <tr>
            <td>Melewati Lahan Pihak Lain</td>
            <td>:</td>
            <td><?php if($data->pihak_lain == '1'){echo "Ya";}else{echo"Tidak";} ?></td>
        </tr>
        <tr>
            <td>Kronologi</td>
            <td>:</td>
            <td><?= $data->kronologi?></td>
        </tr>
    </table>
</body>

</html>