<?php
if ($cek) {
} else {
    $kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$data->kelurahan_pemohon' ")->row();
    $kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$data->kecamatan_pemohon' ")->row();
    $kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$data->kota_pemohon' ")->row();
    $provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$data->provinsi_pemohon' ")->row();
    $kelurahan_perusahaan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$data->kelurahan_perusahaan' ")->row();
    $kecamatan_perusahaan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$data->kecamatan_perusahaan' ")->row();
    $kota_perusahaan = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$data->kota_perusahaan' ")->row();
    $provinsi_perusahaan = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$data->provinsi_perusahaan' ")->row();
    $kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$data->kelurahan_tanah' ")->row();
    $kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$data->kecamatan_tanah' ")->row();
}
?>
<!--begin::details View-->
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Config Peta</h3>
        </div>
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        <form method="POST" action="<?php echo base_url('Kkpr/proses_config_peta'); ?>" enctype="multipart/form-data">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table" border="0">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-center min-w-50px"></th>
                        <th class="text-center min-w-200px"></th>
                        <th class="min-w-300px"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">1</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Nomor</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="nomor" class="form-control" value="<?= $data->nomor ?>">
                                <input type="hidden" name="id_permohonan" class="form-control" value="<?= $data->id_permohonan ?>">
                            <?php } else { ?>
                                <input type="text" name="nomor" class="form-control" value="<?= '600.3.3.2 /00' . $data->id_kkpr_permohonan . '/ 35.07.111' ?>">
                                <input type="hidden" name="id_permohonan" class="form-control" value="<?= $data->id_kkpr_permohonan ?>">

                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">2</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Nama</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="nama_pemohon" class="form-control" value="<?= $data->nama_pemohon ?>">
                            <?php } else { ?>
                                <input type="text" name="nama_pemohon" class="form-control" value="<?= $data->nama_pemohon ?>">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">3</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Alamat</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <textarea class="form-control" name="alamat_pemohon" data-kt-autosize="true"><?php if ($data) echo $data->alamat_pemohon ?> </textarea>
                            <?php } else { ?>
                                <textarea class="form-control" name="alamat_pemohon" data-kt-autosize="true"><?php if ($data) echo $data->alamat_pemohon ?> RT. <?php if ($data) echo $data->rt_pemohon ?> RW. <?php if ($data) echo $data->rw_pemohon ?> Kel. <?= $kelurahan->subdis_name ?> - Kec. <?= $kecamatan->dis_name ?> - Kota / Kab. <?= $kota->city_name ?> - Prov. <?= $provinsi->prov_name ?></textarea>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">4</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Bertindak Atas Nama</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="nama_perusahaan" class="form-control" value="<?php if ($data->nama_perusahaan) echo $data->nama_perusahaan ?>">
                            <?php } else { ?>
                                <input type="text" name="nama_perusahaan" class="form-control" value="<?php if ($data->nama_perusahaan) echo $data->nama_perusahaan ?>">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">5</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Alamat</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <textarea class="form-control" name="alamat_perusahaan" data-kt-autosize="true"><?php if ($data->nama_perusahaan) echo $data->alamat_perusahaan ?> 
                            </textarea>
                            <?php } else { ?>
                                <textarea class="form-control" name="alamat_perusahaan" data-kt-autosize="true"><?php if ($data->nama_perusahaan) echo $data->alamat_perusahaan ?> <?php if ($data->nama_perusahaan) echo 'RT. ' . $data->rt_perusahaan . '' ?> <?php if ($data->nama_perusahaan) echo 'RW. ' . $data->rw_perusahaan . '' ?> <?php if ($data->nama_perusahaan) echo 'Kel. ' . $kelurahan_perusahaan->subdis_name . '' ?> <?php if ($data->nama_perusahaan) echo '- Kec. ' . $kecamatan_perusahaan->dis_name . '' ?> <?php if ($data->nama_perusahaan) echo '- Kota / Kab. ' . $kota_perusahaan->city_name . '' ?> <?php if ($data->nama_perusahaan) echo '- Prov. ' . $provinsi_perusahaan->prov_name . '' ?>
                                </textarea>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">6</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">NIB/Skala Usaha</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="nib_skala_usaha" class="form-control" value="<?php if ($data) echo $data->nib_skala_usaha ?>">
                            <?php } else { ?>
                                <input type="text" name="nib_skala_usaha" class="form-control" value="<?php if ($data) echo $data->nib ?> / <?php if ($data) echo $data->skala_usaha ?>">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">7</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">KBLI/Tingkat Resiko</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="kbli_tingkat_resiko" class="form-control" value="<?php if ($data) echo $data->kbli_tingkat_resiko ?>">
                            <?php } else { ?>
                                <input type="text" name="kbli_tingkat_resiko" class="form-control" value="<?php if ($data) echo $data->kbli ?> - <?php if ($data) echo $data->kategori ?> / <?php if ($data) echo $data->klasifikasi_resiko ?>">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">8</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Peruntukan</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="peruntukan" class="form-control" value="<?= $data->peruntukan ?>">
                            <?php } else { ?>
                                <input type="text" name="peruntukan" class="form-control" value="<?= $data->peruntukan_tanah ?>">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">9</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Lokasi</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="lokasi" class="form-control" value="<?php if ($data) echo $data->lokasi ?> ">
                            <?php } else { ?>
                                <input type="text" name="lokasi" class="form-control" value="<?php if ($data) echo $data->lokasi_tanah ?> Desa / Kel. <?= $kelurahan_tanah->nama_desa ?> - Kec. <?= $kecamatan_tanah->nama_kecamatan ?> ">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">10</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Luas Tanah</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="luas_tanah" class="form-control" value="<?= $data->luas_tanah ?>">
                            <?php } else { ?>
                                <input type="text" name="luas_tanah" class="form-control" value="<?= $data->luas_tanah . ' m2' ?>">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">11</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Status Tanah</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <?php
                                $status = json_decode($data->status_tanah);
                                $no = 1;
                                foreach ($status as $s) {
                                ?>
                                    <div class="mb-3 row">
                                        <input type="text" name="status_tanah_" .<?= $no++; ?>."" class="form-control" value="<?= $s->status_tanah ?>">
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <?php
                                $status = json_decode($data->status_tanah);
                                $no = 1;
                                foreach ($status as $s) {
                                ?>
                                    <div class="mb-3 row">
                                        <input type="text" name="status_tanah_" .<?= $no++; ?>."" class="form-control" value="<?= $s->status_tanah ?>" readonly>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">12</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Gambar Peta</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <div class="d-flex">
                                    <input type="file" name="peta" class="form-control flex-grow-1" value="">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->gambar_peta ?>" class="btn btn-light fw-bold flex-shrink-0" target="_blank">Lihat Disini</a>
                                </div>
                            <?php } else { ?>
                                <input type="file" name="peta" class="form-control" value="">
                                <small style="float: left;"><a href="<?php echo base_url('Map'); ?>" target="_blank">Shp Map</a></small>
                            <?php } ?>
                        </td>
                    </tr>
                    <style>
                        .checkbox-container {
                            display: flex;
                            flex-wrap: wrap;
                        }

                        .form-check {
                            flex-basis: calc(44.44% - 20px);
                            /* 33.33% untuk 3 kolom, 20px untuk jarak antar checkbox */
                            margin-right: 20px;
                            margin-top: 4px;
                        }
                    </style>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">13</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Legenda</span>
                        </td>
                        <td class="pe-0">
                            <div class="checkbox-container">
                                <?php if ($cek) { ?>
                                    <?php
                                    $legenda = $this->db->query("SELECT * FROM legenda")->result();   
                                    $get = json_decode($cek->legenda, true);                                 
                                    foreach ($legenda as $l) {
                                    ?>
                                        <div class="form-check">
                                            <?php
                                            // Periksa apakah $l->id ada di dalam array $get
                                            $isChecked = in_array($l->id_legenda, array_column($get, 'legenda'));
                                            ?>
                                            <input class="form-check-input" type="checkbox" value="<?= $l->id_legenda ?>" id="legenda[]" name="legenda[]" <?php if ($isChecked) echo 'checked' ?> />
                                            <label class="form-check-label" for="legenda" style="float: left;">
                                            <img src="<?php echo base_url('assets/legenda/'); ?><?= $l->foto ?>" alt="" style="width: 30px; height: 14px;">
                                                <?= $l->legenda ?>
                                            </label>
                                        </div>
                                    <?php } ?>                                    

                                <?php } else { ?>
                                    <?php
                                    $legenda = $this->db->query("SELECT * FROM legenda")->result();
                                    // $legenda = json_decode($get_legenda->pilihan);
                                    // $no = 1;
                                    foreach ($legenda as $l) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?= $l->id_legenda ?>" id="legenda[]" name="legenda[]" />
                                            <label class="form-check-label" for="legenda" style="float: left;">
                                                <img src="<?php echo base_url('assets/legenda/'); ?><?= $l->foto ?>" alt="" style="width: 20px; height: 9px;">
                                                <?= $l->legenda ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <!-- Jika ingin menambah checkbox baru, cukup tambahkan div.form-check seperti contoh di atas -->
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">14</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Titik Koordinat</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) {
                                $koordinat = json_decode($data->titik_koordinat);
                                foreach ($koordinat as $k) {
                            ?>
                                    <div class="mb-3 row">
                                        <input type="text" name="koordinat_a" class="form-control" value="<?= $k->koordinat_a ?>">
                                    </div>
                                    <div class="mb-3 row">
                                        <input type="text" name="koordinat_b" class="form-control" value="<?= $k->koordinat_b ?>">
                                    </div>
                                    <div class="mb-3 row">
                                        <input type="text" name="koordinat_c" class="form-control" value="<?= $k->koordinat_c ?>">
                                    </div>
                                    <div class="mb-3 row">
                                        <input type="text" name="koordinat_d" class="form-control" value="<?= $k->koordinat_d ?>">
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="mb-3 row">
                                    <input type="text" name="koordinat_a" class="form-control" value="a.">
                                </div>
                                <div class="mb-3 row">
                                    <input type="text" name="koordinat_b" class="form-control" value="b.">
                                </div>
                                <div class="mb-3 row">
                                    <input type="text" name="koordinat_c" class="form-control" value="c.">
                                </div>
                                <div class="mb-3 row">
                                    <input type="text" name="koordinat_d" class="form-control" value="d.">
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">15</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Ketentuan Lainya</span>
                        </td>
                        <td class="pe-0">
                            <div class="checkbox-container">
                            <?php if ($cek) {?>
                                <?php
                                $get_ketentuan = json_decode($cek->ketentuan_lainya, true);
                                foreach ($ketentuan as $k) {
                                ?>
                                    <div class="form-check">
                                        <?php
                                            // Periksa apakah $l->id ada di dalam array $get
                                            $isChecked = in_array($k->id_ketentuan_lainya, array_column($get_ketentuan, 'ketentuan'));
                                            ?>
                                        <input class="form-check-input" type="checkbox" value="<?= $k->id_ketentuan_lainya ?>" id="ketentuan[]" name="ketentuan[]" <?php if ($isChecked) echo 'checked' ?>  />
                                        <label class="form-check-label" for="ketentuan<?= $k->id_ketentuan_lainya ?>" style="float: left;">
                                            <?= $k->nama_pilihan ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            <?php }else{?>
                                <?php
                                foreach ($ketentuan as $k) {
                                ?>
                                    <div class="form-check">                                        
                                        <input class="form-check-input" type="checkbox" value="<?= $k->id_ketentuan_lainya ?>" id="ketentuan[]" name="ketentuan[]"  />
                                        <label class="form-check-label" for="ketentuan<?= $k->id_ketentuan_lainya ?>" style="float: left;">
                                            <?= $k->nama_pilihan ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            <?php }?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">16</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Flexsible Zoning</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <select name="flexsible_zoning" id="flexsible_zoning" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                    <option value="" selected></option>
                                    <option value="diijinkan" <?php if ($data->flexsible_zoning == 'diijinkan') echo "selected" ?>>diijinkan</option>
                                    <option value="bersyarat_tertentu" <?php if ($data->flexsible_zoning == 'bersyarat_tertentu') echo "selected" ?>>bersyarat tertentu</option>
                                    <option value="bersyarat_terbatas" <?php if ($data->flexsible_zoning == 'bersyarat_terbatas') echo "selected" ?>>bersyarat terbatas</option>
                                    <option value="tidak_diijinkan" <?php if ($data->flexsible_zoning == 'tidak_diijinkan') echo "selected" ?>>tidak diijinkan</option>
                                </select>
                            <?php } else { ?>
                                <select name="flexsible_zoning" id="flexsible_zoning" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                    <option value="" selected></option>
                                    <option value="diijinkan">diijinkan</option>
                                    <option value="bersyarat_tertentu">bersyarat tertentu</option>
                                    <option value="bersyarat_terbatas">bersyarat terbatas</option>
                                    <option value="tidak_diijinkan">tidak diijinkan</option>
                                </select>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">17</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Luas Tanah yang diSetujui</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="luas_tanah_disetujui" class="form-control" value="<?= $data->luas_disetujui ?>">
                            <?php } else { ?>
                                <input type="text" name="luas_tanah_disetujui" class="form-control" value="m2">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">18</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Pola Ruang</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="pola_ruang" class="form-control" value="<?php echo $data->pola_ruang ?>">
                            <?php } else { ?>
                                <input type="text" name="pola_ruang" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">19</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Luas Tanah Masuk Peta LSD</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="luas_tanah_lsd" class="form-control" value="<?= $data->luas_tanah_lsd ?>">
                            <?php } else { ?>
                                <input type="text" name="luas_tanah_lsd" class="form-control" value="m2">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">20</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Koefisien Dasar Bangunan Maks.</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="koefisien_bangunan" class="form-control" value="<?= $data->koefisien_bangunan ?>">
                            <?php } else { ?>
                                <input type="text" name="koefisien_bangunan" class="form-control" value="m2">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">21</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Koefiien Dasar Hijau Minimal</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="koefisien_dasar_hijau" class="form-control" value="<?= $data->koefisien_dasar_hijau ?>">
                            <?php } else { ?>
                                <input type="text" name="koefisien_dasar_hijau" class="form-control" value="m2">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">22</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">GSP & GSB Min. Lis (Utara)</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="gsp_gsb" class="form-control" value="<?= $data->gsp_gsb ?>">
                            <?php } else { ?>
                                <input type="text" name="gsp_gsb" class="form-control" value="m2">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">23</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Koefisien Lantai Bangunan Maks.</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="koefisien_lantai" class="form-control" value="<?= $data->lantai_bangunan ?>">
                            <?php } else { ?>
                                <input type="text" name="koefisien_lantai" class="form-control" value="m2">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold"></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"></span>
                        </td>
                        <td class="d-flex justify-content-end me-2">
                            <a href="<?php echo base_url('kkpr/config'); ?>" class="btn btn-light">Kembali</a>&ensp;
                            <?php if ($cek) { ?>
                                <a href="<?php echo base_url('Pdf/laporan_kkpr/'); ?><?= $data->id_permohonan ?>" download class="btn btn-danger">Download PDF</a>&ensp;
                            <?php } else { ?>
                                <a href="<?php echo base_url('Pdf/laporan_kkpr/'); ?><?= $data->id_kkpr_permohonan ?>" download class="btn btn-danger">Download PDF</a>&ensp;
                            <?php } ?>
                            <!-- <?php if ($cek) { ?>
                                <a href="<?php echo base_url('Excel/laporan_kkpr/'); ?><?= $data->id_permohonan ?>" download class="btn btn-success">Download EXCEL</a>&ensp;
                            <?php } else { ?>
                                <a href="<?php echo base_url('Excel/laporan_kkpr/'); ?><?= $data->id_kkpr_permohonan ?>" download class="btn btn-success">Download EXCEL</a>&ensp;
                            <?php } ?> -->
                            <button type="submit" class="btn btn-primary">Simpan</button>&ensp;                            
                            <?php if ($cek) { ?>
                                <?php 
                                    $cek_sertifikat = $this->db->query("SELECT * FROM data_sertifikat_peta WHERE id_permohonan = '$data->id_permohonan ' ")->row();
                                    if($cek_sertifikat){ 
                                ?>
                                <a href="<?php echo base_url('Pdf/laporan_kkpr/'); ?><?= $data->id_permohonan ?>" target="_blank" class="btn btn-info">Lihat</a>
                            <?php }} else { ?>
                                <?php 
                                    $cek_sertifikat = $this->db->query("SELECT * FROM data_sertifikat_peta WHERE id_permohonan = '$data->id_kkpr_permohonan ' ")->row();
                                    if($cek_sertifikat){ 
                                ?>
                                <a href="<?php echo base_url('Pdf/laporan_kkpr/'); ?><?= $data->id_kkpr_permohonan ?>" target="_blank" class="btn btn-info">Lihat</a>
                            <?php }} ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->