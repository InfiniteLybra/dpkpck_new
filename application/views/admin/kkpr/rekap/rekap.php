<div class="card card-flush">
    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Category" />
            </div>
            <!--end::Search-->
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

            <!--begin::Menu wrapper-->
            <div>
                <!--begin::Toggle-->
                <button type="button" class="btn btn-light rotate" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="30px, 30px">
                    <i class="ki-duotone ki-archive fs-3">
                        <i class="path1"></i>
                        <i class="path2"></i>
                        <i class="path3"></i>
                    </i>
                    Laporan
                    <span class="svg-icon fs-3 rotate-180 ms-3 me-0"><i class="ki-duotone ki-down fs-3 ms-1"></i></span>
                </button>
                <!--end::Toggle-->

                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">

                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="<?php echo base_url('Kkpr/export_rekap');?>" class="menu-link px-3">
                            Excel
                        </a>
                    </div>
                    <!--end::Menu item-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">
                            Pdf
                        </a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Dropdown wrapper-->
            <!-- <a href="<?= base_url(); ?>barang/add_barang" class="btn btn-primary" id="1">Add Product</a> -->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="text-center min-w-50px">No.</th>
                    <!-- <th class="text-center min-w-150px">Type</th> -->
                    <th class="text-center min-w-100px">tgl.verif berkas</th>
                    <th class="text-center min-w-100px">tgl.survei</th>
                    <th class="text-center min-w-150px">no.reg.terbit</th>
                    <th class="text-center min-w-100px">tgl.reg</th>
                    <th class="text-center min-w-150px">surveyor 1</th>
                    <th class="text-center min-w-150px">surveyor 2</th>
                    <th class="text-center min-w-200px">Nama pemohon</th>
                    <th class="text-center min-w-500px">Alamat pemohon</th>
                    <th class="text-center min-w-200px">nama perusahaan</th>
                    <th class="text-center min-w-500px">alamat perusahaan</th>
                    <th class="text-center min-w-100px">nib</th>
                    <th class="text-center min-w-100px">skala usaha</th>
                    <th class="text-center min-w-150px">klasifikasi risiko</th>
                    <th class="text-center min-w-100px">kbli</th>
                    <th class="text-center min-w-150px">peruntukan</th>
                    <th class="text-center min-w-200px">kategori</th>
                    <th class="text-center min-w-100px">(perluasan)</th>
                    <th class="text-center min-w-300px">lokasi usaha</th>
                    <th class="text-center min-w-150px">kel./desa</th>
                    <th class="text-center min-w-150px">kec.</th>
                    <th class="text-center min-w-200px">status lahan</th>
                    <th class="text-center min-w-100px">luas</th>
                    <th class="text-center min-w-150px">keadaan tanah <br> <small>(surat tanah)</small></th>
                    <th class="text-center min-w-150px">guna lahan awal</th>
                    <th class="text-center min-w-150px">guna lahan eksisting</th>
                    <th class="text-center min-w-150px">batas utara</th>
                    <th class="text-center min-w-150px">batas selatan</th>
                    <th class="text-center min-w-150px">batas barat</th>
                    <th class="text-center min-w-150px">batas timur</th>
                    <th class="text-center min-w-150px">kemiringan</th>
                    <th class="text-center min-w-150px">sarana sekitar</th>
                    <th class="text-center min-w-150px">batas sebelah (I)</th>
                    <th class="text-center min-w-150px">fungsi jalan (I)</th>
                    <th class="text-center min-w-150px">kelas jalan (I)</th>
                    <th class="text-center min-w-150px">status jalan (I)</th>
                    <th class="text-center min-w-150px">kondisi jalan (I)</th>
                    <th class="text-center min-w-150px">median (I)</th>
                    <th class="text-center min-w-150px">perkerasan (I)</th>
                    <th class="text-center min-w-150px">bahu (I)</th>
                    <th class="text-center min-w-150px">trotoar (I)</th>
                    <th class="text-center min-w-150px">saluran (I)</th>
                    <th class="text-center min-w-150px">ambang pengaman (I)</th>
                    <th class="text-center min-w-150px">jalur hijau (I)</th>
                    <th class="text-center min-w-150px">gsb (I)</th>
                    <th class="text-center min-w-150px">koordinat tengah</th>
                    <th class="text-center min-w-150px">no.&th.perda</th>
                    <th class="text-center min-w-150px">judul perda</th>
                    <th class="text-center min-w-150px">rencana pola ruang</th>
                    <th class="text-center min-w-100px">fz</th>
                    <th class="text-center min-w-100px">lsd</th>
                    <th class="text-center min-w-100px">kp2b</th>
                    <th class="text-center min-w-70px">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
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
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $no++ ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->tgl_verif_berkas?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->tgl_survei?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->no_reg_terbit?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->tgl_reg?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->surveyor1?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->surveyor2?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->nama_pemohon?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if($peta)echo $peta->alamat_pemohon?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->nama_perusahaan?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if($peta)echo $peta->alamat_perusahaan?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->nib?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->skala_usaha?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->klasifikasi_resiko?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->kbli?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->peruntukan_tanah?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->kategori?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->perluasan?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->lokasi_tanah?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kelurahan_tanah->nama_desa?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kecamatan_tanah->nama_kecamatan?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold">
                            <?php 
                                $status_tanah = json_decode($i->status_tanah);
                                foreach($status_tanah as $s){
                                    echo $s->status_tanah."<br>";
                                }
                            ?>                            
                        </span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->luas_tanah?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if($lhs)echo $lhs->guna_lahan?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if($lhs)echo $lhs->batas_utara?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if($lhs)echo $lhs->batas_selatan?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if($lhs)echo $lhs->batas_barat?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if($lhs)echo $lhs->batas_timur?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if($lhs)echo $lhs->kemiringan_tanah?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if($peta)echo $peta->gsp_gsb?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if($draft)echo $draft->titik_koordinat_tengah?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if($lhs)echo $lhs->rencana_pola_ruang?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if($peta)echo $peta->flexsible_zoning?></span>
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                        <td class="text-center pe-0">
                            <!-- <span class="fw-bold"></span> -->
                        </td>                                                
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>