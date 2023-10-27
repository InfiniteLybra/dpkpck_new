<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> User </h4>

        <div class="row">
            <div class="col-md-12"><!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Stepper-->
                        <div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">
                            <!--begin::Nav-->
                            <div class="stepper-nav mb-5">
                                <!--begin::Step 1-->
                                <div class="stepper-item current" data-kt-stepper-element="nav">
                                    <h3 class="stepper-title">Data Pemberi Kuasa</h3>
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <h3 class="stepper-title">Data Penerima Kuasa</h3>
                                </div>
                                <!--end::Step 2-->
                                <!--begin::Step 3-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <h3 class="stepper-title">Data Tanah</h3>
                                </div>
                                <!--end::Step 3-->
                                <!--begin::Step 4-->
                                <!-- <div class="stepper-item" data-kt-stepper-element="nav">
                    <h3 class="stepper-title">Lampiran</h3>
                </div> -->
                                <!--end::Step 4-->
                                <!--begin::Step 5-->
                                <!-- <div class="stepper-item" data-kt-stepper-element="nav">
                    <h3 class="stepper-title">Pernyataan</h3>
                </div> -->
                                <!--end::Step 5-->

                            </div>
                            <!--end::Nav-->
                            <!--begin::Form-->
                            <form class="mx-auto mw-800px w-100 pt-15 pb-10" id="kt_create_account_form" method="POST" action="<?php echo base_url('Itr/proses_tambah_itr_kuasa_penerbitan'); ?>" enctype="multipart/form-data">
                                <!--begin::Step 1-->
                                <div class="current" data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">

                                        <div class="mb-3 row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Nama
                                                <span class="required"></span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" id="nama_pemberi" class="form-control mb-2 " name="nama_pemberi" required="required" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="pekerjaan_pemberi">Pekerjaan
                                                <span class="required"></span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" id="pekerjaan_pemberi" class="form-control mb-2 " name="pekerjaan_pemberi" required="required" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Alamat <span class="required">
                                                    <br><small>Sesuai KTP</small></span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" id="alamat_pemberi" name="alamat_pemberi" required="required" class="form-control mb-2 " placeholder="Ex. Jl.Kebon Raya blok 3A No.01">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RT<span class="required"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input id="middle-name" class="form-control mb-2 col" type="number" value="1" min="1" max="20" name="rt_pemberi" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RW<span class="required"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input id="middle-name" class="form-control mb-2 col" type="number" value="1" min="1" max="20" name="rw_pemberi" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">
                                                Provinsi
                                                <span class="required"></span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select name="provinsi_pemberi" id="provinsi_pemberi" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Provinsi">
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
                                                <select name="kota_pemberi" id="kota_pemberi" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kota">
                                                    <option value="" selected></option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Kecamatan
                                                <span class="required"></span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select name="kecamatan_pemberi" id="kecamatan_pemberi" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kecamatan">
                                                    <option value="" selected></option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Desa /
                                                Kelurahan<span class="required"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select name="kelurahan_pemberi" id="kelurahan_pemberi" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kelurahan">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">No Telp. /
                                                HP / WA <span class="required"></span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input id="birthday" class="date-picker form-control mb-2" type="text" name="telp_pemberi">
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
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Nama
                                                <span class="required"></span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" id="nama_penerima" class="form-control mb-2 " name="nama_penerima" required="required" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="pekerjaan_penerima">Pekerjaan
                                                <span class="required"></span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" id="pekerjaan_penerima" class="form-control mb-2 " name="pekerjaan_penerima" required="required" />
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Alamat <span class="required">
                                                    <br><small>Sesuai KTP</small></span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" id="alamat_penerima" name="alamat_penerima" required="required" class="form-control mb-2 " placeholder="Ex. Jl.Kebon Raya blok 3A No.01">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RT<span class="required"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input id="middle-name" class="form-control mb-2 col" type="number" value="1" min="1" max="20" name="rt_penerima" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">RW<span class="required"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input id="middle-name" class="form-control mb-2 col" type="number" value="1" min="1" max="20" name="rw_penerima" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">
                                                Provinsi
                                                <span class="required"></span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select name="provinsi_penerima" id="provinsi_penerima" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Provinsi">
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
                                                <select name="kota_penerima" id="kota_penerima" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kota">
                                                    <option value="" selected></option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Kecamatan
                                                <span class="required"></span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select name="kecamatan_penerima" id="kecamatan_penerima" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kecamatan">
                                                    <option value="" selected></option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Desa /
                                                Kelurahan<span class="required"></span></label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select name="kelurahan_penerima" id="kelurahan_penerima" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kelurahan">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">No Telp. /
                                                HP / WA <span class="required"></span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input id="birthday" class="date-picker form-control mb-2" type="text" name="telp_penerima">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Step 2-->
                                <!--begin::Step 3-->
                                <div data-kt-stepper-element="content">
                                    <div class="w-100">
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
                                        <div class="mb-3 row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Status Tanah
                                                <span class="required"></span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input id="birthday" class="date-picker form-control" required="required" type="text" name="status_tanah">
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
                                    </div>
                                </div>
                                <!--begin::Step 3-->
                                <!--begin::Step 5-->
                                <!-- <div data-kt-stepper-element="content">
                    <div class="w-100">
                        <div class="mb-3 row">
                            <h6 style="text-align: justify;">
                                saya pemberi kuasa, memberikan kuasa sepenuhnya kepada penerima kuasa untuk melakukan sebagai berikut : <br>
                                1. Menandatangani semua persyaratan administrasi permohonan informasi tata ruang (ITR) pada lokasi diatas 
                                pada Dinas Permuhaman, Kawasan Permukiman dan Cipta Karya Kabupaten Malang. <br>
                                2. Mengatasnamakan Penerbitan Informasi Tata Ruang (ITR). <br>
                                3. Mempertanggungjawabkan semua akibat dari ketentuan-ketentuan yang tertuang didalam informasi Tata Ruang (ITR).
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
            </div>
        </div>
    </div>
</div>