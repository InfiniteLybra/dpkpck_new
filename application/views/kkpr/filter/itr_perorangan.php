<!--begin::Card-->
<div class="card">
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Stepper-->
        <div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">
            <!--begin::Nav-->
            <div class="stepper-nav mb-5">
                <!--begin::Step 1-->
                <div class="stepper-item current" data-kt-stepper-element="nav">
                    <h3 class="stepper-title">Data Pemohon</h3>
                </div>
                <!--end::Step 1-->
                <!--begin::Step 3-->
                <div class="stepper-item" data-kt-stepper-element="nav">
                    <h3 class="stepper-title">Data Tanah</h3>
                </div>
                <!--end::Step 3-->
                <!--begin::Step 4-->
                <div class="stepper-item" data-kt-stepper-element="nav">
                    <h3 class="stepper-title">Lampiran</h3>
                </div>
                <!--end::Step 4-->

            </div>
            <!--end::Nav-->
            <!--begin::Form-->
            <form class="mx-auto mw-800px w-100 pt-15 pb-10" id="kt_create_account_form" method="POST" action="<?php echo base_url('Itr/proses_tambah_itr_permohonan'); ?>" enctype="multipart/form-data">
                <!--begin::Step 1-->
                <div class="current" data-kt-stepper-element="content">
                    <!--begin::Wrapper-->
                    <div class="w-100">

                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Nama Pemohon
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="nama_pemohon" class="form-control mb-2 " name="nama_pemohon" required="required" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Alamat Pemohon
                                <span class="required"></span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Ex. Jl.Kebon Raya blok 3A No.01">
                                    <i class="ki-duotone ki-information fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                                <br><small>Sesuai KTP</small>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="alamat_pemohon" name="alamat_pemohon" required="required" class="form-control mb-2 " placeholder="Ex. Jl.Kebon Raya blok 3A No.01">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RT
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="middle-name" class="form-control mb-2 col" type="number" value="1" min="1" max="20" name="rt_pemohon" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RW
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="middle-name" class="form-control mb-2 col" type="number" value="1" min="1" max="20" name="rw_pemohon" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">
                                Provinsi
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="provinsi_pemohon" id="provinsi_pemohon" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Provinsi">
                                    <option value="" selected></option>
                                    <?php foreach ($provinsi as $k) { ?>
                                        <option value="<?= $k->prov_id ?>"><?= $k->prov_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Kota /
                                Kabupaten <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kota_pemohon" id="kota_pemohon" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kota">
                                    <option value="" selected></option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Kecamatan
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kecamatan_pemohon" id="kecamatan_pemohon" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kecamatan">
                                    <option value="" selected></option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Desa /
                                Kelurahan <span class="required"></span></label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kelurahan_pemohon" id="kelurahan_pemohon" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kelurahan">

                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">No Telp. /
                                HP / WA <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="birthday" class="date-picker form-control mb-2" type="text" name="telp_pemohon">
                                <small>(Cantumkan No Telp. / HP / WA Pemohon <b>Bukan</b> Kuasa
                                    pengurusan)</small>
                            </div>
                        </div>
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Step 1-->
                <!--begin::Step 3-->
                <div data-kt-stepper-element="content">
                    <div class="w-100">
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Lokasi Tanah
                                <span class="required"></span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="Ex. Jl.Kebon Raya blok 3A No.01">
                                    <i class="ki-duotone ki-information fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="alamat-pemohon" name="lokasi_tanah" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RT
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="middle-name" class="form-control col" type="number" value="1" min="1" max="20" name="rt_tanah" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RW
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="middle-name" class="form-control col" type="number" value="1" min="1" max="20" name="rw_tanah" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Kota /
                                Kabupaten <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kota_tanah" id="kota_tanah" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kota" disabled>
                                    <option value=""></option>
                                    <option value="1">Kota Malang</option>
                                    <option value="2" selected>Kab Malang</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Kecamatan
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kecamatan_tanah" id="kecamatan_tanah" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kecamatan">
                                    <option value="" selected></option>
                                    <?php foreach ($kecamatan as $k) { ?>
                                        <option value="<?= $k->id_kecamatan ?>"><?= $k->nama_kecamatan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Desa /
                                Kelurahan
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kelurahan_tanah" id="kelurahan_tanah" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kelurahan">

                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Luas Tanah
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="birthday" class="date-picker form-control" required="required" type="text" name="luas_tanah">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Peruntukan
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="birthday" class="date-picker form-control" required="required" type="text" name="peruntukan_tanah">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status_tanah" class="col-form-label col-md-3 col-sm-3 label-align">Banyaknya Status tanah<span class="required"></span></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="status_tanah" class="form-control mb-2 col" type="number" value="0" min="0" max="10" name="status_tanah" required>
                            </div>
                        </div>

                        <div id="status_tanah_container"></div>
                    </div>
                </div>
                <!--begin::Step 3-->
                <!--begin::Step 4-->
                <div data-kt-stepper-element="content">
                    <div class="w-100">
                        <div class="" id="file_status_tanah_container" style="display: none;">
                            <div class="mb-3 row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Status Tanah
                                    <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="file" id="file_status_tanah" name="file_status_tanah" class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Fotokopi KTP Pemohon
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="alamat-pemohon" name="fotokopi_ktp" class="form-control ">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Peta bidang / Peta
                                blok / Peta citra satelit
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="alamat-pemohon" name="peta_bidang" class="form-control ">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Fotokopi surat tanah
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="alamat-pemohon" name="surat_tanah" class="form-control ">
                            </div>
                        </div>
                        <?php if ($badan_hukum == '1') { ?>
                            <div class="mb-3 row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                                    Fotokopi NPWP
                                    <br>
                                    <small>(jika berbadan hukum dan wajib untuk permohonan degan
                                        luas total diatas 1
                                        Ha)</small>
                                    <span class="required"></span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input type="file" id="alamat-pemohon" name="npwp" class="form-control ">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!--begin::Step 4-->
                <!--begin::Actions-->
                <div class="d-flex flex-stack pt-15">
                    <!--begin::Wrapper-->
                    <div class="mr-2">
                        <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                            <i class="ki-duotone ki-arrow-left fs-4 me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>Back</button>
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Wrapper-->
                    <div class="">
                        <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                            <span class="indicator-label">Submit
                                <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i></span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                            <i class="ki-duotone ki-arrow-right fs-4 ms-1 me-0">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i></button>
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Stepper-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->