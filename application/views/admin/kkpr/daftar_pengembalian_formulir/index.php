<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / KKPR / </span> Daftar Pemohon Ditolak </h4>

    <div class="row mb-4">
        <div class="col-md-12">
            <a href="<?php echo base_url('Kkpr/proses_otomatis'); ?>" class="btn btn-primary btn-sm">Proses Otomatis</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="text-nowrap">
                            <table class="table table-bordered row-border order-column fs-6" style="width:100%" id="table">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>No. HP</th>
                                        <th>Waktu</th>
                                        <th>Tipe</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                                <td>
                                                    <span><?= $no++ ?></span>
                                                </td>
                                                <td>
                                                    <span><?= $i->nama_pemohon ?></span>
                                                </td>
                                                <td>
                                                    <span><?= $i->telp_pemohon ?></span>
                                                </td>
                                                <td>
                                                    <span><?= $selisih_hari ?> Hari</span>
                                                </td>
                                                <td>
                                                    <span><?php if ($i) echo $i->kategori ?></span>
                                                </td>
                                                <td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->