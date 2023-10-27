<!-- Content -->
<!-- <a href="<?php echo base_url('Kkpr/export_rekap'); ?>" class="menu-link px-3">
        Excel
    </a> -->
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / KKPR / </span> Rekap </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Laporan
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:void(0);">PDF</a></li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('Kkpr/export_rekap'); ?>">Excel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-nowrap">
                            <table class="table table-bordered row-border order-column fs-6" style="width:100%" id="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>tgl.verif berkas</th>
                                        <th>tgl.survei</th>
                                        <th>no.reg.terbit</th>
                                        <th>tgl.reg</th>
                                        <th>surveyor 1</th>
                                        <th>surveyor 2</th>
                                        <th>Nama pemohon</th>
                                        <th>Alamat pemohon</th>
                                        <th>nama perusahaan</th>
                                        <th>alamat perusahaan</th>
                                        <th>nib</th>
                                        <th>skala usaha</th>
                                        <th>klasifikasi risiko</th>
                                        <th>kbli</th>
                                        <th>peruntukan</th>
                                        <th>kategori</th>
                                        <th>(perluasan)</th>
                                        <th>lokasi usaha</th>
                                        <th>kel./desa</th>
                                        <th>kec.</th>
                                        <th>status lahan</th>
                                        <th>luas</th>
                                        <th>keadaan tanah <br> <small>(surat tanah)</small></th>
                                        <th>guna lahan awal</th>
                                        <th>guna lahan eksisting</th>
                                        <th>batas utara</th>
                                        <th>batas selatan</th>
                                        <th>batas barat</th>
                                        <th>batas timur</th>
                                        <th>kemiringan</th>
                                        <th>sarana sekitar</th>
                                        <th>batas sebelah (I)</th>
                                        <th>fungsi jalan (I)</th>
                                        <th>kelas jalan (I)</th>
                                        <th>status jalan (I)</th>
                                        <th>kondisi jalan (I)</th>
                                        <th>median (I)</th>
                                        <th>perkerasan (I)</th>
                                        <th>bahu (I)</th>
                                        <th>trotoar (I)</th>
                                        <th>saluran (I)</th>
                                        <th>ambang pengaman (I)</th>
                                        <th>jalur hijau (I)</th>
                                        <th>gsb (I)</th>
                                        <th>koordinat tengah</th>
                                        <th>no.&th.perda</th>
                                        <th>judul perda</th>
                                        <th>rencana pola ruang</th>
                                        <th>fz</th>
                                        <th>lsd</th>
                                        <th>kp2b</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kkpr as $i) {
                                    ?>
                                        <?php
                                        $peta = $this->db->query("SELECT * FROM data_sertifikat_peta WHERE id_permohonan = '$i->id_kkpr_permohonan'")->row();
                                        $lhs = $this->db->query("SELECT * FROM data_sertifikat_lhs WHERE id_permohonan = '$i->id_kkpr_permohonan'")->row();
                                        $draft = $this->db->query("SELECT * FROM data_sertifikat_draft_peta WHERE id_permohonan = '$i->id_kkpr_permohonan'")->row();
                                        $kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$i->kelurahan_tanah' ")->row();
                                        $kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$i->kecamatan_tanah' ")->row();
                                        ?>
                                        <tr>
                                            <td>
                                                <span><?= $no++ ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->tgl_verif_berkas ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->tgl_survei ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->no_reg_terbit ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->tgl_reg ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->surveyor1 ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->surveyor2 ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->nama_pemohon ?></span>
                                            </td>
                                            <td>
                                                <span><?php if ($peta) echo $peta->alamat_pemohon ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->nama_perusahaan ?></span>
                                            </td>
                                            <td>
                                                <span><?php if ($peta) echo $peta->alamat_perusahaan ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->nib ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->skala_usaha ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->klasifikasi_resiko ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->kbli ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->peruntukan_tanah ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->kategori ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->perluasan ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->lokasi_tanah ?></span>
                                            </td>
                                            <td>
                                                <span><?= $kelurahan_tanah->nama_desa ?></span>
                                            </td>
                                            <td>
                                                <span><?= $kecamatan_tanah->nama_kecamatan ?></span>
                                            </td>
                                            <td>
                                                <span>
                                                    <?php
                                                    $status_tanah = json_decode($i->status_tanah);
                                                    foreach ($status_tanah as $s) {
                                                        echo $s->status_tanah . "<br>";
                                                    }
                                                    ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span><?= $i->luas_tanah ?></span>
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <span><?php if ($lhs) echo $lhs->guna_lahan ?></span>
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <span><?php if ($lhs) echo $lhs->batas_utara ?></span>
                                            </td>
                                            <td>
                                                <span><?php if ($lhs) echo $lhs->batas_selatan ?></span>
                                            </td>
                                            <td>
                                                <span><?php if ($lhs) echo $lhs->batas_barat ?></span>
                                            </td>
                                            <td>
                                                <span><?php if ($lhs) echo $lhs->batas_timur ?></span>
                                            </td>
                                            <td>
                                                <span><?php if ($lhs) echo $lhs->kemiringan_tanah ?></span>
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <span><?php if ($peta) echo $peta->gsp_gsb ?></span>
                                            </td>
                                            <td>
                                                <span><?php if ($draft) echo $draft->titik_koordinat_tengah ?></span>
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <span><?php if ($lhs) echo $lhs->rencana_pola_ruang ?></span>
                                            </td>
                                            <td>
                                                <span><?php if ($peta) echo $peta->flexsible_zoning ?></span>
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                            <td>
                                                <!-- <span></span> -->
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- / Content -->