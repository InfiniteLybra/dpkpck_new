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
                <input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search..." />
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
                    <th class="text-center min-w-100px">No. HP</th>
                    <th class="text-center min-w-100px">Waktu</th>
                    <th class="text-center min-w-150px">Type</th>
                    <th class="text-center min-w-70px">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $no = 1;
                foreach ($kkpr as $i) {
                ?>
                    <?php
                    $kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$i->kelurahan_pemohon' ")->row();
                    $kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$i->kecamatan_pemohon' ")->row();
                    $kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$i->kota_pemohon' ")->row();
                    $provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$i->provinsi_pemohon' ")->row();

                    $date = date('y-m-d');
                    $date_i = $i->tgl_tolak;
                    $date_istr = date('Y-m-d', strtotime($date_i));
                    $selisih = strtotime($date) - strtotime($date_istr);
                    $selisih_hari = floor($selisih / (60 * 60 * 24));
                    if ($selisih_hari >= 7 or $selisih_hari >= 3) {
                    ?>
                        <tr>
                            <td class="text-center pe-0">
                                <span class="fw-bold"><?= $no++ ?></span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold"><?= $i->nama_pemohon ?></span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold"><?= $i->telp_pemohon ?></span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold"><?= $selisih_hari ?> Hari</span>
                            </td>
                            <td class="text-center pe-0">
                                <span class="fw-bold"><?php if ($i) echo $i->kategori ?></span>
                            </td>
                            <td class="text-center pe-0">
                                <?php if ($i->status_berkas == 98) { ?>

                                <?php } else { ?>
                                    <?php if ($selisih_hari <= 6) { ?>
                                        <a href="<?php echo base_url('Kkpr/proses_tolak_notif/' . $i->id_kkpr_permohonan . '/' . 'wa'); ?>" class="btn btn-success btn-sm">Kirim Notif WA</a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('Kkpr/proses_tolak_notif/' . $i->id_kkpr_permohonan . '/' . 'tlkwa'); ?>" class="btn btn-success btn-sm">Tolak & Kirim Notif WA</a>
                                <?php }
                                } ?>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>