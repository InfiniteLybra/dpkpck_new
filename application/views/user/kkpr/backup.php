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
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Profile Details</h3>
        </div>
        <!--end::Card title-->
        <!--begin::Action-->
        <!-- <a href="../../demo1/dist/account/settings.html" class="btn btn-sm btn-primary align-self-center">Edit Profile</a> -->
        <!--end::Action-->
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        <form action="<?php echo base_url('Kkpr/proses_keterangan'); ?>" method="post">
            <table class="table align-middle table-row-dashed fs-6 gy-5" border="1">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <!-- <th class="text-center min-w-50px">No.</th> -->
                        <th class="text-center min-w-100px">Lampiran</th>
                        <th class="text-center min-w-100px">File</th>
                        <!-- <th class="text-center min-w-70px">Actions</th> -->
                        <th class="text-center min-w-200px">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php if ($yn->dokumen_oss == '0') { ?>
                        <tr>
                            <!-- <td class="text-center pe-0">
                            <span class="fw-bold">1</span>
                        </td> -->
                            <td class="text-center pe-0">
                                <span class="fw-bold">Dokumen yang di unduh pada OSS</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->dokumen_oss ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->dokumen_oss ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
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
                            <td class="text-center pe-0">
                                <!-- <input type="text" name="dokumen_oss" class="form-control" value="<?php if ($keterangan) echo $keterangan->dokumen_oss ?>"> -->
                                <textarea class="form-control" name="dokumen_oss" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->dokumen_oss ?></textarea>
                                <input type="hidden" name="type" class="form-control" value="<?php if ($kkpr) echo $kkpr->type ?>">
                                <input type="hidden" name="id" class="form-control" value="<?php if ($kkpr) echo $kkpr->id_kkpr_permohonan ?>">
                                <input type="hidden" name="telp_pemohon" class="form-control" value="<?php if ($kkpr) echo $kkpr->telp_pemohon ?>">
                            </td>
                        </tr>
                    <?php } ?>
                    <?php if ($yn->fotokopi_ktp == '0') { ?>
                        <tr>
                            <!-- <td class="text-center pe-0">
                            <span class="fw-bold">2</span>
                        </td> -->
                            <td class="text-center pe-0">
                                <span class="fw-bold">Fotokopi KTP Pemohon</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->fotokopi_ktp ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->fotokopi_ktp ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
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
                            <td class="text-center pe-0">
                                <!-- <input type="text" name="fotokopi_ktp" class="form-control" value="<?php if ($keterangan) echo $keterangan->fotokopi_ktp ?>"> -->
                                <textarea class="form-control" name="fotokopi_ktp" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->fotokopi_ktp ?></textarea>
                            </td>

                        </tr>
                    <?php } ?>
                    <?php if ($kkpr->nama_perusahaan) { ?>
                        <?php if ($yn->akta_perusahaan == '0') { ?>
                            <tr>
                                <!-- <td class="text-center pe-0">
                                    <span class="fw-bold">4</span>
                                </td> -->
                                <td class="text-center pe-0">
                                    <span class="fw-bold">Fotokopi akta pendirian perusahaan (legalisir)</span>
                                </td>
                                <td class="text-center pe-0">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->akta_perusahaan ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->akta_perusahaan ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0">
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
                                <td class="text-center pe-0">
                                    <!-- <input type="text" name="akta_perusahaan" class="form-control" value="<?php if ($keterangan) echo $keterangan->akta_perusahaan ?>"> -->
                                    <textarea class="form-control" name="akta_perusahaan" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->akta_perusahaan ?></textarea>
                                </td>

                            </tr>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($yn->tdp == '0') { ?>
                        <tr>
                            <!-- <td class="text-center pe-0">
                                <span class="fw-bold">6</span>
                            </td> -->
                            <td class="text-center pe-0">
                                <span class="fw-bold">TDP / NIB</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->tdp ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->tdp ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
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
                            <td class="text-center pe-0">
                                <!-- <input type="text" name="tdp" class="form-control" value="<?php if ($keterangan) echo $keterangan->tdp ?>"> -->
                                <textarea class="form-control" name="tdp" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->tdp ?></textarea>
                            </td>

                        </tr>
                    <?php } ?>
                    <?php if ($kkpr->npwp) { ?>
                        <?php if ($yn->npwp == '0') { ?>
                            <tr>
                                <!-- <td class="text-center pe-0">
                                    <span class="fw-bold">7</span>
                                </td> -->
                                <td class="text-center pe-0">
                                    <span class="fw-bold">Fotokopi NPWP</span>
                                </td>
                                <td class="text-center pe-0">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->npwp ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->npwp ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0">
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
                                <td class="text-center pe-0">
                                    <!-- <input type="text" name="npwp" class="form-control" value="<?php if ($keterangan) echo $keterangan->npwp ?>"> -->
                                    <textarea class="form-control" name="npwp" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->npwp ?></textarea>
                                </td>

                            </tr>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($yn->surat_tanah) { ?>
                        <tr>
                            <!-- <td class="text-center pe-0">
                                <span class="fw-bold">8</span>
                            </td> -->
                            <td class="text-center pe-0">
                                <span class="fw-bold">Fotokopi surat tanah</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_tanah ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_tanah ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <?php if ($yn) { ?>
                                    <select name="yn_surat_tanah" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1" <?php if ($yn->surat_tanah == '1') echo 'selected'; ?>Ya</option>
                                        <option value="0" <?php if ($yn->surat_tanah == '0') echo 'selected'; ?>>Tidak</option>
                                    </select>
                                <?php } ?>
                                <select name="yn_surat_tanah" id="" class="form-select form-control" style="width: 100px;">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </td>
                            <td class="text-center pe-0">
                                <!-- <input type="text" name="surat_tanah" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_tanah ?>"> -->
                                <textarea class="form-control" name="surat_tanah" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_tanah ?></textarea>
                            </td>

                        </tr>
                    <?php } ?>
                    <?php if ($yn->peta_bidang == '0') { ?>
                        <tr>
                            <!-- <td class="text-center pe-0">
                                <span class="fw-bold">9</span>
                            </td> -->
                            <td class="text-center pe-0">
                                <span class="fw-bold">Peta Bidang (dari BPN)</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->peta_bidang ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->peta_bidang ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
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
                            <td class="text-center pe-0">
                                <!-- <input type="text" name="peta_bidang" class="form-control" value="<?php if ($keterangan) echo $keterangan->peta_bidang ?>"> -->
                                <textarea class="form-control" name="peta_bidang" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->peta_bidang ?></textarea>
                            </td>

                        </tr>
                    <?php } ?>
                    <?php if ($pmlk_meinggal) { ?>
                        <?php if ($yn->surat_kematian == '0') { ?>
                            <tr>
                                <!-- <td class="text-center pe-0">
                                    <span class="fw-bold">11</span>
                                </td> -->
                                <td class="text-center pe-0">
                                    <span class="fw-bold">Surat Kematian</span>
                                </td>
                                <td class="text-center pe-0">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kematian ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kematian ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0">
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
                                <td class="text-center pe-0">
                                    <!-- <input type="text" name="surat_kematian" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_kematian ?>"> -->
                                    <textarea class="form-control" name="surat_kematian" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_kematian ?></textarea>
                                </td>

                            </tr>
                        <?php } ?>
                        <?php if ($yn->surat_kuasa_ahli_waris == '0') { ?>
                            <tr>
                                <!-- <td class="text-center pe-0">
                                        <span class="fw-bold">12</span>
                                    </td> -->
                                <td class="text-center pe-0">
                                    <span class="fw-bold">Surat kuasa ahli waris</span>
                                </td>
                                <td class="text-center pe-0">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kuasa_ahli_waris ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_kuasa_ahli_waris ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0">
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
                                <td class="text-center pe-0">
                                    <!-- <input type="text" name="surat_kuasa_ahli_waris" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_kuasa_ahli_waris ?>"> -->
                                    <textarea class="form-control" name="surat_kuasa_ahli_waris" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_kuasa_ahli_waris ?></textarea>
                                </td>

                            </tr>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($kkpr->type == "tower") { ?>
                        <?php if ($yn->surat_dinas_komunikasi == '0') { ?>
                            <tr>
                                <!-- <td class="text-center pe-0">
                                    <span class="fw-bold">11</span>
                                </td> -->
                                <td class="text-center pe-0">
                                    <span class="fw-bold">Surat rekomendasi dari dinas Komunikasi dan informatika</span>
                                </td>
                                <td class="text-center pe-0">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_komunikasi ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_komunikasi ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0">
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
                                <td class="text-center pe-0">
                                    <!-- <input type="text" name="surat_dinas_komunikasi" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_dinas_komunikasi ?>"> -->
                                    <textarea class="form-control" name="surat_dinas_komunikasi" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_dinas_komunikasi ?></textarea>
                                </td>

                            </tr>
                        <?php } ?>
                        <?php if ($yn->surat_rekom_tni == '0') { ?>
                            <tr>
                                <!-- <td class="text-center pe-0">
                                        <span class="fw-bold">12</span>
                                    </td> -->
                                <td class="text-center pe-0">
                                    <span class="fw-bold">Surat rekomendasi TNI</span>
                                </td>
                                <td class="text-center pe-0">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_rekom_tni ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_rekom_tni ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0">
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
                                <td class="text-center pe-0">
                                    <!-- <input type="text" name="surat_rekom_tni" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_rekom_tni ?>"> -->
                                    <textarea class="form-control" name="surat_rekom_tni" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_rekom_tni ?></textarea>
                                </td>

                            </tr>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($kkpr->type == "minimarket") { ?>
                        <?php if ($yn->surat_dinas_perdagangan == '0') { ?>
                            <tr>
                                <!-- <td class="text-center pe-0">
                                    <span class="fw-bold">11</span>
                                </td> -->
                                <td class="text-center pe-0">
                                    <span class="fw-bold">Surat rekomendasi dari dinas perdagangan</span>
                                </td>
                                <td class="text-center pe-0">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_perdagangan ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_perdagangan ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0">
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
                                <td class="text-center pe-0">
                                    <!-- <input type="text" name="surat_dinas_perdagangan" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_dinas_perdagangan ?>"> -->
                                    <textarea class="form-control" name="surat_dinas_perdagangan" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_dinas_perdagangan ?></textarea>
                                </td>

                            </tr>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($kkpr->type == "peternakan") { ?>
                        <?php if ($yn->surat_dinas_peternakan == '0') { ?>
                            <tr>
                                <!-- <td class="text-center pe-0">
                                    <span class="fw-bold">11</span>
                                </td> -->
                                <td class="text-center pe-0">
                                    <span class="fw-bold">Surat rekomendasi dari dinas peternakan</span>
                                </td>
                                <td class="text-center pe-0">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_peternakan ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_dinas_peternakan ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0">
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
                                <td class="text-center pe-0">
                                    <!-- <input type="text" name="surat_dinas_peternakan" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_dinas_peternakan ?>"> -->
                                    <textarea class="form-control" name="surat_dinas_peternakan" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_dinas_peternakan ?></textarea>
                                </td>

                            </tr>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($kkpr->type == "spbu") { ?>
                        <?php if ($yn->surat_pertamina == '0') { ?>
                            <tr>
                                <!-- <td class="text-center pe-0">
                                    <span class="fw-bold">11</span>
                                </td> -->
                                <td class="text-center pe-0">
                                    <span class="fw-bold">Surat rekomendasi dari pertamina</span>
                                </td>
                                <td class="text-center pe-0">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_pertamina ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_pertamina ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0">
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
                                <td class="text-center pe-0">
                                    <!-- <input type="text" name="surat_pertamina" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_pertamina ?>"> -->
                                    <textarea class="form-control" name="surat_pertamina" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->surat_pertamina ?></textarea>
                                </td>

                            </tr>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($kkpr->type == "tempat_ibadah") { ?>
                        <?php if ($yn->daftar_nama_kk == '0') { ?>
                            <tr>
                                <!-- <td class="text-center pe-0">
                                    <span class="fw-bold">11</span>
                                </td> -->
                                <td class="text-center pe-0">
                                    <span class="fw-bold">Daftar nama persetujuan warga</span>
                                </td>
                                <td class="text-center pe-0">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->daftar_nama_kk ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->daftar_nama_kk ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0">
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
                                <td class="text-center pe-0">
                                    <!-- <input type="text" name="daftar_nama_kk" class="form-control" value="<?php if ($keterangan) echo $keterangan->daftar_nama_kk ?>"> -->
                                    <textarea class="form-control" name="daftar_nama_kk" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->daftar_nama_kk ?></textarea>
                                </td>

                            </tr>
                        <?php } ?>
                        <?php if ($yn->surat_fkub == '0') { ?>
                            <tr>
                                <!-- <td class="text-center pe-0">
                                        <span class="fw-bold">12</span>
                                    </td> -->
                                <td class="text-center pe-0">
                                    <span class="fw-bold">Surat FKUB</span>
                                </td>
                                <td class="text-center pe-0">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_fkub ?>" class="fw-bold" download>Download</a><br>
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->surat_fkub ?>" target="_blank" class="fw-bold">Lihat</a>
                                </td>
                                <td class="text-center pe-0">
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
                                <td class="text-center pe-0">
                                    <!-- <input type="text" name="surat_fkub" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_fkub ?>"> -->
                                    <textarea class="form-control" name="fkub" data-kt-autosize="true" data-preview="preview" readonly><?php if ($keterangan) echo $keterangan->fkub ?></textarea>
                                </td>

                            </tr>
                        <?php } ?>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="pe-0" style="float: right;">
                            <a href="<?php echo base_url('kkpr/admin_kkpr'); ?>" class="btn btn-light">Kembali</a>
                            <button class="btn btn-primary" type="submit">Upload Ulang</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->