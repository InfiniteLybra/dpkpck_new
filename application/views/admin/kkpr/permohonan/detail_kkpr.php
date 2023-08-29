<?php
$kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$kkpr->kelurahan_pemohon' ")->row();
$kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$kkpr->kecamatan_pemohon' ")->row();
$kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$kkpr->kota_pemohon' ")->row();
$provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$kkpr->provinsi_pemohon' ")->row();

$kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$kkpr->kelurahan_tanah' ")->row();
$kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$kkpr->kecamatan_tanah' ")->row();

$keterangan = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_permohonan = '$kkpr->id_kkpr_permohonan' ")->row();
$pmlk_meinggal = $this->db->query("SELECT surat_kematian FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$kkpr->id_kkpr_permohonan' ")->row();
$yn = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_permohonan = '$kkpr->id_kkpr_permohonan' ")->row();
?>
<!--begin::details View-->
<form action="<?php echo base_url('Kkpr/proses_keterangan'); ?>" method="post">
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Detail Data</h3>
            </div>
            <!--end::Card title-->
            <!--begin::Action-->
            <!-- <a href="../../demo1/dist/account/settings.html" class="btn btn-sm btn-primary align-self-center">Edit Profile</a> -->
            <!--end::Action-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">
            <!--begin::Row-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Nomor</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">650/000<?php if ($kkpr) echo $kkpr->id_kkpr_permohonan ?>/35.07.111/2023</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Nama</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800"><?php if ($kkpr) echo $kkpr->nama_pemohon ?></span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Fotocopy Ktp Pemohon</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <table align="left">
                        <tr>
                            <!-- <td class="text-center pe-0">
                            <span class="fw-bold">1</span>
                        </td> -->
                            <td class="min-w-100px" style=" width: 50pc;">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->fotokopi_ktp ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->fotokopi_ktp ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                <?php if ($yn) { ?>
                                    <select name="yn_fotokopi_ktp" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1" <?php if ($yn->fotokopi_ktp == '1') echo 'selected'; ?>>Ya</option>
                                        <option value="0" <?php if ($yn->fotokopi_ktp == '0') echo 'selected'; ?>>Tidak</option>
                                    </select>
                                <?php } else { ?>
                                    <select name="yn_fotokopi_ktp" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                <?php } ?>
                            </td>
                            <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                <textarea class="form-control" name="fotokopi_ktp" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->fotokopi_ktp ?></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Input group-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Alamat</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-semibold text-gray-800 fs-6">
                        <?php if ($kkpr) echo $kkpr->alamat_pemohon ?> RT. <?php if ($kkpr) echo $kkpr->rt_pemohon ?> RW. <?php if ($kkpr) echo $kkpr->rw_pemohon ?> Kel. <?= $kelurahan->subdis_name ?> - Kec. <?= $kecamatan->dis_name ?> - Kota / Kab. <?= $kota->city_name ?> - Prov. <?= $provinsi->prov_name ?>
                    </span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Bertindak Atas Nama</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-semibold text-gray-800 fs-6"><?php if ($kkpr) echo $kkpr->nama_perusahaan ?></span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <?php if ($kkpr->nama_perusahaan) { ?>
                <!--begin::Row-->
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Fotokopi akta pendirian perusahaan</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <!-- <td class="text-center pe-0">
                                <span class="fw-bold">1</span>
                            </td> -->
                                <td class="min-w-100px" style=" width: 50pc;">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->akta_perusahaan ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->akta_perusahaan ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <?php if ($yn) { ?>
                                        <select name="yn_akta_perusahaan" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1" <?php if ($yn->akta_perusahaan == '1') echo 'selected'; ?>>Ya</option>
                                            <option value="0" <?php if ($yn->akta_perusahaan == '0') echo 'selected'; ?>>Tidak</option>
                                        </select>
                                    <?php } else { ?>
                                        <select name="yn_akta_perusahaan" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="akta_perusahaan" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->akta_perusahaan ?></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <?php if ($kkpr->npwp) { ?>
                <!--begin::Row-->
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Fotokopi NPWP</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <!-- <td class="text-center pe-0">
                                    <span class="fw-bold">1</span>
                                </td> -->
                                <td class="min-w-100px" style=" width: 50pc;">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->npwp ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->npwp ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <?php if ($yn) { ?>
                                        <select name="yn_npwp" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1" <?php if ($yn->npwp == '1') echo 'selected'; ?>>Ya</option>
                                            <option value="0" <?php if ($yn->npwp == '0') echo 'selected'; ?>>Tidak</option>
                                        </select>
                                    <?php } else { ?>
                                        <select name="yn_npwp" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="npwp" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->npwp ?></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <!--begin::Input group-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">NIB / Skala Usaha</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-semibold text-gray-800 fs-6"><?php if ($kkpr) echo $kkpr->nib ?> / <?php if ($kkpr) echo $kkpr->skala_usaha ?></span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Row-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">NIB</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <table align="left">
                        <tr>
                            <!-- <td class="text-center pe-0">
                                    <span class="fw-bold">1</span>
                                </td> -->
                            <td class="min-w-100px" style=" width: 50pc;">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->tdp ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->tdp ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                <?php if ($yn) { ?>
                                    <select name="yn_tdp" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1" <?php if ($yn->tdp == '1') echo 'selected'; ?>>Ya</option>
                                        <option value="0" <?php if ($yn->tdp == '0') echo 'selected'; ?>>Tidak</option>
                                    </select>
                                <?php } else { ?>
                                    <select name="yn_tdp" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                <?php } ?>
                            </td>
                            <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                <textarea class="form-control" name="tdp" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->tdp ?></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Input group-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">KBLI / Tingkat Risiko</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <?php
                    $kbli = json_decode($kkpr->kbli);
                    foreach ($kbli as $k) {
                    ?>
                        <span class="fw-semibold text-gray-800 fs-6"><?php echo $k->kbli ?> - <?php if ($kkpr) echo $kkpr->kategori ?> / <?php if ($kkpr) echo $kkpr->klasifikasi_resiko ?></span><br>
                    <?php } ?>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Peruntukan / Luas Tanah </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-semibold text-gray-800 fs-6"><?php if ($kkpr) echo $kkpr->peruntukan_tanah ?> / <?php if ($kkpr) echo $kkpr->luas_tanah ?> m²</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Lokasi</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-semibold text-gray-800 fs-6"><?php if ($kkpr) echo $kkpr->lokasi_tanah ?> Desa / Kel. <?= $kelurahan_tanah->nama_desa ?> - Kec. <?= $kecamatan_tanah->nama_kecamatan ?> </span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Row-->
            <?php
            $surat_tanah = json_decode($kkpr->surat_tanah);
            foreach ($surat_tanah as $s) {
            ?>
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Surat Tanah</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <td class="min-w-100px" style=" width: 50pc;">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $s->surat_tanah ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $s->surat_tanah ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <select name="yn_surat_tanah[]" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <?php
                                    // if($keterangan){
                                    // $surat_tanah_keterangan = json_decode($keterangan->surat_tanah);
                                    // foreach ($surat_tanah_keterangan as $sk) {
                                    ?>
                                        <!-- <textarea class="form-control" name="surat_tanah[]" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $sk->surat_tanah ?></textarea> -->
                                    <?php //}}else{ ?>
                                        <textarea class="form-control" name="surat_tanah[]" data-kt-autosize="true" data-preview="preview"></textarea>
                                    <?php //} ?>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <!--begin::Row-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Peta Bidang</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <table align="left">
                        <tr>
                            <td class="min-w-100px" style=" width: 50pc;">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->peta_bidang ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->peta_bidang ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                <?php if ($yn) { ?>
                                    <select name="yn_peta_bidang" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1" <?php if ($yn->peta_bidang == '1') echo 'selected'; ?>>Ya</option>
                                        <option value="0" <?php if ($yn->peta_bidang == '0') echo 'selected'; ?>>Tidak</option>
                                    </select>
                                <?php } else { ?>
                                    <select name="yn_peta_bidang" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                <?php } ?>
                            </td>
                            <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                <!-- <input type="text" name="surat_tanah" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_tanah ?>"> -->
                                <textarea class="form-control" name="peta_bidang" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->peta_bidang ?></textarea>
                            </td>

                        </tr>
                    </table>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Input group-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">No Handphone
                </label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 d-flex align-items-center">
                    <span class="fw-bold fs-6 text-gray-800 me-2"><?php if ($kkpr) echo $kkpr->telp_pemohon ?></span>
                    <!-- <span class="badge badge-success">Verified</span> -->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Row-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Dokumen yang di unduh pada OSS</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <table align="left">
                        <tr>
                            <td class="min-w-100px" style=" width: 50pc;">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->dokumen_oss ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->dokumen_oss ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                <?php if ($yn) { ?>
                                    <select name="yn_dokumen_oss" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1" <?php if ($yn->dokumen_oss == '1') echo 'selected'; ?>>Ya</option>
                                        <option value="0" <?php if ($yn->dokumen_oss == '0') echo 'selected'; ?>>Tidak</option>
                                    </select>
                                <?php } else { ?>
                                    <select name="yn_dokumen_oss" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                <?php } ?>
                            </td>
                            <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                <textarea class="form-control" name="dokumen_oss" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->dokumen_oss ?></textarea>
                                <input type="hidden" name="type" class="form-control" value="<?php if ($kkpr) echo $kkpr->type ?>">
                                <input type="hidden" name="id" class="form-control" value="<?php if ($kkpr) echo $kkpr->id_kkpr_permohonan ?>">
                                <input type="hidden" name="telp_pemohon" class="form-control" value="<?php if ($kkpr) echo $kkpr->telp_pemohon ?>">
                            </td>

                        </tr>
                    </table>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <?php if ($pmlk_meinggal) { ?>
                <!--begin::Row-->
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Surat Kematian</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <td class="min-w-100px" style=" width: 50pc;">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kematian ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kematian ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <?php if ($yn) { ?>
                                        <select name="yn_surat_kematian" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1" <?php if ($yn->surat_kematian == '1') echo 'selected'; ?>>Ya</option>
                                            <option value="0" <?php if ($yn->surat_kematian == '0') echo 'selected'; ?>>Tidak</option>
                                        </select>
                                    <?php } else { ?>
                                        <select name="yn_surat_kematian" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_kematian" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->surat_kematian ?></textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Surat kuasa ahli waris</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <td class="min-w-100px" style=" width: 50pc;">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kuasa_ahli_waris ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kuasa_ahli_waris ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <?php if ($yn) { ?>
                                        <select name="yn_surat_kuasa_ahli_waris" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1" <?php if ($yn->surat_kuasa_ahli_waris == '1') echo 'selected'; ?>>Ya</option>
                                            <option value="0" <?php if ($yn->surat_kuasa_ahli_waris == '0') echo 'selected'; ?>>Tidak</option>
                                        </select>
                                    <?php } else { ?>
                                        <select name="yn_surat_kuasa_ahli_waris" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_kuasa_ahli_waris" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->surat_kuasa_ahli_waris ?></textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <?php if ($kkpr->type == "tower") { ?>
                <!--begin::Row-->
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Surat rekomendasi dari dinas Komunikasi dan informatika</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <td class="min-w-100px" style=" width: 50pc;">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_komunikasi ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_komunikasi ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <?php if ($yn) { ?>
                                        <select name="yn_surat_dinas_komunikasi" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1" <?php if ($yn->surat_dinas_komunikasi == '1') echo 'selected'; ?>>Ya</option>
                                            <option value="0" <?php if ($yn->surat_dinas_komunikasi == '0') echo 'selected'; ?>>Tidak</option>
                                        </select>
                                    <?php } else { ?>
                                        <select name="yn_surat_dinas_komunikasi" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_dinas_komunikasi" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->surat_dinas_komunikasi ?></textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Surat rekomendasi TNI</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <td class="min-w-100px" style=" width: 50pc;">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_rekom_tni ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_rekom_tni ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <?php if ($yn) { ?>
                                        <select name="yn_surat_rekom_tni" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1" <?php if ($yn->surat_rekom_tni == '1') echo 'selected'; ?>>Ya</option>
                                            <option value="0" <?php if ($yn->surat_rekom_tni == '0') echo 'selected'; ?>>Tidak</option>
                                        </select>
                                    <?php } else { ?>
                                        <select name="yn_surat_rekom_tni" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_rekom_tni" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->surat_rekom_tni ?></textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <?php if ($kkpr->type == "minimarket") { ?>
                <!--begin::Row-->
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Surat rekomendasi dari dinas perdagangan</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <td class="min-w-100px" style=" width: 50pc;">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_perdagangan ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_perdagangan ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <?php if ($yn) { ?>
                                        <select name="yn_surat_dinas_perdagagan" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1" <?php if ($yn->surat_dinas_perdagangan == '1') echo 'selected'; ?>>Ya</option>
                                            <option value="0" <?php if ($yn->surat_dinas_perdagangan == '0') echo 'selected'; ?>>Tidak</option>
                                        </select>
                                    <?php } else { ?>
                                        <select name="yn_surat_dinas_perdagagan" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_dinas_perdagangan" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->surat_dinas_perdagangan ?></textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <?php if ($kkpr->type == "peternakan") { ?>
                <!--begin::Row-->
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Surat rekomendasi dari dinas peternakan</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <td class="min-w-100px" style=" width: 50pc;">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_peternakan ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_peternakan ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <?php if ($yn) { ?>
                                        <select name="yn_surat_dinas_peternakan" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1" <?php if ($yn->surat_dinas_peternakan == '1') echo 'selected'; ?>>Ya</option>
                                            <option value="0" <?php if ($yn->surat_dinas_peternakan == '0') echo 'selected'; ?>>Tidak</option>
                                        </select>
                                    <?php } else { ?>
                                        <select name="yn_surat_dinas_peternakan" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_dinas_peternakan" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->surat_dinas_peternakan ?></textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <?php if ($kkpr->type == "spbu") { ?>
                <!--begin::Row-->
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Surat rekomendasi dari pertamina</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <td class="min-w-100px" style=" width: 50pc;">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_pertamina ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_pertamina ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <?php if ($yn) { ?>
                                        <select name="yn_surat_pertamina" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1" <?php if ($yn->surat_pertamina == '1') echo 'selected'; ?>>Ya</option>
                                            <option value="0" <?php if ($yn->surat_pertamina == '0') echo 'selected'; ?>>Tidak</option>
                                        </select>
                                    <?php } else { ?>
                                        <select name="yn_surat_pertamina" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_pertamina" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->surat_pertamina ?></textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <?php if ($kkpr->type == "tempat_ibadah") { ?>
                <!--begin::Row-->
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Daftar nama persetujuan warga</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <td class="min-w-100px" style=" width: 50pc;">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->daftar_nama_kk ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->daftar_nama_kk ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <?php if ($yn) { ?>
                                        <select name="yn_daftar_nama_kk" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1" <?php if ($yn->daftar_nama_kk == '1') echo 'selected'; ?>>Ya</option>
                                            <option value="0" <?php if ($yn->daftar_nama_kk == '0') echo 'selected'; ?>>Tidak</option>
                                        </select>
                                    <?php } else { ?>
                                        <select name="yn_daftar_nama_kk" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="daftar_nama_kk" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->daftar_nama_kk ?></textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Surat FKUB</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <td class="min-w-100px" style=" width: 50pc;">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_fkub ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_fkub ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <?php if ($yn) { ?>
                                        <select name="yn_surat_fkub" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1" <?php if ($yn->surat_fkub == '1') echo 'selected'; ?>>Ya</option>
                                            <option value="0" <?php if ($yn->surat_fkub == '0') echo 'selected'; ?>>Tidak</option>
                                        </select>
                                    <?php } else { ?>
                                        <select name="yn_surat_fkub" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="fkub" data-kt-autosize="true" data-preview="preview"><?php if ($keterangan) echo $keterangan->fkub ?></textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <!--begin::Row-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Pesan dikirim ke whatsapp</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <textarea class="form-control" name="preview" data-kt-autosize="true"></textarea>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <div class="">
                <div style="float: right;">
                    <a href="<?php echo base_url('kkpr/admin_kkpr'); ?>" class="btn btn-light">Kembali</a>
                    <button class="btn btn-danger" type="submit">Tolak</button>
                    <a href="<?php echo base_url('Kkpr/proses_terima/'); ?><?= $kkpr->id_kkpr_permohonan ?>" class="btn btn-success">Terima</a>
                </div>
            </div>
</form>
</div>
<!--end::Card body-->
</div>
<!--end::details View-->