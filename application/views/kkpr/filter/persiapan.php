<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / KKPR / </span> Laporan Tahunan </h4>
                <div class="row">
                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div class="card-body">
                                <!--begin::Stepper-->
                                <div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper">
                                    <h2 class="text-center">Persiapan Pengisian Form</h2>
                                    <!--begin::Form-->
                                    <form class="mx-auto mw-800px w-100 pt-15 pb-10" id="kt_create_account_form" method="POST" action="<?php echo base_url('Formulir.html'); ?>" enctype="multipart/form-data">
                                        <h4>Lampiran / Persyaratan KKPR</h4>

                                        <table>
                                            <tr>
                                                <td>1.</td>
                                                <td>Dokumen yang di Unduh pada Oss</td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Foto / Fotocopy KTP Pemohon</td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>Fotokopi akta pendirian perusahaan yang di legalisir (jika mengurus atas nama perusahaan)</td>
                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td>SIUP</td>
                                            </tr>
                                            <tr>
                                                <td>5.</td>
                                                <td>TDP / NIB</td>
                                            </tr>
                                            <tr>
                                                <td>6.</td>
                                                <td>Foto / Fotocopy Surat Tanah</td>
                                            </tr>
                                            <tr>
                                                <td>7.</td>
                                                <td>Gambar Peta Bidang dengan tipe file .jpg</td>
                                            </tr>
                                            <tr>
                                                <td>8.</td>
                                                <td>Shape File dengan tipe file .zip</td>
                                            </tr>
                                            <tr>
                                                <td>9.</td>
                                                <td>Pertimbangan Teknis pertanahan dari BPN</td>
                                            </tr>
                                            <tr>
                                                <td>10.</td>
                                                <td>Foto / Fotocopy NPWP (jika berbadan hukum)</td>
                                            </tr>
                                        </table><br>
                                        <table>
                                            <b>
                                                Persyaratan Tambahan Jika Pemilik Lahan telah Meninggal
                                            </b>
                                            <tr>
                                                <td>1.</td>
                                                <td>Surat Kematian</td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Surat Kuasa dari semua ahli waris (jika ahli waris lebih dari 1)</td>
                                            </tr>
                                        </table><br>
                                        <table>
                                            <b>
                                                Persyaratan Tambahan Jika Pengurusan Tower
                                            </b>
                                            <tr>
                                                <td>1.</td>
                                                <td>Surat Rekomendasi dari Dinas Komunikasi dan Informatika</td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Surat Rekomendasi dari Komando Operasi TNI Angkatan Udara II Pangkalan TNI AU Abdulrachman Saleh (untuk lokasi pengajuan di Kec. Pakis, Kec. Jabung dan Kec. Singosari)</td>
                                            </tr>
                                        </table><br>
                                        <table>
                                            <b>
                                                Persyaratan Tambahan Jika Pengurusan Minimarket / Toko Modern
                                            </b>
                                            <tr>
                                                <td>1.</td>
                                                <td>Surat rekomendasi dinas perdagangan dan perindustrian</td>
                                            </tr>
                                        </table><br>
                                        <table>
                                            <b>
                                                Persyaratan Tambahan Jika Pegurusan Peternakan
                                            </b>
                                            <tr>
                                                <td>1.</td>
                                                <td>Surat rekomendasi dinas peternakan dan kesehatan hewan</td>
                                            </tr>
                                        </table><br>
                                        <table>
                                            <b>
                                                Persyaratan Tambahan Jika Pengurusan SPBU/SPBU MINI/Sejenisnya
                                            </b>
                                            <tr>
                                                <td>1.</td>
                                                <td>Surat Rekomendasi dari PT. Pertamina (Persero) Marketing Operation Region (MOR) V</td>
                                            </tr>
                                        </table><br>
                                        <table>
                                            <b>
                                                Persyaratan Tambahan Jika Pengurusan Tempat Ibadah
                                            </b>
                                            <tr>
                                                <td>1.</td>
                                                <td>Daftar nama dan fotokopi Kartu Tanda Penduduk (KTP) (paling sedikit 90 orang dan daftar dukungan masyarakat sekitar paling sedikit 60 orang.)</td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Surat dari Forum Komunikasi Umat Beragama (FKUB)</td>
                                            </tr>
                                        </table><br>
                                        <h4>Lampiran ITR</h4>

                                        <table>
                                            <tr>
                                                <td>1.</td>
                                                <td></td>
                                            </tr>
                                        </table>
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
                                                <a href="<?php echo base_url('Filter.html'); ?>" class="btn btn-lg btn-primary">Selanjutnya
                                                    <i class="ki-duotone ki-arrow-right fs-4 ms-1 me-0">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i></a>
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
