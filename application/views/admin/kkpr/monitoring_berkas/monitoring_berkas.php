<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / KKPR /</span> Monitoring Berkas </h4>
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
                                    <li><a class="dropdown-item" href="<?php echo base_url('Kkpr/export_monitoring_berkas'); ?>" >Excel</a></li>
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
                                        <th>Tanggal Survey</th>
                                        <th>S Survei</th>
                                        <th>S Survei 2</th>
                                        <th>No. Register</th>
                                        <th>Tanggal Verivikasi</th>
                                        <th>Nama Pemohon</th>
                                        <th>Telp Pemohon</th>
                                        <th>Telp Kuasa</th>
                                        <th>Badan Hukum</th>
                                        <th>Peruntukan</th>
                                        <th>Desa / Kel</th>
                                        <th>Kecamatan</th>
                                        <th>Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kkpr as $i) {
                                    ?>
                                        <?php
                                        $kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$i->kelurahan_tanah' ")->row();
                                        $kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$i->kecamatan_tanah' ")->row();
                                        ?>
                                        <tr>
                                            <td>
                                                <span><?= $no++ ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->tgl_survei ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->surveyor1 ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->surveyor2 ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->id_kkpr_permohonan ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->tgl_verif_berkas ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->nama_pemohon ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->telp_pemohon ?></span>
                                            </td>
                                            <td>
                                                <span></span>
                                            </td>
                                            <td>
                                                <span><?= $i->nama_perusahaan ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->peruntukan_tanah ?></span>
                                            </td>
                                            <td>
                                                <span><?= $kelurahan_tanah->nama_desa ?></span>
                                            </td>
                                            <td>
                                                <span><?= $kecamatan_tanah->nama_kecamatan ?></span>
                                            </td>
                                            <td>
                                                <span class="badge <?php
                                                                    $progres = $i->status_berkas;
                                                                    if ($progres == 0) {
                                                                        echo " bg-label-danger";
                                                                    } elseif ($progres == 2) {
                                                                        echo " bg-label-primary";
                                                                    } elseif ($progres == 3) {
                                                                        echo " bg-label-warning";
                                                                    } else {
                                                                        echo "";
                                                                    }
                                                                    ?> me-1">
                                                    <?php
                                                    $progres = $i->status_berkas;
                                                    if ($progres == 0) {
                                                        echo "Disposisi";
                                                    } elseif ($progres == 2) {
                                                        echo "Siap Survei";
                                                    } elseif ($progres == 3) {
                                                        echo "Pengerjaan Laporan";
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>
                                                </span>
                                            </td>
                                            <!-- <td >
                            <span><?= $i->type ?></span>
                        </td>                     -->
                                            <!-- <td >
                            <a href="<?php echo base_url('Kkpr/admin_kkpr_detail_kuasa/'); ?><?= $i->id_kkpr_kuasa ?>" class="btn btn-primary btn-sm">Detail</a>
                        </td>                     -->
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
<!-- / Content -->