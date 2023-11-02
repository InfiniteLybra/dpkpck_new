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
        background-color: #F0F0F0;
        /* Warna abu-abu */
    }

    textarea.form-control[readonly] {
        background-color: #F0F0F0;
        /* Warna abu-abu */
    }
</style>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / KKPR / Berkas Diterima / </span> Peta </h4>

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" id="kt_create_account_form" action="<?php echo base_url('Kkpr/proses_config_peta'); ?>" enctype="multipart/form-data">
                    <div class="card shadow-none border-1 mb-4" id="card-detail-pdf">
                        <div class="card-body" id="detailData">
                            <div class="row mb-3">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">1</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">Nomor</span>
                                                </td>
                                                <td>
                                                    <?php if ($cek) { ?>
                                                        <input type="text" name="nomor" class="form-control" value="<?= $data->nomor ?>" readonly>
                                                        <input type="hidden" name="id_permohonan" class="form-control" value="<?= $data->id_permohonan ?>">
                                                    <?php } else { ?>
                                                        <input type="text" name="nomor" class="form-control" value="650/000<?php $data->id_kkpr_permohonan ?>/35.07.111/<?= date("Y"); ?>" readonly>
                                                        <input type="hidden" name="id_permohonan" class="form-control" value="<?= $data->id_kkpr_permohonan ?>">

                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">2</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">Nama</span>
                                                </td>
                                                <td>
                                                    <?php if ($cek) { ?>
                                                        <input type="text" name="nama_pemohon" id="nama_pemohon" class="form-control" value="<?= $data->nama_pemohon ?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" name="nama_pemohon" id="nama_pemohon" class="form-control" value="<?= $data->nama_pemohon ?>" readonly>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">3</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">Alamat</span>
                                                </td>
                                                <td>
                                                    <?php if ($cek) { ?>
                                                        <textarea class="form-control" name="alamat_pemohon" id="alamat_pemohon" data-kt-autosize="true" readonly><?php if ($data) echo $data->alamat_pemohon ?> </textarea>
                                                    <?php } else { ?>
                                                        <textarea class="form-control" name="alamat_pemohon" id="alamat_pemohon" data-kt-autosize="true" readonly><?php if ($data) echo $data->alamat_pemohon ?> RT. <?php if ($data) echo $data->rt_pemohon ?> RW. <?php if ($data) echo $data->rw_pemohon ?> Kel. <?= $kelurahan->subdis_name ?> - Kec. <?= $kecamatan->dis_name ?> - Kota / Kab. <?= $kota->city_name ?> - Prov. <?= $provinsi->prov_name ?></textarea>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">4</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">Bertindak Atas Nama</span>
                                                </td>
                                                <td>
                                                    <?php if ($cek) { ?>
                                                        <input type="text" name="nama_perusahaan" class="form-control" value="<?php if ($data->nama_perusahaan) echo $data->nama_perusahaan ?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" name="nama_perusahaan" class="form-control" value="<?php if ($data->nama_perusahaan) echo $data->nama_perusahaan ?>" readonly>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">5</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">Alamat</span>
                                                </td>
                                                <td>
                                                    <?php if ($cek) { ?>
                                                        <textarea class="form-control" name="alamat_perusahaan" data-kt-autosize="true" readonly><?php if ($data->nama_perusahaan) echo $data->alamat_perusahaan ?> 
                                                    </textarea>
                                                    <?php } else { ?>
                                                        <textarea class="form-control" name="alamat_perusahaan" data-kt-autosize="true" readonly><?php if ($data->nama_perusahaan) echo $data->alamat_perusahaan ?> <?php if ($data->nama_perusahaan) echo 'RT. ' . $data->rt_perusahaan . '' ?> <?php if ($data->nama_perusahaan) echo 'RW. ' . $data->rw_perusahaan . '' ?> <?php if ($data->nama_perusahaan) echo 'Kel. ' . $kelurahan_perusahaan->subdis_name . '' ?> <?php if ($data->nama_perusahaan) echo '- Kec. ' . $kecamatan_perusahaan->dis_name . '' ?> <?php if ($data->nama_perusahaan) echo '- Kota / Kab. ' . $kota_perusahaan->city_name . '' ?> <?php if ($data->nama_perusahaan) echo '- Prov. ' . $provinsi_perusahaan->prov_name . '' ?>
                                                    </textarea>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">6</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">NIB/Skala Usaha</span>
                                                </td>
                                                <td>
                                                    <?php if ($cek) { ?>
                                                        <input type="text" name="nib_skala_usaha" class="form-control" value="<?php if ($data) echo $data->nib_skala_usaha ?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" name="nib_skala_usaha" class="form-control" value="<?php if ($data) echo $data->nib ?> / <?php if ($data) echo $data->skala_usaha ?>" readonly>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">7</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">KBLI diMohon/Tingkat Risiko</span>
                                                </td>
                                                <td>
                                                    <?php if ($cek) {
                                                        $kbli = json_decode($data->kbli_tingkat_resiko);
                                                        foreach ($kbli as $k) {
                                                    ?>
                                                        <div class="mb-3">
                                                            <input type="text" name="kbli_tingkat_resiko[]" class="form-control" value="<?= $k->kbli ?>" readonly>
                                                        </div>
                                                        <?php }
                                                    } else {
                                                        $kbli = json_decode($data->kbli);
                                                        foreach ($kbli as $k) {
                                                        ?>
                                                        <div class="mb-3">
                                                            <input type="text" name="kbli_tingkat_resiko[]" class="form-control" value="<?= $k->kbli ?> - <?php if ($data) echo $data->kategori ?> / <?php if ($data) echo $data->klasifikasi_resiko ?>" readonly>
                                                        </div>
                                                    <?php }
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">8</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">Peruntukan</span>
                                                </td>
                                                <td>
                                                    <?php if ($cek) { ?>
                                                        <input type="text" name="peruntukan" class="form-control" value="<?= $data->peruntukan ?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" name="peruntukan" class="form-control" value="<?= $data->peruntukan_tanah ?>" readonly>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">9</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">Lokasi</span>
                                                </td>
                                                <td>
                                                    <?php if ($cek) { ?>
                                                        <input type="text" name="lokasi" class="form-control" value="<?php if ($data) echo $data->lokasi ?> " readonly>
                                                    <?php } else { ?>
                                                        <input type="text" name="lokasi" class="form-control" value="<?php if ($data) echo $data->lokasi_tanah ?> Desa / Kel. <?= $kelurahan_tanah->nama_desa ?> - Kec. <?= $kecamatan_tanah->nama_kecamatan ?> " readonly>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">10</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">Luas Tanah</span>
                                                </td>
                                                <td>
                                                    <?php if ($cek) { ?>
                                                        <div class="d-flex">
                                                            <input type="text" name="luas_tanah" class="form-control flex-grow-1" value="<?= $data->luas_tanah ?>" readonly>
                                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="d-flex">
                                                            <input type="text" name="luas_tanah" class="form-control flex-grow-1" value="<?= $data->luas_tanah ?>" readonly>
                                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">11</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">Status Tanah</span>
                                                </td>
                                                <td>
                                                    <?php if ($cek) { ?>
                                                        <?php
                                                        $status = json_decode($data->status_tanah);
                                                        $no = 1;
                                                        foreach ($status as $s) {
                                                        ?>
                                                            <div class="mb-3">
                                                                <input type="text" name="status_tanah_" .<?= $no++; ?>."" class="form-control" value="<?= $s->status_tanah ?>" readonly>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <?php
                                                        $status = json_decode($data->status_tanah);
                                                        $no = 1;
                                                        foreach ($status as $s) {
                                                        ?>
                                                            <div class="mb-3">
                                                                <input type="text" name="status_tanah_" .<?= $no++; ?>."" class="form-control" value="<?= $s->status_tanah ?>" readonly>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">12</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">Gambar Peta</span>
                                                </td>
                                                <td>
                                                    <!-- <div class="d-flex"> -->
                                                        <?php if ($cek) { ?>
                                                            <div class="d-flex">
                                                                <input type="file" name="peta" class="form-control flex-grow-1" value="">
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->gambar_peta ?>" class="btn btn-light fw-bold flex-shrink-0" target="_blank">Lihat Disini</a>
                                                            </div>
                                                        <?php } else { ?>
                                                            <input type="file" name="peta" class="form-control" value="">
                                                            <small style="float: left;"><a href="<?php echo base_url('Map'); ?>" target="_blank">Klik disini untuk ke Shp Map</a></small>
                                                        <?php } ?>
                                                    <!-- </div> -->
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
                                                <td>
                                                    <span class="fw-bold">13</span>
                                                </td>
                                                <td>
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
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">14</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">Titik Koordinat</span>
                                                </td>
                                                <td>
                                                    <?php if ($cek) {
                                                        $koordinat = json_decode($data->titik_koordinat);
                                                        foreach ($koordinat as $k) { ?>
                                                            <div class="mb-3 row">
                                                                <input type="text" name="koordinat[]" class="form-control" value="<?= $k->koordinat ?>">
                                                            </div>
                                                        <?php } ?>
                                                        <div id="additionalInputs"></div>
                                                        <small style="float: left;">
                                                            <a href="<?= base_url('Kkpr/viewupload/' . $data->id_permohonan) ?>" target="_blank">Koordinat Otomatis</a>
                                                        </small>

                                                        <input type="hidden" name="id_permohonan" class="form-control" value="<?= $data->id_permohonan ?>">
                                                        <div class="" style="float: right;">
                                                            <button type="button" id="addInput" class="btn btn-light btn-sm">Tambah</button>
                                                            <button type="button" id="removeInput" class="btn btn-light btn-sm">Kurang</button>
                                                        </div>
                                                    <?php
                                                    } else { ?>
                                                        <div class="mb-3 row">
                                                            <input type="text" name="koordinat[]" class="form-control" value="a.">
                                                        </div>
                                                        <div id="additionalInputs"></div>
                                                        <!-- <small style="float: left;"><a href="http://localhost/project/dpkpck_new/last_map_new/form_shp.php" target="_blank">Koordinat Otomatis</a></small> -->
                                                        <small style="float: left;">
                                                            <a href="<?= base_url('Kkpr/viewupload/' . $data->id_kkpr_permohonan) ?>" target="_blank">Koordinat Otomatis</a>
                                                        </small>
                                                        <div class="" style="float: right;">
                                                            <button type="button" id="addInput" class="btn btn-light btn-sm">Tambah</button>
                                                            <button type="button" id="removeInput" class="btn btn-light btn-sm">Kurang</button>
                                                        </div>
                                </div>
                            <?php } ?>
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">15</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Ketentuan Lainya</span>
                                </td>
                                <td class="pe-0">
                                    <div class="checkbox-container">
                                        <?php if ($cek) { ?>
                                            <?php
                                            $get_ketentuan = json_decode($cek->ketentuan_lainya, true);
                                            foreach ($ketentuan as $k) {
                                            ?>
                                                <div class="form-check">
                                                    <?php
                                                    // Periksa apakah $l->id ada di dalam array $get
                                                    $isChecked = in_array($k->id_ketentuan_lainya, array_column($get_ketentuan, 'ketentuan'));
                                                    // if ($k->id_ketentuan_lainya == 1) {
                                                    //     $isChecked = true;
                                                    // }
                                                    ?>
                                                    <input class="form-check-input" type="checkbox" value="<?= $k->id_ketentuan_lainya ?>" id="id_ketentuan[]" name="ketentuan[]" <?php if ($isChecked) echo 'checked' ?> />
                                                    <label class="form-check-label" for="ketentuan<?= $k->id_ketentuan_lainya ?>" style="float: left;">
                                                        <?= $k->nama_pilihan ?>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="lainya" id="id_lainya" name="lainya" <?php if ($cek->lainya_ketentuan) echo 'checked'; ?> />
                                                <label class="form-check-label" for="ketentuanLainya" style="float: left;">
                                                    Lainya
                                                </label>
                                            </div>
                                        <?php } else { ?>
                                            <?php
                                            foreach ($ketentuan as $k) {
                                                // $isChecked = false;
                                                // if ($k->id_ketentuan_lainya == 1) {
                                                //         $isChecked = true;
                                                //     }                                         
                                            ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?= $k->id_ketentuan_lainya ?>" id="id_ketentuan[]" name="ketentuan[]" />
                                                    <label class="form-check-label" for="ketentuan<?= $k->id_ketentuan_lainya ?>" style="float: left;">
                                                        <?= $k->nama_pilihan ?>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="lainya" id="id_lainya" name="lainya" />
                                                <label class="form-check-label" for="ketentuanLainya" style="float: left;">
                                                    Lainya
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                            <div class="">
                                <tr id="lainyaInput" style="display: <?php if (!isset($cek->lainya_ketentuan)) echo 'none'; ?>;">
                                    <td>
                                        <span class="fw-bold"></span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">Lainya</span>
                                    </td>
                                    <td>
                                        <?php if ($cek) { ?>
                                            <textarea name="lainya" class="form-control" cols="10" rows="5"><?php if ($cek->lainya_ketentuan) echo $cek->lainya_ketentuan; ?></textarea>
                                        <?php } else { ?>
                                            <textarea name="lainya" class="form-control" cols="10" rows="5"></textarea>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </div>
                            <tr>
                                <td>
                                    <span class="fw-bold">16</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Peruntukan dalam Perda RTR(I)</span>
                                </td>
                                <td>
                                    <?php
                                    if ($cek) {
                                    ?>
                                        <select name="perda_rtr1" id="perda_rtr1" class="form-select form-control mb-2">
                                            <option value="" selected></option>
                                            <?php
                                            $perda_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '7'")->row();
                                            $perda = json_decode($perda_query->pilihan);
                                            foreach ($perda as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>" <?php if ($cek->perda_rtr1 == $p->id) echo "selected" ?>><?= $p->pola_ruang ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else { ?>
                                        <select name="perda_rtr1" id="perda_rtr1" class="form-select form-control mb-2">
                                            <option value="" selected></option>
                                            <?php
                                            $perda_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '7'")->row();
                                            $perda = json_decode($perda_query->pilihan);
                                            foreach ($perda as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>"><?= $p->pola_ruang ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">17</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Peruntukan dalam Perda RTR(II)</span>
                                </td>
                                <td>
                                    <?php if ($cek) { ?>
                                        <select name="perda_rtr2" id="perda_rtr2" class="form-select form-control mb-2">
                                            <option value="" selected></option>
                                            <?php
                                            $perda_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '7'")->row();
                                            $perda = json_decode($perda_query->pilihan);
                                            foreach ($perda as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>" <?php if ($cek->perda_rtr2 == $p->id) echo "selected" ?>><?= $p->pola_ruang ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else { ?>
                                        <select name="perda_rtr2" id="perda_rtr2" class="form-select form-control mb-2">
                                            <option value="" selected></option>
                                            <?php
                                            $perda_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '7'")->row();
                                            $perda = json_decode($perda_query->pilihan);
                                            foreach ($perda as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>"><?= $p->pola_ruang ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">18</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Peruntukan dalam Perda RTR(III)</span>
                                </td>
                                <td>
                                    <?php if ($cek) { ?>
                                        <select name="perda_rtr3" id="perda_rtr3" class="form-select form-control mb-2">
                                            <option value="" selected></option>
                                            <?php
                                            $perda_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '7'")->row();
                                            $perda = json_decode($perda_query->pilihan);
                                            foreach ($perda as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>" <?php if ($cek->perda_rtr3 == $p->id) echo "selected" ?>><?= $p->pola_ruang ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else { ?>
                                        <select name="perda_rtr3" id="perda_rtr3" class="form-select form-control mb-2">
                                            <option value="" selected></option>
                                            <?php
                                            $perda_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '7'")->row();
                                            $perda = json_decode($perda_query->pilihan);
                                            foreach ($perda as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>"><?= $p->pola_ruang ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">19</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Flexsible Zoning</span>
                                </td>
                                <td>
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
                                <td>
                                    <span class="fw-bold">20</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Masuk dalam LSD</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="masuk_lsd" id="masuk_lsd" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <option value="iya_seluruhnya" <?php if ($cek->masuk_lsd == 'iya_seluruhnya') echo "selected" ?>>Iya (Seluruhnya)</option>
                                            <option value="iya_sebagian" <?php if ($cek->masuk_lsd == 'iya_sebagian') echo "selected" ?>>Iya (Sebagian)</option>
                                            <option value="tidak" <?php if ($cek->masuk_lsd == 'tidak') echo "selected" ?>>Tidak</option>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="masuk_lsd" id="masuk_lsd" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <option value="iya_seluruhnya">Iya (Seluruhnya)</option>
                                            <option value="iya_sebagian">Iya (Sebagian)</option>
                                            <option value="tidak">Tidak</option>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">21</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Luas Tanah Masuk Peta LSD</span>
                                </td>
                                <td>
                                    <?php if ($cek) { ?>
                                        <div class="d-flex">
                                            <!-- <input type="text" name="luas_tanah_lsd" id="luas_tanah_lsd" class="form-control flex-grow-1" value="<?= $data->luas_tanah_lsd ?>"> -->
                                            <input type="text" name="luas_tanah_lsd" id="luas_tanah_lsd" class="form-control flex-grow-1" value="<?php if ($data->luas_tanah_lsd) {
                                                                                                                                                        echo $data->luas_tanah_lsd;
                                                                                                                                                    } else {
                                                                                                                                                        echo isset($draft_data['luas_tanah_lsd']) ? $draft_data['luas_tanah_lsd'] : '';
                                                                                                                                                    } ?>">
                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="d-flex">
                                            <input type="text" name="luas_tanah_lsd" id="luas_tanah_lsd" class="form-control flex-grow-1" value="<?php echo isset($draft_data['luas_tanah_lsd']) ? $draft_data['luas_tanah_lsd'] : ''; ?>">
                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                        </div>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">22</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Masuk dalam KP2B</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="masuk_kp2b" id="masuk_kp2b" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <option value="iya_seluruhnya" <?php if ($cek->masuk_kp2b == 'iya_seluruhnya') echo "selected" ?>>Iya (Seluruhnya)</option>
                                            <option value="iya_sebagian" <?php if ($cek->masuk_kp2b == 'iya_sebagian') echo "selected" ?>>Iya (Sebagian)</option>
                                            <option value="tidak" <?php if ($cek->masuk_kp2b == 'tidak') echo "selected" ?>>Tidak</option>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="masuk_kp2b" id="masuk_kp2b" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <option value="iya_seluruhnya">Iya (Seluruhnya)</option>
                                            <option value="iya_sebagian">Iya (Sebagian)</option>
                                            <option value="tidak">Tidak</option>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">23</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Luas Tanah Masuk Peta KP2B</span>
                                </td>
                                <td>
                                    <?php if ($cek) { ?>
                                        <div class="d-flex">
                                            <!-- <input type="text" name="luas_tanah_kp2b" class="form-control flex-grow-1" value="<?= $data->luas_tanah_kp2b ?>"> -->
                                            <input type="text" name="luas_tanah_kp2b" class="form-control flex-grow-1" value="<?php if ($data->luas_tanah_kp2b) {
                                                                                                                                                        echo $data->luas_tanah_kp2b;
                                                                                                                                                    } else {
                                                                                                                                                        echo isset($draft_data['luas_tanah_kp2b']) ? $draft_data['luas_tanah_kp2b'] : '';
                                                                                                                                                    } ?>">
                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="d-flex">
                                            <input type="text" name="luas_tanah_kp2b" class="form-control flex-grow-1" value="<?php echo isset($draft_data['luas_tanah_kp2b']) ? $draft_data['luas_tanah_kp2b'] : ''; ?>">
                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                        </div>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">24</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Diijinkan sebagian, seluas</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <div class="d-flex">
                                            <!-- <input type="text" name="diijinkan_sebagian" class="form-control flex-grow-1" value="<?= $data->diijinkan_sebagian ?>"> -->
                                            <input type="text" name="diijinkan_sebagian" class="form-control flex-grow-1" value="<?php if ($data->diijinkan_sebagian) {
                                                                                                                                                        echo $data->diijinkan_sebagian;
                                                                                                                                                    } else {
                                                                                                                                                        echo isset($draft_data['diijinkan_sebagian']) ? $draft_data['diijinkan_sebagian'] : '';
                                                                                                                                                    } ?>">
                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                        </div>
                                    <?php } else {
                                    ?>
                                        <div class="d-flex">
                                            <input type="text" name="diijinkan_sebagian" class="form-control flex-grow-1" value="<?php echo isset($draft_data['diijinkan_sebagian']) ? $draft_data['diijinkan_sebagian'] : ''; ?>">
                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                        </div>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">25</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Blok (Kepanjen/RD Singosari)</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="blok_kepanjen" id="blok_kepanjen" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $blok_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '8'")->row();
                                            $blok = json_decode($blok_query->pilihan);
                                            foreach ($blok as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>" <?php if ($cek->blok_kepanjen == $p->id) echo "selected" ?>><?= $p->blok ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="blok_kepanjen" id="blok_kepanjen" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $blok_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '8'")->row();
                                            $blok = json_decode($blok_query->pilihan);
                                            foreach ($blok as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>"><?= $p->blok ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">26</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Kode Zona (Kepanjen/RD Singosari)(I)</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="zona_kepanjen1" id="zona_kepanjen1" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $zona_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '9'")->row();
                                            $zona = json_decode($zona_query->pilihan);
                                            foreach ($zona as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>" <?php if ($cek->zona_kepanjen1 == $p->id) echo "selected" ?>><?= $p->kode_zona ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="zona_kepanjen1" id="zona_kepanjen1" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $zona_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '9'")->row();
                                            $zona = json_decode($zona_query->pilihan);
                                            foreach ($zona as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>"><?= $p->kode_zona ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">27</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Kode Zona (Kepanjen/RD Singosari)(II)</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="zona_kepanjen2" id="zona_kepanjen2" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $zona_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '9'")->row();
                                            $zona = json_decode($zona_query->pilihan);
                                            foreach ($zona as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>" <?php if ($cek->zona_kepanjen2 == $p->id) echo "selected" ?>><?= $p->kode_zona ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="zona_kepanjen2" id="zona_kepanjen2" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $zona_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '9'")->row();
                                            $zona = json_decode($zona_query->pilihan);
                                            foreach ($zona as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>"><?= $p->kode_zona ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">28</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Kode Zona (Kepanjen/RD Singosari)(III)</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="zona_kepanjen3" id="zona_kepanjen3" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $zona_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '9'")->row();
                                            $zona = json_decode($zona_query->pilihan);
                                            foreach ($zona as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>" <?php if ($cek->zona_kepanjen3 == $p->id) echo "selected" ?>><?= $p->kode_zona ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="zona_kepanjen3" id="zona_kepanjen3" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $zona_query = $this->db->query("SELECT * FROM pilihan WHERE id_pilihan = '9'")->row();
                                            $zona = json_decode($zona_query->pilihan);
                                            foreach ($zona as $p) {
                                            ?>
                                                <option value="<?= $p->id ?>"><?= $p->kode_zona ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">29</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Indikasi Program Pemanfaatan Ruang</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <!-- <input type="text" name="indikasi_ppr" class="form-control" value="<?= $data->indikasi_ppr ?>"> -->
                                        <input type="text" name="indikasi_ppr" id="indikasi_ppr" class="form-control" value="<?php if ($data->indikasi_ppr) {
                                                                                                                                                        echo $data->indikasi_ppr;
                                                                                                                                                    } else {
                                                                                                                                                        echo isset($draft_data['indikasi_ppr']) ? $draft_data['indikasi_ppr'] : '';
                                                                                                                                                    } ?>">
                                    <?php } else {
                                    ?>
                                        <input type="text" name="indikasi_ppr" id="indikasi_ppr" class="form-control" value="<?php echo isset($draft_data['indikasi_ppr']) ? $draft_data['indikasi_ppr'] : ''; ?>">
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">30</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Luas Tanah yang disetujui</span>
                                </td>
                                <td>
                                    <?php if ($cek) { ?>
                                        <div class="d-flex">
                                            <!-- <input type="text" name="luas_tanah_disetujui" id="luas_tanah_disetujui" class="form-control flex-grow-1" value="<?= $data->luas_disetujui ?>"> -->
                                            <input type="text" name="luas_tanah_disetujui" id="luas_tanah_disetujui" class="form-control flex-grow-1" value="<?php if ($data->luas_disetujui) {
                                                                                                                                                        echo $data->luas_disetujui;
                                                                                                                                                    } else {
                                                                                                                                                        echo isset($draft_data['luas_tanah_disetujui']) ? $draft_data['luas_tanah_disetujui'] : '';
                                                                                                                                                    } ?>">
                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="d-flex">
                                            <input type="text" name="luas_tanah_disetujui" id="luas_tanah_disetujui" class="form-control flex-grow-1" value="<?php echo isset($draft_data['luas_tanah_disetujui']) ? $draft_data['luas_tanah_disetujui'] : ''; ?>">
                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                        </div>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">31</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Koefisien Dasar Bangunan Maks.</span>
                                </td>
                                <td>
                                    <?php if ($cek) { ?>
                                        <div class="d-flex">
                                            <!-- <input type="text" name="koefisien_bangunan" id="koefisien_bangunan" class="form-control flex-grow-1" value="<?= $data->koefisien_bangunan ?>"> -->
                                            <input type="text" name="koefisien_bangunan" id="koefisien_bangunan" class="form-control flex-grow-1" value="<?php if ($data->koefisien_bangunan) {
                                                                                                                                                        echo $data->koefisien_bangunan;
                                                                                                                                                    } else {
                                                                                                                                                        echo isset($draft_data['koefisien_bangunan']) ? $draft_data['koefisien_bangunan'] : '';
                                                                                                                                                    } ?>">
                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="d-flex">
                                            <input type="text" name="koefisien_bangunan" id="koefisien_bangunan" class="form-control flex-grow-1" value="<?php echo isset($draft_data['koefisien_bangunan']) ? $draft_data['koefisien_bangunan'] : ''; ?>">
                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                        </div>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">32</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Koefiien Dasar Hijau Minimal</span>
                                </td>
                                <td>
                                    <?php if ($cek) { ?>
                                        <div class="d-flex">
                                            <!-- <input type="text" name="koefisien_dasar_hijau" id="koefisien_dasar_hijau" class="form-control flex-grow-1" value="<?= $data->koefisien_dasar_hijau ?>"> -->
                                            <input type="text" name="koefisien_dasar_hijau" id="koefisien_dasar_hijau" class="form-control flex-grow-1" value="<?php if ($data->koefisien_dasar_hijau) {
                                                                                                                                                        echo $data->koefisien_dasar_hijau;
                                                                                                                                                    } else {
                                                                                                                                                        echo isset($draft_data['koefisien_dasar_hijau']) ? $draft_data['koefisien_dasar_hijau'] : '';
                                                                                                                                                    } ?>">
                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="d-flex">
                                            <input type="text" name="koefisien_dasar_hijau" id="koefisien_dasar_hijau" class="form-control flex-grow-1" value="<?php echo isset($draft_data['koefisien_dasar_hijau']) ? $draft_data['koefisien_dasar_hijau'] : ''; ?>">
                                            <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                        </div>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">33</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Fungsi Jalan (I)</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="fungsi_jalan1" id="fungsi_jalan1" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $fj = $this->db->query("SELECT * FROM fungsi_jalan ")->result();
                                            foreach ($fj as $p) {
                                            ?>
                                                <option value="<?= $p->kode ?>" <?php if ($cek->fungsi_jalan1 == $p->kode) echo "selected" ?>><?= $p->fungsi_jalan ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="fungsi_jalan1" id="fungsi_jalan1" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $fj = $this->db->query("SELECT * FROM fungsi_jalan ")->result();
                                            foreach ($fj as $p) {
                                            ?>
                                                <option value="<?= $p->kode ?>"><?= $p->fungsi_jalan ?></option>
                                            <?php } ?>
                                        </select>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">34</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Kelas Jalan (I)</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="kelas_jalan1" id="kelas_jalan1" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <option value="r" <?php if ($cek->kelas_jalan1 == 'r') echo "selected" ?>>Raya</option>
                                            <option value="s" <?php if ($cek->kelas_jalan1 == 's') echo "selected" ?>>Sedang</option>
                                            <option value="k" <?php if ($cek->kelas_jalan1 == 'k') echo "selected" ?>>Kecil</option>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="kelas_jalan1" id="kelas_jalan1" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <option value="r">Raya</option>
                                            <option value="s">Sedang</option>
                                            <option value="k">Kecil</option>
                                        </select>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                                <td style="float: right;">
                                    <a id="cek1" class="btn btn-light btn-sm">Cek</a>
                                    <a id="refresh1" class="btn btn-light btn-sm">Tutup</a>
                                </td>
                            </tr>
                            <tr id="tr_gsp_1" style="display: none;">
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                                <td>
                                    <span class="fw-bold">Hasil</span>
                                </td>
                                <td>
                                    <input type="text" name="gsp_1" id="gsp_1" class="form-control mb-2" placeholder="Input Baru">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">35</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Fungsi Jalan (II)</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="fungsi_jalan2" id="fungsi_jalan2" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $fj = $this->db->query("SELECT * FROM fungsi_jalan ")->result();
                                            foreach ($fj as $p) {
                                            ?>
                                                <option value="<?= $p->kode ?>" <?php if ($cek->fungsi_jalan2 == $p->kode) echo "selected" ?>><?= $p->fungsi_jalan ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="fungsi_jalan2" id="fungsi_jalan2" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $fj = $this->db->query("SELECT * FROM fungsi_jalan ")->result();
                                            foreach ($fj as $p) {
                                            ?>
                                                <option value="<?= $p->kode ?>"><?= $p->fungsi_jalan ?></option>
                                            <?php } ?>
                                        </select>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">36</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Kelas Jalan (II)</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="kelas_jalan2" id="kelas_jalan2" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <option value="r" <?php if ($cek->kelas_jalan2 == 'r') echo "selected" ?>>Raya</option>
                                            <option value="s" <?php if ($cek->kelas_jalan2 == 's') echo "selected" ?>>Sedang</option>
                                            <option value="k" <?php if ($cek->kelas_jalan2 == 'k') echo "selected" ?>>Kecil</option>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="kelas_jalan2" id="kelas_jalan2" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <option value="r">Raya</option>
                                            <option value="s">Sedang</option>
                                            <option value="k">Kecil</option>
                                        </select>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                                <td style="float: right;">
                                    <a id="cek2" class="btn btn-light btn-sm">Cek</a>
                                    <a id="refresh2" class="btn btn-light btn-sm">Tutup</a>
                                </td>
                            </tr>
                            <tr id="tr_gsp_2" style="display: none;">
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                                <td>
                                    <span class="fw-bold">Hasil</span>
                                </td>
                                <td>
                                    <input type="text" name="gsp_2" id="gsp_2" class="form-control mb-2" placeholder="Input Baru">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">37</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Fungsi Jalan (III)</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="fungsi_jalan3" id="fungsi_jalan3" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $fj = $this->db->query("SELECT * FROM fungsi_jalan ")->result();
                                            foreach ($fj as $p) {
                                            ?>
                                                <option value="<?= $p->kode ?>" <?php if ($cek->fungsi_jalan3 == $p->kode) echo "selected" ?>><?= $p->fungsi_jalan ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="fungsi_jalan3" id="fungsi_jalan3" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $fj = $this->db->query("SELECT * FROM fungsi_jalan ")->result();
                                            foreach ($fj as $p) {
                                            ?>
                                                <option value="<?= $p->kode ?>"><?= $p->fungsi_jalan ?></option>
                                            <?php } ?>
                                        </select>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">38</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Kelas Jalan (III)</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="kelas_jalan3" id="kelas_jalan3" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <option value="r" <?php if ($cek->kelas_jalan3 == 'r') echo "selected" ?>>Raya</option>
                                            <option value="s" <?php if ($cek->kelas_jalan3 == 's') echo "selected" ?>>Sedang</option>
                                            <option value="k" <?php if ($cek->kelas_jalan3 == 'k') echo "selected" ?>>Kecil</option>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="kelas_jalan3" id="kelas_jalan3" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <option value="r">Raya</option>
                                            <option value="s">Sedang</option>
                                            <option value="k">Kecil</option>
                                        </select>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                                <td style="float: right;">
                                    <a id="cek3" class="btn btn-light btn-sm">Cek</a>
                                    <a id="refresh3" class="btn btn-light btn-sm">Tutup</a>
                                </td>
                            </tr>
                            <tr id="tr_gsp_3" style="display: none;">
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                                <td>
                                    <span class="fw-bold">Hasil</span>
                                </td>
                                <td>
                                    <input type="text" name="gsp_3" id="gsp_3" class="form-control mb-2" placeholder="Input Baru">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">39</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Fungsi Jalan (IV)</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="fungsi_jalan4" id="fungsi_jalan4" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $fj = $this->db->query("SELECT * FROM fungsi_jalan ")->result();
                                            foreach ($fj as $p) {
                                            ?>
                                                <option value="<?= $p->kode ?>" <?php if ($cek->fungsi_jalan4 == $p->kode) echo "selected" ?>><?= $p->fungsi_jalan ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="fungsi_jalan4" id="fungsi_jalan4" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <?php
                                            $fj = $this->db->query("SELECT * FROM fungsi_jalan ")->result();
                                            foreach ($fj as $p) {
                                            ?>
                                                <option value="<?= $p->kode ?>"><?= $p->fungsi_jalan ?></option>
                                            <?php } ?>
                                        </select>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">40</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Kelas Jalan (IV)</span>
                                </td>
                                <td>
                                    <?php if ($cek) {
                                    ?>
                                        <select name="kelas_jalan4" id="kelas_jalan4" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <option value="r" <?php if ($cek->kelas_jalan4 == 'r') echo "selected" ?>>Raya</option>
                                            <option value="s" <?php if ($cek->kelas_jalan4 == 's') echo "selected" ?>>Sedang</option>
                                            <option value="k" <?php if ($cek->kelas_jalan4 == 'k') echo "selected" ?>>Kecil</option>
                                        </select>
                                    <?php } else {
                                    ?>
                                        <select name="kelas_jalan4" id="kelas_jalan4" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon Pilh...">
                                            <option value="" selected></option>
                                            <option value="r">Raya</option>
                                            <option value="s">Sedang</option>
                                            <option value="k">Kecil</option>
                                        </select>
                                        </select>
                                    <?php }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                                <td style="float: right;">
                                    <a id="cek4" class="btn btn-light btn-sm">Cek</a>
                                    <a id="refresh4" class="btn btn-light btn-sm">Tutup</a>
                                </td>
                            </tr>
                            <tr id="tr_gsp_4" style="display: none;">
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                                <td>
                                    <span class="fw-bold">Hasil</span>
                                </td>
                                <td>
                                    <input type="text" name="gsp_4" id="gsp_4" class="form-control mb-2" placeholder="Input Baru">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold">41</span>
                                </td>
                                <td>
                                    <span class="fw-bold">Koefisien Lantai Bangunan Maks.</span>
                                </td>
                                <td>
                                    <?php if ($cek) { ?>
                                        <!-- <input type="text" name="koefisien_lantai" id="koefisien_lantai" class="form-control" value="<?= $data->lantai_bangunan ?>"> -->
                                        <input type="text" name="koefisien_lantai" id="koefisien_lantai" class="form-control" value="<?php if ($data->lantai_bangunan) {
                                                                                                                                                        echo $data->lantai_bangunan;
                                                                                                                                                    } else {
                                                                                                                                                        echo isset($draft_data['koefisien_lantai']) ? $draft_data['koefisien_lantai'] : '';
                                                                                                                                                    } ?>">
                                    <?php } else { ?>
                                        <input type="text" name="koefisien_lantai" id="koefisien_lantai" class="form-control" value="<?php echo isset($draft_data['koefisien_lantai']) ? $draft_data['koefisien_lantai'] : ''; ?>">
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                                <td>
                                    <span class="fw-bold"></span>
                                </td>
                            </tr>
                            </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row float-end">
                <div class="col-md-12">
                    <a href="<?php echo base_url('kkpr/config'); ?>" class="btn btn-outline-secondary">Kembali</a>
                    <?php if ($cek) { ?>
                        <a href="<?php echo base_url('Pdf/laporan_kkpr/'); ?><?= $data->id_permohonan ?>" download class="btn btn-info">Download PDF</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('Pdf/laporan_kkpr/'); ?><?= $data->id_kkpr_permohonan ?>" download class="btn btn-info">Download PDF</a>
                    <?php } ?>
                    <!-- <?php if ($cek) { ?>
                                                <a href="<?php echo base_url('Excel/laporan_kkpr/'); ?><?= $data->id_permohonan ?>" download class="btn btn-success">Download EXCEL</a>&ensp;
                                            <?php } else { ?>
                                                <a href="<?php echo base_url('Excel/laporan_kkpr/'); ?><?= $data->id_kkpr_permohonan ?>" download class="btn btn-success">Download EXCEL</a>&ensp;
                                            <?php } ?> -->
                    <?php if ($cek) { ?>
                        <?php
                        $cek_sertifikat = $this->db->query("SELECT * FROM data_sertifikat_peta WHERE id_permohonan = '$data->id_permohonan ' ")->row();
                        if ($cek_sertifikat) {
                        ?>
                            <a href="<?php echo base_url('Pdf/laporan_kkpr/'); ?><?= $data->id_permohonan ?>" target="_blank" class="btn btn-success">Lihat</a>
                        <?php }
                    } else { ?>
                        <?php
                        $cek_sertifikat = $this->db->query("SELECT * FROM data_sertifikat_peta WHERE id_permohonan = '$data->id_kkpr_permohonan ' ")->row();
                        if ($cek_sertifikat) {
                        ?>
                            <a href="<?php echo base_url('Pdf/laporan_kkpr/'); ?><?= $data->id_kkpr_permohonan ?>" target="_blank" class="btn btn-success">Lihat</a>
                    <?php }
                    } ?>
                    <button type="submit" class="btn btn-primary warning-button">Simpan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- / Content -->