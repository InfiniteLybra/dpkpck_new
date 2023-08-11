<?php
$kelurahan_pemberi = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$kkpr->kelurahan_pemberi' ")->row();
$kecamatan_pemberi = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$kkpr->kecamatan_pemberi' ")->row();
$kota_pemberi = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$kkpr->kota_pemberi' ")->row();
$provinsi_pemberi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$kkpr->provinsi_pemberi' ")->row();

$kelurahan_penerima = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$kkpr->kelurahan_penerima' ")->row();
$kecamatan_penerima = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$kkpr->kecamatan_penerima' ")->row();
$kota_penerima = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$kkpr->kota_penerima' ")->row();
$provinsi_penerima = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$kkpr->provinsi_penerima' ")->row();

$kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$kkpr->kelurahan_tanah' ")->row();
$kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$kkpr->kecamatan_tanah' ")->row();
?>
<!--begin::details View-->
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Detail Data</h3>
        </div>
        <!-- <div class="card-title m-0 float-right">
            <a href="#" class="btn btn-success">Download</a>
        </div> -->
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        <!--begin::Row-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Nama Pemberi Kuasa</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800"><?= $kkpr->nama_pemberi ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Pekerjaan Pemberi Kuasa</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800"><?= $kkpr->pekerjaan_pemberi ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Input group-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Alamat Pemberi Kuasa</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <span class="fw-semibold text-gray-800 fs-6">
                    <?= $kkpr->alamat_pemberi ?> RT. <?= $kkpr->rt_pemberi ?> RW. <?= $kkpr->rw_pemberi ?> Kel. <?= $kelurahan_pemberi->subdis_name ?> - Kec. <?= $kecamatan_pemberi->dis_name ?> - Kota / Kab. <?= $kota_pemberi->city_name ?> - Prov. <?= $provinsi_pemberi->prov_name ?>
                </span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">No Handphone Pemberi Kuasa</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 d-flex align-items-center">
                <span class="fw-bold fs-6 text-gray-800 me-2"><?= $kkpr->telp_pemberi ?></span>
                <!-- <span class="badge badge-success">Verified</span> -->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <br>
        <!--begin::Row-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Nama Penerima Kuasa</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800"><?= $kkpr->nama_penerima ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Pekerjaan Penerima Kuasa</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800"><?= $kkpr->pekerjaan_penerima ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Input group-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Alamat Penerima Kuasa</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <span class="fw-semibold text-gray-800 fs-6">
                    <?= $kkpr->alamat_penerima ?> RT. <?= $kkpr->rt_penerima ?> RW. <?= $kkpr->rw_penerima ?> Kel. <?= $kelurahan_penerima->subdis_name ?> - Kec. <?= $kecamatan_penerima->dis_name ?> - Kota / Kab. <?= $kota_penerima->city_name ?> - Prov. <?= $provinsi_penerima->prov_name ?>
                </span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">No Handphone Penerima Kuasa</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 d-flex align-items-center">
                <span class="fw-bold fs-6 text-gray-800 me-2"><?= $kkpr->telp_penerima ?></span>
                <!-- <span class="badge badge-success">Verified</span> -->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <br>
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
                <span class="fw-semibold text-gray-800 fs-6"><?= $kkpr->status_tanah ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="row mb-4">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Luas Tanah</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <span class="fw-semibold text-gray-800 fs-6"><?= $kkpr->luas_tanah ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

    </div>
    <!--end::Card body-->
    <div class="card-footer">
        <!--begin::Card title-->
        <div class="float-right">
            <a href="<?php echo base_url('Kkpr/admin_kkpr_kuasa');?>" class="btn btn-light">Kembali</a>
            <a href="#" class="btn btn-success">Download Pdf</a>
        </div>    
        <!--end::Card title-->
    </div>
</div>
<!--end::details View-->