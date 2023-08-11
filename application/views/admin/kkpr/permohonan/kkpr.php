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
                        <a href="#" class="menu-link px-3">
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
                    <th class="text-center min-w-150px">Nama</th>                    
                    <th class="text-center min-w-200px">Alamat</th>                    
                    <th class="text-center min-w-150px">Type</th>
                    <th class="text-center min-w-70px">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
            <?php
                    $no = 1; 
                    foreach($kkpr as $i){                         
                ?>
                <?php
                    $kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$i->kelurahan_pemohon' ")->row();
                    $kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$i->kecamatan_pemohon' ")->row();
                    $kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$i->kota_pemohon' ")->row();
                    $provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$i->provinsi_pemohon' ")->row();
                ?>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $no++ ?></span>
                        </td>                    
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->nama_pemohon?></span>
                        </td>                    
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $i->alamat_pemohon?> RT.<?= $i->rt_pemohon?> RW.<?= $i->rw_pemohon?> Kel.<?= $kelurahan->subdis_name?> - Kec.<?= $kecamatan->dis_name?> - Kota / Kab.<?= $kota->city_name?> - Prov.<?= $provinsi->prov_name?></span>
                        </td>                                                                                                         
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if($i) echo $i->kategori?></span>
                        </td>                    
                        <td class="text-center pe-0">
                            <a href="<?php echo base_url('Kkpr/detail_kkpr/');?><?= $i->id_kkpr_permohonan?>" class="btn btn-primary btn-sm">Detail</a>
                        </td>                    
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>