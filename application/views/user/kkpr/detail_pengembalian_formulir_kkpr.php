<?php
$kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$kkpr->kelurahan_pemohon' ")->row();
$kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$kkpr->kecamatan_pemohon' ")->row();
$kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$kkpr->kota_pemohon' ")->row();
$provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$kkpr->provinsi_pemohon' ")->row();

$kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$kkpr->kelurahan_tanah' ")->row();
$kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$kkpr->kecamatan_tanah' ")->row();

$keterangan = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_permohonan = '$kkpr->id_kkpr_permohonan' ORDER BY id_pengembalian DESC LIMIT 1")->row();
$pmlk_meinggal = $this->db->query("SELECT surat_kematian FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$kkpr->id_kkpr_permohonan' ")->row();
$yn = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_permohonan = '$kkpr->id_kkpr_permohonan' ORDER BY id_action DESC LIMIT 1")->row();
?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User / Pengembalian Formulir
            /</span> Detail</h4>

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title mb-4">Detail Data</h5>
                <form action="<?php echo base_url('Kkpr/proses_pengembalian'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" value="<?php if ($kkpr) echo $kkpr->id_kkpr_permohonan ?>">
                    <?php if ($yn->dokumen_oss == '0') { ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="dokumen_oss">Dokumen yang diunduh
                                pada OSS</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->dokumen_oss ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->dokumen_oss ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-text-area">
                                            <textarea class="form-control" name="dokumen_oss" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->dokumen_oss ?></textarea>
                                            <input type="hidden" name="type" class="form-control" value="<?php if ($kkpr) echo $kkpr->type ?>">
                                            <input type="hidden" name="telp_pemohon" class="form-control" value="<?php if ($kkpr) echo $kkpr->telp_pemohon ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="file" name="file_dokumen_oss" class="form-file form-control" accept=".jpg, .pdf">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($yn->fotokopi_ktp == '0') { ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="ktp">Fotokopi KTP Pemohon</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->fotokopi_ktp ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->fotokopi_ktp ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-text-area">
                                            <textarea class="form-control" name="fotokopi_ktp" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->fotokopi_ktp ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="file" name="file_fotokopi_ktp" class="form-file form-control" accept=".jpg, .pdf">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($kkpr->nama_perusahaan) { ?>
                        <?php if ($yn->akta_perusahaan == '0') { ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="aktaPerusahaan">Fotokopi Akta
                                    Pendirian Perusahaan (legalisir)</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->akta_perusahaan ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->akta_perusahaan ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="akta_perusahaan" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->akta_perusahaan ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" name="file_akta_perusahaan" class="form-file form-control" accept=".jpg, .pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($yn->tdp == '0') { ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="nib">NIB</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->tdp ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->tdp ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-text-area">
                                            <textarea class="form-control" name="tdp" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->tdp ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="file" name="file_tdp" class="form-file form-control" accept=".jpg, .pdf">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($kkpr->npwp) { ?>
                        <?php if ($yn->npwp == '0') { ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="npwp">NPWP</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->npwp ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->npwp ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="npwp" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->npwp ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" name="file_npwp" class="form-file form-control" accept=".jpg, .pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php
                    if ($yn->surat_tanah) {
                        if ($kkpr->dasar_surat_tanah == 'letter' && $kkpr->status_surat_tanah == 'atas_nama_orang_lain') {

                            $surat_tanah = json_decode($kkpr->surat_tanah);
                            $keterangan_st = json_decode($keterangan->surat_tanah, true); // Ubah menjadi array PHP
                            $yn_surat_tanah = json_decode($yn->surat_tanah, true); // Ubah menjadi array PHP
                            $peta_bidang = json_decode($kkpr->peta_bidang_surat_tanah, true);
                            $no = 0;
                            foreach ($surat_tanah as $index => $st) {
                                $surat_tanah_value = isset($keterangan_st[$index]['surat_tanah']) ? $keterangan_st[$index]['surat_tanah'] : '';
                                $action_value = isset($yn_surat_tanah[$index]['surat_tanah']) ? $yn_surat_tanah[$index]['surat_tanah'] : '';
                                $peta_bidang_value = isset($peta_bidang[$index]['peta_bidang']) ? $peta_bidang[$index]['peta_bidang'] : '';
                                if ($action_value == 0) {
                    ?>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah">Surat Tanah dan Peta bidang</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/') . $st->surat_tanah ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/') . $st->surat_tanah ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-text-area">
                                                        <input type="hidden" name="index[]" value="<?= $index ?>">
                                                        <textarea class="form-control" name="surat_tanah[]" data-kt-autosize="true" data-preview="preview" readonly><?php echo $surat_tanah_value ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="file" name="file_status_tanah[]" class="form-file form-control" accept=".jpg, .pdf">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah"></label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/') . $peta_bidang_value ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/') . $peta_bidang_value ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-text-area">
                                                        <input type="hidden" name="index[]" value="<?= $index ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="file" name="file_peta_bidang_status_tanah[]" class="form-file form-control" accept=".jpg, .pdf">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        } else {
                            $surat_tanah = json_decode($kkpr->surat_tanah);
                            $keterangan_st = json_decode($keterangan->surat_tanah, true); // Ubah menjadi array PHP
                            $yn_surat_tanah = json_decode($yn->surat_tanah, true); // Ubah menjadi array PHP
                            $peta_bidang = json_decode($kkpr->peta_bidang_surat_tanah, true);
                            $no = 0;
                            foreach ($surat_tanah as $index => $st) {
                                $surat_tanah_value = isset($keterangan_st[$index]['surat_tanah']) ? $keterangan_st[$index]['surat_tanah'] : '';
                                $action_value = isset($yn_surat_tanah[$index]['surat_tanah']) ? $yn_surat_tanah[$index]['surat_tanah'] : '';
                                $peta_bidang_value = isset($peta_bidang[$index]['peta_bidang']) ? $peta_bidang[$index]['peta_bidang'] : '';
                                if ($action_value == 0) {
                                ?>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah">Surat Tanah</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/') . $st->surat_tanah ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                            <a href="<?php echo base_url('assets_dokumen/kkpr/') . $st->surat_tanah ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-text-area">
                                                        <input type="hidden" name="index[]" value="<?= $index ?>">
                                                        <textarea class="form-control" name="surat_tanah[]" data-kt-autosize="true" data-preview="preview" readonly><?php echo $surat_tanah_value ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="file" name="file_status_tanah[]" class="form-file form-control" accept=".jpg, .pdf">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    <?php
                                }
                            }
                        }
                    }
                    ?>
                    <?php if ($yn->peta_bidang == '0') { ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah">Peta Bidang (dari BPN)</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->peta_bidang ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->peta_bidang ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-text-area">
                                            <textarea class="form-control" name="peta_bidang" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->peta_bidang ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="file" name="file_peta_bidang" class="form-file form-control" accept=".jpg, .pdf">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($yn->shp == '0') { ?>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah">SHP</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->shp ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                <!-- <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->shp ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-text-area">
                                            <textarea class="form-control" name="shp" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->shp ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="file" name="file_shp" class="form-file form-control" accept=".zip">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($pmlk_meinggal) { ?>
                        <?php if ($yn->surat_kematian == '0') { ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah">Surat Kematian</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kematian ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kematian ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="surat_kematian" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_kematian ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" name="file_surat_kematian" class="form-file form-control" accept=".jpg, .pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($yn->surat_kuasa_ahli_waris == '0') { ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah">Surat kuasa ahli waris</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kuasa_ahli_waris ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kuasa_ahli_waris ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="surat_kuasa_ahli_waris" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_kuasa_ahli_waris ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" name="file_surat_kuasa_ahli_waris" class="form-file form-control" accept=".jpg, .pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($kkpr->type == "tower") { ?>
                        <?php if ($yn->surat_dinas_komunikasi == '0') { ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah">Surat rekomendasi dari dinas Komunikasi dan informatika</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_komunikasi ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_komunikasi ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="surat_dinas_komunikasi" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_dinas_komunikasi ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" name="file_surat_dinas_komunikasi" class="form-file form-control" accept=".jpg, .pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($yn->surat_rekom_tni == '0') { ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah">Surat rekomendasi TNI</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_rekom_tni ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_rekom_tni ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="surat_rekom_tni" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_rekom_tni ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" name="file_surat_rekom_tni" class="form-file form-control" accept=".jpg, .pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($kkpr->type == "minimarket") { ?>
                        <?php if ($yn->surat_dinas_perdagangan == '0') { ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah">Surat rekomendasi dari dinas perdagangan</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_perdagangan ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_perdagangan ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="surat_dinas_perdagangan" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_dinas_perdagangan ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" name="file_surat_dinas_perdagangan" class="form-file form-control" accept=".jpg, .pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($kkpr->type == "peternakan") { ?>
                        <?php if ($yn->surat_dinas_peternakan == '0') { ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah">Surat rekomendasi dari dinas peternakan</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_peternakan ?>" class="btn btn-sm btn-primary  mb-2" download>Download</a><br>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_peternakan ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="surat_dinas_peternakan" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_dinas_peternakan ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" name="file_surat_dinas_peternakan" class="form-file form-control" accept=".jpg, .pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($kkpr->type == "spbu") { ?>
                        <?php if ($yn->surat_pertamina == '0') { ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah">Surat rekomendasi dari pertamina</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_pertamina ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_pertamina ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="surat_pertamina" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_pertamina ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" name="file_surat_pertamina" class="form-file form-control" accept=".jpg, .pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($kkpr->type == "tempat_ibadah") { ?>
                        <?php if ($yn->daftar_nama_kk == '0') { ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah">Daftar nama persetujuan warga</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->daftar_nama_kk ?>" class="btn btn-sm btn-primary mb-2" download>Download</a><br>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->daftar_nama_kk ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="daftar_nama_kk" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->daftar_nama_kk ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" name="file_daftar_nama_kk" class="form-file form-control" accept=".jpg, .pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($yn->surat_fkub == '0') { ?>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold text-dark" for="surat_tanah">Surat FKUB</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_fkub ?>" class="btn btn-sm btn-primary  mb-2" download>Download</a><br>
                                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_fkub ?>" target="_blank" class="btn btn-sm btn-secondary mb-2">Lihat</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-text-area">
                                                <textarea class="form-control" name="fkub" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->fkub ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="file" name="file_fkub" class="form-file form-control" accept=".jpg, .pdf">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <div class="row float-end">
                        <div class="col-md-12">
                            <a href="<?php echo base_url('kkpr/pengembalian_formulir'); ?>">
                                <button type="button" class="btn btn-outline-secondary">Kembali</button>
                            </a>
                            <button class="btn btn-primary" type="submit">Upload Ulang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>