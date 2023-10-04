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

$revisi = $this->db->query("SELECT * FROM file_pengembalian_kkpr_permohonan WHERE id_permohonan= '$kkpr->id_kkpr_permohonan' ")->result();
// echo "SELECT * FROM file_pengembalian_kkpr_permohonan WHERE id_permohonan= '$kkpr->id_kkpr_permohonan' ";
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
            <?php
            $no = 1;
            foreach ($revisi as $r) {
                $ynfkp = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                $keteranganfkp = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                if ($r && $ynfkp->fotokopi_ktp == '0') {
            ?>
                    <!--begin::Row-->
                    <div class="row mb-4">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Fotocopy Ktp Pemohon (Revisi <?= $no++; ?>)</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <table align="left">
                                <tr>
                                    <!-- <td class="text-center pe-0">
                            <span class="fw-bold">1</span>
                        </td> -->
                                    <td class="min-w-100px" style=" width: 50pc;">
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->fotokopi_ktp ?>" class="fw-bold" download>Download</a><br>
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->fotokopi_ktp ?>" target="_blank" class="fw-bold">Lihat</a>
                                        <!-- <input type="hidden" name="file_fotokopi_ktp" value="<?= $kkpr->fotokopi_ktp ?>"> -->
                                    </td>
                                    <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                        <?php if ($ynfkp) { ?>
                                            <select name="yn_fotokopi_ktp_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                <option value="1" <?php if ($ynfkp->fotokopi_ktp == '1') echo 'selected'; ?>>Ya</option>
                                                <option value="0" <?php if ($ynfkp->fotokopi_ktp == '0') echo 'selected'; ?>>Tidak</option>
                                            </select>
                                        <?php } else { ?>
                                            <select name="yn_fotokopi_ktp_revisi" id="" class="form-select form-control" style="width: 100px;">
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                        <textarea class="form-control" name="fotokopi_ktp_revisi" data-kt-autosize="true" disabled><?php echo $keteranganfkp->fotokopi_ktp ?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
            <?php }
            } ?>
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
                                <input type="hidden" name="file_fotokopi_ktp" value="<?= $kkpr->fotokopi_ktp ?>">
                            </td>
                            <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                <select name="yn_fotokopi_ktp" id="" class="form-select form-control" style="width: 100px;">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </td>
                            <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                <textarea class="form-control" name="fotokopi_ktp" data-kt-autosize="true" data-preview="preview">Fotokopi KTP : </textarea>
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
                <?php
                $no = 1;
                foreach ($revisi as $r) {
                    $ynp = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    $keteranganp = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    if ($revisi && $ynp->akta_perusahaan == '0') {
                ?>
                        <div class="row mb-4">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Fotokopi akta pendirian perusahaan (Revisi <?= $no++; ?>)</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <table align="left">
                                    <tr>
                                        <!-- <td class="text-center pe-0">
                                <span class="fw-bold">1</span>
                            </td> -->
                                        <td class="min-w-100px" style=" width: 50pc;">
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->akta_perusahaan ?>" class="fw-bold" download>Download</a><br>
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->akta_perusahaan ?>" target="_blank" class="fw-bold">Lihat</a>
                                            <!-- <input type="hidden" name="file_fotokopi_akta_perusahaan" value="<?= $kkpr->akta_perusahaan ?>"> -->
                                        </td>
                                        <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                            <?php if ($yn) { ?>
                                                <select name="yn_akta_perusahaan_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1" <?php if ($ynp->akta_perusahaan == '1') echo 'selected'; ?>>Ya</option>
                                                    <option value="0" <?php if ($ynp->akta_perusahaan == '0') echo 'selected'; ?>>Tidak</option>
                                                </select>
                                            <?php } else { ?>
                                                <select name="yn_akta_perusahaan_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                            <textarea class="form-control" name="akta_perusahaan_revisi" data-kt-autosize="true" disabled><?php echo $keteranganp->akta_perusahaan ?></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--end::Col-->
                        </div>
                <?php }
                } ?>
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
                                    <input type="hidden" name="file_fotokopi_akta_perusahaan" value="<?= $kkpr->akta_perusahaan ?>">
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <select name="yn_akta_perusahaan" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="akta_perusahaan" data-kt-autosize="true" data-preview="preview">Fotokopi Akta Pendirian Perusahaan :</textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <?php if ($kkpr->npwp) { ?>
                <?php
                $no = 1;
                foreach ($revisi as $r) {
                    $ynnpwp = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    $keterangannpwp = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    if ($revisi && $ynnpwp->npwp == '0') {
                ?>
                        <div class="row mb-4">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Fotokopi NPWP (Revisi <?= $no++; ?>)</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <table align="left">
                                    <tr>
                                        <!-- <td class="text-center pe-0">
                                    <span class="fw-bold">1</span>
                                </td> -->
                                        <td class="min-w-100px" style=" width: 50pc;">
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->npwp ?>" class="fw-bold" download>Download</a><br>
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->npwp ?>" target="_blank" class="fw-bold">Lihat</a>
                                            <!-- <input type="hidden" name="file_npwp" value="<?= $r->npwp ?>"> -->
                                        </td>
                                        <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                            <?php if ($yn) { ?>
                                                <select name="yn_npwp_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1" <?php if ($ynnpwp->npwp == '1') echo 'selected'; ?>>Ya</option>
                                                    <option value="0" <?php if ($ynnpwp->npwp == '0') echo 'selected'; ?>>Tidak</option>
                                                </select>
                                            <?php } else { ?>
                                                <select name="yn_npwp_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                            <textarea class="form-control" name="npwp" data-kt-autosize="true" disabled><?php echo $keterangannpwp->npwp ?></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--end::Col-->
                        </div>
                <?php }
                } ?>
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
                                    <input type="hidden" name="file_npwp" value="<?= $kkpr->npwp ?>">
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <select name="yn_npwp" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="npwp" data-kt-autosize="true" data-preview="preview">Fotokopi NPWP :</textarea>
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
                <label class="col-lg-4 fw-semibold text-muted">Nomor Induk Berusaha (NIB) / Skala Usaha</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-semibold text-gray-800 fs-6"><?php if ($kkpr) echo $kkpr->nib ?> / <?php if ($kkpr) echo $kkpr->skala_usaha ?></span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <?php
            $no = 1;
            foreach ($revisi as $r) {
                $yntdp = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                $keterangantdp = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                if ($revisi && $yntdp->tdp == '0') {
            ?>
                    <div class="row mb-4">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Nomor Induk Berusaha (NIB) (Revisi <?= $no++; ?>)</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <table align="left">
                                <tr>
                                    <!-- <td class="text-center pe-0">
                                    <span class="fw-bold">1</span>
                                </td> -->
                                    <td class="min-w-100px" style=" width: 50pc;">
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->tdp ?>" class="fw-bold" download>Download</a><br>
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php echo $r->tdp ?>" target="_blank" class="fw-bold">Lihat</a>
                                        <!-- <input type="hidden" name="file_nib_revisi" value="<?= $kkpr->nib ?>"> -->
                                    </td>
                                    <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                        <?php if ($yn) { ?>
                                            <select name="yn_tdp_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                <option value="1" <?php if ($yntdp->tdp == '1') echo 'selected'; ?>>Ya</option>
                                                <option value="0" <?php if ($yntdp->tdp == '0') echo 'selected'; ?>>Tidak</option>
                                            </select>
                                        <?php } else { ?>
                                            <select name="yn_tdp_revisi" id="" class="form-select form-control" style="width: 100px;">
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                        <textarea class="form-control" name="tdp" data-kt-autosize="true" disabled><?php echo $keterangantdp->tdp ?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--end::Col-->
                    </div>
            <?php }
            } ?>
            <!--begin::Row-->
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Nomor Induk Berusaha (NIB)</label>
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
                                <input type="hidden" name="file_nib" value="<?= $kkpr->nib ?>">
                            </td>
                            <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                <select name="yn_tdp" id="" class="form-select form-control" style="width: 100px;">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </td>
                            <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                <textarea class="form-control" name="tdp" data-kt-autosize="true" data-preview="preview">Fotokopi NIB :</textarea>
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
            <?php if ($kkpr->dasar_surat_tanah == 'letter' && $kkpr->status_surat_tanah == 'atas_nama_orang_lain') { ?>
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Surat Tanah</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <td style="white-space: nowrap;">
                                    <button type="button" id="buka_st_ol" class="btn btn-light btn-sm">Buka</button>
                                    <button type="button" id="tutup_st_ol" class="btn btn-light btn-sm">Tutup</button>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">

                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">

                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>                  
                    <div id="table_surat_tanah_ol1" style="display: none;">
                        <table class="table table-row-dashed fs-6 gy-5" border="1">
                            <thead style="background-color: #f4f4f4;">
                                <!-- <tr class="fw-bold fs-7 text-uppercase gs-0">
                                    <th colspan="8" class="text-center"> Revisi <?= $no++; ?></th>
                                </tr> -->
                                <tr class="fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-center min-w-30px">No.</th>
                                    <th class="text-center min-w-100px">Status</th>
                                    <th class="text-center min-w-100px">Dasar</th>
                                    <th class="text-center min-w-100px">File Surat Tanah</th>
                                    <th class="text-center min-w-100px">File Peta Bidang</th>
                                    <th class="text-center min-w-70px">Actions</th>
                                    <th class="text-center min-w-200px">Keterangan</th>
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
                                            <td class="text-center pe-0" colspan="7">
                                                <span class="fw-bold">Revisi <?= $no++; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center pe-0">
                                                <span class="fw-bold"><?= $nomer++; ?></span>
                                            </td>
                                            <td class="text-center pe-0">
                                                <span class="fw-bold"><?= $kkpr->status_surat_tanah ?></span>
                                            </td>
                                            <td class="text-center pe-0">
                                                <span class="fw-bold"><?= $kkpr->dasar_surat_tanah ?></span>
                                            </td>
                                            <td class="text-center pe-0">
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php $st->surat_tanah ?>" class="fw-bold" download>Download</a><br>
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php $st->surat_tanah ?>" target="_blank" class="fw-bold">Lihat</a>
                                                <!-- <input type="hidden" name="file_surat_tanah[]" value="<?= $surat_tanah[$i]->surat_tanah ?>"> -->
                                            </td>
                                            <td class="text-center pe-0">
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php $peta_bidang_value ?>" class="fw-bold" download>Download</a><br>
                                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php $peta_bidang_value ?>" target="_blank" class="fw-bold">Lihat</a>
                                                <!-- <input type="hidden" name="file_peta_bidang_surat_tanah[]" value="<?= $pb_surat_tanah[$i]->peta_bidang ?>"> -->
                                            </td>
                                            <td class="text-center pe-0">
                                                <select name="yn_surat_tanah_revisi[]" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1" <?php if ($action_value  == '1') echo 'selected'; ?>>Ya</option>
                                                    <option value="0" <?php if ($action_value  == '0') echo 'selected'; ?>>Tidak</option>
                                                </select>
                                            </td>
                                            <td class="text-center pe-0">
                                                <textarea class="form-control" name="surat_tanah_revisi[]" data-kt-autosize="true" disabled><?php echo $surat_tanah_value ?></textarea>
                                            </td>
                                        </tr>
                                <?php }}
                                } ?>
                            </tbody>
                        </table>
                    </div>              
                <div id="table_surat_tanah_ol2" style="display: none;">
                    <table class="table table-row-dashed fs-6 gy-5" border="1">
                        <thead style="background-color: #f4f4f4;">
                            <tr class="fw-bold fs-7 text-uppercase gs-0">
                                <th class="text-center min-w-30px">No.</th>
                                <th class="text-center min-w-100px">Status</th>
                                <th class="text-center min-w-100px">Dasar</th>
                                <th class="text-center min-w-100px">File Surat Tanah</th>
                                <th class="text-center min-w-100px">File Peta Bidang</th>
                                <th class="text-center min-w-70px">Actions</th>
                                <th class="text-center min-w-200px">Keterangan</th>
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
                                    <td class="text-center pe-0">
                                        <span class="fw-bold"><?= $no++; ?></span>
                                    </td>
                                    <td class="text-center pe-0">
                                        <span class="fw-bold"><?= $kkpr->status_surat_tanah ?></span>
                                    </td>
                                    <td class="text-center pe-0">
                                        <span class="fw-bold"><?= $kkpr->dasar_surat_tanah ?></span>
                                    </td>
                                    <td class="text-center pe-0">
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $surat_tanah[$i]->surat_tanah ?>" class="fw-bold" download>Download</a><br>
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $surat_tanah[$i]->surat_tanah ?>" target="_blank" class="fw-bold">Lihat</a>
                                        <input type="hidden" name="file_surat_tanah[]" value="<?= $surat_tanah[$i]->surat_tanah ?>">
                                    </td>
                                    <td class="text-center pe-0">
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $pb_surat_tanah[$i]->peta_bidang ?>" class="fw-bold" download>Download</a><br>
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $pb_surat_tanah[$i]->peta_bidang ?>" target="_blank" class="fw-bold">Lihat</a>
                                        <input type="hidden" name="file_peta_bidang_surat_tanah[]" value="<?= $pb_surat_tanah[$i]->peta_bidang ?>">
                                    </td>
                                    <td class="text-center pe-0">
                                        <select name="yn_surat_tanah[]" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </td>
                                    <td class="text-center pe-0">
                                        <textarea class="form-control" name="surat_tanah[]" data-kt-autosize="true" data-preview="preview">Surat Tanah :</textarea>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div class="row mb-4">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Surat Tanah</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <table align="left">
                            <tr>
                                <td style="white-space: nowrap;">
                                    <button type="button" id="buka_st" class="btn btn-light btn-sm">Buka</button>
                                    <button type="button" id="tutup_st" class="btn btn-light btn-sm">Tutup</button>
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">

                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">

                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>                
                    <div id="table_surat_tanah1" style="display: none;">
                        <table class="table table-row-dashed fs-6 gy-5" border="1">
                            <thead style="background-color: #f4f4f4;">
                                <!-- <tr class="fw-bold fs-7 text-uppercase gs-0">
                                    <th colspan="8" class="text-center"> Revisi <?= $no++; ?></th>
                                </tr> -->
                                <tr class="fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-center min-w-30px">No.</th>
                                    <th class="text-center min-w-100px">Status</th>
                                    <th class="text-center min-w-100px">Dasar</th>
                                    <th class="text-center min-w-100px">File</th>
                                    <th class="text-center min-w-70px">Actions</th>
                                    <th class="text-center min-w-200px">Keterangan</th>
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
                                            <td class="text-center pe-0" colspan="7">
                                                <span class="fw-bold">Revisi <?= $no++; ?></span>
                                            </td>
                                        </tr>
                                    <tr>
                                        <td class="text-center pe-0">
                                            <span class="fw-bold"><?= $nomer++; ?></span>
                                        </td>
                                        <td class="text-center pe-0">
                                            <span class="fw-bold"><?= $kkpr->status_surat_tanah ?></span>
                                        </td>
                                        <td class="text-center pe-0">
                                            <span class="fw-bold"><?= $kkpr->dasar_surat_tanah ?></span>
                                        </td>
                                        <td class="text-center pe-0">
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $st->surat_tanah ?>" class="fw-bold" download>Download</a><br>
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $st->surat_tanah ?>" target="_blank" class="fw-bold">Lihat</a>
                                            <!-- <input type="hidden" name="file_surat_tanah[]" value="<?= $s->surat_tanah ?>"> -->
                                        </td>
                                        <td class="text-center pe-0">
                                            <select name="yn_surat_tanah_revisi[]" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                <option value="1" <?php if ($action_value  == '1') echo 'selected'; ?>>Ya</option>
                                                <option value="0" <?php if ($action_value  == '0') echo 'selected'; ?>>Tidak</option>
                                            </select>
                                        </td>
                                        <td class="text-center pe-0">
                                            <textarea class="form-control" name="surat_tanah_revisi[]" data-kt-autosize="true" disabled><?php if ($surat_tanah_value) echo $surat_tanah_value ?></textarea>
                                        </td>
                                    </tr>
                                <?php }}} ?>
                            </tbody>
                        </table>
                    </div>                
                <div id="table_surat_tanah2" style="display: none;">
                    <table class="table table-row-dashed fs-6 gy-5" border="1">
                        <thead style="background-color: #f4f4f4;">
                            <tr class="fw-bold fs-7 text-uppercase gs-0">
                                <th class="text-center min-w-30px">No.</th>
                                <th class="text-center min-w-100px">Status</th>
                                <th class="text-center min-w-100px">Dasar</th>
                                <th class="text-center min-w-100px">File</th>
                                <th class="text-center min-w-70px">Actions</th>
                                <th class="text-center min-w-200px">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $surat_tanah = json_decode($kkpr->surat_tanah);
                            foreach ($surat_tanah as $s) {
                            ?>
                                <tr>
                                    <td class="text-center pe-0">
                                        <span class="fw-bold"><?= $no++; ?></span>
                                    </td>
                                    <td class="text-center pe-0">
                                        <span class="fw-bold"><?= $kkpr->status_surat_tanah ?></span>
                                    </td>
                                    <td class="text-center pe-0">
                                        <span class="fw-bold"><?= $kkpr->dasar_surat_tanah ?></span>
                                    </td>
                                    <td class="text-center pe-0">
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $s->surat_tanah ?>" class="fw-bold" download>Download</a><br>
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $s->surat_tanah ?>" target="_blank" class="fw-bold">Lihat</a>
                                        <input type="hidden" name="file_surat_tanah[]" value="<?= $s->surat_tanah ?>">
                                    </td>
                                    <td class="text-center pe-0">
                                        <select name="yn_surat_tanah[]" id="" class="form-select form-control" style="width: 100px;">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </td>
                                    <td class="text-center pe-0">
                                        <textarea class="form-control" name="surat_tanah[]" data-kt-autosize="true" data-preview="preview">Surat Tanah :</textarea>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <?php
            $no = 1;
            foreach ($revisi as $r) {
                $ynpb = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                $keteranganpb = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                if ($revisi && $ynpb->peta_bidang == '0') {
            ?>
                    <div class="row mb-4">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Peta Bidang (Revisi <?= $no++; ?>)</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <table align="left">
                                <tr>
                                    <td class="min-w-100px" style=" width: 50pc;">
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->peta_bidang ?>" class="fw-bold" download>Download</a><br>
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->peta_bidang ?>" target="_blank" class="fw-bold">Lihat</a>
                                        <!-- <input type="hidden" name="file_peta_bidang" value="<?= $kkpr->peta_bidang ?>"> -->
                                    </td>
                                    <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                        <?php if ($yn) { ?>
                                            <select name="yn_peta_bidang_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                <option value="1" <?php if ($ynpb->peta_bidang == '1') echo 'selected'; ?>>Ya</option>
                                                <option value="0" <?php if ($ynpb->peta_bidang == '0') echo 'selected'; ?>>Tidak</option>
                                            </select>
                                        <?php } else { ?>
                                            <select name="yn_peta_bidang_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                        <!-- <input type="text" name="surat_tanah" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_tanah ?>"> -->
                                        <textarea class="form-control" name="peta_bidang_revisi" data-kt-autosize="true" disabled><?php if ($keteranganpb) echo $keteranganpb->peta_bidang ?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!--end::Col-->
                    </div>
            <?php }
            } ?>
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
                                <input type="hidden" name="file_peta_bidang" value="<?= $kkpr->peta_bidang ?>">
                            </td>
                            <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                <select name="yn_peta_bidang" id="" class="form-select form-control" style="width: 100px;">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </td>
                            <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                <!-- <input type="text" name="surat_tanah" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_tanah ?>"> -->
                                <textarea class="form-control" name="peta_bidang" data-kt-autosize="true" data-preview="preview">Peta Bidang :</textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--end::Col-->
            </div>
            <?php
            $no = 1;
            foreach ($revisi as $r) {
                $ynshp = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                $keteranganshp = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                if ($revisi && $ynshp->shp == '0') {
            ?>
                    <div class="row mb-4">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">SHP (Revisi <?= $no++; ?>)</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <table align="left">
                                <tr>
                                    <td class="min-w-100px" style=" width: 50pc;">
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->shp ?>" class="fw-bold" download>Download</a><br>
                                        <!-- <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->shp ?>" target="_blank" class="fw-bold">Lihat</a> -->
                                        <!-- <input type="hidden" name="file_shp" value="<?= $kkpr->shp ?>"> -->
                                    </td>
                                    <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                        <?php if ($yn) { ?>
                                            <select name="yn_shp_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                <option value="1" <?php if ($ynshp->shp == '1') echo 'selected'; ?>>Ya</option>
                                                <option value="0" <?php if ($ynshp->shp == '0') echo 'selected'; ?>>Tidak</option>
                                            </select>
                                        <?php } else { ?>
                                            <select name="yn_shp_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                        <!-- <input type="text" name="surat_tanah" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_tanah ?>"> -->
                                        <textarea class="form-control" name="shp_revisi" data-kt-autosize="true" disabled><?php if ($keteranganshp) echo $keteranganshp->shp ?></textarea>
                                    </td>

                                </tr>
                            </table>
                        </div>
                        <!--end::Col-->
                    </div>
            <?php }
            } ?>
            <div class="row mb-4">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">SHP</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <table align="left">
                        <tr>
                            <td class="min-w-100px" style=" width: 50pc;">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->shp ?>" class="fw-bold" download>Download</a><br>
                                <!-- <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $kkpr->shp ?>" target="_blank" class="fw-bold">Lihat</a> -->
                                <input type="hidden" name="file_shp" value="<?= $kkpr->shp ?>">
                            </td>
                            <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                <select name="yn_shp" id="" class="form-select form-control" style="width: 100px;">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </td>
                            <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                <!-- <input type="text" name="surat_tanah" class="form-control" value="<?php if ($keterangan) echo $keterangan->surat_tanah ?>"> -->
                                <textarea class="form-control" name="shp" data-kt-autosize="true" data-preview="preview">SHP :</textarea>
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
            <?php
            $no = 1;
            foreach ($revisi as $r) {
            ?>
                <?php
                $ynoss = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                $keteranganoss = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                if ($r && $ynoss->dokumen_oss == '0') {
                ?>
                    <div class="row mb-4">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-semibold text-muted">Dokumen yang di unduh pada OSS (Revisi <?= $no++; ?>)</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <table align="left">
                                <tr>
                                    <td class="min-w-100px" style=" width: 50pc;">
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->dokumen_oss ?>" class="fw-bold" download>Download</a><br>
                                        <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->dokumen_oss ?>" target="_blank" class="fw-bold">Lihat</a>
                                        <!-- <input type="hidden" name="file_dokumen_oss" value="<?= $kkpr->dokumen_oss ?>"> -->
                                    </td>
                                    <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                        <?php if ($yn) { ?>
                                            <select name="yn_dokumen_oss_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                <option value="1" <?php if ($ynoss->dokumen_oss == '1') echo 'selected'; ?>>Ya</option>
                                                <option value="0" <?php if ($ynoss->dokumen_oss == '0') echo 'selected'; ?>>Tidak</option>
                                            </select>
                                        <?php } else { ?>
                                            <select name="yn_dokumen_oss_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                        <textarea class="form-control" name="dokumen_oss_revisi" data-kt-autosize="true" disabled><?= $keteranganoss->dokumen_oss ?></textarea>
                                    </td>

                                </tr>
                            </table>
                        </div>
                        <!--end::Col-->
                    </div>
            <?php }
            } ?>
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
                                <input type="hidden" name="file_dokumen_oss" value="<?= $kkpr->dokumen_oss ?>">
                            </td>
                            <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                <select name="yn_dokumen_oss" id="" class="form-select form-control" style="width: 100px;">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </td>
                            <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                <textarea class="form-control" name="dokumen_oss" data-kt-autosize="true" data-preview="preview">Dokumen OSS :</textarea>
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
                <?php
                $no = 1;
                foreach ($revisi as $r) {
                    $ynsk = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    $keterangansk = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    if ($revisi && $ynsk->surat_kematian == '0') {
                ?>
                        <div class="row mb-4">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Surat Kematian (Revisi <?= $no++; ?>)</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <table align="left">
                                    <tr>
                                        <td class="min-w-100px" style=" width: 50pc;">
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_kematian ?>" class="fw-bold" download>Download</a><br>
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_kematian ?>" target="_blank" class="fw-bold">Lihat</a>
                                            <!-- <input type="hidden" name="file_surat_kematian" value="<?= $kkpr->surat_kematian ?>"> -->
                                        </td>
                                        <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                            <?php if ($yn) { ?>
                                                <select name="yn_surat_kematian_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1" <?php if ($ynsk->surat_kematian == '1') echo 'selected'; ?>>Ya</option>
                                                    <option value="0" <?php if ($ynsk->surat_kematian == '0') echo 'selected'; ?>>Tidak</option>
                                                </select>
                                            <?php } else { ?>
                                                <select name="yn_surat_kematian_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                            <textarea class="form-control" name="surat_kematian_revisi" data-kt-autosize="true" disabled><?php if ($keterangansk) echo $keterangansk->surat_kematian ?></textarea>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <!--end::Col-->
                        </div>
                <?php }
                } ?>
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
                                    <input type="hidden" name="file_surat_kematian" value="<?= $kkpr->surat_kematian ?>">
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <select name="yn_surat_kematian" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_kematian" data-kt-autosize="true" data-preview="preview">Surat Kematian :</textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <?php
                $no = 1;
                foreach ($revisi as $r) {
                    $ynaw = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    $keteranganaw = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    if ($revisi && $ynaw->surat_kuasa_ahli_waris == '0') {
                ?>
                        <div class="row mb-4">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Surat kuasa ahli waris (Revisi <?= $no++; ?>)</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <table align="left">
                                    <tr>
                                        <td class="min-w-100px" style=" width: 50pc;">
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_kuasa_ahli_waris ?>" class="fw-bold" download>Download</a><br>
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_kuasa_ahli_waris ?>" target="_blank" class="fw-bold">Lihat</a>
                                            <!-- <input type="hidden" name="file_surat_kuasa" value="<?= $kkpr->surat_kuasa_ahli_waris ?>"> -->
                                        </td>
                                        <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                            <?php if ($yn) { ?>
                                                <select name="yn_surat_kuasa_ahli_waris_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1" <?php if ($ynaw->surat_kuasa_ahli_waris == '1') echo 'selected'; ?>>Ya</option>
                                                    <option value="0" <?php if ($ynaw->surat_kuasa_ahli_waris == '0') echo 'selected'; ?>>Tidak</option>
                                                </select>
                                            <?php } else { ?>
                                                <select name="yn_surat_kuasa_ahli_waris_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                            <textarea class="form-control" name="surat_kuasa_ahli_waris_revisi" data-kt-autosize="true" disabled><?php if ($keteranganaw) echo $keteranganaw->surat_kuasa_ahli_waris ?></textarea>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                <?php }
                } ?>
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
                                    <input type="hidden" name="file_surat_kuasa" value="<?= $kkpr->surat_kuasa_ahli_waris ?>">
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <select name="yn_surat_kuasa_ahli_waris" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_kuasa_ahli_waris" data-kt-autosize="true" data-preview="preview">Surat Kuasa Ahli Waris : </textarea>
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
                <?php
                $no = 1;
                foreach ($revisi as $r) {
                    $yndki = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    $keterangandki = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    if ($revisi && $yndki->surat_dinas_komunikasi == '0') {
                ?>
                        <div class="row mb-4">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Surat rekomendasi dari dinas Komunikasi dan informatika (Revisi <?= $no++; ?>)</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <table align="left">
                                    <tr>
                                        <td class="min-w-100px" style=" width: 50pc;">
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_komunikasi ?>" class="fw-bold" download>Download</a><br>
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_komunikasi ?>" target="_blank" class="fw-bold">Lihat</a>
                                            <!-- <input type="hidden" name="file_surat_dinas_komunikasi" value="<?= $kkpr->surat_dinas_komunikasi ?>"> -->
                                        </td>
                                        <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                            <?php if ($yn) { ?>
                                                <select name="yn_surat_dinas_komunikasi_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1" <?php if ($yndki->surat_dinas_komunikasi == '1') echo 'selected'; ?>>Ya</option>
                                                    <option value="0" <?php if ($yndki->surat_dinas_komunikasi == '0') echo 'selected'; ?>>Tidak</option>
                                                </select>
                                            <?php } else { ?>
                                                <select name="yn_surat_dinas_komunikasi_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                            <textarea class="form-control" name="surat_dinas_komunikasi_revisi" data-kt-autosize="true" disabled><?php if ($keterangandki) echo $keterangandki->surat_dinas_komunikasi ?></textarea>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <!--end::Col-->
                        </div>
                <?php }
                } ?>
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
                                    <input type="hidden" name="file_surat_dinas_komunikasi" value="<?= $kkpr->surat_dinas_komunikasi ?>">
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <select name="yn_surat_dinas_komunikasi" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_dinas_komunikasi" data-kt-autosize="true" data-preview="preview">Surat Rekomendasi Dinas Komunikasi dan Informatika :</textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <?php
                $no = 1;
                foreach ($revisi as $r) {
                    $yntni = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    $keterangantni = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    if ($revisi && $yntni->surat_rekom_tni == '0') {
                ?>
                        <div class="row mb-4">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Surat rekomendasi TNI (Revisi <?= $no++; ?>)</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <table align="left">
                                    <tr>
                                        <td class="min-w-100px" style=" width: 50pc;">
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_rekom_tni ?>" class="fw-bold" download>Download</a><br>
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_rekom_tni ?>" target="_blank" class="fw-bold">Lihat</a>
                                            <!-- <input type="hidden" name="file_surat_rekom_tni" value="<?= $kkpr->surat_rekom_tni ?>"> -->
                                        </td>
                                        <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                            <?php if ($yn) { ?>
                                                <select name="yn_surat_rekom_tni_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1" <?php if ($yntni->surat_rekom_tni == '1') echo 'selected'; ?>>Ya</option>
                                                    <option value="0" <?php if ($yntni->surat_rekom_tni == '0') echo 'selected'; ?>>Tidak</option>
                                                </select>
                                            <?php } else { ?>
                                                <select name="yn_surat_rekom_tni_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                            <textarea class="form-control" name="surat_rekom_tni_revisi" data-kt-autosize="true" disabled><?php if ($keterangantni) echo $keterangantni->surat_rekom_tni ?></textarea>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <!--end::Col-->
                        </div>
                <?php }
                } ?>
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
                                    <input type="hidden" name="file_surat_rekom_tni" value="<?= $kkpr->surat_rekom_tni ?>">
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <select name="yn_surat_rekom_tni" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_rekom_tni" data-kt-autosize="true" data-preview="preview">Surat Rekomendasi TNI :</textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <?php if ($kkpr->type == "minimarket") { ?>
                <?php
                $no = 1;
                foreach ($revisi as $r) {
                    $yndp = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    $keterangandp = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    if ($revisi && $yndp->surat_dinas_perdagangan == '0') {
                ?>
                        <div class="row mb-4">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Surat rekomendasi dari dinas perdagangan (Revisi <?= $no++; ?>)</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <table align="left">
                                    <tr>
                                        <td class="min-w-100px" style=" width: 50pc;">
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_perdagangan ?>" class="fw-bold" download>Download</a><br>
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_perdagangan ?>" target="_blank" class="fw-bold">Lihat</a>
                                            <!-- <input type="hidden" name="file_surat_dinas_perdagangan" value="<?= $kkpr->surat_dinas_perdagangan ?>"> -->
                                        </td>
                                        <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                            <?php if ($yn) { ?>
                                                <select name="yn_surat_dinas_perdagagan_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1" <?php if ($yndp->surat_dinas_perdagangan == '1') echo 'selected'; ?>>Ya</option>
                                                    <option value="0" <?php if ($yndp->surat_dinas_perdagangan == '0') echo 'selected'; ?>>Tidak</option>
                                                </select>
                                            <?php } else { ?>
                                                <select name="yn_surat_dinas_perdagagan" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                            <textarea class="form-control" name="surat_dinas_perdagangan_revisi" data-kt-autosize="true" disabled><?php if ($keterangandp) echo $keterangandp->surat_dinas_perdagangan ?></textarea>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <!--end::Col-->
                        </div>
                <?php }
                } ?>
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
                                    <input type="hidden" name="file_surat_dinas_perdagangan" value="<?= $kkpr->surat_dinas_perdagangan ?>">
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <select name="yn_surat_dinas_perdagagan" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_dinas_perdagangan" data-kt-autosize="true" data-preview="preview">Surat Rekomendasi Dinas Perdagangan :</textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <?php if ($kkpr->type == "peternakan") { ?>
                <?php
                $no = 1;
                foreach ($revisi as $r) {
                    $yndpt = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    $keterangandpt = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    if ($revisi && $yndpt->surat_dinas_peternakan == '0') {
                ?>
                        <div class="row mb-4">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Surat rekomendasi dari dinas peternakan (Revisi <?= $no++; ?>)</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <table align="left">
                                    <tr>
                                        <td class="min-w-100px" style=" width: 50pc;">
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_peternakan ?>" class="fw-bold" download>Download</a><br>
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_dinas_peternakan ?>" target="_blank" class="fw-bold">Lihat</a>
                                            <input type="hidden" name="file_surat_dinas_peternakan" value="<?= $kkpr->surat_dinas_peternakan ?>">
                                        </td>
                                        <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                            <?php if ($yn) { ?>
                                                <select name="yn_surat_dinas_peternakan_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1" <?php if ($yndpt->surat_dinas_peternakan == '1') echo 'selected'; ?>>Ya</option>
                                                    <option value="0" <?php if ($yndpt->surat_dinas_peternakan == '0') echo 'selected'; ?>>Tidak</option>
                                                </select>
                                            <?php } else { ?>
                                                <select name="yn_surat_dinas_peternakan_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                            <textarea class="form-control" name="surat_dinas_peternakan_revisi" data-kt-autosize="true" disabled><?php if ($keterangandpt) echo $keterangandpt->surat_dinas_peternakan ?></textarea>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <!--end::Col-->
                        </div>
                <?php }
                } ?>
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
                                    <input type="hidden" name="file_surat_dinas_peternakan" value="<?= $kkpr->surat_dinas_peternakan ?>">
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <select name="yn_surat_dinas_peternakan" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_dinas_peternakan" data-kt-autosize="true" data-preview="preview">Surat Rekomendasi Dinas Peternakan :</textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <?php if ($kkpr->type == "spbu") { ?>
                <?php
                $no = 1;
                foreach ($revisi as $r) {
                    $ynptmn = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    $keteranganptmn = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    if ($revisi && $ynptmn->surat_pertamina == '0') {
                ?>
                        <div class="row mb-4">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Surat rekomendasi dari pertamina (Revisi <?= $no++; ?>)</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <table align="left">
                                    <tr>
                                        <td class="min-w-100px" style=" width: 50pc;">
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_pertamina ?>" class="fw-bold" download>Download</a><br>
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_pertamina ?>" target="_blank" class="fw-bold">Lihat</a>
                                            <!-- <input type="hidden" name="file_surat_pertamina" value="<?= $kkpr->surat_pertamina ?>"> -->
                                        </td>
                                        <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                            <?php if ($yn) { ?>
                                                <select name="yn_surat_pertamina_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1" <?php if ($ynptmn->surat_pertamina == '1') echo 'selected'; ?>>Ya</option>
                                                    <option value="0" <?php if ($ynptmn->surat_pertamina == '0') echo 'selected'; ?>>Tidak</option>
                                                </select>
                                            <?php } else { ?>
                                                <select name="yn_surat_pertamina_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                            <textarea class="form-control" name="surat_pertamina_revisi" data-kt-autosize="true" disabled><?php if ($keteranganptmn) echo $keteranganptmn->surat_pertamina ?></textarea>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <!--end::Col-->
                        </div>
                <?php }
                } ?>
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
                                    <input type="hidden" name="file_surat_pertamina" value="<?= $kkpr->surat_pertamina ?>">
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <select name="yn_surat_pertamina" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="surat_pertamina" data-kt-autosize="true" data-preview="preview">Surat Rekomendasi Pertamina :</textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            <?php } ?>
            <?php if ($kkpr->type == "tempat_ibadah") { ?>
                <?php
                $no = 1;
                foreach ($revisi as $r) {
                    $ynpw = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    $keteranganpw = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    if ($revisi && $ynpw->daftar_nama_kk == '0') {
                ?>
                        <div class="row mb-4">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Daftar nama persetujuan warga (Revisi <?= $no++; ?>)</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <table align="left">
                                    <tr>
                                        <td class="min-w-100px" style=" width: 50pc;">
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->daftar_nama_kk ?>" class="fw-bold" download>Download</a><br>
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->daftar_nama_kk ?>" target="_blank" class="fw-bold">Lihat</a>
                                            <!-- <input type="hidden" name="file_daftar_nama_kk" value="<?= $kkpr->daftar_nama_kk ?>"> -->
                                        </td>
                                        <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                            <?php if ($yn) { ?>
                                                <select name="yn_daftar_nama_kk_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1" <?php if ($ynpw->daftar_nama_kk == '1') echo 'selected'; ?>>Ya</option>
                                                    <option value="0" <?php if ($ynpw->daftar_nama_kk == '0') echo 'selected'; ?>>Tidak</option>
                                                </select>
                                            <?php } else { ?>
                                                <select name="yn_daftar_nama_kk_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                            <textarea class="form-control" name="daftar_nama_kk_revisi" data-kt-autosize="true" disabled><?php if ($keteranganpw) echo $keteranganpw->daftar_nama_kk ?></textarea>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <!--end::Col-->
                        </div>
                <?php }
                } ?>
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
                                    <input type="hidden" name="file_daftar_nama_kk" value="<?= $kkpr->daftar_nama_kk ?>">
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <select name="yn_daftar_nama_kk" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="daftar_nama_kk" data-kt-autosize="true" data-preview="preview">Daftar Persetujuan Warga :</textarea>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <?php
                $no = 1;
                foreach ($revisi as $r) {
                    $ynfkub = $this->db->query("SELECT * FROM action_pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    $keteranganfkub = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_file = '$r->id_pengembalian'")->row();
                    if ($revisi && $ynfkub->surat_fkub == '0') {
                ?>
                        <div class="row mb-4">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Surat FKUB (Revisi <?= $no++; ?>)</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <table align="left">
                                    <tr>
                                        <td class="min-w-100px" style=" width: 50pc;">
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_fkub ?>" class="fw-bold" download>Download</a><br>
                                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?php if ($kkpr) echo $r->surat_fkub ?>" target="_blank" class="fw-bold">Lihat</a>
                                            <!-- <input type="hidden" name="file_surat_fkub" value="<?= $kkpr->surat_fkub ?>"> -->
                                        </td>
                                        <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                            <?php if ($yn) { ?>
                                                <select name="yn_surat_fkub_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1" <?php if ($ynfkub->surat_fkub == '1') echo 'selected'; ?>>Ya</option>
                                                    <option value="0" <?php if ($ynfkub->surat_fkub == '0') echo 'selected'; ?>>Tidak</option>
                                                </select>
                                            <?php } else { ?>
                                                <select name="yn_surat_fkub_revisi" id="" class="form-select form-control" style="width: 100px;" disabled>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                            <textarea class="form-control" name="fkub_revisi" data-kt-autosize="true" disabled><?php if ($keteranganfkun) echo $keteranganfkub->fkub ?></textarea>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <!--end::Col-->
                        </div>
                <?php }
                } ?>
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
                                    <input type="hidden" name="file_surat_fkub" value="<?= $kkpr->surat_fkub ?>">
                                </td>
                                <td class="text-center pe-0 min-w-100px" style=" width: 100pc;">
                                    <select name="yn_surat_fkub" id="" class="form-select form-control" style="width: 100px;">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </td>
                                <td class="text-center pe-0 min-w-200px" style=" width: 200pc;">
                                    <textarea class="form-control" name="fkub" data-kt-autosize="true" data-preview="preview">Surat FKUB :</textarea>
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
                    <textarea class="form-control" name="preview" cols="10" rows="5"></textarea>
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
        </div>
        <!--end::Card body-->
    </div>
    <!--end::details View-->
</form>