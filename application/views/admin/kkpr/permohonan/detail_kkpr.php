<?php
$kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$kkpr->kelurahan_pemohon' ")->row();
$kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$kkpr->kecamatan_pemohon' ")->row();
$kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$kkpr->kota_pemohon' ")->row();
$provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$kkpr->provinsi_pemohon' ")->row();

$kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$kkpr->kelurahan_tanah' ")->row();
$kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$kkpr->kecamatan_tanah' ")->row();

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
                <form action="<?php echo base_url('Kkpr/proses_keterangan'); ?>" method="post">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="nomor">Nomor</label>
                        <div class="col-sm-10">
                            <p class="fs-6">650/000<?php if ($kkpr) echo $kkpr->id_kkpr_permohonan ?>/35.07.111/2023</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="nama">Nama</label>
                        <div class="col-sm-10">
                            <p class="fs-6"><?php if ($kkpr) echo $kkpr->nama_pemohon ?></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="noHP">Nomor HP</label>
                        <div class="col-sm-10">
                            <p class="fs-6"><?php if ($kkpr) echo $kkpr->telp_pemohon ?></p>
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
                                                            <input name="yn_fotokopi_ktp_revisi" class="form-check-input" type="radio" value="1" id="KTP1"  <?php if ($ynfkp->fotokopi_ktp == '1') echo 'checked'; ?> />
                                                            <label class="form-check-label" for="KTP1"> Ya </label>
                                                        </div>
                                                        <div class="form-check form-check-inline ">
                                                            <input name="yn_fotokopi_ktp_revisi" class="form-check-input" type="radio" value="0" id="KTP2" <?php if ($ynfkp->fotokopi_ktp == '0') echo 'checked'; ?> />
                                                            <label class="form-check-label" for="KTP2"> Tidak </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="form-check form-check-inline ms-5 ">
                                                            <input name="yn_fotokopi_ktp_revisi" class="form-check-input" type="radio" value="1" id="KTP1" />
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

                                                <div class="form-check form-check-inline ms-5 ">
                                                    <input name="yn_fotokopi_ktp" class="form-check-input" type="radio" value="1" id="KTP1" />
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
                                            <textarea class="form-control" name="fotokopi_ktp" data-preview="preview">KTP Pemohon : </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="alamat">Alamat</label>
                            <div class="col-sm-10">
                                <p class="fs-6"><?php if ($kkpr) echo $kkpr->alamat_pemohon ?> RT. <?php if ($kkpr) echo $kkpr->rt_pemohon ?> RW. <?php if ($kkpr) echo $kkpr->rw_pemohon ?> Kel. <?= $kelurahan->subdis_name ?> - Kec. <?= $kecamatan->dis_name ?> - Kota / Kab. <?= $kota->city_name ?> - Prov. <?= $provinsi->prov_name ?></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="tindakan">Bertidak Atas Nama</label>
                            <div class="col-sm-10">
                                <p class="fs-6"><?php if ($kkpr) echo $kkpr->nama_perusahaan ?></p>
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
                                                                    <input name="yn_akta_perusahaan_revisi" class="form-check-input" type="radio" value="1" id="aktaPerusahaan1">
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
                                                        <input name="yn_akta_perusahaan" class="form-check-input" type="radio" value="1" id="aktaPerusahaan1" />
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
                                                <textarea class="form-control" name="akta_perusahaan" data-preview="preview">Akta pendirian perusahaan : </textarea>
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
                                                                    <input name="yn_npwp_revisi" class="form-check-input" type="radio" value="1" id="npwp1" />
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
                                                        <input name="yn_npwp" class="form-check-input" type="radio" value="1" id="npwp1" />
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
                                                <textarea class="form-control" name="npwp" data-preview="preview">NPWP : </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="kbli">KBLI / Tingkat Risiko</label>
                            <div class="col-sm-10">
                                <?php
                                $kbli = json_decode($kkpr->kbli);
                                foreach ($kbli as $k) {
                                ?>
                                    <p class="fs-6"><?php echo $k->kbli ?> - <?php if ($kkpr) echo $kkpr->kategori ?> / <?php if ($kkpr) echo $kkpr->klasifikasi_resiko ?></p><br>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="nib">Nomor Induk Berusaha (NIB) / Skala Usaha</label>
                            <div class="col-sm-10">
                                <p class="fs-6"><?php if ($kkpr) echo $kkpr->nib ?> / <?php if ($kkpr) echo $kkpr->skala_usaha ?></p>
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
                                                                <input name="yn_tdp_revisi" class="form-check-input" type="radio" value="1" id="nibFile1" />
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
                                                    <input name="yn_tdp" class="form-check-input" type="radio" value="1" id="nibFile1" />
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
                                            <textarea class="form-control" name="tdp" data-preview="preview">NIB : </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="luasTanah">Peruntukan / Luas Tanah</label>
                            <div class="col-sm-10">
                                <p class="fs-6"><?php if ($kkpr) echo $kkpr->peruntukan_tanah ?> / <?php if ($kkpr) echo $kkpr->luas_tanah ?> m²</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="lokasi">Lokasi </label>
                            <div class="col-sm-10">
                                <p class="fs-6">
                                    <?php if ($kkpr) echo $kkpr->lokasi_tanah ?> Desa / Kel. <?= $kelurahan_tanah->nama_desa ?> - Kec. <?= $kecamatan_tanah->nama_kecamatan ?>
                                </p>
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
                                                                        <div class="form-check form-check-inline">
                                                                            <input name="yn_surat_tanah_revisi[]" class="form-check-input" type="radio" value="1" id="suratTanah1" <?php if ($action_value  == '1') echo 'checked'; ?> />
                                                                            <label class="form-check-label" for="suratTanah1"> Ya </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline ">
                                                                            <input name="yn_surat_tanah_revisi[]" class="form-check-input" type="radio" value="0" id="suratTanah2" <?php if ($action_value  == '0') echo 'checked'; ?> />
                                                                            <label class="form-check-label" for="suratTanah2"> Tidak </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-text-area">
                                                                            <textarea class="form-control" name="surat_tanah_revisi[]" disabled><?php echo $surat_tanah_value ?></textarea>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                    <?php }else{?>
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
                                                                <div class="form-check form-check-inline">
                                                                    <input name="yn_surat_tanah[]" class="form-check-input" type="radio" value="1" id="suratTanah1" />
                                                                    <label class="form-check-label" for="suratTanah1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_surat_tanah[]" class="form-check-input" type="radio" value="0" id="suratTanah2" />
                                                                    <label class="form-check-label" for="suratTanah2"> Tidak </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-text-area">
                                                                    <textarea class="form-control" name="surat_tanah[]" data-preview="preview">Surat Tanah : </textarea>
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
                                                                        <div class="form-check form-check-inline">
                                                                            <input name="yn_surat_tanah_revisi[]" class="form-check-input" type="radio" value="1" id="suratTanah1" <?php if ($action_value  == '1') echo 'checked'; ?> />
                                                                            <label class="form-check-label" for="suratTanah1"> Ya </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline ">
                                                                            <input name="yn_surat_tanah_revisi[]" class="form-check-input" type="radio" value="0" id="suratTanah2" <?php if ($action_value  == '0') echo 'checked'; ?> />
                                                                            <label class="form-check-label" for="suratTanah2"> Tidak </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-text-area">
                                                                            <textarea class="form-control" name="surat_tanah_revisi[]" disabled><?php if ($surat_tanah_value) echo $surat_tanah_value ?></textarea>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php }else{?>
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
                                                                <div class="form-check form-check-inline">
                                                                    <input name="yn_surat_tanah[]" class="form-check-input" type="radio" value="1" id="suratTanah1" />
                                                                    <label class="form-check-label" for="suratTanah1"> Ya </label>
                                                                </div>
                                                                <div class="form-check form-check-inline ">
                                                                    <input name="yn_surat_tanah[]" class="form-check-input" type="radio" value="0" id="suratTanah2" />
                                                                    <label class="form-check-label" for="suratTanah2"> Tidak </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-text-area">
                                                                    <textarea class="form-control" name="surat_tanah[]" data-preview="preview">Surat Tanah : </textarea>
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
                                                                <input name="yn_peta_bidang_revisi" class="form-check-input" type="radio" value="1" id="petaBidang1" />
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
                                                    <input name="yn_peta_bidang" class="form-check-input" type="radio" value="1" id="petaBidang1" />
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
                                            <textarea class="form-control" name="peta_bidang" data-preview="preview">Peta Bidang : </textarea>
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
                                                                <input name="yn_shp_revisi" class="form-check-input" type="radio" value="1" id="shp1" />
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

                                                <div class="form-check form-check-inline ms-5 ">
                                                    <input name="yn_shp" class="form-check-input" type="radio" value="1" id="shp1" />
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
                                            <textarea class="form-control" name="shp" data-preview="preview">SHP : </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                                <input name="yn_dokumen_oss_revisi" class="form-check-input" type="radio" value="1" id="dokOSS1" />
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
                                                    <input name="yn_dokumen_oss" class="form-check-input" type="radio" value="1" id="dokOSS1" />
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
                                            <textarea class="form-control" name="dokumen_oss" data-preview="preview">Dokumen OSS :</textarea>
                                            <input type="hidden" name="type" class="form-control" value="<?php if ($kkpr) echo $kkpr->type ?>">
                                            <input type="hidden" name="id" class="form-control" value="<?php if ($kkpr) echo $kkpr->id_kkpr_permohonan ?>">
                                            <input type="hidden" name="telp_pemohon" class="form-control" value="<?php if ($kkpr) echo $kkpr->telp_pemohon ?>">
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
                                                                    <input name="yn_surat_kematian_revisi" class="form-check-input" type="radio" value="1" id="suratKematian1" />
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
                                                        <input name="yn_surat_kematian" class="form-check-input" type="radio" value="1" id="suratKematian1" />
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
                                                <textarea class="form-control" name="surat_kematian" data-preview="preview">Surat Kematian :</textarea>
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
                                                                    <input name="yn_surat_kuasa_ahli_waris_revisi" class="form-check-input" type="radio" value="1" id="suratKuasaAhliWaris1" />
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
                                                        <input name="yn_surat_kuasa_ahli_waris" class="form-check-input" type="radio" value="1" id="suratKuasaAhliWaris1" />
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
                                                <textarea class="form-control" name="surat_kuasa_ahli_waris" data-preview="preview">Surat Kuasa Ahli Waris : </textarea>
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
                                                                    <input name="yn_surat_dinas_komunikasi_revisi" class="form-check-input" type="radio" value="1" id="suratRekomIT1" />
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
                                                        <input name="yn_surat_dinas_komunikasi" class="form-check-input" type="radio" value="1" id="suratRekomIT1" />
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
                                                <textarea class="form-control" name="surat_dinas_komunikasi" data-preview="preview">Surat Rekomendasi Dinas Komunikasi dan Informatika :</textarea>
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
                                                                    <input name="yn_surat_rekom_tni_revisi" class="form-check-input" type="radio" value="1" id="suratRekomTNI1" />
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
                                                        <input name="yn_surat_rekom_tni" class="form-check-input" type="radio" value="1" id="suratRekomTNI1" />
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
                                                <textarea class="form-control" name="surat_rekom_tni" data-preview="preview">Surat Rekomendasi TNI :</textarea>
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
                                                                    <input name="yn_surat_dinas_perdagagan_revisi" class="form-check-input" type="radio" value="1" id="suratRekomPerdagangan1" />
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
                                                        <input name="yn_surat_dinas_perdagagan" class="form-check-input" type="radio" value="1" id="suratRekomPerdagangan1" />
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
                                                <textarea class="form-control" name="surat_dinas_perdagangan" data-preview="preview">Surat Rekomendasi Dinas Perdagangan :</textarea>
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
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_peternakan?> ?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_peternakan?> ?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

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
                                                                    <input name="yn_surat_dinas_peternakan_revisi" class="form-check-input" type="radio" value="1" id="suratRekomPeternakan1" />
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
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_peternakan?>" class="btn btn-sm btn-secondary mb-2" download>Unduh</a>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_peternakan?>" target="_blank" class="btn btn-sm btn-primary mb-2">Lihat</a>

                                                    <div class="form-check form-check-inline ms-5 ">
                                                        <input name="yn_surat_dinas_peternakan"  class="form-check-input" type="radio" value="1" id="suratRekomPeternakan1" />
                                                        <label class="form-check-label" for="suratRekomPeternakan1"> Ya </label>
                                                    </div>
                                                    <div class="form-check form-check-inline ">
                                                        <input name="yn_surat_dinas_peternakan"  class="form-check-input" type="radio" value="0" id="suratRekomPeternakan2" />
                                                        <label class="form-check-label" for="suratRekomPeternakan2"> Tidak </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-text-area">
                                            <textarea class="form-control" name="surat_dinas_peternakan" data-preview="preview">Surat Rekomendasi Dinas Peternakan :</textarea>
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
                                                                    <input name="yn_surat_pertamina_revisi" class="form-check-input" type="radio" value="1" id="suratRekomPertamina1" />
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
                                                        <input name="yn_surat_pertamina"  class="form-check-input" type="radio" value="1" id="suratRekomPertamina1" />
                                                        <label class="form-check-label" for="suratRekomPertamina1"> Ya </label>
                                                    </div>
                                                    <div class="form-check form-check-inline ">
                                                        <input name="yn_surat_pertamina"  class="form-check-input" type="radio" value="0" id="suratRekomPertamina2" />
                                                        <label class="form-check-label" for="suratRekomPertamina2"> Tidak </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-text-area">
                                            <textarea class="form-control" name="surat_pertamina" data-kt-autosize="true" data-preview="preview">Surat Rekomendasi Pertamina :</textarea>
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
                                                                    <input name="yn_daftar_nama_kk_revisi" class="form-check-input" type="radio" value="1" id="daftarNamaKK1" />
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
                                                        <input name="yn_daftar_nama_kk"  class="form-check-input" type="radio" value="1" id="daftarNamaKK1" />
                                                        <label class="form-check-label" for="daftarNamaKK1"> Ya </label>
                                                    </div>
                                                    <div class="form-check form-check-inline ">
                                                        <input name="yn_daftar_nama_kk"  class="form-check-input" type="radio" value="0" id="daftarNamaKK2" />
                                                        <label class="form-check-label" for="daftarNamaKK2"> Tidak </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-text-area">
                                            <textarea class="form-control" name="daftar_nama_kk"  data-kt-autosize="true" data-preview="preview">Daftar Persetujuan Warga :</textarea>
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
                                                                    <input name="yn_surat_fkub_revisi" class="form-check-input" type="radio" value="1" id="suratFKUB1" />
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
                                                        <input name="yn_surat_fkub"  class="form-check-input" type="radio" value="1" id="suratFKUB1" />
                                                        <label class="form-check-label" for="suratFKUB1"> Ya </label>
                                                    </div>
                                                    <div class="form-check form-check-inline ">
                                                        <input name="yn_surat_fkub"  class="form-check-input" type="radio" value="0" id="suratFKUB2" />
                                                        <label class="form-check-label" for="suratFKUB2"> Tidak </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-text-area">
                                            <textarea class="form-control" name="fkub"  data-kt-autosize="true" data-preview="preview">Surat FKUB :</textarea>
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
                                    <textarea class="form-control" name="preview"> </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row float-end">
                            <div class="col-md-12">
                                <a href="<?php echo base_url('kkpr/admin_kkpr'); ?>">
                                    <button type="button" class="btn btn-outline-secondary">Kembali</button>
                                </a>
                                <button type="submit" class="btn btn-danger reject-button">Tolak</button>
                                <a href="<?php echo base_url('Kkpr/proses_terima/'); ?><?= $kkpr->id_kkpr_permohonan; ?>" class="btn btn-primary acc-button">Terima</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- / Content -->