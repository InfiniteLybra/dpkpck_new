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
                    <th class="text-center min-w-100px">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $no = 1;
                foreach ($data as $d) {
                ?>
                    <?php
                    $kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$d->kelurahan_pemohon' ")->row();
                    $kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$d->kecamatan_pemohon' ")->row();
                    $kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$d->kota_pemohon' ")->row();
                    $provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$d->provinsi_pemohon' ")->row();
                    ?>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $no++ ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $d->nama_pemohon ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $d->alamat_pemohon ?> RT.<?= $d->rt_pemohon ?> RW.<?= $d->rw_pemohon ?> Kel.<?= $kelurahan->subdis_name ?> - Kec.<?= $kecamatan->dis_name ?> - Kota / Kab.<?= $kota->city_name ?> - Prov.<?= $provinsi->prov_name ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?php if ($d) echo $d->kategori ?></span>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="<?php echo base_url('Kkpr/detail_config_peta/'); ?><?= $d->id_kkpr_permohonan ?>" class="menu-link px-3">Peta</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="<?php echo base_url('Kkpr/detail_config_draft/'); ?><?= $d->id_kkpr_permohonan ?>" class="menu-link px-3">Draft Peta</a>
                                </div>
                                <!--end::Menu item-->                               
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="<?php echo base_url('Kkpr/detail_config_lhs/'); ?><?= $d->id_kkpr_permohonan ?>" class="menu-link px-3">LHS</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>