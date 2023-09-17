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
            <!-- <div class="row">
                <div class="col">
                    <a href="<?= base_url(); ?>legenda/tambah" class="btn btn-primary">Tambah Data Legenda</a>
                </div>
            </div> -->
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

            <!--begin::Menu wrapper-->
            <div>
                <!--begin::Toggle-->
                <a href="<?= base_url(); ?>legenda/tambah" class="btn btn-primary">Tambah Data Legenda</a>
                <!--end::Toggle-->

                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">

                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="<?php echo base_url('Kkpr/export_monitoring_excel'); ?>" class="menu-link px-3">
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
        <!-- begin::Table -->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="text-center min-w-50px">Id Legenda</th>
                    <th class="text-center min-w-150px">Type</th>
                    <th class="text-center min-w-150px">Legenda</th>
                    <th class="text-center min-w-150px">Foto</th>
                    <!-- <th class="text-center min-w-100px">Type</th> -->
                    <th class="text-center min-w-70px">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $no = 1;
                foreach ($legenda as $legend) {
                ?>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $legend['id_legenda']; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $legend['type']; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $legend['legenda']; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><img src="<?php echo base_url('assets/legenda/'); ?><?= $legend['foto'] ?>"></span>
                        <td class="text-center pe-0">
                            <a href="<?= base_url(); ?>legenda/ubah/<?= $legend['id_legenda']; ?>" class="btn btn-primary btn-sm">Ubah</a>
                            <a href="<?= base_url(); ?>legenda/hapus/<?= $legend['id_legenda']; ?>" class="btn btn-primary btn-sm" onclick="return confirm('yakin?');">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
