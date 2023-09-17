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
<style>
  /* Ganti warna latar belakang (background) input menjadi abu-abu */
  input[type="text"].form-control[readonly] {
    background-color: #F0F0F0; /* Warna abu-abu */
  }
  textarea.form-control[readonly] {
    background-color: #F0F0F0; /* Warna abu-abu */
  }
</style>
<!--begin::details View-->
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Config Draf Peta</h3>
        </div>
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        <form method="POST" action="<?php echo base_url('Kkpr/proses_config_draft_peta'); ?>" enctype="multipart/form-data">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table" border="0">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-center min-w-50px"></th>
                        <th class="text-center min-w-200px"></th>
                        <th class="text-center min-w-300px"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">1</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Nama</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="nama_pemohon" class="form-control" value="<?= $data->nama_pemohon ?>"readonly>
                                <input type="hidden" name="id_permohonan" class="form-control" value="<?= $data->id_permohonan ?>">
                            <?php } else { ?>
                                <input type="text" name="nama_pemohon" class="form-control" value="<?= $data->nama_pemohon ?>"readonly>
                                <input type="hidden" name="id_permohonan" class="form-control" value="<?= $data->id_kkpr_permohonan ?>">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">2</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Alamat</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <textarea class="form-control" name="alamat_pemohon" data-kt-autosize="true"readonly><?php if ($data) echo $data->alamat_pemohon ?>
                            </textarea>
                            <?php } else { ?>
                                <textarea class="form-control" name="alamat_pemohon" data-kt-autosize="true"readonly><?php if ($data) echo $data->alamat_pemohon ?> RT. <?php if ($data) echo $data->rt_pemohon ?> RW. <?php if ($data) echo $data->rw_pemohon ?> Kel. <?= $kelurahan->subdis_name ?> - Kec. <?= $kecamatan->dis_name ?> - Kota / Kab. <?= $kota->city_name ?> - Prov. <?= $provinsi->prov_name ?>
                                </textarea>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">3</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Bertindak Atas Nama</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="nama_perusahaan" class="form-control" value="<?php if ($data->nama_perusahaan) echo $data->nama_perusahaan ?>"readonly>
                            <?php } else { ?>
                                <input type="text" name="nama_perusahaan" class="form-control" value="<?php if ($data->nama_perusahaan) echo $data->nama_perusahaan ?>"readonly>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">4</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Alamat</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <textarea class="form-control" name="alamat_perusahaan" data-kt-autosize="true"readonly><?php if ($data->nama_perusahaan) echo $data->alamat_perusahaan ?>
                                </textarea>
                            <?php } else { ?>
                                <textarea class="form-control" name="alamat_perusahaan" data-kt-autosize="true"readonly><?php if ($data->nama_perusahaan) echo $data->alamat_perusahaan ?> <?php if ($data->nama_perusahaan) echo 'RT. ' . $data->rt_perusahaan . '' ?> <?php if ($data->nama_perusahaan) echo 'RW. ' . $data->rw_perusahaan . '' ?> <?php if ($data->nama_perusahaan) echo 'Kel. ' . $kelurahan_perusahaan->subdis_name . '' ?> <?php if ($data->nama_perusahaan) echo '- Kec. ' . $kecamatan_perusahaan->dis_name . '' ?> <?php if ($data->nama_perusahaan) echo '- Kota / Kab. ' . $kota_perusahaan->city_name . '' ?> <?php if ($data->nama_perusahaan) echo '- Prov. ' . $provinsi_perusahaan->prov_name . '' ?>
                                </textarea>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">5</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Peruntukan</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="peruntukan" class="form-control" value="<?= $data->peruntukan_tanah ?>"readonly>
                            <?php } else { ?>
                                <input type="text" name="peruntukan" class="form-control" value="<?= $data->peruntukan_tanah ?>"readonly>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">6</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Lokasi</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="lokasi" class="form-control" value="<?php if ($data) echo $data->lokasi_tanah ?> "readonly>
                            <?php } else { ?>
                                <input type="text" name="lokasi" class="form-control" value="<?php if ($data) echo $data->lokasi_tanah ?> Desa / Kel. <?= $kelurahan_tanah->nama_desa ?> - Kec. <?= $kecamatan_tanah->nama_kecamatan ?> "readonly>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">7</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Luas Tanah</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="luas_tanah" class="form-control" value="<?= $data->luas_tanah ?>"readonly>
                            <?php } else { ?>
                                <input type="text" name="luas_tanah" class="form-control" value="<?= $data->luas_tanah . ' m2' ?>"readonly>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">8</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Skala Usaha</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="skala_usaha" class="form-control" value="<?php if ($data) echo $data->skala_usaha ?>"readonly>
                            <?php } else { ?>
                                <input type="text" name="skala_usaha" class="form-control" value="<?php if ($data) echo $data->skala_usaha ?>"readonly>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">9</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Klasifikasi Risiko</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="klasifikasi_resiko" class="form-control" value="<?php if ($data) echo $data->klasifikasi_resiko ?>"readonly>
                            <?php } else { ?>
                                <input type="text" name="klasifikasi_resiko" class="form-control" value="<?php if ($data) echo $data->klasifikasi_resiko ?>"readonly>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">10</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Titik Koordinat Tengah</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="koordinat_tengah" class="form-control" value="<?php if ($data) echo $data->titik_koordinat_tengah ?>">
                            <?php } else { ?>
                                <input type="text" name="koordinat_tengah" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">11</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Citra Satelit</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <div class="d-flex">
                                    <input type="file" name="citra_satelit" class="form-control flex-grow-1" value="">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->citra_satelit ?>" target="_blank" class="btn btn-light fw-bold flex-shrink-0">Lihat Disini</a>
                                </div>
                            <?php } else { ?>
                                <input type="file" name="citra_satelit" class="form-control" value="">
                                <!-- <small style="float: left;"><a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->peta_bidang ?>" target="_blank">Lihat Disini</a></small> -->
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">12</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Peta Rencana Pola Ruang</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <div class="d-flex">
                                    <input type="file" name="pola_ruang" class="form-control flex-grow-1" value="">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->pola_ruang ?>" class="btn btn-light fw-bold flex-shrink-0" target="_blank">Lihat Disini</a>
                                </div>
                            <?php } else { ?>
                                <input type="file" name="pola_ruang" class="form-control" value="">
                                <!-- <small style="float: left;"><a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->peta_bidang ?>" target="_blank">Lihat Disini</a></small> -->
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
                            <span class="fw-bold">Legenda Untuk Rencana Pola Ruang</span>
                        </td>
                        <td class="pe-0">
                            <div class="checkbox-container">
                                <?php if ($cek) { ?>
                                    <?php
                                    $legenda = $this->db->query("SELECT * FROM legenda WHERE type = 'peta'")->result();
                                    $get = json_decode($cek->legenda_pola_ruang, true);
                                    foreach ($legenda as $l) {
                                    ?>
                                        <div class="form-check">
                                            <?php
                                            // Periksa apakah $l->id ada di dalam array $get
                                            $isChecked = in_array($l->id_legenda, array_column($get, 'legenda'));
                                            ?>
                                            <input class="form-check-input" type="checkbox" value="<?= $l->id_legenda ?>" id="legenda_pola_ruang[]" name="legenda_pola_ruang[]" <?php if ($isChecked) echo 'checked' ?> />
                                            <label class="form-check-label" for="legenda" style="float: left;">
                                            <img src="<?php echo base_url('assets/legenda/'); ?><?= $l->foto ?>" alt="" style="width: 30px; height: 14px;">
                                                <?= $l->legenda ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <?php
                                    $legenda = $this->db->query("SELECT * FROM legenda")->result();
                                    foreach ($legenda as $l) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?= $l->id_legenda ?>" id="legenda_pola_ruang[]" name="legenda_pola_ruang[]" />
                                            <label class="form-check-label" for="legenda" style="float: left;">
                                            <img src="<?php echo base_url('assets/legenda/'); ?><?= $l->foto ?>" alt="" style="width: 30px; height: 14px;">
                                                <?= $l->legenda ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">14</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Peta Situasi</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <div class="d-flex">
                                    <input type="file" name="peta_situasi" class="form-control flex-grow-1" value="">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->peta_situasi ?>" target="_blank" class="btn btn-light fw-bold flex-shrink-0">Lihat Disini</a>
                                </div>
                            <?php } else { ?>
                                <input type="file" name="peta_situasi" class="form-control" value="">
                                <!-- <small style="float: left;"><a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->peta_bidang ?>" target="_blank">Lihat Disini</a></small> -->
                            <?php } ?>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">15</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Legenda Untuk Peta Situasi</span>
                        </td>
                        <td class="pe-0">
                            <div class="checkbox-container">
                            <?php if ($cek) { ?>
                                <?php
                                    $legenda = $this->db->query("SELECT * FROM legenda")->result();   
                                    $get = json_decode($cek->legenda_peta_situasi, true);                                 
                                    foreach ($legenda as $l) {
                                    ?>
                                        <div class="form-check">
                                            <?php                                           
                                            $isChecked = in_array($l->id_legenda, array_column($get, 'legenda'));
                                            ?>
                                            <input class="form-check-input" type="checkbox" value="<?= $l->id_legenda ?>" id="legenda_peta_situasi[]" name="legenda_peta_situasi[]" <?php if ($isChecked) echo 'checked' ?> />
                                            <label class="form-check-label" for="legenda" style="float: left;">
                                            <img src="<?php echo base_url('assets/legenda/'); ?><?= $l->foto ?>" alt="" style="width: 30px; height: 14px;">
                                                <?= $l->legenda ?>
                                            </label>
                                        </div>
                                    <?php } ?>   
                            <?php } else { ?>
                                <?php
                                $legenda = $this->db->query("SELECT * FROM legenda")->result();
                                foreach ($legenda as $l) {
                                ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?= $l->id_legenda ?>" id="legenda_peta_situasi[]" name="legenda_peta_situasi[]" />
                                        <label class="form-check-label" for="legenda" style="float: left;">
                                        <img src="<?php echo base_url('assets/legenda/'); ?><?= $l->foto ?>" alt="" style="width: 30px; height: 14px;">
                                            <?= $l->legenda ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            </div>
                        </td>
                    </tr> -->
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">16</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Peta LSD</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <div class="d-flex">
                                    <input type="file" name="peta_lsd" class="form-control flex-grow-1" value="">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->peta_lsd ?>" target="_blank" class="btn btn-light fw-bold flex-shrink-0">Lihat Disini</a>
                                </div>
                            <?php } else { ?>
                                <input type="file" name="peta_lsd" class="form-control" value="">
                                <!-- <small style="float: left;"><a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->peta_bidang ?>" target="_blank">Lihat Disini</a></small> -->
                            <?php } ?>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">17</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Legenda Untuk Peta LSD</span>
                        </td>
                        <td class="pe-0">
                            <div class="checkbox-container">
                            <?php if ($cek) { ?>
                                <?php
                                    $legenda = $this->db->query("SELECT * FROM legenda")->result();   
                                    $get = json_decode($cek->legenda_peta_lsd, true);                                 
                                    foreach ($legenda as $l) {
                                    ?>
                                        <div class="form-check">
                                            <?php
                                            // Periksa apakah $l->id ada di dalam array $get
                                            $isChecked = in_array($l->id_legenda, array_column($get, 'legenda'));
                                            ?>
                                            <input class="form-check-input" type="checkbox" value="<?= $l->id_legenda ?>" id="legenda_lsd[]" name="legenda_lsd[]" <?php if ($isChecked) echo 'checked' ?> />
                                            <label class="form-check-label" for="legenda" style="float: left;">
                                            <img src="<?php echo base_url('assets/legenda/'); ?><?= $l->foto ?>" alt="" style="width: 30px; height: 14px;">
                                                <?= $l->legenda ?>
                                            </label>
                                        </div>
                                    <?php } ?>   
                            <?php } else { ?>
                                <?php
                                $legenda = $this->db->query("SELECT * FROM legenda")->result();
                                // $legenda = json_decode($l->pilihan);
                                // $no = 1;
                                foreach ($legenda as $l) {
                                ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?= $l->id_legenda ?>" id="legenda_lsd[]" name="legenda_lsd[]" />
                                        <label class="form-check-label" for="legenda" style="float: left;">
                                        <img src="<?php echo base_url('assets/legenda/'); ?><?= $l->foto ?>" alt="" style="width: 30px; height: 14px;">
                                            <?= $l->legenda ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            </div>
                        </td>
                    </tr> -->
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
                                <a href="<?php echo base_url('Pdf/draf_peta/'); ?><?= $data->id_permohonan ?>" download class="btn btn-danger">Download PDF</a>&ensp;
                            <?php } else { ?>
                                <a href="<?php echo base_url('Pdf/draf_peta/'); ?><?= $data->id_kkpr_permohonan ?>" download class="btn btn-danger">Download PDF</a>&ensp;
                            <?php } ?>
                            <!-- <a href="#" class="btn btn-success" readonly>Download EXCEL</a>&ensp; -->
                            <button type="submit" class="btn btn-primary">Simpan</button>&ensp;
                            <?php if ($cek) { ?>
                                <?php
                                $cek_sertifikat = $this->db->query("SELECT * FROM data_sertifikat_draft_peta WHERE id_permohonan = '$data->id_permohonan ' ")->row();
                                if ($cek_sertifikat) {
                                ?>
                                    <a href="<?php echo base_url('Pdf/draf_peta/'); ?><?= $data->id_permohonan ?>" target="_blank" class="btn btn-info">Lihat</a>
                                <?php }
                            } else { ?>
                                <?php
                                $cek_sertifikat = $this->db->query("SELECT * FROM data_sertifikat_draft_peta WHERE id_permohonan = '$data->id_kkpr_permohonan ' ")->row();
                                if ($cek_sertifikat) {
                                ?>
                                    <a href="<?php echo base_url('Pdf/draf_peta/'); ?><?= $data->id_kkpr_permohonan ?>" target="_blank" class="btn btn-info">Lihat</a>
                            <?php }
                            } ?>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->