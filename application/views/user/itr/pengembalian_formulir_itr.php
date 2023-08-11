<?php if ($pengembalian_itr) { ?>
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
                    <input type="text" data-kt-ecommerce-category-filter="search_1" class="form-control form-control-solid w-250px ps-12" placeholder="Search Category" />
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="table_1">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-center min-w-50px">No.</th>
                        <th class="text-center min-w-150px">Nama Pemohon</th>
                        <th class="text-center min-w-250px">Alamat</th>
                        <!-- <th class="text-center min-w-100px">Type</th> -->
                        <th class="text-center min-w-70px">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 1;
                    foreach ($pengembalian_itr as $p) {
                    ?>
                        <?php
                        $i = $this->db->query("SELECT * FROM itr_permohonan WHERE id_itr = '$p->id_permohonan'")->row();
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
                                <span class="fw-bold"><?= $i->nama_pemohon ?></span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold"><?= $i->alamat_pemohon ?> RT.<?= $i->rt_pemohon ?> RW.<?= $i->rw_pemohon ?> Kel.<?= $kelurahan->subdis_name ?> - Kec.<?= $kecamatan->dis_name ?> - Kota / Kab.<?= $kota->city_name ?> - Prov.<?= $provinsi->prov_name ?></span>
                            </td>
                            <!-- <td class="text-center pe-0">
                                <span class="fw-bold"><?= $i->type?></span>
                            </td> -->
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('Pengembalian_formulir_itr/detail_formulir_itr/'); ?><?= $i->id_itr ?>" class="btn btn-primary btn-sm">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
<?php } ?>
<br>
<?php if ($pengembalian_kkpr) { ?>
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
                    <input type="text" data-kt-ecommerce-category-filter="search_2" class="form-control form-control-solid w-250px ps-12" placeholder="Search Category" />
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="table_2">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-center min-w-50px">No.</th>
                        <th class="text-center min-w-150px">Nama Pemohon</th>
                        <th class="text-center min-w-250px">Alamat</th>
                        <th class="text-center min-w-100px">Type</th>
                        <th class="text-center min-w-70px">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 1;
                    foreach ($pengembalian_kkpr as $p) {
                    ?>
                        <?php
                        $k = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$p->id_permohonan'")->row();
                        $kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$k->kelurahan_pemohon' ")->row();
                        $kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$k->kecamatan_pemohon' ")->row();
                        $kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$k->kota_pemohon' ")->row();
                        $provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$k->provinsi_pemohon' ")->row();
                        ?>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold"><?= $no++ ?></span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold"><?= $k->nama_pemohon ?></span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold"><?= $k->alamat_pemohon ?> RT.<?= $k->rt_pemohon ?> RW.<?= $k->rw_pemohon ?> Kel.<?= $kelurahan->subdis_name ?> - Kec.<?= $kecamatan->dis_name ?> - Kota / Kab.<?= $kota->city_name ?> - Prov.<?= $provinsi->prov_name ?></span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold"><?= $k->type?></span>
                            </td>
                            <td class="text-center pe-0">
                                <a href="<?php echo base_url('Pengembalian_formulir_itr/detail_formulir_kkpr/'); ?><?= $k->id_kkpr_permohonan ?>" class="btn btn-primary btn-sm">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
<?php } ?>