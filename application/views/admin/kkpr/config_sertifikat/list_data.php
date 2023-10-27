<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / KKPR /</span> Berkas Diterima </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered row-border order-column fs-6" style="width:100%" id="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Type</th>
                                <th>Sertifikat</th>
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
                                    <td>
                                        <div class="d-grid gap-2">
                                            <a class="btn btn-outline-info btn-sm rounded-pill" href="<?php echo base_url('Kkpr/detail_config_peta/'); ?><?= $d->id_kkpr_permohonan ?>">Peta</a>
                                            <a class="btn btn-outline-secondary btn-sm rounded-pill" href="<?php echo base_url('Kkpr/detail_config_draft/'); ?><?= $d->id_kkpr_permohonan ?>">Draft Peta</a>
                                            <a class="btn btn-outline-dark btn-sm rounded-pill" href="<?php echo base_url('Kkpr/detail_config_lhs/'); ?><?= $d->id_kkpr_permohonan ?>">LHS</a>
                                        </div>
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
<!-- / Content -->

<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
        </div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->