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
                <!--begin::Step 2-->
                <div class="stepper-item" data-kt-stepper-element="nav">
                    <h3 class="stepper-title">Data Perusahaan</h3>
                </div>
                <!--end::Step 2-->
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
                <!--begin::Step 5-->
                <!-- <div class="stepper-item" data-kt-stepper-element="nav">
                    <h3 class="stepper-title">Pernyataan</h3>
                </div> -->
                <!--end::Step 5-->

            </div>
            <!--end::Nav-->
            <!--begin::Form-->
            <form class="mx-auto mw-800px w-100 pt-15 pb-10" id="kt_create_account_form" method="POST" action="<?php echo base_url('Kkpr/proses_tambah_kkpr_peternakan'); ?>" enctype="multipart/form-data">
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
                                <br><small>Sesuai KTP</small> <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="alamat_pemohon" name="alamat_pemohon" required="required" class="form-control mb-2 " placeholder="Ex. Jl.Kebon Raya blok 3A No.01">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RT<span class="required"></span></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="middle-name" class="form-control mb-2 col" type="number" value="1" min="1" max="20" name="rt_pemohon" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RW<span class="required"></span></label>
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
                                Kelurahan<span class="required"></span></label>
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
                <!--begin::Step 2-->
                <div data-kt-stepper-element="content">
                    <div class="w-100">
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama-pemohon">Bertindak Atas
                                Nama
                                <br><small>(PT,CV,Yayasan / dll)</small>
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="" class="form-control " required="required" data-validate-length-range="6" name="nama_perusahaan">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Alamat
                                <br><small>(sesuai NPWP / NIB)</small>
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="alamat-pemohon" name="alamat_perusahaan" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RT<span class="required"></span></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="middle-name" class="form-control col" type="number" value="1" min="1" max="20" name="rt_perusahaan" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RW<span class="required"></span></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="middle-name" class="form-control col" type="number" value="1" min="1" max="20" name="rw_perusahaan" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">
                                Provinsi
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="provinsi_perusahaan" id="provinsi_perusahaan" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Provinsi">
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
                                <select name="kota_perusahaan" id="kota_perusahaan" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kota">
                                    <option value="" selected></option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Kecamatan
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kecamatan_perusahaan" id="kecamatan_perusahaan" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kecamatan">
                                    <option value="" selected></option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Desa /
                                Kelurahan<span class="required"></span></label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kelurahan_perusahaan" id="kelurahan_perusahaan" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kelurahan">

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Step 2-->
                <!--begin::Step 3-->
                <div data-kt-stepper-element="content">
                    <div class="w-100">
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Peruntukan dimohon
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="birthday" class="date-picker form-control" required="required" type="text" name="peruntukan_tanah">
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Lokasi Dimohon
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="alamat-pemohon" name="lokasi_tanah" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RT<span class="required"></span></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input id="middle-name" class="form-control col" type="number" value="1" min="1" max="20" name="rt_tanah" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RW<span class="required"></span></label>
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
                                Kelurahan<span class="required"></span></label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kelurahan_tanah" id="kelurahan_tanah" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kelurahan">

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Step 3-->
                <!--begin::Step 4-->
                <div data-kt-stepper-element="content">
                    <div class="w-100">
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                                Surat rekomendasi dinas peternakan dan kesehatan hewan
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="alamat-pemohon" name="surat_dinas_peternakan" class="form-control ">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> Dokumen yang di unduh pada OSS
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="alamat-pemohon" name="dokumen_oss" class="form-control ">
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                                Surat Pernyataan Kesanggupan Kuasa Pengurusan KKPR
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="alamat-pemohon" name="spkkp" class="form-control ">
                                <small>disertai Fotokopi KTP pemilik tanah dan penerima kuasa (jika dikuasakan)</small>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                                Fotokopi akta pendirian perusahaan (legalisir)
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="alamat-pemohon" name="fc_akta_perusahaan" class="form-control ">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                                SIUP
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="alamat-pemohon" name="siup" class="form-control ">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                                TDP / NIB
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="alamat-pemohon" name="tdp_nib" class="form-control ">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                                Fotokopi NPWP
                                <br>
                                <small>(jika berbadan hukum, dan wajib untuk permohonan Perumahan luas di atas 5.000 m2)</small>
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="alamat-pemohon" name="npwp" class="form-control ">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                                Fotokopi surat tanah
                                <br>
                                <small>(Sertifikat / Akta Jual Beli / Petok D / Letter C / Perjanjian Pengikatan Jual Beli dan Surat Kuasa Menjual / Perjanjian Sewa / Perjanjian Kerjasama)</small>
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="alamat-pemohon" name="surat_tanah" class="form-control ">
                                <small>Permohonan dilengkapi dengan setempel basah (jika berbadan
                                    hukum)</small>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                                Peta Bidang (dari BPN)
                                <br>
                                <small>(jika belum bersertifikat) dan dilegalisir oleh BPN / Notaris.</small>
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="alamat-pemohon" name="peta_bidang" class="form-control ">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                                Pertimbangan Teknis pertanahan dari BPN
                                <!-- <br> -->
                                <!-- <small>(Sertifikat  /  Akta  Jual  Beli  /  Petok   D  /  Letter  C  /  Perjanjian Pengikatan Jual Beli dan  Surat  Kuasa Menjual / Perjanjian Sewa / Perjanjian Kerjasama)</small> -->
                                <span class="required"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="alamat-pemohon" name="surat_teknis_tanah" class="form-control ">
                                <small>(untuk permohonan Non Berusaha dan Berusaha Non UMK, Perolehan Tanah atau sesuai ketentuan teknis yang berlaku)</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Step 4-->
                <!--begin::Step 5-->
                <!-- <div data-kt-stepper-element="content">
                    <div class="w-100">
                        <div class="mb-3 row">
                            <h6  style="text-align: justify;">
                                1. Sanggup hadir saat pengambilan surat informasi Kesesuaian Kegiatan Pemanfaatan Ruang (KKPR) yang diterbitkan
                                oleh Dinas Perumahan, Kawasan Permukiman dan Cipta Karya Kabupaten Malang (boleh didampingi oleh kuasa pengurusan). <br>
                                2. Bertanggung jawab secara hukum sesuai ketentuan perundang-undang yang berlaku jika dalam pengisian formulir dan 
                                kelengkapan berkas administrasi terdapat unsur kelalaian, pemalsuan, paksaan, penyesatan dalam memberikan informasi,
                                difungsikan tidak sesuai permohonan dan pemanfaatannya menimbulkan keresahan masyarakat. <br>                                
                                Demikian surat pernyataan ini saya buat dalam keadaan sadar tanpa paksaan dari pihak manapun.
                            </h6>
                        </div>                        
                    </div>
                </div> -->
                <!--begin::Step 5-->
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