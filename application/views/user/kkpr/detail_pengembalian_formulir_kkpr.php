<?php
$kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$kkpr->kelurahan_pemohon' ")->row();
$kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$kkpr->kecamatan_pemohon' ")->row();
$kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$kkpr->kota_pemohon' ")->row();
$provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$kkpr->provinsi_pemohon' ")->row();

$kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$kkpr->kelurahan_tanah' ")->row();
$kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$kkpr->kecamatan_tanah' ")->row();

$keterangan = $this->db->query("SELECT * FROM pengembalian_kkpr_permohonan WHERE id_permohonan = '$kkpr->id_kkpr_permohonan' ")->row();
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
        <!--begin::Row-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Nomor</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">650/0000/35.07.111/2023</span>
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
                <span class="fw-bold fs-6 text-gray-800"><?= $kkpr->nama_pemohon ?></span>
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
                    <?= $kkpr->alamat_pemohon ?> RT. <?= $kkpr->rt_pemohon ?> RW. <?= $kkpr->rw_pemohon ?> Kel. <?= $kelurahan->subdis_name ?> - Kec. <?= $kecamatan->dis_name ?> - Kota / Kab. <?= $kota->city_name ?> - Prov. <?= $provinsi->prov_name ?>
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
                <span class="fw-semibold text-gray-800 fs-6"><?= $kkpr->nama_perusahaan ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">NIB / Skala Usaha</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <span class="fw-semibold text-gray-800 fs-6">8120104902682 / Besar</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">KBLI / Tingkat Risiko</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <span class="fw-semibold text-gray-800 fs-6">52101 - Pergudangan dan Penyimpanan / Tinggi</span><br>
                <span class="fw-semibold text-gray-800 fs-6">52101 - Pergudangan dan Penyimpanan / Tinggi</span><br>
                <span class="fw-semibold text-gray-800 fs-6">52101 - Pergudangan dan Penyimpanan / Tinggi</span>
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
                <span class="fw-semibold text-gray-800 fs-6"><?= $kkpr->peruntukan_tanah ?> / <?= $kkpr->luas_tanah ?> m²</span>
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
                <span class="fw-semibold text-gray-800 fs-6"><?= $kkpr->lokasi_tanah ?> Desa / Kel. <?= $kelurahan_tanah->nama_desa ?> - Kec. <?= $kecamatan_tanah->nama_kecamatan ?> </span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Status Tanah</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <span class="fw-semibold text-gray-800 fs-6">a. SHM No.25 / GS.2974 / 1989 luas 2.000 m²</span><br>
                <span class="fw-semibold text-gray-800 fs-6">b. SHM No.26 / GS.2974 / 1989 luas 2.000 m²</span><br>
                <span class="fw-semibold text-gray-800 fs-6">c. SHM No.27 / GS.2974 / 1989 luas 3.200 m²</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">No Handphone
                <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                    <i class="ki-duotone ki-information fs-7">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                </span></label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 d-flex align-items-center">
                <span class="fw-bold fs-6 text-gray-800 me-2"><?= $kkpr->telp_pemohon ?></span>
                <!-- <span class="badge badge-success">Verified</span> -->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <form action="<?php echo base_url('Pengembalian_formulir_itr/proses_upload_ulang_kkpr'); ?>" method="post" enctype="multipart/form-data">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table" border="1">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-center min-w-50px">No.</th>
                        <th class="text-center min-w-100px">Lampiran</th>
                        <th class="text-center min-w-100px">File</th>
                        <th class="text-center min-w-200px">Keterangan</th>
                        <th class="text-center min-w-70px">Upload</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">1</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Dokumen yang di unduh pada OSS</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->dokumen_oss ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->dokumen_oss ?>" target="_blank" class="fw-bold">Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <input type="text" name="dokumen_oss" class="form-control" value="<?php if($keterangan) echo $keterangan->dokumen_oss ?>">
                            <input type="hidden" name="id" class="form-control" value="<?php if($kkpr) echo $kkpr->id_kkpr_permohonan ?>">
                            <input type="hidden" name="type" class="form-control" value="<?php if($kkpr) echo $kkpr->type ?>">
                        </td>
                        <td class="text-center pe-0">
                            <input type="file" name="file_dokumen_oss" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">2</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Fotokopi KTP Pemohon</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->fotokopi_ktp ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->fotokopi_ktp ?>" target="_blank" class="fw-bold">Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <input type="text" name="fotokopi_ktp" class="form-control" value="<?php if($keterangan) echo $keterangan->fotokopi_ktp ?>">
                        </td>
                        <td class="text-center pe-0">
                            <input type="file" name="file_fotokopi_ktp" class="form-control">
                        </td>

                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">3</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Surat Pernyataan Kesanggupan Kuasa Pengurusan KKPR</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_kuasa ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_kuasa ?>" target="_blank" class="fw-bold">Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <input type="text" name="surat_kuasa" class="form-control" value="<?php if($keterangan) echo $keterangan->surat_kuasa ?>">
                        </td>
                        <td class="text-center pe-0">
                            <input type="file" name="file_surat_kuasa" class="form-control">
                        </td>

                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">4</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Fotokopi akta pendirian perusahaan (legalisir)</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->akta_perusahaan ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->akta_perusahaan ?>" target="_blank" class="fw-bold">Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <input type="text" name="akta_perusahaan" class="form-control" value="<?php if($keterangan) echo $keterangan->akta_perusahaan ?>">
                        </td>
                        <td class="text-center pe-0">
                            <input type="file" name="file_akta_perusahaan" class="form-control">
                        </td>

                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">5</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">SIUP</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->siup ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->siup ?>" target="_blank" class="fw-bold">Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <input type="text" name="siup" class="form-control" value="<?php if($keterangan) echo $keterangan->siup ?>">
                        </td>
                        <td class="text-center pe-0">
                            <input type="file" name="file_siup" class="form-control">
                        </td>

                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">6</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">TDP / NIB</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->tdp ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->tdp ?>" target="_blank" class="fw-bold">Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <input type="text" name="tdp" class="form-control" value="<?php if($keterangan) echo $keterangan->tdp ?>">
                        </td>
                        <td class="text-center pe-0">
                            <input type="file" name="file_tdp" class="form-control">
                        </td>

                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">7</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Fotokopi NPWP</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->npwp ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->npwp ?>" target="_blank" class="fw-bold">Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <input type="text" name="npwp" class="form-control" value="<?php if($keterangan) echo $keterangan->npwp ?>">
                        </td>
                        <td class="text-center pe-0">
                            <input type="file" name="file_npwp" class="form-control">
                        </td>

                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">8</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Fotokopi surat tanah</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_tanah ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_tanah ?>" target="_blank" class="fw-bold">Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <input type="text" name="surat_tanah" class="form-control" value="<?php if($keterangan) echo $keterangan->surat_tanah ?>">
                        </td>
                        <td class="text-center pe-0">
                            <input type="file" name="file_surat_tanah" class="form-control">
                        </td>

                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">9</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Peta Bidang (dari BPN)</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->peta_bidang ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->peta_bidang ?>" target="_blank" class="fw-bold">Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <input type="text" name="peta_bidang" class="form-control" value="<?php if($keterangan) echo $keterangan->peta_bidang ?>">
                        </td>
                        <td class="text-center pe-0">
                            <input type="file" name="file_peta_bidang" class="form-control">
                        </td>

                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">10</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"> Pertimbangan Teknis pertanahan dari BPN</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->teknis_pertanahan ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->teknis_pertanahan ?>" target="_blank" class="fw-bold">Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <input type="text" name="teknis_pertanahan" class="form-control" value="<?php if($keterangan) echo $keterangan->teknis_pertanahan ?>">
                        </td>
                        <td class="text-center pe-0">
                            <input type="file" name="file_teknis_pertanahan" class="form-control">
                        </td>

                    </tr>
                    <?php if ($kkpr->type == "pemilik_lahan_meninggal") { ?>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold">11</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">Surat Kematian</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_kematian ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_kematian ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <input type="text" name="surat_kematian" class="form-control" value="<?php if($keterangan) echo $keterangan->surat_kematian ?>">
                            </td>
                            <td class="text-center pe-0">
                                <input type="file" name="file_surat_kematian" class="form-control">
                            </td>

                        </tr>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold">12</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">Surat kuasa ahli waris</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_kuasa_ahli_waris ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_kuasa_ahli_waris ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <input type="text" name="surat_kuasa_ahli_waris" class="form-control" value="<?php if($keterangan) echo $keterangan->surat_kuasa_ahli_waris ?>">
                            </td>
                            <td class="text-center pe-0">
                                <input type="file" name="file_surat_kuasa_ahli_waris" class="form-control">
                            </td>

                        </tr>
                    <?php } ?>
                    <?php if ($kkpr->type == "perumahan") { ?>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold">11</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">Surat tanah dibawah 5000m2</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_tanah_dibawah_5000 ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_tanah_dibawah_5000 ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <input type="text" name="surat_tanah_dibawah_5000" class="form-control" value="<?php if($keterangan) echo $keterangan->surat_tanah_dibawah_5000 ?>">
                            </td>
                            <td class="text-center pe-0">
                                <input type="file" name="file_surat_tanah_dibawah_5000" class="form-control">
                            </td>

                        </tr>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold">12</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">Peta bidang dibawah 5000m2</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->peta_bidang_dibawah_5000 ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->peta_bidang_dibawah_5000 ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <input type="text" name="peta_bidang_dibawah_5000" class="form-control" value="<?php if($keterangan) echo $keterangan->peta_bidang_dibawah_5000 ?>">
                            </td>
                            <td class="text-center pe-0">
                                <input type="file" name="file_peta_bidang_dibawah_5000" class="form-control">
                            </td>

                        </tr>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold">13</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">Surat tanah diatas 5000m2</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_tanah_diatas_5000 ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_tanah_diatas_5000 ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <input type="text" name="surat_tanah_diatas_5000" class="form-control" value="<?php if($keterangan) echo $keterangan->surat_tanah_diatas_5000 ?>">
                            </td>
                            <td class="text-center pe-0">
                                <input type="file" name="file_surat_tanah_diatas_5000" class="form-control">
                            </td>

                        </tr>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold">14</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">Peta bidang diatas 5000m2</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->peta_bidang_diatas_5000 ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->peta_bidang_diatas_5000 ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <input type="text" name="peta_bidang_diatas_5000" class="form-control" value="<?php if($keterangan) echo $keterangan->peta_bidang_diatas_5000 ?>">
                            </td>
                            <td class="text-center pe-0">
                                <input type="file" name="file_peta_bidang_diatas_5000" class="form-control">
                            </td>

                        </tr>
                    <?php } ?>
                    <?php if ($kkpr->type == "tower") { ?>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold">11</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">Surat rekomendasi dari dinas Komunikasi dan informatika</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_dinas_komunikasi ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_dinas_komunikasi ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <input type="text" name="surat_dinas_komunikasi" class="form-control" value="<?php if($keterangan) echo $keterangan->surat_dinas_komunikasi ?>">
                            </td>
                            <td class="text-center pe-0">
                                <input type="file" name="file_surat_dinas_komunikasi" class="form-control">
                            </td>

                        </tr>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold">12</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">Surat rekomendasi TNI</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_rekom_tni ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_rekom_tni ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <input type="text" name="surat_rekom_tni" class="form-control" value="<?php if($keterangan) echo $keterangan->surat_rekom_tni ?>">
                            </td>
                            <td class="text-center pe-0">
                                <input type="file" name="file_surat_rekom_tni" class="form-control">
                            </td>

                        </tr>
                    <?php } ?>
                    <?php if ($kkpr->type == "minimarket") { ?>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold">11</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">Surat rekomendasi dari dinas perdagangan</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_dinas_perdagangan ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_dinas_perdagangan ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <input type="text" name="surat_dinas_perdagangan" class="form-control" value="<?php if($keterangan) echo $keterangan->surat_dinas_perdagangan ?>">
                            </td>
                            <td class="text-center pe-0">
                                <input type="file" name="file_surat_dinas_perdagangan" class="form-control">
                            </td>
                        </tr>                        
                    <?php } ?>
                    <?php if ($kkpr->type == "peternakan") { ?>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold">11</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">Surat rekomendasi dari dinas peternakan</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_dinas_peternakan ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_dinas_peternakan ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <input type="text" name="surat_dinas_peternakan" class="form-control" value="<?php if($keterangan) echo $keterangan->surat_dinas_peternakan ?>">
                            </td>
                            <td class="text-center pe-0">
                                <input type="file" name="file_surat_dinas_peternakan" class="form-control">
                            </td>

                        </tr>                        
                    <?php } ?>
                    <?php if ($kkpr->type == "spbu") { ?>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold">11</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">Surat rekomendasi dari pertamina</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_pertamina ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_pertamina ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <input type="text" name="surat_pertamina" class="form-control" value="<?php if($keterangan) echo $keterangan->surat_pertamina ?>">
                            </td>
                            <td class="text-center pe-0">
                                <input type="file" name="file_surat_pertamina" class="form-control">
                            </td>

                        </tr>                       
                    <?php } ?>
                    <?php if ($kkpr->type == "tempat_ibadah") { ?>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold">11</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">Daftar nama persetujuan warga</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->daftar_nama_kk ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->daftar_nama_kk ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <input type="text" name="daftar_nama_kk" class="form-control" value="<?php if($keterangan) echo $keterangan->daftar_nama_kk ?>">
                            </td>
                            <td class="text-center pe-0">
                                <input type="file" name="file_daftar_nama_kk" class="form-control">
                            </td>

                        </tr>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold">12</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold">Surat FKUB</span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_fkub ?>" class="fw-bold" download>Download</a><br>
                                <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $kkpr->surat_fkub ?>" target="_blank" class="fw-bold">Lihat</a>
                            </td>
                            <td class="text-center pe-0">
                                <input type="text" name="surat_fkub" class="form-control" value="<?php if($keterangan) echo $keterangan->surat_fkub ?>">
                            </td>
                            <td class="text-center pe-0">
                                <input type="file" name="file_surat_fkub" class="form-control">
                            </td>

                        </tr>
                    <?php } ?>
                    <tr>
                        <td class="text-center pe-0">
                        </td>
                        <td class="text-center pe-0">
                        </td>
                        <td class="text-center pe-0">
                        </td>
                        <td class="text-center pe-0">
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('Pengembalian_formulir_itr'); ?>" class="btn btn-light">Kembali</a>
                            <button class="btn btn-info" type="submit">Upload Ulang</button>
                            <!-- <button class="btn btn-success" disabled>Terima</button> -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->