<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> Formulir</h4>

    <div class="row">
        <div class="col mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Jenis Permohonan</h5>
                    <form id="kt_create_account_form" method="POST" action="<?php echo base_url('Formulir.html'); ?>" enctype="multipart/form-data">

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="umk">Umk dan Non Umk</label>
                        <div class="col-sm-10">
                        <select name="umk" id="umk" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Type Pengurusan">
                                    <option value="" selected></option>
                                    <option value="umk">UMK</option>
                                    <option value="non_umk">NON UMK</option>
                                </select>
                        </div>
                    </div>
                    <div id="pengajuan" style="display: none;">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="formulir">
                                Tipe Formulir
                            </label>
                            <div class="col-sm-10">
                            <select name="formulir" id="formulir" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Type Pengurusan">
                                        <option value="" selected></option>
                                        <option value="itr">Itr</option>
                                        <option value="kkpr">Kkpr</option>
                                    </select>
                            </div>
                        </div>
                    </div>

                    <div id="form_itr" style="display: none;">
                        <div class="row mb-3 ">
                            <label class="col-sm-2 col-form-label" for="pengurusan_itr">
                                Tipe Pengurusan
                            </label>
                            <div class="col-sm-10">
                            <select name="pengurusan_itr" id="pengurusan_itr" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Type Pengurusan">
                                    <option value="" selected></option>
                                    <option value="perusahaan">Perusahaan</option>
                                    <option value="perorangan">Perorangan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="badan_hukum_itr">
                                Berbadan Hukum
                            </label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input mb-2" type="radio" value="1" name="badan_hukum_itr" />
                                    <label class="form-check-label" for="flexRadioDefault">
                                        Ya
                                        </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input mb-2" type="radio" value="0" name="badan_hukum_itr" />
                                    <label class="form-check-label" for="flexRadioDefault">
                                    Tidak
                                        </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="form_kkpr" style="display: none;">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="pengurusan">
                                Tipe Pengurusan
                            </label>
                            <div class="col-sm-10">
                            <select name="pengurusan" id="pengurusan" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Type Pengurusan">
                                        <option value="" selected></option>
                                        <option value="perusahaan">Perusahaan</option>
                                        <option value="perorangan">Perorangan</option>
                                    </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="kuasa">
                                Dikuasakan?
                            </label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                <input class="form-check-input mb-2" type="radio" value="1" name="kuasa" />
                                        <label class="form-check-label" for="flexRadioDefault">
                                            Ya
                                        </label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input mb-2" type="radio" value="0" name="kuasa" />
                                        <label class="form-check-label" for="flexRadioDefault">
                                            Tidak
                                        </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="badan_hukum">
                                Berbadan Hukum
                            </label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                <input class="form-check-input mb-2" type="radio" value="1" name="badan_hukum" />
                                    <label class="form-check-label" for="badan_hukum_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input mb-2" type="radio" value="0" name="badan_hukum" />
                                    <label class="form-check-label" for="badan_hukum_no">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="pengajuan">
                                Tipe Pengajuan
                            </label>
                            <div class="col-sm-10">
                            <select name="pengajuan" id="id_pengajuan" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Type Pengajuan">
                                        <option value="" selected></option>
                                        <?php
                                        $kategori = $this->db->query("SELECT * FROM pilihan WHERE nama_pilihan = 'kategori_kkpr'")->row();
                                        $isi = json_decode($kategori->pilihan);
                                        foreach ($isi as $i) {
                                        ?>
                                            <option value="<?= $i->value ?>"> <?= $i->kategori ?></option>
                                        <?php } ?>
                                        <option value="lainya">Lainya</option>
                                    </select>
                                    <input type="hidden" id="isi_pengajuan" name="isi_pengajuan">
                            </div>
                        </div>
                    </div>
                    <div id="lainnyaInput" style="display: none;">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="lainnya">
                                Lainnya
                            </label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control mb-2" name="lainya" placeholder="Lainya" value="">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="next action-button btn btn-primary" style="float: right;">
                        Submit
                    </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

<!-- Modal Persiapan Pengisian Form -->
<div class="modal fade" id="modalPersiapan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPersiapan">Persiapan Pengisian Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col">
                        <h5>Lampiran/Persyaratan KKPR</h5>
                        <p>1. Dokumen yang diunduh pada Oss</p>
                        <p>2. Foto/fotokopi KTP Pemohon</p>
                        <p>3. Fotokopi akta pendirian perusahaan yang di legalisir (jika mengurus atas nama perusahaan)
                        </p>
                        <p>4. SIUP</p>
                        <p>5. TDP/NIB</p>
                        <p>6. Foto/fotokopi Surat Tanah</p>
                        <p>7. Gambar Peta Bidang dengan tipe file .jpg</p>
                        <p>8. Shape File dengan tipe file .zip</p>
                        <p>9. Pertimbangan Teknis pertanahan dari BPN</p>
                        <p>10. Foto/Fotocopy NPWP (jika berbadan hukum)</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <h6>Persyaratan Tambahan Jika Pemilik Lahan telah Meninggal</h6>
                        <p>1. Surat Kematian</p>
                        <p>2. Surat Kuasa dari semua ahli waris (jika ahli waris lebih dari 1)</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <h6>Persyaratan Tambahan Jika Pengurusan Tower</h6>
                        <p>1. Surat Rekomendasi dari Dinas Komunikasi dan Informatika</p>
                        <p>2. Surat Rekomendasi dari Komando Operasi TNI Angkatan Udara II Pangkalan TNI AU Abdulrachman
                            Saleh (untuk lokasi pengajuan di Kec. Pakis, Kec. Jabung, dan Kec. Singosari)</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <h6>Persyaratan Tambahan Jika Pengurusan Minimarket/Toko Modern</h6>
                        <p>1. Surat rekomendasi dinas perdagangan dan perindustrian</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <h6>Persyaratan Tambahan Jika Pegurusan Peternakan</h6>
                        <p>1. Surat rekomendasi dinas peternakan dan kesehatan hewan</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <h6>Persyaratan Tambahan Jika Pengurusan SPBU/SPBU MINI/Sejenisnya</h6>
                        <p>1. Surat Rekomendasi dari PT. Pertamina (Persero) Marketing Operation Region (MOR) V</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <h6>Persyaratan Tambahan Jika Pengurusan Tempat Ibadah</h6>
                        <p>1. Daftar nama dan fotokopi Kartu Tanda Penduduk (KTP) (paling sedikit 90 orang dan daftar
                            dukungan masyarakat sekitar paling sedikit 60 orang.)</p>
                        <p>2. Surat dari Forum Komunikasi Umat Beragama (FKUB)</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <h5>Lampiran ITR</h5>
                        <p>1. </p>
                    </div>
                </div>

            </div>
            <div class="modal-footer pt-4">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                    Selanjutnya
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->