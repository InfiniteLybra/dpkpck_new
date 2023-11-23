<?php
$kelurahan_pemohon = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$kkpr->kelurahan_pemohon' ")->row();
$kecamatan_pemohon = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$kkpr->kecamatan_pemohon' ")->row();
$kota_pemohon = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$kkpr->kota_pemohon' ")->row();
$provinsi_pemohon1 = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$kkpr->provinsi_pemohon' ")->row();

$kelurahan_kuasa = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$kkpr->kelurahan_kuasa' ")->row();
$kecamatan_kuasa = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$kkpr->kecamatan_kuasa' ")->row();
$kota_kuasa = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$kkpr->kota_kuasa' ")->row();
$provinsi_kuasa1 = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$kkpr->provinsi_kuasa' ")->row();

$kelurahan_perusahaan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$kkpr->kelurahan_perusahaan' ")->row();
$kecamatan_perusahaan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$kkpr->kecamatan_perusahaan' ")->row();
$kota_perusahaan = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$kkpr->kota_perusahaan' ")->row();
$provinsi_perusahaan1 = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$kkpr->provinsi_perusahaan' ")->row();

$kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$kkpr->kelurahan_tanah' ")->row();
// $kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$kkpr->kecamatan_tanah' ")->row();

$keterangan = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_permohonan = '$kkpr->id_kkpr_permohonan' ")->row();
$pmlk_meninggal = $this->db->query("SELECT surat_kematian FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$kkpr->id_kkpr_permohonan' ")->row();
$yn = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_permohonan = '$kkpr->id_kkpr_permohonan' ")->row();

$revisi = $this->db->query("SELECT * FROM file_pengembalian_kkpr_permohonan WHERE id_permohonan= '$kkpr->id_kkpr_permohonan' ")->result();
// echo "SELECT * FROM file_pengembalian_kkpr_permohonan WHERE id_permohonan= '$kkpr->id_kkpr_permohonan' ";
?>
<style>
    .swal2-container {
        z-index: 10000000;
    }
</style>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / KKPR / Permohonan / </span> Detail </h4>

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Detail Data</h5>
            </div>
            <div class="card-body">
                <!-- <form action="<?php echo base_url('Kkpr/proses_keterangan'); ?>" method="post"> -->
                <form id="myForm" action="#" method="post">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="nomor">Nomor</label>
                        <div class="col-sm-10">
                            <input type="text" name="nomor" class="form-control" value="650/000<?php if ($kkpr) echo $kkpr->id_kkpr_permohonan ?>/35.07.111/<?= date("Y"); ?>" disabled>
                            <!-- <p class="fs-6">650.3.3.2/000<?php if ($kkpr) echo $kkpr->id_kkpr_permohonan ?>/35.07.303/2023</p> -->
                        </div>
                    </div>
                    <!-- PEMOHON -->
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="nama">Nama Pemohon</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_pemohon" class="form-control" value="<?php if ($kkpr) echo $kkpr->nama_pemohon ?>">
                            <!-- <p class="fs-6"><?php if ($kkpr) echo $kkpr->nama_pemohon ?></p> -->
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="alamat">Alamat Pemohon</label>
                        <div class="col-sm-10">
                            <textarea name="alamat_pemohon" class="form-control" id="alamat"><?php if ($kkpr) echo $kkpr->alamat_pemohon ?></textarea>
                            <!-- <p class="fs-6"><?php if ($kkpr) echo $kkpr->alamat_pemohon ?> RT. <?php if ($kkpr) echo $kkpr->rt_pemohon ?> RW. <?php if ($kkpr) echo $kkpr->rw_pemohon ?> Kel. <?= $kelurahan->subdis_name ?> - Kec. <?= $kecamatan->dis_name ?> - Kota / Kab. <?= $kota->city_name ?> - Prov. <?= $provinsi->prov_name ?></p> -->
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="rt_pemohon">RT Pemohon</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="rt_pemohon" id="rt_pemohon" value="<?php if ($kkpr) echo $kkpr->rt_pemohon ?>" inputmode="numeric" placeholder="Ex. 001" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="rw_pemohon">RW Pemohon</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="rw_pemohon" id="rw_pemohon" value="<?php if ($kkpr) echo $kkpr->rw_pemohon ?>" inputmode="numeric" placeholder="Ex. 001" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="provinsi_pemohon">Provinsi Pemohon</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select name="provinsi_pemohon" id="provinsi_pemohon" class="form-select" required>
                                    <option value="Pilih Provinsi" disabled selected>Pilih
                                        Provinsi
                                    </option>
                                    <?php foreach ($provinsi_pemohon as $k) { ?>
                                        <option value="<?= $k->prov_id ?>" <?php if ($k->prov_id == $kkpr->provinsi_pemohon) echo 'selected' ?>><?= $k->prov_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="kota_pemohon">Kota/Kab Pemohon</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select name="kota_pemohon" id="kota_pemohon" class="form-select" required>
                                    <option value="Pilih Kota / Kabupaten" disabled selected>Pilih Kota /
                                        Kabupaten</option>
                                    <option value="<?= $kota_pemohon->city_id ?>" <?php if ($kota_pemohon->city_id == $kkpr->kota_pemohon) echo 'selected' ?>><?= $kota_pemohon->city_name ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="kecamatan_pemohon">kecamatan Pemohon</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select name="kecamatan_pemohon" id="kecamatan_pemohon" class="form-select" required>
                                    <option value="Pilih Kecamatan" disabled selected>Pilih
                                        Kecamatan
                                    </option>
                                    <option value="<?= $kecamatan_pemohon->dis_id ?>" <?php if ($kecamatan_pemohon->dis_id == $kkpr->kecamatan_pemohon) echo 'selected' ?>><?= $kecamatan_pemohon->dis_name ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="kelurahan_pemohon">kelurahan Pemohon</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select name="kelurahan_pemohon" id="kelurahan_pemohon" class="form-select" required>
                                    <option value="Pilih Desa / Kelurahan" disabled selected>
                                        Pilih Desa / Kelurahan</option>
                                    <option value="<?= $kelurahan_pemohon->subdis_id ?>" <?php if ($kelurahan_pemohon->subdis_id == $kkpr->kelurahan_pemohon) echo 'selected' ?>><?= $kelurahan_pemohon->subdis_name ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="noHP">Nomor HP Pemohon</label>
                        <div class="col-sm-10">
                            <input type="text" name="telp_pemohon" class="form-control" value="<?php if ($kkpr) echo $kkpr->telp_pemohon ?>">
                            <!-- <p class="fs-6"><?php if ($kkpr) echo $kkpr->telp_pemohon ?></p> -->
                        </div>
                    </div>
                    <?php
                    $no = 1;
                    foreach ($revisi as $r) {
                        $ynfkp = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                        $keteranganfkp = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                        if ($r && $ynfkp->fotokopi_ktp == '0') {
                    ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="KTP">KTP Pemohon (Revisi <?= $no++; ?>)</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->fotokopi_ktp ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->fotokopi_ktp ?>" class="btn btn-sm btn-primary mb-2" target="_blank">Lihat</a>

                                                    <?php if ($ynfkp) { ?>
                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_fotokopi_ktp_revisi" class="form-check-input" type="radio" value="1" id="KTP1" <?php if ($ynfkp->fotokopi_ktp == '1') echo 'checked'; ?> />
                                                            <label class="form-check-label" for="KTP1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_fotokopi_ktp_revisi" class="form-check-input" type="radio" value="0" id="KTP2" <?php if ($ynfkp->fotokopi_ktp == '0') echo 'checked'; ?> />
                                                            <label class="form-check-label" for="KTP2"> Tidak </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_fotokopi_ktp_revisi" class="form-check-input" type="radio" value="1" id="KTP1" checked />
                                                            <label class="form-check-label" for="KTP1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_fotokopi_ktp_revisi" class="form-check-input" type="radio" value="0" id="KTP2" />
                                                            <label class="form-check-label" for="KTP2"> Tidak </label>
                                                        <?php } ?>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-text-area">
                                                    <textarea class="form-control" name="fotokopi_ktp_revisi" disabled><?php echo $keteranganfkp->fotokopi_ktp ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                    } ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="KTP">KTP Pemohon</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->fotokopi_ktp ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->fotokopi_ktp ?>" class="btn btn-sm btn-primary mb-2" target="_blank">Lihat</a>
                                                <input type="hidden" name="file_fotokopi_ktp" value="<?= $kkpr->fotokopi_ktp  ?>">

                                                <div class="form-check form-check-inline ms-5 ">
                                                    <input name="yn_fotokopi_ktp" class="form-check-input" type="radio" value="1" id="KTP1" checked />
                                                    <label class="form-check-label" for="KTP1"> Ya </label>
                                                </div>
                                                <div class="form-check form-check-inline ">
                                                    <input name="yn_fotokopi_ktp" class="form-check-input" type="radio" value="0" id="KTP2" />
                                                    <label class="form-check-label" for="KTP2"> Tidak </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-text-area">
                                            <textarea class="form-control" name="fotokopi_ktp" data-preview="preview" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- KUASA -->
                        <?php if ($kkpr->nama_kuasa) { ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="nama">Nama kuasa</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama_kuasa" class="form-control" value="<?php if ($kkpr) echo $kkpr->nama_kuasa ?>">
                                    <!-- <p class="fs-6"><?php if ($kkpr) echo $kkpr->nama_kuasa ?></p> -->
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="alamat">Alamat kuasa</label>
                                <div class="col-sm-10">
                                    <textarea name="alamat_kuasa" class="form-control" id="alamat"><?php if ($kkpr) echo $kkpr->alamat_kuasa ?></textarea>
                                    <!-- <p class="fs-6"><?php if ($kkpr) echo $kkpr->alamat_kuasa ?> RT. <?php if ($kkpr) echo $kkpr->rt_kuasa ?> RW. <?php if ($kkpr) echo $kkpr->rw_kuasa ?> Kel. <?= $kelurahan->subdis_name ?> - Kec. <?= $kecamatan->dis_name ?> - Kota / Kab. <?= $kota->city_name ?> - Prov. <?= $provinsi->prov_name ?></p> -->
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="rt_kuasa">RT kuasa</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="rt_kuasa" id="rt_kuasa" value="<?php if ($kkpr) echo $kkpr->rt_kuasa ?>" inputmode="numeric" placeholder="Ex. 001" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="rw_kuasa">RW kuasa</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="rw_kuasa" id="rw_kuasa" value="<?php if ($kkpr) echo $kkpr->rw_kuasa ?>" inputmode="numeric" placeholder="Ex. 001" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="provinsi_kuasa">Provinsi kuasa</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="provinsi_kuasa" id="provinsi_kuasa" class="form-select" required>
                                            <option value="Pilih Provinsi" disabled selected>Pilih
                                                Provinsi
                                            </option>
                                            <?php foreach ($provinsi_kuasa as $k) { ?>
                                                <option value="<?= $k->prov_id ?>" <?php if ($k->prov_id == $kkpr->provinsi_kuasa) echo 'selected' ?>><?= $k->prov_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="kota_kuasa">Kota/Kab kuasa</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="kota_kuasa" id="kota_kuasa" class="form-select" required>
                                            <option value="Pilih Kota / Kabupaten" disabled selected>Pilih Kota /
                                                Kabupaten</option>
                                            <option value="<?= $kota_kuasa->city_id ?>" <?php if ($kota_kuasa->city_id == $kkpr->kota_kuasa) echo 'selected' ?>><?= $kota_kuasa->city_name ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="kecamatan_kuasa">kecamatan kuasa</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="kecamatan_kuasa" id="kecamatan_kuasa" class="form-select" required>
                                            <option value="Pilih Kecamatan" disabled selected>Pilih
                                                Kecamatan
                                            </option>
                                            <option value="<?= $kecamatan_kuasa->dis_id ?>" <?php if ($kecamatan_kuasa->dis_id == $kkpr->kecamatan_kuasa) echo 'selected' ?>><?= $kecamatan_kuasa->dis_name ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="kelurahan_kuasa">kelurahan kuasa</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="kelurahan_kuasa" id="kelurahan_kuasa" class="form-select" required>
                                            <option value="Pilih Desa / Kelurahan" disabled selected>
                                                Pilih Desa / Kelurahan</option>
                                            <option value="<?= $kelurahan_kuasa->subdis_id ?>" <?php if ($kelurahan_kuasa->subdis_id == $kkpr->kelurahan_kuasa) echo 'selected' ?>><?= $kelurahan_kuasa->subdis_name ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="noHP">Nomor HP Kuasa</label>
                                <div class="col-sm-10">
                                    <input type="text" name="telp_kuasa" class="form-control" value="<?php if ($kkpr) echo $kkpr->telp_kuasa ?>">
                                    <!-- <p class="fs-6"><?php if ($kkpr) echo $kkpr->telp_pemohon ?></p> -->
                                </div>
                            </div>
                            <?php
                            $no = 1;
                            foreach ($revisi as $r) {
                                $ynfkk = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                $keteranganfkk = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                if ($r && $ynfkk->fotokopi_ktp_kuasa == '0') {
                            ?>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="KTP">KTP Kuasa (Revisi <?= $no++; ?>)</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->fotokopi_ktp_kuasa ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->fotokopi_ktp_kuasa ?>" class="btn btn-sm btn-primary mb-2" target="_blank">Lihat</a>

                                                            <?php if ($ynfkk) { ?>
                                                                <div class="form-check form-check-inline ms-5 ">
                                                                    <input name="yn_fotokopi_ktp_kuasa_revisi" class="form-check-input" type="radio" value="1" id="KTP1" <?php if ($ynfkk->fotokopi_ktp_kuasa == '1') echo 'checked'; ?> />
                                                                    <label class="form-check-label" for="KTP1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_fotokopi_ktp_kuasa_revisi" class="form-check-input" type="radio" value="0" id="KTP2" <?php if ($ynfkk->fotokopi_ktp_kuasa == '0') echo 'checked'; ?> />
                                                                    <label class="form-check-label" for="KTP2"> Tidak </label>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="form-check form-check-inline ms-5 ">
                                                                    <input name="yn_fotokopi_ktp_kuasa_revisi" class="form-check-input" type="radio" value="1" id="KTP1" checked />
                                                                    <label class="form-check-label" for="KTP1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_fotokopi_ktp_kuasa_revisi" class="form-check-input" type="radio" value="0" id="KTP2" />
                                                                    <label class="form-check-label" for="KTP2"> Tidak </label>
                                                                <?php } ?>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="form-text-area">
                                                            <textarea class="form-control" name="fotokopi_ktp_kuasa_revisi" disabled><?php echo $keteranganfkk->fotokopi_ktp_kuasa ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                            } ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="KTP">KTP Kuasa</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->fotokopi_ktp_kuasa ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->fotokopi_ktp_kuasa ?>" class="btn btn-sm btn-primary mb-2" target="_blank">Lihat</a>
                                                        <input type="hidden" name="file_fotokopi_ktp_kuasa" value="<?= $kkpr->fotokopi_ktp_kuasa  ?>">

                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_fotokopi_ktp_kuasa" class="form-check-input" type="radio" value="1" id="KTP1" checked />
                                                            <label class="form-check-label" for="KTP1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_fotokopi_ktp_kuasa" class="form-check-input" type="radio" value="0" id="KTP2" />
                                                            <label class="form-check-label" for="KTP2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-text-area">
                                                    <textarea class="form-control" name="fotokopi_ktp_kuasa" data-preview="preview"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- PERUSAHAAN -->
                            <?php if ($kkpr->nama_perusahaan) { ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="nama_perusahaan">Nama Perusahaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" value="<?php if ($kkpr) echo $kkpr->nama_perusahaan ?>">
                                        <!-- <p class="fs-6"><?php if ($kkpr) echo $kkpr->nama_perusahaan ?></p> -->
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="alamat_perusahaan">Alamat Perusahaan</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" id="alamat_perusahaan" name="alamat_perusahaan" required="required" class="form-control " placeholder="Ex. Jl.Kebon Raya blok 3A No.01"><?php if ($kkpr) echo $kkpr->alamat_perusahaan ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="rt_perusahaan">RT perusahaan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" name="rt_perusahaan" id="rt_perusahaan" value="<?php if ($kkpr) echo $kkpr->rt_perusahaan ?>" inputmode="numeric" placeholder="Ex. 001" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="rw_perusahaan">RW perusahaan</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" name="rw_perusahaan" id="rw_perusahaan" value="<?php if ($kkpr) echo $kkpr->rw_perusahaan ?>" inputmode="numeric" placeholder="Ex. 001" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="provinsi_perusahaan">Provinsi perusahaan</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select name="provinsi_perusahaan" id="provinsi_perusahaan" class="form-select" required>
                                                <option value="Pilih Provinsi" disabled selected>Pilih
                                                    Provinsi
                                                </option>
                                                <?php foreach ($provinsi_perusahaan as $k) { ?>
                                                    <option value="<?= $k->prov_id ?>" <?php if ($k->prov_id == $kkpr->provinsi_perusahaan) echo 'selected' ?>><?= $k->prov_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="kota_perusahaan">Kota/Kab perusahaan</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select name="kota_perusahaan" id="kota_perusahaan" class="form-select" required>
                                                <option value="Pilih Kota / Kabupaten" disabled selected>Pilih Kota /
                                                    Kabupaten</option>
                                                <option value="<?= $kota_perusahaan->city_id ?>" <?php if ($kota_perusahaan->city_id == $kkpr->kota_perusahaan) echo 'selected' ?>><?= $kota_perusahaan->city_name ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="kecamatan_perusahaan">kecamatan perusahaan</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select name="kecamatan_perusahaan" id="kecamatan_perusahaan" class="form-select" required>
                                                <option value="Pilih Kecamatan" disabled selected>Pilih
                                                    Kecamatan
                                                </option>
                                                <option value="<?= $kecamatan_perusahaan->dis_id ?>" <?php if ($kecamatan_perusahaan->dis_id == $kkpr->kecamatan_perusahaan) echo 'selected' ?>><?= $kecamatan_perusahaan->dis_name ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="kelurahan_perusahaan">kelurahan perusahaan</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select name="kelurahan_perusahaan" id="kelurahan_perusahaan" class="form-select" required>
                                                <option value="Pilih Desa / Kelurahan" disabled selected>
                                                    Pilih Desa / Kelurahan</option>
                                                <option value="<?= $kelurahan_perusahaan->subdis_id ?>" <?php if ($kelurahan_perusahaan->subdis_id == $kkpr->kelurahan_perusahaan) echo 'selected' ?>><?= $kelurahan_perusahaan->subdis_name ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="nib">Nomor Induk Berusaha (NIB)</label>
                                <div class="col-sm-10">
                                    <input type="number" name="nib" id="nib" class="form-control" value="<?php if ($kkpr) echo $kkpr->nib ?>" placeholder="Ex. 1234567890123">
                                </div>
                            </div>
                            <?php
                            $no = 1;
                            foreach ($revisi as $r) {
                                $yntdp = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                $keterangantdp = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                if ($revisi && $yntdp->tdp == '0') {
                            ?>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="nibFile">Nomor Induk Berusaha (NIB) (Revisi <?= $no++; ?>)</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->tdp ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->tdp ?>" class="btn btn-sm btn-primary mb-2" target="_blank">Lihat</a>

                                                            <?php if ($yn) { ?>
                                                                <div class="form-check form-check-inline ms-5 ">
                                                                    <input name="yn_tdp_revisi" class="form-check-input" type="radio" value="1" id="nibFile1" <?php if ($yntdp->tdp == '1') echo 'checked'; ?> />
                                                                    <label class="form-check-label" for="nibFile1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_tdp_revisi" class="form-check-input" type="radio" value="0" id="nibFile2" <?php if ($yntdp->tdp == '0') echo 'checked'; ?> />
                                                                    <label class="form-check-label" for="nibFile2"> Tidak </label>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="form-check form-check-inline ms-5 ">
                                                                    <input name="yn_tdp_revisi" class="form-check-input" type="radio" value="1" id="nibFile1" checked />
                                                                    <label class="form-check-label" for="nibFile1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_tdp_revisi" class="form-check-input" type="radio" value="0" id="nibFile2" />
                                                                    <label class="form-check-label" for="nibFile2"> Tidak </label>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="form-text-area">
                                                        <textarea class="form-control" name="tdp" disabled><?php echo $keterangantdp->tdp ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="nibFile">Nomor Induk Berusaha (NIB) / Skala Usaha</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->tdp ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->tdp ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                    <div class="form-check form-check-inline ms-5 ">
                                                        <input name="yn_tdp" class="form-check-input" type="radio" value="1" id="nibFile1" checked />
                                                        <label class="form-check-label" for="nibFile1"> Ya </label>
                                                    </div>
                                                    <div class="form-check form-check-inline ">
                                                        <input name="yn_tdp" class="form-check-input" type="radio" value="0" id="nibFile2" />
                                                        <label class="form-check-label" for="nibFile2"> Tidak </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="tdp" data-preview="preview" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="skala_usaha">Skala Usaha</label>
                                <div class="col-sm-10">
                                    <select name="skala_usaha" id="skala_usaha" class="form-select form-control">
                                        <option value="" disabled selected>Pilih Skala Usaha
                                        </option>
                                        <?php
                                        $kategori_skala = $this->db->query("SELECT * FROM pilihan WHERE nama_pilihan = 'skala_usaha_kkpr'")->row();
                                        $isi_skala = json_decode($kategori_skala->pilihan);
                                        foreach ($isi_skala as $i) {
                                        ?>
                                            <option value="<?= $i->skala ?>" <?php if ($kkpr->skala_usaha == $i->skala) echo 'selected' ?>> <?= $i->skala ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="klasifikasi_resiko">Klasifikasi Resiko</label>
                                <div class="col-sm-10">
                                    <select name="klasifikasi_resiko" id="klasifikasi_resiko" class="form-select form-control">
                                        <option value="" disabled selected>Pilih Klasifikasi Risiko
                                        </option>
                                        <?php
                                        $kategori_resiko = $this->db->query("SELECT * FROM pilihan WHERE nama_pilihan = 'klasifikasi_resiko_kkpr'")->row();
                                        $isi_resiko = json_decode($kategori_resiko->pilihan);
                                        foreach ($isi_resiko as $i) {
                                        ?>
                                            <option value="<?= $i->resiko ?>" <?php if ($kkpr->klasifikasi_resiko == $i->resiko) echo 'selected' ?>> <?= $i->resiko ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="judul_kbli">Judul KBLI</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="judul_kbli" id="judul_kbli" value="<?php if ($kkpr->judul_kbli) echo $kkpr->judul_kbli ?>" placeholder="Ex. 001" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="kbli_array">KBLI diMohon</label>
                                <div class="col-sm-10">
                                    <?php
                                    $kbli = json_decode($kkpr->kbli);
                                    foreach ($kbli as $k) {
                                    ?>
                                        <input type="text" class="form-control mb-2" name="kbli_array[]" value="<?= $k->kbli ?>" />
                                    <?php } ?>
                                    <div id="additionalInputs"></div>
                                    <div class="" style="float: right;">
                                        <button type="button" id="addInput" class="btn btn-light btn-sm">Tambah</button>
                                        <button type="button" id="removeInput" class="btn btn-light btn-sm">Kurang</button>
                                    </div>
                                </div>
                            </div>
                            <?php if ($kkpr->nama_perusahaan) { ?>
                                <?php
                                $no = 1;
                                foreach ($revisi as $r) {
                                    $ynp = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    $keteranganp = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    if ($revisi && $ynp->akta_perusahaan == '0') {
                                ?>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="aktaPerusahaan">Akta Pendirian Perusahaan (Revisi <?= $no++; ?>)</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->akta_perusahaan ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->akta_perusahaan ?>" class="btn btn-sm btn-primary mb-2" target="_blank">Lihat</a>

                                                                <?php if ($yn) { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_akta_perusahaan_revisi" class="form-check-input" type="radio" value="1" id="aktaPerusahaan1" <?php if ($ynp->akta_perusahaan == '1') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="aktaPerusahaan1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_akta_perusahaan_revisi" class="form-check-input" type="radio" value="0" id="aktaPerusahaan2" <?php if ($ynp->akta_perusahaan == '0') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="aktaPerusahaan2"> Tidak </label>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_akta_perusahaan_revisi" class="form-check-input" type="radio" value="1" id="aktaPerusahaan1" checked>
                                                                        <label class="form-check-label" for="aktaPerusahaan1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_akta_perusahaan_revisi" class="form-check-input" type="radio" value="0" id="aktaPerusahaan2" />
                                                                        <label class="form-check-label" for="aktaPerusahaan2"> Tidak </label>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="form-text-area">
                                                            <textarea class="form-control" name="akta_perusahaan_revisi" disabled><?php echo $keteranganp->akta_perusahaan ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="aktaPerusahaan">Akta Pendirian Perusahaan</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->akta_perusahaan ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->akta_perusahaan ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>
                                                        <input type="hidden" name="file_fotokopi_akta_perusahaan" value="<?= $kkpr->akta_perusahaan ?>">

                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_akta_perusahaan" class="form-check-input" type="radio" value="1" id="aktaPerusahaan1" checked />
                                                            <label class="form-check-label" for="aktaPerusahaan1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_akta_perusahaan" class="form-check-input" type="radio" value="0" id="aktaPerusahaan2" />
                                                            <label class="form-check-label" for="aktaPerusahaan2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-text-area">
                                                    <textarea class="form-control" name="akta_perusahaan" data-preview="preview" disabled></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($kkpr->npwp) { ?>
                                <?php
                                $no = 1;
                                foreach ($revisi as $r) {
                                    $ynnpwp = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    $keterangannpwp = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    if ($revisi && $ynnpwp->npwp == '0') {
                                ?>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="npwp">NPWP (Revisi <?= $no++; ?>)</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->npwp ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->npwp ?>" class="btn btn-sm btn-primary mb-2" target="_blank">Lihat</a>

                                                                <?php if ($yn) { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_npwp_revisi" class="form-check-input" type="radio" value="1" id="npwp1" <?php if ($ynnpwp->npwp == '1') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="npwp1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_npwp_revisi" class="form-check-input" type="radio" value="0" id="npwp2" <?php if ($ynnpwp->npwp == '0') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="npwp2"> Tidak </label>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_npwp_revisi" class="form-check-input" type="radio" value="1" id="npwp1" checked />
                                                                        <label class="form-check-label" for="npwp1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_npwp_revisi" class="form-check-input" type="radio" value="0" id="npwp2" />
                                                                        <label class="form-check-label" for="npwp2"> Tidak </label>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="form-text-area">
                                                            <textarea class="form-control" name="npwp" disabled><?php echo $keterangannpwp->npwp ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="npwp">NPWP</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->npwp ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->npwp ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_npwp" class="form-check-input" type="radio" value="1" id="npwp1" checked />
                                                            <label class="form-check-label" for="npwp1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_npwp" class="form-check-input" type="radio" value="0" id="npwp2" />
                                                            <label class="form-check-label" for="npwp2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-text-area">
                                                    <textarea class="form-control" name="npwp" data-preview="preview"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php
                            $no = 1;
                            foreach ($revisi as $r) {
                            ?>
                                <?php
                                $ynoss = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                $keteranganoss = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                if ($r && $ynoss->dokumen_oss == '0') {
                                ?>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="dokOSS">Dokumen OSS (Revisi <?= $no++; ?>)</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->dokumen_oss ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->dokumen_oss ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                            <?php if ($yn) { ?>
                                                                <div class="form-check form-check-inline ms-5 ">
                                                                    <input name="yn_dokumen_oss_revisi" class="form-check-input" type="radio" value="1" id="dokOSS1" <?php if ($ynoss->dokumen_oss == '1') echo 'checked'; ?> />
                                                                    <label class="form-check-label" for="dokOSS1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_dokumen_oss_revisi" class="form-check-input" type="radio" value="0" id="dokOSS2" <?php if ($ynoss->dokumen_oss == '0') echo 'checked'; ?> />
                                                                    <label class="form-check-label" for="dokOSS2"> Tidak </label>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="form-check form-check-inline ms-5 ">
                                                                    <input name="yn_dokumen_oss_revisi" class="form-check-input" type="radio" value="1" id="dokOSS1" checked />
                                                                    <label class="form-check-label" for="dokOSS1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_dokumen_oss_revisi" class="form-check-input" type="radio" value="0" id="dokOSS2" />
                                                                    <label class="form-check-label" for="dokOSS2"> Tidak </label>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="form-text-area">
                                                        <textarea class="form-control" name="dokumen_oss_revisi" disabled><?= $keteranganoss->dokumen_oss ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="dokOSS">Dokumen OSS</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->dokumen_oss ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->dokumen_oss ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                    <div class="form-check form-check-inline ms-5 ">
                                                        <input name="yn_dokumen_oss" class="form-check-input" type="radio" value="1" id="dokOSS1" checked />
                                                        <label class="form-check-label" for="dokOSS1"> Ya </label>
                                                    </div>
                                                    <div class="form-check form-check-inline ">
                                                        <input name="yn_dokumen_oss" class="form-check-input" type="radio" value="0" id="dokOSS2" />
                                                        <label class="form-check-label" for="dokOSS2"> Tidak </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="dokumen_oss" data-preview="preview" disabled></textarea>
                                                <input type="hidden" name="type" class="form-control" value="<?php if ($kkpr) echo $kkpr->type ?>">
                                                <input type="hidden" name="id" class="form-control" value="<?php if ($kkpr) echo $kkpr->id_kkpr_permohonan ?>">
                                                <!-- <input type="hidden" name="telp_pemohon" class="form-control" value="<?php if ($kkpr) echo $kkpr->telp_pemohon ?>"> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TANAH -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="status_tanah_sm">status tanah</label>
                                <div class="col-sm-10">
                                    <select name="status_tanah_sm" id="status_tanah_sm" class="form-select form-control mb-2">
                                        <option value="Pilih status tanah" selected disabled>
                                            Pilih status tanah</option>
                                        <option value="sewa" <?php if ($kkpr->status_tanah_sm == 'sewa') echo 'selected' ?>>Sewa</option>
                                        <option value="milik_sendiri" <?php if ($kkpr->status_tanah_sm == 'milik_sendiri') echo 'selected' ?>>Milik Sendiri</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="peruntukan-tanah">Peruntukan tanah</label>
                                <div class="col-sm-10">
                                    <input id="peruntukan_tanah" class="form-control" required="required" type="text" name="peruntukan_tanah" value="<?php if ($kkpr) echo $kkpr->peruntukan_tanah ?>" placeholder="Ex. Gudang Kosmetik">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="luasTanah">Luas Tanah</label>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <input type="number" id="luas_tanah" name="luas_tanah" class="form-control flex-grow-1" value="<?php if ($kkpr) echo $kkpr->luas_tanah ?>">
                                        <button class="btn btn-light fw-bold flex-shrink-0" disabled>m2</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="luasTanah">Tipe Pengajuan</label>
                                <div class="col-sm-10">
                                    <select name="perluasan" id="perluasan" class="form-select form-control mb-2">
                                        <option value="Pilih tipe pengajuan" selected disabled>
                                            Pilih tipe pengajuan</option>
                                        <?php
                                        $kategori_perluasan = $this->db->query("SELECT * FROM pilihan WHERE nama_pilihan = 'perluasan_kkpr'")->row();
                                        $isi_perluasan = json_decode($kategori_perluasan->pilihan);
                                        foreach ($isi_perluasan as $i) {
                                        ?>
                                            <option value="<?= $i->perluasan ?>" <?php if ($kkpr->perluasan == $i->perluasan) echo 'selected' ?>> <?= $i->perluasan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="lokasi_tanah">Lokasi Tanah </label>
                                <div class="col-sm-10">
                                    <p class="fs-6">
                                        <textarea name="lokasi_tanah" class="form-control" id="lokasi_tanah"><?php if ($kkpr) echo $kkpr->lokasi_tanah ?></textarea>
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="rt_tanah">RT tanah</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="rt_tanah" id="rt_tanah" value="<?php if ($kkpr) echo $kkpr->rt_tanah ?>" inputmode="numeric" placeholder="Ex. 001" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="rw_tanah">RW tanah</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="rw_tanah" id="rw_tanah" value="<?php if ($kkpr) echo $kkpr->rw_tanah ?>" inputmode="numeric" placeholder="Ex. 001" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="kota_tanah">Kota/Kab tanah</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="kota_tanah" id="kota_tanah" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kota" disabled>
                                            <option value="Pilih Kota" disabled>Pilih Kota</option>
                                            <option value="1">Kota Malang</option>
                                            <option value="2" selected>Kab Malang</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="kecamatan_tanah">kecamatan tanah</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="kecamatan_tanah" id="kecamatan_tanah" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kecamatan">
                                            <option value="Pilih Kecamatan" selected disabled>Pilih
                                                Kecamatan</option>
                                            <?php foreach ($kecamatan_tanah as $k) { ?>
                                                <option value="<?= $k->id_kecamatan ?>" <?php if ($kkpr->kecamatan_tanah == $k->id_kecamatan) echo 'selected' ?>>
                                                    <?= $k->nama_kecamatan ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="kelurahan_tanah">kelurahan tanah</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <select name="kelurahan_tanah" id="kelurahan_tanah" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kelurahan">
                                            <option value="Pilih Desa / Kelurahan" selected disabled>
                                                Pilih Desa / Kelurahan</option>
                                            <option value="<?= $kelurahan_tanah->id_desa ?>" <?php if ($kelurahan_tanah->id_desa == $kkpr->kelurahan_tanah) echo 'selected' ?>><?= $kelurahan_tanah->nama_desa ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?php if ($kkpr->dasar_surat_tanah == 'letter' && $kkpr->status_surat_tanah == 'atas_nama_orang_lain') { ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="nibFile">Surat Tanah</label>
                                    <div class="col-sm-10">
                                        <button type="button" id="buka_st_ol" class="btn btn-sm btn-outline-primary">Tampilkan Data</button>
                                        <button type="button" id="tutup_st_ol" class="btn btn-sm btn-outline-secondary">Tutup</button>
                                        <!-- <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#collapseDetailTable" role="button" aria-expanded="true" aria-controls="collapseDetailTable">Tampilkan Data</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" href="#collapseDetailTable" role="button" aria-expanded="false" aria-controls="collapseDetailTable">Tutup</button> -->

                                        <!-- <div class="collapse" id="collapseDetailTable"> -->
                                        <div id="table_surat_tanah_ol1" style="display: none;">
                                            <div class="table-responsive mt-2">

                                                <table class="table table-bordered fs-6">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Status</th>
                                                            <th>Dasar</th>
                                                            <th>Surat Tanah</th>
                                                            <th>Peta Bidang</th>
                                                            <th>Aksi</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($revisi as $r) {
                                                            $ynst = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                                            $keteranganst = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                                            $surat_tanah = json_decode($r->surat_tanah);
                                                            $keterangan_st = json_decode($keteranganst->surat_tanah, true); // Ubah menjadi array PHP
                                                            $yn_surat_tanah = json_decode($ynst->surat_tanah, true); // Ubah menjadi array PHP
                                                            $peta_bidang = json_decode($r->peta_bidang_surat_tanah, true);
                                                            // echo $surat_tanah;
                                                            $nomer = 1;
                                                            foreach ($surat_tanah as $index => $st) {
                                                                $surat_tanah_value = isset($keterangan_st[$index]['surat_tanah']) ? $keterangan_st[$index]['surat_tanah'] : '';
                                                                $action_value = isset($yn_surat_tanah[$index]['surat_tanah']) ? $yn_surat_tanah[$index]['surat_tanah'] : '';
                                                                $peta_bidang_value = isset($peta_bidang[$index]['peta_bidang']) ? $peta_bidang[$index]['peta_bidang'] : '';
                                                                if ($action_value == 0) {
                                                        ?>
                                                                    <tr>
                                                                        <td colspan="7">
                                                                            Revisi <?= $no++; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?= $nomer++; ?></td>
                                                                        <td><?= $kkpr->status_surat_tanah ?></td>
                                                                        <td><?= $kkpr->dasar_surat_tanah ?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php $st->surat_tanah ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php $st->surat_tanah ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php $peta_bidang_value ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php $peta_bidang_value ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>
                                                                        </td>
                                                                        <td>
                                                                            <!-- <div class="form-check form-check-inline">
                                                                            <input name="yn_surat_tanah_revisi[]" class="form-check-input" type="radio" value="1" id="suratTanah1" <?php if ($action_value  == '1') echo 'checked'; ?> />
                                                                            <label class="form-check-label" for="suratTanah1"> Ya </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline ">
                                                                            <input name="yn_surat_tanah_revisi[]" class="form-check-input" type="radio" value="0" id="suratTanah2" <?php if ($action_value  == '0') echo 'checked'; ?> />
                                                                            <label class="form-check-label" for="suratTanah2"> Tidak </label>
                                                                        </div> -->
                                                                            <select name="yn_surat_tanah_revisi[]" class="form-control">
                                                                                <option value="1" <?php if ($action_value  == '1') echo 'selected'; ?>>ya</option>
                                                                                <option value="0" <?php if ($action_value  == '') echo 'selected'; ?>>tidak</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-text-area">
                                                                                <textarea class="form-control" name="surat_tanah_revisi[]" disabled><?php echo $surat_tanah_value ?></textarea>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php } else { ?>
                                                                    <tr>
                                                                        <td colspan="7">
                                                                            Tidak ada Revisi
                                                                        </td>
                                                                    </tr>
                                                        <?php }
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- <div class="collapse" id="collapseDetailTable"> -->
                                        <div id="table_surat_tanah_ol2" style="display: none;">
                                            <div class="table-responsive mt-2">

                                                <table class="table table-bordered fs-6">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Status</th>
                                                            <th>Dasar</th>
                                                            <th>Surat Tanah</th>
                                                            <th>Peta Bidang</th>
                                                            <th>Aksi</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $surat_tanah = json_decode($kkpr->surat_tanah);
                                                        $pb_surat_tanah = json_decode($kkpr->peta_bidang_surat_tanah);

                                                        // Mengambil jumlah entri dalam surat_tanah
                                                        $total_surat_tanah = count($surat_tanah);

                                                        // Mengambil jumlah entri dalam peta_bidang_surat_tanah
                                                        $total_pb_surat_tanah = count($pb_surat_tanah);

                                                        // Menghitung jumlah baris yang diperlukan dalam tabel
                                                        $total_baris = max($total_surat_tanah, $total_pb_surat_tanah);

                                                        for ($i = 0; $i < $total_baris; $i++) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $kkpr->status_surat_tanah ?></td>
                                                                <td><?= $kkpr->dasar_surat_tanah ?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $surat_tanah[$i]->surat_tanah ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $surat_tanah[$i]->surat_tanah ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>
                                                                    <input type="hidden" name="file_surat_tanah[]" value="<?= $surat_tanah[$i]->surat_tanah ?>">
                                                                </td>
                                                                <td>
                                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $pb_surat_tanah[$i]->peta_bidang ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $pb_surat_tanah[$i]->peta_bidang ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>
                                                                    <input type="hidden" name="file_peta_bidang_surat_tanah[]" value="<?= $pb_surat_tanah[$i]->peta_bidang ?>">
                                                                </td>
                                                                <td>
                                                                    <!-- <div class="form-check form-check-inline">
                                                                    <input name="yn_surat_tanah[]" class="form-check-input" type="radio" value="1" id="suratTanah1" />
                                                                    <label class="form-check-label" for="suratTanah1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_surat_tanah[]" class="form-check-input" type="radio" value="0" id="suratTanah2" />
                                                                    <label class="form-check-label" for="suratTanah2"> Tidak </label>
                                                                </div> -->
                                                                    <select name="yn_surat_tanah[]" class="form-control">
                                                                        <option value="1" selected>ya</option>
                                                                        <option value="0">tidak</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="form-text-area">
                                                                        <textarea class="form-control" name="surat_tanah[]" data-preview="preview"></textarea>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="nibFile">Surat Tanah</label>
                                    <div class="col-sm-10">
                                        <button type="button" id="buka_st" class="btn btn-sm btn-outline-primary">Tampilkan Data</button>
                                        <button type="button" id="tutup_st" class="btn btn-sm btn-outline-secondary">Tutup</button>
                                        <!-- <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" href="#collapseDetailTable" role="button" aria-expanded="true" aria-controls="collapseDetailTable">Tampilkan Data</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" href="#collapseDetailTable" role="button" aria-expanded="false" aria-controls="collapseDetailTable">Tutup</button> -->

                                        <!-- <div class="collapse" id="collapseDetailTable"> -->
                                        <div id="table_surat_tanah1" style="display: none;">
                                            <div class="table-responsive mt-2">
                                                <?php
                                                // $surat_tanah_if = json_decode($revisi->surat_tanah);
                                                // if($surat_tanah_if->surat_tanah){ 
                                                ?>
                                                <table class="table table-bordered fs-6">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Status</th>
                                                            <th>Dasar</th>
                                                            <th>Surat Tanah</th>
                                                            <th>Aksi</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($revisi as $r) {
                                                            $ynst = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                                            $keteranganst = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                                            $surat_tanah = json_decode($r->surat_tanah);
                                                            $keterangan_st = json_decode($keteranganst->surat_tanah, true); // Ubah menjadi array PHP
                                                            $yn_surat_tanah = json_decode($ynst->surat_tanah, true); // Ubah menjadi array PHP
                                                            $peta_bidang = json_decode($r->peta_bidang_surat_tanah, true);
                                                            // echo $surat_tanah;
                                                            $nomer = 1;
                                                            foreach ($surat_tanah as $index => $st) {
                                                                $surat_tanah_value = isset($keterangan_st[$index]['surat_tanah']) ? $keterangan_st[$index]['surat_tanah'] : '';
                                                                $action_value = isset($yn_surat_tanah[$index]['surat_tanah']) ? $yn_surat_tanah[$index]['surat_tanah'] : '';
                                                                $peta_bidang_value = isset($peta_bidang[$index]['peta_bidang']) ? $peta_bidang[$index]['peta_bidang'] : '';
                                                                if ($action_value == 0) {
                                                        ?>
                                                                    <tr>
                                                                        <td colspan="7">
                                                                            Revisi <?= $no++; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?= $nomer++; ?></td>
                                                                        <td><?= $kkpr->status_surat_tanah ?></td>
                                                                        <td><?= $kkpr->dasar_surat_tanah ?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php $st->surat_tanah ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php $st->surat_tanah ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>
                                                                        </td>
                                                                        <td>
                                                                            <!-- <div class="form-check form-check-inline">
                                                                            <input name="yn_surat_tanah_revisi[]" class="form-check-input" type="radio" value="1" id="suratTanah1" <?php if ($action_value  == '1') echo 'checked'; ?> />
                                                                            <label class="form-check-label" for="suratTanah1"> Ya </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline ">
                                                                            <input name="yn_surat_tanah_revisi[]" class="form-check-input" type="radio" value="0" id="suratTanah2" <?php if ($action_value  == '0') echo 'checked'; ?> />
                                                                            <label class="form-check-label" for="suratTanah2"> Tidak </label>
                                                                        </div> -->
                                                                            <select name="yn_surat_tanah_revisi[]" class="form-control">
                                                                                <option value="1" <?php if ($action_value  == '1') echo 'selected'; ?>>ya</option>
                                                                                <option value="0" <?php if ($action_value  == '0') echo 'selected'; ?>>tidak</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-text-area">
                                                                                <textarea class="form-control" name="surat_tanah_revisi[]" disabled><?php if ($surat_tanah_value) echo $surat_tanah_value ?></textarea>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php } else { ?>
                                                                    <tr>
                                                                        <td colspan="7">
                                                                            Tidak ada Revisi
                                                                        </td>
                                                                    </tr>
                                                        <?php }
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                                <?php //}
                                                ?>
                                            </div>
                                        </div>
                                        <!-- <div class="collapse" id="collapseDetailTable"> -->
                                        <div id="table_surat_tanah2" style="display: none;">
                                            <div class="table-responsive mt-2">

                                                <table class="table table-bordered fs-6">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Status</th>
                                                            <th>Dasar</th>
                                                            <th>Surat Tanah</th>
                                                            <th>Aksi</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $surat_tanah = json_decode($kkpr->surat_tanah);
                                                        foreach ($surat_tanah as $s) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $kkpr->status_surat_tanah ?></td>
                                                                <td><?= $kkpr->dasar_surat_tanah ?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $s->surat_tanah ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $s->surat_tanah ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>
                                                                    <input type="hidden" name="file_surat_tanah[]" value="<?php if ($kkpr) echo $s->surat_tanah ?>">
                                                                </td>
                                                                <td>
                                                                    <!-- <div class="form-check form-check-inline">
                                                                    <input name="yn_surat_tanah[]" class="form-check-input" type="radio" value="1" id="suratTanah1" />
                                                                    <label class="form-check-label" for="suratTanah1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_surat_tanah[]" class="form-check-input" type="radio" value="0" id="suratTanah2" />
                                                                    <label class="form-check-label" for="suratTanah2"> Tidak </label>
                                                                </div> -->
                                                                    <select name="yn_surat_tanah[]" class="form-control">
                                                                        <option value="1" selected>ya</option>
                                                                        <option value="0">tidak</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="form-text-area">
                                                                        <textarea class="form-control" name="surat_tanah[]" data-preview="preview"></textarea>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                            <?php
                            $no = 1;
                            foreach ($revisi as $r) {
                                $ynpb = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                $keteranganpb = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                if ($revisi && $ynpb->peta_bidang == '0') {
                            ?>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="petaBidang">Peta Bidang (Revisi <?= $no++; ?>)</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->peta_bidang ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->peta_bidang ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                            <?php if ($yn) { ?>
                                                                <div class="form-check form-check-inline ms-5 ">
                                                                    <input name="yn_peta_bidang_revisi" class="form-check-input" type="radio" value="1" id="petaBidang1" <?php if ($ynpb->peta_bidang == '1') echo 'checked'; ?> />
                                                                    <label class="form-check-label" for="petaBidang1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_peta_bidang_revisi" class="form-check-input" type="radio" value="0" id="petaBidang2" <?php if ($ynpb->peta_bidang == '0') echo 'checked'; ?> />
                                                                    <label class="form-check-label" for="petaBidang2"> Tidak </label>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="form-check form-check-inline ms-5 ">
                                                                    <input name="yn_peta_bidang_revisi" class="form-check-input" type="radio" value="1" id="petaBidang1" checked />
                                                                    <label class="form-check-label" for="petaBidang1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_peta_bidang_revisi" class="form-check-input" type="radio" value="0" id="petaBidang2" />
                                                                    <label class="form-check-label" for="petaBidang2"> Tidak </label>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="form-text-area">
                                                        <textarea class="form-control" name="peta_bidang_revisi" disabled><?php if ($keteranganpb) echo $keteranganpb->peta_bidang ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="petaBidang">Peta Bidang</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->peta_bidang ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->peta_bidang ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                    <div class="form-check form-check-inline ms-5 ">
                                                        <input name="yn_peta_bidang" class="form-check-input" type="radio" value="1" id="petaBidang1" checked />
                                                        <label class="form-check-label" for="petaBidang1"> Ya </label>
                                                    </div>
                                                    <div class="form-check form-check-inline ">
                                                        <input name="yn_peta_bidang" class="form-check-input" type="radio" value="0" id="petaBidang2" />
                                                        <label class="form-check-label" for="petaBidang2"> Tidak </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="peta_bidang" data-preview="preview" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $no = 1;
                            foreach ($revisi as $r) {
                                $ynshp = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                $keteranganshp = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                if ($revisi && $ynshp->shp == '0') {
                            ?>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="shp">SHP (Revisi <?= $no++; ?>)</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->shp ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>

                                                            <?php if ($yn) { ?>
                                                                <div class="form-check form-check-inline ms-5 ">
                                                                    <input name="yn_shp_revisi" class="form-check-input" type="radio" value="1" id="shp1" <?php if ($ynshp->shp == '1') echo 'checked'; ?> />
                                                                    <label class="form-check-label" for="shp1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_shp_revisi" class="form-check-input" type="radio" value="0" id="shp2" <?php if ($ynshp->shp == '0') echo 'checked'; ?> />
                                                                    <label class="form-check-label" for="shp2"> Tidak </label>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="form-check form-check-inline ms-5 ">
                                                                    <input name="yn_shp_revisi" class="form-check-input" type="radio" value="1" id="shp1" checked />
                                                                    <label class="form-check-label" for="shp1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_shp_revisi" class="form-check-input" type="radio" value="0" id="shp2" />
                                                                    <label class="form-check-label" for="shp2"> Tidak </label>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="form-text-area">
                                                        <textarea class="form-control" name="shp_revisi" disabled><?php if ($keteranganshp) echo $keteranganshp->shp ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="shp">SHP</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->shp ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                    <input type="hidden" name="file_shp" value="<?= $kkpr->shp ?>">
                                                    <div class="form-check form-check-inline ms-5 ">
                                                        <input name="yn_shp" class="form-check-input" type="radio" value="1" id="shp1" checked />
                                                        <label class="form-check-label" for="shp1"> Ya </label>
                                                    </div>
                                                    <div class="form-check form-check-inline ">
                                                        <input name="yn_shp" class="form-check-input" type="radio" value="0" id="shp2" />
                                                        <label class="form-check-label" for="shp2"> Tidak </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="shp" data-preview="preview" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (!empty($pmlk_meninggal->surat_kematian)) { ?>
                                <?php
                                $no = 1;
                                foreach ($revisi as $r) {
                                    $ynsk = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    $keterangansk = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    if ($revisi && $ynsk->surat_kematian == '0') {
                                ?>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratKematian">Surat Kematian (Revisi <?= $no++; ?>)</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_kematian ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_kematian ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                                <?php if ($yn) { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_kematian_revisi" class="form-check-input" type="radio" value="1" id="suratKematian1" <?php if ($ynsk->surat_kematian == '1') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratKematian1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_kematian_revisi" class="form-check-input" type="radio" value="0" id="suratKematian2" <?php if ($ynsk->surat_kematian == '0') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratKematian2"> Tidak </label>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_kematian_revisi" class="form-check-input" type="radio" value="1" id="suratKematian1" checked />
                                                                        <label class="form-check-label" for="suratKematian1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_kematian_revisi" class="form-check-input" type="radio" value="0" id="suratKematian2" />
                                                                        <label class="form-check-label" for="suratKematian2"> Tidak </label>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="form-text-area">
                                                            <textarea class="form-control" name="surat_kematian_revisi" disabled><?php if ($keterangansk) echo $keterangansk->surat_kematian ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratKematian">Surat Kematian</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kematian ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kematian ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_surat_kematian" class="form-check-input" type="radio" value="1" id="suratKematian1" checked />
                                                            <label class="form-check-label" for="suratKematian1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_surat_kematian" class="form-check-input" type="radio" value="0" id="suratKematian2" />
                                                            <label class="form-check-label" for="suratKematian2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-text-area">
                                                    <textarea class="form-control" name="surat_kematian" data-preview="preview" disabled></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $no = 1;
                                foreach ($revisi as $r) {
                                    $ynaw = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    $keteranganaw = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    if ($revisi && $ynaw->surat_kuasa_ahli_waris == '0') {
                                ?>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratKuasaAhliWaris">Surat Kuasa Ahli Waris (Revisi <?= $no++; ?>)</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_kuasa_ahli_waris ?> ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_kuasa_ahli_waris ?> ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                                <?php if ($yn) { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_kuasa_ahli_waris_revisi" class="form-check-input" type="radio" value="1" id="suratKuasaAhliWaris1" <?php if ($ynaw->surat_kuasa_ahli_waris == '1') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratKuasaAhliWaris1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_kuasa_ahli_waris_revisi" class="form-check-input" type="radio" value="0" id="suratKuasaAhliWaris2" <?php if ($ynaw->surat_kuasa_ahli_waris == '0') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratKuasaAhliWaris2"> Tidak </label>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_kuasa_ahli_waris_revisi" class="form-check-input" type="radio" value="1" id="suratKuasaAhliWaris1" checked />
                                                                        <label class="form-check-label" for="suratKuasaAhliWaris1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_kuasa_ahli_waris_revisi" class="form-check-input" type="radio" value="0" id="suratKuasaAhliWaris2" />
                                                                        <label class="form-check-label" for="suratKuasaAhliWaris2"> Tidak </label>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="form-text-area">
                                                            <textarea class="form-control" name="surat_kuasa_ahli_waris_revisi" disabled><?php if ($keteranganaw) echo $keteranganaw->surat_kuasa_ahli_waris ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratKuasaAhliWaris">Surat Kuasa Ahli Waris</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kuasa_ahli_waris ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kuasa_ahli_waris ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_surat_kuasa_ahli_waris" class="form-check-input" type="radio" value="1" id="suratKuasaAhliWaris1" checked />
                                                            <label class="form-check-label" for="suratKuasaAhliWaris1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_surat_kuasa_ahli_waris" class="form-check-input" type="radio" value="0" id="suratKuasaAhliWaris2" />
                                                            <label class="form-check-label" for="suratKuasaAhliWaris2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-text-area">
                                                    <textarea class="form-control" name="surat_kuasa_ahli_waris" data-preview="preview" disabled></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($kkpr->type == "tower") { ?>
                                <?php
                                $no = 1;
                                foreach ($revisi as $r) {
                                    $yndki = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    $keterangandki = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    if ($revisi && $yndki->surat_dinas_komunikasi == '0') {
                                ?>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratRekomIT">Surat Rekomendasi Dinas Komunikasi dan Informatika (Revisi <?= $no++; ?>)</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_komunikasi  ?> ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_komunikasi  ?> ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                                <?php if ($yn) { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_dinas_komunikasi_revisi" class="form-check-input" type="radio" value="1" id="suratRekomIT1" <?php if ($yndki->surat_dinas_komunikasi == '1') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratRekomIT1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_dinas_komunikasi_revisi" class="form-check-input" type="radio" value="0" id="suratRekomIT2" <?php if ($yndki->surat_dinas_komunikasi == '0') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratRekomIT2"> Tidak </label>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_dinas_komunikasi_revisi" class="form-check-input" type="radio" value="1" id="suratRekomIT1" checked />
                                                                        <label class="form-check-label" for="suratRekomIT1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_dinas_komunikasi_revisi" class="form-check-input" type="radio" value="0" id="suratRekomIT2" />
                                                                        <label class="form-check-label" for="suratRekomIT2"> Tidak </label>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="form-text-area">
                                                            <textarea class="form-control" name="surat_dinas_komunikasi_revisi" disabled><?php if ($keterangandki) echo $keterangandki->surat_dinas_komunikasi ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratRekomIT">Surat Rekomendasi Dinas Komunikasi dan Informatika</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_komunikasi ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_komunikasi ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_surat_dinas_komunikasi" class="form-check-input" type="radio" value="1" id="suratRekomIT1" checked />
                                                            <label class="form-check-label" for="suratRekomIT1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_surat_dinas_komunikasi" class="form-check-input" type="radio" value="0" id="suratRekomIT2" />
                                                            <label class="form-check-label" for="suratRekomIT2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-text-area">
                                                    <textarea class="form-control" name="surat_dinas_komunikasi" data-preview="preview"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $no = 1;
                                foreach ($revisi as $r) {
                                    $yntni = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    $keterangantni = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    if ($revisi && $yntni->surat_rekom_tni == '0') {
                                ?>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratRekomTNI">Surat Rekomendasi TNI (Revisi <?= $no++; ?>)</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_rekom_tni  ?> ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_rekom_tni  ?> ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                                <?php if ($yn) { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_rekom_tni_revisi" class="form-check-input" type="radio" value="1" id="suratRekomTNI1" <?php if ($yntni->surat_rekom_tni == '1') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratRekomTNI1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_rekom_tni_revisi" class="form-check-input" type="radio" value="0" id="suratRekomTNI2" <?php if ($yntni->surat_rekom_tni == '1') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratRekomTNI2"> Tidak </label>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_rekom_tni_revisi" class="form-check-input" type="radio" value="1" id="suratRekomTNI1" checked />
                                                                        <label class="form-check-label" for="suratRekomTNI1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_rekom_tni_revisi" class="form-check-input" type="radio" value="0" id="suratRekomTNI2" />
                                                                        <label class="form-check-label" for="suratRekomTNI2"> Tidak </label>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="form-text-area">
                                                            <textarea class="form-control" name="surat_rekom_tni_revisi" disabled><?php if ($keterangantni) echo $keterangantni->surat_rekom_tni ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratRekomTNI">Surat Rekomendasi TNI</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_rekom_tni ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_rekom_tni ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_surat_rekom_tni" class="form-check-input" type="radio" value="1" id="suratRekomTNI1" checked />
                                                            <label class="form-check-label" for="suratRekomTNI1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_surat_rekom_tni" class="form-check-input" type="radio" value="0" id="suratRekomTNI2" />
                                                            <label class="form-check-label" for="suratRekomTNI2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-text-area">
                                                    <textarea class="form-control" name="surat_rekom_tni" data-preview="preview"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($kkpr->type == "minimarket") { ?>
                                <?php
                                $no = 1;
                                foreach ($revisi as $r) {
                                    $yndp = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    $keterangandp = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    if ($revisi && $yndp->surat_dinas_perdagangan == '0') {
                                ?>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratRekomPerdagangan">Surat Rekomendasi dari Dinas Peternakan (Revisi <?= $no++; ?>)</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_perdagangan ?> ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_perdagangan ?> ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                                <?php if ($yn) { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_dinas_perdagagan_revisi" class="form-check-input" type="radio" value="1" id="suratRekomPerdagangan1" <?php if ($yndp->surat_dinas_perdagangan == '1') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratRekomPerdagangan1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_dinas_perdagagan_revisi" class="form-check-input" type="radio" value="0" id="suratRekomPerdagangan2" <?php if ($yndp->surat_dinas_perdagangan == '0') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratRekomPerdagangan2"> Tidak </label>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_dinas_perdagagan_revisi" class="form-check-input" type="radio" value="1" id="suratRekomPerdagangan1" checked />
                                                                        <label class="form-check-label" for="suratRekomPerdagangan1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_dinas_perdagagan_revisi" class="form-check-input" type="radio" value="0" id="suratRekomPerdagangan2" />
                                                                        <label class="form-check-label" for="suratRekomPerdagangan2"> Tidak </label>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="form-text-area">
                                                            <textarea class="form-control" name="surat_dinas_perdagangan_revisi" disabled><?php if ($keterangandp) echo $keterangandp->surat_dinas_perdagangan ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratRekomPerdagangan">Surat Rekomendasi dari Dinas Perdagangan</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_perdagangan ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_perdagangan ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_surat_dinas_perdagagan" class="form-check-input" type="radio" value="1" id="suratRekomPerdagangan1" checked />
                                                            <label class="form-check-label" for="suratRekomPerdagangan1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_surat_dinas_perdagagan" class="form-check-input" type="radio" value="0" id="suratRekomPerdagangan2" />
                                                            <label class="form-check-label" for="suratRekomPerdagangan2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-text-area">
                                                    <textarea class="form-control" name="surat_dinas_perdagangan" data-preview="preview"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($kkpr->type == "peternakan") { ?>
                                <?php
                                $no = 1;
                                foreach ($revisi as $r) {
                                    $yndpt = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    $keterangandpt = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    if ($revisi && $yndpt->surat_dinas_peternakan == '0') {
                                ?>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratRekomPeternakan">Surat Rekomendasi dari Dinas Peternakan (Revisi <?= $no++; ?>)</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_peternakan ?> ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_peternakan ?> ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                                <?php if ($yn) { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_dinas_peternakan_revisi" class="form-check-input" type="radio" value="1" id="suratRekomPeternakan1" <?php if ($yndpt->surat_dinas_peternakan == '1') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratRekomPeternakan1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_dinas_peternakan_revisi" class="form-check-input" type="radio" value="0" id="suratRekomPeternakan2" <?php if ($yndpt->surat_dinas_peternakan == '0') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratRekomPeternakan2"> Tidak </label>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_dinas_peternakan_revisi" class="form-check-input" type="radio" value="1" id="suratRekomPeternakan1" checked />
                                                                        <label class="form-check-label" for="suratRekomPeternakan1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_dinas_peternakan_revisi" class="form-check-input" type="radio" value="0" id="suratRekomPeternakan2" />
                                                                        <label class="form-check-label" for="suratRekomPeternakan2"> Tidak </label>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="form-text-area">
                                                            <textarea class="form-control" name="surat_dinas_peternakan_revisi" disabled><?php if ($keterangandpt) echo $keterangandpt->surat_dinas_peternakan ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratRekomPeternakan">Surat Rekomendasi dari Dinas Peternakan</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_peternakan ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_peternakan ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_surat_dinas_peternakan" class="form-check-input" type="radio" value="1" id="suratRekomPeternakan1" checked />
                                                            <label class="form-check-label" for="suratRekomPeternakan1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_surat_dinas_peternakan" class="form-check-input" type="radio" value="0" id="suratRekomPeternakan2" />
                                                            <label class="form-check-label" for="suratRekomPeternakan2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-text-area">
                                                    <textarea class="form-control" name="surat_dinas_peternakan" data-preview="preview" disabled></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($kkpr->type == "spbu") { ?>
                                <?php
                                $no = 1;
                                foreach ($revisi as $r) {
                                    $ynptmn = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    $keteranganptmn = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    if ($revisi && $ynptmn->surat_pertamina == '0') {
                                ?>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratRekomPertamina">Surat Rekomendasi dari Pertamina (Revisi <?= $no++; ?>)</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_pertamina ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_pertamina ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                                <?php if ($yn) { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_pertamina_revisi" class="form-check-input" type="radio" value="1" id="suratRekomPertamina1" <?php if ($ynptmn->surat_pertamina == '1') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratRekomPertamina1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_pertamina_revisi" class="form-check-input" type="radio" value="0" id="suratRekomPertamina2" <?php if ($ynptmn->surat_pertamina == '0') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratRekomPertamina2"> Tidak </label>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_pertamina_revisi" class="form-check-input" type="radio" value="1" id="suratRekomPertamina1" checked />
                                                                        <label class="form-check-label" for="suratRekomPertamina1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_pertamina_revisi" class="form-check-input" type="radio" value="0" id="suratRekomPertamina2" />
                                                                        <label class="form-check-label" for="suratRekomPertamina2"> Tidak </label>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="form-text-area">
                                                            <textarea class="form-control" name="surat_pertamina_revisi" disabled><?php if ($keteranganptmn) echo $keteranganptmn->surat_pertamina ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratRekomPertamina">Surat Rekomendasi dari Pertamina</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_pertamina ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_pertamina ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_surat_pertamina" class="form-check-input" type="radio" value="1" id="suratRekomPertamina1" checked />
                                                            <label class="form-check-label" for="suratRekomPertamina1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_surat_pertamina" class="form-check-input" type="radio" value="0" id="suratRekomPertamina2" />
                                                            <label class="form-check-label" for="suratRekomPertamina2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-text-area">
                                                    <textarea class="form-control" name="surat_pertamina" data-kt-autosize="true" data-preview="preview"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($kkpr->type == "tempat_ibadah") { ?>
                                <?php
                                $no = 1;
                                foreach ($revisi as $r) {
                                    $ynpw = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    $keteranganpw = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    if ($revisi && $ynpw->daftar_nama_kk == '0') {
                                ?>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="daftarNamaKK">Daftar Persetujuan Warga (Revisi <?= $no++; ?>)</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->daftar_nama_kk ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->daftar_nama_kk ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                                <?php if ($yn) { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_daftar_nama_kk_revisi" class="form-check-input" type="radio" value="1" id="daftarNamaKK1" <?php if ($ynpw->daftar_nama_kk == '1') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="daftarNamaKK1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_daftar_nama_kk_revisi" class="form-check-input" type="radio" value="0" id="daftarNamaKK2" <?php if ($ynpw->daftar_nama_kk == '0') echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="daftarNamaKK2"> Tidak </label>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_daftar_nama_kk_revisi" class="form-check-input" type="radio" value="1" id="daftarNamaKK1" checked />
                                                                        <label class="form-check-label" for="daftarNamaKK1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_daftar_nama_kk_revisi" class="form-check-input" type="radio" value="0" id="daftarNamaKK2" />
                                                                        <label class="form-check-label" for="daftarNamaKK2"> Tidak </label>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="form-text-area">
                                                            <textarea class="form-control" name="daftar_nama_kk_revisi" disabled><?php if ($keteranganpw) echo $keteranganpw->daftar_nama_kk ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="daftarNamaKK">Daftar Persetujuan Warga</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->daftar_nama_kk ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->daftar_nama_kk ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_daftar_nama_kk" class="form-check-input" type="radio" value="1" id="daftarNamaKK1" checked />
                                                            <label class="form-check-label" for="daftarNamaKK1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_daftar_nama_kk" class="form-check-input" type="radio" value="0" id="daftarNamaKK2" />
                                                            <label class="form-check-label" for="daftarNamaKK2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-text-area">
                                                    <textarea class="form-control" name="daftar_nama_kk" data-kt-autosize="true" data-preview="preview"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $no = 1;
                                foreach ($revisi as $r) {
                                    $ynfkub = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    $keteranganfkub = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                                    if ($revisi && $ynfkub->surat_fkub == '0') {
                                ?>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratFKUB">Surat FKUB (Revisi <?= $no++; ?>)</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_fkub ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_fkub ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                                <?php if ($yn) { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_fkub_revisi" class="form-check-input" type="radio" value="1" id="suratFKUB1" <?php if ($ynfkub->surat_fkub == '1')  echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratFKUB1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_fkub_revisi" class="form-check-input" type="radio" value="0" id="suratFKUB2" <?php if ($ynfkub->surat_fkub == '0')  echo 'checked'; ?> />
                                                                        <label class="form-check-label" for="suratFKUB2"> Tidak </label>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="form-check form-check-inline ms-5 ">
                                                                        <input name="yn_surat_fkub_revisi" class="form-check-input" type="radio" value="1" id="suratFKUB1" checked />
                                                                        <label class="form-check-label" for="suratFKUB1"> Ya </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ">
                                                                        <input name="yn_surat_fkub_revisi" class="form-check-input" type="radio" value="0" id="suratFKUB2" />
                                                                        <label class="form-check-label" for="suratFKUB2"> Tidak </label>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="form-text-area">
                                                            <textarea class="form-control" name="fkub_revisi" data-kt-autosize="true" disabled><?php if ($keteranganfkun) echo $keteranganfkub->fkub ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label fw-bold text-dark" for="suratFKUB">Surat FKUB</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_fkub ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_fkub ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_surat_fkub" class="form-check-input" type="radio" value="1" id="suratFKUB1" checked />
                                                            <label class="form-check-label" for="suratFKUB1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_surat_fkub" class="form-check-input" type="radio" value="0" id="suratFKUB2" />
                                                            <label class="form-check-label" for="suratFKUB2"> Tidak </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-text-area">
                                                    <textarea class="form-control" name="fkub" data-kt-autosize="true" data-preview="preview"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="fcKTP">Pesan dikirim ke WA</label>
                                <div class="col-sm-10">
                                    <div class="form-text-area">
                                        <textarea class="form-control" cols="10" rows="5" name="preview">Kepada <?php if ($kkpr) echo $kkpr->nama_pemohon ?>,
Hormat kami dari Dinas Perumahan, Kawasan Permukiman dan Cipta Karya memohon maaf formulir anda belum bisa kami terima.

Segera perbaiki kesalahan pengisian formulir dalam jangka waktu 7 hari. Jika dalam kurun waktu tersebut kesalahan pengisian formulir belum diperbaiki, formulir Anda akan otomatis terhapus dari data Admin.

Terima kasih,
Admin DPKPCK</textarea>
                                        <!-- <textarea class="form-control" cols="10" rows="5" name="preview">Salam, kami dari DPKPCK menyampaikan bahwa permohonan anda dalam aplikasi E-Pora atas nama..... dan peruntukan.... kami tolak karena ada kesalahan, Jika dalam kurun waktu 7 hari belum di perbaiki maka permohonan anda kami tolak sepenuhnya, Terimakasih</textarea> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <div class="alert alert-warning my-autor" role="alert">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-10 fw-bold fs-5">
                                                PASTIKAN ANDA SUDAH MENGISI SEMUA BARIS FORMULIR DENGAN BENAR!
                                            </div>
                                            <div class="col-md-2 text-end">
                                                <img src="<?php echo base_url('assets/'); ?>assets/img/warning.jpg" class="mb-0 my-3 rounded pb-0 img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row float-end">
                                <div class="col-md-12">
                                    <a href="<?php echo base_url('kkpr/admin_kkpr'); ?>">
                                        <button type="button" class="btn btn-outline-secondary">Kembali</button>
                                    </a>
                                    <button type="submit" class="btn btn-danger reject-button" name="submitBtn" value="submit1">Tolak</button>
                                    <a href="<?php echo base_url('Kkpr/proses_terima/'); ?><?= $kkpr->id_kkpr_permohonan; ?>" class="btn btn-primary acc-button">Terima</a>
                                    <button type="submit" class="btn btn-info" name="submitBtn" value="submit2">Simpan</button>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- / Content -->