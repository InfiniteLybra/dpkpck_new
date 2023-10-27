<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / KKPR / </span> Permohonan </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">                    
                    <div class="row">
                        <div class="text-nowrap">
                            <table class="table table-bordered row-border order-column fs-6" style="width:100%" id="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
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
                                        ?>
                                        <tr>
                                            <td>
                                                <span><?= $no++ ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->nama_pemohon ?></span>
                                            </td>
                                            <td>
                                                <span><?= $i->alamat_pemohon ?> RT.<?= $i->rt_pemohon ?> RW.<?= $i->rw_pemohon ?> Kel.<?= $kelurahan->subdis_name ?> - Kec.<?= $kecamatan->dis_name ?> - Kota / Kab.<?= $kota->city_name ?> - Prov.<?= $provinsi->prov_name ?></span>
                                            </td>
                                            <td>
                                                <span><?php if ($i) echo $i->kategori ?></span>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url('Kkpr/detail_kkpr/'); ?><?= $i->id_kkpr_permohonan ?>" class="btn btn-info rounded-pill btn-icon" title="Detail"><i class='bx bx-info-circle'></i></a>
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
<!-- / Content -->