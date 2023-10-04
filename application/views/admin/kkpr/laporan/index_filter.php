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
            <form method="get" action="<?php echo base_url('Kkpr/filterDataByYear'); ?>">
                <div class="container">
                    <select class="btn btn-light" name="tahun" id="tahun">
                        <option value="" hidden disabled selected>Pilih Tahun</option> <!-- Placeholder -->
                        <option value="all">Semua Data</option>
                        <?php
                        $tahunSaatIni = date('Y');
                        for ($i = 2020; $i < $tahunSaatIni + 5; $i++) {
                        ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                        <!-- Opsi untuk kembali ke default -->
                    </select>
                    <!-- <button class="btn btn-primary" type="submit">Tampilkan Data</button> -->
                </div>
            </form>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Memeriksa apakah ada nilai yang dipilih yang tersimpan di sessionStorage
                    var selectedYear = sessionStorage.getItem('selectedYear');

                    // Menangani perubahan nilai pada elemen <select>
                    var tahunSelect = document.getElementById('tahun');
                    tahunSelect.addEventListener('change', function() {
                        // Menyimpan nilai yang dipilih ke dalam sessionStorage
                        if (this.value === 'all') {
                            window.location.href = "<?php echo base_url('Kkpr/getAllKkpr'); ?>";
                        } else {
                            sessionStorage.setItem('selectedYear', this.value);
                            window.location.href = "<?php echo base_url('Kkpr/filterDataByYear'); ?>?tahun=" + this.value;
                        }
                    });

                    // Set placeholder jika tidak ada tahun yang dipilih sebelumnya
                    if (!selectedYear) {
                        tahunSelect.value = '';
                    }
                });
            </script>


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
                        <?php
                        $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : null;
                        $url = base_url('Kkpr/export_laporan_berkas') . '?tahun=' . htmlspecialchars($tahun); // Sanitize input
                        ?>
                        <a href="<?php echo $url; ?>" class="menu-link px-3">
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
                    <th class="text-center min-w-50px">Id Kkpr Permohonan</th>
                    <th class="text-center min-w-150px">Id User</th>
                    <th class="text-center min-w-150px">Tgl Veriv Berkas</th>
                    <th class="text-center min-w-150px">Tgl Survei</th>
                    <th class="text-center min-w-150px">No. Reg Terbit</th>
                    <th class="text-center min-w-150px">Tanggal Reg</th>
                    <th class="text-center min-w-150px">Surveyor 1</th>
                    <th class="text-center min-w-150px">Surveyor 2</th>
                    <th class="text-center min-w-150px">Type</th>
                    <th class="text-center min-w-150px">Nama Pemohon</th>
                    <th class="text-center min-w-150px">Alamat Pemohon</th>
                    <th class="text-center min-w-150px">Rt Pemohon</th>
                    <th class="text-center min-w-150px">Rw Pemohon</th>
                    <th class="text-center min-w-150px">Provinsi Pemohon</th>
                    <th class="text-center min-w-150px">Kota Pemohon</th>
                    <th class="text-center min-w-150px">Kecamatan Pemohon</th>
                    <th class="text-center min-w-150px">Kelurahan Pemohon</th>
                    <th class="text-center min-w-150px">Telp Pemohon</th>
                    <th class="text-center min-w-150px">Nama Perusahaan</th>
                    <th class="text-center min-w-150px">NIB</th>
                    <th class="text-center min-w-150px">Skala Usaha</th>
                    <th class="text-center min-w-150px">Klasifikasi Resiko</th>
                    <th class="text-center min-w-150px">KBLI</th>
                    <th class="text-center min-w-150px">Alamat Perusahaan</th>
                    <th class="text-center min-w-150px">RT Perusahaan</th>
                    <th class="text-center min-w-150px">RW Perusahaan</th>
                    <th class="text-center min-w-150px">Provinsi Perusahaan</th>
                    <th class="text-center min-w-150px">Kota Perusahaan</th>
                    <th class="text-center min-w-150px">Kecamatan Perusahaan</th>
                    <th class="text-center min-w-150px">Kelurahan Perusahaan</th>
                    <th class="text-center min-w-150px">Peruntukan Tanah</th>
                    <th class="text-center min-w-150px">Luas Tanah</th>
                    <th class="text-center min-w-150px">Kategori</th>
                    <th class="text-center min-w-150px">Perluasan</th>
                    <th class="text-center min-w-800px">Status Tanah</th>
                    <th class="text-center min-w-150px">Lokasi Tanah</th>
                    <th class="text-center min-w-150px">RT Tanah</th>
                    <th class="text-center min-w-150px">RW Tanah</th>
                    <th class="text-center min-w-150px">Kota Tanah</th>
                    <th class="text-center min-w-150px">Kecamatan Tanah</th>
                    <th class="text-center min-w-150px">Kelurahan Tanah</th>
                    <th class="text-center min-w-150px">Dokumen Oss</th>
                    <th class="text-center min-w-150px">Fotokopi KTP</th>
                    <th class="text-center min-w-150px">Akta Perusahaan</th>
                    <th class="text-center min-w-150px">SIUP</th>
                    <th class="text-center min-w-150px">TDP</th>
                    <th class="text-center min-w-150px">NPWP</th>
                    <th class="text-center min-w-150px">Surat Tanah</th>
                    <th class="text-center min-w-150px">Peta Bidang</th>
                    <th class="text-center min-w-150px">Teknis Pertanahan</th>
                    <th class="text-center min-w-150px">Surat Kematian</th>
                    <th class="text-center min-w-150px">Surat Kuasa Ahli Waris</th>
                    <th class="text-center min-w-150px">Surat Dinas Komunikasi</th>
                    <th class="text-center min-w-150px">Surat Rekom TNI</th>
                    <th class="text-center min-w-150px">Surat Dinas Perdagangan</th>
                    <th class="text-center min-w-150px">Surat Dinas Peternakan</th>
                    <th class="text-center min-w-150px">Surat Pertamina</th>
                    <th class="text-center min-w-150px">Daftar Nama KK</th>
                    <th class="text-center min-w-150px">Surat FKUB</th>
                    <th class="text-center min-w-150px">Status Berkas</th>

                    <!-- <th class="text-center min-w-100px">Type</th> -->
                    <!-- <th class="text-center min-w-70px">Actions</th> -->
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $no = 1;
                foreach ($KKPR as $kkpr) :
                ?>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->id_kkpr_permohonan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->id_user; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->tgl_verif_berkas; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->tgl_survei; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->no_reg_terbit; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->tgl_reg; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->surveyor1; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->surveyor2; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->type; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->nama_pemohon; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->alamat_pemohon; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->rt_pemohon; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->rw_pemohon; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->provinsi_pemohon; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->kota_pemohon; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->kecamatan_pemohon; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->kelurahan_pemohon; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->telp_pemohon; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->nama_perusahaan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->nib; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->skala_usaha; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->klasifikasi_resiko; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->kbli; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->alamat_perusahaan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->rt_perusahaan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->rw_perusahaan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->provinsi_perusahaan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->kota_perusahaan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->kecamatan_perusahaan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->kelurahan_perusahaan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->peruntukan_tanah; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->luas_tanah; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->kategori; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->perluasan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->status_tanah; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->lokasi_tanah; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->rt_tanah; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->rw_tanah; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->kota_tanah; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->kecamatan_tanah; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->kelurahan_tanah; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->dokumen_oss; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->fotokopi_ktp; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->akta_perusahaan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->siup; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->tdp; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->npwp; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->surat_tanah; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->peta_bidang; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->teknis_pertanahan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->surat_kematian; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->surat_kuasa_ahli_waris; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->surat_dinas_komunikasi; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->surat_rekom_tni; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->surat_dinas_perdagangan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->surat_dinas_peternakan; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->surat_pertamina; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->daftar_nama_kk; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->surat_fkub; ?></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"><?= $kkpr->status_berkas; ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>