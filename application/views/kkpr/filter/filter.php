<!--begin::Card-->
<div class="card">
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Stepper-->
        <div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">
            <h2 class="text-center">Jenis Permohonan</h2>
            <!--begin::Form-->
            <form class="mx-auto mw-800px w-100 pt-15 pb-10" id="kt_create_account_form" method="POST" action="<?php echo base_url('Formulir.html'); ?>" enctype="multipart/form-data">
                <!--begin::Step 1-->
                <div class="current" data-kt-stepper-element="content">
                    <!--begin::Wrapper-->
                    <div class="w-100">
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">
                                Umk dan Non Umk
                                <!-- <span class="required"></span> -->
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="umk" id="umk" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Type Pengurusan">
                                    <option value="" selected></option>
                                    <option value="umk">Umk</option>
                                    <option value="non_umk">Non Umk</option>
                                </select>
                            </div>
                        </div>
                        <div id="pengajuan" style="display: none;">
                            <div class="mb-3 row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">
                                    Type Formulir
                                    <!-- <span class="required"></span> -->
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="formulir" id="formulir" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Type Pengurusan">
                                        <option value="" selected></option>
                                        <option value="itr">Itr</option>
                                        <option value="kkpr">Kkpr</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- <style type="text/css">
                            div.kkpr { display:none; }
                        </style> -->
                        <div id="form_kkpr" style="display: none;">
                            <div class="mb-3 row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">
                                    Type Pengurusan
                                    <!-- <span class="required"></span> -->
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="pengurusan" id="pengurusan" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Type Pengurusan">
                                        <option value="" selected></option>
                                        <option value="perusahaan">Perusahaan</option>
                                        <option value="perorangan">Perorangan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">
                                    Dikuasakan?
                                    <!-- <span class="required"></span> -->
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                        <input class="form-check-input mb-2" type="radio" value="1" name="kuasa" />
                                        <label class="form-check-label" for="flexRadioDefault">
                                            Ya
                                        </label>&emsp;
                                        <input class="form-check-input mb-2" type="radio" value="0" name="kuasa" />
                                        <label class="form-check-label" for="flexRadioDefault">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">
                                    Berbadan Hukum
                                    <!-- <span class="required"></span> -->
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                        <input class="form-check-input mb-2" type="radio" value="1" name="badan_hukum" />
                                        <label class="form-check-label" for="flexRadioDefault">
                                            Ya
                                        </label>&emsp;
                                        <input class="form-check-input mb-2" type="radio" value="0" name="badan_hukum" />
                                        <label class="form-check-label" for="flexRadioDefault">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="mb-3 row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">
                                    Apakah Pemilik Lahan Meninggal ?
                                    
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                        <input class="form-check-input mb-2" type="radio" value="1" name="pemilik_lahan_meninggal" />
                                        <label class="form-check-label" for="flexRadioDefault">
                                            Ya
                                        </label>&emsp;
                                        <input class="form-check-input mb-2" type="radio" value="0" name="pemilik_lahan_meninggal" />
                                        <label class="form-check-label" for="flexRadioDefault">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="mb-3 row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">
                                    Type Pengajuan
                                    <!-- <span class="required"></span> -->
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="pengajuan" id="pengajuan" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Type Pengajuan">
                                        <option value="" selected></option>
                                        <?php
                                        $kategori = $this->db->query("SELECT * FROM pilihan WHERE nama_pilihan = 'kategori_kkpr'")->row();
                                        $isi = json_decode($kategori->pilihan);
                                        foreach ($isi as $i) {
                                        ?>
                                            <option value="<?= $i->value ?>"> <?= $i->kategori ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" id="isi_pengajuan" name="isi_pengajuan">
                                </div>
                            </div>
                        </div>
                        <div id="form_itr" style="display: none;">
                            <div class="mb-3 row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">
                                    Type Pengurusan
                                    <!-- <span class="required"></span> -->
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select name="pengurusan_itr" id="pengurusan_itr" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Type Pengurusan">
                                        <option value="" selected></option>
                                        <option value="perusahaan">Perusahaan</option>
                                        <option value="perorangan">Perorangan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">
                                    Berbadan Hukum
                                    <!-- <span class="required"></span> -->
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <div class="form-check form-check-custom form-check-solid mb-5">
                                        <input class="form-check-input mb-2" type="radio" value="1" name="badan_hukum_itr" />
                                        <label class="form-check-label" for="flexRadioDefault">
                                            Ya
                                        </label>&emsp;
                                        <input class="form-check-input mb-2" type="radio" value="0" name="badan_hukum_itr" />
                                        <label class="form-check-label" for="flexRadioDefault">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Step 1-->
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
                        <button type="submit" class="btn btn-lg btn-primary">Submit
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