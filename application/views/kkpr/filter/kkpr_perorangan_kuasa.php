<style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
    }

    .required {
        color: red;
    }

    .error-message {
        color: red;
        font-size: 12px;
    }

    #msform fieldset:not(:first-of-type) {
        display: none;
    }

    .card {
        z-index: 0;
        border: none;
        position: relative
    }

    #progressbar {
        margin: 30px;
        overflow: hidden;
        color: lightgrey;
        text-align: center;
    }

    @media (max-width: 767px) {
        #progressbar {
            margin: 0px;
            overflow: hidden;
            color: lightgrey;
            text-align: center;
        }
    }

    #progressbar .active {
        color: #3136b9
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f0f7 "
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f15c  "
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f016"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2 px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #3136b9
    }

    .progress {
        height: 20px
    }

    .progress-bar {
        background-color: #3136b9
    }

    .fit-image {
        width: 65%;
        object-fit: cover;
        margin: auto;
        display: block;
    }
</style>
<!-- Begin Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> Formulir</h4>

    <!-- CONTENT -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">

                <form class="mt-3" id="msform" method="POST" action="<?php echo base_url('Kkpr/insert_kkpr'); ?>" enctype="multipart/form-data">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="account"><strong>Data Pemohon</strong></li>
                        <li id="confirm"><strong>Data Kuasa</strong></li>
                        <li id="confirm"><strong>Data Usaha</strong></li>
                        <li id="payment"><strong>Data Tanah</strong></li>
                    </ul>

                    <!-- Data Pemohon -->
                    <fieldset>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nama_pemohon">Nama
                                    Pemohon
                                    <span class="required">*</span>
                                </label>
                                <div class="col-sm-10 ">
                                    <input type="text" id="nama_pemohon" class="form-control" name="nama_pemohon" value="<?php if($kkpr){echo $kkpr->nama_pemohon;}else{echo isset($draft_data['nama_pemohon']) ? $draft_data['nama_pemohon'] : '';} ?>" placeholder="Ex. Dr. Sarah Wijayanto, Esq." required />
                                    <input type="hidden" class="form-control" name="type_pengurusan" value="<?= $pengurusan ?>" required="required" />
                                    <input type="hidden" class="form-control" name="type_isi_kategori" value="<?= $isi_pengajuan ?>" required="required" />
                                    <input type="hidden" class="form-control" name="type_kategori" value="<?= $pengajuan ?>" required="required" />
                                    <!-- <input type="hidden" class="form-control" name="pemilik_lahan_meninggal" value="<?= $pemilik_lahan_meninggal ?>" required="required" /> -->
                                    <input type="hidden" class="form-control" name="badan_hukum" value="<?= $badan_hukum ?>" required="required" />
                                    <input type="hidden" class="form-control" name="kuasa" value="<?= $kuasa ?>" required="required" />
                                    <input type="hidden" class="form-control" name="lainya" value="<?= $lainya ?>" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="alamat_pemohon">
                                    Alamat Pemohon
                                    <span class="required">*</span>
                                    <div class="form-text">Sesuai KTP</div>
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alamat_pemohon" name="alamat_pemohon" value="<?php if($kkpr){echo $kkpr->alamat_pemohon;}else{echo isset($draft_data['alamat_pemohon']) ? $draft_data['alamat_pemohon'] : '';} ?>" placeholder="Ex. Jl. Kebon Raya blok 3A No.01" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rt_pemohon" class="col-md-2 col-form-label"> RT
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" name="rt_pemohon" id="rt_pemohon" value="<?php if($kkpr){echo $kkpr->rt_pemohon;}else{echo isset($draft_data['rt_pemohon']) ? $draft_data['rt_pemohon'] : '';} ?>" inputmode="numeric" placeholder="Ex. 001" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rw_pemohon" class="col-md-2 col-form-label">RW
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" iname="rw_pemohon" id="rw_pemohon" value="<?php if($kkpr){echo $kkpr->rw_pemohon;}else{echo isset($draft_data['rw_pemohon']) ? $draft_data['rw_pemohon'] : '';} ?>" inputmode="numeric" placeholder="Ex. 001" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="provinsi_pemohon" class="col-md-2 col-form-label">Provinsi
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <select name="provinsi_pemohon" id="provinsi_pemohon"  class="form-select" required>
                                            <option value="Pilih Provinsi" disabled selected>Pilih
                                                Provinsi
                                            </option>
                                            <?php foreach ($provinsi as $k) { ?>
                                                <option value="<?= $k->prov_id ?>"><?= $k->prov_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kota_pemohon" class="col-md-2 col-form-label">
                                    Kota / Kabupaten
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <select name="kota_pemohon" id="kota_pemohon" class="form-select" required>
                                            <option value="Pilih Kota / Kabupaten" disabled selected>Pilih Kota /
                                                Kabupaten</option>                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kecamatan_pemohon" class="col-md-2 col-form-label">Kecamatan
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <select name="kecamatan_pemohon" id="kecamatan_pemohon"  class="form-select" required>
                                            <option value="Pilih Kecamatan" disabled selected>Pilih
                                                Kecamatan
                                            </option>                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kelurahan_pemohon" class="col-md-2 col-form-label">
                                    Desa / Kelurahan
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <select name="kelurahan_pemohon" id="kelurahan_pemohon" class="form-select" required>
                                            <option value="Pilih Desa / Kelurahan" disabled selected>
                                                Pilih Desa / Kelurahan</option>                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telp_pemohon" class="col-md-2 col-form-label">
                                    No. Telp. / HP / WA
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" id="telp_pemohon" name="telp_pemohon" value="<?php if($kkpr){echo $kkpr->telp_pemohon;}else{echo isset($draft_data['telp_pemohon']) ? $draft_data['telp_pemohon'] : '';} ?>" inputmode="numeric" placeholder="Ex. 08998989809" required />
                                    <div class="form-text">Cantumkan No. Telp. / HP / WA Pemohon,
                                        <b>BUKAN</b> Kuasa pengurusan
                                    </div>
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label" for="fotokopi_ktp">
                                    Fotokopi KTP Pemohon
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input type="file" id="fotokopi_ktp" name="fotokopi_ktp" class="form-control " accept=".jpg, .pdf" required>
                                    <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                    </div>
                                </div>
                            </div>
                            <p>NB: Jika ada icon ini (<span class="required">*</span>) maka Wajib Diisi!</p>
                        </div>

                        <input type="button" name="next" class="next action-button btn btn-primary mb-5 me-5" value="Next" style="float: right;" />
                    </fieldset>

                    <!-- Data Kuasa -->
                    <fieldset>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nama_kuasa">Nama kuasa
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input type="text" id="nama_kuasa" class="form-control" name="nama_kuasa" value="<?php if($kkpr){echo $kkpr->nama_kuasa;}else{echo isset($draft_data['nama_kuasa']) ? $draft_data['nama_kuasa'] : '';} ?>"value="" placeholder="Ex. Wawan Supriyadi" required="required" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="alamat_kuasa">
                                    Alamat kuasa
                                    <span class="required">*</span>
                                    <div class="form-text">Sesuai KTP</div>
                                </label>
                                <div class="col-md-10">
                                    <input type="text" id="alamat_kuasa" name="alamat_kuasa" value="<?php if($kkpr){echo $kkpr->alamat_kuasa;}else{echo isset($draft_data['alamat_pemohon']) ? $draft_data['alamat_pemohon'] : '';} ?>" class="form-control " placeholder="Ex. Jl.Kebon Raya blok 3A No.01" required="required">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rt_kuasa" class="col-md-2 col-form-label">RT
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" id="rt_kuasa" name="rt_kuasa" value="<?php if($kkpr){echo $kkpr->rt_kuasa;}else{echo isset($draft_data['rt_kuasa']) ? $draft_data['rt_kuasa'] : '';} ?>" inputmode="numeric" placeholder="Ex. 001" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rw_kuasa" class="col-md-2 col-form-label">RW
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" id="rw_kuasa" name="rw_kuasa" value="<?php if($kkpr){echo $kkpr->rw_kuasa;}else{echo isset($draft_data['rw_kuasa']) ? $draft_data['rw_kuasa'] : '';} ?>" inputmode="numeric" placeholder="Ex. 001" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="provinsi_kuasa" class="col-md-2 col-form-label">Provinsi
                                    <span class="required">*</span></label>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <select name="provinsi_kuasa" id="provinsi_kuasa" class="form-select" required>
                                            <option value="Pilih Provinsi" disabled selected>
                                                Pilih Provinsi</option>
                                                <?php foreach ($provinsi as $k) { ?>
                                                    <option value="<?= $k->prov_id ?>"><?= $k->prov_name ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kota_kuasa" class="col-md-2 col-form-label">
                                    Kota / Kabupaten
                                    <span class="required">*</span></label>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <select name="kota_kuasa" id="kota_kuasa" class="form-select" required>
                                            <option value="Pilih Kota / Kabupaten" disabled selected>
                                                Pilih Kota / Kabupaten</option>                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kecamatan_kuasa" class="col-md-2 col-form-label">Kecamatan
                                    <span class="required">*</span></label>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <select name="kecamatan_kuasa" id="kecamatan_kuasa" class="form-select" required>
                                            <option value="Pilih Kecamatan" disabled selected>
                                                Pilih Kecamatan
                                            </option>                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kelurahan_kuasa" class="col-md-2 col-form-label">
                                    Desa / Kelurahan
                                    <span class="required">*</span></label>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <select name="kelurahan_kuasa" id="kelurahan_kuasa" class="form-select" required>
                                            <option value="Pilih Desa / Kelurahan" disabled selected>
                                                Pilih Desa / Kelurahan</option>                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telp_kuasa" class="col-md-2 col-form-label">
                                    No. Telp. / HP / WA
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" id="telp_kuasa" name="telp_kuasa" value="<?php if($kkpr){echo $kkpr->telp_kuasa;}else{echo isset($draft_data['telp_kuasa']) ? $draft_data['telp_kuasa'] : '';} ?>" inputmode="numeric" placeholder="Ex. 08998989809" required />
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label" for="fotokopi_ktp_kuasa">
                                    Fotokopi KTP Kuasa
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input type="file" id="fotokopi_ktp_kuasa" name="fotokopi_ktp_kuasa" class="form-control" accept=".jpg, .pdf" required>
                                    <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                    </div>
                                </div>
                            </div>
                            <p>NB: Jika ada icon ini (<span class="required">*</span>) maka Wajib Diisi!</p>
                        </div>

                        <input type="button" name="next" class="next action-button btn btn-primary mb-5 me-5" value="Next" style="float: right;" />
                        <input type="button" name="previous" class="previous action-button-previous btn btn-secondary mb-5 me-2" value="Previous" style="float: right;" />
                    </fieldset>

                    <!-- Data Usaha -->
                    <fieldset>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label" for="nib">
                                    Nomor Induk Berusaha (NIB)
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input type="text" id="nib" class="form-control" required="required" data-validate-length-range="6" name="nib" value="<?php if($kkpr){echo $kkpr->nib;}else{echo isset($draft_data['nib']) ? $draft_data['nib'] : '';} ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label" for="file_nib">
                                    File Nomor Induk Berusaha (NIB)
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input type="file" id="tdp_nib" name="tdp_nib" class="form-control " accept=".jpg, .pdf" required>
                                    <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label" for="skala_usaha">
                                    Skala Usaha
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <select name="skala_usaha" id="skala_usaha" class="form-select form-control" required>
                                        <option value="Pilih skala usaha" selected disabled>
                                            Pilih skala usaha </option>
                                            <?php
                                            $kategori_skala = $this->db->query("SELECT * FROM pilihan WHERE nama_pilihan = 'skala_usaha_kkpr'")->row();
                                            $isi_skala = json_decode($kategori_skala->pilihan);
                                            foreach ($isi_skala as $i) {
                                            ?>
                                                <option value="<?= $i->skala ?>"> <?= $i->skala ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label" for="klasifikasi_risiko">
                                    Klasifikasi risiko
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <select name="klasifikasi_resiko" id="klasifikasi_resiko" class="form-select form-control" required>
                                        <option value="Pilih klasifikasi risiko" selected disabled>
                                            Pilih klasifikasi risiko</option>
                                            <?php
                                            $kategori_resiko = $this->db->query("SELECT * FROM pilihan WHERE nama_pilihan = 'klasifikasi_resiko_kkpr'")->row();
                                            $isi_resiko = json_decode($kategori_resiko->pilihan);
                                            foreach ($isi_resiko as $i) {
                                            ?>
                                                <option value="<?= $i->resiko ?>"> <?= $i->resiko ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="row mb-3">
                                                    <label for="jumlah_kbli" class="col-md-2 col-form-label">Jumlah Surat KBLI dimohon<span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <input id="jumlah_kbli" class="form-control col" type="number" value="0" min="0" max="100" name="jumlah_kbli" required>
                                                    </div>
                                                </div> -->
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label" for="judul_nib">
                                    Judul KBLI
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input type="text" id="judul_kbli" name="judul_kbli" class="form-control" required="required" value="<?php if($kkpr){echo $kkpr->judul_kbli;}else{echo isset($draft_data['judul_kbli']) ? $draft_data['judul_kbli'] : '';} ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label" for="kbli">Kode KBLI diMohon
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-2" name="kbli_array[]" required />
                                    <div id="additionalInputs"></div>
                                    <div class="" style="float: right;">
                                        <button type="button" id="addInput" class="btn btn-outline-secondary btn-sm">Tambah</button>
                                        <button type="button" id="removeInput" class="btn btn-outline-secondary btn-sm">Kurang</button>
                                    </div>
                                </div>
                            </div>

                            <div id="kbli_container"></div>
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label" for="dokumen_oss">
                                    Dokumen yang diunduh pada OSS
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-10">
                                    <input type="file" id="dokumen_oss" name="dokumen_oss" class="form-control " accept=".jpg, .pdf" required>
                                    <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                    </div>
                                </div>
                            </div>
                            <?php if ($badan_hukum == '1') { ?>
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label" for="npwp">
                                    Fotokopi Nomor Pokok Wajib Pajak (NPWP)
                                    <span class="required">*</span>
                                    <div class="form-text">
                                        Jika berbadan hukum, dan wajib untuk permohonan
                                        Perumahan dengan luas di atas 5.000 m2</div>
                                </label>
                                <div class="col-md-10">
                                    <input type="file" id="npwp" name="npwp" class="form-control " accept=".jpg, .pdf" required>
                                    <div class="form-text">
                                        File yang diterima hanya .jpg dan .pdf
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <p>NB: Jika ada icon ini (<span class="required">*</span>) maka Wajib Diisi!</p>
                        </div>

                        <input type="button" name="next" class="next action-button btn btn-primary mb-5 me-5" value="Next" style="float: right;" />
                        <input type="button" name="previous" class="previous action-button-previous btn btn-secondary mb-5 me-2" value="Previous" style="float: right;" />
                    </fieldset>

                    <!-- Data Tanah -->
                    <fieldset>
                        <div class="card-body">
                            <!-- <div class="row mb-3">
                                <label class="col-md-3 col-form-label" for="status_tanah_sm">
                                    Status Tanah
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <select name="status_tanah_sm" id="status_tanah_sm" class="form-select form-control mb-2">
                                        <option value="Pilih status tanah" selected disabled>
                                            Pilih status tanah</option>
                                            <option value="sewa" <?php //if($draft_data['status_tanah_sm'] ) {if ($draft_data['status_tanah_sm']  == 'sewa') {echo 'selected';} }?>>Sewa</option>
                                            <option value="milik_sendiri" <?php //if($draft_data['status_tanah_sm'] ) {if ($draft_data['status_tanah_sm']  == 'milik_sendiri') {echo 'selected';} }?>>Milik Sendiri</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label" for="peruntukan_tanah">Peruntukan dimohon
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input id="peruntukan_tanah" class="form-control" required="required" type="text" name="peruntukan_tanah" value="<?php if($kkpr){echo $kkpr->peruntukan_tanah;}else{echo isset($draft_data['peruntukan_tanah']) ? $draft_data['peruntukan_tanah'] : '';} ?>" placeholder="Ex. Gudang Kosmetik">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label" for="luas_tanah">
                                    Luas Tanah (m2)
                                    <span class="required">*</span>
                                    <div class="form-text">
                                        Luas tanah menggunakan m2, inputkan angka saja
                                    </div>
                                </label>
                                <div class="col-md-9">
                                    <input id="luas_tanah" value="<?php if($kkpr){echo $kkpr->luas_tanah;}else{echo isset($draft_data['luas_tanah']) ? $draft_data['luas_tanah'] : '';} ?>" class="date-picker form-control" required="required" type="number" name="luas_tanah" placeholder="Ex. 500">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label" for="perluasan">
                                    Tipe Pengajuan
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <select name="perluasan" id="perluasan" class="form-select form-control mb-2">
                                        <option value="Pilih tipe pengajuan" selected disabled>
                                            Pilih tipe pengajuan</option>
                                            <?php
                                            $kategori_perluasan = $this->db->query("SELECT * FROM pilihan WHERE nama_pilihan = 'perluasan_kkpr'")->row();
                                            $isi_perluasan = json_decode($kategori_perluasan->pilihan);
                                            foreach ($isi_perluasan as $i) {
                                            ?>
                                                <option value="<?= $i->perluasan ?>"> <?= $i->perluasan ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label" for="st_1"  id="suratTanah-label">Surat Tanah
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <select name="st_1" id="id_st_1" class="form-select form-control mb-2">
                                        <option value="Pilih surat tanah" selected disabled>
                                            Pilih surat tanah</option>
                                        <option value="atas_nama_sendiri">Atas Nama Sendiri</option>
                                        <option value="atas_nama_orang_lain">Atas Nama Orang Lain
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div id="dasar_surat_tanah" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="st_2">
                                        Dasar Surat Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <select name="st_2" id="id_st_2" class="form-select form-control mb-2">
                                            <option value="Pilih dasar surat tanah" selected disabled>
                                                Pilih dasar surat tanah</option>
                                            <option value="sertifikat">Sertifikat SHM/SHGB</option>
                                            <option value="letter">Letter C / Petok D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="file_sertifikat" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" >
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">
                                        Surat Tanah SHM/SHGB
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanah"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanah">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanah" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanah" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="file_letter" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Sura Tanah Letter C / Petok D
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahL"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahL">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahL" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahL" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="surat_peralihan" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="id_st_3">
                                        Dasar Surat Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <select name="st_3" id="id_st_3" class="form-select form-control mb-2">
                                            <option value="Pilih dasar surat tanah" selected disabled>Pilih dasar surat tanah</option>
                                            <option value="sewa_menyewa">Sewa Menyewa</option>
                                            <option value="perjanjian_kerjasama">
                                                Perjanjian Kerjasama</option>
                                            <option value="ppjb">PPJB dan Kuasa Menjual</option>
                                            <option value="ajb">AJB</option>
                                            <option value="akta_hibah">Akta Hibah</option>
                                            <option value="akta_pelepasan_hak">Akta Pelepasan Hak
                                            </option>
                                            <option value="keterangan_waris">Keterangan Waris
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="sewa_menyewa" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_surat_peralihan_sm">
                                        Surat Sewa Menyewa
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_surat_peralihan_sm" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="id_st_sewa_menyewa">
                                        Dasar Surat Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <select name="st_sewa_menyewa" id="id_st_sewa_menyewa" class="form-select form-control mb-2">
                                            <option value="Pilih dasar surat tanah" selected disabled>
                                                Pilih dasar surat tanah</option>
                                            <option value="sertifikat">Sertifikat SHM/SHGB</option>
                                            <option value="letter">Letter C / Petok D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="file_sertifikat_sewa_menyewa" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Surat Tanah SHM/SHGB
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahSM"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahSM">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahSM" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahSM" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="file_letter_sewa_menyewa" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Surat Tanah Letter C / Petok D
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_peta_bidang">
                                        Peta Bidang
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahLSM"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahLSM">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahLSM" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahLSM" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="perjanjian_kerjasama" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_surat_peralihan_pk"> Surat
                                        Perjanjian Kerjasama
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_surat_peralihan_pk" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="st_perjanjian_kerjasama">
                                        Dasar Surat Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <select name="st_perjanjian_kerjasama" id="id_st_perjanjian_kerjasama" class="form-select form-control mb-2">
                                            <option value="Pilih dasar surat tanah" selected disabled>Pilih dasar surat tanah</option>
                                            <option value="sertifikat">Sertifikat SHM/SHGB</option>
                                            <option value="letter">Letter C / Petok D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="file_sertifikat_perjanjian_kerjasama" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Surat Tanah SHM/SHGB
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahPK"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahPK">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahPK" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahPK" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="file_letter_perjanjian_kerjasama" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Surat Tanah Letter C / Petok D
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_peta_bidang[]">
                                        Peta Bidang
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahLPK"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahLPK">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahLPK" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahLPK" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="ppjb" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_surat_peralihan_ppjb">
                                        Surat PPJB dan Kuasa Menjual
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_surat_peralihan_ppjb" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="id_st_ppjb">
                                        Dasar Surat Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <select name="st_ppjb" id="id_st_ppjb" class="form-select form-control mb-2">
                                            <option value="Pilih dasar surat tanah" selected disabled>Pilih dasar surat tanah</option>
                                            <option value="sertifikat">Sertifikat SHM/SHGB</option>
                                            <option value="letter">Letter C / Petok D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="file_sertifikat_ppjb" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Surat Tanah SHM/SHGB
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-tex">File yang diterima hanya .jpg dan .pdf
                                        </div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahPPJB"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahPPJB">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahPPJB" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahPPJB" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="file_letter_ppjb" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Surat Tanah Letter C / Petok D
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_peta_bidang[]">
                                        Peta Bidang
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahLPPJB"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahLPPJB">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahLPPJB" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahLPPJB" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="ajb" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_surat_peralihan_ajb">
                                        Surat AJB
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_surat_peralihan_ajb" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="id_st_ajb">
                                        Dasar Surat Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <select name="st_ajb" id="id_st_ajb" class="form-select form-control mb-2">
                                            <option value="Pilih dasar surat tanah" selected disabled>Pilih dasar surat tanah</option>
                                            <option value="sertifikat">Sertifikat SHM/SHGB</option>
                                            <option value="letter">Letter C / Petok D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="file_sertifikat_ajb" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Surat Tanah SHM/SHGB
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahAJB"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahAJB">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahAJB" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahAJB" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="file_letter_ajb" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Surat Tanah Letter C / Petok D
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_peta_bidang[]">
                                        Peta Bidang
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahLAJB"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahAJB">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahLAJB" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahLAJB" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="akta_hibah" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_surat_peralihan_ah">
                                        Surat Akta Hibah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_surat_peralihan_ah" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="id_st_akta_hibah">
                                        Dasar Surat Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <select name="st_akta_hibah" id="id_st_akta_hibah" class="form-select form-control mb-2">
                                            <option value="Pilih dasar surat tanah" selected disabled>Pilih dasar surat tanah</option>
                                            <option value="sertifikat">Sertifikat SHM/SHGB</option>
                                            <option value="letter">Letter C / Petok D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="file_sertifikat_akta_hibah" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]"> Surat
                                        Tanah SHM/SHGB
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahAH"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahAH">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahAH" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahAH" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="file_letter_akta_hibah" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Surat Tanah Letter C / Petok D
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_peta_bidang[]">
                                        Peta Bidang
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahLAH"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahLAH">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahLAH" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahLAH" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="akta_pelepasan_hak" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_surat_peralihan_aph">Surat Akta Pelepasan Hak<span class=" required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_surat_peralihan_aph" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="id_st_akta_pelepasan_hak">
                                        Dasar Surat Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <select name="st_akta_pelepasan_hak" id="id_st_akta_pelepasan_hak" class="form-select form-control mb-2" >
                                            <option value="Pilih dasar surat tanah" selected disabled>Pilih dasar surat tanah</option>
                                            <option value="sertifikat">Sertifikat SHM/SHGB</option>
                                            <option value="letter">Letter C / Petok D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="file_sertifikat_akta_pelepasan_hak" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Surat Tanah SHM/SHGB
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf" >
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahAPH"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahAPH">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahAPH" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahAPH" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="file_letter_akta_pelepasan_hak" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Surat Tanah Letter C / Petok D
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf" >
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_peta_bidang[]">
                                        Peta Bidang
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf" >
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahLAPH"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahLAPH">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahLAPH" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahLAPH" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="keterangan_waris" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_surat_peralihan_kw">
                                        Surat Keterangan Waris
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_surat_peralihan_kw" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="id_st_keterangan_waris">
                                        Dasar Surat Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <select name="st_keterangan_waris" id="id_st_keterangan_waris" class="form-select form-control mb-2">
                                            <option value="Pilih dasar surat tanah" selected disabled>Pilih dasar surat tanah</option>
                                            <option value="sertifikat">Sertifikat SHM/SHGB</option>
                                            <option value="letter">Letter C / Petok D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="file_sertifikat_keterangan_waris" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Surat Tanah SHM/SHGB
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahKW"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahKW">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahKW" class="btn btn-outline-secondary btn-sm">
                                                Tambah Surat Tanah</button>
                                            <button type="button" id="removeInputtanahKW" class="btn btn-outline-secondary btn-sm">
                                                Kurang Surat Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="file_letter_keterangan_waris" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for=".status_tanah_array[]">
                                        Status Tanah
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control mb-2" name="status_tanah_array[]" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_status_tanah[]">
                                        Surat Tanah Letter C / Petok D
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_status_tanah[]" class="form-control " accept=".jpg, .pdf" >
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="file_peta_bidang">
                                        Peta
                                        Bidang
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf" >
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div id="additionalInputstanahLKW"></div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="addInputtanahLKW">
                                    </label>
                                    <div class="col-md-9">
                                        <div class="" style="float: right;">
                                            <button type="button" id="addInputtanahLKW" class="btn btn-outline-secondary btn-sm">Tambah
                                                Surat
                                                Tanah</button>
                                            <button type="button" id="removeInputtanahLKW" class="btn btn-outline-secondary btn-sm">Kurang
                                                Surat
                                                Tanah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="status_tanah_container"></div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label" for="pemilik_lahan_meninggal">
                                    Apakah ada surat ahli waris?
                                    <div class="form-text">
                                        Pilih 'Ya' jika pemilik lahan sudah meninggal
                                    </div>
                                </label>
                                <div class="col-md-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="1" name="pemilik_lahan_meninggal" id="pemilik_lahan_meninggal_y" />
                                        <label class="form-check-label" for="pemilik_lahan_meninggal_y">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="0" name="pemilik_lahan_meninggal" id="pemilik_lahan_meninggal_t" />
                                        <label class="form-check-label" for="pemilik_lahan_meninggal_t">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div id="lahan_meninggal" style="display: none;">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="surat_kematian">
                                        Surat Kematian
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" id="alamat-pemohon" name="surat_kematian" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="surat_kuasa_ahli_waris">
                                        Surat Kuasa dari semua ahli waris
                                        <span class="required">*</span>
                                        <div class="form-text">(jika ahli waris lebih dari 1)</div>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" id="surat_kuasa_ahli_waris" name="surat_kuasa_ahli_waris" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan
                                            .pdf</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label" for="lokasi_tanah">Lokasi
                                    Dimohon
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" id="lokasi_tanah" value="<?php if ($kkpr) {
                                                                                    echo $kkpr->lokasi_tanah;
                                                                                } else {
                                                                                    echo isset($draft_data['lokasi_tanah']) ? $draft_data['lokasi_tanah'] : '';
                                                                                } ?>" name="lokasi_tanah" required="required" class="form-control" placeholder="Ex. Jl.Kebon Raya blok 3A No.01">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="middle-name" class="col-md-3 col-form-label">
                                    RT
                                    <!-- <span class="required">*</span> -->
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control col" type="number" placeholder="Ex. 001" min="1" max="20" name="rt_tanah" id="rt_tanah" value="<?php if ($kkpr) {
                                                                                                                                                                    echo $kkpr->rt_tanah;
                                                                                                                                                                } else {
                                                                                                                                                                    echo isset($draft_data['rt_tanah']) ? $draft_data['rt_tanah'] : '';
                                                                                                                                                                } ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="middle-name" class="col-md-3 col-form-label">
                                    RW
                                    <!-- <span class="required">*</span> -->
                                </label>
                                <div class="col-md-9">
                                    <input class="form-control col" type="number" placeholder="Ex. 001" min="1" max="20" name="rw_tanah" id="rw_tanah" value="<?php if ($kkpr) {
                                                                                                                                                                    echo $kkpr->rw_tanah;
                                                                                                                                                                } else {
                                                                                                                                                                    echo isset($draft_data['rw_tanah']) ? $draft_data['rw_tanah'] : '';
                                                                                                                                                                } ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label">Kota /
                                    Kabupaten <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <select name="kota_tanah" id="kota_tanah" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kota" disabled>
                                        <option value="Pilih Kota" disabled>Pilih Kota</option>
                                        <option value="1">Kota Malang</option>
                                        <option value="2" selected>Kab Malang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label">Kecamatan
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-9">
                                    <select name="kecamatan_tanah" id="kecamatan_tanah" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kecamatan">
                                        <option value="Pilih Kecamatan" selected disabled>Pilih
                                            Kecamatan</option>
                                        <?php foreach ($kecamatan as $k) { ?>
                                            <option value="<?= $k->id_kecamatan ?>">
                                                <?= $k->nama_kecamatan ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="middle-name" class="col-md-3 col-form-label">
                                    Desa / Kelurahan
                                    <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <select name="kelurahan_tanah" id="kelurahan_tanah" class="form-select form-control mb-2" data-control="select2" data-placeholder="Pilih Kelurahan">
                                        <option value="Pilih Desa / Kelurahan" selected disabled>
                                            Pilih Desa / Kelurahan</option>
                                    </select>
                                </div>
                            </div>
                            <?php if ($pengajuan == 'perumahan') { ?>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="peta_bidang">
                                        Peta Bidang
                                        <span class="required">*</span>
                                        <div class="form-text">
                                            Jika Luas tanah diatas 5000m2 maka harus sudah atas nama
                                            Pemohon (bertindak atas nama badan hukum), dan dilegalisir
                                            oleh BPN / Notaris
                                        </div>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" id="alamat-pemohon" name="peta_bidang" class="form-control " accept=".jpg, .pdf" >
                                        <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($pengajuan == 'perumahan') { ?>
                            <?php } else { ?>
                                <?php if ($pengajuan == 'tower') { ?>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="peta_bidang_tower">
                                            Peta Bidang (dari BPN)
                                            <div class="form-text">
                                                Untuk Tower boleh tanpa peta bidang (jika belum
                                                bersertifikat) dan dilegalisir oleh BPN /
                                                Notaris.
                                            </div>
                                            <!-- <span class="required">*</span> -->
                                        </label>
                                        <div class="col-md-9">
                                            <input type="file" id="alamat-pemohon" name="peta_bidang_tower" class="form-control " accept=".jpg, .pdf">
                                            <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="peta_bidang">
                                            Peta Bidang (dari BPN)
                                            <span class="required">*</span>
                                            <div class="form-text">
                                                (jika belum bersertifikat) dan dilegalisir oleh BPN /
                                                Notaris.
                                            </div>
                                        </label>
                                        <div class="col-md-9">
                                            <input type="file" id="peta_bidang" name="peta_bidang" class="form-control " accept=".jpg, .pdf">
                                            <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label" for="shp" id="shp-label">
                                    SHP File
                                    <span class="required">*</span>
                                    <div class="form-text">File berbentuk zip yang sudah di download
                                    </div>
                                    <small><a href="<?php echo base_url('Map/polygon_new'); ?>" target="_blank">Polygon Map</a></small>
                                </label>
                                <div class="col-md-9">
                                    <input type="file" id="shp" name="shp" class="form-control" accept=".zip">
                                    <div class="form-text">File yang diterima hanya .zip</div>
                                </div>
                            </div>
                            <?php if ($pemilik_lahan_meninggal == '1') { ?>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="surat_kematian">
                                        Surat Kematian
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" id="surat_kematian" name="surat_kematian" class="form-control">
                                        <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="surat_kuasa_ahli_waris">
                                        Surat Kuasa dari semua ahli waris
                                        <span class="required">*</span>
                                        <div class="form-text">(jika ahli waris lebih dari 1)</div>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" id="alamat-pemohon" name="surat_kuasa_ahli_waris" class="form-control">
                                        <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($pengajuan == 'tower') { ?>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="rekomendasi_dinas_komunikasi">
                                        Surat Rekomendasi dari Dinas Komunikasi dan Informatika
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="rekomendasi_dinas_komunikasi" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="rekomendasi_tni">
                                        Surat Rekomendasi dari Komando Operasi TNI Angkatan Udara II
                                        Pangkalan TNI AU Abdulrachman Saleh
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="rekomendasi_tni" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">
                                            (untuk lokasi pengajuan di Kec. Pakis, Kec. Jabung dan
                                            Kec. Singosari). File yang diterima hanya .jpg dan .pdf
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($pengajuan == 'minimarket') { ?>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="surat_dinas_perdagangan">
                                        Surat rekomendasi dinas perdagangan dan perindustrian
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="surat_dinas_perdagangan" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($pengajuan == 'peternakan') { ?>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="surat_dinas_peternakan">
                                        Surat rekomendasi dinas peternakan dan kesehatan hewan
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="surat_dinas_peternakan" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($pengajuan == 'spbu') { ?>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="surat_pertamina">
                                        Surat Rekomendasi dari PT. Pertamina (Persero) Marketing
                                        Operation Region (MOR) V
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="surat_pertamina" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($pengajuan == 'tempat_ibadah') { ?>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="daftar_nama_kk">
                                        Daftar nama dan fotokopi Kartu Tanda Penduduk (KTP)
                                        <span class="required">*</span>
                                        <div class="form-text">Paling sedikit 90 orang dan daftar
                                            dukungan masyarakat
                                            sekitar paling sedikit 60 orang.</div>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="daftar_nama_kk" class="form-control " accept=".pdf">
                                        <div class="form-text">File yang diterima hanya .pdf</div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="surat_fkub">
                                        Surat dari Forum Komunikasi Umat Beragama (FKUB)
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="file" name="surat_fkub" class="form-control " accept=".jpg, .pdf">
                                        <div class="form-text">File yang diterima hanya .jpg dan .pdf
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <p>NB: Jika ada icon ini (<span class="required">*</span>) maka Wajib Diisi!</p>
                        </div>
                        <input type="button" name="next" class="submit action-button btn btn-primary mb-5 me-5" value="Submit" style="float: right;" />
                        <!-- <button type="submit" class="submit action-button btn btn-primary mb-5 me-5">SUBMIT</button> -->
                        <input type="button" name="previous" class="previous action-button-previous btn btn-secondary mb-5 me-2" value="Previous" style="float: right;" />
                    </fieldset>

                </form>

            </div>
        </div>
    </div>

</div>
<!-- Toast Surat Tanah -->
<div class="bs-toast toast bg-primary position-fixed top-0 end-0 m-3" id="suratTanah-toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header border-bottom mb-3">
            <i class="bx bx-info-circle me-2 fs-4"></i>
            <div class="me-auto fs-4">Informasi Surat Tanah</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Contoh Surat Tanah : <br>
            <img src="<?php echo base_url('assets/');?>assets/img/contoh-sertifikat-tanah.jpg" draggable="false" class="mt-3" style="width: 310px;">
        </div>
    </div>

    <!-- Toast SHP -->
    <div class="bs-toast toast bg-primary position-fixed top-0 end-0 m-3" id="shp-toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header border-bottom mb-3">
            <i class="bx bx-info-circle me-2 fs-4"></i>
            <div class="me-auto fs-4">Informasi File SHP</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <img src="<?php echo base_url('assets/');?>assets/img/zip.jpg" class="mb-3 rounded" draggable="false" style="width: 300px;">
            File SHP berbentuk zip yang sudah di download. <br>
            <button class="btn btn-light mt-3"><small><a href="<?php echo base_url('Map/polygon_new'); ?>" target="_blank">Belum membuat Polygon Map?</a></small></button>
        </div>
    </div>
<!-- End Content -->