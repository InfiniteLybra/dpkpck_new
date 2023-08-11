<?php
$kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$itr->kelurahan_pemohon' ")->row();
$kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$itr->kecamatan_pemohon' ")->row();
$kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$itr->kota_pemohon' ")->row();
$provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$itr->provinsi_pemohon' ")->row();

$kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$itr->kelurahan_tanah' ")->row();
$kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$itr->kecamatan_tanah' ")->row();

$keterangan = $this->db->query("SELECT * FROM pengembalian_itr_permohonan WHERE id_permohonan = '$itr->id_itr' ")->row();
?>
<!--begin::details View-->
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
                <span class="fw-bold fs-6 text-gray-800"><?= $itr->nama_pemohon ?></span>
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
                    <?= $itr->alamat_pemohon ?> RT. <?= $itr->rt_pemohon ?> RW. <?= $itr->rw_pemohon ?> Kel. <?= $kelurahan->subdis_name ?> - Kec. <?= $kecamatan->dis_name ?> - Kota / Kab. <?= $kota->city_name ?> - Prov. <?= $provinsi->prov_name ?>
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
                <span class="fw-semibold text-gray-800 fs-6"><?= $itr->nama_perusahaan ?></span>
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
                <span class="fw-semibold text-gray-800 fs-6"><?= $itr->peruntukan_tanah ?> / <?= $itr->luas_tanah ?> m²</span>
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
                <span class="fw-semibold text-gray-800 fs-6"><?= $itr->lokasi_tanah ?> Desa / Kel. <?= $kelurahan_tanah->nama_desa ?> - Kec. <?= $kecamatan_tanah->nama_kecamatan ?> </span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->        
        <!--begin::Input group-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">
                No Handphone
            </label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 d-flex align-items-center">
                <span class="fw-bold fs-6 text-gray-800 me-2"><?= $itr->telp_pemohon ?></span>
                <!-- <span class="badge badge-success">Verified</span> -->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <form action="<?php echo base_url('Itr/proses_keterangan'); ?>" method="post">
            <table class="table align-middle table-row-dashed fs-6 gy-5" border="1">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-center min-w-50px">No.</th>
                        <th class="text-center min-w-100px">Lampiran</th>
                        <th class="text-center min-w-100px">File</th>
                        <th class="text-center min-w-25px">Actions</th>
                        <th class="text-center min-w-200px">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">1</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Fotokopi KTP Pemohon</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/itr/'); ?><?= $itr->fotokopi_ktp ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/itr/'); ?><?= $itr->fotokopi_ktp ?>" target="_blank" class="fw-bold">Lihat</a>
                            <input type="hidden" name="id_itr" value="<?php if($itr->id_itr) echo $itr->id_itr ?>">
                        </td>
                        <td class="text-center pe-0">
                            <select name="yn_fotokopi_ktp" id="" class="form-select form-control" style="width: 100px;">
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </td>
                        <td class="text-center pe-0">
                            <!-- <input type="text" name="fotokopi_ktp" class="form-control" value="<?php if($keterangan) echo $keterangan->fotokopi_ktp ?>"> -->
                            <textarea class="form-control" name="fotokopi_ktp" data-kt-autosize="true"><?php if($keterangan) echo $keterangan->fotokopi_ktp ?></textarea>
                        </td>                       
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">2</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Surat Kuasa Dari Pemilik Tanah</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/itr/'); ?><?= $itr->surat_kuasa ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/itr/'); ?><?= $itr->surat_kuasa ?>" target="_blank" class="fw-bold">Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <select name="yn_surat_kuasa" id="" class="form-select form-control" style="width: 100px;">
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </td>
                        <td class="text-center pe-0">
                            <!-- <input type="text" name="surat_kuasa" class="form-control" value="<?php if($keterangan->surat_kuasa) echo $keterangan->surat_kuasa ?>"> -->
                            <textarea class="form-control" name="surat_kuasa" data-kt-autosize="true"><?php if($keterangan) echo $keterangan->surat_kuasa ?></textarea>
                        </td>                       
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">3</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Peta bidang / Peta blok / Peta citra sateli</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/itr/'); ?><?= $itr->peta_bidang ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/itr/'); ?><?= $itr->peta_bidang ?>" target="_blank" class="fw-bold">Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <select name="yn_peta_bidang" id="" class="form-select form-control" style="width: 100px;">
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </td>
                        <td class="text-center pe-0">
                            <!-- <input type="text" name="peta_bidang" class="form-control" value="<?php if($keterangan->peta_bidang) echo $keterangan->peta_bidang ?>"> -->
                            <textarea class="form-control" name="peta_bidang" data-kt-autosize="true"><?php if($keterangan) echo $keterangan->peta_bidang ?></textarea>
                        </td>                       
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">4</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Fotokopi surat tanah</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/itr/'); ?><?= $itr->surat_tanah ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/itr/'); ?><?= $itr->surat_tanah ?>" target="_blank" class="fw-bold" >Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <select name="yn_surat_tanah" id="" class="form-select form-control" style="width: 100px;">
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </td>
                        <td class="text-center pe-0">
                            <!-- <input type="text" name="surat_tanah" class="form-control" value="<?php if($keterangan->surat_tanah) echo $keterangan->surat_tanah ?>"> -->
                            <textarea class="form-control" name="surat_tanah" data-kt-autosize="true"><?php if($keterangan) echo $keterangan->surat_tanah ?></textarea>
                        </td>                       
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">5</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Fotokopi akte pendidikan perusahaan dan fotokopi NPWP</span>
                        </td>
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('assets_dokumen/itr/'); ?><?= $itr->akte_perusahaan ?>" class="fw-bold" download>Download</a><br>
                            <a href="<?php echo base_url('assets_dokumen/itr/'); ?><?= $itr->akte_perusahaan ?>" target="_blank" class="fw-bold">Lihat</a>
                        </td>
                        <td class="text-center pe-0">
                            <select name="yn_akte_pendidikan" id="" class="form-select form-control" style="width: 100px;">
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </td>
                        <td class="text-center pe-0">
                            <!-- <input type="text" name="akte_pendidikan" class="form-control" value="<?php if($keterangan->akte_perusahaan) echo $keterangan->akte_perusahaan ?>"> -->
                            <textarea class="form-control" name="akte_pendidikan" data-kt-autosize="true"><?php if($keterangan) echo $keterangan->akte_perusahaan ?></textarea>
                        </td>                       
                    </tr>
                    <tr>
                        <td class="text-center pe-0" colspan="4">
                        <textarea class="form-control" name="preview" data-kt-autosize="true"></textarea>
                        </td>                        
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('Itr/admin_itr');?>" class="btn btn-light">Kembali</a>
                            <button class="btn btn-danger" type="submit">Tolak</button>
                            <button class="btn btn-success" disabled>Terima</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </form>
    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->