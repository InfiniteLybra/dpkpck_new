<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?= base_url('assets/') ?>assets/css/cetak.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <img src="<?= base_url('assets/image/kop_surat.jpeg') ?>" alt="" style="width:190mm; height:80px;">
    <h5 class="text-center mb-0 mt-5">INFORMASI KESESUAIAN KEGIATAN PEMANFAATAN RUANG</h5>
    <h6 class="text-center mt-0 mb-0">
        Nomor : <?= $data->nomor ?>
        &nbsp;&nbsp;
        Tanggal : <?php echo date('d-m-y') ?>
    </h6>
    <h6 class=" mt-5 mb-3">
        I. Data Pemohon
    </h6>
    <table class="font-size-10" cellspacing="0" cellpadding="0">
        <tr>
            <td>1.</td>
            <td>Nama </td>
            <td>:</td>
            <td><?= $data->nama_pemohon ?></td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $data->alamat_pemohon ?></td>
        </tr>
        <tr>
            <td>3.</td>
            <td>Bertindak Atas Nama</td>
            <td>:</td>
            <td><?= $data->nama_perusahaan ?></td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $data->alamat_perusahaan ?></td>
        </tr>
        <tr>
            <td>5.</td>
            <td>NIB/SKala Usaha</td>
            <td>:</td>
            <td><?= $data->nib_skala_usaha ?></td>
        </tr>
        <tr>
            <td>6.</td>
            <td>KBLI/Tingkat Risiko</td>
            <td>:</td>
            <td><?= $data->kbli_tingkat_resiko ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><?= $data->kbli_tingkat_resiko ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><?= $data->kbli_tingkat_resiko ?></td>
        </tr>
        <tr>
            <td>7.</td>
            <td>Peruntukan/Luas Tanah</td>
            <td>:</td>
            <td><?= $data->peruntukan ?></td>
        </tr>
        <tr>
            <td>8.</td>
            <td>Lokasi</td>
            <td>:</td>
            <td><?= $data->lokasi ?></td>
        </tr>
        <?php
        $status_tanah_data = json_decode($data->status_tanah, true);
        ?>

        <tr>
            <td>9.</td>
            <td>Status Tanah</td>
            <td>:</td>
            <td><?php echo $status_tanah_data[0]['status_tanah']; ?></td>
        </tr>

        <?php for ($i = 1; $i < count($status_tanah_data); $i++) { ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo $status_tanah_data[$i]['status_tanah']; ?></td>
            </tr>
        <?php } ?>

    </table>
    <h6 class=" mt-3 mb-3">
        II. Ketentuan Pemanfaatan Ruang
    </h6>
    <table width="100%" cellspacing="0" style="border-collapse: collapse;" class="font-size-12">
        <tr>
            <td class="text-center bold" style="border: 1px solid black; padding:0px;">PETA</td>
            <td class="text-center bold" style="border: 1px solid black; padding:0px;">KETENTUAN LAIN</td>
        </tr>
        <tr>
            <td style="border: 1px solid black; padding:0px;" align="center" class="font-size-11">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="text-align: center;">
                            <img src="<?= base_url('assets_dokumen/kkpr/') ?><?= $data->gambar_peta ?>" alt="" style="width: 10cm; height: 9cm;">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;" class="font-size-11">
                            <b>Legenda :</b>
                            <br>
                            <?php
                            $legenda = json_decode($data->legenda);

                            foreach ($legenda as $l) {
                                $get_legenda = $this->db->query("SELECT * FROM legenda WHERE id_legenda = '$l->legenda'")->row();
                            ?>
                            <table style="font-size: 9px;">
                                <tr>
                                    <td><img src="<?php echo base_url('assets/legenda/'); ?><?= $get_legenda->foto ?>" alt="" style="width: 20px; height: 9px;"></td>
                                    <td><?= $get_legenda->legenda ?></td>
                                </tr>
                            </table>                                
                            <?php } ?>
                        </td>
                    </tr>
                </table>                
                <b>Titik koordinat :</b>
                <br>
                <?php
                $koordinat = json_decode($data->titik_koordinat);
                foreach ($koordinat as $k) {
                ?>
                    <?= $k->koordinat_a ?>
                    &nbsp;&nbsp;&nbsp;
                    <?= $k->koordinat_b ?><br>
                    <?= $k->koordinat_c ?>
                    &nbsp;&nbsp;&nbsp;
                    <?= $k->koordinat_d ?><br><br><br>
                <?php } ?>
            </td>
            <td style="border: 1px solid black; padding:3px; font-size: 11; vertical-align: top;" rowspan="3">
                <?php
                $no = 1;
                $ketentuan = json_decode($data->ketentuan_lainya);
                foreach ($ketentuan as $k) {
                    $get = $this->db->query("SELECT * FROM ketentuan_lainya WHERE id_ketentuan_lainya = '$k->ketentuan'")->row();
                    $ketentuan_array = json_decode($get->pilihan);

                    foreach ($ketentuan_array as $g) {
                ?>
                        <?= $no++; ?><?php echo '. ' . $g->ketentuan ?><br>
                <?php }
                } ?>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; border: 1px solid black; height: 20px;" class="text-center bold">INFORMASI PEMANFAATAN RUANG</td>
        </tr>
        <tr>
            <td style="width: 50%; border: 1px solid black;">
                <p class="font-size-11">
                    <?php if ($data->flexsible_zoning == 'diijinkan' || $data->flexsible_zoning == 'bersyarat_tertentu' || $data->flexsible_zoning == 'bersyarat_terbatas') { ?>
                        Dinyatakan "disetujui seluruhnya" sebagai dasar pertimbangan dari:
                    <?php } ?>
                    <?php if ($data->flexsible_zoning == 'tidak_diijinkan') { ?>
                        Dinyatakan "ditolak seluruhnya" sebagai dasar pertimbangan dari:
                    <?php } ?>
                    <br>
                    • Peraturan Presiden Republik Indonesia Nomor 59 Tahun 2019 tentang Pengendalian Alih Fungsi Lahan Sawah dan Berita Acara Kesepakatan Verifikasi Aktual Penyelesaian Ketidaksesuaian Lahan Sawah yang Dilindungi dengan Rencana Tata Ruang antara Direktorat Jenderal Pengendalian dan Penertiban Tanah dan Ruang Kementerian Agraria dan Tata Ruang / Badan Pertanahan Nasional dengan Pemerintah Kabupaten Malang tanggal 15 September 2022,
                    <!-- • lokasi dimohon masuk dalam Peta Lahan Sawah Dilindungi (LSD) seluas "&MASTER!B128&" m² dan tidak masuk dalam Peta Rencana Kawasan Pertanian Pangan Berkelanjutan  (KP2B)  dengan ketentuan  Pemanfaatan Ruang untuk Pembangunan "&DK!G14&" dapat “DIARAHKAN” hanya seluas "&MASTER!B131&" m² dari total lahan "&MASTER!B41&" m²"
                    • lokasi dimohon masuk dalam Peta Lahan Sawah Dilindungi (LSD) seluas "&MASTER!B41&" m² dan masuk dalam Peta Rencana Kawasan Pertanían Pangan Berkelanjutan (KP2B) seluas "&MASTER!B130&" m²."              -->
                </p>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; border: 1px solid black;" class="text-center bold">ARAHAN RENCANA RUANG</td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 50%; border: 1px solid black; padding:5px; vertical-align: top;">
                <table cellspacing="0" cellpadding="0" class=" font-size-10">
                    <tr>
                        <td>1.</td>
                        <td>Luas Tanah yang Disetujui</td>
                        <td>:</td>
                        <td><?= $data->luas_disetujui ?></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Pola Ruang</td>
                        <td>:</td>
                        <td><?= $data->pola_ruang ?></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Masuk Peta LSD</td>
                        <td>:</td>
                        <td><?= $data->luas_tanah_lsd ?></td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Koefisien Dasar Bangunan Maks.</td>
                        <td>:</td>
                        <td><?= $data->koefisien_bangunan ?></td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Koefisien Dasar Hijau Minimal</td>
                        <td>:</td>
                        <td><?= $data->koefisien_dasar_hijau ?></td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>GSP & GSB Min. Lis (Utara)</td>
                        <td>:</td>
                        <td><?= $data->gsp_gsb ?></td>
                    </tr>
                    <!-- <tr>
                        <td></td>
                        <td>GSP & GSB Min. Lis (Barat)</td>
                        <td>:</td>
                        <td>5,50 m & 2,00 m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>GSP & GSB Min. Lis (Selatan)</td>
                        <td>:</td>
                        <td>5,50 m & 2,00 m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>GSP & GSB Min. Lis (Timur)</td>
                        <td>:</td>
                        <td>5,50 m & 2,00 m</td>
                    </tr> -->
                    <tr>
                        <td>7.</td>
                        <td>Koefisien Lantai Bangunan Maks,</td>
                        <td>:</td>
                        <td><?= $data->lantai_bangunan ?></td>
                    </tr>
                </table>
            </td>
            <td class="font-size-11 text-center">
                KEPALA DINAS
                <br>
                PERUMAHAN KAWASAN PERMUKIMAN DAN CIPTA KARYA
                <br>
                KABUPATEN MALANG
                <br><br><br><br><br>
                <div class="bold underline">
                    Dr. Ir. Budiar M.Si
                </div>
                <!-- <br> -->
                Pembina Utama Muda
                <br>
                NIP.19701119 199603 1 004
            </td>
        </tr>
    </table>
    <!-- <p>
        a
        <br>
        a
        <br>
        c
        <br>

    </p> -->
    <!-- <div class="font-size-11 ml-25 text-left">
        <p class="mt-3 mb-3">
            • Peraturan Daerah Kabupaten Malang Nomor 03 Tahun 2010 rtentang Rencana Tata Ruang Wilayah Kabupaten Malang.
        </p>
        <p class="mt-3 mb-3">
            • Peraturan Presiden Republik Indonesia Nomor 59 Tahun 2019 tentang Pengendalian Alih Fungsi Lahan Sawah.
        </p>
        <p class="mt-3 mb-3">
            • Pertimbangan Teknis Pertahanan Kabupaten/Kota .. Nomor ..
        </p>
    </div> -->
    <!-- <h6 class=" mt-3 mb-3">
        III. Informasi Kesesuaian Kegiatan Pemanfaatan Ruang
    </h6> -->
    <!-- <table width="100%" cellspacing="0" style="border-collapse: collapse;" class="font-size-12">
        <tr>
            <td class="text-center bold" style="border: 1px solid black; padding:0px;">PETA</td>
            <td class="text-center bold" style="border: 1px solid black; padding:0px;">KETENTUAN LAIN</td>
        </tr>
        <tr>
            <td style="border: 1px solid black; padding:0px;" align="center">
                <img src="<?= base_url('assets/image/map_exp.jpeg') ?>" alt="" style="width:350px; height:350px;">
            </td>
            <td style="border: 1px solid black; padding:10px;">
                <p class="font-size-11">
                    Mematuhi dan melaksanakan ketentuan-ketentuan yang tertuang dalam:
                    <br>
                    a. Informasi Kesesuaian Kegiatan Pemanfaatan Ruang (KKPR) ini merupakan informasi terkait kesesuaian antara rencana kegiatan pemanfaatan ruang dengan Rencana Tata Ruang Kabupaten Malang yang memuat persyaratan tata bangunan dan lingkungan
                    <br>
                    b. Membuat sistem drainase yang disesuaikan dengan besarnya aliran pembuangan dan kontur tanah untuk menghindari banjir / genangan air
                    <br>
                    c. Menyediakan alat pemadam kebakaran sebagai upaya pencegahan bahaya kebakaran
                    <br>
                    d. Mematuhi dan melaksanakan ketentuan-ketentuan yang tertuang dalam Peraturan Pemerintah Nomor 16 Tahun 2021 tentang Peraturan Pelaksanaan Undang-undang Nomor 28 Tahun 2002 tentang Bangunan Gedung
                    <br>
                    e. Mematuhi dan melaksanakan ketentuan-ketentuan yang tertuang dalam Surat pernyataan pada sistem Online Single Submission (OSS) berkoordinasi dengan Organisasi Perangkat Daerah (OPD) / Instansi terkait
                    <br>
                    f. Informasi KKPR ini berlaku sejauh ketentuan rencana tata ruang dan pemanfaatan ruang dari lokasi yang dimohon serta kawasan sekitarnya tidak berubah dan menjadi batal / dicabut / ditinjau kembali apabila dalam permohonannya didapatkan unsur kelalaian, pemalsuan, penipuan, paksaan, penyesatan dalam memberikan informasi, difungsikan tidak sesuai permohonan dan pemanfaatannya menimbulkan keresahan di masyarakat.
                </p>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; border: 1px solid black;" class="text-center bold">ARAHAN RENCANA POLA RUANG</td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 50%; border: 1px solid black; padding:10px;">
                <table cellspacing="0" cellpadding="0" class=" font-size-11">
                    <tr>
                        <td>1.</td>
                        <td>Luas Tanah yang Disetujui</td>
                        <td>:</td>
                        <td>7.200,0 m²</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Pola Ruang</td>
                        <td>:</td>
                        <td>Tegalan</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Masuk Peta LSD</td>
                        <td>:</td>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Koefisien Dasar Bangunan Maks.</td>
                        <td>:</td>
                        <td>100%=7.200,0 m²</td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Koefisien Dasar Hijau Minimal</td>
                        <td>:</td>
                        <td>10%=42,9 m²</td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>GSP & GSB Min. Lis (Utara)</td>
                        <td>:</td>
                        <td>5,50 m & 2,00 m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>GSP & GSB Min. Lis (Barat)</td>
                        <td>:</td>
                        <td>5,50 m & 2,00 m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>GSP & GSB Min. Lis (Selatan)</td>
                        <td>:</td>
                        <td>5,50 m & 2,00 m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>GSP & GSB Min. Lis (Timur)</td>
                        <td>:</td>
                        <td>5,50 m & 2,00 m</td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Koefisien Lantai Bangunan Maks,</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                </table>
            </td>
            <td class="font-size-11 text-center ">
                KEPALA DINAS
                <br>
                PERUMAHAN KAWASAN PERMUKIMAN DAN CIPTA KARYA
                <br>
                KABUPATEN MALANG
                <br><br><br><br><br>
                <div class="bold underline">
                    Dr. Ir. Budiar M.Si
                </div>
                <br>
                Pembina Utama Muda
                <br>
                NIP.19701119 199603 1 004
            </td>
        </tr>
    </table> -->

</body>

</html>